<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( ' | ', true, 'right' ); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/animate.css" />
    <script src="<?php echo get_template_directory_uri(); ?>/js/wow/wow.min.js"></script>
    
<?php wp_head(); ?>
</head>

    <body <?php body_class(); ?> style="background:<?php global $data; echo $data['header_background'] ?>; ">
<script>
              new WOW().init();
              </script>
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.5&appId=351025968352414";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    
    
    
<?php  global $data;
if($data['example_checkbox_false'] > false) { 
     ?>
<div class="pai-sidebar-topo" style="background:<?php global $data; echo $data['body_background'] ?>; ">
    <div class="pai-de-todos">
<!--chama sidebar topo-->
        <?php if ( !function_exists('dynamic_sidebar')
              || !dynamic_sidebar('topo') ) : ?>
        <?php endif; ?>
        </div>
</div>
 <?php };  ?>
<div id="wrapper" class="hfeed">
<header id="header" role="banner">
    <div class="pai-de-todos">
<section id="branding">
<div id="site-title"><?php if ( ! is_singular() ) { echo '<h1>'; } ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>"  title="<?php esc_attr_e( get_bloginfo( 'name' ), 'blankslate' ); ?>" rel="home"><img src="<?php global $data; echo $data['media_upload_35']; ?>"/> <div id="site-description"><?php bloginfo( 'description' ); ?></div></div></a><?php if ( ! is_singular() ) { echo '</h1>'; } ?>
    
    
    <div class="menu-imgem">
    <?php wp_nav_menu( array( 'theme_location' => 'menu-imagens' ) ); ?>
    </div>
    
    <!--<div id="search">
<?php //get_search_form(); ?>
</div>-->
    <div class="clear"></div>

</section>
    </div>
<nav id="menu" role="navigation" style="background:<?php global $data; echo $data['body_background'] ?>; ">
<div class="pai-de-todos">
<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
    </div>
</nav>
    <div class="pai-de-todos">
</div>
</header>
