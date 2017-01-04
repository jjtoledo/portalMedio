<div class="container-fluid">

	<div id="espaco">

	</div>

	<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 divNoticia">
		<div class="noticia prop large" style="margin-top: 0; margin-bottom: 25px">
			<?php 
					$index = mt_rand(0,count($anuncios_large)-1);
  				echo '<a href="'.$anuncios_large[$index]['Parceiro']['site'].'" target="_blank" escape="false">';
  				echo $this->Html->image($anuncios_large[$index]['Parceiro']['foto'], array('width' => '100%', 'height' => '100%'));
  				echo '</a>'
  			?>	
		</div>
	</div>
  
	<div class="row">
	    <div class="col-md-12">
	      	<div class="carousel carousel-showmanymoveone slide" id="carouselABC">
	        	<div class="carousel-inner">
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
				  					echo '<div class="col-xs-12 col-sm-6 col-md-3">';
				  						echo $this->Html->link(
													 $this->Html->image($foto['Foto']['foto'], array('class' => 'img-carousel')),
													 '../img/'.$foto['Foto']['foto'],
													 array('escapeTitle' => false, 'title' => $foto['Foto']['descricao'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
												);
				  					echo '</div>';
					    		echo '</div>';

				  				if ($count == 1 || $count == 3) {
				  					echo '<div class="item '.$active.'">';
					  					$index = mt_rand(0,count($anuncios_large)-1);		  						
					  					echo '<div class="col-xs-12 col-sm-6 col-md-3"><a target="_blank" href="http://'.$anuncios_quad[$index]['Parceiro']['site'].'">';			
					  						echo $this->Html->image($anuncios_quad[$index]['Parceiro']['foto'], array('class' => 'img-carousel'));
					  					echo '</a></div>';
						    		echo '</div>';
				  				}

					    		$count++;
					    	}
				  		} else if (!empty($fotos_aereas)) {
				  			$count = 0;
				  			$active = '';
						  	foreach ($fotos_atuais as $foto) {
				  				if ($count == 0) {
				  					$active = 'active';
				  				} else {
				  					$active = '';
				  				}

				  				echo '<div class="item '.$active.'">';
				  					echo '<div class="col-xs-12 col-sm-6 col-md-3">';
				  						echo $this->Html->link(
													 $this->Html->image($foto['Foto']['foto'], array('class' => 'img-carousel')),
													 '../img/'.$foto['Foto']['foto'],
													 array('escapeTitle' => false, 'title' => $foto['Foto']['descricao'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
												);
				  					echo '</div>';
					    		echo '</div>';

				  				if ($count == 1 || $count == 3) {
				  					echo '<div class="item '.$active.'">';
					  					$index = mt_rand(0,count($anuncios_large)-1);		  						
					  					echo '<div class="col-xs-12 col-sm-6 col-md-3"><a target="_blank" href="http://'.$anuncios_quad[$index]['Parceiro']['site'].'">';			
					  						echo $this->Html->image($anuncios_quad[$index]['Parceiro']['foto'], array('class' => 'img-carousel'));
					  					echo '</a></div>';
						    		echo '</div>';
				  				}

					    		$count++;
					    	}
				  		} ?>
	        	</div>
	      	</div>
	    </div> 
	</div>
</div>