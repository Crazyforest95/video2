<?php if (is_home()) {
			$keywords = $options['keywords'];
			$description = $options['description'];
		}elseif (is_single()) {
			$tags = wp_get_post_tags($post->ID);
			foreach ($tags as $tag ) {$keywords = $keywords .$tag->name .",";} 
			$keywords = substr($keywords,0,-1);
			if (has_excerpt()) {
				$description = the_excerpt();
			}else {
				$description = mb_strimwidth(strip_tags(apply_filters('the_content',$post->post_content)),0,220,"...");
				$description = str_replace("\n","",$description);
				$description = empty($description)? $keywords : $description;
			}
		}elseif (is_category()) {
			$keywords = single_cat_title("", false);
			if ($paged > 1){	
			$description = trim(strip_tags(category_description($cat_ID))).' - '.get_bloginfo('name').'的'.single_cat_title('',false).'栏目分类存档的'.$paged.'页文章。';
			}else{
			$description = trim(strip_tags(category_description($cat_ID))).' - '.get_bloginfo('name').'的'.single_cat_title('',false).'栏目分类存档。';
			}
		}elseif (is_page()) {
			$keywords = get_the_title("", false);
			$description = mb_strimwidth(strip_tags(apply_filters('the_content',$post->post_content)),0,220,"...");
		}elseif (is_tag()) {
			$keywords = single_tag_title("", false);
			if ($paged > 1){
			$description =  trim(strip_tags(tag_description($tag_id))).' - '.get_bloginfo('name').'的'.single_tag_title('',false).'的标签存档文章-第'.$paged.'页。';
			}else{
			$description = trim(strip_tags(tag_description($tag_id))).' - '.get_bloginfo('name').'的'.single_tag_title('',false).'的标签存档文章。'; 
			}
		}elseif (is_day()) {
			$keywords = get_the_time('Y年m月d日');
			if ($paged > 1){
			$description = get_bloginfo('name').get_the_time('Y年m月d日').'的存档文章-第'.$paged.'页。';
			}else{
			$description = get_bloginfo('name').get_the_time('Y年m月d日').'的存档文章。';
			}
		}elseif (is_month()) {
			$keywords = get_the_time('Y年m月');
			if ($paged > 1){
			$description = get_bloginfo('name').get_the_time('Y年m月').'的存档文章-第'.$paged.'页。';
			}else{
			$description = get_bloginfo('name').get_the_time('Y年m月').'的存档文章。';
			}
		}elseif (is_year()) {
			$keywords = get_the_time('Y年');
			if ($paged > 1){
			$description = get_bloginfo('name').get_the_time('Y年').'的存档文章-第'.$paged.'页。';
			}else{
			$description = get_bloginfo('name').get_the_time('Y年').'的存档文章。';
			}
		}elseif(is_search()) { 
			$keywords = $s;
			$description = get_bloginfo('name').$s.'的搜索结果。';
		}elseif(is_404()) {
		    $keywords = '404,错误页面';
			$description = '404错误，未找到你需要的页面，请返回首页。';
		} 
?>