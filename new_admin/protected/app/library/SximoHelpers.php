<?php 


class SximoHelpers {


  public static function get_zip_content($name , $zip ) {  
      
    $contents = '';  
      
    if( file_exists( $zip )){  
      
      $fp = fopen('zip://' . $zip . '#'. $name , 'r');  
      if (!$fp) {  
          SiteHelpers::alert("error","cannot open zip file: {$zip}n");  
      }  
      while (!feof($fp)) {  
          $contents .= fread($fp, 2);  
      } 
      
    } else {  
      SiteHelpers::alert("error","cannot find zip file: {$zip}n");  
    }  
        
    fclose($fp); 
    return $contents;  
      
  }    

  public static function cf_unpackage($zip_path) { 
     
    $ain = unserialize( base64_decode( self::get_zip_content ( '.ain' , $zip_path )));  
     
    $tmp_name  = md5( date('YmdHis') ); 
     
    $zip = new ZipArchive; 
    $zipres = $zip->open( $zip_path ); 
    if( $zipres === TRUE){ 
       
      $app_path = app_path(); //dirname( base_path()) .'/uploads/zip/'. $tmp_name; 
      
      if( ! is_dir( $app_path )){
        mkdir( $app_path ); 
      }
      $zip->extractTo( $app_path ); 
      $zip->close(); 
       
      $sql_str = file_get_contents( $app_path .'/.mysql'); 
      
      preg_match_all( '/((.*)([\s\)]+;))/Usi',$sql_str, $sql_split );

      foreach ( $sql_split[0] as $k => $sql ){
        $res = DB::statement( $sql );
      }
      
      $setting_str = file_get_contents( $app_path .'/.setting'); 
      $_setting = unserialize( base64_decode( $setting_str )); 
       
      self::store_setting( $_setting['tb_module'], 'tb_module','module_name','module_id'); 
       
      $_tmpfile = array( '.ain','.mysql','.setting'); 
      foreach ( $_tmpfile as $_file ){ 
        unlink( $app_path.'/'. $_file ); 
      } 

      $data['status'] = '1'; 
      $data['error'] = 0; 
       
    } else { 
       
      $data['status'] = 0; 
      $data['error'] = "unzip error"; 
       
    }

    return $data;
  } 
  
  public static function store_setting( $rows , $table_name , $where_field , $pk_field ) {
    if( !is_array( $rows )){
      $rows = array( $rows );
    }
    foreach ( $rows as $k => $row ){
      $r = DB::select(" select * from {$table_name} where {$where_field}= '{$row->$where_field}' ");
      if( count( $r )){
        // update
        unset( $row->{$pk_field} );
        DB::table( $table_name )
          ->where( $where_field , $row->$where_field )
          ->update( (array) $row );
        
      } else {
        // insert
        $_id = DB::table( $table_name )
          ->insertGetId( (array) $row );
      }
      
      //trace($this->db->last_query(),'lq');
    }
    
  }

  public static function write_route(){
  
    $rows = DB::select("select module_name from tb_module where module_type = 'addon' ");

    $str = "<?php\n";
    foreach ( $rows as $k => $row ){
      $str .= "Route::controller('{$row->module_name}', '".studly_case($row->module_name )."Controller');\n";
    }
    $str .= "?>";
    
    file_put_contents( app_path().'/moduleroutes.php', $str );

  }
  

}

?>