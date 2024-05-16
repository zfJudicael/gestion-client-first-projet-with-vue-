<?php
    require "connectDb.php";

	$request = json_decode(file_get_contents("php://input"));

    $res['error'] = true;

    if($request != null){
        
        $nom = $request->nom;
		$prenoms = $request->prenoms;
        $solde = $request->solde;

		$sql = "INSERT INTO Compte (nom, prenoms, solde) VALUES ('".$nom."', '".$prenoms."', '".$solde."')";

		if ($conn->query($sql) === TRUE) {
            $res['error']   = false;
            $res['message'] = "Ajout bien effectué";
		} else {
            $res['message'] = "Ajout non effectué";
            $res['errorMessage'] = "Error: " . $sql . "\n" . $conn->error;
		}

        $conn->close();
    }else{
        $res['message'] = "Une erreur est survenue";
    }
    
    print(json_encode($res));
?>