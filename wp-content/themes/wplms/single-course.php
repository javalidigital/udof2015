<?php 
	get_header( 'buddypress' );
?>
<section id="content">
	<div id="buddypress">
	    <div class="container">
	        <div class="row" itemscope itemtype="http://schema.org/Product">
	            <div class="col-md-3 col-sm-3">
					<?php if ( bp_course_has_items() ) : while ( bp_course_has_items() ) : bp_course_the_item(); ?>

					<?php do_action( 'bp_before_course_home_content' ); ?>

					<div id="item-header" role="complementary">

						<?php locate_template( array( 'course/single/course-header.php' ), true ); ?>

					</div><!-- #item-header -->
			

			</div>
			<div class="single-curso-page col-md-6 col-sm-6">	
			<?php do_action( 'template_notices' ); ?>
			<div id="item-body">

				<?php 
				
				do_action( 'bp_before_course_body' );

				/**
				 * Does this next bit look familiar? If not, go check out WordPress's
				 * /wp-includes/template-loader.php file.
				 *
				 * @todo A real template hierarchy? Gasp!
				 */

				if(isset($_GET['action']) && $_GET['action']):

					switch($_GET['action']){
						case 'curriculum':
							locate_template( array( 'course/single/curriculum.php'  ), true );
						break;
						case 'members':
							locate_template( array( 'course/single/members.php'  ), true );
						break;
						case 'events':
							locate_template( array( 'course/single/events.php'  ), true );
						break;
						case 'admin':
							$uid = bp_loggedin_user_id();
							$authors=array($post->post_author);
							$authors = apply_filters('wplms_course_instructors',$authors,$post->ID);
							
							if(current_user_can( 'manage_options' ) || in_array($uid,$authors)){
								locate_template( array( 'course/single/admin.php'  ), true );	
							}else{
								locate_template( array( 'course/single/front.php' ),true );
							}
						break;
						default:
							$action = $_GET['action']; 
							$template = array( 'course/single/front.php' );
							$template = apply_filters('wplms_course_locate_template',$template,$action);

							if (is_array($template) && isset($template[0]) && file_exists($template[0])) {
								locate_template( $template,true );
							} else {
								locate_template( array( 'course/single/front.php' ),true );
							}
						break;
					}
					do_action('wplms_load_templates');
				else :
					
					if ( isset($_POST['review_course']) && isset($_POST['review']) && wp_verify_nonce($_POST['review'],get_the_ID()) ){
						 global $withcomments;
					      $withcomments = true;
					      comments_template('/course-review.php',true);
					}else if(isset($_POST['submit_course']) && isset($_POST['review']) && wp_verify_nonce($_POST['review'],get_the_ID())){ // Only for Validation purpose

						bp_course_check_course_complete();
						$user_id=get_current_user_id();
						do_action('badgeos_wplms_submit_course',$post->ID);
						
					// Looking at home location
					}else if ( bp_is_course_home() ){

						// Use custom front if one exists
						$custom_front = locate_template( array( 'course/single/front.php' ) );
						if     ( ! empty( $custom_front   ) ) : load_template( $custom_front, true );
						
						elseif ( bp_is_active( 'structure'  ) ) : locate_template( array( 'course/single/structure.php'  ), true );

						// Otherwise show members
						elseif ( bp_is_active( 'members'  ) ) : locate_template( array( 'course/single/members.php'  ), true );

						endif;

					// Not looking at home
					}else {

						// Course Admin/Instructor
						if     ( bp_is_course_admin_page() ) : locate_template( array( 'course/single/admin.php'        ), true );

							// Course Members
						elseif ( bp_is_course_members()    ) : locate_template( array( 'course/single/members.php'      ), true );

						// Anything else (plugins mostly)
						else                                : locate_template( array( 'course/single/plugins.php'      ), true );

						endif;
					}
				endif;
					
				do_action( 'bp_after_course_body' ); ?>

			</div><!-- #item-body -->

			<?php do_action( 'bp_after_course_home_content' ); ?>

			<?php endwhile; endif; ?>
			</div>
			<div class="col-md-3 col-sm-3">	
				<div class="widget pricing">
					<?php the_course_button(); ?>
					<?php the_course_details(); ?>
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
						
				</div>

			 	<?php
			 		$sidebar = apply_filters('wplms_sidebar','coursesidebar',get_the_ID());
	                if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar($sidebar) ) : ?>
               	<?php endif; ?>
			</div>
		</div><!-- .padder -->
		
	</div><!-- #container -->
	</div>
</section>	
<?php get_footer( 'buddypress' ); ?>
