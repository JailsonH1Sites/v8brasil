<?php get_header(); ?>
<div class="pai-de-todos">
    <section id="content" role="main">
            <div class="single">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <section class="entry-content">
                    <header class="headerpage">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                    </header>

                    <!--<div class="thumbinaill"> <?php //if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?></div>-->
                    <div class="the-content"> <?php the_content(); ?></div>
                    <div class="entry-links"><?php wp_link_pages(); ?></div>
            <?php if ( ! post_password_required() ) comments_template( '', true ); ?>
            <?php endwhile; else: ?>
            <p>Nenhum conteúdo disponivel</p>
            <?php endif; ?>
                </section>
            </div>
        	
     <div class="sidebar-lateral" >
        <?php //if ( !function_exists('dynamic_sidebar')
              //|| !dynamic_sidebar('lateral') ) : ?>
        <?php //endif; ?>
	</div>
      <div class="clear"></div>
    
        
    
    </section>
</div> <!--.pai-de-todos-->
<?php //get_sidebar(); ?>
<?php get_footer(); ?>