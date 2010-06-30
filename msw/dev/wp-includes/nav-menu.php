<?php
/**
 * Navigation Menu functions
 *
 * @package WordPress
 * @subpackage Nav_Menus
 * @since 3.0.0
 */

/**
 * Returns a navigation menu object.
 *
 * @since 3.0.0
 *
 * @param string $menu Menu id
 * @return mixed $menu|false Or WP_Error
 */
function wp_get_nav_menu_object( $menu ) {
	if ( ! $menu )
		return false;

	$menu_obj = get_term( $menu, 'nav_menu' );

	if ( ! $menu_obj )
		$menu_obj = get_term_by( 'slug', $menu, 'nav_menu' );

	if ( ! $menu_obj )
		$menu_obj = get_term_by( 'name', $menu, 'nav_menu' );

	if ( ! $menu_obj ) {
		$menu_obj = false;
	}

	return $menu_obj;
}

/**
 * Check if the given ID is a nav menu.
 *
 * Returns true if it is; false otherwise.
 *
 * @since 3.0.0
 *
 * @param int|string $menu The menu to check
 * @return bool Whether the menu exists.
 */
function is_nav_menu( $menu ) {
	if ( ! $menu )
		return false;

	$menu_obj = wp_get_nav_menu_object( $menu );

	if (
		$menu_obj &&
		! is_wp_error( $menu_obj ) &&
		! empty( $menu_obj->taxonomy ) &&
		'nav_menu' == $menu_obj->taxonomy
	)
		return true;

	return false;
}

/**
 * Determine whether the given ID is a nav menu item.
 *
 * @since 3.0.0
 *
 * @param int $menu_item_id The ID of the potential nav menu item.
 * @return bool Whether the given ID is that of a nav menu item.
 */
function is_nav_menu_item( $menu_item_id = 0 ) {
	return ( ! is_wp_error( $menu_item_id ) && ( 'nav_menu_item' == get_post_type( $menu_item_id ) ) );
}

/**
 * Create a Navigation Menu.
 *
 * Optional args:
 * slug - the url friendly version of the nav menu.
 *
 * @since 3.0.0
 *
 * @param string $menu_name Menu Name
 * @param string $args Optional.
 * @return mixed Menu object on sucess|WP_Error on failure
 */
function wp_create_nav_menu( $menu_name, $args = array() ) {
	$menu_exists = get_term_by( 'name', $menu_name, 'nav_menu' );

	if ( $menu_exists )
		return new WP_Error( 'menu_exists', sprintf( __('The menu name <strong>%s</strong> conflicts with another menu name. Please try another.'), esc_html( $menu_name ) ) );

	if ( isset($args['slug']) )
		$slug = $args['slug'];
	else
		$slug = $menu_name;

	$menu = wp_insert_term( $menu_name, 'nav_menu', array('slug' => $slug) );

	if ( is_wp_error($menu) )
		return $menu;

	$result = get_term( $menu['term_id'], 'nav_menu' );

	if ( $result && !is_wp_error($result) ) {
		do_action( 'wp_create_nav_menu', $menu['term_id'] );
		return $result;
	} else {
		return $result;
	}
}

/**
 * Delete a Navigation Menu.
 *
 * @since 3.0.0
 *
 * @param string $menu name|id|slug
 * @return mixed Menu object on sucess|WP_Error on failure
 */
function wp_delete_nav_menu( $menu ) {
	$menu = wp_get_nav_menu_object( $menu );
	if ( ! $menu  )
		return false;

	$menu_objects = get_objects_in_term( $menu->term_id, 'nav_menu' );
	if ( !empty( $menu_objects ) ) {
		foreach ( $menu_objects as $item ) {
			wp_delete_post( $item );
		}
	}

	$result = wp_delete_term( $menu->term_id, 'nav_menu' );

	if ( $result && !is_wp_error($result) ) {
		do_action( 'wp_delete_nav_menu', $menu->term_id );
		return $result;
	} else {
		return $result;
	}
}

/**
 * Save the properties of a menu or create a new menu with those properties.
 *
 * @since 3.0.0
 *
 * @param int $menu_id The ID of the menu
 * @param array $menu_data The array of menu data.
 * @return int|error object The menu's ID or WP_Error object.
 */
function wp_update_nav_menu_object( $menu_id = 0, $menu_data = array() ) {
	$menu_id = (int) $menu_id;

	$_menu = wp_get_nav_menu_object( $menu_id );

	// menu doesn't already exist
	if ( ! $_menu || is_wp_error( $_menu ) )
		$_menu = wp_create_nav_menu( $menu_data['menu-name'] );

	if ( is_wp_error( $_menu ) )
		return $_menu;

	if ( $_menu && isset( $_menu->term_id ) ) {
		$args = array(
			'description' => ( isset( $menu_data['description'] ) ? $menu_data['description'] : '' ),
			'name' => ( isset( $menu_data['menu-name'] ) ? $menu_data['menu-name'] : '' ),
			'parent' => ( isset( $menu_data['parent'] ) ? (int) $menu_data['parent'] : 0 ),
			'slug' => null,
		);

		$menu_id = (int) $_menu->term_id;

		// double-check that we're not changing a menu to the name of another
		$_possible_existing = get_term_by( 'name', $menu_data['menu-name'], 'nav_menu' );
		if (
			$_possible_existing &&
			! is_wp_error( $_possible_existing ) &&
			isset( $_possible_existing->term_id ) &&
			$_possible_existing->term_id != $menu_id
		) {
			return new WP_Error( 'menu_exists', sprintf( __('The menu name <strong>%s</strong> conflicts with another menu name. Please try another.'), esc_html( $menu_data['menu-name'] ) ) );
		}

		$update_response = wp_update_term( $menu_id, 'nav_menu', $args );

		if ( ! is_wp_error( $update_response ) )
			return $menu_id;
		else
			return $update_response;
	} else {
		return 0;
	}
}

/**
 * Save the properties of a menu item or create a new one.
 *
 * @since 3.0.0
 *
 * @param int $menu_id The ID of the menu. Required.
 * @param int $menu_item_db_id The ID of the menu item. If "0", creates a new menu item.
 * @param array $menu_item_data The menu item's data.
 * @return int The menu item's database ID or WP_Error object on failure.
 */
function wp_update_nav_menu_item( $menu_id = 0, $menu_item_db_id = 0, $menu_item_data = array() ) {

	$menu_id = (int) $menu_id;
	$menu_item_db_id = (int) $menu_item_db_id;

	// make sure that we don't convert non-nav_menu_item objects into nav_menu_item objects
	if ( ! empty( $menu_item_db_id ) && ! is_nav_menu_item( $menu_item_db_id ) ) {
		return new WP_Error('update_nav_menu_item_failed', __('The given object ID is not that of a menu item.'));
	}

	$menu = wp_get_nav_menu_object( $menu_id );

	if ( ! $menu || is_wp_error( $menu ) ) {
		return $menu;
	}

	$menu_items = (array) wp_get_nav_menu_items( $menu_id );

	$count = count( $menu_items );

	$defaults = array(
		'menu-item-db-id' => $menu_item_db_id,
		'menu-item-object-id' => 0,
		'menu-item-object' => '',
		'menu-item-parent-id' => 0,
		'menu-item-position' => 0,
		'menu-item-type' => 'custom',
		'menu-item-append' => 'custom',
		'menu-item-title' => '',
		'menu-item-url' => '',
		'menu-item-description' => '',
		'menu-item-attr-title' => '',
		'menu-item-target' => '',
		'menu-item-classes' => '',
		'menu-item-xfn' => '',
	);

	$args = wp_parse_args( $menu_item_data, $defaults );

	if ( 0 == (int) $args['menu-item-position'] ) {
		$last_item = array_pop( $menu_items );
		if ( $last_item && isset( $last_item->ID ) ) {
			$last_data = get_post( $last_item->ID );
			if ( ! is_wp_error( $last_data ) && isset( $last_data->menu_order ) ) {
				$args['menu-item-position'] = 1 + (int) $last_data->menu_order;
			}

		} else {
			$args['menu-item-position'] = $count;
		}
	}

	$original_parent = 0 < $menu_item_db_id ? get_post_field( 'post_parent', $menu_item_db_id ) : 0;

	if ( 'custom' != $args['menu-item-type'] ) {
		/* if non-custom menu item, then:
			* use original object's URL
			* blank default title to sync with original object's
		*/

		$args['menu-item-url'] = '';

		$original_title = '';
		if ( 'taxonomy' == $args['menu-item-type'] ) {
			$original_parent = get_term_field( 'parent', $args['menu-item-object-id'], $args['menu-item-object'], 'raw' );
			$original_title = get_term_field( 'name', $args['menu-item-object-id'], $args['menu-item-object'], 'raw' );
		} elseif ( 'post_type' == $args['menu-item-type'] ) {

			$original_object = get_post( $args['menu-item-object-id'] );
			$original_parent = (int) $original_object->post_parent;
			$original_title = $original_object->post_title;

			if ( 'trash' == get_post_status( $args['menu-item-object-id'] ) ) {
				$post_type_object = get_post_type_object( $args['menu-item-object'] );
				if ( isset( $post_type_object->singular_label ) )
					return new WP_Error('update_nav_menu_item_failed', sprintf(__('The menu item "%1$s" belongs to a %2$s that is in the trash, so it cannot be updated.'), $args['menu-item-title'], $post_type_object->singular_label ) );
				else
					return new WP_Error('update_nav_menu_item_failed', sprintf(__('The menu item "%1$s" belongs to something that is in the trash, so it cannot be updated.'), $args['menu-item-title'] ) );
			}
		}

		if ( empty( $args['menu-item-title'] ) || $args['menu-item-title'] == $original_title ) {
			$args['menu-item-title'] = '';

			// hack to get wp to create a post object when too many properties are empty
			if ( empty( $args['menu-item-description'] ) ) {
				$args['menu-item-description'] = ' ';
			}
		}
	}

	// Populate the menu item object
	$post = array(
		'menu_order' => $args['menu-item-position'],
		'ping_status' => 0,
		'post_content' => $args['menu-item-description'],
		'post_excerpt' => $args['menu-item-attr-title'],
		'post_parent' => $original_parent,
		'post_title' => $args['menu-item-title'],
		'post_type' => 'nav_menu_item',
		'tax_input' => array( 'nav_menu' => $menu->name ),
	);

	// New menu item
	if ( 0 == $menu_item_db_id ) {
		$post['ID'] = 0;
		$post['post_status'] = 'draft';
		$menu_item_db_id = wp_insert_post( $post );

	// Update existing menu item
	} else {
		$post['ID'] = $menu_item_db_id;
		$post['post_status'] = 'publish';
		wp_update_post( $post );
	}

	if ( 'custom' == $args['menu-item-type'] ) {
		$args['menu-item-object-id'] = $menu_item_db_id;
		$args['menu-item-object'] = 'custom';
	}

	if ( $menu_item_db_id && ! is_wp_error( $menu_item_db_id ) ) {

		$menu_item_db_id = (int) $menu_item_db_id;

		update_post_meta( $menu_item_db_id, '_menu_item_type', sanitize_key($args['menu-item-type']) );
		update_post_meta( $menu_item_db_id, '_menu_item_menu_item_parent', (int) $args['menu-item-parent-id'] );
		update_post_meta( $menu_item_db_id, '_menu_item_object_id', (int) $args['menu-item-object-id'] );
		update_post_meta( $menu_item_db_id, '_menu_item_object', sanitize_key($args['menu-item-object']) );
		update_post_meta( $menu_item_db_id, '_menu_item_target', sanitize_key($args['menu-item-target']) );
		// @todo handle sanitizing multiple classes separated by whitespace.
		update_post_meta( $menu_item_db_id, '_menu_item_classes', sanitize_html_class($args['menu-item-classes']) );
		update_post_meta( $menu_item_db_id, '_menu_item_xfn', sanitize_html_class($args['menu-item-xfn']) );

		// @todo: only save custom link urls.
		update_post_meta( $menu_item_db_id, '_menu_item_url', esc_url_raw($args['menu-item-url']) );

		do_action('wp_update_nav_menu_item', $menu_id, $menu_item_db_id, $args );
	}

	return $menu_item_db_id;
}

/**
 * Returns all navigation menu objects.
 *
 * @since 3.0.0
 *
 * @return array menu objects
 */
function wp_get_nav_menus() {
	return get_terms( 'nav_menu', array( 'hide_empty' => false, 'orderby' => 'id' ) );
}


/**
 * Sort menu items by the desired key.
 *
 * @since 3.0.0
 * @access private
 *
 * @param object $a The first object to compare
 * @param object $b The second object to compare
 * @return int -1, 0, or 1 if $a is considered to be respectively less than, equal to, or greater than $b.
 */
function _sort_nav_menu_items($a, $b) {
	global $_menu_item_sort_prop;

	if ( empty( $_menu_item_sort_prop ) ) {
		return 0;
	}

	if ( isset( $a->$_menu_item_sort_prop ) && isset( $b->$_menu_item_sort_prop ) ) {
		$_a = (int) $a->$_menu_item_sort_prop;
		$_b = (int) $b->$_menu_item_sort_prop;

		if ( $a->$_menu_item_sort_prop == $b->$_menu_item_sort_prop ) {
			return 0;
		} elseif (
			( $_a == $a->$_menu_item_sort_prop ) &&
			( $_b == $b->$_menu_item_sort_prop )
		) {
			return $_a < $_b ? -1 : 1;
		} else {
			return strcmp( $a->$_menu_item_sort_prop, $b->$_menu_item_sort_prop );
		}
	} else {
		return 0;
	}
}

/**
 * Returns all menu items of a navigation menu.
 *
 * @since 3.0.0
 *
 * @param string $menu menu name, id, or slug
 * @param string $args
 * @return mixed $items array of menu items, else false.
 */
function wp_get_nav_menu_items( $menu, $args = array() ) {
	$menu = wp_get_nav_menu_object( $menu );

	if ( ! $menu )
		return false;

	$items = get_objects_in_term( $menu->term_id, 'nav_menu' );

	if ( ! empty( $items ) ) {
		$defaults = array( 'order' => 'ASC', 'orderby' => 'menu_order', 'post_type' => 'nav_menu_item', 'post_status' => 'publish', 'output' => ARRAY_A, 'output_key' => 'menu_order', 'nopaging' => true );
		$args = wp_parse_args( $args, $defaults );
		if ( count( $items ) > 1 )
			$args['include'] = implode( ',', $items );
		else
			$args['include'] = $items[0];

		$items = get_posts( $args );

		if ( is_wp_error( $items ) || ! is_array( $items ) ) {
			return false;
		}

		$items = array_map( 'wp_setup_nav_menu_item', $items );

		if ( ARRAY_A == $args['output'] ) {
			$GLOBALS['_menu_item_sort_prop'] = $args['output_key'];
			usort($items, '_sort_nav_menu_items');
			$i = 1;
			foreach( $items as $k => $item ) {
				$items[$k]->$args['output_key'] = $i++;
			}
		}
	}
	return $items;
}

/**
 * Decorates a menu item object with the shared navigation menu item properties.
 *
 * Properties:
 * - db_id: 		The DB ID of this item as a nav_menu_item object, if it exists (0 if it doesn't exist).
 * - object_id:		The DB ID of the original object this menu item represents, e.g. ID for posts and term_id for categories.
 * - type:		The family of objects originally represented, such as "post_type" or "taxonomy."
 * - object:		The type of object originally represented, such as "category," "post", or "attachment."
 * - append:		The singular label used to describe this type of menu item.
 * - post_parent:	The DB ID of the original object's parent object, if any (0 otherwise).
 * - menu_item_parent: 	The DB ID of the nav_menu_item that is this item's menu parent, if any.  0 otherwise.
 * - url:		The URL to which this menu item points.
 * - title:		The title of this menu item.
 * - target: 		The target attribute of the link element for this menu item.
 * - attr_title:	The title attribute of the link element for this menu item.
 * - classes:		The class attribute value for the link element of this menu item.
 * - xfn:		The XFN relationship expressed in the link of this menu item.
 * - description:	The description of this menu item.
 *
 * @since 3.0.0
 *
 * @param object $menu_item The menu item to modify.
 * @return object $menu_item The menu item with standard menu item properties.
 */
function wp_setup_nav_menu_item( $menu_item ) {
	if ( isset( $menu_item->post_type ) ) {
		if ( 'nav_menu_item' == $menu_item->post_type ) {
			$menu_item->db_id = (int) $menu_item->ID;
			$menu_item->menu_item_parent = get_post_meta( $menu_item->ID, '_menu_item_menu_item_parent', true );
			$menu_item->object_id = get_post_meta( $menu_item->ID, '_menu_item_object_id', true );
			$menu_item->object = get_post_meta( $menu_item->ID, '_menu_item_object', true );
			$menu_item->type = get_post_meta( $menu_item->ID, '_menu_item_type', true );

			if ( 'post_type' == $menu_item->type ) {
				$object = get_post_type_object( $menu_item->object );
				$menu_item->append = $object->singular_label;
				$menu_item->url = get_permalink( $menu_item->object_id );

				$original_object = get_post( $menu_item->object_id );
				$original_title = $original_object->post_title;
				$menu_item->title = '' == $menu_item->post_title ? $original_title : $menu_item->post_title;

			} elseif ( 'taxonomy' == $menu_item->type ) {
				$object = get_taxonomy( $menu_item->object );
				$menu_item->append = $object->singular_label;
				$menu_item->url = get_term_link( (int) $menu_item->object_id, $menu_item->object );

				$original_title = get_term_field( 'name', $menu_item->object_id, $menu_item->object, 'raw' );
				$menu_item->title = '' == $menu_item->post_title ? $original_title : $menu_item->post_title;

			} else {
				$menu_item->append = __('Custom');
				$menu_item->title = $menu_item->post_title;
				$menu_item->url = get_post_meta( $menu_item->ID, '_menu_item_url', true );
			}

			$menu_item->target = get_post_meta( $menu_item->ID, '_menu_item_target', true );

			$menu_item->attr_title = strip_tags( $menu_item->post_excerpt );
			$menu_item->description = strip_tags( $menu_item->post_content );

			$menu_item->classes = get_post_meta( $menu_item->ID, '_menu_item_classes', true );
			$menu_item->xfn = get_post_meta( $menu_item->ID, '_menu_item_xfn', true );
		} else {
			$menu_item->db_id = 0;
			$menu_item->menu_item_parent = 0;
			$menu_item->object_id = (int) $menu_item->ID;
			$menu_item->type = 'post_type';

			$object = get_post_type_object( $menu_item->post_type );
			$menu_item->object = $object->name;
			$menu_item->append = strtolower( $object->singular_label );

			$menu_item->title = $menu_item->post_title;
			$menu_item->url = get_permalink( $menu_item->ID );
			$menu_item->target = '';

			$menu_item->attr_title = strip_tags( $menu_item->post_excerpt );
			$menu_item->description = strip_tags( $menu_item->post_content );
			$menu_item->classes = '';
			$menu_item->xfn = '';
		}
	} elseif ( isset( $menu_item->taxonomy ) ) {
		$menu_item->ID = $menu_item->term_id;
		$menu_item->db_id = 0;
		$menu_item->menu_item_parent = 0;
		$menu_item->object_id = (int) $menu_item->term_id;
		$menu_item->post_parent = (int) $menu_item->parent;
		$menu_item->type = 'taxonomy';

		$object = get_taxonomy( $menu_item->taxonomy );
		$menu_item->object = $object->name;
		$menu_item->append = strtolower( $object->singular_label );

		$menu_item->title = $menu_item->name;
		$menu_item->url = get_term_link( $menu_item, $menu_item->taxonomy );
		$menu_item->target = '';
		$menu_item->attr_title = '';
		$menu_item->description = strip_tags( get_term_field( 'description', $menu_item->term_id, $menu_item->taxonomy ) );
		$menu_item->classes = '';
		$menu_item->xfn = '';

	}

	return apply_filters( 'wp_setup_nav_menu_item', $menu_item );
}

/**
 * Get the menu items associated with a particular object.
 *
 * @since 3.0.0
 *
 * @param int $object_id The ID of the original object.
 * @param string $object_type The type of object, such as "taxonomy" or "post_type."
 * @return array The array of menu item IDs; empty array if none;
 */
function wp_get_associated_nav_menu_items( $object_id = 0, $object_type = 'post_type' ) {
	$object_id = (int) $object_id;
	$menu_item_ids = array();

	$query = new WP_Query;
	$menu_items = $query->query(
		array(
			'meta_key' => '_menu_item_object_id',
			'meta_value' => $object_id,
			'post_status' => 'any',
			'post_type' => 'nav_menu_item',
			'showposts' => -1,
		)
	);
	foreach( (array) $menu_items as $menu_item ) {
		if ( isset( $menu_item->ID ) && is_nav_menu_item( $menu_item->ID ) ) {
			if ( get_post_meta($menu_item->ID, '_menu_item_type', true) != $object_type )
				continue;

			$menu_item_ids[] = (int) $menu_item->ID;
		}
	}

	return array_unique( $menu_item_ids );
}

/**
 * Callback for handling a menu item when its original object is trashed.
 *
 * @since 3.0.0
 * @access private
 *
 * @param int $object_id The ID of the original object being trashed.
 *
 */
function _wp_trash_menu_item( $object_id = 0 ) {
	$object_id = (int) $object_id;

	$menu_item_ids = wp_get_associated_nav_menu_items( $object_id );

	foreach( (array) $menu_item_ids as $menu_item_id ) {
		$menu_item = get_post( $menu_item_id, ARRAY_A );
		$menu_item['post_status'] = 'draft';
		wp_insert_post($menu_item);
	}
}

/**
 * Callback for handling a menu item when its original object is un-trashed.
 *
 * @since 3.0.0
 * @access private
 *
 * @param int $object_id The ID of the original object being untrashed.
 *
 */
function _wp_untrash_menu_item( $object_id = 0 ) {
	$object_id = (int) $object_id;

	$menu_item_ids = wp_get_associated_nav_menu_items( $object_id );

	foreach( (array) $menu_item_ids as $menu_item_id ) {
		$menu_item = get_post( $menu_item_id, ARRAY_A );
		$menu_item['post_status'] = 'publish';
		wp_insert_post($menu_item);
	}
}

/**
 * Callback for handling a menu item when its original object is deleted.
 *
 * @since 3.0.0
 * @access private
 *
 * @param int $object_id The ID of the original object being trashed.
 *
 */
function _wp_delete_post_menu_item( $object_id = 0 ) {
	$object_id = (int) $object_id;

	$menu_item_ids = wp_get_associated_nav_menu_items( $object_id, 'post_type' );

	foreach( (array) $menu_item_ids as $menu_item_id ) {
		wp_delete_post( $menu_item_id, true );
	}
}

/**
 * Callback for handling a menu item when its original object is deleted.
 *
 * @since 3.0.0
 * @access private
 *
 * @param int $object_id The ID of the original object being trashed.
 *
 */
function _wp_delete_tax_menu_item( $object_id = 0 ) {
	$object_id = (int) $object_id;

	$menu_item_ids = wp_get_associated_nav_menu_items( $object_id, 'taxonomy' );

	foreach( (array) $menu_item_ids as $menu_item_id ) {
		wp_delete_post( $menu_item_id, true );
	}
}

?>
