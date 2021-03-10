<?php
/*
 * ========================================================================
 * File:		ge_data.php
 * Purpose: string variables, data arrays to populate website
 *			  	with dynamic content
 *
 * Author:	Mark Fletcher
 * Date:		20.11.2020
 *
 * Notes:
 *
 * Revision:
 *		20.11.2019	1st issue.
 *
 * ========================================================================
*/
// define constants
// company details
define ('COMPANY', 'MDA Media Ltd');
define ('OWNER', 'Alan Hunter');
define ('COMPANYNO', 'SC663153');
define ('ADDRESS', 'Suite 3 & 4 Orbital House, 3 Redwood Crescent, East&nbsp;Kilbride G74 5PA, Scotland');
define ('TELEPHONE','+44&nbsp;7423&nbsp;608374');
define ('NAME', 'golfengland.biz');
define ('WEBSITE', 'https://www.golfengland.biz');
define ('EMAIL', 'info@golfengland.biz');
define ('VATNO', '349&nbsp;9373&nbsp;46');
define ('PUB_DATE', '01/03/2021');

// Google Keys
// Analytics Key
define ('ANALYTIC_KEY', 'G-HL7BH1RFD3');
// Google Maps API Key
define ('MAP_KEY', 'AIzaSyCE3IFYWy97xXMXQwino19VQmT7huIRByk');

// navbar seperator
define('SEPERATOR', '|');

// url constants
define ('SITE_URL', 'https://www.golfengland.biz/course/');
define ('IMG_URL', 'https://www.golfengland.biz/wp-content/uploads/');

// social media urls
define ('FACEBOOK', 'https://www.facebook.com/');
define ('TWITTER', 'https://twitter.com/');
define ('INSTAGRAM', 'https://www.instagram.com/');
define ('YOUTUBE_CHNL', 'https://www.youtube.com/channel/');
define ('YOUTUBE_VID', 'https://www.youtube.com/embed/');

// policies t&cs data array
$ftr_navbar_data = [
	'site map' => 'sitemap',
	'terms &amp; conditions' => 'terms-conditions',
	'privacy policy' => 'privacy-policy',
	'disclaimer' => 'disclaimer',
	'copyright' => 'copyright'
];


// array of data form placeholders
$placeholder = [
	'name' => 'club or course name',
	'address' => 'your address including postcode',
	'select' => 'select an option',
	'par' => 'par',
	'length' => 'yards',
	'phone' => 'telephone number',
	'website' => 'https://www.yourdomainname.com',
	'email' => 'your@emailaddrss.com',
	'facebook' => 'yourusername',
	'twitter' => 'yourusername',
	'instagram' => 'yourusername',
	'youtube' => 'yourchannelname'
];
?>
