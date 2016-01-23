
<?php get_header(); ?>
<section id="content" role="main">
    <div id="container">
        <div class="pai-de-todos">
            <div class="page">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <section class="entry-content">
                    <header class="headerpage">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                    </header>

                    <div class="thumbinaill"> <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?></div>
                    <div class="the-content"> <?php the_content(); ?></div>
                    <div class="entry-links"><?php wp_link_pages(); ?></div>
            
                </section>
            </div>

            <?php if ( ! post_password_required() ) comments_template( '', true ); ?>
            <?php endwhile; else: ?>
            <p>Nenhum conteúdo disponivel</p>
            <?php endif; ?>
       </div> <!--.pai-de-todos-->
    </div>
</section>    
<div class="clear"></div>

<?php get_footer(); ?>