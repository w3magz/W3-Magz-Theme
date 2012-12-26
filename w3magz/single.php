<?php
defined('ABSPATH') or die();
$template_url = get_bloginfo('template_url').'/';
get_header();?>

		<div id="content">

		<?php
		while(have_posts()) : the_post(); ?>
				<article class="post-entry">
				<header>
					<h1 class="entry-title"><?php echo get_sub_title('','<span class="sub-title">','</span> ');?> <?php the_title();?></h1>
					<p class="entry-meta">
						By <span class="author vcard"><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author_meta('display_name'); ?></a></span> on 
						<time datetime="<?php echo get_the_date('Y-m-d');?>"><?php echo get_the_date('F d, Y');?></time> under 
						<span class="category"><?php the_category(', ');?></span>
						<a href="<?php comments_link(); ?> " class="comment-total"><?php comments_number( 'Click to comment', '%s comment', '% comments' ); ?> </a>
					</p>
					<div class="share-entry">
						<?php post_entry_meta();?>
					</div>
				</header>
				<div class="ads ads600x160">
					<img src="<?php bloginfo('template_url');?>/images/ads-160x600.png" alt=""/>
				</div>
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