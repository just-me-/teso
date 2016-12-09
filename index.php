<?php
session_start();

$version = "1.0.1";
$map = $_GET["map"] ? $_GET["map"] : 'auridon';

$datas = json_decode(file_get_contents("data/".$map.".json"), true);
// file_put_contents("data/".$map.".json",json_encode($datas));
?>

<!doctype html>
<html lang="de">
	
	
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">
    
    <title>TESO Skyshards</title>
    
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- end fonts -->
	
    <link href="css/teso.css?version=%22<?php echo $version; ?>%22" rel="stylesheet">
  </head>
  
  <body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	
	<noscript>
      <div class="test-js warning">
        Bitte aktivieren Sie <b>JavaScript</b> für <b>TESO Skyshards</b>, um alle Funktionen dieser Seite vorgesehen nutzen zu können. 
      </div>
    </noscript>
	
	<canvas id="smoke">
	</canvas>
		
	<div class="main">
		
		<div class="bg"></div>
		<div class="container">
			
			<div id="menu" style="display: none;">
				<div class="aldmeri">
					<img class="icon" src="img/aldmeri.png">
					<a href="./?map=khenarthis_rast">Khenarthis Rast</a>
					<a href="./?map=auridon">Auridon</a>
					<a href="./?map=gruenschatten">Gruenschatten</a>
					<a href="./?map=cyrodiil_a">Cyrodiil Auridon</a>
				</div>
			</div>
		
			<div id="nav-icon">
				<span></span>
				<span></span>
				<span></span>
			</div>
			
			<div id="map-holder">
				<img class="mapa-slika" src="img/maps/<?php echo $map; ?>.jpg">
				
				<?php
				foreach ($datas as $row) {
					if($row['x'] && $row['y']) {
						$shard_id = $map . '_' . $row['index'];
						$collected = $_SESSION[$shard_id] == 1 ? "collected" : ""; 
						
						echo '	<div id="' . $shard_id . '" class="marker-on-map ' . $collected . '" style="top: '.$row['x'].'%; left: '.$row['y'].'%;">
									<div class="pulse_rays"></div>
								</div>
							'
						;
					}
				}
				?>
				 
			</div>
		
		
		</div>
	</div>
	

    <script src="js/teso.js?version=%22<?php echo $version; ?>%22"></script>
	
  </body>
</html>