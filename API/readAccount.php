<?php
	require "connectDb.php";

	$result = $conn->query("SELECT * FROM Compte ORDER BY numCompte DESC");
	$comptes  = array();
	while ($row = $result->fetch_assoc()) {
		array_push($comptes, $row);                
	}
	$res['comptes']= $comptes;

    print(json_encode($res));
?>
   