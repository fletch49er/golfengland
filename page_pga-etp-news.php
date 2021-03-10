<?php
/**
 * Template Name: PGA EPT News Page
 */

get_header();

get_template_part( 'templates/top-title-pga' ); ?>

<div class="mh-layout mh-top-title-offset">

    <div class="mh-layout__content-left">
        <?php
        while ( have_posts() ) : the_post();

            get_template_part( 'templates/content', 'page' );

            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;

        endwhile;
        ?>
    </div>

    <aside class="mh-layout__sidebar-right">
        <?php get_template_part( 'templates/sidebar-v2' ); ?>
    </aside>

</div>
<?php get_footer();
