<?php get_header(); ?>
<div class="pai-de-todos">
<section id="content" role="main">
<header class="header">
<h1 class="entry-title"><?php _e( 'Tag Archives: ', 'blankslate' ); ?><?php single_tag_title(); ?></h1>
</header>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'entry' ); ?>
<?php endwhile; endif; ?>
<?php get_template_part( 'nav', 'below' ); ?>
</section>
</div> <!-- .pai-de-todos-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>