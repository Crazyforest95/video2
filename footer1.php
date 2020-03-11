<div class="foot_sub">
<div class="foot_cont">

<!-- 搜索框 -->
<?php if($options['google_cse'] && $options['google_cse_cx']) : ?>
		<div id="ftsearchbox">
			<form action="<?php bloginfo('home'); ?>/cse" method="get">
				<div class="ft_search_content">
					<input class="fttextfield" id="ftsearchtxt" type="text" name="q" size="24" />
					<input type="hidden" name="cx" value="<?php echo $options['google_cse_cx']; ?>" />
					<input type="hidden" name="ie" value="UTF-8" />
					<input class="ftbutton" id="ftsearchbtn" type="submit" value="" />
				</div>
			</form>
		</div>
<?php else : ?>
		<div id="ftsearchbox">
			<form action="<?php bloginfo('home'); ?>/" id="search" method="get">
				<div class="ft_search_content">
					<input class="fttextfield" id="ftsearchtxt" type="text" name="s" size="14" value="<?php echo wp_specialchars($s, 1); ?>" />
					<input class="ftbutton" id="ftsearchbtn" type="submit" value="" />
				</div>
			</form>
		</div>
<?php endif; ?>
		<script type="text/javascript"> 
		//<![CDATA[
			var ftsearchbox = document.getElementById("ftsearchbox");
			var ftsearchtxt = document.getElementById("ftsearchtxt");
			var ftsearchbtn = document.getElementById("ftsearchbtn");
			var fttiptext = "亲,想搜点什么呢...";
			if(ftsearchtxt.value == "" || ftsearchtxt.value == fttiptext) {
				ftsearchtxt.className += " ftsearchtip";
				ftsearchtxt.value = fttiptext;
			}
			ftsearchtxt.onfocus = function(e) {
				if(ftsearchtxt.value == fttiptext) {
					ftsearchtxt.value = "";
					ftsearchtxt.className = ftsearchtxt.className.replace("ftsearchtip", "");
				}
			}
			ftsearchtxt.onblur = function(e) {
				if(ftsearchtxt.value == "") {
					ftsearchtxt.className += " ftsearchtip";
					ftsearchtxt.value = fttiptext;
				}
			}
			ftsearchbtn.onclick = function(e) {
				if(ftsearchtxt.value == "" || ftsearchtxt.value == fttiptext) {
					return false;
				}
			}
		//]]>
		</script>

<div class="foot_hot">
<p>
<?php wp_tag_cloud('smallest=10&largest=10&number=5&order=DESC'); ?>
</p>
</div>
</div><!--.foot_cont -->
</div>