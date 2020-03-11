<?php 	
	$guilei = get_post_meta($post->ID, 'guilei', true);
	$dianying_guilei = explode("|",$guilei);
	$dianying_daoyan = $dianying_guilei[0];
	$dianying_zhuyan = $dianying_guilei[1];
	$dianying_shiqu = $dianying_guilei[2];
	$dianying_nianfen = $dianying_guilei[3];
	$dianying_leixing = $dianying_guilei[4];
	$dianying_shichang = $dianying_guilei[5];
	$daoyan_liebiao = explode(",",$dianying_daoyan);	
	$daoyan_num = count($daoyan_liebiao);
	$zhuyan_liebiao = explode(",",$dianying_zhuyan);	
	$zhuyan_num = count($zhuyan_liebiao);
	$dianying_shiqu_liebiao = explode(",",$dianying_shiqu);	
	$dianying_shiqu_num = count($dianying_shiqu_liebiao);	
	$dianying_leixing_liebiao = explode(",",$dianying_leixing);	
	$dianying_leixing_num = count($dianying_leixing_liebiao);
?>