<?php echo $this->Element('navigation_secondary'); ?>

<div class="container-fluid text-center">
	<div class='row'>
	  <div class='col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1'>
	  	<?php 
	  	echo '<p class="marginTop noticiasHome inverse more text-center">'.$noticia['Noticia']['titulo'].'</p>';
	  	?>
	  </div>
	</div>
</div>

<div class="container noticiasMain lessTop">
	<div class="row">
		<div class="col-md-9">
			<?php
			echo '<div class="col-md-5 noticia_foto">';
			echo $this->Html->image($noticia['Noticia']['foto'], array('width' => '100%')); 
		  echo '</div>';
		  echo '<div class="noticiaCorpo">'. $noticia['Noticia']['descricao'];
		  echo '</div>';
		  ?>
		</div>
		<div class="col-md-3 col-md-offset-0 col-xs-6 col-xs-offset-3 right jumbotron leiaTb">
  			<h4>Leia também</h4><hr>
  			<?php
  			foreach ($noticias as $n) {
  				echo '<div class="col-md-12">';
					echo 	$this->Html->link($this->Html->image($n['Noticia']['foto'], array('width' => '100%')), array('action' => 'site_noticia', $n['Noticia']['id'], $tipo), array('escape' => false)); 
				  echo 	'<br><br><div>'. $n['Noticia']['titulo'] .'</div><br><br>';
				  echo '</div>';
  			}
  			?>
	  </div>
	</div>
</div>

<?php echo $this->Element('footer'); ?>