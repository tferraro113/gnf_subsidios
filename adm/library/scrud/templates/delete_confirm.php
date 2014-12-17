<?php $lang = Lang::singleton(); 
global $date_format_convert;
?>
</div>
<?php 
$buttons = '<a class="btn"  onclick="crudBack();">   <i class="icon-arrow-left"></i>  '.$lang->line('back').'  &nbsp; </a>'." \n";
$buttons .= '<a class="btn btn-danger" onclick="crudDelete(\''.http_build_query(array('key' => $_GET['key']), '', '&').'\');" > &nbsp;  <i class="icon-remove icon-white"></i> '.$lang->line('delete').' &nbsp; </a>';
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
                <label for="crudTitle" class="control-label"><b><?php echo (!empty($v['alias'])) ? $v['alias'] : $field; ?></b></label>
                <div class="controls" style="padding-top: 5px;">
                            <?php __config_2_view_element($v,$field,$this->da); ?>
                        </div>
            </div>
                <?php
        }
        ?>
    </form>
        <script>
function crudBack() {
	window.location = "<?php echo admin_url('xtype=index&key='); ?>";
}
function crudDelete(id) {
	window.location = "<?php echo admin_url('xtype=del&auth_token='.$this->getToken().'&key='); ?>&" + id;
}
$(document).ready(function() {
	$('title').html('<?php echo $this->title; ?>');
});
    </script>
    </div>