<?php $lang = Lang::singleton(); ?>
<div id="container" class="container">
	<div class="container">
		<h2>Settings: General</h2>
		<div id="tab_user_manager" class="row-fluid show-grid">
			<div class="span12">
				<ul class="nav nav-tabs" style="margin-bottom: 0px;">
					<li class="active"><a href="<?php echo strUrl('admin/setting/index.php'); ?>"><?php echo $lang->line('general');?></a>
					</li>
					<li class="dropdown"><a class="dropdown-toggle"
						data-toggle="dropdown" href="#"><?php echo $lang->line('email_templates'); ?> <b class="caret"></b>
					</a>
						<ul class="dropdown-menu">
							<li>
								<a href="<?php echo strUrl('admin/setting/email/new_user.php'); ?>"><?php echo $lang->line('new_user'); ?></a>
							</li>
							<li><a href="<?php echo strUrl('admin/setting/email/reset_password.php'); ?>"><?php echo $lang->line('reset_password'); ?></a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	
</div>
</div>
<div style="height: 52px;">
    <div data-spy="affix" data-offset-top="90" style="
         top: 24px;
         width: 100%;
         padding-top:5px;
         padding-bottom:5px;
         z-index: 100;">
        <div class="container" style="border-bottom: 1px solid #CCC; padding-bottom:5px;padding-top:5px;
        	background: #FBFBFB;
       		background-image: linear-gradient(to bottom, #FFFFFF, #FBFBFB);">
       		
            <div style="text-align:right;width:100%;">
                <button onclick="save_setting();" class="btn btn-primary"
							type="button"><?php echo $lang->line('save_change'); ?></button>
            </div>
        </div>
    </div>
 </div>
<div  class="container">
<div class="container">		
		
		<div class="row-fluid show-grid">
			<div class="span12">
				<form accept-charset="utf-8" method="post" id="SettingSaveForm" class="form-horizontal">
					<input type="hidden" value="<?php echo $this->setting_key; ?>" name="data[setting_key]">
					<legend> <?php echo $lang->line('general_options'); ?> </legend>
					<div class="control-group">
						<label for="SettingEmailAddress" class="control-label"><?php echo $lang->line('admin_email'); ?>
							<span style="color: red;">*</span>
						</label>
						<div class="controls">
							<input type="text" class="input-xlarge"	placeholder="<?php echo $lang->line('email_address'); ?>" name="data[email_address]"  id="settingAdminEmail"
							<?php if (isset($this->data['email_address'])){?>
								value = "<?php echo htmlspecialchars($this->data['email_address']); ?>"
							<?php }?> 
							/>
						</div>
					</div>

					<div class="control-group">
						<label for="SettingDefaultGroup" class="control-label"><?php echo $lang->line('default_group'); ?> </label>
						<div class="controls">
							<select id="SettingDefaultGroup"
								name="data[default_group]">
								<option value=""></option>
								<?php if (!empty($this->groups)){?>
								<?php foreach ($this->groups as $group){?>
									<option value="<?php echo $group['id']; ?>"
									<?php if ((int)$group['id'] == (int)$this->data['default_group'] ){?>
										selected="selected"
									<?php }?>
									><?php echo htmlspecialchars($group['group_name']); ?></option>	
								<?php }?>
								<?php }?>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label  class="control-label">&nbsp;</label>
						<div class="controls">
							<label style="width: 160px;" for="SettingDisableRegistration"class="checkbox"> 
								<input type="hidden" value="0" name="data[disable_registration]" />
								<input type="checkbox" value="1" name="data[disable_registration]" id = "SettingDisableRegistration"
								<?php if (isset($this->data['disable_registration']) && (int)$this->data['disable_registration'] == 1){?>
									checked ="checked"
							<?php }?>
								/> <?php echo $lang->line('disable_registrations'); ?>
							</label> 
							<label style="width: 170px;" for="SettingDisableResetPassword" class="checkbox"> 
								<input type="hidden" value="0" name="data[disable_reset_password]" />
								<input type="checkbox" value="1" name="data[disable_reset_password]" id = "SettingDisableResetPassword"
								<?php if (isset($this->data['disable_reset_password']) && (int)$this->data['disable_reset_password'] == 1){?>
									checked ="checked"
							<?php }?>
								/> <?php echo $lang->line('disable_reset_password'); ?>
							</label> 
							<label style="width: 250px;" for="SettingRequireEmailActivation" class="checkbox">
							 <input type="hidden" value="0"  name="data[require_email_activation]" />
							 <input type="checkbox" value="1" name="data[require_email_activation]" id = "SettingRequireEmailActivation"
							 <?php if (isset($this->data['require_email_activation']) && (int)$this->data['require_email_activation'] == 1){?>
									checked ="checked"
							<?php }?>
							 /> <?php echo $lang->line('require_email_activation'); ?>
							</label>
						</div>
					</div>
					<div class="control-group">
						<label for="SettingDefaultLanguage" class="control-label"><?php echo $lang->line('default_language'); ?> </label>
						<div class="controls">
							<select id="SettingDefaultLanguage"
								name="data[default_language]">
								<?php if (!empty($this->languages)){?>
								<?php foreach ($this->languages as $language){?>
									<option value="<?php echo $language['language_code']; ?>"
									<?php if ($language['language_code'] == $this->data['default_language'] ){?>
										selected="selected"
									<?php }?>
									><?php echo htmlspecialchars($language['language_name']); ?></option>	
								<?php }?>
								<?php }?>
							</select>
						</div>
					</div>
					<legend> <?php echo $lang->line('recaptcha_options'); ?> </legend>
					<div class="control-group">
						<label  class="control-label">&nbsp;</label>
						<div class="controls">
							<label style="width: 90px;" for="SettingEnableRecaptcha" class="checkbox"> 
								<input type="hidden" value="0" name="data[enable_recaptcha]"/>
								<input type="checkbox"value="1" name="data[enable_recaptcha]" id = "SettingEnableRecaptcha"
								<?php if (isset($this->data['enable_recaptcha']) && (int)$this->data['enable_recaptcha'] == 1){?>
									checked ="checked"
							<?php }?>
								/> <?php echo $lang->line('enable'); ?>
							</label>
						</div>
					</div>
					<div class="control-group">
						<label for="SettingRecaptchaPublicKey" class="control-label"><?php echo $lang->line('public_key'); ?> </label>
						<div class="controls">
							<input type="text" class="input-xxlarge" placeholder="<?php echo $lang->line('public_key'); ?>" name="data[recaptcha_public_key]"
							<?php if (isset($this->data['recaptcha_public_key'])){?>
								value = "<?php echo htmlspecialchars($this->data['recaptcha_public_key']); ?>"
							<?php }?> 
							/>
						</div>
					</div>
					<div class="control-group">
						<label for="recaptcha_private_key" class="control-label"><?php echo $lang->line('private_key'); ?> </label>
						<div class="controls">
							<input type="text" class="input-xxlarge" placeholder="<?php echo $lang->line('private_key'); ?>" name="data[recaptcha_private_key]" 
							<?php if (isset($this->data['recaptcha_private_key'])){?>
								value = "<?php echo htmlspecialchars($this->data['recaptcha_private_key']); ?>"
							<?php }?> 
							/>
						</div>
					</div>
					<legend> <?php echo $lang->line('email'); ?> </legend>
					<div class="control-group">
						<label class="control-label"><?php echo $lang->line('smtp'); ?></label>
						<div class="controls">
							<label style="width: 90px;" for="SettingEnableSmtp" class="checkbox"> 
								<input type="hidden" value="0" name="data[enable_smtp]"/>
								<input type="checkbox"value="1" name="data[enable_smtp]" id = "SettingEnableSmtp"
								<?php if (!empty($this->data['enable_smtp']) && (int)$this->data['enable_smtp'] == 1){?>
									checked ="checked"
							<?php }?>
								/> <?php echo $lang->line('enable'); ?>
							</label>
						</div>
					</div>
					<div class="control-group">
						<label for="SettingEmailAddress" class="control-label">
							<?php echo $lang->line('smtp_host'); ?>
						</label>
						<div class="controls" style="padding-top:10px;">
							<input type="text" class="input-xlarge"	placeholder="<?php echo $lang->line('smtp_server'); ?>" name="data[smtp_host]"  id="settingSmtpHost"
							<?php if (!empty($this->data['smtp_host'])){?>
								value = "<?php echo htmlspecialchars($this->data['smtp_host']); ?>"
							<?php }?> 
							/>
						</div>
					</div>
					<div class="control-group">
						<label for="SettingEmailAddress" class="control-label"><?php echo $lang->line('smtp_port'); ?></label>
						<div class="controls">
							<input type="text" class="input-small"	placeholder="<?php echo $lang->line('smtp_port'); ?>" name="data[smtp_port]"  id="settingSmtpPort"
							<?php if (!empty($this->data['smtp_port'])){?>
								value = "<?php echo htmlspecialchars($this->data['smtp_port']); ?>"
							<?php }?> 
							/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label"><?php echo $lang->line('smtp_security'); ?></label>
						<div class="controls">
							<select name="data[smtp_auth]" class="form-change">
                            	<option value=""><?php echo $lang->line('nothing_default'); ?></option>
                            	<option value="ssl" <?php if (!empty($this->data['smtp_auth']) && $this->data['smtp_auth'] == 'ssl'){?>
									selected="selected"
							<?php }?> ><?php echo $lang->line('ssl'); ?></option>
                            	<option value="tls" <?php if (!empty($this->data['smtp_auth']) && $this->data['smtp_auth'] == 'tls'){?>
									selected="selected"
							<?php }?> ><?php echo $lang->line('tls'); ?></option>
                          	 </select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label"><?php echo $lang->line('use_smtp_authentication'); ?></label>
						<div class="controls">
							<label style="width: 90px;" for="SettingEnableSmtpAuth" class="checkbox"> 
								<input type="hidden" value="0" name="data[enable_smtp_auth]"/>
								<input type="checkbox"value="1" name="data[enable_smtp_auth]" id = "SettingEnableSmtpAuth"
								<?php if (!empty($this->data['enable_smtp_auth']) && (int)$this->data['enable_smtp_auth'] == 1){?>
									checked ="checked"
							<?php }?>
								/> <?php echo $lang->line('enable'); ?>
							</label>
						</div>
					</div>
					<div class="control-group">
						<label for="SettingEmailAddress" class="control-label"><?php echo $lang->line('smtp_username'); ?></label>
						<div class="controls">
							<input type="text" class="input-xlarge"	placeholder="<?php echo $lang->line('smtp_account_username'); ?>" name="data[smtp_account]"  id="settingSmtpAccount"
							<?php if (!empty($this->data['smtp_account'])){?>
								value = "<?php echo htmlspecialchars($this->data['smtp_account']); ?>"
							<?php }?> 
							/>
						</div>
					</div>
					<div class="control-group">
						<label for="SettingEmailAddress" class="control-label"><?php echo $lang->line('smtp_password'); ?></label>
						<div class="controls">
							<input type="password" class="input-xlarge"	placeholder="<?php echo $lang->line('smtp_password'); ?>" name="data[smtp_password]"  id="settingSmtpPassword"
							<?php if (!empty($this->data['smtp_password'])){?>
								value = "<?php echo $this->data['smtp_password'];?>"
							<?php }?> 
							/>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
<script type="text/javascript">
function save_setting(){
	$.post('<?php echo strUrl('admin/setting/save.php'); ?>',$('#SettingSaveForm').serialize(),function(o){
		if (o.error == 0){
			$('#settingAdminEmail').parent().parent().removeClass('error');
			var strAlertSuccess = '<div class="alert alert-success" style="position: fixed; right:3px; bottom:20px; -webkit-box-shadow: 0px 1px 0px rgba(255, 255, 255, 0.8) inset; -moz-box-shadow: 0px 1px 0px rgba(255, 255, 255, 0.8) inset; box-shadow: 0px 1px 0px rgba(255, 255, 255, 0.8) inset; display: none;">'
				+ '<button data-dismiss="alert" class="close" type="button">×</button>'
				+ '<?php echo $lang->line('successfully_changed_setting');?>'
				+ '</div>';
			var alertSuccess = $(strAlertSuccess).appendTo('body');
			alertSuccess.show();
			setTimeout(function() {
				alertSuccess.remove();
			}, 2000);
		}else if (o.error == 1){
			$('#settingAdminEmail').parent().parent().addClass('error');
			var strAlertSuccess = '<div class="alert alert-error" style="position: fixed; right:3px; bottom:20px; -webkit-box-shadow: 0px 1px 0px rgba(255, 255, 255, 0.8) inset; -moz-box-shadow: 0px 1px 0px rgba(255, 255, 255, 0.8) inset; box-shadow: 0px 1px 0px rgba(255, 255, 255, 0.8) inset; display: none;">'
				+ '<button data-dismiss="alert" class="close" type="button">×</button>'
				+ '<strong><?php echo $lang->line('error'); ?>!</strong> '+o.error_message
				+ '</div>';
			var alertSuccess = $(strAlertSuccess).appendTo('body');
			alertSuccess.show();
			setTimeout(function() {
				alertSuccess.remove();
			}, 2000);
		}
	},'json');
}
</script>

</div>
