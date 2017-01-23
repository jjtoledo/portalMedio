<?php 
	echo $this->Element('navigation_secondary'); 
 	echo $this->Element('slideshow'); 
?>

<div class="container-fluid">
	<?php echo $this->Element('cria_menu'); ?> 

		<?php 
		if (!empty($artistas)) { ?>
			<section style="background-color: #e6e6e6">
				<div class="container">
					<div class="col-md-12 text-center">
						<?php echo '<h1 class="noticiasHome">Artistas</h1><br><hr style="margin-top:0">' ?>			
					</div>

		    	<div class="col-md-12">;
		    	<?php $count = 0; $b = 0; 
		    		foreach ($artistas as $c):
	      			echo '<div class="row">';		    			
			    			echo '<div class="col-md-12" style="margin-bottom: 50px">';
				    			if (!empty($c['Pessoa']['foto'])) {
					    			echo '<div class="col-md-3 noticia_foto">';
										echo $this->Html->image($c['Pessoa']['foto'], array('width' => '100%')); 
									  echo '</div>';
				    				echo '<div class="col-md-9 text-justify">';
				    			} else {
				    				echo '<div class="col-md-12 text-justify">';
				    			}
				    			echo '<p class="linkNormal">'.$c['Pessoa']['titulo'].'</p>';
				    			echo $c['Pessoa']['detalhes'];
									echo '</div>';	
								echo '</div>';
							echo '</div>';
			      	$count++;	    			
		    		endforeach;
		    	?>
		    	</div>
			  </div>
			</section>
		<?php } ?>

		<?php echo $this->Element('footer'); ?>
  
</div> 
