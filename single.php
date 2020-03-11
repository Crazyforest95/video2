<?php get_header(); ?>
<?php $options = get_option('cmedy_options'); ?>
<div class="container clearfix">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="mod_player_wrap">
	<div class="mod_inner">
		<div class="mod_paths tow_rows" id="mod_paths">
			<div class="mod_path_title"><span id="h1_title"><?php the_title(); ?></span></div>							<?php if(function_exists('yoast_breadcrumb')){ yoast_breadcrumb('', ''); } ?>
		</div>
		<!-- 播放器区域 开始 -->		
		<div class="mod_player_full clearfix" id="mod_player_full">
<div style="width:200px;height:500px;text-align:center;float:left;">
<?php if($options['single_post_ad1']){ ?>
<?php echo($options['single_post_ad1_content']); ?>
<?php } ?>
</div>
<div class="mod_player" id="mod_player"><?php echo catch_first_video(); ?></div>
<div style="width:200px;height:500px;text-align:center;float:right;">
<?php if($options['single_post_ad1']){ ?>
<?php echo($options['single_post_ad1_content']); ?>
<?php } ?>
</div>			
		</div>
		<!-- 播放器区域 结束 -->
	</div>
</div>
<?php endwhile; endif; wp_reset_query();?>
	<div class="grid_single_left">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="mod_action bor">
			<!-- 打分 S -->
			<div class="mod_grade_b">
				<h4 id="h_score_title" style="">评分</h4>
				<div class="mod_star_box" ><?php if(function_exists('the_ratings')) { the_ratings(); } ?></div>
				<strong class="scores"><?php if ( get_post_meta($post->ID, 'ratings_average', true) ) {echo get_post_meta($post->ID, 'ratings_average', true);}?></strong>
			</div>
			<!-- 打分 end -->
	    
			<!--ie6下鼠标经过加hover,已收藏加over-->
			<div class="mod_collect_longer">
				<a href="javascript:void(0);" onClick="addFav();" id="lk_collect"><i></i>收藏</a>
			</div>
    
			<!-- 百度分享 -->
			<div class="mod_shares_list">
				<!-- Baidu Button BEGIN -->
				<div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
					<span class="bds_more"></span>
					<a class="bds_qzone"></a>
					<a class="bds_tsina"></a>
					<a class="bds_tqq"></a>
					<a class="bds_renren"></a>
					<a class="bds_t163"></a>
					<a class="shareCount"></a>
				</div>
				<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=625906" ></script>
				<script type="text/javascript" id="bdshell_js"></script>
				<script type="text/javascript">
					document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
				</script>
				<!-- Baidu Button END -->		
			</div>
	
			<div class="mod_play_num">
				<h4>播放：</h4>
				<p class="num"><strong><?php echo getPostViews(get_the_ID()); ?></strong></p>
			</div>   
		</div>
		<?php setPostViews(get_the_ID());?><!-- postviews not plugin -->				
		<?php endwhile; endif; wp_reset_query();?>
	
		<?php 
			include(TEMPLATEPATH . '/single_tv.php');
			include(TEMPLATEPATH . '/single_recommended.php');
			include(TEMPLATEPATH . '/single_hot.php');
			include(TEMPLATEPATH . '/single_latest.php');
		?>
		<?php if($options['index_ad1']){ ?>
		<div align="center" style="margin-bottom:10px;display:block;clear:both;">
		<?php echo($options['index_ad1_content']); ?>
		</div>
		<?php } ?>	
	</div>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>