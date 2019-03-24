<?php
require 'database.php';
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Photo api</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> 
    <link rel = "stylesheet" href = "./leaflet/leaflet.css"/>
    <script src = "./leaflet/leaflet.js"></script>
  </head>
   
   <body>
   <style>
.pic
{
    transform: rotate(90deg);
   
    object-fit: contain;
 
}
</style>
   <div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked">
                <li><a href="index.php"><i class="fa fa-home fa-fw"></i>Home</a></li>
                <li class="active"><a href="listeimage.php"><i class="fa fa-list-alt fa-fw"></i>Liste Image</a></li>
                <li><a href="tableau.php"><i class="fa fa-file-o fa-fw"></i>Tableau</a></li>
           
            </ul>
        </div>
        <div class="col-md-9 well">
          <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">url</th>
        
              </tr>
            </thead>
              <tbody>
                <?php
              foreach($todosPedidos as $mdaKey => $mdaData)
                {
                  ?>
                  <tr>
                      <th scope="row"><a href="image.php?nom=<?php  echo basename($mdaData['name'], ".jpg");?>&amp;longitude=<?php echo $mdaData['longitude'];?>&amp;latitude=<?php echo $mdaData['latitude'];?>"><?php  echo $mdaData['name'];?></a></th>
                    </tr>
                  </tbody>
                  <?php
                } 
                ?>
            </table>



              </div>
            </div>
          </div>


</body>
</html>