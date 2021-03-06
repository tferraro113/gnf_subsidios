<?php 
$lang = Lang::singleton();
$conf = array (
		'title' => $lang->line('component_manager'),
		'limit' => '20',
		'frm_type' => '2',
		'join' =>
		array (
		),
		'order_field' => 'crud_components.id',
		'order_type' => 'asc',
		'search_form' =>
		array (
				0 =>
				array (
						'alias' => $lang->line('name'),
						'field' => 'crud_components.component_name',
				),
				1 =>
				array (
						'alias' => $lang->line('group'),
						'field' => 'crud_components.group_id',
				),
		),
		'validate' =>
		array (
				'crud_components.component_name' =>
				array (
						'rule' => 'notEmpty',
						'message' => sprintf($lang->line('please_enter_value'), $lang->line('name')),
				),
		),
		'data_list' =>
		array (
				'no' =>
				array (
						'alias' => $lang->line('no_'),
						'width' => 40,
						'align' => 'center',
						'format' => '{no}',
				),
				'crud_components.component_name' =>
				array (
						'alias' => $lang->line('name'),
				),
				'crud_components.group_id' =>
				array (
						'alias' => $lang->line('group'),
				),
				'crud_components.component_table' =>
				array (
						'alias' => $lang->line('table_name'),
				),
				'action' =>
				array (
						'alias' => $lang->line('actions'),
						'format' => '<a type="button" onclick="__view(\'{ppri}\'); return false;" class="btn btn-mini">'.$lang->line('view').'</a> <a type="button" onclick="__edit(\'{ppri}\'); return false;" class="btn btn-mini btn-info">'.$lang->line('edit').'</a> <a type="button" onclick="__delete(\'{ppri}\'); return false;" class="btn btn-mini btn-danger">'.$lang->line('delete').'</a>',
						'width' => 130,
						'align' => 'center',
				),
		),
		'form_elements' =>
		array (
				'crud_components.component_name' =>
				array (
						'alias' => $lang->line('name'),
						'element' =>
						array (
								0 => 'text',
								1 =>
								array (
										'style' => 'width:208px;',
								),
						),
				),
				'crud_components.group_id' =>
				array (
						'alias' => $lang->line('group'),
						'element' =>
						array (
								0 => 'autocomplete',
								1 =>
								array (
										'option_table' => 'crud_group_components',
										'option_key' => 'id',
										'option_value' => 'name',
								),
						),
				),
		),
		'elements' =>
		array (
				'crud_components.component_name' =>
				array (
						'alias' => $lang->line('name'),
						'element' =>
						array (
								0 => 'text',
								1 =>
								array (
										'style' => 'width:208px;',
								),
						),
				),
				'crud_components.group_id' =>
				array (
						'alias' => $lang->line('group'),
						'element' =>
						array (
								0 => 'autocomplete',
								1 =>
								array (
										'option_table' => 'crud_group_components',
										'option_key' => 'id',
										'option_value' => 'name',
								),
						),
				),
		),
);