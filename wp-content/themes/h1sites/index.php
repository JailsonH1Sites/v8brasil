<?php get_header(); ?>
<div class="slide-principal"><?php layerslider(2) ?>
</div>
<!--<section id="content" role="main">-->
<div id="container">


<div class="pai-de-todos">
        
        <?php //bloginfo('template_url'); ?>
<div class="clear"></div>
    
<div class="produtos-index">
    
<?php query_posts('category_name=produtos index'); ?>
<?php if(have_posts()) : while (have_posts()) : the_post(); ?>
<div class="boxindex animated wow fadeInLeftBig">
    <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>?page_id=270"><div class="titulo-box-index"><?php the_title(); ?></div>
       <!-- imagem destacada secundária   -->
         <?php MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image', NULL); ?></h1>
    <div class="clear"></div>
        <div class="hoverzoom">    
    <!-- imagem destacada principal   -->
   <?php the_post_thumbnail(); ?>
    
<div class="retina  hvr-sweep-to-top">
        <?php the_content(); ?></div><div class="saibamais">saiba mais<span>&#8743</span></div></div>
</a>
    </div>
<?php endwhile; else: ?>
<?php endif; ?>	
    
    
    <?php query_posts('category_name=a-empresa-inicial'); ?>
<?php if(have_posts()) : while (have_posts()) : the_post(); ?>
<div class="boxindex animated wow fadeInLeftBig">
    <h1><a href="<?php the_Permalink(); ?>"><div class="titulo-box-index"><?php the_title(); ?></div>
       <!-- imagem destacada secundária   -->
         <?php MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image', NULL); ?></h1>
    <div class="clear"></div>
    <div class="hoverzoom">
    <!-- imagem destacada principal   -->
   <?php the_post_thumbnail(); ?>
    
<div class="retina  hvr-sweep-to-top">
        <?php the_content(); ?></div><div class="saibamais">saiba mais<span>&#8743</span></div></div>
</a>
    </div>
<?php endwhile; else: ?>
<?php endif; ?>	

    
   
    <?php query_posts('category_name=assistencia-inicial'); ?>
<?php if(have_posts()) : while (have_posts()) : the_post(); ?>
<div class="boxindex animated wow zoomInUp">
    <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>/?page_id=6685"><div class="titulo-box-index"><?php the_title(); ?></div>
       <!-- imagem destacada secundária   -->
         <?php MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image', NULL); ?></h1>
    <div class="clear"></div>
    <div class="hoverzoom">
    <!-- imagem destacada principal   -->
   <?php the_post_thumbnail(); ?>
    
<div class="retina  hvr-sweep-to-top">
        <?php the_content(); ?></div><div class="saibamais">saiba mais<span>&#8743</span></div></div>
</a>
    </div>
<?php endwhile; else: ?>
<?php endif; ?>	
    
    
    <?php query_posts('category_name=garantia index'); ?>
<?php if(have_posts()) : while (have_posts()) : the_post(); ?>
<div class="boxindex ultimo animated wow zoomInDown">
    <h1><a href="<?php the_Permalink(); ?>"><div class="titulo-box-index"><?php the_title(); ?></div>
       <!-- imagem destacada secundária   -->
         <?php MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image', NULL); ?></h1>
    <div class="clear"></div>
    <div class="hoverzoom">
    <!-- imagem destacada principal   -->
   <?php the_post_thumbnail(); ?>
    
<div class="retina  hvr-sweep-to-top">
    <?php the_content(); ?></div><div class="saibamais">saiba mais<span>&#8743</span></div></div>

</a>
    </div>
<?php endwhile; else: ?>
<?php endif; ?>	  
</div><!--produtos-index-->




<div id="article" class="animated wow fadeInUp">    
     <?php query_posts('category_name=videos-index'); ?>
<?php if(have_posts()) : while (have_posts()) : the_post(); ?>
<div class="boxindex primeiro">
    <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>?page_id=6711"><div class="titulo-box-index"><?php the_title(); ?></div>
       <!-- imagem destacada secundária   -->
         <?php MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image', NULL); ?></h1>
    <div class="clear"></div>
    
    <!-- imagem destacada principal   -->
   <?php the_post_thumbnail(); ?>
    

<?php the_content(); ?>

</a>
    </div>
<?php endwhile; else: ?>
<?php endif; ?>
    
    
<?php query_posts('category_name=facebook-index'); ?>
<?php if(have_posts()) : while (have_posts()) : the_post(); ?>
<div class="boxindex direita">
    <h1><div class="titulo-box-index"><?php the_title(); ?></div>
       <!-- imagem destacada secundária   -->
         <?php MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image', NULL); ?></h1>
    <div class="clear"></div>
    
    <!-- imagem destacada principal   -->
   <?php the_post_thumbnail(); ?>
<div class="fb-page" data-href="https://www.facebook.com/v8brasil" data-tabs="timeline" data-width="500" data-height="350" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/v8brasil"><a href="https://www.facebook.com/v8brasil">V8 Brasil</a></blockquote></div></div>
    </div>
<?php endwhile; else: ?>
<?php endif; ?>
</div>
    





</div> <!--.pai-de-todos -->

<div class="clear"></div>
</div>
<?php get_footer(); ?>
