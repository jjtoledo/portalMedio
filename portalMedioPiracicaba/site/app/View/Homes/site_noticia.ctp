<?php echo $this->Element('navigation_secondary'); ?>

<div class="container-fluid text-center">
	<div class='row'>
		<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 divNoticia marginTop">
			<div class="noticia prop large" style="margin-top: 0; margin-bottom: 25px">
				<?php 
						$index = mt_rand(0,count($anuncios_large)-1);
						echo '<a href="'.$anuncios_large[$index]['Parceiro']['site'].'" target="_blank" escape="false">';
						echo $this->Html->image($anuncios_large[$index]['Parceiro']['foto'], array('width' => '100%', 'height' => '100%'));
						echo '</a>'
					?>	
			</div>
		</div>
		
	  <div class='col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1'>
	  	<?php 
	  	echo '<p class="noticiasHome inverse more text-center">'.$noticia['Noticia']['titulo'].'</p>';
	  	?>
	  </div>
	</div>
</div>

<div class="container noticiasMain lessTop responsive-large">
	<div class="row">
		<div class="col-md-9">
			<?php
			echo '<div class="row" style="margin-bottom: 50px">';
				echo '<div class="col-md-5 noticia_foto">';
				echo $this->Html->image($noticia['Noticia']['foto'], array('width' => '100%')); 
			  echo '</div>';
			  echo '<div class="noticiaCorpo">'. $noticia['Noticia']['descricao'];
			  echo '</div>';
		  echo '</div>';

		  if (!empty($noticia['Noticia']['descricao1']) && !empty($noticia['Noticia']['foto1'])) {
		  	echo '<div class="row" style="margin-bottom: 50px">';
			  	echo '<div class="col-md-5 noticia_foto">';
					echo $this->Html->image($noticia['Noticia']['foto1'], array('width' => '100%')); 
				  echo '</div>';
				  echo '<div class="noticiaCorpo">'. $noticia['Noticia']['descricao1'];
				  echo '</div>';
			  echo '</div>';
		  }

		  if (!empty($noticia['Noticia']['descricao2']) && !empty($noticia['Noticia']['foto2'])) {
		  	echo '<div class="row" style="margin-bottom: 50px">';
			  	echo '<div class="col-md-5 noticia_foto">';
					echo $this->Html->image($noticia['Noticia']['foto2'], array('width' => '100%')); 
				  echo '</div>';
				  echo '<div class="noticiaCorpo">'. $noticia['Noticia']['descricao2'];
				  echo '</div>';
			  echo '</div>';
		  }

		  if (!empty($noticia['Noticia']['descricao3']) && !empty($noticia['Noticia']['foto3'])) {
		  	echo '<div class="row" style="margin-bottom: 50px">';
			  	echo '<div class="col-md-5 noticia_foto">';
					echo $this->Html->image($noticia['Noticia']['foto3'], array('width' => '100%')); 
				  echo '</div>';
				  echo '<div class="noticiaCorpo">'. $noticia['Noticia']['descricao3'];
				  echo '</div>';
			  echo '</div>';
		  }
		  ?>
		</div>
		<?php if (!empty($noticias)) { ?>
			<div class="col-md-2 col-md-offset-1 col-xs-12 right jumbotron leiaTb">
	  			<h4 class="blue">Leia também</h4><hr>
	  			<?php $count = 0;
	  			foreach ($noticias as $n) {
	  				if ($count == 5) {
	  					break;
	  				}

	  				echo '<div class="col-md-12">';
						echo 	$this->Html->link($this->Html->image($n['Noticia']['foto'], array('width' => '100%')), array('action' => 'site_noticia', $n['Noticia']['id'], $tipo), array('escape' => false)); 
					  echo 	'<br><br><div>'. $n['Noticia']['titulo'] .'</div><br><br>';
					  echo '</div>';

					  $count++;
	  			}
	  			?>
		  </div>
		<?php } ?>
	</div>
</div>

<?php echo $this->Element('footer'); ?>