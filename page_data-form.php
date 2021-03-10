<?php
/**
 * Template Name: Course Profile Form
 */
// include external php data file
include_once ('php/gs_data.php');
//get_header();

//get_template_part('templates/top-title');

$gs_required = '';
?>
<!-- custom golf scotland stylesheets -->
<link rel="stylesheet" type="text/css" href="<?PHP echo get_template_directory_uri(); ?>/css/data_form.css" />

<div id="wrapper">
	<div id="header">
		<img id="hdr-img" src="images/gs-logo_blue.png" width="150" height="59" border="0"/>
	</div><!-- end #header -->

	<h1>COURSE PROFILE FORM</h1>
<?php if(!isset($_POST['submit'])) : ?>
	<form id="gs-form" method="post" action="https://www.golfscotland.net/data-form/">
		<div id="course-details">
			<h2>COURSE DETAILS</h2>
			<p class="note">NOTE: <span class="red">*</span> Denotes a required field.</p>
			<label class="detail-label1" for="name"><span class="red">*</span>Name:</label>
			<input type="text" id="name" name="name" placeholder="<?php echo $placeholder['name']; ?>" size="85" maxlength="100" required /><br />
			<label class="detail-label1" for="address"><span class="red">*</span>Address:</label>
			<input type="text" id="address" name="address" placeholder="<?php echo $placeholder['address']; ?>" size="85" maxlength="150" required /><br />
			<label class="detail-label1" for="region"><span class="red">*</span>Region:</label>
			<select id="region" name="region" required>
				<option value="" disabled selected><?php echo $placeholder['select']; ?></option>
<?php
	foreach($gs_regions as $region) {
		echo  '<option value="'.$region.'">'.$region.'</option>'.PHP_EOL;
	}
?>
			</select><br />
			<label class="detail-label1" for="course_type"><span class="red">*</span>Type:</label>
			<select id="course_type" name="course_type" required>
				<option value="" disabled selected><?php echo $placeholder['select']; ?></option>
<?php
	foreach($gs_types as $type) {
		echo  '<option value="'.$type.'">'.$type.'</option>'.PHP_EOL;
	}
?>
			</select>
			<label class="detail-label2" for="par"><span class="red">*</span>Par:</label>
			<input type="text" id="par" name="par" placeholder="<?php echo $placeholder['par']; ?>" size="10" maxlength="3" required />
			<label class="detail-label2" for="length"><span class="red">*</span>Length:</label>
			<input type="text" id="length" name="length" placeholder="<?php echo $placeholder['length']; ?>" size="10" maxlength="6" required /> yrds
		</div><!-- end #course-details -->

		<div id="contact-details">
			<h2>CONTACT DETAILS</h2>
			<h3 class="western">Direct:</h3>
			<p class="note">NOTE: <span class="red">*</span> Denotes a required field.</p>
			<label class="detail-label1" for="telephone"><span class="red">*</span>Telephone:</label>
			<input type="text" id="telephone" name="telephone" placeholder="<?php echo $placeholder['phone']; ?>" size="25" max-length="25" required /><br />
			<label class="detail-label1" for="website"><span class="red">*</span>Website:</label>
			<input type="text" id="website" name="website" placeholder="<?php echo $placeholder['website']; ?>" size="85" max-length="75" required /><br />
			<label class="detail-label1" for="email"><span class="red">*</span>Email:</label>
			<input type="email" id="email" name="email" placeholder="<?php echo $placeholder['email']; ?>" size="85" max-length="75" required />

			<h3>Social Media:</h3>
			<p class="note">NOTE: Please leave blank if not applicable.</p>
			<label class="detail-label1" for="facebook">Facebook:</label>
			<input type="text" id="facebook" name="facebook" placeholder="<?php echo $placeholder['facebook']; ?>" size="85" max-length="75" /><br />
			<label class="detail-label1" for="twitter">Twitter:</label>
			<input type="text" id="twitter" name="twitter" placeholder="<?php echo $placeholder['twitter']; ?>" size="85" max-length="75" /><br />
			<label class="detail-label1" for="instagram">Instagram:</label>
			<input type="text" id="instagram" name="instagram" placeholder="<?php echo $placeholder['instagram']; ?>" size="85" max-length="75" />

			<h3>Description:</h3>
			<p class="note">NOTE: Please leave blank if not applicable.</p>
			<label class="detail-label1" for="description"></label>
			<textarea id="description" name="description" cols="127" placeholder="enter a short course description"></textarea>

			<h3>Green Fees:</h3>
			<p class="note">NOTE: Please leave blank if not applicable.</p>
			<h4>Weekday:</h4>
			<label class="detail-label2" for="wkday_rnd">Round Ticket: £</label>
			<input type="text" id="wkday_rnd" name="wkday_rnd" placeholder="0.00" size="10" max-length="10" />
			<label class="detail-label2" for="wkday_day">Day Ticket: £</label>
			<input type="text" id="wkday_day" name="wkday_day" placeholder="0.00" size="10" max-length="10" />
			<h4>Weekend:</h4>
			<label class="detail-label2" for="wkend_rnd">Round Ticket: £</label>
			<input type="text" id="wkend_rnd" name="wkend_rnd" placeholder="0.00" size="10" max-length="10" />
			<label class="detail-label2" for="wkend_day">Day Ticket: £</label>
			<input type="text" id="wkend_day" name="wkend_day" placeholder="0.00" size="10" max-length="10" />

			<h3>Course Location:</h3>
			<label class="detail-label2" for="course_lat">Latitude:</label>
			<input type="text" id="course_lat" name="course_lat" placeholder="56.76236" size="10" max-length="10" />
			<label class="detail-label2" for="course_lng">Longitude:</label>
			<input type="text" id="course_lng" name="course_lng" placeholder="-3.76236" size="10" max-length="10" />
		</div><!-- end #contact-details -->

		<div id="submit-button">
			<input type="submit" name="submit" value="Submit Form" />
		</div><!-- end #submit-button -->
	</form><!-- end #gs-form -->
<?php
else :

	// set $valid value
	$valid = true;

	// set regular expression patterns for form validation
	$namePattern = "/^[A-Z]{1}[a-z]*\s([A-Z]\s){0,2}(Mc|Mac|O\'){0,1}[A-Z]{1}[a-z]+$/";
	$addressPattern = "";
	$phonePattern =  "/^((\+44\s?\(0\)\s?\d{2,4})|(\+44\s?(01|02|03|07|08)\d{2,3})|(\+44\s?(1|2|3|7|8)\d{2,3})|(\(\+44\)\s?\d{3,4})|(\(\d{5}\))|((01|02|03|07|08)\d{2,3})|(\d{5}))(\s|-|.)(((\d{3,4})(\s|-)(\d{3,4}))|((\d{6,7})))$/";
	$emailPattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/";
	$domainPattern = "/^none|^([a-zA-Z0-9]([a-zA-Z0-9\-]{0,61}[a-zA-Z0-9])\.)+[a-zA-Z0-9]([a-zA-Z0-9\-]{0,61}[a-zA-Z0-9])?$/";

	//assign variables to POST submissions
	foreach($_POST as $key => $value) {
			${$key} = htmlentities(trim($value), ENT_QUOTES);
			echo ${$key}.'<br />'.PHP_EOL;
	}
	/*
	//validate submitted data
	//check name
	if (!preg_match($namePattern, $name)) {
		echo <<<EOT
			<p style="color: #f00;">
			ERROR: Please provide a valid name.<br />
			(e.g. "forename surname")
			</p>
	EOT;
		$valid = false;
	}

	//check address
	if (!preg_match($namePattern, $address)) {
		echo <<<EOT
			<p style="color: #f00;">
			ERROR: Please provide a valid name.<br />
			(e.g. "forename surname")
			</p>
	EOT;
		$valid = false;
	}

	//check tel
	if (!preg_match($phonePattern, $telephone)) {
		echo <<<EOT
			<p style="color: #f00;">
			ERROR: Please provide a valid telephone number.<br />
			(e.g. "0123 123 1234" or "01234 123456")
			</p>
	EOT;
		$valid = false;
	}

	//check email
	if (!preg_match($emailPattern, $email)) {
		echo <<<EOT
			<p style="color: #f00;">
			ERROR: Please provide a valid email address.<br />
			(e.g. "yourname@emailaddress.com" or "yourname@emailaddress.co.uk")
			</p>
	EOT;
		$valid = false;
	}

	//check url
	if (!preg_match($domainPattern, $domain)) {
		echo <<<EOT
			<p style="color: #f00;">ERROR: Please provide a valid domain name. If none state 'none'.</p>
	EOT;
		$valid = false;
	}

	//check service
	if(empty($_POST['service'])) {
		echo  <<<EOT
			<p style="color: #f00;">ERROR: Please provide at least one service of interest.</p>
	EOT;
		$valid = false;
	}
*/
	//Display error prompt
	if ($valid == false) {
		echo <<<EOT
			<h3>Please click <a href="contact.php">contact</a> and enter the correct form data.</h3>
	EOT;
	}

	//If valid then allow submit and email data
	if ($valid == true) {
		//create $service string
		/*$service ='';
		foreach($_POST['service'] as $serv) {
			$service = $service.$serv.", ";*/
		}

		//formulate and send email message
		$to = 'mark@golfscotland.net';
		$from = 'webmaster@golfscotland.net';
		$subject = 'DATABASE UPDATE: New Entries';
		$body = "INSERT INTO gs_courses\r
		(`name`, `address`, `region`, `type`, `telephone`, `website`, `email`, `facebook`, `twitter`, `instagram`, `type`, `length`, `par`, `description`, `wkday_rnd`, `wkday_day`, `wkend_rnd`, `wkend_day`, `course_lat`, `course_lng`)\r
		VALUES\r
		('$name', '$address', '$region', '$telephone', '$website', '$email', '$facebook', '$twitter', '$instagram', '$type', $length, $par, '$description', $wkday_rtn, $wkday_day, $wkend_rtn, $wkend_day, $course_lat, $course_lng);";

		echo nl2br($body);
		/*
		//Display email success/fail prompt
		if(mail($to, $subject, $body, "From: $from"))	{
			echo 'Thank you for your enquiry.'.PHP_EOL;
		}	else {
			echo 'ERROR: Mail delivery error!'.PHP_EOL;
		} // end if 'mail'
	} // end if $valid*/
?>

<?php endif; ?>
	<div id="footer">
		<img id="ftr-img" src="https://www.golfscotland.net/wp-content/uploads/2020/05/gs-icon240-1-e1591278654912.png" name="Image2" width="51" height="53" alt="GS Logo" />
		<p id="ftr-txt"><a href="https://www.golfscotland.net" target="_blank">golfscotland.net</a></p>
	</div><!-- end #footer -->
</div><!-- end #wrapper -->

<?php //get_footer(); ?>
