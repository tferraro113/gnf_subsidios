<?php $lang = Lang::singleton(); ?>
<div class="container">
		<h2><?php echo $lang->line('user_manager_permission');?>	</h2>
        <ul class="nav nav-tabs" id="auth_tab" style="margin-bottom: 10px;">
            <?php if ((int) $_SESSION['CRUD_AUTH']['group']['group_manage_flag'] == 1 || 
            		(int) $_SESSION['CRUD_AUTH']['group']['group_manage_flag'] == 3 ||
            		(int) $_SESSION['CRUD_AUTH']['user_manage_flag'] == 1 || 
            		(int) $_SESSION['CRUD_AUTH']['user_manage_flag'] == 3 ) { ?>
            <li><a href="<?php echo strUrl('admin/user/user.php'); ?>"> &nbsp; <?php echo $lang->line('users');?> &nbsp; </a></li>
            <li><a href="<?php echo strUrl('admin/user/group.php'); ?>"><?php echo $lang->line('groups');?></a></li>
            <li  class="active"><a href="<?php echo strUrl('admin/user/permission.php'); ?>"><?php echo $lang->line('permissions');?></a></li>
          <?php } ?>
        </ul>
        
         <ul class="nav nav-tabs" id="auth_tab" style="margin-bottom: 10px;">
         	<li><a href="<?php echo strUrl('admin/user/permission.php'); ?>"><?php echo $lang->line('group_permissions');?></a></li>
         	<li class="active" ><a href="<?php echo strUrl('admin/user/user_permission.php'); ?>"><?php echo $lang->line('user_permissions');?></a></li>
         </ul>
         <div>
         	<label><strong><?php echo $lang->line('choose_user');?></strong></label> 
         		<div id="user_permission" style="width:400px;"></div>
         </div>
         <br/>
         <div id="user_permission_container"></div>
</div>
<script>
$("#user_permission").select2({
    placeholder: "<?php echo $lang->line('search_for_a_user');?>",
    minimumInputLength: 1,
    ajax: {
        url: "<?php echo strUrl('admin/user/user_json.php'); ?>",
        dataType: 'jsonp',
        data: function(term, page) {
            return {
                q: term, // search term
            };
        },
        results: function(data, page) { // parse the results into the format expected by Select2.
            return {results: data};
        }
    },
    initSelection: function(element, callback) {},
    formatResult: movieFormatResult, // omitted for brevity, see the source of this page
    formatSelection: movieFormatSelection, // omitted for brevity, see the source of this page
    dropdownCssClass: "bigdrop", // apply css that makes the dropdown taller
    escapeMarkup: function(m) {
        return m;
    } 
});

$("#user_permission").on('change',function(e){
	$.get("<?php echo strUrl('admin/user/user_json.php?id='); ?>"+e.val,{},function(data){
		$('#user_permission_container').html('');
		$('#user_permission_container').append(data);
	},'html');
});

function movieFormatResult(user) {
    return user.user_name;;
}

function movieFormatSelection(user) {
    return user.user_name;
}

</script>