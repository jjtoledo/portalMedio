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
	    		echo 		'<h1 class="welcome">Poder Executivo de '.$cidade['Cidade']['nome'].'</h1>';
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
	    		<?php echo '<h1 class="welcome">Poder Executivo de '.$cidade['Cidade']['nome'].'</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	    <div class="item">
	      <?php echo $this->Html->image('img3.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Poder Executivo de '.$cidade['Cidade']['nome'].'</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	    <div class="item">
	      <?php echo $this->Html->image('img4.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Poder Executivo de '.$cidade['Cidade']['nome'].'</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	     <div class="item">
	      <?php echo $this->Html->image('img5.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Poder Executivo de '.$cidade['Cidade']['nome'].'</h1>'; ?>
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

	<?php if (!empty($cidade['Prefeitura'])) { ?>
		<section style="background-color: #e8e8e8">
			<div class="container">
				<div class="col-md-12 text-center">
						<?php echo '<h1 class="noticiasHome">Prefeitura de ' . $cidade['Cidade']['nome'] .'</h1><br><hr style="margin-top:0">' ?>			
					</div>

				<div class="col-md-12 text-justify">
					<?php
						if (!empty($cidade['Prefeitura']['foto'])) {
							echo '<div class="col-md-3 noticia_foto">';
							echo $this->Html->image($cidade['Prefeitura']['foto'], array('width' => '100%')); 
						  echo '</div>';
						}

						if (!empty($cidade['Prefeitura']['descricao'])) {
					  	echo '<div class="">'.$cidade['Prefeitura']['descricao'];
					  }

					  if (!empty($cidade['Prefeitura']['endereco'])) {
							echo '<br><br><p><b>Endereço: </b>' . $cidade['Prefeitura']['endereco'] . '</p>';
					  }

					  if (!empty($cidade['Prefeitura']['telefone1'])) {
					  	echo '<p><b>Telefone: </b>' . $cidade['Prefeitura']['telefone1'] . '</p>';
					  }

					  if (!empty($cidade['Prefeitura']['telefone2'])) {
					  	echo '<p><b>Telefone: </b>' . $cidade['Prefeitura']['telefone2'] . '</p>';
					  }
					?>
					</div>
				</div>
			</div>
		</section>
	<?php } ?>

	<?php if (!empty($prefeito)) { ?>
		<section style="background-color: #fff">
			<div class="container">
				<div class="col-md-12 text-center">
					<?php echo '<h1 class="noticiasHome">Prefeito atual</h1><br><hr style="margin-top:0">' ?>			
				</div>

				<div class="col-md-6 col-md-offset-3 text-justify">
					<?php
						echo '<div class="col-md-12" style="margin-bottom: 50px">';
    					if (!empty($prefeito['0']['FotoPolitico'])) {
    						echo '<div class="col-md-12">'.$this->Html->image(end($prefeito['0']['FotoPolitico'])['foto'], array('width' => '100%', 'height' => '100%')).'</div>';
    					} else {
      					echo '<div class="col-md-12">'.$this->Html->image('politico-icon.png', array('width' => '65%', 'height' => '100%')).'</div>';
      				}
      				
      				echo '<div class="col-md-12 text-center" style="font-size:20px"><br><b>'
    						.$prefeito['0']['Politico']['nome'].'</b><br><br>';
    						if (!empty($prefeito['0']['Mandato'])) {
    							echo '<b>Mandatos:</b><br>';
    							foreach ($prefeito['0']['Mandato'] as $mandato) {
    								echo $mandato['ano_inicio'].' - '.$mandato['ano_termino'].'<br>';
    							}
    						} 
    					echo '</div>';
  					echo '</div>';
	      	?>	
				</div>
			</div>
		</section>
	<?php } ?>

	<?php if (!empty($prefeitos)) { ?>
		<section style="background-color: #e6e6e6">
			<div class="container">
				<div class="col-md-12 text-center">
					<?php echo '<h1 class="noticiasHome">Prefeitos ao longo dos anos</h1><br><hr style="margin-top:0">' ?>			
				</div>

				<div class="col-md-12 text-justify">
					<?php $count = 0; $b = 0; foreach ($prefeitos as $p) {
						if ($b == 3) {	
      				$b = 0;	      				
      				echo '</div>';
      			}
      			if ($count % 3 == 0) {	
      				echo '<div class="row">';
      			}
    				echo '<div class="col-md-4" style="margin-top: 20px">';
    					if (!empty($p['FotoPolitico'])) {
    						echo '<div class="col-md-6">'.$this->Html->image(end($p['FotoPolitico'])['foto'], array('width' => '100%', 'height' => '100%')).'</div>';
    					} else {
      					echo '<div class="col-md-6">'.$this->Html->image('politico-icon.png', array('width' => '65%', 'height' => '100%')).'</div>';
      				}
      				
      				echo '<div class="col-md-6"><b>'
    						.$p['Politico']['nome'].'</b><br><br>';
    						if (!empty($p['Mandato'])) {
    							echo '<b>Mandatos:</b><br>';
    							foreach ($p['Mandato'] as $mandato) {
    								echo $mandato['ano_inicio'].' - '.$mandato['ano_termino'].'<br>';
    							}
    						} 
    					echo '</div>';
  					echo '</div>';      					

  					$b++;
      			$count++;
	      	} ?>	
				</div>
			</div>
		</section>
	<?php } ?>

	<?php if (!empty($cidade['Lei'])) { ?>
		<section style="background-color: #fff">
			<div class="container">
				<div class="col-md-12 text-center">
					<?php echo '<h1 class="noticiasHome">Leis</h1><br><hr style="margin-top:0">' ?>			
				</div>

				<div class="col-md-12">
					<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th width="15%" nowrap><?php echo 'Nome' ?></th>
								<th width="20%" nowrap><?php echo 'Referência' ?></th>
								<th width="50%" nowrap><?php echo 'Descrição' ?></th>
								<th width="15%" nowrap><?php echo 'Site' ?></th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($cidade['Lei'] as $r) { ?>
							<tr>
								<td nowrap><?php echo h($r['nome']); ?>&nbsp;</td>
								<td nowrap><?php echo h($r['referencia']); ?>&nbsp;</td>
								<td nowrap><?php echo h($r['descricao']); ?>&nbsp;</td>
								<td nowrap><?php echo h($r['site']); ?>&nbsp;</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</section>
	<?php } ?>

	<?php echo $this->Element('footer'); ?>
  
</div> 