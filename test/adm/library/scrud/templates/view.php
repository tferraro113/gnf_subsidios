<?php
global $date_format_convert;
$lang = Lang::singleton(); 
$auth = Auth::singleton();
$permissions = $auth->getPermissionType(); 
?>
</div>
<?php 
$buttons = '<a class="btn"  onclick="crudBack();">   <i class="icon-arrow-left"></i> '.$lang->line('back').'  &nbsp; </a>'." \n";
if (in_array(2, $permissions)) {
    $buttons .= '<a class="btn btn-info" onclick="__edit();" > &nbsp;  <i class="icon-edit icon-white"></i>  '.$lang->line('edit').' &nbsp; </a>';
}
__toolbar($buttons,$this->conf); 
?>
<div class="container">
    <div class='x-table well <?php echo $this->conf['color']; ?>'
        style="background: #FBFBFB;">
    <?php $elements = $this->form; ?>
    <form method="post" action="" id="crudForm"
            <?php if ($this->frmType == '2') { ?>
            class="form-horizontal" <?php } ?>>
        <?php
        foreach ( $elements as $field => $v ) {
            if (empty ( $v ['element'] ))
                continue;
            ?>
            		<div class="control-group">
                <label for="crudTitle" class="control-label"> <b><?php echo (!empty($v['alias'])) ? $v['alias'] : $field; ?></b>
                </label>
                <div class="controls" style="padding-top: 5px;">
                            <?php __config_2_view_element($v,$field,$this->da); ?>
                        </div>
            </div>
                <?php
        }
        ?>
    </form>
<script>
function __edit() {
	window.location = "<?php echo admin_url('xtype=form'); ?>";
}
function crudBack() {
	window.location = "<?php echo admin_url('xtype=index&key='); ?>";
}
$(document).ready(function() {
	$('title').html('<?php echo $this->title; ?>');
});
</script>
    </div>