<?php get_header(); ?>

<div id="content-wrapper">
	<h1>USC | School of Social Work</h1>
	<div id="content">
		<h2>Become a Social Worker to Create <em>Compassionate Solutions</em> for Tough Problems!</h2>
		
		<div id="questionnaire-wrapper">
			<div id="questionnaire">
				<h3>Learn More About the Virtual Academic Center, MSW@USC</h3>
				<em>This will only take a minute!</em>
			
				<div id="progress-bar" class="bar-0">
					<span>0</span>% complete
				</div>
			
				<div id="question-box">
					<form id="info-form" name="info-form" method="post" action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" class="validate">
						<input type="hidden" name="oid" value="00DA0000000Y2V2">
						<input type="hidden" name="retURL" value="http://msw.usc.edu/request-info/thank-you.html">
						<input type="hidden" name="rejection-url" id="rejection-url" value="http://msw.ua5clients.com/msw-thankyou/good-luck/" /> <!-- URL for non-qualified applicants -->
						<input type="hidden" id="splash-creative" name="00NA0000003Wlom" value="<?php echo $splash_creative; ?>" />
					
						<?php
						$s = (array_key_exists('s', $_GET)) ? $_GET['s'] : '';
						$s = ($s == '') ? 'web' : $s;
				
						if ($s == 'grad') { $s = 'GRE'; }
						if ($s == 'teach') { $s = 'TFA'; }
						if ($s == 'ik') { $s = 'Intermark'; }
						if ($s == 'null') { $s = 'web'; }
						?>

						<input id="lead_source" name="lead_source" type="hidden" value="<?php echo $s; ?>" />

						<?php $l = (array_key_exists('l', $_GET)) ? $_GET['l'] : ''; ?>
					
						<input type="hidden" id="landing_page" name="00NA0000002shoy" title="Landing Page" value="<?php echo $l; ?>" />
					
						<fieldset id="step-1">
							<strong>Which best describes you?</strong>
							<div class="field-row">
								<input type="radio" name="00NA00000037Wnm" id="describes1" value="No" />
								<label class="radio" for="describes1">I am starting a career in social services</label>
							</div>
							<div class="field-row">
								<input type="radio" name="00NA00000037Wnm" id="describes2" value="Yes" />
								<label class="radio" for="describes2">I currently work in social services and want to advance my career</label>
							</div>
					
							<button type="button" name="next" id="next-1" class="action">next</button>
						</fieldset>
						<fieldset id="step-2">
							<div class="field-row">
								<label for="education-level">Highest Level of Education</label>
								<select id="education-level" name="00NA0000002shp6" title="Level of Education" class="required">
									<option value="">--None--</option>
									<option value="High School">High School</option>
									<option value="Associate&#39;s degree">Associate&#39;s degree</option>
									<option value="Bachelors In Process">Bachelors In Process</option>
									<option value="Bachelors">Bachelors</option>
									<option value="Masters In Process">Masters In Process</option>
									<option value="Masters">Masters</option>
									<option value="Doctorate in process">Doctorate in process</option>
									<option value="Doctorate">Doctorate</option>
									<option value="Professional degree">Professional degree</option>
								</select>
							</div>
							<div class="field-row">
								<label for="gpa">Undergraduate GPA Range</label>
								<select id="gpa" name="00NA0000002shpD" title="Stated GPA Range" class="required">
									<option value="">--None--</option>
									<option value="4.00 and above">4.00 and above</option>
									<option value="3.99 - 3.50">3.99 - 3.50</option>
									<option value="3.49 - 3.00">3.49 - 3.00</option>
									<option value="2.99 - 2.50">2.99 - 2.50</option>
									<option value="2.49 and below">2.49 and below</option>
								</select>
							</div>
						
							<button type="button" name="next" id="next-2">next</button>
						</fieldset>
						<fieldset id="step-3">
							<div class="field-row alt">
								<div class="field-cell">
									<label for="first_name">First Name</label>
									<input id="first_name" maxlength="40" name="first_name" size="18" type="text" class="required word" />
								</div>
								<div class="field-cell alt">
									<label for="last_name">Last Name</label>
									<input id="last_name" maxlength="80" name="last_name" size="18" type="text" class="required word" />
								</div>
								<div class="clear"></div>
							</div>
							<div class="field-row alt">
								<div class="field-cell">
									<label for="email">Email</label>
									<input id="email" maxlength="80" name="email" size="15" type="text" class="required email"/>
								</div>
								<div class="field-cell alt">
									<label for="phone">Phone</label>
									<input id="phone" maxlength="40" name="phone" size="15" type="text" class="required word" />
								</div>
								<div class="clear"></div>
							</div>
							<div class="field-row">
								<div class="field-cell">
									<label for="city">City</label>
									<input id="city" maxlength="40" name="city" size="20" type="text" class="required" />
								</div>
								<div class="field-cell alt">
									<label for="state">State</label>
									<select name="state" id="state" class="required">
										<option value=""></option>
										<option value="AL">Alabama</option> 
										<option value="AK">Alaska</option> 
										<option value="AZ">Arizona</option> 
										<option value="AR">Arkansas</option> 
										<option value="CA">California</option> 
										<option value="CO">Colorado</option> 
										<option value="CT">Connecticut</option> 
										<option value="DE">Delaware</option> 
										<option value="DC">District Of Columbia</option> 
										<option value="FL">Florida</option> 
										<option value="GA">Georgia</option> 
										<option value="HI">Hawaii</option> 
										<option value="ID">Idaho</option> 
										<option value="IL">Illinois</option> 
										<option value="IN">Indiana</option> 
										<option value="IA">Iowa</option> 
										<option value="KS">Kansas</option> 
										<option value="KY">Kentucky</option> 
										<option value="LA">Louisiana</option> 
										<option value="ME">Maine</option> 
										<option value="MD">Maryland</option> 
										<option value="MA">Massachusetts</option> 
										<option value="MI">Michigan</option> 
										<option value="MN">Minnesota</option> 
										<option value="MS">Mississippi</option> 
										<option value="MO">Missouri</option> 
										<option value="MT">Montana</option> 
										<option value="NE">Nebraska</option> 
										<option value="NV">Nevada</option> 
										<option value="NH">New Hampshire</option> 
										<option value="NJ">New Jersey</option> 
										<option value="NM">New Mexico</option> 
										<option value="NY">New York</option> 
										<option value="NC">North Carolina</option> 
										<option value="ND">North Dakota</option> 
										<option value="OH">Ohio</option> 
										<option value="OK">Oklahoma</option> 
										<option value="OR">Oregon</option> 
										<option value="PA">Pennsylvania</option> 
										<option value="RI">Rhode Island</option> 
										<option value="SC">South Carolina</option> 
										<option value="SD">South Dakota</option> 
										<option value="TN">Tennessee</option> 
										<option value="TX">Texas</option> 
										<option value="UT">Utah</option> 
										<option value="VT">Vermont</option> 
										<option value="VA">Virginia</option> 
										<option value="WA">Washington</option> 
										<option value="WV">West Virginia</option> 
										<option value="WI">Wisconsin</option> 
										<option value="WY">Wyoming</option>
									</select>
								</div>
							</div>
							<div class="clear"></div>
					
							<button type="submit" name="submit" id="submit">submit</button>
						</fieldset>
					</form>
				</div>
			
				<em class="privacy">Your privacy is important to us</em>
			</div> <!-- /questionnaire -->
		</div> <!-- /questionnaire-wrapper -->
		
		<h3>Earn an Advanced Degree That Fits Your Life</h3>
		
		<div id="best-colleges-2010">
			Accredited program ranked #8 by <strong>U.S. News &amp; World Report</strong>
		</div>
		
		<ul>
			<li><strong>Convenient &amp; flexible</strong> courses for your busy schedule</li>
			<li>Distinguished <strong>faculty</strong> who are <strong>leaders</strong> in social work</li>
			<li>Online learning paired with <strong>hands-on field experience</strong> in your <strong>local community</strong></li>
			<li>Attend University of Southern California <strong>without relocating</strong></li>
			<div class="clear"></div>
		</ul>
		
		<p>
			<a href="http://socialwork.usc.edu" title="Visit the USC School of Social Work">Visit the Virtual Academic Center, MSW@USC @ socialwork.usc.edu</a>
		</p>
		
		<p>Questions? Call us at 1-877-700-4MSW</p>
	</div> <!-- /content -->
	<div id="content-footer">
		<span>Know someone who wants to become a social worker?</span>
		<a href="" title="" id="share-button">Share this Program</a>
		<script language="javascript" type="text/javascript">
			var st_obj = SHARETHIS.addEntry({}, {button: false, popup: true } );
			
			st_obj.attachButton($('#share-button')[0]);
		</script>
		
		<div class="clear"></div>
	</div> <!-- /content-footer -->
</div> <!-- /content-wrapper -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>