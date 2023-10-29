<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form method="post" enctype="multipart/form-data" action="result.php">
    <label for="imageUpload">Upload an profile image</label>    
    <input type="file" name="avatar" id="imageUpload" />
    <label  for="nom">Nom :</label>
    <input  type="text"  id="nom"  name="user_name">
    <label  for="prenom">prenom :</label>
    <input  type="text"  id="prenom"  name="prenom">
    <label  for="age">âge :</label>
    <input  type="number"  id="age"  name="age">
    <button name="send">Send</button>
</form>
</body>
</html>