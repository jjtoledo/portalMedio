<?php 
	echo $this->Element('navigation_secondary'); 
 	echo $this->Element('slideshow'); 
?>

<div class="container-fluid">
	
	<?php echo $this->Element('cria_menu'); ?>  

	<?php if (!empty($empresas)) { ?>
		<section style="background-color: #f6f6f6">
			<?php foreach ($empresas as $e) { ?>
				<div class="container">
					<div class="col-md-12">
						<div class="col-md-12 text-center">
							<?php echo '<h1 class="noticiasHome">'.$e['EmpresaOnibus']['nome'].'</h1><br><hr style="margin-top:0">' ?>			
						</div>

						<div class="col-md-12">
							<div class="panel panel-info" id="panel1">
			          <?php echo '<div class="panel-heading" data-toggle="collapse" data-target="#collapse'.$e['EmpresaOnibus']['id'].'">' ?>
			            <?php echo '<h4 class="panel-title"><a class="panel-escola" data-toggle="collapse" data-target="#collapse'.$e['EmpresaOnibus']['id'].'" class="collapsed">Horários</a>' ?>
			            	<span class="glyphicon glyphicon-sort pull-right escola"></span>
			            </h4>
			          </div>

			          <?php echo '<div id="collapse'.$e['EmpresaOnibus']['id'].'" class="panel-collapse collapse fade">' ?>
			            <div class="panel-body">
			            	<?php if(!empty($e['OnibusRota'])) { ?>
				              <?php foreach ($e['OnibusRota'] as $rota) {			              	
					              echo '<div class="col-lg-2 col-sm-4 col-xs-6">';
												echo $this->Html->link('<span class="glyphicon glyphicon-plus-time"></span> ' . $rota['linha'], '/files/'.$rota['pdf'], array('target' => '_blank', 'class' => 'listMenu', 'escape' => false));
												echo '</div>';
				              }
				            } else if(!empty($e['Horario'])) {
				            	echo $e['Horario']['texto'];
				            }
			              ?>
			            </div>
			          </div>
			        </div>							
			      </div>
		      </div>
	      </div>
			<?php } ?>
		</section>
	<?php } ?>

	<?php echo $this->Element('footer'); ?>
  
</div> 