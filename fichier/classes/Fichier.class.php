<?php
class Fichier {

// public $nomfichier;
// public $nom;
// public $prenom;
public $fichier;

function __construct()
{
  //  $this->nomfichier = file_get_contents($n, "r");

}
function EcrireFichier($doss)
{
    // $tableau_pour_json = ['prenom'=>'Alexandre', 'nom'=>'Chevalier'];
    // $json = json_encode($this->nomfichier,true);
    // Créer un tableau de données

    // Convertir le tableau au format json
    // var_dump($nomfichier);

    if(is_file($doss)){
        echo "Le fichier existe";
          //Some simple example content.
          $txt = "$doss\n";
          //Save our content to the file.
          file_put_contents($doss, $txt);

     } else{
        echo "Le fichier n'existe pas";
        $nomfichier = fopen("test/{$doss}", 'w'	) or die("Unable to open file!");
        $txt = "$doss\n";
        fwrite($nomfichier, $txt);
        fclose($nomfichier);


     }
}
function LireFichier($doss)
{
    
    $filename = "test/$doss";
    $handle = fopen($filename, 'r'); // r = read mode, w = write mode, a = append mode
    $contents = fread($handle, filesize($filename));
    echo "<form action='main.php' method='post'>
    <input type='text' value='$doss' name='fichier'>
    <textarea name='text' class='form-control' id='exampleFormControlTextarea1' rows='3'>$contents</textarea>
    <input type='submit' value='Modifier' name='modifier'>
    </form>

    ";
    fclose($handle);
   // $json = json_decode($this->nomfichier,true);

}
function EcrireSurFichier($doss, $contents)
{

    $filename = "test/$doss";
    // check if file exist and is writable
if (is_writable($filename)) {
 
    // opening file in append 'a' mode
    if (!$handle = fopen($filename, 'a')) {
        echo "Cannot open file '$filename'";
        exit;
    }
 
    // Write $somecontent to the opened file
    if (fwrite($handle, $contents) === FALSE) {
        echo "Cannot write to file '$filename'";
        exit;
    }

    echo "Success, wrote '$contents' to file '$filename'";
    fclose($handle);
 
} else {
    echo "The file '$filename' is not writable";
}
   // $json = json_decode($this->nomfichier,true);

}

function SuppFichier($doss)
{
    $path = "test/$doss";
    unlink($path) or die("Couldn't delete file");

    if(is_dir($doss)){
       echo "Le fichier existe";
    } else{
       echo "Le fichier n'existe pas";
    }
     
}
    
}
?>