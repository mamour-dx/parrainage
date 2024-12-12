<?php
const MYSQL_HOST = 'localhost';
const MYSQL_PORT = 3306;
const MYSQL_NAME = 'parainage';
const MYSQL_USER = 'root';
const MYSQL_PASSWORD = '';


try {
    $mysqlClient = new PDO(
        sprintf('mysql:host=%s;dbname=%s;port=%s;charset=utf8', MYSQL_HOST, MYSQL_NAME, MYSQL_PORT),
        MYSQL_USER,
        MYSQL_PASSWORD
    );
    $mysqlClient->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Récupération des données du formulaire
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $option = $_POST['option']; 
        $numeroTelephone = $_POST['phone'];
        $annee = $_POST['year'];

        // Gestion de la photo (conversion en données binaires)
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            $photo = file_get_contents($_FILES['photo']['tmp_name']);
        } else {
            throw new Exception('Erreur lors du téléchargement de la photo.');
        }

        //Exécution de la requête SQL
        $query = $mysqlClient->prepare(
            'INSERT INTO users (nom, option, numero_telephone, annee, photo) 
             VALUES (:name, :options, :phone, :year, :photo)'
        );

        $query->execute([
            ':name' => $name,
            ':options' => $option,
            ':phone' => $numeroTelephone,
            ':year' => $annee,
            ':photo' => $photo,
        ]);}

        
} catch (Exception $exception) {
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
    <a href="index.html" class="btn">Back to Home</a>
</body>
</html>

