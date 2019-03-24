<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start ();

// On récupère nos variables de session
if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>dashboard</title>
</head>
<body>
    <?php 
    echo 'Votre login est <strong>'.$_SESSION['email'].'</strong> et votre mot de passe est <strong> '.$_SESSION['password'].' </strong>. <br />';
    ?>
    

        <a href="destroy.php">Déconnexion</a>

</body>
</html>
<?php
}else {
    header ('location:index.php');
}
?>
