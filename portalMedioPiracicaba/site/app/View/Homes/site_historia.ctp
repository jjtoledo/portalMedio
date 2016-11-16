<?php echo $this->Element('navigation'); 
			//debug($content);
?>

<div class="container-fluid">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">

	  <!-- Wrapper for slides -->
	  <div class="carousel-inner resolucao" role="listbox">
	  	<?php 
  		if (!empty($fotos)) {
  			$count = 0;
  			$active = '';
		  	foreach ($fotos as $foto) {
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
			<div class="col-md-12 text-center">
				<?php echo '<h1 class="noticiasHome">História de ' . $cidade['Cidade']['nome'] .'</h1><br><hr style="margin-top:0">' ?>			
			</div>

			<div class="col-md-12 text-justify">
				<?php
					echo $cidade['Historia']['historia'];
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
			    	echo '<div class="row">';
      			for ($i=0; $i < 4; $i++) { 
      				if (count($fotos_antigas) == $count) {
      					$count = 0;
      				} ?>
			    			<?php 
			    				echo '<div class="col-sm-6 col-md-3">';
									echo '<div class="thumbnail">';
									echo $this->Html->image($fotos_antigas[$count]['Foto']['foto'], array('class' => ' foto'));								
									echo '</div>';
									echo '</div>';
			    			?>	
		    		<?php $count++; 
		    		}
			    	echo '</div><br>';
					}
				?>
			</div>
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

		<?php 
		if (!empty($cidade['Distrito'])) { ?>
			<section style="background-color: #fff">
				<div class="container">
					<div class="col-md-12 text-center">
						<?php echo '<h1 class="noticiasHome">Distritos</h1><br><hr style="margin-top:0">' ?>			
					</div>

		    	<?php 
		    		foreach ($distritos as $c):		
		    			echo '<div class="col-md-12">';
		    			if (!empty($c['FotoDistrito'])) {
			    			echo '<div class="col-md-2 noticia_foto">';
								echo $this->Html->image($c['FotoDistrito']['0']['foto'], array('width' => '100%')); 
							  echo '</div>';
		    			}
		    			echo '<b>' . $c['Distrito']['nome'] . '</b><br><br>';
		    			echo $c['Distrito']['descricao'] . '<br><br>';
		    			echo '</div>';
 		    		endforeach;
		    	?>
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

		    	<?php 
		    		foreach ($cidade['Simbolo'] as $c):
		    			echo '<div class="row">';
		    			if (!empty($c['imagem'])) {
			    			echo '<div class="col-md-6 noticia_foto">';
								echo $this->Html->image($c['imagem'], array('width' => '100%')); 
							  echo '</div>';
		    			}
		    			echo $c['descricao'];
		    			echo '<hr></div><br><br>';
		    		endforeach;
		    	?>
			  </div>
			</section>
		<?php } ?>

	<?php echo $this->Element('footer'); ?>
  
</div> 