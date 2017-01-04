<?php 
	echo $this->Element('navigation_secondary'); 
 	echo $this->Element('slideshow'); 
?>

<div class="container-fluid">

	<?php echo $this->Element('cria_menu'); ?>  

	<main style="background-color: #fff">
		<div class="container">
			<div class="col-md-10 col-md-offset-1 cresce">
		  	<div class="row">
			  	<p class="linkNormal">Saiba mais</p>
		  		<hr style="border-top: 1px solid #ddd; margin-top: 15px; margin-bottom: 40px; width: auto">	
		  		<?php echo $this->Element('menu_cidade'); ?>
		  	</div>
	  	</div>
	  	
			<?php if (!empty($cidade['Prestador'])) { ?>
				<div class="col-md-12 text-center">
					<?php echo '<h1 class="noticiasHome">Prestadores de Serviços</h1><br><hr style="margin-top:0">' ?>			
				</div>

				<div class="col-md-10 col-md-offset-1">
					<?php foreach ($especialidades as $e) { ?>
						<p class="linkNormal" style="margin-top: 20px"><?php echo $e['Prestador']['especialidade'] ?></p>
	  				<hr style="border-top: 1px solid #ddd; margin-top: 10px; margin-bottom: 15px; width: auto">	
						<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">								
							<tbody>
								<thead>
									<tr>
										<th>Nome</th>
										<th>Telefone</th>
									</tr>
								</thead>
							<?php foreach ($cidade['Prestador'] as $p) { 
								if ($p['especialidade'] == $e['Prestador']['especialidade']) { ?>
									<tr>
										<td width="50%"><?php echo h($p['nome']); if($p['apelido'] != '') echo ' ('.$p['apelido'].')'; ?>&nbsp;</td>
										<td width="50%"><?php echo h($p['telefone1']); if($p['telefone2'] != '') echo ' / '.$p['telefone2']; ?>&nbsp;</td>
									</tr>
								<?php	} ?>									
							<?php	} ?>
							</tbody>
						</table>	
					<?php	} ?>
			  </div>
			<?php } ?>
	  </div>
	</main>

	<?php echo $this->Element('footer'); ?>
  
</div> 