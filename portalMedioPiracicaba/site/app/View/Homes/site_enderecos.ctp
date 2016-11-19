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
	    		echo 		'<h1 class="welcome">Descubra endereços úteis em '.$cidade['Cidade']['nome'].'</h1>';
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
	    		<?php echo '<h1 class="welcome">Descubra endereços úteis em '.$cidade['Cidade']['nome'].'</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	    <div class="item">
	      <?php echo $this->Html->image('img3.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Descubra endereços úteis em '.$cidade['Cidade']['nome'].'</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	    <div class="item">
	      <?php echo $this->Html->image('img4.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Descubra endereços úteis em '.$cidade['Cidade']['nome'].'</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	     <div class="item">
	      <?php echo $this->Html->image('img5.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Descubra endereços úteis em '.$cidade['Cidade']['nome'].'</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>
	    <?php } ?>
	  </div>
	</div>

	<main style="background-color: #fff">
		<div class="container">
			<div class="col-md-8 col-md-offset-2 cresce">
		  	<div class="row">
			  	<p class="linkNormal">Saiba mais</p>
		  		<hr style="border-top: 1px solid #ddd; margin-top: 15px; margin-bottom: 40px; width: auto">	
		  		<?php echo $this->Element('menu_cidade'); ?>
		  	</div>
	  	</div>
	  	
			<?php 
			if (!empty($cidade['Endereco'])) { ?>
				<div class="col-md-12 text-center">
					<?php echo '<h1 class="noticiasHome">Endereços Úteis</h1><br><hr style="margin-top:0">' ?>			
				</div>

				<div class="col-md-8 col-md-offset-2">
					<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">								
						<tbody>
							<thead>
								<tr>
									<th>Rua</th>
									<th>Bairro</th>
									<th>CEP</th>
								</tr>
							</thead>
						<?php foreach ($cidade['Endereco'] as $e) { ?>
							<tr>
								<td width="50%"><?php echo h($e['rua']); ?>&nbsp;</td>
								<td width="30%"><?php echo h($e['bairro']); ?>&nbsp;</td>
								<td width="20%"><?php echo h($e['cep']); ?>&nbsp;</td>
							</tr>
						<?php	} ?>
						</tbody>
					</table>	
			  </div>
			<?php } ?>
	  </div>
	</main>

	<?php echo $this->Element('footer'); ?>
  
</div> 