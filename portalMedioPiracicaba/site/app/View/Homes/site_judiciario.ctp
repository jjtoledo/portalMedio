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
	  </div>
	</main>

	<?php if (!empty($cidade['Forum']) || !empty($cidade['Juiz']) || !empty($cidade['Promotor'])): ?>
		<section class="subtitle-intro noticias agenda" style="background-color:#e8e8e8">
	    <div class="container noticias responsive-large">
	      <div class="row">
	      	<?php if (!empty($cidade['Forum'])): ?>
		      	<div class="col-md-4">
		      		<div class="thumbnail" style="width: 80%; margin-left: 10%; padding: 10px; background-color: #f6f6f6">
					      <?php echo '<p class="noticiasHome more tiny text-center" style="margin-bottom:5px">Fórum</p>'; ?>
					      <div class="caption">
					      	<?php foreach($cidade['Forum'] as $f):
						        echo '<hr style="margin-top:0"><h4>'.$f['endereco'].'</h4>';
						        $fones = '';
						        if (!empty($f['telefone1'])) {
						        	$fones = $f['telefone1'];
						        }
						        if (!empty($f['telefone2'])) {
						        	$fones = $fones.' / '.$f['telefone2'];
						        }			
						        if (!empty($fones)) {		        
						        	echo '<p>'.$fones.'</p>';
						        }
						      endforeach; ?>
					      </div>
					    </div>		    		
		    		</div>
		    	<?php endif; ?>

		    	<?php if (!empty($cidade['Juiz'])): ?>
		    		<div class="col-md-4">
		    			<div class="thumbnail" style="width: 80%; margin-left: 10%; padding: 10px; background-color: #f6f6f6">
			    			<?php echo '<p class="noticiasHome more tiny text-center" style="margin-bottom:5px">Juízes Atuais</p>'; ?>
			    			<div class="caption">
					      	<?php foreach($cidade['Juiz'] as $f):
						        echo '<hr style="margin-top:0"><h4>'.$f['nome'].'</h4>';
						        if (!empty($f['vara'])) {
						        	echo '<p>Vara: '.$f['vara'].'</p>';
						        }
						        if (!empty($f['tipo_justica'])) {
						        	echo '<p>Justiça: '.$f['tipo_justica'].'</p>';
						        }
						      endforeach; ?>
					      </div>
					    </div>
		    		</div>
		    	<?php endif; ?>

		    	<?php if (!empty($cidade['Promotor'])): ?>
		    		<div class="col-md-4">
		    			<div class="thumbnail" style="width: 80%; margin-left: 10%; padding: 10px; background-color: #f6f6f6">
			    			<?php echo '<p class="noticiasHome more tiny text-center" style="margin-bottom:5px">Promotores Atuais</p>'; ?>
			    			<div class="caption">
					      	<?php foreach($cidade['Promotor'] as $f):
					      		if ($f['ano_termino'] >= date("Y")) {
							        echo '<hr style="margin-top:0"><h4>'.$f['nome'].'</h4>';
							        if (!empty($f['vara'])) {
							        	echo '<p>Vara: '.$f['vara'].'</p>';
							        }
							        if (!empty($f['ano_inicio']) && !empty($f['ano_termino'])) {
							        	echo '<p>Período: '.$f['ano_inicio'].' - '.$f['ano_termino'].'</p>';
							        }
							      }
						      endforeach; ?>
					      </div>
					    </div>
		    		</div>
		    	<?php endif; ?>

	    	</div>	
	    </div>
	  </section>
	<?php endif; ?>

	<?php foreach ($cidade['Promotor'] as $pro) { 
     if ($pro['ano_termino'] < date("Y")) { ?>
			<section class="subtitle-intro noticias agenda" style="background-color:#f6f6f6">
	      <div class="row">      	
      		<?php echo '<h1 class="noticiasHome text-center" style="margin-bottom:30px">Promotores ao longo dos anos</h1>' ?>
	      	<div class="col-md-10 col-md-offset-1">
	      		<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">								
							<tbody>
								<thead>
									<tr>
										<th>Nome</th>
										<th>Vara</th>
										<th>Período</th>
									</tr>
								</thead>
							<?php foreach ($cidade['Promotor'] as $p) {
								if ($p['ano_termino'] < date("Y")) { ?>
									<tr>
										<td width="40%"><?php echo $p['nome'] ?></td>
										<td width="30%"><?php echo $p['vara']; ?>&nbsp;</td>
										<td width="30%"><?php if(!empty($p['ano_inicio']) && !empty($p['ano_termino'])) { echo $f['ano_inicio'].' - '.$f['ano_termino']; } ?>&nbsp;</td>
									</tr>
							<?php	
								}
							} ?>
							</tbody>
						</table>	
	    		</div>
	    	</div>	
		  </section>
		<?php break; } ?>
	<?php } ?>

	<?php echo $this->Element('footer'); ?>
  
</div> 