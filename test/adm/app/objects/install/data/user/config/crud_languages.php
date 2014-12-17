<?php
$lang = Lang::singleton(); 
$conf = array (
		'title' => $lang->line('language_manager'),
		'limit' => '20',
		'frm_type' => '2',
		'join' =>
		array (
		),
		'order_field' => 'crud_languages.language_code',
		'order_type' => 'asc',
		'search_form' =>
		array (
				0 =>
				array (
						'alias' => $lang->line('language_code_m'),
						'field' => 'crud_languages.language_code',
				),
				1 =>
				array (
						'alias' => $lang->line('language_name'),
						'field' => 'crud_languages.language_name',
				),
		),
		'validate' =>
		array (
				'crud_languages.language_code' =>
				array (
						'rule' => 'notEmpty',
						'message' => sprintf($lang->line('please_enter_value'), $lang->line('language_code_m')),
				),
				'crud_languages.language_name' =>
				array (
						'rule' => 'notEmpty',
						'message' => sprintf($lang->line('please_enter_value'), $lang->line('language_name')),
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
				'crud_languages.language_code' =>
				array (
						'alias' => $lang->line('language_code_m'),
						'width' => '200',
				),
				'crud_languages.language_name' =>
				array (
						'alias' => $lang->line('language_name'),
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
				'crud_languages.language_code' =>
				array (
						'alias' => $lang->line('language_code_m'),
						'element' =>
						array (
								0 => 'text',
								1 =>
								array (
										'style' => 'width:50px;',
								),
						),
				),
				'crud_languages.language_name' =>
				array (
						'alias' => $lang->line('language_name'),
						'element' =>
						array (
								0 => 'text',
								1 =>
								array (
										'style' => 'width:342px;',
								),
						),
				),
		),
		'elements' =>
		array (
				'crud_languages.language_code' =>
				array (
						'alias' => $lang->line('language_code_m'),
						'element' =>
						array (
								0 => 'text',
								1 =>
								array (
										'style' => 'width:50px;',
								),
						),
				),
				'crud_languages.language_name' =>
				array (
						'alias' => $lang->line('language_name'),
						'element' =>
						array (
								0 => 'text',
								1 =>
								array (
										'style' => 'width:342px;',
								),
						),
				),
		),
);