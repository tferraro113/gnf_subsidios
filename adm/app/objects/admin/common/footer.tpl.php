<?php $lang = Lang::singleton(); 
if(isSet($_GET['lang'])){
	$langu = $_GET['lang'];
}else if(isSet($_SESSION['lang'])){
	$langu = $_SESSION['lang'];
}else if(isSet($_COOKIE['lang'])){
	$langu = $_COOKIE['lang'];
}else{
	global $da;

	$settingDao = new GenericDao('crud_settings', $da);

	$params = array();
	$params['conditions'] = array('setting_key = ?', array(sha1('general')));
	$setting = $settingDao->findFirst($params);
	$setting = unserialize($setting['setting_value']);

	$langu = $setting['default_language'];
}
?>
<br />
<br />
<br />
<div class="navbar navbar-fixed-bottom hidden-phone" id="status">
	<div class="btn-toolbar">
		<div class="btn-group pull-right" style="margin-top: 2px;">
			<p>
				<select onchange="change_language(this);"
					style="width: auto; display: inline-block; margin: 0px; padding: 0px; height: 22px; line-height: 22px;">
					<?php if (!empty($this->languages)){?>
					<?php foreach ($this->languages as $language){?>
					<option value="<?php echo $language['language_code']; ?>"
					<?php if ($language['language_code'] == $langu){?>
						selected="selected" <?php }?>>
						<?php echo htmlspecialchars($language['language_name']); ?>
					</option>
					<?php }?>
					<?php }?>
				</select>
			</p>
		</div>

		<div class="btn-group" style="margin-top: 3px;">
			<?php echo $lang->line('copyright_company'); ?>
		</div>

	</div>
</div>

<script>
function change_language(obj) {
	var url = window.location.href;
	var n = url.indexOf("?");
<?php 
$q = array();
if (!empty($_SERVER['QUERY_STRING'])) {
	parse_str($_SERVER['QUERY_STRING'], $q);
}
if (isset($q['lang']))
	unset($q['lang']);

if (isset($_GET['apache_mod_rewrite']) && (int) $_GET['apache_mod_rewrite'] == 1){
	if (isset($q['wp'])) {
		unset($q['wp']);
	}
}
?>
<?php if (!empty($q)){?>
		window.location = window.location = "?<?php echo http_build_query($q, '', '&'); ?>&lang="+obj.value;
<?php }else{ ?>
		window.location = "?lang="+obj.value;
<?php } ?>
	
}
</script>
