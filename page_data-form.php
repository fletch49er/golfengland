<?php
/**
 * Template Name: Course Profile Form
*/
// include external php data file
include_once ('php/ge_data.php');
// include external php data file
include_once ('php/regexp.php');

// open link to wp database
global $wpdb;

// sanitize data
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data, ENT_QUOTES);
  return $data;
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Course Profile Form</title>

<!-- custom stylesheets -->
<link rel="stylesheet" type="text/css" href="<?PHP echo get_template_directory_uri(); ?>/css/data_form.css" />
</head>

<body>
<?php
if(post_password_required()) :
  echo get_the_password_form();
else :
?>
<div id="wrapper" class="clearfix">
	<div id="header">
		<img id="hdr-img" src="<?php echo IMG_URL2; ?>logos/geb-logo_red.png" alt="geb-logo.png" />
	</div><!-- end #header -->

	<h1>COURSE PROFILE FORM</h1>

<?php
if(!isset($_POST['submit'])) :

get_template_part('templates/course-profile_data_form');

else :

  // set $valid value
  $valid = true;

  // drop submit from the end of the $_POST array
  $popResult = array_pop($_POST);
  // assign variables to POST submissions
  foreach($_POST as $key => $value) :
    if (preg_match('/f_/', $key)) {
      $key = ltrim($key, 'f_');
    }
    // sanitize and assign POST data to variables
    ${$key} = test_input($value);
    // set regexp patterns for data > 1 and not text blocks
    if (($value != null) && strlen($value) > 1 && ($key != 'description' && $key != 'directions' && $key != 'special_offers')) :
      //validate submitted data
      // set regexp pattern
      switch ($key) {
        case ($key == 'facebook' || $key == 'twitter' || $key == 'instagram' || $key == 'youtube'):
          $pattern = 'socialPattern';
          break;
        case ($key == 'description' || $key == 'directions' || $key == 'special_offers'):
          $pattern = 'textPattern';
          break;
        case ($key == 'wkday_rnd' || $key == 'wkday_day' || $key == 'wkend_rnd' || $key == 'wkend_day'):
          $pattern = 'feePattern';
          break;
        case 'course_lat':
          $pattern = 'latPattern';
          break;
        case 'course_lng':
          $pattern = 'lngPattern';
          break;
        default:
          $pattern = $key.'Pattern';
          break;
      } // end regexp pattern selection
      // validate data ($)
      if (!preg_match(${$pattern}, ${$key})) :
        echo '<p style="color: #f00;">ERROR: Please provide a valid '.$key.'.<br />'.PHP_EOL;
        switch ($key) {
          case 'name':
            echo '(e.g. "club name")</p>'.PHP_EOL;
            break;
          case 'address':
            echo '(e.g. "address, city, postcode")</p>'.PHP_EOL;
            break;
          case 'region':
            echo '(select a drop down option)</p>'.PHP_EOL;
            break;
          case 'type':
            echo '(select a drop down option)</p>'.PHP_EOL;
            break;
          case 'par':
            echo '(e.g. "71")</p>'.PHP_EOL;
            break;
          case 'length':
            echo '(e.g. "6789")</p>'.PHP_EOL;
            break;
          case 'telephone':
            echo '(e.g. "0123 123 1234" or "01234 123456")</p>'.PHP_EOL;
            break;
          case 'website':
            echo '(e.g. "https://www.yourdomainname.com")</p>'.PHP_EOL;
            break;
          case 'email':
            echo '(e.g. "yourname@emailaddress.com" or "yourname@emailaddress.co.uk")</p>'.PHP_EOL;
            break;
          case ($key == 'description' || $key == 'directions' || $key == 'special_offers'):
            echo '(e.g. plain text - no HTML etc.)</p>'.PHP_EOL;
            break;
          case ($key == 'wkday_rnd' || $key == 'wkday_day' || $key == 'wkend_rnd' || $key == 'wkend_day'):
            echo 'Green Fee (e.g. "40" or "40.50")</p>'.PHP_EOL;
            break;
          case 'course_lat':
            echo '(e.g. latitude "56.12345")</p>'.PHP_EOL;
            break;
          case 'course_lng':
            echo ' (e.g. longitude "-3.12345")</p>'.PHP_EOL;
            break;
          default:
            echo '</p>'.PHP_EOL;
            break;
          } // end error message select
        // set valid to false
        $valid = false;
      endif; // end validate data
    endif; // end data type filter
    $formData[$key] = ${$key};
    // echo $formData[$key].'<br />';
  endforeach;

  if ($valid == false) :
    // display error prompt
  	echo '<h3>Please return to the <a href="">data-form</a> and enter the correct data.</h3>'.PHP_EOL;
  elseif ($valid == true) :
    // if valid then allow submit and email data
    // intialize variables
    $names = '';
    $values = '';
    $count = 0;
    // build sql strings
    foreach ($formData as $key => $value) :
      if($value != null) {
        if ($count < count($formData)-1) {
          $names .= '`'.$key.'`, ';
          $values .= '\''.$value.'\', ';
        } else {
          $names .= '`'.$key.'`';
          $values .= '\''.$value.'\'';
        }
      }
      $count ++;
    endforeach;

  	// formulate and send email message
  	$to = 'mark@mdagolfmedia.com';
  	$from = 'golfengland.biz';
  	$subject = 'ENGLISH COURSE PROFILE: '.$formData['name'].'';
  	$body = "INSERT INTO gs_courses\r (".$names.")\r VALUES\r (".$values.")";

  	// echo nl2br($body);

  	//Display email success/fail prompt
  	if(mail($to, $subject, $body, "From: $from"))	{
  		echo '<b class="green">FORM SENT SUCCESSFULLY!</b>'.PHP_EOL;
      echo '<p><b>Return to <a href="https://www.golfengland.biz">golfengland.biz</a> homepage</b></p>'.PHP_EOL;
  	}	else {
  		echo '<b class="red">ERROR: Mail delivery error!</b>'.PHP_EOL;
  	} // end if 'mail'
  endif; // end if $valid

endif; // end if isset
?>

	<div id="footer" class="clearfix">
		<img id="ftr-img" src="<?php echo IMG_URL2; ?>logos/mda-logo.png" alt="mda logo" />
	</div><!-- end #footer -->
</div><!-- end #wrapper -->

<?php endif; ?>

</body>
</html>
