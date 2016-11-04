<?php echo $this->Element('navigation'); 
			//debug($content);
?>

<div class="container-fluid">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">

	  <!-- Wrapper for slides -->
	  <div class="carousel-inner resolucao" role="listbox">
	  	<?php 
  		if (!empty($fotos)) {
  			$count = 0;
  			$active = '';
		  	foreach ($fotos as $foto) {
  				if ($count == 0) {
  					$active = 'active';
  				} else {
  					$active = '';
  				}

  				echo '<div class="item '.$active.'">';
  				echo 	$this->Html->image($foto['Foto']['foto'], array('width' => '2000'));
	      	echo 	'<div class="carousel-caption">';
	    		echo 		'<h1 class="welcome">Seja bem-vindo à '.$cidade['Cidade']['nome'].'</h1>';
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
	    		<?php echo '<h1 class="welcome">Seja bem-vindo à '.$cidade['Cidade']['nome'].'</h1>' ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	    <div class="item">
	      <?php echo $this->Html->image('img3.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Seja bem-vindo à '.$cidade['Cidade']['nome'].'</h1>' ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	    <div class="item">
	      <?php echo $this->Html->image('img4.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Seja bem-vindo à '.$cidade['Cidade']['nome'].'</h1>' ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>

	     <div class="item">
	      <?php echo $this->Html->image('img5.jpg', array('width' => '2000')) ?>
	      <div class="carousel-caption">
	    		<?php echo '<h1 class="welcome">Seja bem-vindo à '.$cidade['Cidade']['nome'].'</h1>' ?>
	    		<div class="arrow bounce"></div>
	    	</div>
	    </div>
	    <?php } ?>
	  </div>
	</div>

	<main style="background-color: #fff">
		<div class="container">
			<div class="row" style="margin-bottom:40px">
		  	<div class="col-md-8 col-md-offset-2">
		  		<?php echo $this->Element('parceiros'); ?> 
		  	</div>
		  	<div class="col-md-8 col-md-offset-2" style="padding: 0">
		  		<hr style="border-top: 1px solid #ddd; margin-top: 40px; margin-bottom: 40px;">
			  	<div class="col-md-6">
			  		<?php
			  		if (strlen($cidade['Historia']['historia']) > 1000) {
			  			echo substr($cidade['Historia']['historia'], 0, 1000) . '...';
			  		} else {
			  			echo substr($cidade['Historia']['historia'], 0, 1000);
			  		}
			  		echo $this->Html->link('&nbsp;&nbsp;&nbsp;&nbsp;Leia mais >>>', array('action' => 'site_historia', $id), array('class' => 'linkNormal', 'escape' => false));
			  		?>
			  	</div>
			  	<div class="col-md-4 col-sm-6 divNoticia text-center">
		    		<div class="noticia agenda top">
		    			<?php 
		    				echo '<a class="noticia_foto" href="../site_evento/'.$id.'/'.$cidade['Evento']['0']['id'].'" escape="false">';
		    				echo $this->Html->image($cidade['Evento']['0']['foto_anuncio'], array('width' => '100%', 'height' => '100%'));
		    				echo '</a>'
		    			?>	
		    		</div><br>
		    		<?php echo $this->Html->link('Eventos&nbsp;&nbsp;<span class="glyphicon glyphicon-calendar"></span>', array('action' => 'site_eventos', $id), array('class' => 'linkNormal', 'escape' => false)) ?>
		    	</div>
			  </div>
			</div>
		  <div class="col-md-8 col-md-offset-2" style="padding: 0">
		  	<p class="linkNormal">Saiba mais</p>
	  		<hr style="border-top: 1px solid #ddd; margin-top: 15px; margin-bottom: 40px;">	
	  		<?php echo $this->Element('menu_cidade'); ?>
	  	</div>
	  </div>
	 </main>

  <section class="subtitle-intro noticias">
    <div class="container">
    	<h1 class="noticiasHome text-center">Notícias Gerais</h1>
      <div class="row border">
      	<div class="col-lg-9 left">
      		<?php $count = 0; 
      			for ($i=0; $i < 6; $i++) { 
      				if (count($noticias_gerais) == $count) {
      					$count = 0;
      				}
      		?>	
		    	<div class="col-lg-4 col-md-6 col-sm-6 divNoticia">
		    		<div class="noticia">
		    			<?php 
		    				echo '<a class="noticia_foto" href="'.$noticias_gerais[$count]['Noticia']['link'].'" target="_blank" escape="false">';
		    				echo $this->Html->image($noticias_gerais[$count]['Noticia']['foto'], array('width' => '100%', 'height' => '70%'));
		    				echo '<p class="noticia_title">'.$noticias_gerais[$count]['Noticia']['titulo'].'</p>';
		    				echo '</a>'
		    			?>	
		    		</div><br>
		    	</div>
	    	<?php $count++; } ?>
      	</div>
      	<div class="col-lg-3 right">
      		<div class="col-lg-12 col-lg-offset-0 col-md-8 col-md-offset-2 divNoticia p">
		    		<div class="noticia prop">
		    			<?php 
		    				echo '<a href="'.$anuncios_quad['0']['Parceiro']['site'].'" target="_blank" escape="false">';
		    				echo $this->Html->image($anuncios_quad['0']['Parceiro']['foto'], array('width' => '100%', 'height' => '100%'));
		    				echo '</a>'
		    			?>
		    		</div><br>
		    	</div>	
      	</div>
	    </div>
    </div>
  </section>

	<?php echo $this->Element('footer'); ?>
  
</div> 