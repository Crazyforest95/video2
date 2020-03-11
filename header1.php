<?php $options = get_option('cmedy_options'); ?>
<div class="head_simple">
<div class="mod_inner">
<h1 class="logo"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
<!-- 导航 开始 -->
<div class="mod_nav_simple">
<?php wp_nav_menu( array('theme_location' => 'top-menu' ) ); ?>
</div>
<!-- 导航 结束 -->
<!-- 搜索框 -->
<?php if($options['google_cse'] && $options['google_cse_cx']) : ?>
		<div id="searchbox">
			<form action="<?php bloginfo('home'); ?>/cse" method="get">
				<div class="search_content">
					<input class="textfield" id="searchtxt" type="text" name="q" size="24" />
					<input type="hidden" name="cx" value="<?php echo $options['google_cse_cx']; ?>" />
					<input type="hidden" name="ie" value="UTF-8" />
					<input class="button" id="searchbtn" type="submit" value="" />
				</div>
			</form>
		</div>
<?php else : ?>
		<div id="searchbox">
			<form action="<?php bloginfo('home'); ?>/" id="search" method="get">
				<div class="search_content">
					<input class="textfield" id="searchtxt" type="text" name="s" size="14" value="<?php echo wp_specialchars($s, 1); ?>" />
					<input class="button" id="searchbtn" type="submit" value="" />
				</div>
			</form>
		</div>
<?php endif; ?>
		<script type="text/javascript"> 
		//<![CDATA[
			var searchbox = document.getElementById("searchbox");
			var searchtxt = document.getElementById("searchtxt");
			var searchbtn = document.getElementById("searchbtn");
			var tiptext = "请输入关键词...";
			if(searchtxt.value == "" || searchtxt.value == tiptext) {
				searchtxt.className += " searchtip";
				searchtxt.value = tiptext;
			}
			searchtxt.onfocus = function(e) {
				if(searchtxt.value == tiptext) {
					searchtxt.value = "";
					searchtxt.className = searchtxt.className.replace("searchtip", "");
				}
			}
			searchtxt.onblur = function(e) {
				if(searchtxt.value == "") {
					searchtxt.className += " searchtip";
					searchtxt.value = tiptext;
				}
			}
			searchbtn.onclick = function(e) {
				if(searchtxt.value == "" || searchtxt.value == tiptext) {
					return false;
				}
			}
		//]]>
		</script>

</div>
</div>