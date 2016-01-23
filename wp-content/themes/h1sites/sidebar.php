<aside id="sidebar" role="complementary">
<?php if ( is_active_sidebar( 'topo' ) ) : ?>
<div id="primary" class="widget-area">
<ul class="xoxo">
<?php dynamic_sidebar( 'Sidebar topo' ); ?>
</ul>
</div>
<?php endif; ?>
</aside>
<aside id="sidebar" role="complementary">
<?php if ( is_active_sidebar( 'lateral' ) ) : ?>
<div id="secundary" class="widget-area">
<ul class="xoxo">
<?php dynamic_sidebar( 'Sidebar lateral' ); ?>
</ul>
</div>
<?php endif; ?>
</aside>

<aside id="sidebar" role="complementary">
<?php if ( is_active_sidebar( 'footer' ) ) : ?>
<div id="thirdly" class="widget-area">
<ul class="xoxo">
<?php dynamic_sidebar( 'sidebar footer' ); ?>
</ul>
</div>
<?php endif; ?>
</aside>