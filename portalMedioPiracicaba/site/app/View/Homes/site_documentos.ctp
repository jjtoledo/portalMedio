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
	    		echo 		'<h1 class="welcome">Veja locais de retirada de documentos em '.$cidade['Cidade']['nome'].'</h1>';
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
	    		<?php echo '<h1 class="welcome">Veja locais de retirada de documentos em '.$cidade['Cidade']['nome'].'</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	    <div class="item">
	      <?php echo $this->Html->image('img3.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Veja locais de retirada de documentos em '.$cidade['Cidade']['nome'].'</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	    <div class="item">
	      <?php echo $this->Html->image('img4.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Veja locais de retirada de documentos em '.$cidade['Cidade']['nome'].'</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	     <div class="item">
	      <?php echo $this->Html->image('img5.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Veja locais de retirada de documentos em '.$cidade['Cidade']['nome'].'</h1>'; ?>
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
		if (!empty($cidade['Documento'])) { ?>
			<section class="subtitle-intro noticias agenda" style="background-color:#e6e6e6">
		    <div class="container noticias responsive-large">
		      <div class="container-fluid text-center">
		    		<?php echo '<p class="noticiasHome more text-center">Solicitação de Documentos</p>'; ?>      
		    	</div>
		      <div class="row border">
		      	<div class="col-md-12">
		      	<?php $count = 0; $b = 0; foreach ($cidade['Documento'] as $doc) {
		      			if ($b == 2) {	
		      				$b = 0;	      				
		      				echo '</div>';
		      			}
		      			if ($count % 2 == 0) {	
		      				echo '<div class="row">';
		      			}
	      				echo '<div class="col-md-6" style="margin-bottom: 50px">';
	      					if ($doc['foto_anuncio'] != null) {
	      						echo '<div class="col-md-4">'.$this->Html->image($doc['foto_anuncio'], array('width' => '100%', 'height' => '100%')).'</div>';
	      					} else {
		      					echo '<div class="col-md-4">'.$this->Html->image('docs.png', array('width' => '100%', 'height' => '100%')).'</div>';
		      				}
		      				
		      				echo '<div class="col-md-8"><b>'
		    						.$doc['tipo_documento'].' '.$doc['nome'].'</b><br><br>';
		    						if ($doc['telefone1'] != '') {
		    							echo 'Telefone: '.$doc['telefone1'];
		    						}
		    						if ($doc['telefone2'] != '') {
		    							echo ' / '.$doc['telefone2'];
		    						}
		    						if ($doc['horario_ini'] != null && $doc['horario_fim'] != null) {
		    							echo '<br>Funcionamento: '.$doc['horario_ini'].' às '. $doc['horario_fim'];
		    						}
		    						if ($doc['email'] != '') {
		    							echo '<br>Email: '.$doc['email'];
		    						}
		    						if ($doc['localizacao'] != '') {
		    							echo '<br>Endereço: '.$doc['localizacao'];
		    						}	
		    						if ($doc['descricao'] != '' && $doc['localizacao'] == '') {
		    							echo '<p class="text-justify">'.$doc['descricao'].'<br></p>';
		    						} else if ($doc['descricao'] != '' && $doc['localizacao'] != '') {
		    							echo '<br><br><p class="text-justify">'.$doc['descricao'].'<br></p>';
		    						}    	
		    					echo '</div>';
      					echo '</div>';      					

      					$b++;
		      			$count++;
	      	 	} ?>	
			    	</div>					
			    </div>
		    </div>
		  </section>
	<?php	}	?>

	<?php echo $this->Element('footer'); ?>
  
</div> 