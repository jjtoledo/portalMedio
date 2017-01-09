<?php 
	echo $this->Element('navigation_secondary'); 
 	echo $this->Element('slideshow'); 
?>

<div class="container-fluid">

	<?php echo $this->Element('cria_menu'); ?>    		

	<main style="background-color: #fff">
		<div class="container">
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
			    	echo '<div class="row">';
      			for ($i=0; $i < 4; $i++) { 
      				if (count($fotos_antigas) == $count) {
      					$count = 0;
      				}
	    				echo '<div class="col-sm-6 col-md-3">';
							echo '<div class="thumbnail">';
							echo $this->Html->link(
										 $this->Html->image($fotos_antigas[$count]['Foto']['foto'], array('class' => 'class_img foto')),
										 '../img/'.$fotos_antigas[$count]['Foto']['foto'],
										 array('escapeTitle' => false, 'title' => $fotos_antigas[$count]['Foto']['descricao'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
									);
							echo '</div>';
							echo '</div>';
	    			  $count++; 
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

		<?php 
		if (!empty($personagens)) { ?>
			<section style="background-color: #e6e6e6">
				<div class="container">
					<div class="col-md-12 text-center">
						<?php echo '<h1 class="noticiasHome">Personagens Históricos</h1><br><hr style="margin-top:0">' ?>			
					</div>

		    	<div class="col-md-12">;
		    	<?php $count = 0; $b = 0; 
		    		foreach ($personagens as $c):
	      			echo '<div class="row">';
			    			echo '<div class="col-md-12" style="margin-bottom: 50px">';
				    			if (!empty($c['Pessoa']['foto'])) {
					    			echo '<div class="col-md-4 noticia_foto">';
										echo $this->Html->image($c['Pessoa']['foto'], array('width' => '100%')); 
									  echo '</div>';
				    				echo '<div class="col-md-8 text-justify">';
				    			} else {
				    				echo '<div class="col-md-12 text-justify">';
				    			}
				    			echo '<p class="linkNormal">'.$c['Pessoa']['titulo'].'</p>';
				    			echo $c['Pessoa']['detalhes'];
									echo '</div>';	
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

		<?php 
		if (!empty($personalidades)) { ?>
			<section style="background-color: #e6e6e6">
				<div class="container">
					<div class="col-md-12 text-center">
						<?php echo '<h1 class="noticiasHome">Personalidades da Cidade</h1><br><hr style="margin-top:0">' ?>			
					</div>

		    	<div class="col-md-12">;
		    	<?php $count = 0; $b = 0; 
		    		foreach ($personalidades as $c):
	      			echo '<div class="row">';
			    			echo '<div class="col-md-12" style="margin-bottom: 50px">';
				    			if (!empty($c['Pessoa']['foto'])) {
					    			echo '<div class="col-md-4 noticia_foto">';
										echo $this->Html->image($c['Pessoa']['foto'], array('width' => '100%')); 
									  echo '</div>';
				    				echo '<div class="col-md-8 text-justify">';
				    			} else {
				    				echo '<div class="col-md-12 text-justify">';
				    			}
				    			echo '<p class="linkNormal">'.$c['Pessoa']['titulo'].'</p>';
				    			echo $c['Pessoa']['detalhes'];
									echo '</div>';	
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

		<?php 
		if (!empty($curiosidades)) { ?>
			<section style="background-color: #e6e6e6">
				<div class="container">
					<div class="col-md-12 text-center">
						<?php echo '<h1 class="noticiasHome">Curiosidades</h1><br><hr style="margin-top:0">' ?>			
					</div>

		    	<div class="col-md-12">;
		    	<?php $count = 0; $b = 0; 
		    		foreach ($curiosidades as $c):
	      			echo '<div class="row">';
			    			echo '<div class="col-md-12" style="margin-bottom: 50px">';
				    			if (!empty($c['Pessoa']['foto'])) {
					    			echo '<div class="col-md-4 noticia_foto">';
										echo $this->Html->image($c['Pessoa']['foto'], array('width' => '100%')); 
									  echo '</div>';
				    				echo '<div class="col-md-8 text-justify">';
				    			} else {
				    				echo '<div class="col-md-12 text-justify">';
				    			}
				    			echo '<p class="linkNormal">'.$c['Pessoa']['titulo'].'</p>';
				    			echo $c['Pessoa']['detalhes'];
									echo '</div>';	
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