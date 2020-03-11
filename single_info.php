<?php include(TEMPLATEPATH . '/guilei.php'); ?>
<div class="mod_info">	
	<h2 class="mod_tit_box">视频信息</h2>
	<div class="mod_cont_right">				
		<h3><a href="<?php the_permalink(); ?>" target="_self"><?php the_title(); ?></a></h3>
		<em class="c_txt3" id="detail_list_score"><?php if ( get_post_meta($post->ID, 'ratings_average', true) ) {echo get_post_meta($post->ID, 'ratings_average', true);}?></em>
		<p class="play_num"><span id="mod_viewcount_total">总播放量：<?php echo getPostViews(get_the_ID()); ?></span></p>
		<ul class="details_list clearfix">
			<li class="one_line"><span class="detail_title">导演：</span>
				<div class="detail_content"><?php if($dianying_daoyan){ for($t=0;$t<$daoyan_num;$t++) { ?><a href="<?php bloginfo('url'); ?>/tag/<?php echo $daoyan_liebiao[$t]; ?>" title="<?php echo $daoyan_liebiao[$t]; ?>" target="_self"><?php echo $daoyan_liebiao[$t];?></a>
		<?php } } ?></div>
			</li>
			<li class="one_line">
				<span class="detail_title">主演：</span>
				<div class="detail_content"><?php if($dianying_zhuyan){ for($i=0;$i<$zhuyan_num;$i++) { ?><a href="<?php bloginfo('url'); ?>/tag/<?php echo $zhuyan_liebiao[$i]; ?>" title="<?php echo $zhuyan_liebiao[$i]; ?>" target="_self"><?php echo $zhuyan_liebiao[$i]; ?></a><?php } } ?></div>
			</li>	
			<li class="half_line">地区：<?php if($dianying_shiqu){ for($j=0;$j<$dianying_shiqu_num;$j++) { ?><a href="<?php bloginfo('url'); ?>/tag/<?php echo $dianying_shiqu_liebiao[$j]; ?>" target="_self"><?php echo $dianying_shiqu_liebiao[$j]; ?></a><?php } } ?></li>	
			<li class="half_line">年份：<a target="_self" href="<?php bloginfo('url'); ?>/tag/<?php echo $dianying_nianfen;?>" ><?php echo $dianying_nianfen;?></a></li>
			<li class="half_line">类型：<?php if($dianying_leixing){ for($k=0;$k<$dianying_leixing_num;$k++) { ?><a href="<?php bloginfo('url'); ?>/tag/<?php echo $dianying_leixing_liebiao[$k]; ?>" target="_self"><?php echo $dianying_leixing_liebiao[$k]; ?></a><?php } } ?></li>
			<li class="half_line">时长：<?php echo $dianying_shichang; ?>分钟</li>	
		</ul>
		<div class="mod_desc close" id="mod_desc"><strong class="mod_t">简介：</strong><p class="mod_cont_info"><?php echo content_no_video(); ?></p></div> 
	</div>
</div>