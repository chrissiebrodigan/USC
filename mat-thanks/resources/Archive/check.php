<?php

if($_POST['00N80000004FxJD'] == '2.49 and below')
{
	//header('Location: http://mat.usc.edu/admissions-requirements');
	header('Location: http://ua5clients.com/form/MAT/admissions.html');
	exit;
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<body onload="document.forms[0].submit();">
		<form action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="post">
			<input type="hidden" name="00N80000002UJr8" value="<?php echo $_POST['00N80000002UJr8']; ?>" />
			<input type="hidden" name="oid" value="<?php echo $_POST['sfga']; ?>" />
			<input type="hidden" name="sfga" value="<?php echo $_POST['sfga']; ?>" />
			<input type="hidden" name="retURL" value="<?php echo $_POST['retURL']; ?>" />
			<input type="hidden" name="phone" value="<?php echo $_POST['phone']; ?>" />
			<input type="hidden" name="00N80000002hSKh" value="<?php echo $_POST['00N80000002hSKh']; ?>" />
			<input type="hidden" name="last_name" value="<?php echo $_POST['last_name']; ?>" />
			<input type="hidden" name="00N80000002hS8y" value="<?php echo $_POST['00N80000002hS8y']; ?>" />
			<input type="hidden" name="00N80000002hSJL" value="<?php echo $_POST['00N80000002hSJL']; ?>" />
			<input type="hidden" name="00N80000004FxJD" value="<?php echo $_POST['00N80000004FxJD']; ?>" />
			<input type="hidden" name="first_name" value="<?php echo $_POST['first_name']; ?>" />
			<input type="hidden" name="email" value="<?php echo $_POST['email']; ?>" />
			<input type="hidden" name="lead_source" value="<?php echo $_POST['lead_source']; ?>" />
		</form>
	</body>
</html>