<?php
defined('ABSPATH') or die();
$template_url = get_bloginfo('template_url').'/';
get_header();?>

		<div id="content">

		<?php
		while(have_posts()) : the_post(); ?>
				<article class="post-entry">
				<header>
					
					<h2 class="entry-title">
						<?php echo get_sub_title('','<span class="sub-title">','</span> ');?>
						<a href="<?php the_permalink();?>"><?php the_title();?></a>
					
					</h2>
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
		<!--	<nav class="pagination">
				<a href="#" class="current">1</a>
				<a href="#">2</a>
				<a href="#">3</a>
				<a href="#">4</a>
				<span>...</span>
				<a href="#">9</a>
				<a href="#">10</a>
				<a href="#">11</a>
				<a href="#">12</a>
				<a href="#">Next &raquo;</a>
			</nav>-->
		</div><!--content-->
<?php get_sidebar();?>
<?php get_footer();?>