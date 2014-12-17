<?php $lang = Lang::singleton(); ?>
<div class="container">
	<div class="row">
		<div class="span4 offset4 well">
			<legend><?php echo $lang->line('reset_password');?></legend>
			<?php if (count($this->errors) > 0) { ?>
			<div class="alert alert-error">
				<?php foreach($this->errors as $error) {?>
				<div>
					<?php echo $error;?>
				</div>
				<?php } ?>
			</div>
			<?php } ?>
			<form method="post" action="<?php echo strUrl('admin/reset_password.php?code='.$this->code); ?>">
				<div style="display: none;">
					<input name="_method" value="post" type="hidden">
				</div>
				<input name="data[code]"
					value="<?php echo $this->code;?>"
					type="hidden">
				<div class="control-group">
					<label for="inputEmail" class="control-label"><?php echo $lang->line('new_password'); ?> </label>
					<div class="controls">
						<input name="data[user_password]" class="span4"  placeholder="<?php echo $lang->line('new_password'); ?>" id="Password" type="password" value="<?php
		            if (isset($_POST['data']['user_password'])) {
		                echo htmlspecialchars($_POST['data']['user_password']);
		            }
		            ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label for="inputPassword" class="control-label"><?php echo $lang->line('confirm_password'); ?> </label>
					<div class="controls">
						<input name="data[user_confirm_password]" placeholder="<?php echo $lang->line('confirm_password'); ?>" class="span4"  id="ConfirmPassword" type="password" value="<?php
		            if (isset($_POST['data']['user_confirm_password'])) {
		                echo htmlspecialchars($_POST['data']['user_confirm_password']);
		            }
		            ?>" />
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<button class="btn btn-primary" type="submit"><?php echo $lang->line('reset_password_submit'); ?></button>
					</div>
				</div>

			</form>
		</div>
	</div>
</div>
