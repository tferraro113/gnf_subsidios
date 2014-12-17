var radioOption = function(field,object){
    object.html('');
    if (ScrudCForm.elements[field].def_val == undefined){
		ScrudCForm.elements[field].def_val = [];
	}
    object.append('<label><b>Options</b></label>');
	
    var so = $('<div id="radio-options" style="margin-top:5px;"></div>');
    object.append(so);
    if (ScrudCForm.elements[field].values == undefined){
        ScrudCForm.elements[field].values = [];
    }
    if (ScrudCForm.elements[field].options != undefined && ScrudCForm.elements[field].options.length > 0){
        so.html('');
        var opts = ScrudCForm.elements[field].options;
        var vals = ScrudCForm.elements[field].values;
        var defs = ScrudCForm.elements[field].def_val;
        for(var i in opts){
            var _vals = (vals[i] != undefined)?vals[i]:1;
            var _def = (defs[i] != undefined)?defs[i]:'';
            so.append(__scrudRadioOption(field,opts[i],_vals,_def));
        }
    }else{
        so.append(__scrudRadioOption(field));
    }
	
};

var __scrudRadioOption = function(field,val,value,_def){
    val = (val == undefined)?"":val;
    value = (value == undefined)?$('input[name="r_value"]').length+1:value;
    _def = (_def == undefined)?'':_def;
    var o = $('<div></div>');
    var def = $('<input type="radio" name="r_defaut"/>');
    if (_def == value){
    	def.attr({checked:'checked'});
    }
    /*def.mousedown(function(){
    	if ($(this).is(':checked')){
    		$(this).removeAttr('checked');
    	}
    });
    def.mouseup(function(){
    	if ($(this).is(':checked')){
    		$(this).removeAttr('checked');
    	}
    });*/
    def.click(function(){
    	ScrudCForm.elements[field].def_val = [];
        $('#radio-options').find('input[name="r_lable"]').each(function(index){
            if ($.trim($(this).val()) != '' && $.trim($($('input[name="r_value"]').get(index)).val()) != ''){
            	if ($($('input[name="r_defaut"]').get(index)).is(':checked')){
            		ScrudCForm.elements[field].def_val[index] = $($('input[name="r_value"]').get(index)).val();
            	}
            }
        });
    });
    var k = $('<input type="text" name="r_value"  style="width:40px;" value="'+value+'" placeholder="Value"/>');
    var t = $('<input type="text" name="r_lable"   style="width:98px;" value="'+val+'" placeholder="Label" />');
    t.keyup(function(){
        ScrudCForm.elements[field].options = [];
        $('#preview_field_'+field).find('.controls').html('');
        $('#radio-options').find('input[name="r_lable"]').each(function(index){
            if ($.trim($(this).val()) != '' && $.trim($($('input[name="r_value"]').get(index)).val()) != ''){
                $('#preview_field_'+field).find('.controls').append($('<label class="radio" style="display:inline-block; margin-right: 15px;"><input type="radio" name="optionsRadios" value="'+$($('input[name="r_value"]').get(index)).val()+'"/>'+$(this).val()+'</label>'));
                var _length = ScrudCForm.elements[field].options.length;
                ScrudCForm.elements[field].options[_length] = $(this).val();
                ScrudCForm.elements[field].values[_length] = $($('input[name="r_value"]').get(index)).val();
            }
        });
    });
    k.keyup(function(){
        ScrudCForm.elements[field].options = [];
        $('#preview_field_'+field).find('.controls').html('');
        $('#radio-options').find('input[name="r_lable"]').each(function(index){
            if ($.trim($(this).val()) != '' && $.trim($($('input[name="r_value"]').get(index)).val()) != ''){
                $('#preview_field_'+field).find('.controls').append($('<label class="radio" style="display:inline-block; margin-right: 15px;"><input type="radio" name="optionsRadios" value="'+$($('input[name="r_value"]').get(index)).val()+'"/>'+$(this).val()+'</label>'));
                var _length = ScrudCForm.elements[field].options.length;
                ScrudCForm.elements[field].options[_length] = $(this).val();
                ScrudCForm.elements[field].values[_length] = $($('input[name="r_value"]').get(index)).val();
            }
        });
    });
    var ab = $('<a style="margin-bottom:10px; cursor:pointer;"><i class="icon-plus"></i></a>');
    ab.click(function(){
        __scrudRadioOption(field).insertAfter($(this).parent());
    });
    var db = $('<a style="margin-bottom:10px; cursor:pointer;"><i class="icon-minus"></i></a>');
    db.click(function(){
        if ($('#radio-options').children('div[class!="deleted"]').length > 1){
            $(this).parent().hide();
            $(this).parent().addClass('deleted');
            $(this).parent().find('input[type="text"]').val('');
            
            ScrudCForm.elements[field].options = [];
            $('#preview_field_'+field).find('.controls').html('');
            $('#radio-options').find('input[name="r_lable"]').each(function(index){
                if ($.trim($(this).val()) != '' && $.trim($($('input[name="r_value"]').get(index)).val()) != ''){
                    $('#preview_field_'+field).find('.controls').append($('<label class="radio" style="display:inline-block; margin-right: 15px;"><input type="radio" name="optionsRadios" value="'+$($('input[name="r_value"]').get(index)).val()+'"/>'+$(this).val()+'</label>'));
                    var _length = ScrudCForm.elements[field].options.length;
                    ScrudCForm.elements[field].options[_length] = $(this).val();
                    ScrudCForm.elements[field].values[_length] = $($('input[name="r_value"]').get(index)).val();
                }
            });
        }
    });
    o.append(def).append(' ').append(k).append(' ').append(t).append(' ').append(ab).append(' ').append(db);
    return o;
};