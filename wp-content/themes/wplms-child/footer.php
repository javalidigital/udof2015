<div class="newsletter" style="display:none;">
<?php 
echo
do_shortcode('[et_bloom_inline optin_id="optin_1"]'
); ?>
</div>
<footer>
    <div class="container">
        <div class="row">
            <div class="footertop">
                <?php 
                            if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar('topfootersidebar') ) : ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="footerbottom">
                <?php 
                    if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar('bottomfootersidebar') ) : ?>
                <?php endif; ?>
            </div>
        </div>
    </div> 
    <div id="scrolltop">
        <a><i class="icon-arrow-1-up"></i><span><?php _e('top','vibe'); ?></span></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2 id="footerlogo"><a href="<?php echo vibe_site_url(); ?>"><img src="http://localhost/udof2015/wp-content/uploads/2015/05/logo-footer-udof.png" alt="<?php echo get_bloginfo('name'); ?>" /></a></h2>
            </div>
            <div class="col-md-9">
                        <div id="footermenu">
<?php $copyright=vibe_get_option('copyright'); echo (isset($copyright)?do_shortcode($copyright):'&copy; 2013, All rights reserved.'); ?>
                        </div> 
            </div>
        </div>
    </div>
</footer>
</div><!-- END PUSHER -->
</div><!-- END MAIN -->
    <!-- SCRIPTS -->
<?php
wp_footer();
?>    
<?php
echo vibe_get_option('google_analytics');
?>
   <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Scrolling Nav JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/scrolling-nav.js"></script>
</body>
</html>