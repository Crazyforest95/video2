<?php $options = get_option('cmedy_options'); ?>
<div <?php if(is_single()){ ?>class="grid_single_sidebar"<?php }else{ ?>class="grid_index_sidebar" <?php } ?> >
<?php if(is_single()){ include(TEMPLATEPATH . '/single_info.php'); } ?>
	<!-- 筛选条件 start -->
	<div class="mod_filter bor"><h4 class="c_txt5">电影索引</h4></div>
	<div <?php if(is_single()){ ?>class="mod_single bor"<?php }else{ ?>class="mod_indexs bor"<?php } ?>>
		<div class="mod_cont">
<?php 
if(function_exists('dynamic_sidebar')):
if(is_home()){
	dynamic_sidebar('Home边栏');
}elseif(is_category()){
	dynamic_sidebar('Category边栏');
}elseif(is_single()){
	dynamic_sidebar('Single边栏');
}elseif(is_page()){
	dynamic_sidebar('Page边栏');
}else{
	dynamic_sidebar('其他边栏');
}
endif; ?>
		</div>
	</div>
<?php if(!is_single()&&$options['sidebar_ad250']){ ?>
<div align="center" style="margin-bottom:10px;display:block;clear:both;">
<?php echo($options['sidebar_ad250_content']); ?>
</div>
<?php } ?>
</div>