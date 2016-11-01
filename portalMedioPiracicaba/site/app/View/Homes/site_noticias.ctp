<?php echo $this->Element('navigation_secondary'); ?>

<div class="container-fluid text-center">
	<div class='row'>
	  <div class='col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1'>
	  	<?php 
	  	if ($tipo == 2) {
	  		echo '<p class="marginTop noticiasHome more text-center">Confira as principais notícias da região</p>';
	  	} else {
	  		echo '<p class="marginTop noticiasHome more text-center">Confira nossas boas notícias</p>';
	  	}
	  	?>
	  	
	    <div class='search-box'>
	    	<?php
		    echo $this->Form->create('Noticia', array('type' => 'get', 'class' => 'search-form'));
		    echo $this->Form->input('search', array('label' => false, 'class' => 'form-control', 'placeholder' => 'Pesquise uma notícia...'));
		    echo $this->Form->button('<i class="glyphicon glyphicon-search"></i>', array('class'=>'btn btn-link search-btn btnTop'));
		    echo $this->Form->end();
		    ?>
	    </div>
	  </div>
	</div>
</div>

<div class="container noticiasMain">
	<?php 
	if(isset($this->params['url']['search']) && $this->params['url']['search'] != ''){  
		foreach ($noticias as $noticia) {
			echo '<div class="col-lg-4 col-md-6 col-sm-6 divNoticia">';
    	echo 	'<div class="noticia">';
    	echo 		'<a class="noticia_foto" href="../site_noticia/'.$noticia['Noticia']['id'].'/'. $tipo .'" escape="false">';
    	echo 			$this->Html->image($noticia['Noticia']['foto'], array('width' => '100%', 'height' => '70%'));
    	echo 			'<p class="noticia_title">'.$noticia['Noticia']['titulo'].'</p>';
    	echo 		'</a>';
    	echo 	'</div><br>';
    	echo '</div>';   
	  }
	} else {
		$count = 0;
		foreach ($noticias as $noticia) {
	    $count++;
			if ($count <= 2) {
				echo '<div class="col-lg-6 col-md-6 col-sm-6 divNoticia">';
	    	echo 	'<div class="noticia bigNoticia">';
	    	echo 		'<a class="noticia_foto" href="../site_noticia/'.$noticia['Noticia']['id'].'/'. $tipo .'" escape="false">';
	    	echo 			$this->Html->image($noticia['Noticia']['foto'], array('width' => '100%', 'height' => '80%'));
	    	echo 			'<p class="noticia_title bigTitle">'.$noticia['Noticia']['titulo'].'</p>';
	    	echo 		'</a>';
	    	echo 	'</div><br>';
	    	echo '</div>';

	    	/*if ($count == 2) {
	    		echo '<div class="col-md-12"><hr style="margin-top:-50px; border-top:1px solid #ddd"></div>';
	    	}*/
			} else {

				echo '<div class="col-lg-4 col-md-6 col-sm-6 divNoticia">';
	    	echo 	'<div class="noticia">';
	    	echo 		'<a class="noticia_foto" href="../site_noticia/'.$noticia['Noticia']['id'].'/'. $tipo .'" escape="false">';
	    	echo 			$this->Html->image($noticia['Noticia']['foto'], array('width' => '100%', 'height' => '70%'));
	    	echo 			'<p class="noticia_title">'.$noticia['Noticia']['titulo'].'</p>';
	    	echo 		'</a>';
	    	echo 	'</div><br>';
	    	echo '</div>';
	    }
		}
	}
	?>
</div>

<?php echo $this->Element('footer'); ?>