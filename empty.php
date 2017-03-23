<?php
$host = 'localhost';
  $user = 'root';      
  $password = '';      
  $database = 'dbstbi';  
    
  $konek_db = mysql_connect($host, $user, $password);    
  $find_db = mysql_select_db($database) ;

$query = "DELETE FROM `dokumen` WHERE 1";
 
$hasil = mysql_query ($query);
 
echo "Data telah dihapus.";
?>
<br>
<a> Kembali ke tabel ? </a> <a href="hasil_tokenisasi.php"> YA </a>