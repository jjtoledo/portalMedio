<?php 
	echo $this->Element('navigation_secondary'); 
 	echo $this->Element('slideshow'); 
?>
<div class="container-fluid">

	<?php echo $this->Element('cria_menu'); ?>  

	<main style="background-color: #fff">
		<div class="container">
	  	
			<?php if (!empty($cidade['Social'])) { ?>
				<div class="col-md-12 text-center">
					<?php echo '<h1 class="noticiasHome">Assistências Sociais</h1><br><hr style="margin-top:0">' ?>			
				</div>

				<div class="col-md-12">
					<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">								
						<tbody>
							<thead>
								<tr>
									<th>Órgão Assistencial</th>
									<th>Funcionamento</th>
									<th>Detalhes</th>
								</tr>
							</thead>
						<?php foreach ($cidade['Social'] as $o) { ?>
							<tr>
								<td width="15%">
									<?php 
										echo '<div class="thumbnail" style="margin-bottom:0">';
											echo $this->Html->image($o['foto']);
											echo '<div class="caption">';
												echo '<h4>'.$o['nome'].'</h4>';
											echo '</div>';
										echo '</div>';										
									?>&nbsp;
								</td>
								<td width="5%"><?php if(!empty($o['horario_ini']) && !empty($o['horario_fim'])) { echo h($o['horario_ini'].' às '.$o['horario_fim']); } ?>&nbsp;</td>
								<td width="70%"><?php echo $o['descricao']; ?>&nbsp;</td>
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