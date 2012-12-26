<?php
defined('ABSPATH') or die();

//add_theme_support('post-thumbnails');
require_once(dirname(__FILE__).'/inc/easy-attachments.php');
require_once(dirname(__FILE__).'/inc/paging.php');

register_nav_menus(array('top' => 'Top Menu'));
register_nav_menus(array('primary' => 'Primary Menu'));
register_nav_menus(array('footer' => 'Footer Menu'));

/*script*/
function theme_script(){
	$script = get_template_directory_uri().'/js/';
	
	//wp_enqueue_script('cufon',$script.'cufon.js',Array(),0.1);
	//wp_enqueue_script('font',$script.'utopiastd-font.js',Array(),0.1);
	//wp_enqueue_script('custom-script',$script.'script.js',array('jquery'),0.1,true);
}
add_action('wp_enqueue_scripts','theme_script',true);

/* entry meta fb, twitter etc*/
if(!function_exists('theme_option')) {
	function theme_option() {
		return false;
	}
}

function post_entry_meta(){
	$twitter_username = end(explode('/',theme_option('twitter')));
	$twitter_username = preg_replace('/[^a-z0-9_]+/i','',$twitter_username);
?>	
<div class="clearfix"></div>
<p class="entry-meta">
	<div class="share-entry">
		<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink();?>" data-via="<?php echo $twitter_username;?>" data-related="<?php echo $twitter_username;?>" data-count="none" data-hashtags="<?php echo $twitter_username;?>">Tweet</a>
		
		<div class="g-plusone" data-href="<?php the_permalink();?>" data-size="tall" data-annotation="none" data-width="120"></div>
		<div class="fb-like" data-href="<?php the_permalink();?>" data-send="false" data-layout="button_count" data-width="90" data-show-faces="false" data-font="arial"></div>
	</div><!--share entry-->
</p>
<?php }

function post_entry_meta_js() {
	//if(is_singular() or is_archive()){ ?>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	<script type="text/javascript">
		(function() {
			var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
			po.src = 'https://apis.google.com/js/plusone.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
		})();
	</script>
	<?php //}
}

add_action('wp_footer','post_entry_meta_js');

/* sub title*/
function takien_sub_title_field() {
	global $post_type;
	global $post;
	if('post' == $post_type) { ?>
	<input style="padding: 5px 8px;font-size: 1.2em;line-height: 100%; width: 100%; outline: 0px none;margin:0 0 10px" name="wp_sub_title" class="newtag" placeholder="Sub title" autocomplete="off" value="<?php echo get_post_meta($post->ID,'_wp_sub_title',true);?>" type="text">
	<?php }
}

function takien_sub_title_save($post_id) {
	if(isset($_POST['wp_sub_title'])) {
		$sub_title = trim($_POST['wp_sub_title']);
		if($sub_title !== '') {
			update_post_meta($post_id, '_wp_sub_title', $sub_title);
		}
	}
}
function get_sub_title($post_id='',$before='',$after='') {
	$post_id = $post_id ? $post_id : get_the_ID();
	$sub_title = get_post_meta($post_id,'_wp_sub_title',true);
	if($sub_title) {
		return $before.$sub_title.$after;
	}
}

add_action('edit_form_after_title','takien_sub_title_field',10);
add_action('save_post', 'takien_sub_title_save');