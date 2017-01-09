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
	    		echo 		'<h1 class="welcome">Assista os incríveis vídeos de '.$cidade['Cidade']['nome'].' com nossas fotos incríveis</h1>';
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
	    		<?php echo '<h1 class="welcome">Assista os incríveis vídeos de '.$cidade['Cidade']['nome'].' com nossas fotos incríveis</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	    <div class="item">
	      <?php echo $this->Html->image('img3.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Assista os incríveis vídeos de '.$cidade['Cidade']['nome'].' com nossas fotos incríveis</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	    <div class="item">
	      <?php echo $this->Html->image('img4.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Assista os incríveis vídeos de '.$cidade['Cidade']['nome'].' com nossas fotos incríveis</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	     <div class="item">
	      <?php echo $this->Html->image('img5.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Assista os incríveis vídeos de '.$cidade['Cidade']['nome'].' com nossas fotos incríveis</h1>'; ?>
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