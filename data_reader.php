<div id=json></div>

<!-- paste here your html -->
<div id=html_insert>



</div>
<!-- end html -->




<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
$(document).ready(function(){
		
	$( "#html_insert" ).hide();
	console.log("Data Reader started...");
	$( "#json" ).append("[ <br>");
	
	var len = $( ".marker-on-map" ).length;
	$( ".marker-on-map" ).each(function( index ) {
		var x = this.style.top.substring(0, 5).replace(/%/g,'');
		var y = this.style.left.substring(0, 5).replace(/%/g,'');
		console.log(index + ": " + "(" + x + "/" + y + ")");
		
		var line = '';
		line += '&nbsp; &nbsp; { <br>';
		line += '&nbsp; &nbsp; &nbsp; &nbsp; "index": ' + index + ', <br>';
		line += '&nbsp; &nbsp; &nbsp; &nbsp; "x": ' + x + ', <br>';
		line += '&nbsp; &nbsp; &nbsp; &nbsp; "y": ' + y + ' <br>';
		
		line += '&nbsp; &nbsp; }';
		if (index != len - 1) {
            line += ',';
        }
		line += ' <br>';
		
		$( "#json" ).append(line);
		
	});
	
	$( "#json" ).append("] <br>");
	
	
});	
</script>



