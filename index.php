<!doctype html>
<html lang="de">
	<?php
	$version = "1.0.0";
	$map = "auridon";
	
	$datas = array(
				   array('x'=>75,'y'=>43),
				   array('x'=>68,'y'=>53),
				   array('x'=>54,'y'=>55),
				   array('x'=>38,'y'=>59),
				   array('x'=>51,'y'=>46),
				   array('x'=>34,'y'=>46),
				   array('x'=>88,'y'=>59),
				   array('x'=>12,'y'=>40),
				   array('x'=>66,'y'=>41),
				   array('x'=>20,'y'=>18),
				   array('x'=>83,'y'=>57),
				   array('x'=>30,'y'=>41),
				   array('x'=>81,'y'=>69),
				   array('x'=>50,'y'=>68),
				   array('x'=>39,'y'=>42),
				   array('x'=>30,'y'=>57),
				  );
	?>
	
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
			
			
			<div id="map-holder">
				<img class="mapa-slika" src="img/maps/<?php echo $map; ?>.jpg">
				
				<?php
				foreach ($datas as $row) {
					if($row['x'] && $row['y']) {
						echo '<div class="marker-on-map" style="top: '.$row['x'].'%; left: '.$row['y'].'%;"></div>';
					}
				}
				?>
				 
			</div>
		
		
		</div>
	</div>
		
    
    <script>
		
		
	$( ".marker-on-map" ).click(function() {
		if ( $( this ).hasClass( "collected" ) ) {
			$( this ).removeClass( "collected" );
		} else {
			$( this ).addClass( "collected" );
		}
		
	});

		
		
		
	</script>
    
    <script src="js/teso.js?version=%22<?php echo $version; ?>%22"></script>
    
  </body>
</html>