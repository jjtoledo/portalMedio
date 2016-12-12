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
	    			echo 		'<h1 class="welcome">Confira os rios de '.$cidade['Cidade']['nome'].'</h1>';
	      	} else {
	      		echo 		'<h1 class="welcome">Confira os rios da região Médio Piracicaba</h1>';
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
	    			echo 		'<h1 class="welcome">Confira os rios de '.$cidade['Cidade']['nome'].'</h1>';
	      	} else {
	      		echo 		'<h1 class="welcome">Confira os rios da região Médio Piracicaba</h1>';
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
	    			echo 		'<h1 class="welcome">Confira os rios de '.$cidade['Cidade']['nome'].'</h1>';
	      	} else {
	      		echo 		'<h1 class="welcome">Confira os rios da região Médio Piracicaba</h1>';
	      	} ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	    <div class="item">
	      <?php echo $this->Html->image('img3.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php if (isset($cidade)) {	      		
	    			echo 		'<h1 class="welcome">Confira os rios de '.$cidade['Cidade']['nome'].'</h1>';
	      	} else {
	      		echo 		'<h1 class="welcome">Confira os rios da região Médio Piracicaba</h1>';
	      	} ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	    <div class="item">
	      <?php echo $this->Html->image('img4.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php if (isset($cidade)) {	      		
	    			echo 		'<h1 class="welcome">Confira os rios de '.$cidade['Cidade']['nome'].'</h1>';
	      	} else {
	      		echo 		'<h1 class="welcome">Confira os rios da região Médio Piracicaba</h1>';
	      	} ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	     <div class="item">
	      <?php echo $this->Html->image('img5.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php if (isset($cidade)) {	      		
	    			echo 		'<h1 class="welcome">Confira os rios de '.$cidade['Cidade']['nome'].'</h1>';
	      	} else {
	      		echo 		'<h1 class="welcome">Confira os rios da região Médio Piracicaba</h1>';
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
			    echo $this->Form->create('Rio', array('type' => 'get', 'class' => 'search-form'));
			    echo $this->Form->input('search', array('label' => false, 'class' => 'form-control', 'placeholder' => 'Pesquise um rio...'));
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
				echo $this->Html->link('Limpar busca', array('action' => 'site_rios', $cidade['Cidade']['id']), array('class'=>'btn btn-info limpar'));
			} else {
				echo $this->Html->link('Limpar busca', array('action' => 'site_rios'), array('class'=>'btn btn-info limpar'));
			}
			echo '</div></div>';
			foreach ($rios as $a) {
				echo '<div class="col-md-3 col-sm-6 divNoticia">';
				echo '<div class="noticia agenda">';
				if ($a['FotoRio'] != null) {
					echo $this->Html->link(
						 $this->Html->image($a['FotoRio']['0']['foto'], array('class' => 'hiding_event', 'width' => '100%', 'height' => '70%')),
						 '../img/'.$a['FotoRio']['0']['foto'],
						 array('escapeTitle' => false, 'title' => $a['Rio']['nome'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
					);
					echo '<h3 class="text-center menor margin">'.$a['Rio']['nome'].'</h3>';
				} else {
					echo '<div class="config-padding col-md-12 text-center">';echo $this->Html->link(
						 $this->Html->image('turismo.png', array('width' => '45%', 'height' => '60%')),
						 '../img/'.'turismo.png',
						array('escapeTitle' => false, 'title' => $a['Rio']['nome'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
					);
					echo '<hr style="margin-top: 30px">';
					echo '<h3 class="text-center menor margin">'.$a['Rio']['nome'].'</h3>';
					echo '</div>';
				}
				echo '</div>';
				echo '</div>';
		  }
		} else {
			foreach ($rios as $a) {
				echo '<div class="col-md-3 col-sm-6 divNoticia">';
				echo '<div class="noticia agenda">';
				if ($a['FotoRio'] != null) {
					echo $this->Html->link(
						 $this->Html->image($a['FotoRio']['0']['foto'], array('class' => 'hiding_event', 'width' => '100%', 'height' => '70%')),
						 '../img/'.$a['FotoRio']['0']['foto'],
						 array('escapeTitle' => false, 'title' => $a['Rio']['nome'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
					);
					echo '<h3 class="text-center menor margin">'.$a['Rio']['nome'].'</h3>';
				} else {
					echo '<div class="config-padding col-md-12 text-center">';echo $this->Html->link(
						 $this->Html->image('turismo.png', array('width' => '45%', 'height' => '60%')),
						 '../img/'.'turismo.png',
						 array('escapeTitle' => false, 'title' => $a['Rio']['nome'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
					);
					echo '<hr style="margin-top: 30px">';
					echo '<h3 class="text-center menor margin">'.$a['Rio']['nome'].'</h3>';
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