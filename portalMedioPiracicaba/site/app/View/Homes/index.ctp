<?php echo $this->Element('navigation'); 
			//debug($content);
?>

<div class="container-fluid">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">

	  <!-- Wrapper for slides -->
	  <div class="carousel-inner resolucao" role="listbox">
	  	<?php 
  		if (!empty($fotos_aereas)) {
  			$count = 0;
  			$active = '';
		  	foreach ($fotos_aereas as $foto) {
  				if ($count == 0) {
  					$active = 'active';
  				} else {
  					$active = '';
  				}

  				echo '<div class="item '.$active.'">';
  				echo 	$this->Html->image($foto['Foto']['foto'], array('width' => '2000'));
	    		echo '</div>';

	    		$count++;
		  	}
  		} else if (!empty($fotos_atuais)) {
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
	    		echo '</div>';

	    		$count++;
	    	}
  		} else {
  		?>
	    <div class="item active">
	    	<?php echo $this->Html->image('img2.jpg', array('width' => '2000')) ?>	    	
	    </div>

	    <div class="item">
	      <?php echo $this->Html->image('img3.jpg', array('width' => '2000')) ?>
	    </div>

	    <div class="item">
	      <?php echo $this->Html->image('img4.jpg', array('width' => '2000')) ?>
	    </div>

	     <div class="item">
	      <?php echo $this->Html->image('img5.jpg', array('width' => '2000')) ?>
	    </div>
	    <?php } ?>
	  </div>
	</div>
</div> 

<main>

  <div class="container col-lg-8 col-lg-offset-2" id="cidades">
  	
  	<?php echo $this->Element('parceiros'); ?> 
    
    <h3 class="cidadesHome">Cidades</h3>
    <div class="row" id="listCidades">
    	<?php 
    		foreach ($cidades as $c):
    			echo '<div class="col-lg-4 col-sm-6 col-xs-12">';
    			echo '<a href="homes/site_cidade/'.$c['Cidade']['id'].'">
    							<span class="glyphicon glyphicon-map-marker"></span> ' . $c['Cidade']['nome'] . '
    						</a><br>';
    			echo '</div>';
    		endforeach;
    	?>
    </div> 
  </div>

  <section class="subtitle-intro noticias">
    <div class="container responsive-large">
    	<h1 class="noticiasHome text-center">Notícias Gerais</h1>
      <div class="row border">
      	<div class="col-lg-9 left">
      		<?php $count = 0; 
      			for ($i=0; $i < 6; $i++) { 
      				if (count($noticias_gerais) == $count) {
      					$count = 0;
      				}
      		?>	
		    	<div class="col-lg-4 col-md-6 col-sm-6 divNoticia">
		    		<div class="noticia">
		    			<?php 
		    				echo '<a class="noticia_foto" href="'.$noticias_gerais[$count]['Noticia']['link'].'" target="_blank" escape="false">';
		    				echo $this->Html->image($noticias_gerais[$count]['Noticia']['foto'], array('width' => '100%', 'height' => '70%'));
		    				echo '<p class="noticia_title">'.$noticias_gerais[$count]['Noticia']['titulo'].'</p>';
		    				echo '</a>'
		    			?>	
		    		</div><br>
		    	</div>
	    	<?php $count++; } ?>
      	</div>
      	<div class="col-lg-3 right">
      		<div class="col-lg-12 col-lg-offset-0 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 divNoticia p">
		    		<div class="noticia prop">
		    			<?php 
		    				echo '<a href="'.$anuncios_quad['0']['Parceiro']['site'].'" target="_blank" escape="false">';
		    				echo $this->Html->image($anuncios_quad['0']['Parceiro']['foto'], array('width' => '100%', 'height' => '100%'));
		    				echo '</a>'
		    			?>
		    		</div><br>
		    		<?php
		    		echo ' 
						<div class="weather-wrapper">
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
					    </div>
						</div>';
		    		?>
		    	</div>	
      	</div>
	    </div>
    </div>
  </section>

  <section class="subtitle-intro noticias agenda" style="background-color:#e6e6e6">
    <div class="container noticias responsive-large">
      <div class="container-fluid text-center">
    		<?php echo $this->Html->link('Agenda&nbsp;&nbsp;<span class="glyphicon glyphicon-calendar bigger"></span>', array('action' => 'site_agenda'), array('escape' => false, 'class' => 'noticiasHome more text-center')); ?>      
    	</div>
      <div class="row border">
      	<?php $count = 0; 
      			for ($i=0; $i < 4; $i++) { 
      				if (count($eventos) == $count) {
      					$count = 0;
      				}
      		?>
		    	<div class="col-md-3 col-sm-6 divNoticia">
		    		<div class="noticia agenda">
		    			<?php 
		    				echo '<a class="noticia_foto" href="#'./*$eventos[$count]['Evento']['link'].*/'" escape="false">';
		    				if ($eventos[$count]['Evento']['foto_anuncio'] != null) {
			    				echo $this->Html->image($eventos[$count]['Evento']['foto_anuncio'], array('class' => 'hiding_event', 'width' => '100%', 'height' => '70%'));
		    				} else {
		    					echo '<div class="config-padding col-md-12 text-center">';
		    					echo $this->Html->image('evento.png', array('width' => '40%', 'height' => '50%'));
		    					echo '<hr class="config-margin-hr">';
		    					echo '</div>';
		    				}
		    					echo '<h3 class="text-center menor">'.$eventos[$count]['Evento']['titulo'].'</h3>';
		    					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$eventos[$count]['Evento']['data']. ' - ' .$eventos[$count]['Evento']['horario'].'</p>';
		    				echo '</a>';
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

  <section class="subtitle-intro noticias">
    <div class="container noticias responsive-large">
      <div class="container-fluid text-center">
    		<?php echo $this->Html->link('Notícias Regionais&nbsp;&nbsp;<span class="glyphicon glyphicon-plus bigger"></span>', array('action' => 'site_noticias', 2), array('escape' => false, 'class' => 'noticiasHome more text-center')); ?>      
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
		    				echo '<a class="noticia_foto" href="homes/site_noticia/'.$noticias_reg[$count]['Noticia']['id'].'/'.$noticias_reg[$count]['Noticia']['tipo'].'" escape="false">';
		    				echo $this->Html->image($noticias_reg[$count]['Noticia']['foto'], array('width' => '100%', 'height' => '70%'));
		    				echo '<p class="noticia_title">'.$noticias_reg[$count]['Noticia']['titulo'].'</p>';
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
		    				echo '<a href="'.$anuncios_quad['0']['Parceiro']['site'].'" target="_blank" escape="false">';
		    				echo $this->Html->image($anuncios_quad['0']['Parceiro']['foto'], array('width' => '100%', 'height' => '100%'));
		    				echo '</a>'
		    			?>
		    		</div><br>
		    		<div class="panel panel-info" style="margin-top: 20px;">
						  <div class="panel-heading">
						    <h3 class="panel-title">Cotações</h3>
						  </div>
						  <div class="panel-body noPadding">
						  	<ul class="list-group">
								  <li class="list-group-item noHr">
								    <span class="badge"><?php echo '$'.number_format($moedas['valores']['USD']['valor'], 2, '.', ',') ?></span>
								    <span class="glyphicon glyphicon-usd"></span>&nbsp;&nbsp;Dólar
								  </li>
								  <hr style="margin:0; border-top: 1px solid #999;">
								  <li class="list-group-item noHr">
								    <span class="badge"><?php echo '$'.number_format($moedas['valores']['EUR']['valor'], 2, '.', ',') ?></span>
								    <span class="glyphicon glyphicon-eur"></span>&nbsp;&nbsp;Euro
								  </li>
								  <hr style="margin:0; border-top: 1px solid #999;">
								  <li class="list-group-item noHr">
								    <span class="badge"><?php echo '$'.number_format($moedas['valores']['GBP']['valor'], 2, '.', ',') ?></span>
								    <span class="glyphicon glyphicon-gbp"></span>&nbsp;&nbsp;Libra
								  </li>
								</ul>
						  </div>
						</div>
		    	</div>	
      	</div>
	    </div>
	  </div>
  </section>

  <section class="subtitle-intro noticias" style="background-color:#e6e6e6">
    <div class="container noticias responsive-large">
      <div class="container-fluid text-center">
    		<?php echo $this->Html->link('Boas Notícias&nbsp;&nbsp;<span class="glyphicon glyphicon-leaf bigger"></span>', array('action' => 'site_noticias', 3), array('escape' => false, 'class' => 'noticiasHome more text-center')); ?>      
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
		    				echo '<a class="noticia_foto" href="homes/site_noticia/'.$noticias_boas[$count]['Noticia']['id'].'/'.$noticias_boas[$count]['Noticia']['tipo'].'" escape="false">';
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
	    				echo '<a href="'.$anuncios_large['0']['Parceiro']['site'].'" target="_blank" escape="false">';
	    				echo $this->Html->image($anuncios_large['0']['Parceiro']['foto'], array('width' => '100%', 'height' => '100%'));
	    				echo '</a>'
	    			?>	
    		</div>
    	</div>	
    </div>
  </section>

  <?php echo $this->Element('footer'); ?>

</main>    