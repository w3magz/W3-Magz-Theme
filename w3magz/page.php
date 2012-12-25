<?php
$template_url = get_bloginfo('template_url').'/';
get_header();?>

		<div id="content">

		<?php
		while(have_posts()) : the_post(); ?>
				<article class="post-entry">
				<header>
					<h1 class="entry-title"><?php echo get_sub_title('','<span class="sub-title">','</span> ');?> <?php the_title();?></h1>
					
				</header>

				<?php the_content();?>
			</article>
			<?php the_tags();?>
		<?php
		endwhile;
		?>
		

		<?php comments_template( '', true ); ?>
		</div><!--content-->
<?php get_sidebar();?>
<?php get_footer();?>