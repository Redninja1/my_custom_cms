<style type="text/css">
@keyframes slidy { 
	0%  { left: 0%; }
	20% { left: 0%; }
	25% { left: -100%; }
	45% { left: -100%; }
	50% { left: -200%; }
	70% { left: -200%; } 
	75% { left: -300%; }
	95% { left: -300%; }
	100% { left: -400%; } 
}
div#slider {
	width: 65%;
	max-width: 78%;
}

div#slider figure {
	position: relative;
	width: 500%;
	margin: 0;
	padding: 0;
	font-size: 0;
	text-align: left;
}
div#slider figure img {
	width: 20%;
	height: auto;
	float: left;
}
div#slider {
	width: 65%;
	max-width: 78%;
	overflow: hidden; 
}
div#slider figure {
	position: relative;
	width: 500%;
	margin: 0;
	padding: 0;
	font-size: 0;
	left: 0;
	text-align: left;
	animation: 30s slidy infinite;  
}
</style>
<?php

'<div id="slider">
	<figure>
		<img src="austin-fireworks.jpg" alt>
		<img src="taj-mahal.jpg" alt>
		<img src="ibiza.jpg" alt>
		<img src="ankor-wat.jpg" alt>
		<img src="austin-fireworks.jpg" alt>
	</figure>
</div> '

 ?>

