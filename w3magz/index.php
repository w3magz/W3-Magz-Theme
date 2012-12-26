<?php
defined('ABSPATH') or die();
get_header();?>

		<div id="content">

		<?php
		while(have_posts()) : the_post(); ?>
				<article class="post-entry">
				<header>
					<h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
					<p class="entry-meta">
						By <span class="author vcard"><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author_meta('display_name'); ?></a></span>
						<time datetime="2011-07-08">July 8th, 2011</time>
						<span class="category"><?php the_category(',');?></span>
						<a href="#" class="comment-total">29 Comments</a>
					</p>
					<div class="share-entry">
						<?php post_entry_meta();?>
					</div>
				</header>
				<?php
					$img = post_image('thumbnail');
					if($img['src']) {
						?>
						<img class="thumbnail alignleft" src="<?php echo $img['src'];?>" alt="<?php the_title();?>"/>
					<?php }
				 the_excerpt();?>
			</article>
		<?php
		endwhile;
		?>
		<?php
		custom_wordpress_paging($prev='<< Prev', $next='Next >>', 'current-paging', 'pagination', $ulclass='', $paged='',$perpage='',$paging_maxpage='',$echo=true);
		?>
		</div><!--content-->
<?php get_sidebar();?>
<?php get_footer();?>