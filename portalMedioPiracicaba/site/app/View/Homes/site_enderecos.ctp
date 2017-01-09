<?php 
	echo $this->Element('navigation_secondary'); 
 	echo $this->Element('slideshow'); 
?>

<div class="container-fluid">

	<?php echo $this->Element('cria_menu'); ?>  

	<?php if(!empty($cidade['Bairro'])) { ?>
		<section style="background-color: #fff">
			<div class="container">
				<div class="col-md-10 col-md-offset-1 cresce" style="margin-bottom: -20px">
			  	<div class="row">
				  	<div class="col-md-12 text-center">
							<?php echo '<h1 class="noticiasHome">Bairros</h1><br><hr style="margin-top:0">' ?>			
						</div>
			  		<hr style="border-top: 1px solid #ddd; margin-top: 15px; margin-bottom: 40px; width: auto">	
			    	<?php 
			    		$bairro = $cidade['Bairro'];
			    		foreach ($bairro as $b):
			    			echo '<div class="col-lg-3 col-sm-6 col-xs-12">';
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

	<main style="background-color: #e6e6e6">
		<div class="container">
	  	
			<?php 
			if (!empty($cidade['Endereco'])) { ?>
				<div class="col-md-12 text-center">
					<?php echo '<h1 class="noticiasHome">Endereços e CEPs da cidade</h1><br><hr style="margin-top:0">' ?>			
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