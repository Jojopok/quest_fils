<?php
if($_SERVER['REQUEST_METHOD'] === "POST"){ 
    // Securité en php
    // chemin vers un dossier sur le serveur qui va recevoir les fichiers uploadés (attention ce dossier doit être accessible en écriture)
    $uploadDir = 'public/uploads/';
    // le nom de fichier sur le serveur est ici généré à partir du nom de fichier sur le poste du client (mais d'autre stratégies de nommage sont possibles)
    $uploadFile = $uploadDir . basename($_FILES['avatar']['name']);
    // Je récupère l'extension du fichier
    $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    // Les extensions autorisées
    $authorizedExtensions = ['jpg','jpeg','png'];
    // Fichier unique : 
    $originalFileName = $_FILES['avatar']['name'];
    $timestamp = time(); // Timestamp actuel
    $extension = pathinfo($originalFileName, PATHINFO_EXTENSION);
    $uniqueFileName = $timestamp . "_" . $originalFileName;
    $uploadFile = $uploadDir . $uniqueFileName;

    // Le poids max géré par PHP par défaut est de 2M
    $maxFileSize = 2000000;
    $errors = array();
    
    // Je sécurise et effectue mes tests

    /****** Si l'extension est autorisée *************/
    if( (!in_array($extension, $authorizedExtensions))){
        $errors[] = 'Veuillez sélectionner une image de type Jpg ou Jpeg ou Png !';
    }

    /****** On vérifie si l'image existe et si le poids est autorisé en octets *************/
    if( file_exists($_FILES['avatar']['tmp_name']) && filesize($_FILES['avatar']['tmp_name']) > $maxFileSize)
    {
    $errors[] = "Votre fichier doit faire moins de 2M !";
    }

    // Je vérifie que le formulaire est soumis, comme pour tout traitement de formulaire.
    if($_SERVER["REQUEST_METHOD"] === "POST" ){ 
        // chemin vers un dossier sur le serveur qui va recevoir les fichiers transférés (attention ce dossier doit être accessible en écriture)
        $uploadDir = 'public/uploads/';
        
        // le nom de fichier sur le serveur est celui du nom d'origine du fichier sur le poste du client (mais d'autres stratégies de nommage sont possibles)
        $uploadFile = $uploadDir . basename($_FILES['avatar']['name']);
    
        // on déplace le fichier temporaire vers le nouvel emplacement sur le serveur. Ça y est, le fichier est uploadé
        move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user_name = $_POST['user_name'];
        $prenom = $_POST['prenom'];
        $age = $_POST['age'];
        $image = $_FILES['avatar'];
        $imageName = $image['name'];
   

        if (
            empty($user_name) || empty($prenom) || empty($imageName) || empty($age) ||
            !isset($user_name) || !isset($prenom) || !isset($imageName) || !isset($age)
        ) {
            $message = "Il manque des information !";
        }  else {
            $message = "Merci $prenom $user_name, vous avez $age et voici votre image :";
            $message .= "<img src='public/uploads/$imageName' alt='Image de l'utilisateur'>";
            }
        }
    } else {
        $message = "Il manque des information !";
    }

    echo $message;
?>
