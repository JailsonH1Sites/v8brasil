<!--<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>H1 Sites</title>
		<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <div id="fb-root"></div>
        <script src="<?php bloginfo( 'template_url' ); ?>/js/script.js" ></script>
        <?php wp_head(); ?>
	</head>
    <?php /* Template name: whmcs */ ?>
   <body> -->
	<?php get_header(); ?>
       <!--finalcecariopadrão-->

<?php if(have_posts()) : while (have_posts()) : the_post(); ?>

<h1><?php the_title(); ?></h1><?php the_post_thumbnail(); ?>
<?php the_content(); ?>

<?php endwhile; else: ?>
<?php endif; ?>	
       
       
<div class="clear"></div>
</div>
<footer id="footer" role="contentinfo">

  
<div id="copyright">
<div class="pai-de-todos">
    Desenvolvido Por <a href="https://www.facebook.com/jailsonsilvamariane" target="_blank">Jailson</a> Developer By <strong>H1Sites</strong>
</div> <!--.pai-de-todos-->
    <nav id="paisubir" class="sumir">
<a href="#" id="subir"><img src="<?php bloginfo('template_url'); ?>/images/bg/scroll-top-arrow.png" width="100px" height="100px" alt="Voltar ao Topo"></a></nav>
</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>