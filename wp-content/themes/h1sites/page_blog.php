<?php get_header(); ?>
<?php /* Template name: Página do Blog */ ?>
<div class="pai-de-todos">
<section id="content" role="main">
<?php if ( have_posts() ) : ?>
<header class="headerpage">
<h1 class="entry-title"> <a href="<?php the_Permalink(); ?>"><div class="titulo-box"><?php the_title(); ?></h1>
</header>
     
<?php query_posts('category_name=blog'); ?>
<?php while ( have_posts() ) : the_post(); ?>
                        

              <div class="content-page-blog">
    <?php the_post_thumbnail(); ?>
                  <div class="blok">
              <h3><a href="<?php the_Permalink(); ?>"><div class="titulo-box"><?php the_title(); ?></a></h3>
    <?php the_content(); ?>
    
        </a>
                      </div>
              </div>
    
    <div class="clear"></div>
<?php endwhile; ?>
<?php get_template_part( 'nav', 'below' ); ?>
<?php else : ?>
<article id="post-0" class="post no-results not-found">
<header class="header">
<h2 class="entry-title"><?php _e( 'Nothing Found', 'blankslate' ); ?></h2>
</header>
<section class="entry-content">
<p><?php _e( 'Sorry, nothing matched your search. Please try again.', 'blankslate' ); ?></p>
<?php //get_search_form(); ?>
</section>
</article>
<?php endif; ?>
</section>
<?php //get_sidebar(); ?>
        <div class="clear"></div>
</div>
    </div>
<?php get_footer(); ?>