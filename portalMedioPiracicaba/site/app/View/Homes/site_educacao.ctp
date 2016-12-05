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
	    		echo 		'<h1 class="welcome">Conheça mais sobre a educação de '.$cidade['Cidade']['nome'].'</h1>';
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
	    		<?php echo '<h1 class="welcome">Conheça mais sobre a educação de '.$cidade['Cidade']['nome'].'</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	    <div class="item">
	      <?php echo $this->Html->image('img3.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Conheça mais sobre a educação de '.$cidade['Cidade']['nome'].'</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	    <div class="item">
	      <?php echo $this->Html->image('img4.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Conheça mais sobre a educação de '.$cidade['Cidade']['nome'].'</h1>'; ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	     <div class="item">
	      <?php echo $this->Html->image('img5.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Conheça mais sobre a educação de '.$cidade['Cidade']['nome'].'</h1>'; ?>
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
						      				echo '<div class="col-md-4">'.$this->Html->image('escola-img.png', array('width' => '100%', 'height' => '100%')).'</div>';
						      				
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