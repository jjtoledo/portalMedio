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
	    		echo 		'<h1 class="welcome">Órgãos Públicos de '.$cidade['Cidade']['nome'].'</h1>';
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
	    		<?php echo '<h1 class="welcome">Órgãos Públicos de '.$cidade['Cidade']['nome'].'</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	    <div class="item">
	      <?php echo $this->Html->image('img3.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Órgãos Públicos de '.$cidade['Cidade']['nome'].'</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	    <div class="item">
	      <?php echo $this->Html->image('img4.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Órgãos Públicos de '.$cidade['Cidade']['nome'].'</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	     <div class="item">
	      <?php echo $this->Html->image('img5.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Órgãos Públicos de '.$cidade['Cidade']['nome'].'</h1>'; ?>
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
	  	
			<?php if (!empty($cidade['OrgaoPublico'])) { ?>
				<div class="col-md-12 text-center">
					<?php echo '<h1 class="noticiasHome">Órgãos Públicos</h1><br><hr style="margin-top:0">' ?>			
				</div>

				<div class="col-md-12">
					<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">								
						<tbody>
							<thead>
								<tr>
									<th>Nome</th>
									<th>Telefone</th>
									<th>Funcionamento</th>
									<th>Site</th>
									<th>Endereço</th>
								</tr>
							</thead>
						<?php foreach ($cidade['OrgaoPublico'] as $o) { ?>
							<tr>
								<td width="30%"><?php echo h($o['nome']); ?>&nbsp;</td>
								<td width="17%"><?php echo h($o['telefone1']); ?>&nbsp;</td>
								<td width="10%"><?php if(!empty($o['horario_ini']) && !empty($o['horario_fim'])) { echo h($o['horario_ini'].' às '.$o['horario_fim']); } ?>&nbsp;</td>
								<td width="15%"><?php echo h($o['site']); ?>&nbsp;</td>
								<td width="28%"><?php echo h($o['localizacao']); ?>&nbsp;</td>
							</tr>
						<?php	} ?>
						</tbody>
					</table>	
			  </div>
			<?php } ?>
	  </div>
	</main>

	<?php 
		if (!empty($cidade['EspacoEvento'])) { ?>
			<section class="subtitle-intro noticias agenda" style="background-color:#e6e6e6">
		    <div class="container noticias responsive-large">
		      <div class="container-fluid text-center">
		    		<?php echo $this->Html->link('Espaços para Eventos&nbsp;&nbsp;<span class="glyphicon glyphicon-map-marker bigger"></span>', array('action' => 'site_espacos_eventos', $id), array('escape' => false, 'class' => 'noticiasHome more text-center')); ?>      
		    	</div>
		      <div class="row border">
		      	<?php $count = 0; 
		      			for ($i=0; $i < 4; $i++) { 		      				
		      				if (count($cidade['EspacoEvento']) == $count) {
		      					$count = 0;
		      				}
		      		?>
				    	<div class="col-md-3 col-sm-6 divNoticia">
				    		<div class="noticia agenda">
				    			<?php 
				    				echo '<a class="noticia_foto" href="#'./*$eventos[$count]['Evento']['link'].*/'" escape="false">';
				    				if ($cidade['EspacoEvento'][$count]['foto_anuncio'] != null) {
					    				echo $this->Html->image($cidade['EspacoEvento'][$count]['foto_anuncio'], array('class' => 'hiding_event', 'width' => '100%', 'height' => '70%'));
				    				} else {
				    					echo '<div class="config-padding col-md-12 text-center">';
				    					echo $this->Html->image('evento.png', array('width' => '40%', 'height' => '50%'));
				    					echo '<hr class="config-margin-hr">';
				    					echo '</div>';
				    				}
				    					echo '<h3 class="text-center menor">'.$cidade['EspacoEvento'][$count]['nome'].'</h3>';
				    					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$cidade['EspacoEvento'][$count]['telefone1'].'</p>';
				    				echo '</a>'
				    			?>	
				    		</div><br>
				    	</div>
			    	<?php $count++; } ?>						
			    </div>    				    
		    </div>
		  </section>
	<?php	}	?>

	<?php echo $this->Element('footer'); ?>
  
</div> 