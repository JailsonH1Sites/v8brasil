<div id="container">
<?php get_header(); ?>
    <?php /* Template name: Meu Formulário Personalizado */ ?>
    <div class="azul">
        <div class="pai-de-todos">
            <div id="box-topo">
                <p>Quer um site Personalizado?</p>
                
                <p>Solicite um Orçamento!</p>
            </div>
        </div> <!--.pai-de-todos-->
    </div> <!--azul-->
<div class="pai-de-todos">
<section id="content" role="main">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-">
<header class="headerpage">
<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
</header>
<section class="entry-content">
<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
<?php the_content(); ?>
<div class="entry-links"><?php wp_link_pages(); ?></div>

</section>
</article>
<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
<?php endwhile; endif; ?>

</section>
    tag php para login
<?php theme_my_login(login); ?>
</div> <!--.pai-de-todos-->
<?php get_footer(); ?>