<?php $lang = Lang::singleton(); ?>
<div class="container">
         <?php echo $this->user_menu; ?>
         <br />
        <form class="bs-docs-example form-horizontal" method="post" action="<?php echo strUrl('user/changePassword.php'); ?>">
            <?php if (count($this->errors) > 0) { ?>
                <div class="alert alert-error">
                    <button data-dismiss="alert" class="close" type="button">×</button>
                    <?php foreach ($this->errors as $v) { ?>
                        <strong><?php echo $lang->line('error'); ?>!</strong> <?php echo $v; ?> <br />
                    <?php } ?>
                </div>
            <?php } ?>
            <?php if ($this->update_flag == 1 && count($this->errors) <= 0) { ?>
                <div class="alert alert-success">
                    <button data-dismiss="alert" class="close" type="button">×</button>
                    <?php echo $lang->line('you_have_successfully_changed_your_password');?>
                </div>
            <?php } ?>
            <div class="control-group  <?php if (array_key_exists('current_password', $this->errors)) { ?> error <?php } ?>">
                <label for="inputPassword" class="control-label" style=" text-align: right !important;"><?php echo $lang->line('current_password'); ?></label>
                <div class="controls">
                    <input type="password" placeholder="<?php echo $lang->line('current_password'); ?>" id="current_password"  name="current_password"  value="<?php
            if (isset($_POST['current_password'])) {
                echo htmlspecialchars($_POST['current_password']);
            }
            ?>" >
                </div>
            </div>
            <div class="control-group  <?php if (array_key_exists('new_password', $this->errors)) { ?> error <?php } ?>">
                <label for="inputPassword" class="control-label" style=" text-align: right !important;"><?php echo $lang->line('new_password'); ?></label>
                <div class="controls">
                    <input type="password" placeholder="<?php echo $lang->line('new_password'); ?>" id="new_password"   name="new_password"  value="<?php
                           if (isset($_POST['new_password'])) {
                               echo htmlspecialchars($_POST['new_password']);
                           }
            ?>" >
                </div>
            </div>
            <div class="control-group <?php if (array_key_exists('confirm_new_password', $this->errors)) { ?> error <?php } ?>">
                <label for="inputPassword" class="control-label" style=" text-align: right !important;"><?php echo $lang->line('re_type_new_password'); ?></label>
                <div class="controls">
                    <input type="password" placeholder="<?php echo $lang->line('re_type_new_password'); ?>" id="confirm_new_password"   name="confirm_new_password"  value="<?php
                           if (isset($_POST['confirm_new_password'])) {
                               echo htmlspecialchars($_POST['confirm_new_password']);
                           }
            ?>" >
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button class="btn btn-primary" type="submit"><?php echo $lang->line('change_password'); ?></button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('title').html($('h3').html());
    });
</script>