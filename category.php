<?php get_header(); ?>
<?php $options = get_option('cmedy_options'); $dianshiju_tag_id = $options['dianshiju_tag_id']; ?>
<div class="container clearfix">
	<div class="grid_index_left">
		<!-- 此处加上类名details 切换详情模式-->
			<div class="mod_cont" id="content">
				<ul class="mod_list_pic">
		<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$currentcat_id = get_query_var('cat');
		$args=array(
			'cat' => $currentcat_id,  // 分类ID
			'tag__not_in' => array($dianshiju_tag_id),
			'paged' => $paged,
		);
		$wp_query = new WP_Query($args);
		if($wp_query->have_posts()) : $p=0; while ($wp_query->have_posts()) : $p++; $wp_query->the_post(); ?>
		<li id="post-<?php the_ID(); ?>">
		<a href="<?php the_permalink(); ?>" class="mod_poster" title="<?php the_title(); ?>" target="_blank">
			<img src="<?php if ( get_post_meta($post->ID, 'featured', true) ) {echo get_post_meta($post->ID, 'featured', true);}elseif ( has_post_thumbnail() ){$featured_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'featured'); echo $featured_image_url[0]; }else{ echo catch_first_image(); }?>" alt="<?php the_title(); ?>" width="130" height="182">
			<?php 
				$dianying = get_post_meta($post->ID, 'dianying', true);
				$dianying_fenlei = explode(",",$dianying);	
				$qingxidu = $dianying_fenlei[0];
				$pianlei = $dianying_fenlei[1];
			?>
			<div class="mod_sign">
				<?php if($qingxidu){ ?><span class="mod_HD"><?php echo $qingxidu; ?></span><?php } ?>
				<?php if($pianlei){ ?><span class="mod_version"><?php echo $pianlei; ?></span><?php } ?>
			</div>
		</a>
		<h6 class="scores"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" target="_blank"><?php the_title(); ?></a>
		<!--8-8.7-->
		<strong class="scores_txt"><?php if ( get_post_meta($post->ID, 'ratings_average', true) ) {echo get_post_meta($post->ID, 'ratings_average', true);}?></strong>
		</h6>
		<?php include(TEMPLATEPATH . '/guilei.php'); ?>
		<p>导演：
		<?php if($dianying_daoyan){ for($t=0;$t<$daoyan_num;$t++) { ?>
		<a href="<?php bloginfo('url'); ?>/tag/<?php echo $daoyan_liebiao[$t]; ?>" title="<?php echo $daoyan_liebiao[$t]; ?>" target="_blank"><?php echo $daoyan_liebiao[$t];?></a>
		<?php } } ?>
		</p>
		<p>主演：
		<?php if($dianying_zhuyan){ for($i=0;$i<$zhuyan_num;$i++) { ?>
		<a href="<?php bloginfo('url'); ?>/tag/<?php echo $zhuyan_liebiao[$i]; ?>" title="<?php echo $zhuyan_liebiao[$i]; ?>" target="_blank"><?php echo $zhuyan_liebiao[$i]; ?></a>
		<?php } } ?>
		</p>
		<p>播放：<?php echo getPostViews(get_the_ID()); ?></p>
		</li>
		<?php if(($p==4||$p==12)&&$options['index_ad1']){ ?>
		<li align="center" style="width:700px;height:90px;margin-bottom:10px;overflow:hidden;clear:both;">
		<?php echo($options['index_ad1_content']); ?>
		</li>
		<?php } ?>
		<?php endwhile; endif;  wp_reset_query(); ?>	
		</ul>
		</div>
		<!-- 分页 开始 -->
		<div class="main_page">
			<?php par_pagenavi(9); ?>
		</div>
		<!-- 分页 结束 -->
	</div>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>