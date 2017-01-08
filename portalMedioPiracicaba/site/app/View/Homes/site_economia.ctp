<?php 
	echo $this->Element('navigation_secondary'); 
 	echo $this->Element('slideshow'); 
?>
<div class="container-fluid">

	<?php echo $this->Element('cria_menu'); ?>  

	<main style="background-color: #fff">
		<div class="container">
	  	
			<?php if (!empty($cidade['Economia'])) { ?>
				<div class="col-md-12 text-center">
					<?php echo '<h1 class="noticiasHome">Economia de ' . $cidade['Cidade']['nome'] .'</h1><br><hr style="margin-top:0; margin-bottom: 10px">' ?>			
				</div>

				<div class="col-md-12 text-justify">
					<?php foreach ($cidade['Economia'] as $economia) {
						echo '<h3 class="linkNormal" style="margin-top:10px; padding-left:15px; color: #54A9B2">'.$economia['subtitulo'].'</h3>';
						echo $economia['descricao'];
					} ?>
				</div>
			<?php } ?>
	  </div>
	</main>

	<?php 
		if (!empty($cidade['Receita'])) { ?>
			<section style="background-color: #fff" id="receitas">
				<div class="container">
					<div class="col-md-12 text-center">
						<?php echo '<h1 class="noticiasHome">Receitas Municipais</h1><br><hr style="margin-top:0">' ?>			
					</div>

					<div class="col-md-12">
						<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th nowrap><?php echo 'Ano' ?></th>
									<th nowrap><?php echo 'ICMS' ?></th>
									<th nowrap><?php echo 'IPI' ?></th>
									<th nowrap><?php echo 'IPVA' ?></th>
									<th nowrap><?php echo 'IPTU' ?></th>
									<th nowrap><?php echo 'Outras *' ?></th>
									<th nowrap><?php echo 'Total' ?></th>
								</tr>
							</thead>
							<tbody>
							<?php 
							$receita = $cidade['Receita'];
							foreach ($receita as $r) { 
								$fpm        = str_replace(",", "", substr($r['fpm'], 3));
								$royalties  = str_replace(",", "", substr($r['royalties'], 3));
								$itr        = str_replace(",", "", substr($r['itr'], 3));
								$cide       = str_replace(",", "", substr($r['cide'], 3));
								$fundeb     = str_replace(",", "", substr($r['fundeb'], 3));
								$lei_kandir = str_replace(",", "", substr($r['lei_kandir'], 3));
								$fex        = str_replace(",", "", substr($r['fex'], 3));
								$afm_afe    = str_replace(",", "", substr($r['afm_afe'], 3));
								$iss        = str_replace(",", "", substr($r['iss'], 3));
								$irrf       = str_replace(",", "", substr($r['irrf'], 3));
								
								$outras = $fpm + $royalties + $itr + $cide + $fundeb + $lei_kandir + $fex + $afm_afe + $iss + $irrf; 
								$outras = number_format($outras, 2, ',', '.');

								$outras = 'R$ ' . $outras; 
							?>
								<tr>
									<td nowrap><?php echo h($r['ano']); ?>&nbsp;</td>
									<td nowrap><?php echo h($r['icms']); ?>&nbsp;</td>
									<td nowrap><?php echo h($r['ipi']); ?>&nbsp;</td>
									<td nowrap><?php echo h($r['ipva']); ?>&nbsp;</td>
									<td nowrap><?php echo h($r['iptu']); ?>&nbsp;</td>
									<td nowrap><?php echo h($outras); ?>&nbsp;</td>
									<td nowrap><?php echo h($r['total']); ?>&nbsp;</td>
								</tr>
							<?php 
							} ?>
							</tbody>
						</table>
						<b><i style="font-size: 12px">* Outras = FPM, Royalties, ITR, CIDE, Fundeb, Lei Kandir, FEX, AFM/AFE, ISS</i></b>
					</div>
			  </div>
			</section>
		<?php } ?>

	<?php 
		if (!empty($cidade['Empresa'])) { ?>
			<section class="subtitle-intro noticias agenda" style="background-color:#e6e6e6">
		    <div class="container noticias responsive-large">
		      <div class="container-fluid text-center">
		    		<?php echo '<h1 class="noticiasHome more text-center">Principais Empresas</h1>'; ?>      
		    	</div>
		      <div class="row border">
		      	<div class="col-md-12">
		      	<?php $count = 0; $b = 0;
	      			for ($i=0; $i < count($cidade['Empresa']); $i++) { 		      				
	      				
	      				if ($b == 2) {	
		      				$b = 0;	      				
		      				echo '</div>';
		      			}
		      			if ($count % 2 == 0) {	
		      				echo '<div class="row">';
		      			}

	      				echo '<div class="col-md-6" style="margin-bottom: 50px">';
	      				if ($cidade['Empresa'][$count]['foto_anuncio'] != null) {
	      					echo '<div class="col-md-6">'.$this->Html->link(
										 $this->Html->image($cidade['Empresa'][$count]['foto_anuncio'], array('class' => 'class_img hiding_event', 'width' => '100%', 'height' => '70%')),
										 '../img/'.$cidade['Empresa'][$count]['foto_anuncio'],
										 array('escapeTitle' => false, 'title' => $cidade['Empresa'][$count]['nome'].' - '.$cidade['Empresa'][$count]['historico'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
									).'</div>';	      					
	      				} else {
	      					echo '<div class="col-md-6 text-center">'.$this->Html->link(
										 $this->Html->image('espaco_evento.png', array('width' => '80%', 'height' => '100%')),
										 '../img/'.'espaco_evento.png',
										 array('escapeTitle' => false, 'title' => $cidade['Empresa'][$count]['nome'].' - '.$cidade['Empresa'][$count]['historico'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
									).'</div>';
	      				}
		      				echo '<div class="col-md-6"><b>'
		    						.$cidade['Empresa'][$count]['nome'].'</b><br><br>'
		    						.'Telefone Principal: '.$cidade['Empresa'][$count]['telefone1'].'<br>';
		    						if ($cidade['Empresa'][$count]['telefone2'] != '') {
		    							echo 'Telefone: '.$cidade['Empresa'][$count]['telefone2'].'<br>';
		    						}
		    						if ($cidade['Empresa'][$count]['horario_ini'] != null && $cidade['Empresa'][$count]['horario_fim'] != null) {
		    							echo 'Funcionamento: '.$cidade['Empresa'][$count]['horario_ini'].' às '. $cidade['Empresa'][$count]['horario_fim'].'<br>';
		    						}
		    						if ($cidade['Empresa'][$count]['site'] != '') {
		    							echo 'Site: '.$cidade['Empresa'][$count]['site'].'<br>';
		    						}
		    						if ($cidade['Empresa'][$count]['localizacao'] != '') {
		    							echo 'Endereço: '.$cidade['Empresa'][$count]['localizacao'].'<br>';
		    						}
		    					echo '</div>';
	      				echo '</div>';
	      		?>
				    	
			    	<?php $count++; $b++; if($count == 20) { break; } } ?>	
			    	</div>					
			    </div>
		    </div>
		  </section>
	<?php	}	?>

	<?php echo $this->Element('footer'); ?>
  
</div> 