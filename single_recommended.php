<!--推荐影视-->
<div class="mod_box" id="recommended_movie">			
	<h2 class="mod_tit_bg">推荐影视</h2>			
	<div class="mod_cont">
		<ul class="mod_list_single_pic">
			<?php
				$post_num = 5; // 數量設定.
				$exclude_id = $post->ID; // 單獨使用要開此行 
				$posttags = get_the_tags(); $i = 0;
				if ( $posttags ) {
					$tags = ''; foreach ( $posttags as $tag ) $tags .= $tag->term_id . ','; 
					$args = array(
								'post_status' => 'publish',
								'tag__in' => explode(',', $tags), // 只選 tags 的文章. 
								'post__not_in' => explode(',', $exclude_id), // 排除已出現過的文章.
								'caller_get_posts' => 1,
								'orderby' => 'comment_date', // 依評論日期排序.
								'posts_per_page' => $post_num,
							);
					query_posts($args);
					while( have_posts() ) { the_post(); 
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
			<?php
				$exclude_id .= ',' . $post->ID; $i ++;
					} wp_reset_query();
				}
				if ( $i < $post_num ) { // 如果 tags 文章數量不足, 再取 category 補足.
					$cats = ''; foreach ( get_the_category() as $cat ) $cats .= $cat->cat_ID . ',';
					$args = array(
							'category__in' => explode(',', $cats), // 只選 category 的文章.
							'post__not_in' => explode(',', $exclude_id),
							'caller_get_posts' => 1,
							'orderby' => 'comment_date',
							'posts_per_page' => $post_num - $i,
							);
					query_posts($args);
					while( have_posts() ) { the_post(); 
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
			<?php 
					$i++;
					} wp_reset_query();
				}
				if ( $i  == 0 )  echo '<li>没有相关文章!</li>';
			?>
		</ul>
	</div>		
</div>