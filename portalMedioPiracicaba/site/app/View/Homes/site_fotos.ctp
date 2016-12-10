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
	    		echo 		'<h1 class="welcome">Conheça mais sobre '.$cidade['Cidade']['nome'].' com nossas fotos incríveis</h1>';
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
	    		<?php echo '<h1 class="welcome">Conheça mais sobre '.$cidade['Cidade']['nome'].' com nossas fotos incríveis</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	    <div class="item">
	      <?php echo $this->Html->image('img3.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Conheça mais sobre '.$cidade['Cidade']['nome'].' com nossas fotos incríveis</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	    <div class="item">
	      <?php echo $this->Html->image('img4.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Conheça mais sobre '.$cidade['Cidade']['nome'].' com nossas fotos incríveis</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	     <div class="item">
	      <?php echo $this->Html->image('img5.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Conheça mais sobre '.$cidade['Cidade']['nome'].' com nossas fotos incríveis</h1>'; ?>
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
	  </div>
	</main>

	<?php
		echo '<section id="scroll_foto" style="background-color: #f6f6f6">';
			echo '<div class="container">';
				echo '<ul class="nav nav-tabs nav-justified" style="margin-bottom:30px">';
					if ($tipo == 2) {
				  	echo '<li class="active foto_tab"><a href="#">Fotos Atuais</a></li>';
				  	echo '<li class="foto_tab">'.$this->Html->link('Fotos Aéreas', array('action' => 'site_fotos', $cidade['Cidade']['id'], 3))
				  	.'</li>';
				  	echo '<li class="foto_tab">'.$this->Html->link('Fotos Antigas', array('action' => 'site_fotos', $cidade['Cidade']['id'], 1))
				  	.'</li>';
					} else	if ($tipo == 3) {
						echo '<li class="foto_tab">'.$this->Html->link('Fotos Atuais', array('action' => 'site_fotos', $cidade['Cidade']['id'], 2))
				  	.'</li>';
						echo '<li class="active foto_tab"><a href="#">Fotos Aéreas</a></li>';	
						echo '<li class="foto_tab">'.$this->Html->link('Fotos Antigas', array('action' => 'site_fotos', $cidade['Cidade']['id'], 1))
				  	.'</li>';
					} else {
						echo '<li class="foto_tab">'.$this->Html->link('Fotos Atuais', array('action' => 'site_fotos', $cidade['Cidade']['id'], 2))
				  	.'</li>';
				  	echo '<li class="foto_tab">'.$this->Html->link('Fotos Aéreas', array('action' => 'site_fotos', $cidade['Cidade']['id'], 3))
				  	.'</li>';
				  	echo '<li class="active foto_tab"><a href="#">Fotos Antigas</a></li>';
					}
				echo '</ul>';

				foreach ($fotos as $f) {
					echo '<div class="col-sm-6 col-md-3">';
					echo '<div class="thumbnail">';
					echo $this->Html->link(
						 $this->Html->image($f['Foto']['foto'], array('class' => 'class_img foto')),
						 '../img/'.$f['Foto']['foto'],
						 array('escapeTitle' => false, 'title' => $f['Foto']['descricao'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
					);
					echo '</div>';
					echo '</div>';
				}
			echo '</div>';
		echo '</section>';
	?>

	<?php echo $this->Element('footer'); ?>
  
</div> 

<script type="text/javascript">
	$('html, body').animate({
	    scrollTop: $("#scroll_foto").offset().top
	}, 2000);
</script>