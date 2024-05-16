<?php 
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET, PUT, DELETE, OPTIONS, post, get');
	header("Access-Control-Max-Age", "3600");
	header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token, Cookie,Accept');
	header("Access-Control-Allow-Credentials", "true");
	header('Content-Type: application/json');
	// $con = mysql_connect ("localhost", "root", "") or die(" Pb Connect") ; 
	// mysql_select_db ("colis_express", $con) or die("PROBLEME BASE") ; 
	// $q=mysql_query("SELECT * FROM colis");
	// while($row=mysql_fetch_assoc($q))
 	// $json_output[]=$row; 
	// print(json_encode($json_output));

	echo "Hello world";
	// mysql_close(); 
?>
	// header('Access-Control-Allow-Origin:*');
	// header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
	// header('Access-Control-Allow-Headers: XRequested-With, Origin, ContentType, Cookie, Accept');

	// // Content Type JSON
	// header("Content-type: application/json");

	// // Database connection
	// $conn = new mysqli("localhost", "root", "", "colis_express");
	// if ($conn->connect_error) {
	// 	die("Database connection failed!");
	// }
	// $res = array('error' => false);
	// $res['message'] = "User update failed!";

	// // Read data from database
	// $action = 'read';

	// if (isset($_GET['action'])) {
	// 	$action = $_GET['action'];
	// }

	// if ($action == 'read') {
	// 	$result = $conn->query("SELECT * FROM colis");
	// 	$colis  = array();

	// 	while ($row = $result->fetch_assoc()) {
	// 		array_push($colis, $row);
	// 	}
	// 	$res['colis'] = $users;
	// }

	// // Close database connection
	// $conn->close();

	// // print json encoded data
	// print(json_encode($res));

	// die();

    // header('Access-Control-Allow-Origin:*');

    // // Content Type JSON
	// header("Content-type: application/json");

	// // Database connection
	// $conn = new mysqli("localhost", "root", "", "colis_express");
	// if ($conn->connect_error) {
	// 	die("Database connection failed!");
	// }
	// $res = array('error' => false);


	// // Read data from database
	// $result = $conn->query("SELECT * FROM colis");
	// $colis  = array();

	// while ($row = $result->fetch_assoc()) {
	// 	array_push($colis, $row);
	// }
    // $res['colis'] = $colis;
	// echo $colis;


// 	$servername = "localhost";
//     $username = "root";
//     $password = "";
		
//     try {
//     $conn = new PDO("mysql:host=$servername;dbname=colis_express", $username, $password);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     } catch(PDOException $e) {
//         echo "Connection failed: " . $e->getMessage();
//   	}

// 	  echo'<table>';
// 	  echo'<tr><th style="color:white">Idcolis</th><th style="color:white">Designation</th><th>poids</th><th>recu</th></tr>';
// 	  class voitureTableRows extends RecursiveIteratorIterator {
// 		function __construct($it) {
// 			parent::__construct($it, self::LEAVES_ONLY);
// 		}
		
// 		function current() {
// 			return "<td>" . parent::current(). "</td>";
// 		}
		
// 		function beginChildren() {
// 			echo "<tr>";
// 		}
		
// 		function endChildren() {
// 			echo "<td class=\"modifierVoit\"><button class=\"btnModifVoit mod\">Modifier</button></td>
// 				  <td class=\"supprimerVoit\"><button class=\"btnSupVoit sup\">Supprimer</button></td>
// 				  </tr>" . "\n";
// 		}
// 	}

// 	$stmt = $conn->prepare("SELECT * FROM colis");
// 	$stmt->execute();
	
// 	// set the resulting array to associative
// 	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
// 	foreach(new voitureTableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
// 		echo $v;
// 	}
// 	$conn = null;

// echo'</table>';

// header('Access-Control-Allow-Origin:*');
// header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
// header('Access-Control-Allow-Headers: XRequested-With,Origin,ContentType,Cookie,Accept');
// header('Content-Type: application/json');
// $con = mysql_connect ("localhost", "root", "") or die(" Pb Connect") ; 
// mysql_select_db ("colis_express", $con) or die("PROBLEME BASE") ; 
//  $q=mysql_query("SELECT * FROM colis");

// while($row=mysql_fetch_assoc($q)) $json_output[]=$row; 

// print(json_decode($json_output));
// mysql_close();

<!-- ?> -->