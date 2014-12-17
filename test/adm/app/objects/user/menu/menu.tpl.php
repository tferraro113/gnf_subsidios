<?php $lang = Lang::singleton(); ?>
<div class="container">
<h2><?php echo $lang->line('account_settings'); ?></h2>
<ul class="nav nav-tabs" id="my_settings" style="margin-bottom: 0px;">
    <li <?php if ($this->type == 'profile'){ ?> class="active" <?php } ?>>
        <a href="<?php echo strUrl('user/editProfile.php'); ?>"><?php echo $lang->line('edit_profile'); ?></a>
    </li>
    <li  <?php if ($this->type == 'password'){ ?> class="active" <?php } ?>>
        <a href="<?php echo strUrl('user/changePassword.php'); ?>"><?php echo $lang->line('change_password'); ?></a>
    </li>
</ul>
</div>