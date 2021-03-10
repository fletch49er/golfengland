<?php
/**
 * Template Name: Golf Travel Page
 */

get_header('gt');

get_template_part( 'templates/top-title' ); ?>

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
        <?php get_template_part( 'templates/gt-sidebar' ); ?>
    </aside>

</div>
<?php get_footer();
