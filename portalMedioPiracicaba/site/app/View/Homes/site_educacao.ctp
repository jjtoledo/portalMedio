<?php 
	echo $this->Element('navigation_secondary'); 
 	echo $this->Element('slideshow'); 
?>

<div class="container-fluid">

	<?php echo $this->Element('cria_menu'); ?>  

	<main style="background-color: #fff">
		<div class="container">
	  	
			<?php 
			if (!empty($cidade['Escola'])) { ?>
				<div class="col-md-12">
					<div class="col-md-12 text-center">
						<?php echo '<h1 class="noticiasHome">Escolas e Faculdades</h1><br><hr style="margin-top:0">' ?>			
					</div>

					<?php for ($i=0; $i < count($tipos); $i++): $count = 0; $b = 0; ?>
						<div class="col-md-12">
							<div class="panel panel-info" id="panel1">
			          <?php echo '<div class="panel-heading" data-toggle="collapse" data-target="#collapse'.$i.'">' ?>
			            <?php echo '<h4 class="panel-title"><a class="panel-escola" data-toggle="collapse" data-target="#collapse'.$i.'" class="collapsed">'.$tipos[$i].'</a>' ?>
			            	<span class="glyphicon glyphicon-sort pull-right escola"></span>
			            </h4>
			          </div>

			          <?php echo '<div id="collapse'.$i.'" class="panel-collapse collapse fade">' ?>
			            <div class="panel-body">
			              <?php foreach ($cidade['Escola'] as $escola) {			              	
				              if ($escola['tipo'] == $i) {
				              	if ($count < 2) {
				              		echo '<div class="col-md-6" style="margin-top: 10px">';
				              	} else {
					      					echo '<div class="col-md-6" style="margin-top: 50px">';
					      				}
					      				if ($escola['foto_anuncio'] != null) {
					      					echo '<div class="col-md-4">'.$this->Html->image($escola['foto_anuncio'], array('width' => '100%', 'height' => '100%')).'</div>';
					      				} else {
						      				echo '<div class="col-md-4">'.$this->Html->image('escola-img.png', array('width' => '80%', 'height' => '100%')).'</div>';
						      			}
						      				echo '<div class="col-md-8"><b>'
						    						.$escola['nome'].'</b><br><br>';
						    						if ($escola['telefone1'] != '') {
						    							echo 'Telefone: '.$escola['telefone1'];
						    						}
						    						if ($escola['telefone2'] != '') {
						    							echo ' / '.$escola['telefone2'];
						    						}
						    						if ($escola['site'] != '') {
						    							echo '<br>Site: '.$escola['site'];
						    						}
						    						if ($escola['localizacao'] != '') {
						    							echo '<br>Endereço: '.$escola['localizacao'];
						    						}	    						
						    						if ($escola['descricao'] != '' && $escola['localizacao'] == '') {
						    							echo '<p class="text-justify">'.$escola['descricao'].'<br></p>';
						    						} else if ($escola['descricao'] != '' && $escola['localizacao'] != '') {
						    							echo '<br><br><p class="text-justify">'.$escola['descricao'].'<br></p>';
						    						}
						    					echo '</div>';
				      					echo '</div>';      					

				      					$b++;
						      			$count++;
				              }
			              }
			              ?>
			            </div>
			          </div>
			        </div>
			      </div>
			    <?php endfor; ?>
	      </div>
        <?php } ?>
	  </div>
	</main>

	<?php echo $this->Element('footer'); ?>
  
</div> 