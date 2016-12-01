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
	    		echo 		'<h1 class="welcome">Órgãos da Saúde em '.$cidade['Cidade']['nome'].'</h1>';
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
	    		<?php echo '<h1 class="welcome">Órgãos da Saúde em '.$cidade['Cidade']['nome'].'</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	    <div class="item">
	      <?php echo $this->Html->image('img3.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Órgãos da Saúde em '.$cidade['Cidade']['nome'].'</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	    <div class="item">
	      <?php echo $this->Html->image('img4.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Órgãos da Saúde em '.$cidade['Cidade']['nome'].'</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	     <div class="item">
	      <?php echo $this->Html->image('img5.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Órgãos da Saúde em '.$cidade['Cidade']['nome'].'</h1>'; ?>
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
	  	
			<?php if (!empty($cidade['OrgaoSaude'])) { ?>
				<div class="col-md-12 text-center">
					<?php echo '<h1 class="noticiasHome">Órgãos de saúde</h1><br>' ?>			
				</div>

				<?php foreach ($tipos as $t) { ?>
					<div class="col-md-12 text-justify">
		      	<p class="linkNormal" style="margin-top: 20px"><?php echo $t['OrgaoSaude']['tipo'] ?></p>
	  				<hr style="border-top: 1px solid #ddd; margin-top: 10px; margin-bottom: 15px; width: auto">	
						<?php $count = 0; 
	      			foreach ($cidade['OrgaoSaude'] as $orgao) {
	      				if ($count == 4) {
	      					break;
	      				}
	      				if ($t['OrgaoSaude']['tipo'] == $orgao['tipo']) {	      				
		      				echo '<div class="col-md-6" style="margin-bottom: 50px">';
		      				if ($orgao['foto_anuncio'] != null) {
		      					echo '<div class="col-md-6">'.$this->Html->image($orgao['foto_anuncio'], array('width' => '100%', 'height' => '100%')).'</div>';	      					
		      				} else {
		      					echo '<div class="col-md-6 text-center">'.$this->Html->image('saude.png', array('width' => '80%', 'height' => '100%')).'</div>';
		      				}
			      				echo '<div class="col-md-6"><b>'
			    						.$orgao['nome'].'</b><br><br>';
			    						if ($orgao['telefone1'] != '') {
			    							echo 'Telefone Principal: '.$orgao['telefone1'].'<br>';
			    						}
			    						if ($orgao['telefone2'] != '') {
			    							echo 'Telefone: '.$orgao['telefone2'].'<br>';
			    						}
			    						if ($orgao['site'] != '') {
			    							echo 'Site: '.$orgao['site'].'<br>';
			    						}
			    						if ($orgao['localizacao'] != '') {
			    							echo 'Endereço: '.$orgao['localizacao'].'<br>';
			    						}
			    					echo '</div>';
		      				echo '</div>';
		      				$count++;
		      			}		      			
		      		}		      	
		      	?>						
				</div>
			<?php } } ?>
	  </div>
	</main>

	<?php if (!empty($cidade['Medico'])) { ?>
		<section style="background-color: #e6e6e6">
			<div class="container">		  	
				<div class="col-md-12 text-center">
					<?php echo '<h1 class="noticiasHome">Médicos</h1><br><hr style="margin-top:0">' ?>			
				</div>

				<div class="col-md-10 col-md-offset-1">
					<?php foreach ($especialidades as $e) { ?>
						<p class="linkNormal" style="margin-top: 20px"><?php echo $e['Medico']['especialidade'] ?></p>
	  				<hr style="border-top: 1px solid #ddd; margin-top: 10px; margin-bottom: 15px; width: auto">	
						<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">								
							<tbody>
								<thead>
									<tr>
										<th>Nome</th>
										<th>Telefone 1</th>
										<th>Telefone 2</th>
										<th>Endereço</th>
									</tr>
								</thead>
							<?php foreach ($cidade['Medico'] as $m) { 
								if ($m['especialidade'] == $e['Medico']['especialidade']) { ?>
									<tr>
										<td width="30%"><?php echo h($m['nome']); ?>&nbsp;</td>
										<td width="15%"><?php echo h($m['telefone1']); ?>&nbsp;</td>
										<td width="15%"><?php echo h($m['telefone2']); ?>&nbsp;</td>
										<td width="40%"><?php echo h($m['endereco']); ?>&nbsp;</td>
									</tr>
								<?php	} ?>									
							<?php	} ?>
							</tbody>
						</table>	
					<?php	} ?>
			  </div>
		  </div>
		</section>
	<?php } ?>

	<?php echo $this->Element('footer'); ?>
  
</div> 