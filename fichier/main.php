<?php
    require 'include/autoload.inc.php'; // J'inclus la classe.
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> 
</head>
<body>
    <?php
    

    $dbDossier = new Dossier();
    $dbFichier = new Fichier();
    $dossier = $_POST['dossier'];
    $fichier = $_POST['fichier'];
    $contents = $_POST["text"];

    if(isset($_POST['fichierdossier'])){
        $dbDossier->EcrireDossier($dossier);
    }
    if(isset($_POST['validesuppdossier'])){
        $dbDossier->SuppDossier($dossier);
    
    }


    if(isset($_POST['fichiervalide'])){
        $dbFichier->EcrireFichier($fichier);
    }

    if(isset($_POST['validesuppfichier'])){
        $dbFichier->SuppFichier($fichier);
    
    }
    if(isset($_POST['modifier'])){

        $dbFichier->EcrireSurFichier($fichier, $contents);
    
    }
//        $ecrire->SuppDossier("issac");
        // $importer = new Database("utilisateur.json");
     
        // $importer = 
        // var_dump($importer);
//        $dbDossier->LireFichier("test/text.txt");



        

       
    ?>
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="col-md-6">
                        <h2>formulaire  création dossier</h2>
                        <form action="main.php" method="post">
                            <div class="form-group">
                                    <label>le nom  du dossier:</label>
                                    <input type="text" class="form-control" name="dossier" />
                                    <input type="submit" value="Créer le dossier" name="fichierdossier">
                            </div>
                        </form>         
                    
                    </div>
                    <div class="col-md-6">
                        <h2>formulaire création fichier</h2>
                        <form action="main.php" method="post">
                            <div class="form-group">
                                <label>le nom  du fichier:</label>
                                <input type="text" class="form-control" name="fichier" />
                                <input type="submit" value="Créer un fichier" name="fichiervalide">
                                </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-12">
                    <h2>liste de dossier et fichier créer</h2>
                    <div class="form-group">
                        <?php
                        $dbDossier->ScanDossier("./test");
                        ?>
                    </div>
                </div>
            

     

                <div class="col-md-6">
                    <h2>formulaire de lecture d'un fichier</h2>

                    <form action="main.php" method="post">
                        <div class="form-group">
                            <label>le nom  du fichier:</label>
                            <input type="text" lass="form-control" name="fichier" />
                            <input type="submit" value="rechercher" name="lecturefic">
                        </div>
                    </form>
                </div>

                <div class="col-md-6">

                    <h2>lecture du fichier</h2>
                    
                    

                    <?php

                    if(isset($_POST['lecturefic'])){
                        $dbFichier->LireFichier($fichier);
        
                    }
                    
                    ?>

                </div>
                <div class="col-md-12">
                    <div class="col-md-6">
                        <h2>supprimer un dossier créer</h2>
                        <form action="main.php" method="post">
                            <div class="form-group">
                            <label>le nom  du dossier a supprimer:</label>
                            <input type="text" class="form-control" name="dossier" />
                            <input type="submit" value="Supprimer" name="validesuppdossier">
                            </div>
                        </form>
                    </div>

                    <div class="col-md-6">
                        <h2>supprime fichier</h2>

                        <form action="main.php" method="post">
                            <div class="form-group">
                                <label>le nom  du fichier:</label>
                                <input type="text" lass="form-control" name="fichier" />
                                <input type="submit" value="supprimer" name="validesuppfichier">
                            </div>
                        </form>
                    </div>   
                </div>
            </div>
        
        
        
        </div>
</body>
</html>