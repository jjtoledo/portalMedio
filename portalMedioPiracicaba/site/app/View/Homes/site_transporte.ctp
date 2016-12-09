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
	    		echo 		'<h1 class="welcome">Conheça mais sobre o transporte de '.$cidade['Cidade']['nome'].'</h1>';
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
	    		<?php echo '<h1 class="welcome">Conheça mais sobre o transporte de '.$cidade['Cidade']['nome'].'</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	    <div class="item">
	      <?php echo $this->Html->image('img3.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Conheça mais sobre o transporte de '.$cidade['Cidade']['nome'].'</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	    <div class="item">
	      <?php echo $this->Html->image('img4.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Conheça mais sobre o transporte de '.$cidade['Cidade']['nome'].'</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	     <div class="item">
	      <?php echo $this->Html->image('img5.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Conheça mais sobre o transporte de '.$cidade['Cidade']['nome'].'</h1>'; ?>
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