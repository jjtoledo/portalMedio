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
			    				echo '<a href="'.$anuncios_large['0']['Parceiro']['site'].'" target="_blank" escape="false">';
			    				echo $this->Html->image($anuncios_large['0']['Parceiro']['foto'], array('width' => '100%', 'height' => '100%'));
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