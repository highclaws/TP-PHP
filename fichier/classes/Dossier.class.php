<?php
class Dossier {
    // public $id;
    // public $nomfichier;
    // public $nom;
    // public $prenom;
    public $dossier;
    
    function __construct()
    {
       // $this->nomfichier = file_get_contents($n, "r");
    }

    function EcrireDossier($doss)
    {

        if(is_dir($doss)){
           echo "Le dossier existe";
        } else{
           echo "Le dossier a ete créer";
           mkdir("test/{$doss}",775);

        }
         
    
    }

    function SuppDossier($doss)
    {
         rmdir("test/{$doss}");

        if(is_dir($doss)){
           echo "Le dossier existe";
        } else{
           echo "Le dossier n'existe pas";
        }
         
    
    }

    function ScanDossier($doss)
    {

        if(is_dir($doss)){
            //echo "Le dossier existe";
            $files1 = scandir($doss);
            foreach ($files1 as $key => $value) {
                # code...
                echo "<li><a href='dossier.php?dossier=$value'>$value </a></li>";

            }

         } else{
            echo "Le dossier n'existe pas";
         }
    }


  
    
    function lecturedossier($dirName, $rights=0777){
        echo "marche";

        echo $dirName;
        if ($handle = opendir('./test/')) {
            while (false !== ($file = readdir($handle)))
            {
                if ($file != "." && $file != ".." && strtolower(substr($file, strrpos($file, '.') + 1)) == 'xml')
                {
                    $thelist .= '<li><a href="'.$file.'">'.$file.'</a></li>';
                }
            }
            closedir($handle);
        }
  
            // $dirs = explode('/test', $dirName);
            // $dir='';
            // foreach ($dirs as $part) {
            //     $dir.=$part.'/';
            //     if (!is_dir($dir) && strlen($dir)>0)
            //         mkdir($dir, $rights);
            // }
        }
}
?>