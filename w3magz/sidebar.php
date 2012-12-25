<?php $template_url = get_bloginfo('template_url').'/';?>
		<div id="sidebar">
			<?php 
			/*<aside class="widget search-bar">
				<form method="get" action="#">
					<fieldset>
						<input type="text" name="s" value="" placeholder="search here..." class="search-input" />
						<a href="#">Advanced search</a>
					</fieldset>
				</form>
				<div class="widget social-icon">
					<div class="feed">
						<img src="<?php echo $template_url;?>images/social-sample-image.png" alt="" />
					</div>
					<a target="_blank" href="http://facebook.com/w3magz" class="facebook-icon icon">Facebook</a>
					<a target="_blank"  href="http://twitter.com/w3magz" class="twitter-icon icon">Twitter</a>
					<a href="#" class="rss-icon icon">RSS</a>
				</div>
			</aside>
			*/?>
			<aside class="widget facebook-like">
			<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fw3magz&amp;width=260&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;border_color=%23ffffff&amp;stream=false&amp;header=false&amp;appId=130265097093412" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:260px; height:258px;" allowTransparency="true"></iframe>
			</aside>
			<?php
			/*<aside class="widget banner">
				<a href="#"><img src="<?php echo $template_url;?>images/sample-ad.jpg" alt="" /></a>
			</aside>*/?>
			<aside class="widget recent-post">
				<h3>Recent Posts</h3>
				<ul>
					<?php
						$arg = Array(
						'posts_per_page'=>8,
						);
						$query = new WP_Query($arg);
						if($query->have_posts()) 
						while($query->have_posts()) : $query->the_post(); ?>
						<li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
						<?php
						endwhile;?>
				</ul>
			</aside>
			<aside class="widget popular-post">
				<h3>Popular Posts</h3>
				<ul>
					<?php
						$arg = Array(
						'posts_per_page'=>8,
						'orderby'=>'comment_count'
						);
						$query = new WP_Query($arg);
						if($query->have_posts()) 
					while($query->have_posts()) : $query->the_post(); ?>
					<li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
					<?php
					endwhile;?>
				</ul>
			</aside>
			<aside class="widget sponsor wide-widget">
				<h3>Our Sponsors</h3>
				<a href="#"><img src="<?php echo $template_url;?>images/sample-ad-small-1.jpg" alt="" /></a>
				<a href="#"><img src="<?php echo $template_url;?>images/sample-ad-small-2.jpg" alt="" /></a>
				<a href="#"><img src="<?php echo $template_url;?>images/sample-ad-small-3.jpg" alt="" /></a>
				<a href="#"><img src="<?php echo $template_url;?>images/sample-ad-small-4.jpg" alt="" /></a>
				<a href="#"><img src="<?php echo $template_url;?>images/sample-ad-small-5.jpg" alt="" /></a>
				<a href="#"><img src="<?php echo $template_url;?>images/sample-ad-small-6.jpg" alt="" /></a>
				<a href="#"><img src="<?php echo $template_url;?>images/sample-ad-small-7.jpg" alt="" /></a>
				<a href="#"><img src="<?php echo $template_url;?>images/sample-ad-small-8.jpg" alt="" /></a>
			</aside>
		</div>