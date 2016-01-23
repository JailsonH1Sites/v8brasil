<?php get_header(); ?>
<div class="pai-de-todos">
<section id="content" role="main">
<?php if ( have_posts() ) : ?>
<header class="headerpagepesquisa">
<h1 class="entry-title"><?php printf( __( 'Resultados para: %s', 'blankslate' ), get_search_query() ); ?></h1>
</header>
    <div id="search">
<?php get_search_form(); ?>
</div>
    <div class="content-page-pesquisa">
<?php while ( have_posts() ) : the_post(); ?>
    
<div class="produtopars">
    <a href="<?php the_Permalink(); ?>">
    <?php the_post_thumbnail(); ?>
    <h1 class="entry-title"> <div class="titulo-box"><?php the_title(); ?></h1>
    
        </a>
    
    </div>

<?php endwhile; ?>
<?php get_template_part( 'nav', 'below' ); ?>
<?php else : ?>
<article id="post-0" class="post no-results not-found">
<header class="header">
<h2 class="entry-title"><?php _e( 'Nada encontrado', 'blankslate' ); ?></h2>
</header>
<section class="entry-content">
<p><?php _e( 'Desculpe, não há resultados para sua pesquisa. Por favor, tente novamente.', 'blankslate' ); ?></p>
<div id="search">
<?php get_search_form(); ?>
</div>
</section>
</article>
<?php endif; ?>
</section>
<?php //get_sidebar(); ?>
        <div class="clear"></div>
</div>
    </div>
<?php get_footer(); ?>