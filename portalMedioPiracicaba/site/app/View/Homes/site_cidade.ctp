<?php 
	echo $this->Element('navigation_secondary'); 
 	echo $this->Element('slideshow'); 
?>

<div class="container-fluid">

	<main style="background-color: #fff">

		<?php echo $this->Element('cria_menu'); ?>  

		<div class="container">
			<div class="row" style="margin-bottom:40px">
		  	<div class="col-md-10 col-md-offset-1">
		  		<?php echo $this->Element('parceiros'); ?> 
		  	</div>
		  	<div class="col-md-10 col-md-offset-1" style="padding: 0">
		  		<hr style="border-top: 1px solid #ddd; margin-top: 40px; margin-bottom: 40px;">
			  	<div class="col-md-5">
			  		<?php
			  		echo $this->Html->link('Descrição&nbsp;&nbsp;<span class="glyphicon glyphicon-book"></span>', array('action' => 'site_historia', $id), array('class' => 'linkNormal', 'escape' => false));
			  		echo '<hr class="config-margin-hr">';
			  		if (empty($cidade['Cidade']['descricao'])) {
			  			if (strlen($cidade['Historia']['historia']) > 1000) {
				  			echo substr($cidade['Historia']['historia'], 0, 1000) . '...';
				  		} else {
				  			echo substr($cidade['Historia']['historia'], 0, 1000);
				  		}
			  		} else {
			  			if (strlen($cidade['Cidade']['descricao']) > 1000) {
				  			echo substr($cidade['Cidade']['descricao'], 0, 1000) . '...';
				  		} else {
				  			echo substr($cidade['Cidade']['descricao'], 0, 1000);
				  		}
			  		}			  		
			  		echo $this->Html->link('<br>Leia mais >>>', array('action' => 'site_historia', $id), array('class' => 'linkNormal', 'escape' => false));
			  		?>
			  	</div>
			  	<?php 
	    			if (empty($cidade['Evento'])) {
    					echo '';
    				} else {
	    				echo $this->Html->link('Eventos&nbsp;&nbsp;<span class="glyphicon glyphicon-calendar"></span>', array('action' => 'site_agenda', $id), array('class' => 'linkNormal paddingLeft', 'escape' => false));
	    			}
			  		echo '<br><br>';
			    ?>
			  	<div class="col-md-4 col-sm-6 divNoticia center">
		    		<div class="noticia agenda top">		    			
		    			<?php 
		    				if (empty($eventos)) {
		    					echo '<div class="config-padding col-md-12 text-center">';
		    					echo $this->Html->image('evento.png', array('width' => '35%', 'height' => '45%'));
		    					echo '<hr class="config-margin-hr">';
		    					echo '</div>';
		    					echo '<h3 class="text-center menor">Oops..</h3>';
		    					echo '<p class="text-center" style="font-size:18px; color: #51A8B1">Ainda não temos eventos</p>';
		    				} else if ($eventos['0']['Evento']['foto_anuncio'] != null) {
		    					echo $this->Html->link(
										 $this->Html->image($eventos['0']['Evento']['foto_anuncio'], array('class' => 'class_img hiding_event', 'width' => '100%', 'height' => '70%')),
										 '../img/'.$eventos['0']['Evento']['foto_anuncio'],
										 array('escapeTitle' => false, 'title' => $eventos['0']['Evento']['titulo'].' - '.$eventos['0']['Evento']['data'].' - '.$eventos['0']['Evento']['horario'].' - '.$eventos['0']['Evento']['local'].' - '.$eventos['0']['Evento']['descricao'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
									);
									echo '<h3 class="text-center menor">'.$eventos['0']['Evento']['titulo'].'</h3>';
		    					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$eventos['0']['Evento']['data']. ' - ' .$eventos['0']['Evento']['horario'].'</p>';
		    				} else if ($eventos['0']['FotoEvento'] != null) {
		    					echo $this->Html->link(
										 $this->Html->image($eventos['0']['FotoEvento']['0']['foto'], array('class' => 'class_img hiding_event', 'width' => '100%', 'height' => '70%')),
										 '../img/'.$eventos['0']['FotoEvento']['0']['foto'],
										 array('escapeTitle' => false, 'title' => $eventos['0']['Evento']['titulo'].' - '.$eventos['0']['Evento']['data'].' - '.$eventos['0']['Evento']['horario'].' - '.$eventos['0']['Evento']['local'].' - '.$eventos['0']['Evento']['descricao'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
									);
									echo '<h3 class="text-center menor">'.$eventos['0']['Evento']['titulo'].'</h3>';
		    					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$eventos['0']['Evento']['data']. ' - ' .$eventos['0']['Evento']['horario'].'</p>';
		    				} else {
		    					echo '<div class="config-padding col-md-12 text-center">';
		    					echo $this->Html->link(
										 $this->Html->image('evento.png', array('class' => 'class_img hiding_event', 'width' => '40%', 'height' => '50%')),
										 '../img/'.'evento.png',
										 array('escapeTitle' => false, 'title' => $eventos['0']['Evento']['titulo'].' - '.$eventos['0']['Evento']['data'].' - '.$eventos['0']['Evento']['horario'].' - '.$eventos['0']['Evento']['local'].' - '.$eventos['0']['Evento']['descricao'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
									);
		    					echo '<hr class="config-margin-hr">';
		    					echo '<h3 class="text-center menor">'.$eventos['0']['Evento']['titulo'].'</h3>';
		    					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$eventos['0']['Evento']['data']. ' - ' .$eventos['0']['Evento']['horario'].'</p>';
		    					echo '</div>';
		    				}
		    			?>	
		    		</div>
		    	</div>
		    	<div class="col-md-3 noRight">
		    		<?php
		    		echo ' 
					    <div class="weather-card">
								<h1>'.$results['results']['temp'].'°</h1>';
								if ($results['results']['description'] == 'Tempo limpo') {
									echo '
									<div class="icon sunny">
						  			<div class="sun">
						    			<div class="rays"></div>
						  			</div>
									</div><br>';
								} elseif ($results['results']['description'] == 'Tempo nublado') {
									echo '
									<div class="icon cloudy">
									  <div class="cloud"></div>
									  <div class="cloud"></div>
									</div><br>';
								} elseif ($results['results']['description'] == 'Parcialmente nublado') {
									echo '
									<div class="icon sun-shower">
									  <div class="cloud"></div>
									  <div class="sun">
									    <div class="rays"></div>
									  </div>
									</div><br>';
								} elseif ($results['results']['description'] == 'Alguns chuviscos') {
									echo '
									<div class="icon rainy">
									  <div class="cloud"></div>
									  <div class="rain"></div>
									</div><br>';
								} elseif ($results['results']['description'] == 'Tempestades') {
									echo '
									<div class="icon thunder-storm">
									  <div class="cloud"></div>
									  <div class="lightning">
									    <div class="bolt"></div>
									    <div class="bolt"></div>
									  </div>
									</div><br>';
								} else {
									echo '
									<div class="icon sunny">
						  			<div class="sun">
						    			<div class="rays"></div>
						  			</div>
									</div><br>';
								}
		  					echo '
								<hr style="margin:0"><p>'.$city.'</p>
					    </div>';
		    		?>
		    	</div>
			  </div>
			</div>
	  </div>
	 </main>

  <section class="subtitle-intro noticias">
    <div class="container noticias responsive-large">
      <div class="container-fluid text-center">
    		<?php echo $this->Html->link('Notícias Regionais&nbsp;&nbsp;<span class="glyphicon glyphicon-plus bigger"></span>', array('action' => 'site_noticias', 2), array('escape' => false, 'class' => 'noticiasHome more text-center')); ?>      
    		<?php echo $this->Html->link('<br>(Clique acima para ver mais)', array('action' => 'site_noticias', 2), array('escape' => false, 'class' => 'noticiasHome more moreUnder text-center')); ?>
    	</div>
      <div class="row border">
      	<div class="col-lg-9">
      		<?php $count = 0; 
      			for ($i=0; $i < 6; $i++) { 
      				if (count($noticias_reg) == $count) {
      					$count = 0;
      				}
      		?>	
		    	<div class="col-lg-4 col-md-6 col-sm-6 divNoticia">
		    		<div class="noticia">
		    			<?php 
		    				echo '<a class="noticia_foto" href="../site_noticia/'.$noticias_reg[$count]['Noticia']['id'].'/'.$noticias_reg[$count]['Noticia']['tipo'].'" escape="false">';
		    				echo $this->Html->image($noticias_reg[$count]['Noticia']['foto'], array('width' => '100%', 'height' => '70%'));
		    				echo '<p class="noticia_title">'.$noticias_reg[$count]['Noticia']['titulo'].'</p>';
		    				echo '</a>'
		    			?>	
		    		</div><br>
		    	</div>
	    	<?php $count++; } ?>
      	</div>
      	<div class="col-lg-3">
      		<div class="col-lg-12 col-lg-offset-0 col-md-8 col-md-offset-2 divNoticia p">
		    		<div class="noticia prop">
		    			<?php 
		    				$index = mt_rand(0,count($anuncios_quad)-1);
		    				echo '<a href="'.$anuncios_quad[$index]['Parceiro']['site'].'" target="_blank" escape="false">';
		    				echo $this->Html->image($anuncios_quad[$index]['Parceiro']['foto'], array('width' => '100%', 'height' => '100%'));
		    				echo '</a>'
		    			?>
		    		</div><br>
		    	</div>	
      	</div>
	    </div>
	  </div>
  </section>

  <section class="subtitle-intro noticias" style="background-color:#fff">
    <div class="container noticias responsive-large">
      <div class="container-fluid text-center">
    		<?php echo $this->Html->link('Boas Notícias&nbsp;&nbsp;<span class="glyphicon glyphicon-leaf bigger"></span>', array('action' => 'site_noticias', 3), array('escape' => false, 'class' => 'noticiasHome more text-center')); ?>      
    		<?php echo $this->Html->link('<br>(Clique acima para ver mais)', array('action' => 'site_noticias', 3), array('escape' => false, 'class' => 'noticiasHome more moreUnder text-center')); ?>
    	</div>
      <div class="row border">
	    	<?php $count = 0; 
      			for ($i=0; $i < 4; $i++) { 
      				if (count($noticias_boas) == $count) {
      					$count = 0;
      				}
      		?>
		    	<div class="col-md-3 col-sm-6 divNoticia">
		    		<div class="noticia agenda boas">
		    			<?php 
		    				echo '<a class="noticia_foto" href="../site_noticia/'.$noticias_boas[$count]['Noticia']['id'].'/'.$noticias_boas[$count]['Noticia']['tipo'].'" escape="false">';
		    				echo $this->Html->image($noticias_boas[$count]['Noticia']['foto'], array('width' => '100%', 'height' => '70%'));
		    				echo '<p class="noticia_title">'.$noticias_boas[$count]['Noticia']['titulo'].'</p>';
		    				echo '</a>'
		    			?>	
		    		</div><br>
		    	</div>
	    	<?php $count++; } ?>
	    </div>
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
  </section>

  <?php if (!empty($resumos)) { ?>
  	<section class="subtitle-intro noticias" style="background-color:#f6f6f6">
	    <div class="container noticias responsive-large">
	      <div class="container-fluid text-center">
	    		<?php echo $this->Html->link('Resumos de Novelas&nbsp;&nbsp;<span class="glyphicon glyphicon-time bigger"></span>', array('action' => 'site_noticias', 4), array('escape' => false, 'class' => 'noticiasHome more text-center')); ?>      
    		<?php echo $this->Html->link('<br>(Clique acima para ver mais)', array('action' => 'site_noticias', 4), array('escape' => false, 'class' => 'noticiasHome more moreUnder text-center')); ?>
	    	</div>
	      <div class="row border">
		    	<?php $count = 0; 
	      			for ($i=0; $i < count($resumos); $i++) { 
	      				if ($count == 4) {
	      					break;
	      				}
	      		?>
			    	<div class="col-md-3 col-sm-6 divNoticia">
			    		<div class="noticia agenda boas">
			    			<?php 
			    				echo '<a class="noticia_foto" href="../site_noticia/'.$resumos[$count]['Noticia']['id'].'/'.$resumos[$count]['Noticia']['tipo'].'" escape="false">';
			    				echo $this->Html->image($resumos[$count]['Noticia']['foto'], array('width' => '100%', 'height' => '70%'));
			    				echo '<p class="noticia_title">'.$resumos[$count]['Noticia']['titulo'].'</p>';
			    				echo '</a>'
			    			?>	
			    		</div><br>
			    	</div>
		    	<?php $count++; } ?>
		    </div>
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
	  </section>
	<?php } ?>

	<?php if (!empty($horoscopo)) { ?>
  	<section class="subtitle-intro noticias" style="background-color:#e6e6e6">
	    <div class="container noticias responsive-large">
	      <div class="container-fluid text-center">
	    		<?php echo $this->Html->link('Horóscopo&nbsp;&nbsp;<span class="glyphicon glyphicon-tags bigger"></span>', array('action' => 'site_noticias', 5), array('escape' => false, 'class' => 'noticiasHome more text-center')); ?>      
    		<?php echo $this->Html->link('<br>(Clique acima para ver mais)', array('action' => 'site_noticias', 5), array('escape' => false, 'class' => 'noticiasHome more moreUnder text-center')); ?>
	    	</div>
	      <div class="row border">
		    	<?php $count = 0; 
	      			for ($i=0; $i < count($horoscopo); $i++) { 
	      				if ($count == 4) {
	      					break;
	      				}
	      		?>
			    	<div class="col-md-3 col-sm-6 divNoticia">
			    		<div class="noticia agenda boas">
			    			<?php 
			    				echo '<a class="noticia_foto" href="../site_noticia/'.$horoscopo[$count]['Noticia']['id'].'/'.$horoscopo[$count]['Noticia']['tipo'].'" escape="false">';
			    				echo $this->Html->image($horoscopo[$count]['Noticia']['foto'], array('width' => '100%', 'height' => '70%'));
			    				echo '<p class="noticia_title">'.$horoscopo[$count]['Noticia']['titulo'].'</p>';
			    				echo '</a>'
			    			?>	
			    		</div><br>
			    	</div>
		    	<?php $count++; } ?>
		    </div>
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
	  </section>
	<?php } ?>

	<?php if (!empty($esporte)) { ?>
  	<section class="subtitle-intro noticias" style="background-color:#fff">
	    <div class="container noticias responsive-large">
	      <div class="container-fluid text-center">
	    		<?php echo $this->Html->link('Notícias de Esportes&nbsp;&nbsp;<span class="glyphicon glyphicon-plus bigger"></span>', array('action' => 'site_noticias', 6), array('escape' => false, 'class' => 'noticiasHome more text-center')); ?>      
	    		<?php echo $this->Html->link('<br>(Clique acima para ver mais)', array('action' => 'site_noticias', 6), array('escape' => false, 'class' => 'noticiasHome more moreUnder text-center')); ?>
	    	</div>
	      <div class="row border">
	      	<div class="col-lg-9">
	      		<?php $count = 0; 
	      			for ($i=0; $i < 6; $i++) { 
	      				if (count($esporte) == $count) {
	      					$count = 0;
	      				}
	      		?>	
			    	<div class="col-lg-4 col-md-6 col-sm-6 divNoticia">
			    		<div class="noticia">
			    			<?php 
			    				echo '<a class="noticia_foto" href="../site_noticia/'.$esporte[$count]['Noticia']['id'].'/'.$esporte[$count]['Noticia']['tipo'].'" escape="false">';
			    				echo $this->Html->image($esporte[$count]['Noticia']['foto'], array('width' => '100%', 'height' => '70%'));
			    				echo '<p class="noticia_title">'.$esporte[$count]['Noticia']['titulo'].'</p>';
			    				echo '</a>'
			    			?>	
			    		</div><br>
			    	</div>
		    	<?php $count++; } ?>
	      	</div>
	      	<div class="col-lg-3">
	      		<div class="col-lg-12 col-lg-offset-0 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 divNoticia p">
			    		<div class="noticia prop">
			    			<?php 
			    				$index = mt_rand(0,count($anuncios_quad)-1);
			    				echo '<a href="'.$anuncios_quad[$index]['Parceiro']['site'].'" target="_blank" escape="false">';
			    				echo $this->Html->image($anuncios_quad[$index]['Parceiro']['foto'], array('width' => '100%', 'height' => '100%'));
			    				echo '</a>'
			    			?>
			    		</div>
			    	</div>	
	      	</div>
		    </div>
		  </div>
	  </section>
	<?php } ?>

  <?php if (!empty($videos)) {
		echo '<section id="scroll_foto" style="background-color: #f6f6f6">';
			echo '<div class="container">';
				echo '<div class="col-md-12 text-center">';
					echo '<h1 class="noticiasHome">Vídeos</h1><br><hr style="margin-top:0">';
				echo '</div>';

				foreach ($videos as $v) {
					$v['Video']['link'] = str_replace('width="560"', 'width="100%"', $v['Video']['link']); 
					$v['Video']['link'] = str_replace('height="315"', 'height="280"', $v['Video']['link']); 
					echo '<div class="col-sm-6 col-md-4">';
					echo '<div class="thumbnail">';
						echo $v['Video']['link'];
						echo '<div class="caption">';
							echo '<h4>'.$v['Video']['nome'].'</h4>';
						echo '</div>';
					echo '</div>';
					echo '</div>';
				}
				echo '<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 divNoticia">';
		  		echo '<div class="noticia prop large">';
		  			$index = mt_rand(0,count($anuncios_quad)-1);
	  				echo '<a href="'.$anuncios_large[$index]['Parceiro']['site'].'" target="_blank" escape="false">';
	  				echo $this->Html->image($anuncios_large[$index]['Parceiro']['foto'], array('width' => '100%', 'height' => '100%'));
	  				echo '</a>';
		  		echo '</div>';
		  	echo '</div>';
			echo '</div>';
		echo '</section>';		
	}
	?>

	<?php echo $this->Element('footer'); ?>
  
</div> 