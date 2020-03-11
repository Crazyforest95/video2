<?php $options = get_option('cmedy_options');?>
<?php include(TEMPLATEPATH . '/footer1.php'); ?>
<!-- #footer start -->
<div id="footer">
	<div class="ftcontent">
	<?php if(is_home()&&!is_paged()){ ?>	
		<div id="friendly">
			<span class="item">友情链接：</span>
			<ul class="footer_links">
				<?php
					$bookmarks = get_bookmarks('orderby=rand');
					if ( !empty($bookmarks) ) {
						foreach ($bookmarks as $bookmark) {
							echo '<li><a target="_blank" href="' . $bookmark->link_url . '" title="' . $bookmark->link_description . '">' . $bookmark->link_name . '</a></li>';
						}
					}
				?>
			</ul>
		</div>	
    <?php } ?>		
        	<div id="footer-content">
			
                <div class="footer-l">
					<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'before' => ' | ','after' => ' | ', 'depth' => 1 )); ?>
				</div>
                <div class="footer-c">
					<div><?php 
							global $wpdb;
							$post_datetimes = $wpdb->get_row($wpdb->prepare("SELECT YEAR(min(post_date_gmt)) AS firstyear, YEAR(max(post_date_gmt)) AS lastyear FROM $wpdb->posts WHERE post_date_gmt > 1970"));
							if ($post_datetimes) {
								$firstpost_year = $post_datetimes->firstyear;
								$lastpost_year = $post_datetimes->lastyear;
								$copyright = __('Copyright &copy; ') .$firstpost_year;
							if($firstpost_year != $lastpost_year) {
								$copyright .= '-'.$lastpost_year;
							}
								$copyright .= ' ';
								echo $copyright;
							}
						?>
					<a href="<?php bloginfo('url'); ?>"><em><?php bloginfo('name'); ?></em></a>. All Rights Reserved. <?php if ( $options['analytics'] ) { echo $options['analytics_content']; } ?>
					</div>
				</div>
                <div class="footer-c">
					<div>
						Powered by <a target="_blank" href="http://wordpress.org/">WordPress</a>, Theme by <a target="_blank" href="http://wpcme.com/">wordpress主题</a> designed by <a target="_blank" href="http://wpcme.com/">西米</a>.
					</div>
				</div>
            </div>
        </div>
</div>
<!-- #footer end -->
<?php wp_footer(); ?>

<!-- 收藏&顶部 start -->
<div id="favMsg" >
    <a href="javascript:void(0);" onclick="addFav();" class="addfav" title="欢迎收藏本站"><span>收藏</span></a><a href="javascript:void(0);" onclick="Top();" class="gototop" ><span>回到顶部</span></a>
</div>
<script type="text/javascript">
//<![CDATA[
//添加收藏
function addFav() {
	addbookmarksite(window.document.title, 'href');
}
function addbookmarksite(title, url) {
    if (url == 'href') {
    	url = window.location.href;
	}
    if (document.all) {
    	window.external.AddFavorite(url, title);
	} else if (window.sidebar) {
    		window.sidebar.addPanel(title, url, "")
		} else {
			alert("对不起，您的浏览器不支持此操作!\n请您使用菜单栏或Ctrl+D收藏本站。")	
		}
}
//回到顶部
function Top() {
	$("html, body").animate({
		scrollTop : 0
	}, 120);
}
//]]>
</script>
<!-- 收藏&顶部 end -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
</body>
</html>