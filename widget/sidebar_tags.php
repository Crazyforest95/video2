<?php

/**

* 功能：调用某分类下的文章列表

* 调用：在主题functions.php文件里引入本文件

**/


class cmedy_sidebar_tags extends WP_Widget {

	function cmedy_sidebar_tags(){

		$widget_ops = array('description' => 'cmedy-边栏标签');

		parent::WP_Widget('cmedy_sidebar_tags',$name='cmedy-边栏标签',$widget_ops);

		//parent::直接使用父类中的方法

		//$name 这个小工具的名称,

		//$widget_ops 可以给小工具进行描述等等。

		//$control_ops 可以对小工具进行简单的样式定义等等。

	}

	//小工具的选项设置表单

	function form($instance){

		//title:模块标题，tags_id:排除标签ID

		$instance = wp_parse_args((array)$instance,array('title'=>'边栏标签','tags_id'=>''));//默认值
		
		$title = htmlspecialchars($instance['title']);

		$tags_id = htmlspecialchars($instance['tags_id']);
		
		echo '<p style="text-align:left;"><label for="'.$this->get_field_name('title').'">标题:<input style="width:200px;" id="'.$this->get_field_id('title').'" name="'.$this->get_field_name('title').'" type="text" value="'.$title.'" /></label></p>';

		echo '<p style="text-align:left;"><label for="'.$this->get_field_name('tags_id').'">填写只显示的标签ID:<br>(多个标签不显示使用英文逗号隔开)<input style="width:200px;" id="'.$this->get_field_id('tags_id').'" name="'.$this->get_field_name('tags_id').'" type="text" value="'.$tags_id.'" /></label></p>';

	}
	
	//更新保存 小工具表单数据

	function update($new_instance,$old_instance){

		$instance = $old_instance;
		
		$instance['title'] = strip_tags(stripslashes($new_instance['title']));
		
		$instance['tags_id'] = strip_tags(stripslashes($new_instance['tags_id']));		

		return $instance;

	}

	//文章随机显示

	function sidebar_tags_us($args = ''){

		$default = array();

		$r = wp_parse_args($args,$default);

		extract($r);
?>	
	
	<h3 class="c_txt1"><?php if( $title ) echo $title; ?></h3>
	<div class="item_group clearfix">
		<?php wp_tag_cloud('smallest=10&largest=10&include='.$tags_id); ?>
	</div>

<?php
	}
//小工具在前台显示效果

	function widget($args, $instance){

		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('边栏标签','cmedy') : $instance['title']);//小工具前台标题
		
		$tags_id = empty($instance['tags_id']) ? '' : $instance['tags_id'];

		self::sidebar_tags_us("tags_id=$tags_id&title=$title");

	}

}

//激活小工具
register_widget('cmedy_sidebar_tags');
?>