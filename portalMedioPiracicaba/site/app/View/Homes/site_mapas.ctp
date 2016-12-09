<?php echo $this->Element('navigation'); 
			//debug($content);
?>

<div class="container-fluid">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">

	  <!-- Wrapper for slides -->
	  <div class="carousel-inner resolucao" role="listbox">
	  	<?php 
  		if (!empty($fotos_atuais)) {
  			$count = 0;
  			$active = '';
		  	foreach ($fotos_atuais as $foto) {
  				if ($count == 0) {
  					$active = 'active';
  				} else {
  					$active = '';
  				}

  				echo '<div class="item '.$active.'">';
  				echo 	$this->Html->image($foto['Foto']['foto'], array('width' => '2000'));
	      	echo 	'<div class="carousel-caption">';
	    		echo 		'<h1 class="welcome">Veja nossos mapas e descubra caminhos em '.$cidade['Cidade']['nome'].'</h1>';
	    		echo 		'<div class="arrow bounce"></div>';
	    		echo 	'</div>';
	    		echo '</div>';

	    		$count++;
		  	}
  		} else {
  		?>
	    <div class="item active">
	      <?php echo $this->Html->image('img2.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Veja nossos mapas e descubra caminhos em '.$cidade['Cidade']['nome'].'</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	    <div class="item">
	      <?php echo $this->Html->image('img3.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Veja nossos mapas e descubra caminhos em '.$cidade['Cidade']['nome'].'</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	    <div class="item">
	      <?php echo $this->Html->image('img4.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Veja nossos mapas e descubra caminhos em '.$cidade['Cidade']['nome'].'</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	     <div class="item">
	      <?php echo $this->Html->image('img5.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Veja nossos mapas e descubra caminhos em '.$cidade['Cidade']['nome'].'</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>
	    <?php } ?>
	  </div>
	</div>

	<main style="background-color: #fff">
		<div class="container">
			<div class="col-md-10 col-md-offset-1 cresce">
		  	<div class="row">
			  	<p class="linkNormal">Saiba mais</p>
		  		<hr style="border-top: 1px solid #ddd; margin-top: 15px; margin-bottom: 40px; width: auto">	
		  		<?php echo $this->Element('menu_cidade'); ?>
		  	</div>
	  	</div>
	  	
	  	<div class="col-md-12 text-center">
				<?php echo '<h1 class="noticiasHome text-center">Mapa de ' . $cidade['Cidade']['nome'] .'</h1><br><hr style="margin-top:0">' ?>
			</div>

	  	<div class="col-md-12" style="margin-top: 20px">	  		
				<div id="map" style="width:100%;height:700px;background:yellow"></div>
			</div>

			<script>
			function geocodeAddress(geocoder, resultsMap) {
			  var address = "<?php echo $cidade['Cidade']['nome'] ?>";
			  geocoder.geocode({'address': address}, function(results, status) {
			    if (status === google.maps.GeocoderStatus.OK) {
			      resultsMap.setCenter(results[0].geometry.location);
			      var marker = new google.maps.Marker({
			        map: resultsMap,
			        position: results[0].geometry.location
			      });
			    } else {
			      alert('Geocode was not successful for the following reason: ' + status);
			    }
			  });
			}

			function myMap() {
			  var map = new google.maps.Map(document.getElementById('map'), {
			    zoom: 14,
			    center: {lat: -34.397, lng: 150.644}
			  });
			  var geocoder = new google.maps.Geocoder();
			  geocodeAddress(geocoder, map);
			}
			</script>

			<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2INtyANYWGb0xiWV0yXfEnXzhnw8fwq8&callback=myMap" type="text/javascript"></script>
	  </div>
	</main>

	<?php echo $this->Element('footer'); ?>
  
</div> 