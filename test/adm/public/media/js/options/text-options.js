var textOptions = function (field,object){
    object.html('');
    object.append('<label><b>Default value</b></label>');
    var defInput = $('<input type = "text" />');
    defInput.keyup(function(){
    	ScrudCForm.elements[field].def_val = $(this).val();
    });
    if (ScrudCForm.elements[field].def_val != undefined){
    	defInput.val(ScrudCForm.elements[field].def_val);
    }
    object.append(defInput);
    object.append('<label><b>Size</b></label>');
    object.append($('<label class="inline">Width: <input type="text" style="width:30px; margin-bottom:0; line-height:16px; height:16px; font-size:13px;" class="disabled" readonly="readonly" id="slider_width_val"/> px </label>'));
    object.append($('<div id="slider_width" style="width:95%;"></div>'));
    
    var value = $('#preview_field_'+field).find('.controls').children('input[type="text"]').width();
    $( "#slider_width" ).slider({
        range: "min",
        value: value,
        min: 50,
        max: 680,
        slide: function( event, ui ) {
            ScrudCForm.elements[field].type_options.size = ui.value;
            $('#preview_field_'+field).find('.controls').children('input[type="text"]').width(ui.value);
            $( "#slider_width_val" ).val(ui.value );
        }
    });
    $( "#slider_width_val" ).val($("#slider_width").slider( "value" ));
	
};

var dateOption = function (field,object){
	object.html('');
    object.append('<label><b>Default value</b></label>');
    var defInput = $('<input type = "checkbox" />');
    defInput.click(function(){
    	if ($(this).is(':checked')){
    		ScrudCForm.elements[field].def_val = 1;
    	}else{
    		ScrudCForm.elements[field].def_val = 0;
    	}
    });
    if (ScrudCForm.elements[field].def_val != undefined && ScrudCForm.elements[field].def_val == 1){
    	defInput.attr({checked:'checked'});
    }
    var lbl = $('<label class="checkbox inline"></label>');
    object.append(lbl.append(defInput).append('Current date'));
}

var dateTimeOption = function (field,object){
	object.html('');
    object.append('<label><b>Default value</b></label>');
    var defInput = $('<input type = "checkbox" />');
    defInput.click(function(){
    	if ($(this).is(':checked')){
    		ScrudCForm.elements[field].def_val = 1;
    	}else{
    		ScrudCForm.elements[field].def_val = 0;
    	}
    });
    if (ScrudCForm.elements[field].def_val != undefined && ScrudCForm.elements[field].def_val == 1){
    	defInput.attr({checked:'checked'});
    }
    var lbl = $('<label class="checkbox inline"></label>');
    object.append(lbl.append(defInput).append('Current date'));
}
