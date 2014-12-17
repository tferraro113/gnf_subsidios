var checkboxOption = function(field,object){
	if (ScrudCForm.elements[field].db_options == undefined){
		ScrudCForm.elements[field].db_options = {};
	}
	if (ScrudCForm.elements[field].list_choose == undefined){
		ScrudCForm.elements[field].list_choose = 'default';
	}
	if (ScrudCForm.elements[field].def_val == undefined){
		ScrudCForm.elements[field].def_val = [];
	}
    object.html('');
    object.append('<label><b>Options</b></label>');
	
    var so = $('<div id="checkbox-options" style="margin-top:5px;"></div>');
    var sd = $('<div id="select-database" style="margin-top:5px; display:none;"></div>');
    object.html('');
    object.append('<label><b>Options</b></label>');
    
    
    var too1 = $('<input name="type-of-options" value="default" type="radio">');
    if (ScrudCForm.elements[field].list_choose == 'default'){
        too1.attr({
            checked:'checked'
        });
        so.show();
        sd.hide();
    }
    too1.click(function(){
        ScrudCForm.elements[field].list_choose = 'default';
        ScrudCForm.changeFieldToForm(field);
        so.show();
        sd.hide();
        $('#form-preview').css({
            height:'auto'
        });
        $('#form-preview').height($('#form-preview').height());
    });
	
    object.append($('<label class="radio inline"></label>').append(too1).append(' Default '));
    
    var too2 = $('<input name="type-of-options" value="database"  type="radio">');
    if (ScrudCForm.elements[field].list_choose == 'database'){
        too2.attr({
            checked:'checked'
        });
        so.hide();
        sd.show();
    }
    too2.click(function(){
        ScrudCForm.elements[field].list_choose = 'database';
        ScrudCForm.changeFieldToForm(field);
        so.hide();
        sd.show();
    });
	
    object.append($('<label class="radio inline"></label>').append(too2).append(' Database '));
    
    object.append(so).append(sd);
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
            so.append(__scrudcheckboxOption(field,opts[i],_vals,_def));
        }
    }else{
        so.append(__scrudcheckboxOption(field));
    }
    
    var tbl = $('<select style="width:176px;"></select>');
    tbl.append('<option></option>');
    for(var i in ScrudCForm.tables){
        tbl.append('<option value="'+ScrudCForm.tables[i]+'">'+ScrudCForm.tables[i]+'</option>');
    }
    sd.append($('<label>Table &nbsp; </label>').append(tbl));
	
    var osd = $('<div></div>');
    sd.append(osd);
	
    tbl.change(function(){
        if ($.trim($(this).val()) != ''){
            __scrudCheckboxDbOption(osd,$(this).val(),field);
            ScrudCForm.elements[field].db_options.table = $(this).val();
        }else{
            ScrudCForm.elements[field].db_options.table = '';
            ScrudCForm.elements[field].db_options.key = '';
            ScrudCForm.elements[field].db_options.value = '';
            osd.html('');
        }
    });
    
    if (ScrudCForm.elements[field].list_choose == 'database'){
        if (ScrudCForm.elements[field].db_options != undefined){
            if (ScrudCForm.elements[field].db_options.table != undefined && ScrudCForm.elements[field].db_options.table != ''){
                tbl.val(ScrudCForm.elements[field].db_options.table);
                __scrudCheckboxDbOption(osd,ScrudCForm.elements[field].db_options.table,field);
            }
        }
    }
	
};

var __scrudcheckboxOption = function(field,val,value,_def){
    val = (val == undefined)?"":val;
    _def = (_def == undefined)?'':_def;
    value = (value == undefined)?$('input[name="c_value"]').length+1:value;
    var o = $('<div></div>');
    var def = $('<input type="checkbox" name="c_defaut"/>');
    if (_def == value){
    	def.attr({checked:'checked'});
    }
    var k = $('<input type="text" name="c_value"  style="width:40px;" value="'+value+'" placeholder="Value"/>');
    var t = $('<input type="text" name="c_lable"  style="width:98px;" value="'+val+'"  placeholder="Label" />');
    def.click(function(){
    	ScrudCForm.elements[field].def_val = [];
        $('#checkbox-options').find('input[name="c_lable"]').each(function(index){
            if ($.trim($(this).val()) != '' && $.trim($($('input[name="c_value"]').get(index)).val()) != ''){
            	if ($($('input[name="c_defaut"]').get(index)).is(':checked')){
            		ScrudCForm.elements[field].def_val[index] = $($('input[name="c_value"]').get(index)).val();
            	}
            }
        });
    });
    k.keyup(function(){
        ScrudCForm.elements[field].options = [];
        $('#preview_field_'+field).find('.controls').html('');
        $('#checkbox-options').find('input[name="c_lable"]').each(function(index){
            if ($.trim($(this).val()) != '' && $.trim($($('input[name="c_value"]').get(index)).val()) != ''){
                $('#preview_field_'+field).find('.controls').append($('<label class="checkbox" style="display:inline-block; margin-right: 15px;"><input type="checkbox" value="'+$($('input[name="c_value"]').get(index)).val()+'"/>'+$(this).val()+'</label>'));
                var _length = ScrudCForm.elements[field].options.length;
                ScrudCForm.elements[field].options[_length] = $(this).val();
                ScrudCForm.elements[field].values[_length] = $($('input[name="c_value"]').get(index)).val();
            }
        });
    });
    t.keyup(function(){
        ScrudCForm.elements[field].options = [];
        $('#preview_field_'+field).find('.controls').html('');
        $('#checkbox-options').find('input[name="c_lable"]').each(function(index){
            if ($.trim($(this).val()) != '' && $.trim($($('input[name="c_value"]').get(index)).val()) != ''){
                $('#preview_field_'+field).find('.controls').append($('<label class="checkbox" style="display:inline-block; margin-right: 15px;"><input type="checkbox" value="'+$($('input[name="c_value"]').get(index)).val()+'"/>'+$(this).val()+'</label>'));
                var _length = ScrudCForm.elements[field].options.length;
                ScrudCForm.elements[field].options[_length] = $(this).val();
                ScrudCForm.elements[field].values[_length] = $($('input[name="c_value"]').get(index)).val();
            }
        });
    });
    var ab = $('<a style="margin-bottom:10px; cursor:pointer;"><i class="icon-plus"></i></a>');
    ab.click(function(){
        __scrudcheckboxOption(field).insertAfter($(this).parent());
    });
    var db = $('<a style="margin-bottom:10px; cursor:pointer;"><i class="icon-minus"></i></a>');
    db.click(function(){
        if ($('#checkbox-options').children('div[class!="deleted"]').length > 1){
            $(this).parent().hide();
            $(this).parent().addClass('deleted');
            $(this).parent().find('input[type="text"]').val('');
            
            ScrudCForm.elements[field].options = [];
            $('#preview_field_'+field).find('.controls').html('');
            $('#checkbox-options').find('input[name="c_lable"]').each(function(index){
                if ($.trim($(this).val()) != '' && $.trim($($('input[name="c_value"]').get(index)).val()) != ''){
                    $('#preview_field_'+field).find('.controls').append($('<label class="checkbox" style="display:inline-block; margin-right: 15px;"><input type="checkbox" value="'+$($('input[name="c_value"]').get(index)).val()+'"/>'+$(this).val()+'</label>'));
                    var _length = ScrudCForm.elements[field].options.length;
                    ScrudCForm.elements[field].options[_length] = $(this).val();
                    ScrudCForm.elements[field].values[_length] = $($('input[name="c_value"]').get(index)).val();
                }
            });
        }
    });
    o.append(def).append(' ').append(k).append(' ').append(t).append(' ').append(ab).append(' ').append(db);
    return o;
};

var __scrudCheckboxDbOption =  function(osd,table,field){
	osd.html('');
    $.get(ScrudCForm.urlGetFields+table,{},function(json){
        var value = $('<select style="width:176px;"></select>');
        value.append('<option></option>');
        osd.append($('<label>Value  &nbsp; </label>').append(value));
        for(var i in json){
            value.append('<option value="'+json[i]+'">'+json[i]+'</option>');
        }
        if (ScrudCForm.elements[field].db_options.key != undefined && ScrudCForm.elements[field].db_options.key != ''){
            value.val(ScrudCForm.elements[field].db_options.key);
        }
        value.change(function(){
            ScrudCForm.elements[field].db_options.key = $(this).val();
            ScrudCForm.changeFieldToForm(field);
        });
		
        var option = $('<select  style="width:176px;"></select>');
        option.append('<option></option>');
        osd.append($('<label>Option </label>').append(option));
        for(var i in json){
            option.append('<option value="'+json[i]+'">'+json[i]+'</option>');
        }
        if (ScrudCForm.elements[field].db_options.value != undefined && ScrudCForm.elements[field].db_options.value != ''){
            option.val(ScrudCForm.elements[field].db_options.value);
        }
        option.change(function(){
            ScrudCForm.elements[field].db_options.value = $(this).val();
            ScrudCForm.changeFieldToForm(field);
        });
        
        var order = $('<select  style="width:158px;"></select>');
        order.append('<option></option>');
        osd.append($('<label>Order &nbsp </label>')).append(order);
        
        for(var i in json){
        	order.append('<option value="'+json[i]+'">'+json[i]+'</option>');
        }
        
        if (ScrudCForm.elements[field].db_options.order != undefined && ScrudCForm.elements[field].db_options.order != ''){
        	order.val(ScrudCForm.elements[field].db_options.order);
        }
        
        order.change(function(){
            ScrudCForm.elements[field].db_options.order = $(this).val();
            if (ScrudCForm.elements[field].db_options.order_type == undefined || ScrudCForm.elements[field].db_options.order_type == ''){
            	ScrudCForm.elements[field].db_options.order_type = 'asc';
            	order_type.val(ScrudCForm.elements[field].db_options.order_type);
            }
            ScrudCForm.changeFieldToForm(field);
        });
        
        var order_type = $('<select  style="width:70px; margin-left:2px;"></select>');
        order_type.append('<option></option>');
        order_type.append('<option value="asc">ASC</option>');
        order_type.append('<option value="desc">DESC</option>');
        osd.append(order_type);
        
        if (ScrudCForm.elements[field].db_options.order_type != undefined && ScrudCForm.elements[field].db_options.order_type != ''){
        	order_type.val(ScrudCForm.elements[field].db_options.order_type);
        }
        
        order_type.change(function(){
            ScrudCForm.elements[field].db_options.order_type = $(this).val();
            ScrudCForm.changeFieldToForm(field);
        });
        
        $('#form-preview').css({
            height:'auto'
        });
        $('#form-preview').height($('#form-preview').height());
    },'json');
}