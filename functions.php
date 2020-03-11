<?php
class cmedyOptions {
	function getOptions() {
		$options = get_option('cmedy_options');
		if (!is_array($options)) {
			$options['keywords'] = '';
			$options['description'] = '';
			$options['dianshiju_tag_id'] = '';
			$options['google_cse'] = false;
			$options['google_cse_cx'] = '';
			$options['footer_description'] = false;
			$options['footer_description_content'] = '';
			$options['analytics'] = false;
			$options['analytics_content'] = '';
			$options['index_ad1'] = false;
			$options['index_ad1_content'] = '';
			$options['single_post_ad1'] = false;
			$options['single_post_ad1_content'] = '';
			$options['sidebar_ad250'] = false;
			$options['sidebar_ad250_content'] = '';
			update_option('cmedy_options', $options);
		}
		return $options;
	}
	function add() {
		if(isset($_POST['cmedy_save'])) {
			$options = cmedyOptions::getOptions();
			// 关键词
			$options['keywords'] = stripslashes($_POST['keywords']);
			// 网站描述
			$options['description'] = stripslashes($_POST['description']);
			// 电视剧标签ID
			$options['dianshiju_tag_id'] = stripslashes($_POST['dianshiju_tag_id']);
			// 谷歌自定义搜索
			if ($_POST['google_cse']) {
				$options['google_cse'] = (bool)true;
			}else {
				$options['google_cse'] = (bool)false;
			}
			$options['google_cse_cx'] = stripslashes($_POST['google_cse_cx']);
			// 网站底部描述
			if ($_POST['footer_description']) {
				$options['footer_description'] = (bool)true;
			} else {
				$options['footer_description'] = (bool)false;
			}
			$options['footer_description_content'] = stripslashes($_POST['footer_description_content']);
			// 统计分析
			if ($_POST['analytics']) {
				$options['analytics'] = (bool)true;
			} else {
				$options['analytics'] = (bool)false;
			}
			$options['analytics_content'] = stripslashes($_POST['analytics_content']);
			// 首页/分类页广告
			if ($_POST['index_ad1']) {
				$options['index_ad1'] = (bool)true;
			} else {
				$options['index_ad1'] = (bool)false;
			}
			$options['index_ad1_content'] = stripslashes($_POST['index_ad1_content']);
			// 文章内容页播放器两侧广告
			if ($_POST['single_post_ad1']) {
				$options['single_post_ad1'] = (bool)true;
			} else {
				$options['single_post_ad1'] = (bool)false;
			}
			$options['single_post_ad1_content'] = stripslashes($_POST['single_post_ad1_content']);
			// 边栏广告250*250
			if ($_POST['sidebar_ad250']) {
				$options['sidebar_ad250'] = (bool)true;
			} else {
				$options['sidebar_ad250'] = (bool)false;
			}
			$options['sidebar_ad250_content'] = stripslashes($_POST['sidebar_ad250_content']);
			update_option('cmedy_options', $options);
			
		} else {
			cmedyOptions::getOptions();
		}
		add_theme_page(__('主题设置', 'cmedy'), __('主题设置', 'cmedy'), 'edit_themes', basename(__FILE__), array('cmedyOptions', 'display'));
	}
	function display() {
		$options = cmedyOptions::getOptions();
?>
<style>
.wrap{margin-left:20px;}
.wrap h2{border-bottom:1px #ddd solid;margin-bottom:15px;}
.wrap h3{background:#22749b;color:#fff;font-size:14px;height:30px;line-height:30px;width:120px;padding-left:10px;margin:0;}
.form-table th{width:100px;color:#00F}
.form-table {border-collapse:collapse;width:720px;margin-bottom:15px;}
.form-table td,.form-table th {border:#e0e1e1 solid 1px; font-size:12px;color:#565656;line-height:20px;background:#fff;}
</style>
<form action="#" method="post" enctype="multipart/form-data" name="cmedy_form" id="cmedy_form">
	<div class="wrap">
		<h2><?php _e('《西米电影》主题设置', 'cmedy'); ?></h2>
        <h3>基础设置</h3>		
        <table class="form-table">
			<tbody>			
				<tr valign="top">
					<th scope="row">
						<?php _e('关键词', 'cmedy'); ?>
					</th>
					<td>
						<label>
                        	<input type="text" name="keywords" id="keyword" class="code" size="75" value="<?php echo($options['keywords']); ?>">
						</label>
					</td>
				</tr>			
				<tr valign="top">
					<th scope="row">
						<?php _e('描述', 'cmedy'); ?>
					</th>
					<td>
						<label>
							<textarea name="description" id="description" cols="50" rows="2" style="width:550px;font-size:12px;" class="code"><?php echo($options['description']); ?></textarea>
						</label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<?php _e('电视剧标签ID', 'cmedy'); ?>
					</th>
					<td>
						<label>
							<?php _e('电视剧标签ID填写', 'cmedy'); ?>
                        	<input type="text" name="dianshiju_tag_id" id="keyword" class="code" size="70" value="<?php echo($options['dianshiju_tag_id']); ?>">
						</label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<?php _e('google自定义搜索', 'cmedy'); ?>
						<br/>
					</th>
					<td>
						<label>
							<input name="google_cse" type="checkbox" value="checkbox" <?php if($options['google_cse']) echo "checked='checked'" ; ?> />
							 <?php _e('Using google custom search engine.','cmedy'); ?>
						</label>
						<br/>
						<?php _e('CX:','cmedy');?>
							<input type="text" name="google_cse_cx" id="google_cse_cx" class="code" size="40" value="<?php echo($options['google_cse_cx']); ?>">
						<br/>
						<br/>
						<?php printf(__('Find <code>name="cx"</code> in the <strong>Search box code</strong> of <a href="%1$s">Google Custom Search Engine</a>,<br/>and type the <code>value</code> here.<br/>For example: <code>000460604262027605306:ttlehu0poj0</code>','cmedy'),'http://www.google.com/coop/cse/'); ?>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<?php _e('页脚信息描述', 'cmedy'); ?>
						<br/>
						<small style="font-weight:normal;"><?php _e('(支持html代码)', 'cmedy'); ?></small>
					</th>
					<td>
						<label>
							<input name="footer_description" type="checkbox" value="checkbox" <?php if($options['footer_description']) echo "checked='checked'"; ?> />
						</label><?php _e('页脚描述。[温馨提示:换行符使用 &lt;br&gt; ]', 'cmedy'); ?>
						<br/>
						<label>
							<textarea name="footer_description_content" id="footer_description_content" cols="50" rows="5" style="width:550px;font-size:12px;" class="code"><?php echo($options['footer_description_content']); ?></textarea>
						</label>
					</td>
				</tr>	
				
				<tr valign="top">
					<th scope="row">
						<?php _e('页脚统计代码', 'cmedy'); ?>
						<br/>
						<small style="font-weight:normal;"><?php _e('(支持html代码)', 'cmedy'); ?></small>
					</th>
					<td>
						<label>
							<input name="analytics" type="checkbox" value="checkbox" <?php if($options['analytics']) echo "checked='checked'"; ?> />
						</label><?php _e('在页脚使用统计分析代码。', 'cmedy'); ?>
						<br/>
						<label>
							<textarea name="analytics_content" id="analytics_content" cols="50" rows="5" style="width:550px;font-size:12px;" class="code"><?php echo($options['analytics_content']); ?></textarea>
						</label>
					</td>
				</tr>							
			</tbody>
		</table>
<h3>广告位设置</h3>
        <table class="form-table">
			<tbody>

				<tr valign="top">
					<th scope="row">
						<?php _e('首页/分类页广告728*90', 'cmedy'); ?>
						<br/>
						<small style="font-weight:normal;"><?php _e('(支持html代码)', 'cmedy'); ?></small>
					</th>
					<td>
						<label>
							<input name="index_ad1" type="checkbox" value="checkbox" <?php if($options['index_ad1']) echo "checked='checked'"; ?> />
						</label><?php _e('在首页/分类页的 分页导航条 下的横幅图片广告728*90。', 'cmedy'); ?>
						<br/>
						<label>
							<textarea name="index_ad1_content" id="index_ad1_content" cols="50" rows="5" style="width:550px;font-size:12px;" class="code"><?php echo($options['index_ad1_content']); ?></textarea>
						</label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<?php _e('内容页播放器两侧广告160*600', 'cmedy'); ?>
						<br/>
						<small style="font-weight:normal;"><?php _e('(支持html代码)', 'cmedy'); ?></small>
					</th>
					<td>
						<label>
							<input name="single_post_ad1" type="checkbox" value="checkbox" <?php if($options['single_post_ad1']) echo "checked='checked'"; ?> />
						</label><?php _e('内容页播放器两侧广告160*600', 'cmedy'); ?>
						<br/>
						<label>
							<textarea name="single_post_ad1_content" id="single_post_ad1_content" cols="50" rows="5" style="width:550px;font-size:12px;" class="code"><?php echo($options['single_post_ad1_content']); ?></textarea>
						</label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<?php _e('边栏广告250*250', 'cmedy'); ?>
						<br/>
						<small style="font-weight:normal;"><?php _e('(支持html代码)', 'cmedy'); ?></small>
					</th>
					<td>
						<label>
							<input name="sidebar_ad250" type="checkbox" value="checkbox" <?php if($options['sidebar_ad250']) echo "checked='checked'"; ?> />
						</label><?php _e('边栏广告250px*250px。', 'Meiwenxinshang'); ?>
						<br/>
						<label>
							<textarea name="sidebar_ad250_content" id="sidebar_ad250_content" cols="50" rows="5" style="width:550px;font-size:12px;" class="code"><?php echo($options['sidebar_ad250_content']); ?></textarea>
						</label>
					</td>
				</tr>
			</tbody>
		</table>
		<p class="submit">
			<input class="button-primary" type="submit" name="cmedy_save" value="<?php _e('保存更改', 'cmedy'); ?>" />
		</p>
	</div>
</form>
<?php
	}
}
// register functions
add_action('admin_menu', array('cmedyOptions', 'add'));
/*  添加特色图 */
add_theme_support( 'post-thumbnails' );
/* 自定义缩略图 */
if ( function_exists( 'add_image_size' ) ){
add_image_size( 'featured', 130, 182, true ); // 缩略图
add_image_size( 'thumbnail', 100, 140, true ); // 缩略图
}
/* 抓取第一张缩略图 */
 function catch_first_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/data-original=\"(.*?)\"/', $post->post_content, $matches);
  $first_img = $matches [1] [0];
  if(empty($first_img)){
	$first_img = '';
    	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  	$first_img = $matches [1] [0];
  }
  if(empty($first_img)){ //自定义第一张图片
		$first_img= get_bloginfo ( 'stylesheet_directory' )."/img/1.jpg";
  }
  return $first_img;
 }
/* 抓取视频 */
function catch_first_video() {
	global $post, $posts;
	$first_video = '';
	ob_start();
	ob_end_clean();
	$video_output = preg_match_all("/(<object)(.*?)(<\/object>)/",$post->post_content, $video_matches);
	$first_video = $video_matches[0][0];
	return $first_video;
}
/* 文章筛除视频 */
function content_no_video() {
	global $post, $posts;
	$content = '';
	ob_start();
	ob_end_clean();
	$video_output = preg_match_all("/(<object)(.*?)(<\/object>)/",$post->post_content, $video_matches);
	$first_video = $video_matches[0][0];
	$content_output = str_replace($video_matches[0][0],"",$post->post_content);
	$content = $content_output;
	return $content;
}
/* 分页 */
function par_pagenavi($range = 9){
	// $paged - number of the current page
	global $paged, $wp_query;

	// How much pages do we have?
	if ( !$max_page ) {
		$max_page = $wp_query->max_num_pages;
	}
	// We need the pagination only if there are more than 1 page
	if($max_page > 1){
		if(!$paged){
			$paged = 1;
		}
			// On the first page, don't put the First page link
		if($paged != 1){
			echo "<a href='" . get_pagenum_link(1) . "' class='extend' title='跳转到首页'> 起始页 </a>";
		}
			// To the previous page
		previous_posts_link('«');
			// We need the sliding effect only if there are more pages than is the sliding range
		if($max_page > $range){
			// When closer to the beginning
				if($paged < $range){
					for($i = 1; $i <= ($range + 1); $i++){
						if($i==$paged) echo "<a class='on'>$i</a>";
							else echo "<a href='" . get_pagenum_link($i) ."'>$i</a>";
					}
				}
			// When closer to the end
		elseif($paged >= ($max_page - ceil(($range/2)))){
			for($i = $max_page - $range; $i <= $max_page; $i++){
					if($i==$paged) echo "<a class='on'>$i</a>";
							else echo "<a href='" . get_pagenum_link($i) ."'>$i</a>";
			}
		}
		// Somewhere in the middle
		elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){
			for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){
					if($i==$paged) echo "<a class='on'>$i</a>";
							else echo "<a href='" . get_pagenum_link($i) ."'>$i</a>";
					}
			}
		}
		// Less pages than the range, no sliding effect needed
		else{
			for($i = 1; $i <= $max_page; $i++){
					if($i==$paged) echo "<a class='on'>$i</a>";
							else echo "<a href='" . get_pagenum_link($i) ."'>$i</a>";
			}
		}
		// Next page
		next_posts_link('»');
		// On the last page, don't put the Last page link
		if($paged != $max_page){
			echo "<a href='" . get_pagenum_link($max_page) . "' class='extend' title='跳转到最后一页'> 终点页 </a>";
		}
	}
}

/* 文章访问计数 */
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return " 0 ";
    }
    return $count;
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
       $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
/* 移除标签中的文字 */
function wp_tag_cloud_remove_title_attributes($swm_tag) {
	// N.B. This function uses single quotes
	$swm_tag = preg_replace("` title='(.+)'`", "", $swm_tag);
	return $swm_tag;
}
add_filter('wp_tag_cloud', 'wp_tag_cloud_remove_title_attributes');
/* 移除头部信息 */
remove_action( 'wp_head', 'wp_generator'); 
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
/* 自定义菜单 */
register_nav_menus(
	array(
		'top-menu' => __( '顶部自定义菜单' ),
		'header-menu' => __( '导航自定义菜单' ),
		'footer-menu' => __( '底部自定义菜单' ),
	)
);
/* 后台小工具栏目 */
if ( function_exists('register_sidebar') ){
    register_sidebar(array(
	'name'=>'Home边栏',
	'description'   => '以下小工具仅在首页显示',
	'before_widget'=>'<div class="widget clearfix">',
	'after_widget'=>'</div>'
	));
    register_sidebar(array(
	'name'=>'Category边栏',
	'description'   => '以下小工具仅在分类页显示',
	'before_widget'=>'<div class="widget clearfix">',
	'after_widget'=>'</div>'
	));	
    register_sidebar(array(
	'name'=>'Single边栏',
	'description'   => '以下小工具仅在文章页显示',
	'before_widget'=>'<div class="widget clearfix">',
	'after_widget'=>'</div>'
	));	
    register_sidebar(array(
	'name'=>'Page边栏',
	'description'   => '以下小工具仅在独立页面显示',
	'before_widget'=>'<div class="widget clearfix">',
	'after_widget'=>'</div>'
	));	
    register_sidebar(array(
	'name'=>'其他边栏',
	'description'   => '以下小工具在其他页面显示',
	'before_widget'=>'<div class="widget clearfix">',
	'after_widget'=>'</div>'
	));		
}
/* 边栏小工具 */
include(TEMPLATEPATH . '/widget/sidebar_tags.php');
?>