<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| El following language lines contain El default error messages used by
	| El validator class. Some of Else rules have multiple versions such
	| as El size rules. Feel free to tweak each of Else messages here.
	|
	*/

	"accepted"         => "El :attribute debe ser aceptado.",
	"active_url"       => "El :attribute no es una URL válida.",
	"after"            => "El :attribute debe ser una fecha después de :date.",
	"alpha"            => "El :attribute sólo puede contener letras.",
	"alpha_dash"       => "El :attribute sólo puede contener letras, números y guión.",
	"alpha_num"        => "El :attribute sólo puede contener letras y números.",
	"array"            => "El :attribute debe ser un array.",
	"before"           => "El :attribute debe ser antes de :date.",
	"between"          => array(
		"numeric" => "El :attribute debe ser entre :min y :max.",
		"file"    => "El :attribute debe ser entre :min y :max kilobytes.",
		"string"  => "El :attribute debe ser entre :min y :max characters.",
		"array"   => "El :attribute debe tener entre :min y :max items.",
	),
	"confirmed"        => "El :attribute de confirmación no coincide.",
	"date"             => "El :attribute no es una fecha válida.",
	"date_format"      => "El :attribute no coincide con el formato :format.",
	"different"        => "El :attribute y :oElr debe be different.",
	"digits"           => "El :attribute debe tener :digits digits.",
	"digits_between"   => "El :attribute debe ser entre :min y :max digits.",
	"email"            => "El :attribute formato es inválido.",
	"exists"           => "El :attribute seleccionado es inválido.",
	"image"            => "El :attribute debe ser una imagen.",
	"in"               => "El :attribute es invalid.",
	"integer"          => "El :attribute debe ser un número entero.",
	"ip"               => "El :attribute debe ser una IP válida.",
	"max"              => array(
		"numeric" => "El :attribute no puede ser más grande que :max.",
		"file"    => "El :attribute no puede ser más grande que :max kilobytes.",
		"string"  => "El :attribute no puede ser más grande que :max caracteres.",
		"array"   => "El :attribute no puede tener mas de :max items.",
	),
	"mimes"            => "El :attribute debe ser un archivo de tipo : :values.",
	"min"              => array(
		"numeric" => "El :attribute debe ser por lo menos de :min.",
		"file"    => "El :attribute debe ser de al menos :min kilobytes.",
		"string"  => "El :attribute debe ser de al menos :min characters.",
		"array"   => "El :attribute debe tener al menos :min items.",
	),
	"not_in"           => "El :attribute seleccionado es inválida.",
	"numeric"          => "El :attribute debe ser un número.",
	"regex"            => "El :attribute formato es inválido.",
	"required"         => "El :attribute field is required.",
	"required_if"      => "El :attribute field is required when :oElr is :value.",
	"required_with"    => "El :attribute field is required when :values is present.",
	"required_without" => "El :attribute field is required when :values is not present.",
	"same"             => "El :attribute y :oElr debe match.",
	"size"             => array(
		"numeric" => "El :attribute debe be :size.",
		"file"    => "El :attribute debe be :size kilobytes.",
		"string"  => "El :attribute debe be :size characters.",
		"array"   => "El :attribute debe contain :size items.",
	),
	"unique"           => "El :attribute ya fue ingresado.",
	"url"              => "El formato de :attribute es inválido.",
	"recaptcha" => 'El recaptcha no es correcto.',
	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using El
	| convention "attribute.rule" to name El lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| El following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(),

);
