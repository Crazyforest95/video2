<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php $options = get_option('cmedy_options');
		include(TEMPLATEPATH . '/meta.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta http-equiv="Content-Language" content="zh-CN" />
<title><?php if ( is_single() ||is_page() ||is_category() ||is_tag() ) {if($paged>1){wp_title('-',ture,'right');echo '第';echo $paged;echo '页 - ';bloginfo('description');}else{wp_title('-',ture,'right');bloginfo('description');}}else {bloginfo('name');} ?></title>
<meta name="keywords" content="<?php echo $keywords; ?>" />
<meta name="description" content="<?php echo $description; ?>" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css" type="text/css" media="screen" />
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
<link rel="bookmark" href="/favicon.ico" type="image/x-icon" />
<?php if(is_singular()) wp_enqueue_script('comment-reply'); ?>
<?php wp_head(); ?>
<?php flush(); ?>
</head>

<body>
<!-- 顶部 -->
<?php 
include(TEMPLATEPATH . '/header1.php');
include(TEMPLATEPATH . '/header2.php');
?>