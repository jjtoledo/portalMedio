<?php 
	echo $this->Element('navigation_secondary'); 
 	echo $this->Element('slideshow'); 
?>

<div class="container-fluid">
	<?php echo $this->Element('cria_menu'); ?>  

	<main style="background-color: #fff">
		<div class="container">
	  	
	  	<div class="col-md-12 text-center">
				<?php echo '<h1 class="noticiasHome text-center">Mapa de ' . $cidade['Cidade']['nome'] .'</h1><br><hr style="margin-top:0">' ?>
			</div>

	  	<div class="col-md-12" style="margin-top: 20px">	  		
				<div id="map" style="width:100%;height:700px;background:yellow"></div>
			</div>			
	  </div>
	</main>

	<?php if (!empty($mapas)): ?>
		<section class="subtitle-intro noticias agenda" style="background-color:#e6e6e6">
	    <div class="container noticias responsive-large">
	      <div class="container-fluid text-center">
	    		<?php echo '<p class="noticiasHome more text-center" style="margin-bottom:5px">Principais Mapas</p>'; ?>
	    		<?php echo '<p class="noticiasHome more moreUnder text-center">(Clique na imagem para detalhes)</p>'; ?>      
	    	</div>
	      <div class="row border">
	      	<?php $count = 0; 
	      			for ($i=0; $i < count($mapas); $i++) {
	      		?>
			    	<div class="col-md-3 col-sm-6 divNoticia">
			    		<div class="noticia mapa">
			    			<?php 				    				
			    				if ($mapas[$count]['Mapa']['foto'] != null) {
			    					echo $this->Html->link(
											 $this->Html->image($mapas[$count]['Mapa']['foto'], array('class' => '', 'width' => '100%', 'height' => '100%')),
											 '../img/'.$mapas[$count]['Mapa']['foto'],
											 array('escapeTitle' => false, 'title' => $mapas[$count]['Mapa']['descricao'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
										);
			    				}
			    			?>	
			    		</div><br>
			    	</div>
		    	<?php $count++; } ?>
					<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 divNoticia">
		    		<div class="noticia prop large">
		    			<?php 
    					$index = mt_rand(0,count($anuncios_large)-1);
	    				echo '<a href="'.$anuncios_large[$index]['Parceiro']['site'].'" target="_blank" escape="false">';
	    				echo $this->Html->image($anuncios_large[$index]['Parceiro']['foto'], array('width' => '100%', 'height' => '100%'));
	    				echo '</a>'
	    			?>	
		    		</div>
		    	</div>	
		    </div>    	
	    </div>
	  </section>
	<?php endif; ?>

	<?php echo $this->Element('footer'); ?>
  
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