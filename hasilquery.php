<?php
 //https://dev.mysql.com/doc/refman/5.5/en/fulltext-boolean.html
 //ALTER TABLE dokumen
//ADD FULLTEXT INDEX `FullText` 
//(`token` ASC, 
 //`tokenstem` ASC);
 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbstbi";
$katakunci="";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$hasil=$_POST['katakunci'];
//$sql = "SELECT distinct nama_file,token,tokenstem FROM `dokumen` where token like '%$hasil%'";
$sql = "SELECT distinct nama_file,token,tokenstem,tokenstem2 FROM `dokumen` WHERE MATCH (token) AGAINST ('$hasil' IN BOOLEAN MODE)";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br>" ."Nama file: " . $row["nama_file"]. " - Token: " . $row["token"]. " " . $row["tokenstem"]. " " .$row["tokenstem2"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
///
?>