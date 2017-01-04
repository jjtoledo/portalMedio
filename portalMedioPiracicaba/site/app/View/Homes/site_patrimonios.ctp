<?php 
	echo $this->Element('navigation_secondary'); 
 	echo $this->Element('slideshow'); 
?>

<div class="container-fluid">

	<div class="container-fluid text-center">
		<div class='row'>
		  <div class='col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1'>
		    <div class='search-box'>
		    	<?php
			    echo $this->Form->create('Patrmonio', array('type' => 'get', 'class' => 'search-form'));
			    echo $this->Form->input('search', array('label' => false, 'class' => 'form-control', 'placeholder' => 'Pesquise um patrimônio...'));
			    echo $this->Form->button('<i class="glyphicon glyphicon-search"></i>', array('class'=>'btn btn-link search-btn btnTop'));			    
			    echo $this->Form->end();			    
			    ?>
		    </div>
		  </div>
		</div>
	</div>

	<div class="container noticiasMain">
		<?php 
		if(isset($this->params['url']['search']) && $this->params['url']['search'] != '') {  
			echo '<div class="row"><div class="col-md-3">';
			if (isset($cidade)) {	
				echo $this->Html->link('Limpar busca', array('action' => 'site_patrimonios', $cidade['Cidade']['id']), array('class'=>'btn btn-info limpar'));
			} else {
				echo $this->Html->link('Limpar busca', array('action' => 'site_patrimonios'), array('class'=>'btn btn-info limpar'));
			}
			echo '</div></div>';
			foreach ($patrimonios as $p) {
				echo '<div class="col-md-3 col-sm-6 divNoticia">';
				echo '<div class="noticia agenda">';
				if ($p['Patrimonio']['foto'] != null) {
					echo $this->Html->link(
						 $this->Html->image($p['Patrimonio']['foto'], array('class' => 'hiding_event', 'width' => '100%', 'height' => '70%')),
						 '../img/'.$p['Patrimonio']['foto'],
						 array('escapeTitle' => false, 'title' => $p['Patrimonio']['nome'].' - '.$p['Patrimonio']['ano'].' - '.$p['Patrimonio']['descricao'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
					);
					echo '<h3 class="text-center menor">'.$p['Patrimonio']['nome'].'</h3>';
					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$p['Patrimonio']['ano'].'</p>';
				} else {
					echo '<div class="config-padding col-md-12 text-center">';echo $this->Html->link(
						 $this->Html->image('cristo-icon.png', array('width' => '45%', 'height' => '60%')),
						 '../img/'.'cristo-icon.png',
						 array('escapeTitle' => false, 'title' => $p['Patrimonio']['nome'].' - '.$p['Patrimonio']['ano'].' - '.$p['Patrimonio']['descricao'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
					);
					echo '<hr style="margin-top: 30px">';
					echo '<h3 class="text-center menor">'.$p['Patrimonio']['nome'].'</h3>';
					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$p['Patrimonio']['ano'].'</p>';
					echo '</div>';
				}
				echo '</div>';
				echo '</div>';
		  }
		} else {
			foreach ($patrimonios as $p) {
				echo '<div class="col-md-3 col-sm-6 divNoticia">';
				echo '<div class="noticia agenda">';
				if ($p['Patrimonio']['foto'] != null) {
					echo $this->Html->link(
						 $this->Html->image($p['Patrimonio']['foto'], array('class' => 'hiding_event', 'width' => '100%', 'height' => '70%')),
						 '../img/'.$p['Patrimonio']['foto'],
						 array('escapeTitle' => false, 'title' => $p['Patrimonio']['nome'].' - '.$p['Patrimonio']['ano'].' - '.$p['Patrimonio']['descricao'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
					);
					echo '<h3 class="text-center menor">'.$p['Patrimonio']['nome'].'</h3>';
					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$p['Patrimonio']['ano'].'</p>';
				} else {
					echo '<div class="config-padding col-md-12 text-center">';echo $this->Html->link(
						 $this->Html->image('cristo-icon.png', array('width' => '45%', 'height' => '60%')),
						 '../img/'.'cristo-icon.png',
						 array('escapeTitle' => false, 'title' => $p['Patrimonio']['nome'].' - '.$p['Patrimonio']['ano'].' - '.$p['Patrimonio']['descricao'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
					);
					echo '<hr style="margin-top: 30px">';
					echo '<h3 class="text-center menor">'.$p['Patrimonio']['nome'].'</h3>';
					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$p['Patrimonio']['ano'].'</p>';
					echo '</div>';
				}
				echo '</div>';
				echo '</div>';
			}
		}
		?>
	</div>
</div>

<?php echo $this->Element('footer'); ?>