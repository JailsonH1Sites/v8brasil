<footer id="footer" role="contentinfo">
<div class="pai-de-todos">
    <!--sidebar footer-->
        <?php if ( !function_exists('dynamic_sidebar')
              || !dynamic_sidebar('footer') ) : ?>
        <?php endif; ?>


      <div class="clear"></div>
    </div>
<div id="copyright">
<div class="pai-de-todos">
    Desenvolvido Por <a href="https://www.facebook.com/jailsonsilvamariane" target="_blank">Jailson</a> Developer By <strong>H1Sites</strong>
</div> <!--.pai-de-todos-->
    <nav id="paisubir" class="sumir">
<a href="#" id="subir"><img src="<?php bloginfo('template_url'); ?>/images/bg/scroll-top-arrow.png" width="100px" height="100px" alt="Voltar ao Topo"></a></nav>
</div>
    
    </div>
</footer>
<?php wp_footer(); ?>

</body>
</html>