 <?php
 $pdo_obj= new PDO('mysql:host=192.168.0.170;dbname=gnfsubsidios_test', 'web_usr_gnfsub', 'web2014usrgnfsub');
 $pdo_obj_2= new PDO('mysql:host=192.168.0.170;dbname=gnfsubsidios_test', 'web_usr_gnfsub', 'web2014usrgnfsub');
 $pdo_obj->exec("set names utf8");
 $pdo_obj_2->exec("set names utf8");
 ?>