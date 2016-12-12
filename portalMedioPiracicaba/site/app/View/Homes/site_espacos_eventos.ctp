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
	      	echo 	'<div class="carousel-caption">';
	      	if (isset($cidade)) {	      		
	    			echo 		'<h1 class="welcome">Confira os espaços para eventos de '.$cidade['Cidade']['nome'].'</h1>';
	      	} else {
	      		echo 		'<h1 class="welcome">Confira os espaços para eventos da região Médio Piracicaba</h1>';
	      	}
	    		echo 		'<div class="arrow bounce"></div>';
	    		echo 	'</div>';
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
	      	echo 	'<div class="carousel-caption">';
	    		if (isset($cidade)) {	      		
	    			echo 		'<h1 class="welcome">Confira os espaços para eventos de '.$cidade['Cidade']['nome'].'</h1>';
	      	} else {
	      		echo 		'<h1 class="welcome">Confira os espaços para eventos da região Médio Piracicaba</h1>';
	      	}
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
	    		<?php if (isset($cidade)) {	      		
	    			echo 		'<h1 class="welcome">Confira os espaços para eventos de '.$cidade['Cidade']['nome'].'</h1>';
	      	} else {
	      		echo 		'<h1 class="welcome">Confira os espaços para eventos da região Médio Piracicaba</h1>';
	      	} ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	    <div class="item">
	      <?php echo $this->Html->image('img3.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php if (isset($cidade)) {	      		
	    			echo 		'<h1 class="welcome">Confira os espaços para eventos de '.$cidade['Cidade']['nome'].'</h1>';
	      	} else {
	      		echo 		'<h1 class="welcome">Confira os espaços para eventos da região Médio Piracicaba</h1>';
	      	} ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	    <div class="item">
	      <?php echo $this->Html->image('img4.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php if (isset($cidade)) {	      		
	    			echo 		'<h1 class="welcome">Confira os espaços para eventos de '.$cidade['Cidade']['nome'].'</h1>';
	      	} else {
	      		echo 		'<h1 class="welcome">Confira os espaços para eventos da região Médio Piracicaba</h1>';
	      	} ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	     <div class="item">
	      <?php echo $this->Html->image('img5.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php if (isset($cidade)) {	      		
	    			echo 		'<h1 class="welcome">Confira os espaços para eventos de '.$cidade['Cidade']['nome'].'</h1>';
	      	} else {
	      		echo 		'<h1 class="welcome">Confira os espaços para eventos da região Médio Piracicaba</h1>';
	      	} ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>
	    <?php } ?>
	  </div>
	</div>

	<div class="container-fluid text-center">
		<div class='row'>
		  <div class='col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1'>
		    <div class='search-box'>
		    	<?php
			    echo $this->Form->create('EspacoEvento', array('type' => 'get', 'class' => 'search-form'));
			    echo $this->Form->input('search', array('label' => false, 'class' => 'form-control', 'placeholder' => 'Pesquise um espaço para evento...'));
			    echo $this->Form->button('<i class="glyphicon glyphicon-search"></i>', array('class'=>'btn btn-link search-btn btnTop'));			    
			    echo $this->Form->end();			    
			    ?>
		    </div>
		  </div>
		</div>
	</div>

	<div class="container noticiasMain">
		<?php 
		if(isset($this->params['url']['search']) && $this->params['url']['search'] != '') {  
			echo '<div class="row"><div class="col-md-3">';
			if (isset($cidade)) {	
				echo $this->Html->link('Limpar busca', array('action' => 'site_espacos_eventos', $cidade['Cidade']['id']), array('class'=>'btn btn-info limpar'));
			} else {
				echo $this->Html->link('Limpar busca', array('action' => 'site_espacos_eventos'), array('class'=>'btn btn-info limpar'));
			}
			echo '</div></div>';
			foreach ($espacos as $e) {
				echo '<div class="col-md-3 col-sm-6 divNoticia">';
				echo '<div class="noticia agenda">';
				if ($e['EspacoEvento']['foto_anuncio'] != null) {
					echo $this->Html->link(
						 $this->Html->image($e['EspacoEvento']['foto_anuncio'], array('class' => 'hiding_event', 'width' => '100%', 'height' => '70%')),
						 '../img/'.$e['EspacoEvento']['foto_anuncio'],
						 array('escapeTitle' => false, 'title' => $e['EspacoEvento']['nome'].' - '.$e['EspacoEvento']['descricao'].' - '.$e['EspacoEvento']['localizacao'].' - '.$e['EspacoEvento']['telefone1'].' - '.$e['EspacoEvento']['telefone2'].' - '.$e['EspacoEvento']['site'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
					);
					echo '<h3 class="text-center menor">'.$e['EspacoEvento']['nome'].'</h3>';
					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$e['EspacoEvento']['telefone1'].'</p>';
				} else {
					echo '<div class="config-padding col-md-12 text-center">';
					echo $this->Html->link(
						 $this->Html->image('espaco_evento.png', array('width' => '50%', 'height' => '100%')),
						 '../img/'.'espaco_evento.png',
						 array('escapeTitle' => false, 'title' => $e['EspacoEvento']['nome'].' - '.$e['EspacoEvento']['descricao'].' - '.$e['EspacoEvento']['localizacao'].' - '.$e['EspacoEvento']['telefone1'].' - '.$e['EspacoEvento']['telefone2'].' - '.$e['EspacoEvento']['site'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
					);
					echo '<hr class="config-margin-hr">';
					echo '<h3 class="text-center menor">'.$e['EspacoEvento']['nome'].'</h3>';
					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$e['EspacoEvento']['telefone1'].'</p>';
					echo '</div>';
				}
				echo '</div>';
				echo '</div>';
		  }
		} else {
			foreach ($espacos as $e) {
				echo '<div class="col-md-3 col-sm-6 divNoticia">';
				echo '<div class="noticia agenda">';
				if ($e['EspacoEvento']['foto_anuncio'] != null) {
					echo $this->Html->link(
						 $this->Html->image($e['EspacoEvento']['foto_anuncio'], array('class' => 'hiding_event', 'width' => '100%', 'height' => '70%')),
						 '../img/'.$e['EspacoEvento']['foto_anuncio'],
						 array('escapeTitle' => false, 'title' => $e['EspacoEvento']['nome'].' - '.$e['EspacoEvento']['descricao'].' - '.$e['EspacoEvento']['localizacao'].' - '.$e['EspacoEvento']['telefone1'].' - '.$e['EspacoEvento']['telefone2'].' - '.$e['EspacoEvento']['site'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
					);
					echo '<h3 class="text-center menor">'.$e['EspacoEvento']['nome'].'</h3>';
					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$e['EspacoEvento']['telefone1'].'</p>';
				} else {
					echo '<div class="config-padding col-md-12 text-center">';
					echo $this->Html->link(
						 $this->Html->image('espaco_evento.png', array('width' => '50%', 'height' => '100%')),
						 '../img/'.'espaco_evento.png',
						 array('escapeTitle' => false, 'title' => $e['EspacoEvento']['nome'].' - '.$e['EspacoEvento']['descricao'].' - '.$e['EspacoEvento']['localizacao'].' - '.$e['EspacoEvento']['telefone1'].' - '.$e['EspacoEvento']['telefone2'].' - '.$e['EspacoEvento']['site'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
					);
					echo '<hr class="config-margin-hr">';
					echo '<h3 class="text-center menor">'.$e['EspacoEvento']['nome'].'</h3>';
					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$e['EspacoEvento']['telefone1'].'</p>';
					echo '</div>';
				}
				echo '</div>';
				echo '</div>';
			}
		}
		?>
	</div>
</div>

<?php echo $this->Element('footer'); ?>