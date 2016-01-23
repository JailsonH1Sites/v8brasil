<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>H1 Sites Florianópolis Palhoça São José e Região</title>
		<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <div id="fb-root"></div>
        <script src="<?php bloginfo( 'template_url' ); ?>/js/script.js" ></script>
        <link rel="icon" href="images/bg/logo-h11.png">
        <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'template_url' ); ?>/whmcscss.css" />
        <?php wp_head(); ?>
	</head>
<body>
<?php /* Template name: Página de captura */ ?>


<!-- page --->
<div class="fundo-page-promocao">
<div class="pai-de-todos">
    <section id="content" role="main">
            <div class="single">
				<div id="branding-h1"><img src="http://h1sites.com.br/wp-content/themes/h1sites.com.br/img/logo_h1sites.png"/><p>SITES</p></div>
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <section class="entry-content">
                    <header class="headerpage">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                    </header>

                    <div class="thumbinaill"> <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?></div>
                    <div class="the-content"> <?php the_content(); ?></div>
                    <div class="entry-links"><?php wp_link_pages(); ?></div>
            <?php if ( ! post_password_required() ) comments_template( '', true ); ?>
            <?php endwhile; else: ?>
            <p>Nenhum conteúdo disponivel</p>
            <?php endif; ?>
                </section>
            </div>
      <div class="pai-sidebar-captura">  	
     <div class="sidebar-lateral" >
        <?php if ( !function_exists('dynamic_sidebar')
              || !dynamic_sidebar('topo') ) : ?>
        <?php endif; ?>
		  </div>
	</div>
	</div>
      <div class="clear"></div>
	<div class="rodape-promocao">
		<h3>
			Aqui você cria seu próprio site com facilidade
		</h3>	
		<ul>
			<li>Video aulas Gratuitas</li>
			<li>Aprenda a criar um site do zero</li>
			<li>Hospedagem no Brasil</li>
			<li>Criador de sites intuitivo e fácil de usar</li>
		</ul>
	</div>
    
        
    
    </section>
</div> <!--.pai-de-todos-->
<?php wp_footer(); ?>
</body>
</html>