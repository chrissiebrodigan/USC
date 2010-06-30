<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="keywords" content="" />
    <title>University of Southern California</title>
    <meta name="description" content="" />
    
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="favicon.ico" />
    
    <!-- Framework CSS -->
    <link rel="stylesheet" href="jjomedia.css" type="text/css" media="screen, projection, print" />
     
	<!--ADDITIONAL PAGE-SPECIFIC SCRIPTS-->  
	

     
	<!--ADDITIONAL PAGE-SPECIFIC SCRIPTS-->   
   <script type="text/javascript">

function validation(form) {

if(document.getElementById("gpaRange").value == '2.49 and below') {

this.document.location = 'admissions.html';
return false;
}


if(document.getElementById("education2").value == 'High School') {

this.document.location = 'admissions.html';
return false;
}

if(document.getElementById("education2").value == 'Associates Degree') {

this.document.location = 'admissions.html';
return false;
}

if(form.first_name.value == '') {

alert('Please enter your first name');
form.first_name.focus();
return false;
}


if(form.last_name.value == '') {

alert('Please enter your last name');
form.last_name.focus();
return false;
}


if(form.emailfield.value == '') {

alert('Please enter your email address');
form.emailfield.focus();
return false;
}


if(form.phone2.value == '') {

alert('Please enter your phone number');
form.phone.focus();
return false;
}


if(form.zipCode.value == '') {

alert('Please enter your 5 digit zip code');
form.zipCode.focus();
return false;
}


if(form.state2.value == '') {

alert('Please select a state');
form.state2.focus();
return false;
}


if(form.education2.value == '') {

alert('Please select your highest level of education');
form.education2.focus();
return false;
}


if(form.description2.value == '') {

alert('Please select which best describes you');
form.description2.focus();
return false;
}


return true;
}



</script>

<script type="text/javascript"> 
<!--
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
//-->
</script> 

<!-- Google Website Optimizer Control Script -->
<script>
function utmx_section(){}function utmx(){}
(function(){var k='3763702025',d=document,l=d.location,c=d.cookie;function f(n){
if(c){var i=c.indexOf(n+'=');if(i>-1){var j=c.indexOf(';',i);return c.substring(i+n.
length+1,j<0?c.length:j)}}}var x=f('__utmx'),xx=f('__utmxx'),h=l.hash;
d.write('<sc'+'ript src="'+
'http'+(l.protocol=='https:'?'s://ssl':'://www')+'.google-analytics.com'
+'/siteopt.js?v=1&utmxkey='+k+'&utmx='+(x?x:'')+'&utmxx='+(xx?xx:'')+'&utmxtime='
+new Date().valueOf()+(h?'&utmxhash='+escape(h.substr(1)):'')+
'" type="text/javascript" charset="utf-8"></sc'+'ript>')})();
</script><script>utmx("url",'A/B');</script>
<!-- End of Google Website Optimizer Control Script -->


     
</head>
<body id="test-b">
<div class="container">

    <!--HEADER-->
    <div class="header">
    	<span class="txt-usc">University of Southern California</span>
    	<div class="logo-tab">University of Southern California</div>
    	<h1>Logo</h1>
    </div><!--END header-->
    <!--/-->
    
    

    
    <!--CONTENT-->
        <div class="content clearfix">
            <div class="col1">
            	<div class="form-wrap">
            		
<form action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST" id="FormName" method="POST" name="myform" onsubmit="return validation(this);" class="validate"> 

<input type="hidden" name="oid" value="00D80000000Ksky" /> 
<input type="hidden" name="retURL" value="http://mat.usc.edu/MAT/thank-you.html" /> 
 
<h3>Get more information today!</h3> 

<table cellspacing="0">
 
	<tr>
		<td colspan="2" width="217">
			<label id="name" for="first_name">First Name</label> 
			<div id="firstField"> 
				<input name="first_name" type="text" id="first_name" size="15" class="required" minlength="2" /> 
			</div> 
		</td>
		<td colspan="2" width="217">
			<label id="last" for="last_name">Last Name</label>
			<div id="lastField"> 
				<input name="last_name" type="text" id="last_name" size="15" class="required" minlength="2"/> 
			</div> 
		</td>
	</tr>
	
	<tr>
		<td colspan="4">
			<label id="email" for="emailfield">Email</label> 
			<div id="emailField"> 
				<input name="email" type="text" id="emailfield" size="32" class="required email"/> 
			</div> 
		</td>
	</tr>
	
	<tr>
		<td colspan="4">
			<label id="phone" for="phone2">Phone (XXX-XXX-XXXX)</label> 
			<div id="phoneField"> 
				<input name="phone" type="text" id="phone2" size="32" class="required" minlength="9"/> 
			</div> 
		</td>
	</tr>
	
	<tr>
		<td colspan="3">
			<label id="zip" for="zipCode">Zip</label> 
			<div id="zipField"> 
				<input name="00N80000002hS8y" type="text" id="zipCode" size="15" class="required" minlength="5"/> 
			</div> 
		</td>
		
		<td>
			<label id="state" for="state2">State</label> 
			<div id="stateField"> 
				<select name="00N80000002hSKh" id="state2" class="required"> 
					<option selected value=""></option> 
					<option value="AK">AK</option> 
					<option value="AL">AL</option> 
					<option value="AR">AR</option> 
					<option value="AZ">AZ</option> 
					<option value="CA">CA</option> 
					<option value="CO">CO</option> 
					<option value="CT">CT</option> 
					<option value="DC">DC</option> 
					<option value="DE">DE</option> 
					<option value="FL">FL</option> 
					<option value="GA">GA</option> 
					<option value="HI">HI</option> 
					<option value="IA">IA</option> 
					<option value="ID">ID</option> 
					<option value="IL">IL</option> 
					<option value="IN">IN</option> 
					<option value="KS">KS</option> 
					<option value="KY">KY</option> 
					<option value="LA">LA</option> 
					<option value="MA">MA</option> 
					<option value="MD">MD</option> 
					<option value="ME">ME</option> 
					<option value="MI">MI</option> 
					<option value="MN">MN</option> 
					<option value="MO">MO</option> 
					<option value="MS">MS</option> 
					<option value="MT">MT</option> 
					<option value="NC">NC</option> 
					<option value="ND">ND</option> 
					<option value="NE">NE</option> 
					<option value="NH">NH</option> 
					<option value="NJ">NJ</option> 
					<option value="NM">NM</option> 
					<option value="NV">NV</option> 
					<option value="NY">NY</option> 
					<option value="OH">OH</option> 
					<option value="OK">OK</option> 
					<option value="OR">OR</option> 
					<option value="PA">PA</option> 
					<option value="RI">RI</option> 
					<option value="SC">SC</option> 
					<option value="SD">SD</option> 
					<option value="TN">TN</option> 
					<option value="TX">TX</option> 
					<option value="UT">UT</option> 
					<option value="VA">VA</option> 
					<option value="VT">VT</option> 
					<option value="WA">WA</option> 
					<option value="WI">WI</option> 
					<option value="WV">WV</option> 
					<option value="WY">WY</option> 
				</select> 
			</div> 
		</td>
	</tr>
	
	<tr>
		<td colspan="4">
			<label id="description" for="description2">Which best describes you?</label> 
			<div id="descriptionField"> 
				
				<input type="radio" name="00N80000002UJr8" value="MAT with Teaching Credential" /><label>Aspiring teacher</label>
				<input type="radio" checked="checked" name="00N80000002UJr8" value="MAT" /><label>Current teacher</label>
							
				<!--<select name="00N80000002UJr8" id="description2"> 
					<option selected value="">Select One</option> 
					<option value="MAT with Teaching Credential"></option> 
					<option value="MAT"></option> 
				</select> -->
			</div>
		</td>
	</tr>
	
	<tr>
		<td colspan="2">
			<label id="education" for="education2">Highest Level of Education</label> 
			<div id="educationField"> 
				<select name="00N80000002hSJL" id="education2" class="required"> 
					<option selected value="">Select One</option> 
					<option value="High School">High School</option> 
					<option value="Associates Degree">Associates Degree</option> 
					<option value="Senior in College">Senior in College</option> 
					<option value="Bachelors in Progress">Bachelors in Progress</option> 
					<option value="Bachelors">Bachelors</option> 
					<option value="Masters in Progress">Masters in Progress</option> 
					<option value="Masters">Masters</option> 
					<option value="Doctorate in Progress">Doctorate in Progress</option> 
					<option value="Doctorate">Doctorate</option> 
					<option value="Advanced Degree">Advanced Degree</option> 
				</select> 
			</div> 
		</td>
		<td colspan="2">

			<label id="gpa" for="gpaRange">Undergraduate GPA Range</label> 
			<div id="gpaField"> 
				<select name="00N80000004FxJD" id="gpaRange" title="Stated GPA Range" class="required"> 
					<option selected value="">Select One</option> 
					<option value="4.00 and above">4.00 and above</option> 
					<option value="3.99 - 3.50">3.99 - 3.50</option> 
					<option value="3.49 - 3.00">3.49 - 3.00</option> 
					<option value="2.99 - 2.50">2.99 - 2.50</option> 
					<option value="2.49 and below">2.49 and below</option> 
				</select>
			</div> 
		</td>
	</tr>
</table>
 
<input type="hidden" name="sfga" value="00D80000000Ksky"/>

<?php $s = ($_GET['s']) ? $_GET['s'] : ''; ?>

<?php $s = ($s=='') ? 'web' : $s ?>

<?php if($s=='grad') { $s = 'GRE'; } ?>
<?php if($s=='teach') { $s = 'TFA'; } ?>
<?php if($s=='ik') { $s = 'Intermark'; } ?>
<?php if($s=='null') { $s = 'web'; } ?>

<input id="lead_source" name="lead_source" type="hidden" value="<?php echo $s; ?>" />


<?php $l = ($_GET['l']) ? $_GET['l'] : ''; ?>
<input type="hidden" id="00N8000000304f8" name="00N8000000304f8" title="Landing Page" value="<?php echo $l; ?>" />




<div id="submit"> 
	<input name="submitBtn" type="image" id="submitBtn" src="images/btn-request.jpg" alt="Request Information" /> 
</div> 

<div class="disclaimer"><em>We promise never to spam you</em></div>
 
</form>
	
            	</div><!--/form-wrap-->
            
            
            </div><!--end col1-->
            
            <div class="col2">
            	<div class="section1">
	            	<h2>The USC Rossier School of Education's</h2>
	            	
	            	<div class="logo-indent">offers:</div>
	            
	            	<ul>
	            		
	            		<li>Interactive online learning &amp; field-based experiences</li>
	            		<li>Innovative tuition reimbursement program</li>
	            		<li>Accelerated program; complete in as little as 12 months</li>
	            		
	            		<li>Become part of the elite USC Trojan Family</li>
	            	</ul>
            	</div><!--/section1-->
            	
            	<div class="section2">
            		
            		<h5>MAT@USC Students Are:</h5>
            	
            		<div class="left">
            			<h4>Aspiring Teachers</h4>
            			<p>Earn your Masters degree and become recommended for a teaching certificate in your home state.</p>            		
            		</div>
            		<div class="right">
            			<h4>Current Teachers</h4>
            			<p>Elevate your career by earning an advanced degree.</p>            		
            		</div>
            	</div><!--/section2-->
            	
            	<div class="logo-usc-rossier">USC Rossier School of Education</div>
            	
            	

            
            
            </div><!--end col2-->   
        </div><!--END content-->
    <!--/-->
    
    
    
    

</div>
<!--END CONTAINER-->


<!--FOOTER--> 
<div class="footer-wrap">
	<div class="footer">
	
	    	<h6>USC Rossier School of Education</h6>
	<div><strong>MAT@USC Admissions:</strong> 1-888-MAT-1USC (888-628-1872)  |  &copy;2009 USC Rossier School of Education. All rights reserved.  |  <strong>MAT@USC:</strong> <a href="http://mat.usc.edu/MAT/" title="Master of Arts in Teaching Delivered Online">Master of Arts in Teaching Delivered Online</a></div>
	   
	</div><!--END footer-->
</div>

<img width=1 height=1 border=0 src="http://ad.trafficmp.com/a/bpix?adv=1396&id=1&r=">


<SCRIPT language="javascript" src="http://www.nobsads.net/pixel.track?CID=121258&TID=LEAD_ID_HERE"></SCRIPT>
<NOSCRIPT><IMG src="http://www.nobsads.net/pixel.track?CID=121258&p=img&TID=LEAD_ID_HERE" width="1" height="1" border="0"></NOSCRIPT> 

<img src='https://a.rfihub.com/ca.gif?rb=422&ca=2150&ct=REPLACE_ME_WITH_YOUR_CACHE_BUSTING' height=0 width=0 style='display:none' alt='Rocket Fuel'/>


<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>

<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-2468466-13");
pageTracker._trackPageview(); </script> 

<script type="text/javascript" src="http://cetrk.com/pages/scripts/0004/4384.js"> </script>

<iframe src='http://pixel.fetchback.com/serve/fb/pdc?cat=&name=landing&sid=2556' scrolling='no' width='1' height='1' marginheight='0' marginwidth='0' frameborder='0'></iframe>


<script src="validatious.js" type="text/javascript"></script>

<script type="text/javascript">
  v2.Field.prototype.successClass = 'success';
  v2.Field.prototype.instant = true;
  v2.Field.prototype.displayErrors = 0;
  v2.Field.prototype.positionErrorsAbove = false;
  v2.Fieldset.prototype.positionErrorsAbove = false;
</script>


<img src='http://pixel2494.everesttech.net/2494/t?ev_usc_lead=1' width='1' height='1'/>



<!-- Google Website Optimizer Tracking Script -->
<script type="text/javascript">
if(typeof(_gat)!='object')document.write('<sc'+'ript src="http'+
(document.location.protocol=='https:'?'s://ssl':'://www')+
'.google-analytics.com/ga.js"></sc'+'ript>')</script>
<script type="text/javascript">
try {
var gwoTracker=_gat._getTracker("UA-11488725-5");
gwoTracker._trackPageview("/3763702025/test");
}catch(err){}</script>
<!-- End of Google Website Optimizer Tracking Script -->



 
</body>
</html>
<!--/-->