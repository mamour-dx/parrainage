<?php
require_once(__DIR__ . '/config/Mysql.php');



try{
    // Récupération des données du formulaire
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $option = $_POST['options']; 
        $numeroTelephone = $_POST['phone'];
        $annee = $_POST['year'];
        //Gestion du numéro de téléphone
        if (!preg_match('/^(77|70|76|75|78)[0-9]{7}$/', $numeroTelephone)) {
            throw new Exception("Le numéro de téléphone n'est pas valide.");
        }
        $requete=$mysqlClient->prepare('SELECT COUNT(*) FROM users WHERE numero_telephone =?');
        $requete->execute(array ($numeroTelephone));
        $nombreUtilisateurs = $requete->fetchColumn();
        if ($nombreUtilisateurs>0){
            die("Ce numéro est déja enregistré");
        }
        else{
            // Gestion de la photo
        $uploadDir = 'images/'; 
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            $fileExtension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

            if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
                throw new Exception('Extension de fichier non autorisée. Seules les extensions JPG, PNG et GIF sont acceptées.');
            }

            $newFileName = $numeroTelephone . '.jpg';

            
            $destination = $uploadDir . $newFileName;

            if (move_uploaded_file($_FILES['photo']['tmp_name'], $destination)) {
                $query = $mysqlClient->prepare(
                    'INSERT INTO users (nom, options, numero_telephone, annee, photo) 
                     VALUES (:name, :options, :phone, :year, :photo)'
                );

                $query->execute([
                    ':name' => $name,
                    ':options' => $option,
                    ':phone' => $numeroTelephone,
                    ':year' => $annee,
                    ':photo' => $newFileName, // Enregistrer uniquement le nom de la photo dans la base
                ]);
            } else {
                throw new Exception('Erreur lors de l\'enregistrement de la photo.');
            }
        } else {
            throw new Exception('Erreur lors du téléchargement de la photo.');
        }
        }
        
    }
}
catch(Exception $exception){
    die('Erreur : ' . $exception->getMessage());

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Merci!</h1>
    <img src="images/ucad.jpeg" alt="Photo">
    <p>Vos informations ont été correctement enregistrées!</p>
    <a href="index.php" class="btn">Back to Home</a>
</body>
</html>

