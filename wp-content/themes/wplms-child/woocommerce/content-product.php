<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 3 );

$woocommerce_loop['columns'] = 3;

// Ensure visibilty
if ( ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;

?>
<li class="product <?php
	if ( $woocommerce_loop['loop'] % $woocommerce_loop['columns'] == 0 )
		echo 'last';
	elseif ( ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] == 0 )
		echo 'first';
	?>">
    <div class="product_info">
	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
            <a href="<?php the_permalink(); ?>">
                
                <?php
			/**
			 * woocommerce_before_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item_title' );
		?>
		<h3><?php the_title(); ?></h3>
		                                    <!-- PRAGINAS - LOOP - CUSTOM FIELDS BY - GUILHERME WP & JAVALI DIGITAL -->
                    <!-- CAMPO - INICIO -->
                                        <?php $inicio = get_post_custom_values( 'inicio' ); ?>
                                    <?php if( !empty($inicio) ) : ?>
                                <div class="course_details_destaques">
                                    <ul>
                                        <li class="course_details-custom"><i class="fa fa-calendar"></i> Início: <?php echo $inicio[0]; ?></li>
                                    </ul>
                                </div><!-- end INICIO -->
                                    <?php endif; ?>
                                    <!-- CAMPO - DURACAO -->
                                        <?php $duracao = get_post_custom_values( 'duracao' ); ?>
                                    <?php if( !empty($duracao) ) : ?>
                                <div class="course_details_destaques">
                                    <ul>
                                        <li class="course_details-custom"><i class="fa fa-tachometer"></i> Duração: <?php echo $duracao[0]; ?></li>
                                    </ul>
                                </div><!-- end DURACAO -->
                                    <?php endif; ?>
                                        <!-- CAMPO - CARGA-HORARIA -->
                                        <?php $carga_horaria = get_post_custom_values( 'carga_horaria' ); ?>
                                    <?php if( !empty($carga_horaria) ) : ?>
                                <div class="course_details_destaques">
                                    <ul>
                                        <li class="course_details-custom"><i class="fa fa-clock-o"></i> Carga Horária: <?php echo $carga_horaria[0]; ?></li>
                                    </ul>
                                </div><!-- end CARGA HORARIA -->
                                    <?php endif; ?>
                                        <!-- CAMPO - FORMATO -->
                                        <?php $formato = get_post_custom_values( 'formato' ); ?>
                                    <?php if( !empty($formato) ) : ?>
                                <div class="course_details_destaques">
                                    <ul>
                                        <li class="course_details-custom"><i class="fa fa-wifi"></i> Formato: <?php echo $formato[0]; ?></li>
                                    </ul>
                                </div><!-- end FORMATO-->
                                    <?php endif; ?>
                        <!-- F I M *** CUSTOM FIELDS BY - GUILHERME WP & JAVALI DIGITAL *** -->
           </a>

		<?php
			/**
			 * woocommerce_after_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_template_loop_price - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item_title' );
		?>
        
	<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
 
   </div>      
</li>