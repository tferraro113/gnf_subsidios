<?php $lang = Lang::singleton(); ?>
<div class="container">
	<div class="row">
		<div class="span4 offset4 well">
			<legend><?php echo $lang->line('create_a_php_admin_pro_account');?></legend>
			<?php if (count($this->errors) > 0) { ?>
            <div class="alert alert-error">
                <?php foreach($this->errors as $error) {?>
                <div><?php echo $error;?></div>
                <?php } ?>
            </div>   
            <?php } ?>
			<form  method="post" action="<?php echo strUrl('admin/signup.php'); ?>">
			<div class="control-group">
              <label  class="control-label"><?php echo $lang->line('user_name'); ?></label>
              <div class="controls">
                <input type="text" placeholder="<?php echo $lang->line('user_name'); ?>" name="crudUser[name]" class="span4"  value="<?php
		            if (isset($_POST['crudUser']['name'])) {
		                echo htmlspecialchars($_POST['crudUser']['name']);
		            }
		            ?>" />
              </div>
            </div>
            <div class="control-group">
              <label  class="control-label"><?php echo $lang->line('password'); ?></label>
              <div class="controls">
                <input type="password" placeholder="<?php echo $lang->line('password'); ?>"  name="crudUser[password]" class="span4"  value="<?php
                           if (isset($_POST['crudUser']['password'])) {
                               echo htmlspecialchars($_POST['crudUser']['password']);
                           }
            ?>" />
              </div>
            </div>
            <div class="control-group">
              <label  class="control-label"><?php echo $lang->line('confirm_password');?></label>
              <div class="controls">
                <input type="password" placeholder="<?php echo $lang->line('confirm_password');?>"  name="crudUser[confirm_password]" class="span4"  value="<?php
                           if (isset($_POST['crudUser']['confirm_password'])) {
                               echo htmlspecialchars($_POST['crudUser']['confirm_password']);
                           }
            ?>" />
              </div>
            </div>
            <div class="control-group">
              <label  class="control-label"><?php echo $lang->line('email');?></label>
              <div class="controls">
                <input type="text" placeholder="user@example.com"  name="crudUser[email]" class="span4"  value="<?php
                           if (isset($_POST['crudUser']['email'])) {
                               echo htmlspecialchars($_POST['crudUser']['email']);
                           }
            ?>" />
              </div>
            </div>
            <?php if ((int)$this->setting['enable_recaptcha'] == 1){?>
            <div class="control-group">
              <label  class="control-label"><?php echo $lang->line('recaptcha');?></label>
              <div class="controls">
                <script type="text/javascript">
					var RecaptchaOptions = {
						theme : 'white'
					};
				</script> <?php 
				$publickey = $this->setting['recaptcha_public_key'];
					echo recaptcha_get_html($publickey, null); ?>
              </div>
            </div>
			<?php }?>
			<button class="btn btn-info" type="submit"><?php echo $lang->line('create_my_account'); ?></button>
			<div style="padding-top:5px;">
				<label>
					<a href="<?php echo strUrl('admin/login.php'); ?>"><?php echo $lang->line('have_an_account'); ?></a>
				</label>
			</div>
			</form> 
		</div>
	</div>
</div>