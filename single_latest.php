<!--最新发布影视-->
<div class="mod_box" id="latest_movie">
	<h2 class="mod_tit_bg">最新发布影视</h2>			
	<div class="mod_cont">
		<ul class="mod_list_single_pic">
			<?php 
				$args_post=array(
				'tag__not_in' => array( 119 ),
				'orderby' => post_date, 
				'showposts' => 5, // 显示篇数
				);
				$cmedy_latest_post_query = new WP_Query($args_post);
				if($cmedy_latest_post_query->have_posts()) : while ($cmedy_latest_post_query->have_posts()) : $cmedy_latest_post_query->the_post();
			?>
			<li>
				<a href="<?php the_permalink(); ?>" class="mod_single_poster">
					<img src="<?php if ( get_post_meta($post->ID, 'thumbnail', true) ) {echo get_post_meta($post->ID, 'thumbnail', true);}elseif ( has_post_thumbnail() ){$thumbnail_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail'); echo $thumbnail_image_url[0]; }else{ echo catch_first_image(); }?>" width="100" height="140" alt="<?php the_title(); ?>">
				<div class="mod_sign">
					<?php 
						$dianying = get_post_meta($post->ID, 'dianying', true);
						$dianying_fenlei = explode(",",$dianying);	
						$qingxidu = $dianying_fenlei[0];
						$pianlei = $dianying_fenlei[1];
					?>
					<?php if($qingxidu){ ?><span class="mod_HD"><?php echo $qingxidu; ?></span><?php } ?>
					<?php if($pianlei){ ?><span class="mod_version"><?php echo $pianlei; ?></span><?php } ?>
				</div>
				</a>
				<h6><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h6>
				<p><?php if ( get_post_meta($post->ID, 'jianjie', true) ) {echo get_post_meta($post->ID, 'jianjie', true);} ?></p>
			</li>
			<?php endwhile; endif; wp_reset_query(); ?>
		</ul>
	</div>		
</div>