<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

get_header();
?>
<section class="main">
	<div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-8">   
                <div class="content"> 
    	          <?php while ( have_posts() ) : the_post(); ?>
                    <?php woocommerce_get_template_part( 'content', 'single-product' ); ?>
    	          <?php endwhile; // end of the loop. ?>
                </div>  
            </div>
             <div class="col-md-3 col-sm-4">
                <div class="woocart">
                    <?php
                        the_widget('WC_Widget_Cart', 'title=0&hide_if_empty=1');
                    ?>
                </div>
                <div class="sidebar">
                                    <!-- CUSTOM FIELDS BY - GUILHERME WP & JAVALI DIGITAL -->
                    <!-- CAMPO - INICIO -->
                                        <?php $inicio = get_post_custom_values( 'inicio' ); ?>
                                    <?php if( !empty($inicio) ) : ?>
                                <div class="course_details">
                                    <ul>
                                        <li class="course_details-custom">Início: <?php echo $inicio[0]; ?><i class="fa fa-calendar"></i></li>
                                    </ul>
                                </div><!-- end INICIO -->
                                    <?php endif; ?>
                                    <!-- CAMPO - DURACAO -->
                                        <?php $duracao = get_post_custom_values( 'duracao' ); ?>
                                    <?php if( !empty($duracao) ) : ?>
                                <div class="course_details">
                                    <ul>
                                        <li class="course_details-custom">Duração: <?php echo $duracao[0]; ?><i class="fa fa-tachometer"></i></li>
                                    </ul>
                                </div><!-- end DURACAO -->
                                    <?php endif; ?>
                                        <!-- CAMPO - CARGA-HORARIA -->
                                        <?php $carga_horaria = get_post_custom_values( 'carga_horaria' ); ?>
                                    <?php if( !empty($carga_horaria) ) : ?>
                                <div class="course_details">
                                    <ul>
                                        <li class="course_details-custom">Carga Horária: <?php echo $carga_horaria[0]; ?><i class="fa fa-clock-o"></i></li>
                                    </ul>
                                </div><!-- end CARGA HORARIA -->
                                    <?php endif; ?>
                                        <!-- CAMPO - FORMATO -->
                                        <?php $formato = get_post_custom_values( 'formato' ); ?>
                                    <?php if( !empty($formato) ) : ?>
                                <div class="course_details">
                                    <ul>
                                        <li class="course_details-custom">Formato: <?php echo $formato[0]; ?><i class="fa fa-wifi"></i></li>
                                    </ul>
                                </div><!-- end FORMATO-->
                                    <?php endif; ?>
                        <!-- F I M *** CUSTOM FIELDS BY - GUILHERME WP & JAVALI DIGITAL *** -->
                    <?php do_action('woocommerce_sidebar'); ?>
                    <?php
                        do_action('woocommerce_after_main_content');
                    ?>
                </div>
            </div>
        </div>
    </div>    
</section>
<?php get_footer('shop'); ?>