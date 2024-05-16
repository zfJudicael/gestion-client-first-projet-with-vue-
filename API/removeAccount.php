<?php
require "connectDb.php";

$request = json_decode(file_get_contents("php://input"));

$res['error']   = true;

if($request != null){
    
    $numCompte = $request->numCompte;

    $sql = "DELETE FROM Compte WHERE numCompte = '".$numCompte."'";

    if ($conn->query($sql) === TRUE) {
        $res['error']   = false;
        $res['message'] = "Suppression bien effectué";
    } else {
        $res['message'] = "Suppression non effectué";
        $res['errorMessage'] = "Error: " . $sql . "\n" . $conn->error;
    }

    $conn->close();
}else{
    $res['message'] = "Une erreur de requet";
}

print(json_encode($res));
?>