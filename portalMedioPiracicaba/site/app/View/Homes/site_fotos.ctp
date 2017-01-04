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

	<?php
		echo '<section id="scroll_foto" style="background-color: #f6f6f6">';
			echo '<div class="container">';
				echo '<ul class="nav nav-tabs nav-justified" style="margin-bottom:30px">';
					if ($tipo == 2) {
				  	echo '<li class="active foto_tab"><a href="#">Fotos Atuais</a></li>';
				  	echo '<li class="foto_tab">'.$this->Html->link('Fotos Aéreas', array('action' => 'site_fotos', $cidade['Cidade']['id'], 3))
				  	.'</li>';
				  	echo '<li class="foto_tab">'.$this->Html->link('Fotos Antigas', array('action' => 'site_fotos', $cidade['Cidade']['id'], 1))
				  	.'</li>';
					} else	if ($tipo == 3) {
						echo '<li class="foto_tab">'.$this->Html->link('Fotos Atuais', array('action' => 'site_fotos', $cidade['Cidade']['id'], 2))
				  	.'</li>';
						echo '<li class="active foto_tab"><a href="#">Fotos Aéreas</a></li>';	
						echo '<li class="foto_tab">'.$this->Html->link('Fotos Antigas', array('action' => 'site_fotos', $cidade['Cidade']['id'], 1))
				  	.'</li>';
					} else {
						echo '<li class="foto_tab">'.$this->Html->link('Fotos Atuais', array('action' => 'site_fotos', $cidade['Cidade']['id'], 2))
				  	.'</li>';
				  	echo '<li class="foto_tab">'.$this->Html->link('Fotos Aéreas', array('action' => 'site_fotos', $cidade['Cidade']['id'], 3))
				  	.'</li>';
				  	echo '<li class="active foto_tab"><a href="#">Fotos Antigas</a></li>';
					}
				echo '</ul>';

				foreach ($fotos as $f) {
					echo '<div class="col-sm-6 col-md-3">';
					echo '<div class="thumbnail">';
					echo $this->Html->link(
						 $this->Html->image($f['Foto']['foto'], array('class' => 'class_img foto')),
						 '../img/'.$f['Foto']['foto'],
						 array('escapeTitle' => false, 'title' => $f['Foto']['descricao'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
					);
					echo '</div>';
					echo '</div>';
				}
			echo '</div>';
		echo '</section>';
	?>

	<?php echo $this->Element('footer'); ?>
  
</div> 
