<?php
/*
*******************************************************************************
 * File:		footer_imgs.php
 * Purpose: Places partner images and links at the bottom of the page footer
 *
 * Author:	Mark Fletcher
 * Date:		10.06.2020
 *
 * Notes:
 *
 * Revision:
 *
*******************************************************************************
*/
// golf scotland uri
$gs_uri = 'https://www.golfscotland.net/wp-content/uploads/';

$gs_pga = [
	'ept' => [
		'id' => 'gs-ept',
		'url' => 'http://www.europrotour.com/',
		'img' => '2020/05/pga-europro-tour-logo-e1590512511161.png'
	]
];

// pga footer images
$ftr_img = [
	'et' => [
		'id' => 'gs-et',
		'url' => 'https://www.europeantour.com/european-tour/',
		'img' => '2020/09/european-tour_open_graph.png'
	],
	'ct' => [
		'id' => 'gs-ct',
		'url' => 'https://www.europeantour.com/challenge-tour/',
		'img' => '2020/09/challenge-tour_open_graph.png'
	],
	'lt' => [
		'id' => 'gs-lt',
		'url' => 'https://www.europeantour.com/legends-tour/',
		'img' => '2020/12/legends-tour_logo.png'
	],
	'rc' => [
		'id' => 'gs-rc',
		'url' => 'https://www.rydercup.com/',
		'img' => '2020/12/rydercup_logo.png'
	]
];
?>
	<div id="gs-pga-logo" class="gs-sponsor">
		<div id="<?php echo $gs_pga['ept']['id']; ?>">
			<a href="<?php echo $gs_pga['ept']['url']; ?>" style="text-decoration: none;">
				<img src="<?php echo $gs_uri.$gs_pga['ept']['img']; ?>" alt="<?php echo $gs_pga['ept']['id'].' logo'; ?>" />
			</a>
		</div><!-- end .<?php echo $gs_pga['ept']['id']; ?> -->
	</div><!-- end #gs-pga-logo-->
	<div id="gs-img-tagline">OFFICIAL MEDIA PARTNERS</div>

<?php foreach($ftr_img as $img) : ?>
	<div class="gs-sponsor">
<?php if ($img['id'] != 'gs-ept') : ?>
		<div id="<?php echo $img['id']; ?>">
			<a href="<?php echo $img['url']; ?>" style="text-decoration: none;">
				<img src="<?php echo $gs_uri.$img['img']; ?>" alt="<?php echo $img['id'].' logo'; ?>" />
			</a>
		</div><!-- end .<?php echo $img['id']; ?> -->
<?php endif; ?>
</div><!-- end .sponsor -->
<?php endforeach; ?>
