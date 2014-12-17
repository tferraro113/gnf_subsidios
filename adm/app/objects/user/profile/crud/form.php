<?php $lang = Lang::singleton();?>
</div>
<?php
$buttons = '<a class="btn btn-info" onclick="crudConfirm();"> &nbsp; <i class="icon-edit icon-white"></i>  '.$lang->line('confirm').' &nbsp; </a>';
__toolbar($buttons,$this->conf); 
?>
<div class="container">

<div class='x-table well  <?php echo $this->conf['color']; ?>'
        style="background: #FBFBFB;">
    <?php
    $q = $this->queryString;
    $q ['xtype'] = 'confirm';
    if (isset ( $q ['key'] ))
        unset ( $q ['key'] );
    ?>
    <form method="post"
            action="?<?php echo http_build_query($q, '', '&'); ?>"
            enctype="multipart/form-data" id="crudForm"
            style="padding: 0; margin: 0;"
            <?php if ($this->frmType == '2') { ?>
            class="form-horizontal" <?php } ?>>
              <?php
            $elements = $this->form;
            foreach ( $this->primaryKey as $f ) {
                $ary = explode ( '.', $f );
                if (isset ( $_GET ['key'] [$f] ) || isset ( $_POST ['key'] [$ary [0]] [$ary [1]] )) {
                    if (isset ( $_GET ['key'] [$f] )) {
                        $_POST ['key'] [$ary [0]] [$ary [1]] = $_GET ['key'] [$f];
                    }
                    echo __hidden ( 'key.' . $f );
                }
            }
            ?>
              <?php if (!empty($this->errors)) { ?>
            <div class="alert alert-error">
                <button data-dismiss="alert" class="close" type="button">×</button>
                <?php foreach ($this->errors as $error) { ?>
                    <?php if (count($error) > 0) { ?>
                        <strong>Error!</strong>
                        <?php echo implode('<br />', $error); ?>
                        <br />
                    <?php } ?>
                <?php } ?>
            </div>
        <?php } ?>
        <?php
        $editFlag = (! empty ( $_POST )) ? true : false;
        if (! empty ( $elements )) {
            foreach ( $elements as $field => $v ) {
                if (empty ( $v ['element'] ))
                    continue;
                __form_element_build_data ( $v, $field, $editFlag );
                ?>
                    <div
                class="control-group <?php if (array_key_exists($field, $this->errors)) { ?> error <?php } ?>">
                <label for="crudRowsPerPage" class="control-label"><b><?php echo (!empty($v['alias'])) ? $v['alias'] : $field; ?>
                                <?php if (array_key_exists($field, $this->validate)) { ?><b
                        style="color: red;">*</b> <?php } ?> 
                            </b> </label>
                <div class="controls">
                                <?php __config_2_form_element($v,$field,$this->da); ?>
                            </div>
            </div>
                    <?php
            }
        }
        ?>
    </form>
<script>
function crudCancel() {
	window.location = "<?php echo admin_url('xtype=index&key='); ?>";
}
function crudConfirm() {
	$('#crudForm').submit();
}
$(document).ready(function() {
	$('title').text('<?php echo $this->title; ?>');
});
</script>
</div>