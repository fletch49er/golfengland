<?php
/**
 * Template Name: English Courses Page
 */

// set data query ge_courses table - course details
$course_query = 'SELECT c.id, c.name, cr.region, ct.type, c.length, c.par, c.top_course, c.img_logo FROM ge_courses AS c INNER JOIN ge_course_types AS ct ON c.type = ct.id INNER JOIN ge_course_regions AS cr ON c.region = cr.id';

// query string to fetch course region and type data
$region_query = 'SELECT id, region FROM ge_course_regions';
$type_query = 'SELECT id, type FROM ge_course_types';

// if $_GET does not exist
if(!isset($_GET['region'])) :
	$_GET = ['region' => '', 'type' => '', 'top_course' => true];
	$list_header = "Top Ten Courses:";
else :
	$list_header = "List of Courses Found:";
endif;

$count = 1;
// set course search query string
foreach($_GET as $name => $value) :

	// change html characters to unicode equivilant
	$search_query = htmlspecialchars($value);
	// makes sure nobody uses SQL injection
	$search_query = esc_sql($search_query);

	// edit query to display search query selections if not null,
	// else display 'all'
	if($search_query != null) {
		if($count > 1) {
			$course_query .= ' AND c.'.$name.' = '.$search_query;
		} else {
			$course_query .= ' WHERE c.'.$name.' = '.$search_query;
		}
		$count++;
	}
endforeach;

$course_query .= ' AND c.switch = true ORDER BY ';
// group by region order name
if($_GET['region'] == null) {
	$course_query .= 'region, ';
}
// sort by name (ascending)
$course_query .= 'name ASC';
// fetch search result
$courses = $wpdb->get_results("".$course_query."");

// open link to wp database
global $wpdb;

get_header();

get_template_part( 'templates/top-title' );

// set url paths
$url = SITE_URL;
$img_path = IMG_URL;
$video_path = YOUTUBE_VID;

// set default image
$img = '2021/01/ge-icon_white.png';
?>

<div id="gs-wrapper">
	<section id="gs-content" class="clearfix">
		<div id="gs-search-form-container">
			<form id="gs-search-form" action="english-courses" method="get">
				<div class="gs-query-box">
					<select id="gs-query-region" name="region">
						<option value="" selected>All Regions</option>
<?php
	$regions = $wpdb->get_results("".$region_query."");
	foreach($regions as $region) :
?>
						<option value="<?php echo $region->id; ?>"><?php echo $region->region; ?></option>
<?php endforeach; ?>
					</select>
				</div><!-- end .gs-query-box -->
				<div class="gs-query-box">
					<select id="gs-query-type" name="type">
						<option value="" selected>All Types</option>
<?php
	$types = $wpdb->get_results("".$type_query."");
	foreach($types as $type) :
?>
						<option value="<?php echo $type->id; ?>"><?php echo $type->type; ?></option>
<?php endforeach; ?>
					</select>
				</div><!-- end .gs-query-box -->
				<div class="gs-submit-box">
					<input id="gs-search-button" type="submit" value="SEARCH" />
				</div><!-- end .gs-submit-box -->
			</form><!-- end #gs-search-form -->
		</div><!-- end #gs-search-form-container -->

		<h2><?php echo $list_header; ?></h2>
<?php
	if((count($courses)) == 0) {
		echo '<p>Sorry no course of that type found in this region.</p>';
	} else /*if(count($courses) < 25)*/ {
		plus25($courses, $url, $img_path, $img);
	}
?>
	</section><!-- end #gs-content -->
</div><!-- end #gs-wrapper -->

<?php get_footer(); ?>
