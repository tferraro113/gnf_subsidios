<?php $lang = Lang::singleton(); ?>
</div>
<?php 
$buttons = '<a class="btn" onclick="crudBack();"> <i class="icon-arrow-left"></i>  '.$lang->line('back').'  &nbsp; </a>'." \n";
$buttons .= '<a class="btn btn-info" onclick="crudUpdate();"> &nbsp; <i class="icon-ok icon-white"></i> '.$lang->line('save').' &nbsp; </a>';

__toolbar($buttons,$this->conf);
?>
<div class="container">
    <div class='x-table well <?php echo $this->conf['color']; ?>'
        style="background: #FBFBFB;">
        <form method="post" action="" id="crudForm"
            <?php if ($this->frmType == '2') { ?>
            class="form-horizontal" <?php } ?>>
            <input type="hidden" name="auth_token" id="auth_token"
                value="<?php echo $this->getToken(); ?>" />
        <?php
        $elements = $this->form;
        foreach ( $this->primaryKey as $f ) {
            $ary = explode ( '.', $f );
            if (isset ( $_POST ['key'] [$ary [0]] [$ary [1]] )) {
                echo __hidden ( 'key.' . $f );
            }
        }
        ?>
        <?php if (!empty($elements)) { ?>
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
        }
        ?>
        
    </form>
        <script>
function crudBack() {
	$('#crudForm').attr({action: '<?php echo admin_url('xtype=form&xid='); ?>'});
	$('#crudForm').submit();
}
function crudUpdate() {
	$('#crudForm').attr({action: '<?php echo admin_url('xtype=update&xid='); ?>'});
	$('#crudForm').submit();
}
$(document).ready(function() {
	$('title').text('<?php echo $this->title; ?>');
});
</script>
</div>