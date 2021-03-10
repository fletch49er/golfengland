<?php
/**
 * Template Name: Policies Page
 */
get_header(); ?>

<div id="gs-wrapper">
	<section id="gs-content" class="clearfix">
<?php
// get current page 'slug'
$page_slug = get_post_field( 'post_name' );
// display relevent t&c data
switch ($page_slug) {
  case 'terms-conditions':
    get_template_part('templates/termsConditions');
    break;
  case 'privacy-policy':
    get_template_part('templates/privacyPolicy');
    break;
  case 'disclaimer':
    get_template_part('templates/disclaimer');
    break;
  case 'copyright':
    get_template_part('templates/copyright' );
    break;
  case 'newsletter-terms':
    get_template_part('templates/newsletterTerms');
    break;
  default: echo "No match!";
    break;
}
?>
  </section><!-- end #gs-content -->
</div><!-- end #gs-wrapper -->
<?php get_footer();
