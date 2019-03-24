
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
                <li><a href="listeimage.php"><i class="fa fa-list-alt fa-fw"></i>Liste Image</a></li>
                <li><a href="tableau.php"><i class="fa fa-file-o fa-fw"></i>Tableau</a></li>
                <li class="active"><a href="listeimage.php"><i class="fa fa-list-alt fa-fw"></i> Image</a></li>

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
  
                  <tr>
                      <?php
                    
                      ?>
                      <th scope="row">images/<?php echo  $_GET['nom'];?>.jpg</th>
                      <td>  <img class="pic" src="images/<?php echo $_GET['nom']; ?>.jpg" alt="" width="200"  height="200"/>    </td>
                      <td> <div id ="<?php echo basename($_GET['nom']); ?>" style = "width:300px; height:300px"></div></td>
                    </tr>
                  </tbody>
            
            </table>


            <script>
  
                    var mapOptions = {
                      center: [<?php echo $_GET['longitude'];?>,<?php echo $_GET['latitude'];?>],
                        zoom: 15
                    }
                    var map = new L.map('<?php echo $_GET['nom']; ?>', mapOptions); // Creating a map object
                    // Creating a Layer object
                    var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
                    map.addLayer(layer);       
                      // Adding layer to the map

                    
                    var marker = L.marker([<?php echo $_GET['longitude'];?>,<?php echo $_GET['latitude'];?>]);    // Creating a Marker
                    
                    // Adding popup to the marker
                    marker.bindPopup('<div>La photo <strong> <?php echo $_GET['nom']; ?></strong> a été prise ici : </div><img class="pic" src="images/<?php echo $_GET['nom']; ?>.jpg" alt="" width="100"  height="100"/>').openPopup();
                    marker.addTo(map); // Adding marker to the map

                </script>
              </div>
            </div>
          </div>


  </body>
</html>