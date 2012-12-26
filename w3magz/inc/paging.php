<?php
defined('ABSPATH') or die();
/*
* WordPress paging,
* @author: takien
* http://takien.com
*/
function custom_wordpress_paging($prev='<< Prev', $next='Next >>', $currentclass='active', $pagingclass='navigation', $ulclass='', $paged='',$perpage='',$paging_maxpage='',$echo=true){
    global $wp_query;
	
	//$numrows = $wp_query->found_posts;
	$paged 	 = $paged ? $paged : $wp_query->query_vars['paged'];

	$perpage = $perpage ? $perpage : $wp_query->query_vars['posts_per_page'];
	$page_query ='paged';

	$paged  = $paged ? $paged : 1;
	
$paging_maxpage = $paging_maxpage ? $paging_maxpage : $wp_query->max_num_pages;

$paging_current  = $paged ? $paged : 1;


$paging_prev     = get_pagenum_link($paging_current-1);
$paging_next     = get_pagenum_link($paging_current+1);

if($paging_current == $paging_maxpage){
    $paging_next = get_pagenum_link($paging_current);
}
if($paging_current == 1){
    $paging_prev = get_pagenum_link($paging_current);
}

/* if($paging_current == $paging_maxpage){
    $paging_next = '';
}
if($paging_current == 1){
    $paging_prev = '';
} */
$pre_output = '<div class="'.$pagingclass.'">';
$pre_output .= '<ul class="'.$ulclass.'">';
$pre_output .= $paging_prev ? '<li><a rel="prev" class="nav-previous" href="'.$paging_prev.'">'.$prev.'</a></li>' : '';

for($i=1;$i<= $paging_maxpage;$i++){
if($i < (1+4)){
    $pre_output .= '<li '.($paging_current==$i?'class="'.$currentclass.'"':'').'><a  href="'.get_pagenum_link($i).'">'.$i.'</a>'."\r\n";
}
elseif(($i > 5) && ($i < ($paging_maxpage-5))){
$output_dot = '<li><a href="#">...</a>'."\r\n";
    if(($i >= $paging_current-1) && ($i <= $paging_current+1)){
        $middle .= '<li '.($paging_current==$i?'class="'.$currentclass.'"':'').' ><a href="'.get_pagenum_link($i).'">'.$i.'</a>'."\r\n";
    }
$output_dot2 = '<li><a href="#">...</a></li>'."\r\n";
}
elseif($i>($paging_maxpage-5)) {
$output .= '<li '.($paging_current==$i?'class="'.$currentclass.'"':'').'><a  href="'.get_pagenum_link($i).'">'.$i.'</a></li>'."\r\n";
}
}
$output .= $paging_next ? '<li><a rel="next" class="nav-next" href="'.$paging_next.'">'.$next.'</a></li>' : '';
$output .= '</ul>';
$output .= '</div><div style="clear:both"></div>';
if(!$middle){
    $output_dot2 = '';
}
$outputpaging = $pre_output.$output_dot.$middle.$output_dot2.$output;

if($paging_maxpage > 0) {
if($echo){
    echo $outputpaging;
}
else{
    return $outputpaging;
}
}
}