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
			    echo $this->Form->create('Evento', array('type' => 'get', 'class' => 'search-form'));
			    echo $this->Form->input('search', array('label' => false, 'class' => 'form-control', 'placeholder' => 'Pesquise um evento...'));
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
				if (isset($tipo)) {					
					echo $this->Html->link('Limpar busca', array('action' => 'site_agenda', $cidade['Cidade']['id'], $tipo), array('class'=>'btn btn-info limpar'));
				} else {
					echo $this->Html->link('Limpar busca', array('action' => 'site_agenda', $cidade['Cidade']['id']), array('class'=>'btn btn-info limpar'));
				}
			} else {
				echo $this->Html->link('Limpar busca', array('action' => 'site_agenda'), array('class'=>'btn btn-info limpar'));
			}
			echo '</div></div>';
			foreach ($eventos as $e) {
				echo '<div class="col-md-3 col-sm-6 divNoticia">';
				echo '<div class="noticia agenda">';
				if ($e['Evento']['foto_anuncio'] != null) {
					echo $this->Html->link(
						 $this->Html->image($e['Evento']['foto_anuncio'], array('class' => 'class_img hiding_event', 'width' => '100%', 'height' => '70%')),
						 '../img/'.$e['Evento']['foto_anuncio'],
						 array('escapeTitle' => false, 'title' => $e['Evento']['titulo'].' - '.$e['Evento']['data'].' - '.$e['Evento']['horario'].' - '.$e['Evento']['local'].' - '.$e['Evento']['descricao'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
					);
					echo '<h3 class="text-center menor">'.$e['Evento']['titulo'].'</h3>';
					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$e['Evento']['data']. ' - ' .$e['Evento']['horario'].'</p>';
				} else if ($e['FotoEvento'] != null) {
					echo $this->Html->link(
						 $this->Html->image($e['FotoEvento']['0']['foto'], array('class' => 'class_img hiding_event', 'width' => '100%', 'height' => '70%')),
						 '../img/'.$e['FotoEvento']['0']['foto'],
						 array('escapeTitle' => false, 'title' => $e['Evento']['titulo'].' - '.$e['Evento']['data'].' - '.$e['Evento']['horario'].' - '.$e['Evento']['local'].' - '.$e['Evento']['descricao'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
					);
					echo '<h3 class="text-center menor">'.$e['Evento']['titulo'].'</h3>';
					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$e['Evento']['data']. ' - ' .$e['Evento']['horario'].'</p>';
				} else {
					echo '<div class="config-padding col-md-12 text-center">';
					echo $this->Html->link(
						 $this->Html->image('evento.png', array('class' => 'class_img hiding_event', 'width' => '40%', 'height' => '50%')),
						 '../img/'.'evento.png',
						 array('escapeTitle' => false, 'title' => $e['Evento']['titulo'].' - '.$e['Evento']['data'].' - '.$e['Evento']['horario'].' - '.$e['Evento']['local'].' - '.$e['Evento']['descricao'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
					);
					echo '<hr class="config-margin-hr">';
					echo '<h3 class="text-center menor">'.$e['Evento']['titulo'].'</h3>';
					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$e['Evento']['data']. ' - ' .$eventos['0']['Evento']['horario'].'</p>';
					echo '</div>';
				}
				echo '</div>';
				echo '</div>';
		  }
		} else {
			foreach ($eventos as $e) {
				echo '<div class="col-md-3 col-sm-6 divNoticia">';
				echo '<div class="noticia agenda">';
				if ($e['Evento']['foto_anuncio'] != null) {
					echo $this->Html->link(
						 $this->Html->image($e['Evento']['foto_anuncio'], array('class' => 'class_img hiding_event', 'width' => '100%', 'height' => '70%')),
						 '../img/'.$e['Evento']['foto_anuncio'],
						 array('escapeTitle' => false, 'title' => $e['Evento']['titulo'].' - '.$e['Evento']['data'].' - '.$e['Evento']['horario'].' - '.$e['Evento']['local'].' - '.$e['Evento']['descricao'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
					);
					echo '<h3 class="text-center menor">'.$e['Evento']['titulo'].'</h3>';
					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$e['Evento']['data']. ' - ' .$e['Evento']['horario'].'</p>';
				} else if ($e['FotoEvento'] != null) {
					echo $this->Html->link(
						 $this->Html->image($e['FotoEvento']['0']['foto'], array('class' => 'class_img hiding_event', 'width' => '100%', 'height' => '70%')),
						 '../img/'.$e['FotoEvento']['0']['foto'],
						 array('escapeTitle' => false, 'title' => $e['Evento']['titulo'].' - '.$e['Evento']['data'].' - '.$e['Evento']['horario'].' - '.$e['Evento']['local'].' - '.$e['Evento']['descricao'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
					);
					echo '<h3 class="text-center menor">'.$e['Evento']['titulo'].'</h3>';
					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$e['Evento']['data']. ' - ' .$e['Evento']['horario'].'</p>';
				} else {
					echo '<div class="config-padding col-md-12 text-center">';
					echo $this->Html->link(
						 $this->Html->image('evento.png', array('class' => 'class_img hiding_event', 'width' => '40%', 'height' => '50%')),
						 '../img/'.'evento.png',
						 array('escapeTitle' => false, 'title' => $e['Evento']['titulo'].' - '.$e['Evento']['data'].' - '.$e['Evento']['horario'].' - '.$e['Evento']['local'].' - '.$e['Evento']['descricao'], 'data-lightbox'=> 'roadtrip', 'class' => 'class_url')
					);
					echo '<hr class="config-margin-hr">';
					echo '<h3 class="text-center menor">'.$e['Evento']['titulo'].'</h3>';
					echo '<p class="text-center menor_detalhe" style="color: #51A8B1">'.$e['Evento']['data']. ' - ' .$eventos['0']['Evento']['horario'].'</p>';
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