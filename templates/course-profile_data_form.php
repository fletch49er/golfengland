<?php
// query strings to fetch course region and type data
$region_query = 'SELECT id, region FROM ge_course_regions';
$type_query = 'SELECT id, type FROM ge_course_types';

// array of form field placeholders
$placeholder = [
	'name' => 'club or course name',
	'address' => 'your address including postcode',
	'select' => 'select an option',
	'par' => 'par',
	'length' => 'yards',
	'phone' => 'telephone number',
	'website' => 'https://www.yourdomainname.com',
	'email' => 'your@emailaddress.com',
	'facebook' => 'yourusername',
	'twitter' => 'yourusername',
	'instagram' => 'yourusername',
	'youtube' => 'channelcode'
];

// set variables
$gs_required = '';
?>

  <form id="gs-form" method="post" action="">
    <div id="course-details">
      <h2>COURSE DETAILS</h2>
      <p class="note">NOTE: <span class="red">*</span> Denotes a required field.</p>
			<div class="row">
				<div class="col-15">
	      	<label for="f_name"><span class="red">*</span>Name:</label>
				</div>
				<div class="col-85">
	      	<input type="text" id="name" name="f_name" placeholder="<?php echo $placeholder['name']; ?>" maxlength="100" required /><br />
				</div>
			</div>
			<div class="row">
				<div class="col-15">
	      	<label for="address"><span class="red">*</span>Address:</label>
				</div>
				<div class="col-85">
	      	<input type="text" id="address" name="address" placeholder="<?php echo $placeholder['address']; ?>" maxlength="150" required /><br />
				</div>
			</div>
			<div class="row">
				<div class="col-15">
	      	<label for="region"><span class="red">*</span>Region:</label>
				</div>
				<div class="col-25">
		      <select id="region" name="region" required>
		        <option value="" disabled selected><?php echo $placeholder['select']; ?></option>

<?php
// fetch regions data and display
$regions = $wpdb->get_results($region_query);
foreach($regions as $region) {
  echo '<option value="'.$region->id.'">'.$region->region.'</option>'.PHP_EOL;
}
?>

					</select>
				</div>
			</div><!-- end #row -->
			<div class="row">
				<div class="col-15">
		      <label for="type"><span class="red">*</span>Type:</label>
				</div>
				<div class="col-25 right-10">
		      <select id="type" name="type" required>
		        <option value="" disabled selected><?php echo $placeholder['select']; ?></option>

<?php
// fetch types data and display
$types = $wpdb->get_results($type_query);
foreach($types as $id => $type) {
  echo '<option value="'.$type->id.'">'.$type->type.'</option>'.PHP_EOL;
}
?>
		     	</select>
				</div>
				<div class="col-10">
		      <label for="par"><span class="red">*</span>Par:</label>
				</div>
				<div class="col-10 right-10">
		      <input type="text" id="par" name="par" placeholder="<?php echo $placeholder['par']; ?>" maxlength="3" required />
				</div>
				<div class="col-18">
		      <label for="length"><span class="red">*</span>Length (yrds):</label>
				</div>
				<div class="col-10">
		      <input type="text" id="length" name="length" placeholder="<?php echo $placeholder['length']; ?>"  maxlength="6" required />
				</div>
			</div><!-- end #row -->
    </div><!-- end #course-details -->

    <div id="contact-details">
      <h2>CONTACT DETAILS</h2>
      <h3>Direct:</h3>
      <p class="note">NOTE: <span class="red">*</span> Denotes a required field.</p>
			<div class="row">
				<div class="col-15">
      		<label class="detail-label1" for="telephone"><span class="red">*</span>Telephone:</label>
				</div>
				<div class="col-85">
      		<input type="text" id="telephone" name="telephone" placeholder="<?php echo $placeholder['phone']; ?>" max-length="25" required />
				</div>
			</div>
			<div class="row">
				<div class="col-15">
      		<label class="detail-label1" for="website"><span class="red">*</span>Website:</label>
				</div>
				<div class="col-85">
      		<input type="text" id="website" name="website" placeholder="<?php echo $placeholder['website']; ?>" max-length="75" required /><br />
				</div>
			</div>
			<div class="row">
				<div class="col-15">
      		<label class="detail-label1" for="f_email"><span class="red">*</span>Email:</label>
				</div>
				<div class="col-85">
      		<input type="email" id="email" name="f_email" placeholder="<?php echo $placeholder['email']; ?>" max-length="75" required /><!-- onblur="validate('<?php echo $emailPattern; ?>', 'email')" -->
				</div>
			</div>
      <h3>Social Media:</h3>
      <p class="note">NOTE: Please leave blank if not applicable.</p>
			<div class="row">
				<div class="col-15">
      		<label class="detail-label1" for="facebook">Facebook:</label>
				</div>
				<div class="col-85">
      		<input type="text" id="facebook" name="facebook" placeholder="<?php echo $placeholder['facebook']; ?>" max-length="75" />
				</div>
			</div>
			<div class="row">
				<div class="col-15">
      		<label class="detail-label1" for="twitter">Twitter:</label>
				</div>
				<div class="col-85">
      		<input type="text" id="twitter" name="twitter" placeholder="<?php echo $placeholder['twitter']; ?>" max-length="75" />
				</div>
			</div>
			<div class="row">
				<div class="col-15">
      		<label class="detail-label1" for="instagram">Instagram:</label>
				</div>
				<div class="col-85">
		      <input type="text" id="instagram" name="instagram" placeholder="<?php echo $placeholder['instagram']; ?>" max-length="75" />
				</div>
			</div>
			<div class="row">
				<div class="col-15">
      		<label class="detail-label1" for="youtube">YouTube:</label>
				</div>
				<div class="col-85">
      		<input type="text" id="youtube" name="youtube" placeholder="<?php echo $placeholder['youtube']; ?>" max-length="75" />
				</div>
			</div>

      <h2>ADDITIONAL INFORMATION</h2>
      <h3>Description:</h3>
      <p class="note">NOTE: Please leave blank if not applicable.</p>
			<div class="row">
				<label class="detail-label1" for="description"></label>
      	<textarea id="description" name="description" cols="127" placeholder="enter a short course description"></textarea>
			</div>

      <h3>Green Fees:</h3>
      <p class="note">NOTE: Please leave blank if not applicable.</p>
			<div class="row">
				<div class="col-50">
		      <h4>Weekday:</h4>
					<div class="row">
						<div class="col-30">
		      		<label for="wkday_rnd">Round Ticket: £</label>
						</div>
						<div class="col-15">
		      		<input type="text" id="wkday_rnd" name="wkday_rnd" placeholder="0.00" size="10" max-length="10" />
						</div>
					</div>
					<div class="row">
						<div class="col-30">
		      		<label for="wkday_day">Day Ticket: £</label>
						</div>
						<div class="col-15">
		      		<input type="text" id="wkday_day" name="wkday_day" placeholder="0.00" size="10" max-length="10" />
						</div>
					</div>
				</div>
				<div class="col-50">
		      <h4>Weekend:</h4>
					<div class="row">
						<div class="col-30">
			      	<label for="wkend_rnd">Round Ticket: £</label>
						</div>
						<div class="col-15">
			      	<input type="text" id="wkend_rnd" name="wkend_rnd" placeholder="0.00" size="10" max-length="10" />
						</div>
					</div>
					<div class="row">
						<div class="col-30">
			      	<label for="wkend_day">Day Ticket: £</label>
						</div>
						<div class="col-15">
			      	<input type="text" id="wkend_day" name="wkend_day" placeholder="0.00" size="10" max-length="10" />
						</div>
					</div>
				</div>
			</div>
      <h3>Directions:</h3>
      <p class="note">NOTE: Please leave blank if not applicable.</p>
      <label class="detail-label1" for="directions"></label>
      <textarea id="directions" name="directions" cols="127" placeholder="enter directions to the course"></textarea>

      <h3>Course Location:</h3>
      <p class="note">NOTE: Please leave blank if not applicable.</p>
			<div class="row">
				<div class="col-15">
			    <label for="course_lat">Latitude:</label>
				</div>
				<div class="col-15 right-20">
			    <input type="text" id="course_lat" name="course_lat" placeholder="56.76236" max-length="10" />
				</div>
				<div class="col-15">
			    <label  for="course_lng">Longitude:</label>
				</div>
				<div class="col-15">
			    <input type="text" id="course_lng" name="course_lng" placeholder="-3.76236" max-length="10" />
				</div>
			</div>

      <h3>Special Offers:</h3>
      <p class="note">NOTE: Please leave blank if not applicable.</p>
      <label class="detail-label1" for="special_offers"></label>
      <textarea id="special_offers" name="special_offers" cols="127" placeholder="enter course special offers"></textarea>

      <h3>Golf Course Features and Facilities:</h3>
      <p class="note">NOTE: Tick each box that is appropriate.</p>
      <div id="main-feat">
        <div class="features">
          <label class="detail-label4" for="trolly_hire">Trolly Hire:</label>
          <input type="checkbox" id="trolly_hire" name="trolly_hire" value="1" /><br />
          <label class="detail-label4" for="catering">Catering Available:</label>
          <input type="checkbox" id="catering" name="catering" value="1" /><br />
          <label class="detail-label4" for="club_hire">Club Hire:</label>
          <input type="checkbox" id="club_hire" name="club_hire" value="1" /><br />
          <label class="detail-label4" for="clubhouse">Clubhouse:</label>
          <input type="checkbox" id="clubhouse" name="clubhouse" value="1" /><br />
          <label class="detail-label4" for="showers">Showers:</label>
          <input type="checkbox" id="showers" name="showers" value="1" /><br />
        </div>
        <div class="features">
          <label class="detail-label4" for="changing_rooms">Changing Rooms:</label>
          <input type="checkbox" id="changing_rooms" name="changing_rooms" value="1" /><br />
          <label class="detail-label4" for="driving_range">Driving Range:</label>
          <input type="checkbox" id="driving_range" name="driving_range" value="1" /><br />
          <label class="detail-label4" for="club_hire">Proshop:</label>
          <input type="checkbox" id="proshop" name="proshop" value="1" /><br />
          <label class="detail-label4" for="putting_area">Putting Area:</label>
          <input type="checkbox" id="putting_area" name="putting_area" value="1" /><br />
          <label class="detail-label4" for="buggy_hire">Buggy Hire:</label>
          <input type="checkbox" id="buggy_hire" name="buggy_hire" value="1" /><br />
        </div>
        <div class="features">
          <label class="detail-label4" for="tuition">Tuition Available:</label>
          <input type="checkbox" id="tuition" name="tuition" value="1" /><br />
          <label class="detail-label4" for="conference_faclities">Conference Faclities:</label>
          <input type="checkbox" id="conference_faclities" name="conference_faclities" value="1" /><br />
          <label class="detail-label4" for="function_room">Function Room:</label>
          <input type="checkbox" id="function_room" name="function_room" value="1" /><br />
          <label class="detail-label4" for="corporate_golf">Corporate Golf:</label>
          <input type="checkbox" id="corporate_golf" name="corporate_golf" value="1" /><br />
          <label class="detail-label4" for="society_golf">Society Golf:</label>
          <input type="checkbox" id="society_golf" name="society_golf" value="1" />
        </div>

				<h3>Additional Notes on Features:</h3>
	      <p class="note">NOTE: Please leave blank if not applicable.</p>
	      <label class="detail-label1" for="feature_note"></label>
	      <textarea id="feature_note" name="feature_note" cols="127" placeholder="enter any addittional course facilities/ features"></textarea>
      </div><!-- end #main-feat -->
    </div><!-- end #contact-details -->

    <div id="submit-button">
      <input type="submit" name="submit" value="Submit Form" />
    </div><!-- end #submit-button -->
  </form><!-- end #gs-form -->
