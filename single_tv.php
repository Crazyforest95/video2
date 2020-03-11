<?php if ( get_post_meta($post->ID, 'dianshiju', true) ) { ?>
<div class="mod_long_list bor clearfix">
	<div class="mod_tab"><ul><li class="tab_title"><strong>挑选剧集</strong></li></ul></div>	
	<div class="tab_cont">
		<div class="mod_cont">
			<ul class="clearfix">
			<?php
				$args=array(
					'tag' => get_post_meta($post->ID, 'dianshiju', true),   // 标签
					'orderby' => 'date', 
					'order' => 'ASC',
					'showposts' => -1,
				);
				query_posts($args);
				if(have_posts()) : $i=0; while (have_posts()) : $i++; the_post(); 
			?>
				<li><a target="_self" href="<?php the_permalink(); ?>" title="第<?php echo $i; ?>集"><?php echo $i; ?></a></li>
			<?php endwhile; endif; wp_reset_query();?>
			</ul>
		</div>
	</div>
</div>
<?php } ?>