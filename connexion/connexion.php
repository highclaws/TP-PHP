<?php
//$login_valide = "admin@admin.fr";
//$pwd_valide = "password";

$nomfichier = "http://lamp-pedago.iut-bobigny.univ-paris13.fr/html/a3dwm2/mohand.cherikh/utilisateur.txt";
$alldata = array();
$index = 0;
$fp = fopen($nomfichier, "r");
if ($fp) {

	while (!feof($fp)) {
		// $buffer = fgets($fp, 4096);
		// //echo $buffer;
		// var_dump($buffer);

		//$buffer = fgets($fp, 4096);
		
		$alldata[$index]['name'] = fgets($fp, 4096);
		$alldata[$index]['password'] = fgets($fp,4096);

		fgets($fp); // throw away delimiter line
		$index++;
	}
	fclose($fp);

	} else {
		echo "non read";
	}

	var_dump($alldata);



 if (isset($_POST['email']) && isset($_POST['password'])) {

        foreach ($alldata as $row ) {
            
                $login_valide = trim($row['name']);
                $pwd_valide =    trim($row['password']);
            
           if($login_valide == $_POST['email'] && $pwd_valide == $_POST['password'] ){
               	session_start ();
				$_SESSION['email'] = $_POST['email'];
				$_SESSION['password'] = $_POST['password'];
				echo "oki";
               	header ('location:dashboard.php');

            } else {
				echo '<body onLoad="alert(\'Membre non reconnu...\')">';
				//echo '<meta http-equiv="refresh" content="0;URL=index.php">';
			}
     
     
     }
     

}
else {
	echo 'Les variables du formulaire ne sont pas bien déclarées.';
}
?>
