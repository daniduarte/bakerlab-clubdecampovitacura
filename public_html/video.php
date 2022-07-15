<html>
	<head></head>
	<body>

		<div id="wrap" style="width: 100%; height: 100%; position: fixed;"></div>
		
		<script src="_static/js/jquery/jquery-1.12.4.min.js"></script>
		<script src="_static/js/jquery.mb.YTPlayer.min.js"></script>
			
		<script>
			jQuery(function(){
		      	jQuery("#wrap").YTPlayer({
			      	videoURL:'http://youtu.be/zlEFPdXN_dw',
			      	rel:0,
			      	showYTLogo: false,
			      	stopMovieOnBlur: false
		      	});
		    });
		</script>
		
	</body>
</html>