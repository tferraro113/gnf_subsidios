<?php

/**
 *
 * @param $fieldName
 * @param $options
 */
function __text($fieldName, $attributes = array()) {
    $strAttr = '';
    $name = '';
    $id = '';
    $f = explode('.', trim($fieldName));
    if (count($f) == 1) {
        if (isset($_POST[$fieldName])) {
            $attributes['value'] = $_POST[$fieldName];
        }
        $id = $fieldName;
        $name = $fieldName;
    } else if (count($f) > 1) {
        $tmpValue = (isset($attributes['value'])) ? $attributes['value'] : null;
        $attributes['value'] = $_POST;
        foreach ($f as $k => $v) {
            if ($k == 0) {
                $name = $v;
                $id = $v;
            } else {
                $name .= '[' . $v . ']';
                $id .= ucfirst($v);
            }
        }
        foreach ($f as $k => $v) {
            if (isset($attributes['value'][$v])) {
                $attributes['value'] = $attributes['value'][$v];
            } else {
                if (empty($tmpValue)) {
                    unset($attributes['value']);
                } else {
                    $attributes['value'] = $tmpValue;
                }
                break;
            }
        }
    }
    if (!empty($attributes)) {
        foreach ($attributes as $k => $v) {
            $strAttr .= ' ' . htmlspecialchars($k) . '="' . htmlspecialchars($v) . '" ';
        }
    }
    $html = '<input type="text" name="' . $name . '" id="' . $id . '" ' . $strAttr . ' />';

    return $html;
}

/**
 *
 * @param $fieldName
 * @param $options
 */
function __image($fieldName, $attributes = array()) {
    $strAttr = '';
    $name = '';
    $id = '';
    $fname = '';
    $fid = '';
    $f = explode('.', trim($fieldName));
    if (count($f) == 1) {
        if (isset($_POST[$fieldName])) {
            $attributes['value'] = $_POST[$fieldName];
        }
        $id = $fieldName;
        $fid = 'img_' . $fieldName;
        $name = $fieldName;
        $fname = 'img_' . $fieldName;
    } else if (count($f) > 1) {
        $tmpValue = (isset($attributes['value'])) ? $attributes['value'] : null;
        $attributes['value'] = $_POST;
        foreach ($f as $k => $v) {
            if ($k == 0) {
                $name = $v;
                $id = $v;
                $fname = 'img_' . $v;
                $fid = 'img_' . $v;
            } else {
                $name .= '[' . $v . ']';
                $id .= ucfirst($v);

                $fname .= '[' . $v . ']';
                $fid .= ucfirst($v);
            }
        }
        foreach ($f as $k => $v) {
            if (isset($attributes['value'][$v])) {
                $attributes['value'] = $attributes['value'][$v];
            } else {
                if (empty($tmpValue)) {
                    unset($attributes['value']);
                } else {
                    $attributes['value'] = $tmpValue;
                }
                break;
            }
        }
    }
    if (!empty($attributes)) {
        foreach ($attributes as $k => $v) {
            if ($k == 'thumbnail')
                continue;
            $strAttr .= ' ' . htmlspecialchars($k) . '="' . htmlspecialchars($v) . '" ';
        }
    }
    $html = '
                 <input type="file" name="' . $fname . '" id="' . $fid . '" ' . $strAttr . '/>
                 <input type="hidden" name="' . $name . '" id="' . $id . '" ' . $strAttr . '/>
                     
                 <input id="f_text_' . $id . '" class="input disabled" readonly="readonly" type="text"> 
		 <input class="btn" value="Choose..."  type="button" id="f_button_' . $id . '">
			
<script>
$("#f_button_' . $id . '").click(function(){
    $("#' . $fid . '").trigger("click");
});
$("#' . $fid . '").change(function(){
    $("#f_text_' . $id . '").val($(this).val());
});
</script>
                ';
    if (!empty($attributes['value']) && is_file(ROOT . '/public/media/images/' . $attributes['value'])) {
        if (file_exists(__IMAGE_UPLOAD_REAL_PATH__ . '/thumbnail_' . $attributes['value'])) {
            $imgFile = __IMAGE_PATH__ . "thumbnail_" . $attributes['value'];
        } else {
            $imgFile = __IMAGE_PATH__ . "mini_thumbnail_" . $attributes['value'];
        }
        $html .= " <div style='display:inline-block;'><img src='" . $imgFile . "' />
            <input type='button' class='btn btn-mini btn-danger' value='delete' id='del_img_btn_" . $id . "' style='vertical-align: bottom;' /></div>
";
        $queryString = '';
        if (!empty($_SERVER['QUERY_STRING'])) {
            parse_str($_SERVER['QUERY_STRING'], $queryString);
        }
        $q = $queryString;
        unset($q['wp']);
        $q['xtype'] = 'delFile';
        $html .= "
<script>
    $('#del_img_btn_" . $id . "').click(function(){
        var delBtn = this;
        $.post('" . strUrl('admin/scrud/delFile.php?fileType=img&table='.$_GET['table'] . "&" . http_build_query($q, '', '&')) . "',{src:{file:'" . $attributes['value'] . "',field:'" . $fieldName . "'}},function(){
            $(delBtn).parent().remove();
            $('#" . $id . "').val('');
        });
    });
</script>
";
    }

    return $html;
}

function __date($fieldName, $attributes = array()) {
	global $date_format_convert;
    $strAttr = '';
    $name = '';
    $id = '';
    $f = explode('.', trim($fieldName));
    if (count($f) == 1) {
        if (isset($_POST[$fieldName])) {
            $attributes['value'] = $_POST[$fieldName];
        }
        $id = $fieldName;
        $name = $fieldName;
    } else if (count($f) > 1) {
        $tmpValue = (isset($attributes['value'])) ? $attributes['value'] : null;
        $attributes['value'] = $_POST;
        foreach ($f as $k => $v) {
            if ($k == 0) {
                $name = $v;
                $id = $v;
            } else {
                $name .= '[' . $v . ']';
                $id .= ucfirst($v);
            }
        }
        foreach ($f as $k => $v) {
            if (isset($attributes['value'][$v])) {
                $attributes['value'] = $attributes['value'][$v];
            } else {
                if (empty($tmpValue)) {
                    unset($attributes['value']);
                } else {
                    $attributes['value'] = $tmpValue;
                }
                break;
            }
        }
    }
    if (!empty($attributes)) {
    	if (isset($attributes['value'])){
    		if (is_date($attributes['value'])){
    			if (__DATE_FORMAT__ == 'dd/MM/yyyy'){
    				$attributes['value'] = str_replace('/','-',$attributes['value']);
    			}
    			$attributes['value'] = str2mysqltime($attributes['value'],'Y-m-d');
    			$attributes['value'] = date($date_format_convert[__DATE_FORMAT__],strtotime($attributes['value']));
    		}else{
    			$attributes['value'] = '';
    		}
    	}
        foreach ($attributes as $k => $v) {
            $strAttr .= ' ' . htmlspecialchars($k) . '="' . htmlspecialchars($v) . '" ';
        }
    }
    
    $html = '<div class="input-append date" id="' . $id . '">
				<input type="text"  name="' . $name . '" ' . $strAttr . '  data-format="'.__DATE_FORMAT__.'" />
				<span class="add-on"><i class="icon-calendar"></i></span>
			  </div>
<script>
$(document).ready(function(){
   	$(\'#' . $id . '\').datetimepicker({pickTime: false});
});
</script>';

    return $html;
}


function __datetime($fieldName, $attributes = array()) {
	global $date_format_convert;
	$strAttr = '';
	$name = '';
	$id = '';
	$f = explode('.', trim($fieldName));
	if (count($f) == 1) {
		if (isset($_POST[$fieldName])) {
			$attributes['value'] = $_POST[$fieldName];
		}
		$id = $fieldName;
		$name = $fieldName;
	} else if (count($f) > 1) {
		$tmpValue = (isset($attributes['value'])) ? $attributes['value'] : null;
		$attributes['value'] = $_POST;
		foreach ($f as $k => $v) {
			if ($k == 0) {
				$name = $v;
				$id = $v;
			} else {
				$name .= '[' . $v . ']';
				$id .= ucfirst($v);
			}
		}
		foreach ($f as $k => $v) {
			if (isset($attributes['value'][$v])) {
				$attributes['value'] = $attributes['value'][$v];
			} else {
				if (empty($tmpValue)) {
					unset($attributes['value']);
				} else {
					$attributes['value'] = $tmpValue;
				}
				break;
			}
		}
	}
	if (!empty($attributes)) {
		if (isset($attributes['value'])){
			if (is_date($attributes['value'])){
				if (__DATE_FORMAT__ == 'dd/MM/yyyy'){
					$attributes['value'] = str_replace('/','-',$attributes['value']);
				}
				$attributes['value'] = str2mysqltime($attributes['value']);
				$attributes['value'] = date($date_format_convert[__DATE_FORMAT__].' H:i:s',strtotime($attributes['value']));
			}else{
				$attributes['value'] = '';
			}
		}
		foreach ($attributes as $k => $v) {
			$strAttr .= ' ' . htmlspecialchars($k) . '="' . htmlspecialchars($v) . '" ';
		}
	}
	$html = '<div class="input-append date" id="' . $id . '">
				<input type="text"  name="' . $name . '" ' . $strAttr . '  data-format="'.__DATE_FORMAT__.' hh:mm:ss" />
				<span class="add-on"><i class="icon-calendar"></i></span>
			  </div>
<script>
$(document).ready(function(){
   	$(\'#' . $id . '\').datetimepicker();
});
</script>';

	return $html;
}
/**
 *
 * @param $fieldName
 * @param $options
 * @param $attributes
 */
function __radio($fieldName, $options = array(), $attributes = array()) {
    $html = '';
    $strAttr = '';
    $value = null;
    $name = '';
    $id = '';
    $f = explode('.', trim($fieldName));
    if (count($f) == 1) {
        if (isset($_POST[$fieldName])) {
            $attributes['value'] = $_POST[$fieldName];
        }
        $id = $fieldName;
        $name = $fieldName;
    } else if (count($f) > 1) {
        $tmpValue = (isset($attributes['value'])) ? $attributes['value'] : null;
        $attributes['value'] = $_POST;
        foreach ($f as $k => $v) {
            if ($k == 0) {
                $name = $v;
                $id = $v;
            } else {
                $name .= '[' . $v . ']';
                $id .= ucfirst($v);
            }
        }
        foreach ($f as $k => $v) {
            if (isset($attributes['value'][$v])) {
                $attributes['value'] = $attributes['value'][$v];
            } else {
                if (empty($tmpValue)) {
                    unset($attributes['value']);
                } else {
                    $attributes['value'] = $tmpValue;
                }
                break;
            }
        }
    }
    if (isset($attributes['value'])) {
        $value = $attributes['value'];
        unset($attributes['value']);
    }
    if (!empty($attributes)) {
        foreach ($attributes as $k => $v) {
            $strAttr .= ' ' . htmlspecialchars($k) . '="' . htmlspecialchars($v) . '" ';
        }
    }

    foreach ($options as $k => $v) {
        if ($value == $k && $value != "") {
            $html .= '<label class="radio inline" style="margin-bottom:9px;">';
            $html .= '<input name="' . $name . '" id="' . $id . ucfirst($k) . '" value="' . htmlspecialchars($k) . '" type="radio" checked="checked" ' . $strAttr . '>';
            $html .= htmlspecialchars($v);
            $html .= '</label>';
        } else {
            $html .= '<label class="radio inline" style="margin-bottom:9px;">';
            $html .= '<input name="' . $name . '" id="' . $id . ucfirst($k) . '" value="' . htmlspecialchars($k) . '" type="radio" ' . $strAttr . '>';
            $html .= htmlspecialchars($v);
            $html .= '</label>';
        }
    }

    return $html;
}

/**
 *
 * @param $fieldName
 * @param $options
 */
function __checkbox($fieldName, $options = array(), $attributes = array()) {
    $html = '';
    $strAttr = '';
    $value = null;
    $name = '';
    $id = '';
    $f = explode('.', trim($fieldName));
    if (count($f) == 1) {
        if (isset($_POST[$fieldName])) {
            $attributes['value'] = $_POST[$fieldName];
        }
        $id = $fieldName;
        $name = $fieldName;
    } else if (count($f) > 1) {
        $tmpValue = (isset($attributes['value'])) ? $attributes['value'] : null;
        $attributes['value'] = $_POST;
        foreach ($f as $k => $v) {
            if ($k == 0) {
                $name = $v;
                $id = $v;
            } else {
                $name .= '[' . $v . ']';
                $id .= ucfirst($v);
            }
        }
        foreach ($f as $k => $v) {
            if (isset($attributes['value'][$v])) {
                $attributes['value'] = $attributes['value'][$v];
            } else {
                if (empty($tmpValue)) {
                    unset($attributes['value']);
                } else {
                    $attributes['value'] = $tmpValue;
                }
                break;
            }
        }
    }
    if (isset($attributes['value'])) {
        $value = $attributes['value'];
        unset($attributes['value']);
    }
    if (!empty($attributes)) {
        foreach ($attributes as $k => $v) {
            $strAttr .= ' ' . htmlspecialchars($k) . '="' . htmlspecialchars($v) . '" ';
        }
    }
    if (!is_array($value)) {
        $value = explode(',', $value);
    }
    $tmp = array();
    foreach ($value as $v) {
        if (!empty($v)) {
            $tmp[] = $v;
        }
    }
    $value = $tmp;
    foreach ($options as $k => $v) {
        if (in_array($k, $value)) {
            $html .= '<label class="checkbox inline" style="margin-bottom:9px;">';
            $html .= '<input name="' . $name . '[' . $k . ']" id="' . $id . ucfirst($k) . '" value="' . htmlspecialchars($k) . '" type="checkbox" checked="checked" ' . $strAttr . '>';
            $html .= htmlspecialchars($v);
            $html .= '</label>';
        } else {
            $html .= '<label class="checkbox inline" style="margin-bottom:9px;">';
            $html .= '<input name="' . $name . '[' . $k . ']" id="' . $id . ucfirst($k) . '" value="' . htmlspecialchars($k) . '" type="checkbox" ' . $strAttr . '>';
            $html .= htmlspecialchars($v);
            $html .= '</label>';
        }
    }

    return $html;
}

/**
 *
 * @param $fieldName
 * @param $attributes
 */
function __password($fieldName, $attributes = array()) {
    $strAttr = '';
    $name = '';
    $id = '';
    $f = explode('.', trim($fieldName));
    if (count($f) == 1) {
        if (isset($_POST[$fieldName])) {
            $attributes['value'] = $_POST[$fieldName];
        }
        $id = $fieldName;
        $name = $fieldName;
    } else if (count($f) > 1) {
        $tmpValue = (isset($attributes['value'])) ? $attributes['value'] : null;
        $attributes['value'] = $_POST;
        foreach ($f as $k => $v) {
            if ($k == 0) {
                $name = $v;
                $id = $v;
            } else {
                $name .= '[' . $v . ']';
                $id .= ucfirst($v);
            }
        }
        foreach ($f as $k => $v) {
            if (isset($attributes['value'][$v])) {
                $attributes['value'] = $attributes['value'][$v];
            } else {
                if (empty($tmpValue)) {
                    unset($attributes['value']);
                } else {
                    $attributes['value'] = $tmpValue;
                }
                break;
            }
        }
    }
    if (!empty($attributes)) {
        foreach ($attributes as $k => $v) {
            if (strtolower(trim($k)) == 'value')
                continue;
            $strAttr .= ' ' . htmlspecialchars($k) . '="' . htmlspecialchars($v) . '" ';
        }
    }
    $html = '<input type="password" name="' . $name . '" id="' . $id . '" ' . $strAttr . ' />';

    return $html;
}

/**
 *
 * @param $fieldName
 * @param $attributes
 */
function __hidden($fieldName, $attributes = array()) {
    $strAttr = '';
    $name = '';
    $id = '';
    $f = explode('.', trim($fieldName));
    if (count($f) == 1) {
        if (isset($_POST[$fieldName])) {
            $attributes['value'] = $_POST[$fieldName];
        }
        $id = $fieldName;
        $name = $fieldName;
    } else if (count($f) > 1) {
        $tmpValue = (isset($attributes['value'])) ? $attributes['value'] : null;
        $attributes['value'] = $_POST;
        foreach ($f as $k => $v) {
            if ($k == 0) {
                $name = $v;
                $id = $v;
            } else {
                $name .= '[' . $v . ']';
                $id .= ucfirst($v);
            }
        }
        foreach ($f as $k => $v) {
            if (isset($attributes['value'][$v])) {
                $attributes['value'] = $attributes['value'][$v];
            } else {
                if (empty($tmpValue)) {
                    unset($attributes['value']);
                } else {
                    $attributes['value'] = $tmpValue;
                }
                break;
            }
        }
    }
    if (!empty($attributes)) {
        foreach ($attributes as $k => $v) {
            if (is_array($v)) {
                $v = ',' . implode(",", $v) . ',';
            }
            $strAttr .= ' ' . htmlspecialchars($k) . '="' . htmlspecialchars($v) . '" ';
        }
    }
    $html = '<input type="hidden" name="' . $name . '" id="' . $id . '" ' . $strAttr . ' />';

    return $html;
}

/**
 *
 * @param $fieldName
 * @param $attributes
 */
function __file($fieldName, $attributes = array()) {
    $strAttr = '';
    $name = '';
    $id = '';
    $fname = '';
    $fid = '';
    $f = explode('.', trim($fieldName));
    if (count($f) == 1) {
        if (isset($_POST[$fieldName])) {
            $attributes['value'] = $_POST[$fieldName];
        }
        $id = $fieldName;
        $fid = 'file_' . $fieldName;
        $name = $fieldName;
        $fname = 'file_' . $fieldName;
    } else if (count($f) > 1) {
        $tmpValue = (isset($attributes['value'])) ? $attributes['value'] : null;
        $attributes['value'] = $_POST;
        foreach ($f as $k => $v) {
            if ($k == 0) {
                $name = $v;
                $id = $v;
                $fname = 'file_' . $v;
                $fid = 'file_' . $v;
            } else {
                $name .= '[' . $v . ']';
                $id .= ucfirst($v);

                $fname .= '[' . $v . ']';
                $fid .= ucfirst($v);
            }
        }
        foreach ($f as $k => $v) {
            if (isset($attributes['value'][$v])) {
                $attributes['value'] = $attributes['value'][$v];
            } else {
                if (empty($tmpValue)) {
                    unset($attributes['value']);
                } else {
                    $attributes['value'] = $tmpValue;
                }
                break;
            }
        }
    }
    if (!empty($attributes)) {
        foreach ($attributes as $k => $v) {
            $strAttr .= ' ' . htmlspecialchars($k) . '="' . htmlspecialchars($v) . '" ';
        }
    }
    $html = '
                 <input type="file" name="' . $fname . '" id="' . $fid . '" ' . $strAttr . '/>
                 <input type="hidden" name="' . $name . '" id="' . $id . '" ' . $strAttr . '/>
                     
                 <input id="f_text_' . $id . '" class="input disabled" readonly="readonly" type="text"> 
		 <input class="btn" value="Choose..." type="button" id="f_button_' . $id . '">
			
<script>
$("#f_button_' . $id . '").click(function(){
    $("#' . $fid . '").trigger("click");
});
$("#' . $fid . '").change(function(){
    $("#f_text_' . $id . '").val($(this).val());
});
</script>
                ';
    if (!empty($attributes['value']) && is_file(ROOT . '/public/media/files/' . $attributes['value'])) {
        $html .= " <div style='display:inline-block;'>
            <span><a href='" . strUrl('admin/download.php?file='.$attributes['value']). "'>" . $attributes['value'] . "</a></span>
            <input type='button' class='btn btn-mini btn-danger' value='delete' id='del_file_btn_" . $id . "' style='vertical-align: bottom;' /></div>
";
        $queryString = '';
        if (!empty($_SERVER['QUERY_STRING'])) {
            parse_str($_SERVER['QUERY_STRING'], $queryString);
        }
        $q = $queryString;
        unset($q['wp']);
        $q['xtype'] = 'delFile';
        $html .= "
<script>
    $('#del_file_btn_" . $id . "').click(function(){
        var delBtn = this;
        $.post('" . strUrl('admin/scrud/delFile.php?table='.$_GET['table'] . "&" . http_build_query($q, '', '&')). "',{src:{file:'" . $attributes['value'] . "',field:'" . $fieldName . "'}},function(){
            $(delBtn).parent().remove();
            $('#" . $id . "').val('');
        });
    });
</script>
";
    }

    return $html;
}

/**
 *
 * @param $attributes
 */
function __button($attributes = array()) {
    $strAttr = '';
    if (!empty($attributes)) {
        foreach ($attributes as $k => $v) {
            $strAttr .= ' ' . htmlspecialchars($k) . '="' . htmlspecialchars($v) . '" ';
        }
    }
    $html = '<input type="button" ' . $strAttr . ' />';

    return $html;
}

/**
 *
 * @param $attributes
 */
function __submit($attributes = array()) {
    $strAttr = '';
    if (!empty($attributes)) {
        foreach ($attributes as $k => $v) {
            $strAttr .= ' ' . htmlspecialchars($k) . '="' . htmlspecialchars($v) . '" ';
        }
    }
    $html = '<input type="submit" ' . $strAttr . ' />';

    return $html;
}

/**
 *
 * @param $attributes
 */
function __textarea($fieldName, $attributes = array()) {
    $strAttr = '';
    $name = '';
    $id = '';
    $f = explode('.', trim($fieldName));
    if (count($f) == 1) {
        if (isset($_POST[$fieldName])) {
            $attributes['value'] = $_POST[$fieldName];
        }
        $id = $fieldName;
        $name = $fieldName;
    } else if (count($f) > 1) {
        $tmpValue = (isset($attributes['value'])) ? $attributes['value'] : null;
        $attributes['value'] = $_POST;
        foreach ($f as $k => $v) {
            if ($k == 0) {
                $name = $v;
                $id = $v;
            } else {
                $name .= '[' . $v . ']';
                $id .= ucfirst($v);
            }
        }
        foreach ($f as $k => $v) {
            if (isset($attributes['value'][$v])) {
                $attributes['value'] = $attributes['value'][$v];
            } else {
                if (empty($tmpValue)) {
                    unset($attributes['value']);
                } else {
                    $attributes['value'] = $tmpValue;
                }
                break;
            }
        }
    }
    if (!empty($attributes)) {
        $value = '';
        if (!empty($attributes['value'])) {
            $value = $attributes['value'];
        }
        unset($attributes['value']);
        foreach ($attributes as $k => $v) {
            $strAttr .= ' ' . htmlspecialchars($k) . '="' . htmlspecialchars($v) . '" ';
        }
    }
    $html = '<textarea name="' . $name . '" id="' . $id . '" ' . $strAttr . ' >' . htmlspecialchars($value) . '</textarea>';

    return $html;
}

function __editor($fieldName, $attributes = array()) {
    $strAttr = '';
    $name = '';
    $id = '';
    $f = explode('.', trim($fieldName));
    if (count($f) == 1) {
        if (isset($_POST[$fieldName])) {
            $attributes['value'] = $_POST[$fieldName];
        }
        $id = $fieldName;
        $name = $fieldName;
    } else if (count($f) > 1) {
        $tmpValue = (isset($attributes['value'])) ? $attributes['value'] : null;
        $attributes['value'] = $_POST;
        foreach ($f as $k => $v) {
            if ($k == 0) {
                $name = $v;
                $id = $v;
            } else {
                $name .= '[' . $v . ']';
                $id .= ucfirst($v);
            }
        }
        foreach ($f as $k => $v) {
            if (isset($attributes['value'][$v])) {
                $attributes['value'] = $attributes['value'][$v];
            } else {
                if (empty($tmpValue)) {
                    unset($attributes['value']);
                } else {
                    $attributes['value'] = $tmpValue;
                }
                break;
            }
        }
    }
    if (!empty($attributes)) {
        $value = '';
        if (!empty($attributes['value'])) {
            $value = $attributes['value'];
        }
        unset($attributes['value']);
        foreach ($attributes as $k => $v) {
            $strAttr .= ' ' . htmlspecialchars($k) . '="' . htmlspecialchars($v) . '" ';
        }
    }
    $html = '<textarea name="' . $name . '" id="' . $id . '" ' . $strAttr . ' >' . htmlspecialchars($value) . '</textarea>
<script>
CKEDITOR.replace("' . $id . '",{width:660,height:250});	
</script>';

    return $html;
}

/**
 *
 * @param $fieldName
 * @param $options
 * @param $attributes
 */
function __select($fieldName, $options = array(), $attributes = array()) {
    $strAttr = '';
    $name = '';
    $id = '';
    $f = explode('.', trim($fieldName));
    if (count($f) == 1) {
        if (isset($_POST[$fieldName])) {
            $attributes['value'] = $_POST[$fieldName];
        }
        $id = $fieldName;
        $name = $fieldName;
    } else if (count($f) > 1) {
        $tmpValue = (isset($attributes['value'])) ? $attributes['value'] : null;
        $attributes['value'] = $_POST;
        foreach ($f as $k => $v) {
            if ($k == 0) {
                $name = $v;
                $id = $v;
            } else {
                $name .= '[' . $v . ']';
                $id .= ucfirst($v);
            }
        }
        foreach ($f as $k => $v) {
            if (isset($attributes['value'][$v])) {
                $attributes['value'] = $attributes['value'][$v];
            } else {
                if (empty($tmpValue)) {
                    unset($attributes['value']);
                } else {
                    $attributes['value'] = $tmpValue;
                }
                break;
            }
        }
    }
    $value = '';
    if (!empty($attributes)) {
        if (!empty($attributes['value'])) {
            $value = $attributes['value'];
        }
        unset($attributes['value']);
        foreach ($attributes as $k => $v) {
            $strAttr .= ' ' . htmlspecialchars($k) . '="' . htmlspecialchars($v) . '" ';
        }
    }
    $strOpt = '<option value=""></option>';
    if (array_key_exists('multiple', $attributes) && !is_array($value)){
    	$tmp = explode(',', $value);
    	$value = array();
    	foreach ($tmp as $mv){
    		if (!empty($mv)){
    			$value[] = $mv;
    		}
    	}
    }
    if (!is_array($value)){
	    foreach ($options as $k => $v) {
	        if ($value == $k && $value != "") {
	            $strOpt .= '<option value="' . htmlspecialchars($k) . '" selected="selected">' . htmlspecialchars($v) . '</option>';
	        } else {
	            $strOpt .= '<option value="' . htmlspecialchars($k) . '">' . htmlspecialchars($v) . '</option>';
	        }
	    }
    }else{
    	foreach ($options as $k => $v) {
    		if (in_array($k, $value)) {
    			$strOpt .= '<option value="' . htmlspecialchars($k) . '" selected="selected">' . htmlspecialchars($v) . '</option>';
    		} else {
    			$strOpt .= '<option value="' . htmlspecialchars($k) . '">' . htmlspecialchars($v) . '</option>';
    		}
    	}
    }
    if (array_key_exists('multiple', $attributes)){
    	$name = $name.'[]';
    }
    
    $html = '<select  name="' . $name . '" id="' . $id . '" ' . $strAttr . ' >' . $strOpt . '</select>';

    return $html;
}

function __autocomplete($fieldName, $options = array(), $attributes = array()) {
	$strAttr = '';
	$name = '';
	$id = '';
	$f = explode('.', trim($fieldName));
	if (count($f) == 1) {
		if (isset($_POST[$fieldName])) {
			$attributes['value'] = $_POST[$fieldName];
		}
		$id = $fieldName;
		$name = $fieldName;
	} else if (count($f) > 1) {
		$tmpValue = (isset($attributes['value'])) ? $attributes['value'] : null;
		$attributes['value'] = $_POST;
		foreach ($f as $k => $v) {
			if ($k == 0) {
				$name = $v;
				$id = $v;
			} else {
				$name .= '[' . $v . ']';
				$id .= ucfirst($v);
			}
		}
		foreach ($f as $k => $v) {
			if (isset($attributes['value'][$v])) {
				$attributes['value'] = $attributes['value'][$v];
			} else {
				if (empty($tmpValue)) {
					unset($attributes['value']);
				} else {
					$attributes['value'] = $tmpValue;
				}
				break;
			}
		}
	}
	$value = '';
	if (!empty($attributes)) {
		if (!empty($attributes['value'])) {
			$value = $attributes['value'];
		}
		unset($attributes['value']);
		foreach ($attributes as $k => $v) {
			$strAttr .= ' ' . htmlspecialchars($k) . '="' . htmlspecialchars($v) . '" ';
		}
	}
	$strOpt = '<option value="">&nbsp;</option>';
	foreach ($options as $k => $v) {
		if ($value == $k && $value != "") {
			$strOpt .= '<option value="' . htmlspecialchars($k) . '" selected="selected">' . htmlspecialchars($v) . '</option>';
		} else {
			$strOpt .= '<option value="' . htmlspecialchars($k) . '">' . htmlspecialchars($v) . '</option>';
		}
	}
	$html = '<select  name="' . $name . '" id="' . $id . '" ' . $strAttr . ' style="width:220px;" >' . $strOpt . '</select>
<script>			
			$(document).ready(function() { $("#' . $id . '").select2(); });
</script>
			';

	return $html;
}

function __value($fieldName, $e = array()) {
    $value = '';
    $f = explode('.', trim($fieldName));
    if (count($f) == 1) {
        if (isset($_POST[$fieldName])) {
            $value = $_POST[$fieldName];
        }
    } else if (count($f) > 1) {
        $value = $_POST;
        foreach ($f as $k => $v) {
            if (isset($value[$v])) {
                $value = $value[$v];
            } else {
                $value = '';
                break;
            }
        }
    }
    if (!empty($e) && isset($e[0])) {
        switch (trim(strtolower($e[0]))) {
            case 'image':
            	if (file_exists(__IMAGE_UPLOAD_REAL_PATH__ .  $value)) {
                	$value = "<img src='" . __IMAGE_PATH__ . $value . "'/>";
            	}else{
            		$value = '';
            	}
                break;
            case 'radio':
            case 'autocomplete':
            	if (!is_array($value)){
            		if (isset($e[1]) && (!empty($value) || $value == '0')) {
            			$value = (isset($e[1][$value])) ? $e[1][$value] : $value;
            		}
            	}else{
            		$tmp = '';
            		$sp = '';
            		foreach ($value as $sv){
            			$tmp .= $sp.((isset($e[1][$sv])) ? $e[1][$sv] : $sv);
            			$sp = ',';
            		}
            		$value = $tmp;
            	}
            	break;
            case 'select':
            	if (isset($e[2]) && array_key_exists('multiple', $e[2]) && !is_array($value)){
            		$tmp = explode(',', $value);
            		$value = array();
            		foreach ($tmp as $mv){
            			if (!empty($mv)){
            				$value[] = $mv;
            			}
            		}
            	}
            	if (!is_array($value)){
	                if (isset($e[1]) && !empty($value)) {
	                    $value = (isset($e[1][$value])) ? $e[1][$value] : $value;
	                }
            	}else{
            		$tmp = '';
            		$sp = '';
            		foreach ($value as $sv){
            			$tmp .= $sp.((isset($e[1][$sv])) ? $e[1][$sv] : $sv);
            			$sp = ',';
            		}
            		$value = $tmp;
            	}
                break;
            case 'checkbox':
                if (!empty($value) && is_array($value) && count($value) > 0) {
                    $tmp = array();
                    foreach ($value as $k1 => $v1) {
                        if (isset($e[1][$v1])) {
                            $tmp[] = $e[1][$v1];
                        }
                    }
                    $value = implode(', ', $tmp);
                } else {
                    $value = '';
                }

                break;
        }
    }

    return $value;
}

function __html($html = '') {
    return $html;
}

function arrayToCsv(array &$fields, $delimiter = ',', $enclosure = '"', $encloseAll = false, $nullToMysqlNull = false) {
    $delimiter_esc = preg_quote($delimiter, '/');
    $enclosure_esc = preg_quote($enclosure, '/');

    $output = array();
    foreach ($fields as $field) {
        if ($field === null && $nullToMysqlNull) {
            $output[] = 'NULL';
            continue;
        }

        // Enclose fields containing $delimiter, $enclosure or whitespace
        if ($encloseAll || preg_match("/(?:${delimiter_esc}|${enclosure_esc}|\s)/", $field)) {
            $output[] = $enclosure . str_replace($enclosure, $enclosure . $enclosure, $field) . $enclosure;
        } else {
            $output[] = $field;
        }
    }

    return implode($delimiter, $output);
}

function __config_2_view_element($v,$field,$da){
	global $date_format_convert;
	$elements = (isset($v['element'])) ? $v['element'] : array();
	switch ($elements[0]) {
		case 'radio':
		case 'autocomplete':
		case 'checkbox':
		case 'select':
			$e = $elements;
			$options = array();
			$params = array();
			if (isset($e[1]) && !empty($e[1])) {
				if (array_key_exists('option_table', $e[1])) {
					if (array_key_exists('option_key', $e[1]) &&
					array_key_exists('option_value', $e[1])) {
						$_dao = new GenericDao($e[1]['option_table'], $da);
						$params['fields'] = array($e[1]['option_key'], $e[1]['option_value']);
						$rs = $_dao->find($params);
						if (!empty($rs)) {
							foreach ($rs as $v) {
								$options[$v[$e[1]['option_key']]] = $v[$e[1]['option_value']];
							}
						}
					}
				} else {
					$options = $e[1];
				}
			}
			$elements[1] = $options;
			break;
	}
	echo __hidden('data.' . $field);
	switch ($elements[0]) {
		case 'checkbox':
			$aryField = explode('.', $field);
			$value = (isset($_POST['data'][$aryField[0]][$aryField[1]])) ? explode(',', $_POST['data'][$aryField[0]][$aryField[1]]) : array();
			if (!empty($value) && is_array($value) && count($value) > 0) {
				$tmp = array();
				foreach ($value as $k1 => $v1) {
					if (isset($elements[1][$v1])) {
						$tmp[] = $elements[1][$v1];
					}
				}
				$value = implode(', ', $tmp);
			} else {
				$value = '';
			}
			echo htmlspecialchars($value);
			break;
		case 'image':
		case 'editor':
			echo __value('data.' . $field, $elements);
			break;
		case 'file':
			$value = __value('data.' . $field);
			if (file_exists(ROOT . '/public/media/files/' . $value)) {
				echo '<a href="' . strUrl('admin/download.php?file='.$value). '">' . $value . '</a>';
			} else {
				echo $value;
			}
			break;
		case 'password':
			echo '******';
			break;
		case 'textarea':
			echo nl2br(htmlspecialchars(__value('data.' . $field, $elements)));
			break;
		case 'date':
			if (__DATE_FORMAT__ == 'dd/MM/yyyy'){
				$date = str_replace('/','-',__value('data.' . $field, $elements));
			}
			$date = str2mysqltime($date,'Y-m-d');
			if (is_date($date)){
				echo date($date_format_convert[__DATE_FORMAT__],strtotime($date));
			}else{
				echo '';
			}
			break;
		case 'datetime':
			if (__DATE_FORMAT__ == 'dd/MM/yyyy'){
				$date = str_replace('/','-',__value('data.' . $field, $elements));
			}
			$date = str2mysqltime($date,'Y-m-d');
			if (is_date($date)){
				echo date($date_format_convert[__DATE_FORMAT__].' H:i:s',strtotime($date));
			}else{
				echo '';
			}
			break;
		default:
			echo nl2br(htmlspecialchars(__value('data.' . $field, $elements)));
			break;
	}
}


function __config_2_form_element($v,$field,$da){
	$e = $v['element'];
	if (!empty($e) && isset($e[0])) {
		switch (strtolower(trim($e[0]))) {
			case 'image':
				$attributes = array();
				if (isset($e[1]) && !empty($e[1])) {
					$attributes = $e[1];
				}
				$attributes['style'] = 'display:none;';
				echo __image('data.' . $field, $attributes);
				break;
			case 'text':
				$attributes = array();
				if (isset($e[1]) && !empty($e[1])) {
					$attributes = $e[1];
				}
				echo __text('data.' . $field, $attributes);
				break;
			case 'date':
				$attributes = array();
				$attributes['style'] = "width:180px;";
				if (isset($e[1]) && !empty($e[1])) {
					$attributes = $e[1];
				}
				echo __date('data.' . $field, $attributes);
				break;
			case 'datetime':
				$attributes = array();
				$attributes['style'] = "width:180px;";
				if (isset($e[1]) && !empty($e[1])) {
					$attributes = $e[1];
				}
				echo __datetime('data.' . $field, $attributes);
				break;
			case 'textarea':
				$attributes = array();
				if (isset($e[1]) && !empty($e[1])) {
					$attributes = $e[1];
				}
				echo __textarea('data.' . $field, $attributes);
				break;
			case 'editor':
				$attributes = array();
				$attributes['style'] = 'width:680px; height:400px;';
				if (isset($e[1]) && !empty($e[1])) {
					$attributes = $e[1];
				}
				echo __editor('data.' . $field, $attributes);
				break;
			case 'hidden':
				$attributes = array();
				if (isset($e[1]) && !empty($e[1])) {
					$attributes = $e[1];
				}
				echo __hidden('data.' . $field, $attributes);
				break;
			case 'radio':
				$options = array();
				$params = array();
				if (isset($e[1]) && !empty($e[1])) {
					if (array_key_exists('option_table', $e[1])) {
						if (array_key_exists('option_key', $e[1]) &&
						array_key_exists('option_value', $e[1])) {
							$_dao = new GenericDao($e[1]['option_table'], $da);
							$params['fields'] = array($e[1]['option_key'], $e[1]['option_value']);
							$rs = $_dao->find($params);
							if (!empty($rs)) {
								foreach ($rs as $v) {
									$options[$v[$e[1]['option_key']]] = $v[$e[1]['option_value']];
								}
							}
						}
					} else {
						$options = $e[1];
					}
				}
				$attributes = array();
				if (isset($e[2]) && !empty($e[2])) {
					$attributes = $e[2];
				}
				echo __radio('data.' . $field, $options, $attributes);
				break;
			case 'checkbox':
				$options = array();
				$params = array();
				if (isset($e[1]) && !empty($e[1])) {
					if (array_key_exists('option_table', $e[1])) {
						if (array_key_exists('option_key', $e[1]) &&
						array_key_exists('option_value', $e[1])) {
							$_dao = new GenericDao($e[1]['option_table'], $da);
							$params['fields'] = array($e[1]['option_key'], $e[1]['option_value']);
							$rs = $_dao->find($params);
							if (!empty($rs)) {
								foreach ($rs as $v) {
									$options[$v[$e[1]['option_key']]] = $v[$e[1]['option_value']];
								}
							}
						}
					} else {
						$options = $e[1];
					}
				} else {
					$e[1] = array(1 => 'Yes');
					$options = $e[1];
				}
				$attributes = array();
				if (isset($e[2]) && !empty($e[2])) {
					$attributes = $e[2];
				}
				echo __checkbox('data.' . $field, $options, $attributes);
				break;
			case 'password':
				$attributes = array();
				if (isset($e[1]) && !empty($e[1])) {
					$attributes = $e[1];
				}
				echo __password('data.' . $field, $attributes);
				break;
			case 'file':
				$attributes = array();
				$attributes['style'] = 'display:none;';
				if (isset($e[1]) && !empty($e[1])) {
					$attributes = $e[1];
				}
				echo __file('data.' . $field, $attributes);
				break;
			case 'select':
				$options = array();
				$params = array();
				if (isset($e[1]) && !empty($e[1])) {
					if (array_key_exists('option_table', $e[1])) {
						if (array_key_exists('option_key', $e[1]) &&
						array_key_exists('option_value', $e[1])) {
							$_dao = new GenericDao($e[1]['option_table'], $da);
							$params['fields'] = array($e[1]['option_key'], $e[1]['option_value']);
							if (!empty($e[1]['option_order']) && !empty($e[1]['option_order_type'])){
								$params['order'] = $e[1]['option_order']." ".$e[1]['option_order_type'];
							}
							$rs = $_dao->find($params);
							if (!empty($rs)) {
								foreach ($rs as $v) {
									$options[$v[$e[1]['option_key']]] = $v[$e[1]['option_value']];
								}
							}
						}
					} else {
						$options = $e[1];
					}
				}
				$attributes = array();
				if (isset($e[2]) && !empty($e[2])) {
					$attributes = $e[2];
				}
				echo __select('data.' . $field, $options, $attributes);
				break;
			case 'autocomplete':
				$options = array();
				$params = array();
				if (isset($e[1]) && !empty($e[1])) {
					if (array_key_exists('option_table', $e[1])) {
						if (array_key_exists('option_key', $e[1]) &&
						array_key_exists('option_value', $e[1])) {
							$_dao = new GenericDao($e[1]['option_table'], $da);
							$params['fields'] = array($e[1]['option_key'], $e[1]['option_value']);
							if (!empty($e[1]['option_order']) && !empty($e[1]['option_order_type'])){
								$params['order'] = $e[1]['option_order']." ".$e[1]['option_order_type'];
							}
							$rs = $_dao->find($params);
							if (!empty($rs)) {
								foreach ($rs as $v) {
									$options[$v[$e[1]['option_key']]] = $v[$e[1]['option_value']];
								}
							}
						}
					} else {
						$options = $e[1];
					}
				}
				$attributes = array();
				if (isset($e[2]) && !empty($e[2])) {
					$attributes = $e[2];
				}
				echo __autocomplete('data.' . $field, $options, $attributes);
				break;
			case 'button':
				$attributes = array();
				if (isset($e[1]) && !empty($e[1])) {
					$attributes = $e[1];
				}
				echo __button($attributes);
				break;
			case 'submit':
				$attributes = array();
				if (isset($e[1]) && !empty($e[1])) {
					$attributes = $e[1];
				}
				echo __submit($attributes);
				break;
		}
	}
}

function __form_element_build_data($v,$field,$editFlag){
	if (!$editFlag && !empty($v['def_val'])){
		$aryTmpField = explode('.', $field);
		if (count($aryTmpField) == 2){
			$e = $v['element'];
			if (!empty($e) && isset($e[0])) {
				switch (strtolower(trim($e[0]))) {
					case 'date':
						if ($v['def_val'] == 1){
							$_POST['data'][$aryTmpField[0]][$aryTmpField[1]] = date('Y-m-d');
						}
						break;
					case 'datetime':
						if ($v['def_val'] == 1){
							$_POST['data'][$aryTmpField[0]][$aryTmpField[1]] = date('Y-m-d H:i:s');
						}
						break;
					case 'radio':
						if (is_array($v['def_val'])){
							foreach ($v['def_val'] as $def){
								if (!empty($def) && trim($def) != ''){
									$_POST['data'][$aryTmpField[0]][$aryTmpField[1]] = $def;
									break;
								}
							}
						}else{
							$_POST['data'][$aryTmpField[0]][$aryTmpField[1]] = $v['def_val'];
						}
						break;
					case 'select':
						if (is_array($v['def_val'])){
							foreach ($v['def_val'] as $def => $option){
								if (!empty($option) && trim($option) != ''){
									$_POST['data'][$aryTmpField[0]][$aryTmpField[1]][] = $def + 1;
								}
							}
						}
						break;
					case 'autocomplete':
						if (is_array($v['def_val'])){
							foreach ($v['def_val'] as $def => $option){
								if (!empty($option) && trim($option) != ''){
									$_POST['data'][$aryTmpField[0]][$aryTmpField[1]] = $def + 1;
								}
							}
						}
						break;
					default:
						$_POST['data'][$aryTmpField[0]][$aryTmpField[1]] = $v['def_val'];
						break;
				}
			}
		}
	}
}
