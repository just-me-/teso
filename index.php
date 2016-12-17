<?php
session_start();

$version = "1.0.2";
$map = $_GET["map"] ? $_GET["map"] : 'auridon';

// menu data
$menu_dolch = [
		"betnihk" 			=> "Betnikh",
		"strosmkai"			=> "Stros M'Kai",
		"alikrdesert" 	=> "Alikr-Wüste",
		"bangkorai" 		=> "Bangkorai",
		"glenumbra"			=> "Glenumbra",
		"rivenspire" 		=> "Kluftspitze",
		"stormhaven" 		=> "Sturmhafen",
    "cyrodiil_d" 		=> "Cyrodiil Dolch"
];

$menu_aldmeri = [
    "khenarthis_rast" 	=> "Khenarthis Rast",
    "auridon" 					=> "Auridon",
    "grahtwald" 				=> "Grahtwald",
    "gruenschatten" 		=> "Grünschatten",
    "malabaltor"				=> "Malabal Tor",
    "schnittermark" 		=> "Schnittermark",
    "cyrodiil_a" 				=> "Cyrodiil Alderi"
];

$menu_ebenherz = [
		"balfoyen" 			=> "Bal Foyen",
		"bleakrock" 		=> "Ödfels",
		"deshaan" 			=> "Deshaan",
		"eastmarch" 		=> "Ostmarsch",
		"therift" 			=> "Rift",
		"shadowfen" 		=> "Schattenfenn",
		"stonefalls" 		=> "Steinfälle",
    "cyrodiil_e" 		=> "Cyrodiil Ebenherz"
];

$menu_all = [
	"kalthafen" => "Kalthafen",
	"kargstein" => "Kargstein"
];


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
		<!--
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		-->
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
				<div class="alliance">
					<div id="dagger" class="icon" onclick="chance_menulinks('dagger', 'only_d');">
						<img src="img/dagger.png">
					</div>
					<div id="aldmeri" class="icon active" onclick="chance_menulinks('aldmeri', 'only_a');">
						<img src="img/aldmeri.png">
					</div>
					<div id="ebon" class="icon" onclick="chance_menulinks('ebon', 'only_e');">
						<img src="img/ebon.png">
					</div>
				</div>
				
				<div class="links">
					
					<?php
					
					foreach($menu_dolch as $mapname => $label)
					{
						echo '<a class="only_d'. (($_GET["map"] == $mapname) ? " active" : "") .'" style="display: none;" href="./?map='. $mapname .'">'. $label .'</a>'; 
					}
					foreach($menu_aldmeri as $mapname => $label)
					{
						echo '<a class="only_a'. (($_GET["map"] == $mapname) ? " active" : "") .'" href="./?map='. $mapname .'">'. $label .'</a>'; 
					}
					foreach($menu_ebenherz as $mapname => $label)
					{
						echo '<a class="only_e'. (($_GET["map"] == $mapname) ? " active" : "") .'" style="display: none;" href="./?map='. $mapname .'">'. $label .'</a>'; 
					}
					foreach($menu_all as $mapname => $label)
					{
						echo '<a class="'. (($_GET["map"] == $mapname) ? " active" : "") .'" href="./?map='. $mapname .'">'. $label .'</a>'; 
					}
					
					?>
					
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
						$collected = $_COOKIE[$shard_id] == 1 ? "collected" : ""; 
						
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