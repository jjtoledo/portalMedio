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
	    		echo 		'<h1 class="welcome">Conheça mais sobre a história de '.$cidade['Cidade']['nome'].'</h1>';
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
	    		<?php echo '<h1 class="welcome">Conheça mais sobre a história de '.$cidade['Cidade']['nome'].'</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	    <div class="item">
	      <?php echo $this->Html->image('img3.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Conheça mais sobre a história de '.$cidade['Cidade']['nome'].'</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	    <div class="item">
	      <?php echo $this->Html->image('img4.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Conheça mais sobre a história de '.$cidade['Cidade']['nome'].'</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	     <div class="item">
	      <?php echo $this->Html->image('img5.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Conheça mais sobre a história de '.$cidade['Cidade']['nome'].'</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>
	    <?php } ?>
	  </div>
	</div>

	<main style="background-color: #fff">
		<div class="container">
			<div class="col-md-10 cresce" style="margin-left: 8.7%">
		  	<div class="row">
			  	<p class="linkNormal">Saiba mais</p>
		  		<hr style="border-top: 1px solid #ddd; margin-top: 15px; margin-bottom: 40px; width: auto">	
		  		<?php echo $this->Element('menu_cidade'); ?>
		  	</div>
	  	</div>
	  	
			<div class="col-md-12 text-center">
				<?php echo '<h1 class="noticiasHome">História de ' . $cidade['Cidade']['nome'] .'</h1><br><hr style="margin-top:0">' ?>			
			</div>

			<div class="col-md-12 text-justify">
				<?php
					if (!empty($cidade['Historia']['foto'])) {
						echo '<div class="col-md-3 noticia_foto">';
						echo $this->Html->image($cidade['Historia']['foto'], array('width' => '100%')); 
					  echo '</div>';
					}
				  echo '<div class="noticiaCorpo">'.$cidade['Historia']['historia'];
					echo '<p><b>Adoção do nome: </b>' . $cidade['Historia']['adocao_nome'] . '</p>';
					echo '<br><p><b>Emancipação: </b>' . $cidade['Historia']['emancipacao'] . '</p>';
					echo '<br><p><b>Adjetivo pátrio: </b>' . $cidade['Historia']['adjetivo_patrio'] . '</p>';

					if (!empty($cidade['Denominacao'])) {
						echo '<br><p><b>Denominações anteriores: </b>';
						for ($i=0; $i < count($cidade['Denominacao']); $i++) { 
							if ($i == count($cidade['Denominacao'])-1) {
								echo $cidade['Denominacao'][$i]['denominacao'] . '.';
							} else {
								echo $cidade['Denominacao'][$i]['denominacao'] . ', ';
							}
						}
					}

					echo '<hr>';
					if (!empty($fotos_antigas)) {
						$count = 0; 
						$slide = 1; 
			    	echo '<div class="row">';
      			for ($i=0; $i < 4; $i++) { 
      				if (count($fotos_antigas) == $count) {
      					$count = 0;
      				}
	    				echo '<div class="col-sm-6 col-md-3">';
							echo '<div class="thumbnail">';
							echo $this->Html->image($fotos_antigas[$count]['Foto']['foto'], array('class' => ' foto', 'onclick' => 'openModal();currentSlide('.$slide.')'));								
							echo '</div>';
							echo '</div>';
	    			  $count++; 
	    			  $slide++;
		    		}
			    	echo '</div><br>';
					}
				?>
			</div>

			<?php if (!empty($fotos_antigas)) { ?>
			<div id="myModal" class="modal">
			  <span class="close cursor" onclick="closeModal()">&times;</span>
			  <div class="modal-content">

			  	<?php			  		
						$count = 0; 
						$slide = 1; 
      			for ($i=0; $i < 4; $i++) { 
      				if (count($fotos_antigas) == $count) {
      					$count = 0;
      				}
	    				echo '<div class="mySlides">';
							echo '<div class="numbertext">'.$slide.' / 4</div>';
							echo $this->Html->image($fotos_antigas[$count]['Foto']['foto'], array('width' => '100%'));								
							echo '</div>';
	    			  $count++;
	    			  $slide++; 
		    		}
					?>
			    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
			    <a class="next" onclick="plusSlides(1)">&#10095;</a>

			    <div class="caption-container">
			      <p id="caption"></p>
			    </div>

			    <?php			  		
						$count = 0;
						$slide = 1; 
      			for ($i=0; $i < 4; $i++) { 
      				if (count($fotos_antigas) == $count) {
      					$count = 0;
      				}							
	    				echo '<div class="col-md-3">';
							echo '<div class="numbertext">'.$slide.' / 4</div>';
							echo $this->Html->image($fotos_antigas[$count]['Foto']['foto'], array('width' => '100%', 'class' => 'demo', 'onclick' => 'openModal();currentSlide('.$slide.')'));								
							echo '</div>';
	    			  $count++; 
	    			  $slide++;
		    		}
					?>
			  </div>
			</div>
			<?php } ?>
	  </div>
	</main>

	<?php 
		if (!empty($cidade['Fundador'])) { ?>
			<section style="background-color: #e6e6e6">
				<div class="container">
					<div class="col-md-12 text-center">
						<?php echo '<h1 class="noticiasHome">Fundadores</h1><br><hr style="margin-top:0">' ?>			
					</div>

					<?php for ($i=0; $i < count($cidade['Fundador']); $i++) { ?>
						<div class="col-md-12 text-justify">
							<?php
							if (!empty($cidade['Fundador'][$i]['foto'])) {								
								echo '<div class="col-md-3 noticia_foto">';
								echo $this->Html->image($cidade['Fundador'][$i]['foto'], array('width' => '100%')); 
							  echo '</div>';
							}
							echo '<h3 class="linkNormal" style="margin-top:0; padding-left:15px; color: #54A9B2">'.$cidade['Fundador'][$i]['nome'].'</h3>';
						  echo '<div class="noticiaCorpo">'.$cidade['Fundador'][$i]['biografia'];
						  echo '</div><hr>';
							?>
						</div>
					<?php } ?>
			  </div>
			</section>
		<?php } ?>

		<?php if(!empty($cidade['Bairro'])) { ?>
			<section style="background-color: #fff">
				<div class="container">
					<div class="col-md-8 col-md-offset-2 cresce" style="margin-bottom: 50px">
				  	<div class="row">
					  	<p class="linkNormal">Bairros</p>
				  		<hr style="border-top: 1px solid #ddd; margin-top: 15px; margin-bottom: 40px; width: auto">	
				    	<?php 
				    		$bairro = $cidade['Bairro'];
				    		foreach ($bairro as $b):
				    			echo '<div class="col-lg-4 col-sm-6 col-xs-12">';
				    			echo '<a href="#" class="listMenu">
				    							<span class="glyphicon glyphicon-map-marker"></span> ' . $b['nome'] . '
				    						</a><br>';
				    			echo '</div>';
				    		endforeach;
				    	?>
				    </div> 
				  </div>
				</div>
			</section>
		<?php } ?>

		<?php 
		if (!empty($cidade['Simbolo'])) { ?>
			<section style="background-color: #e6e6e6">
				<div class="container">
					<div class="col-md-12 text-center">
						<?php echo '<h1 class="noticiasHome">Símbolos Municipais</h1><br><hr style="margin-top:0">' ?>			
					</div>

		    	<div class="col-md-12">;
		    	<?php $count = 0; $b = 0; 
		    		foreach ($cidade['Simbolo'] as $c):
		    			if ($b == 2) {	
		      				$b = 0;	      				
		      				echo '</div>';
		      			}
	      			
	      			if ($count % 2 == 0) {	
	      				echo '<div class="row">';
	      			}
		    			
		    			echo '<div class="col-md-6" style="margin-bottom: 50px">';
			    			if (!empty($c['imagem'])) {
				    			echo '<div class="col-md-4 noticia_foto">';
									echo $this->Html->image($c['imagem'], array('width' => '100%')); 
								  echo '</div>';
			    				echo '<div class="col-md-8 text-justify">';
			    			} else {
			    				echo '<div class="col-md-12 text-justify">';
			    			}
			    			echo $c['descricao'];
								echo '</div>';	
							echo '</div>';
							$b++;
		      		$count++;	    			
		    		endforeach;
		    	?>
		    	</div>
			  </div>
			</section>
		<?php } ?>

	<?php echo $this->Element('footer'); ?>
  
</div> 