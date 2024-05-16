<?php
    require "connectDb.php";
    $request = json_decode(file_get_contents("php://input"));

    $res['error'] = true;

    if($request != null){
        
        $numCompte = $request->numCompte;
        $nom = $request->nom;
		$prenoms = $request->prenoms;
        $solde = $request->solde;

		$sql = "UPDATE Compte SET nom = '".$nom."', prenoms = '".$prenoms."', solde = '".$solde."'  WHERE numCompte = ".$numCompte." ";

		if ($conn->query($sql) === TRUE) {
            $res['error']   = false;
            $res['message'] = "Modification bien effectuée";
		} else {
            $res['message'] = "MOdification non effectuée";
            $res['errorMessage'] = "Error: " . $sql . "\n" . $conn->error;
		}

        $conn->close();
    }else{
        $res['message'] = "Une erreur est survenue";
    }
    
    print(json_encode($res));
?>