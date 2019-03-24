

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
                <li ><a href="index.php"><i class="fa fa-home fa-fw"></i>Home</a></li>
                <li><a href="listeimage.php"><i class="fa fa-list-alt fa-fw"></i>Liste Image</a></li>
                <li class="active"><a href="tableau.php"><i class="fa fa-file-o fa-fw"></i>Tableau</a></li>
           
            </ul>
        </div>
        <div class="col-md-9 well">
          <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">url</th>
                <th scope="col">Image</th>
                <th scope="col">géolocalisation</th>
              </tr>
            </thead>
              <tbody>
                <?php
              foreach($todosPedidos as $mdaKey => $mdaData)
                {
                  // echo basename($mdaData['name'], ".jpg");
                  ?>
                  <tr>
                      <th scope="row"><?php  echo $mdaData['name'];?></th>
                      <td>  <img class="pic" src="<?php echo $mdaData['name']; ?>" alt="" width="200"  height="200"/>    </td>
                      <td> <div id ="<?php echo basename($mdaData['name'], ".jpg"); ?>" style = "width:300px; height:300px"></div></td>
                    </tr>
                  </tbody>
                  <?php
                } 
                ?>
            </table>


            <script>
                  <?php
                                    $i =0;
 
                      foreach($todosPedidos as $mdaKey => $mdaData)
            {
                // echo $mdaData['name'];
                // echo $mdaData['latitude'];
                // echo $mdaData['longitude'];
                ?>
                    var mapOptions = {
                      center: [<?php echo $mdaData['longitude'];?>,<?php echo $mdaData['latitude'];?>],
                        zoom: 15
                    }
                    var map = new L.map('<?php echo basename($mdaData['name'], ".jpg"); ?>', mapOptions); // Creating a map object
                    // Creating a Layer object
                    var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
                    map.addLayer(layer);       
                      // Adding layer to the map

                    
                    var <?php echo $mdaData['image'].i; ?> = L.marker([<?php echo $mdaData['longitude'];?>,<?php echo $mdaData['latitude'];?>]);    // Creating a Marker
                    
                    // Adding popup to the marker
                    <?php echo $mdaData['image'].i; ?>.bindPopup('<div>La photo <strong> <?php echo $mdaData['name']; ?></strong> a été prise ici : </div><img class="pic" src="images/<?php echo basename($mdaData['name'], ".jpg"); ?>.jpg" alt="" width="100"  height="100"/>').openPopup();
                    <?php echo $mdaData['image'].i; ?>.addTo(map); // Adding marker to the map

                <?php
                }
                ?>
                </script>
              </div>
            </div>
          </div>


  </body>
</html>