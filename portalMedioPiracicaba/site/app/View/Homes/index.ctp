<?php echo $this->Element('navigation'); 
			//debug($content);
?>

<div class="container-fluid">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">

	  <!-- Wrapper for slides -->
	  <div class="carousel-inner resolucao" role="listbox">
	    <div class="item active">
	      <img src="img/img2.jpg" alt="site" width="2000">
	    </div>

	    <div class="item">
	      <img src="img/img3.jpg" alt="site" width="2000">
	    </div>

	    <div class="item">
	      <img src="img/img4.jpg" alt="site" width="2000">
	    </div>

	     <div class="item">
	      <img src="img/img5.jpg" alt="site" width="2000">
	    </div>
	  </div>
	</div>
</div> 

<main>

  <div class="container col-lg-8 col-lg-offset-2" id="cidades">
  	
  	<?php echo $this->Element('parceiros'); ?> 
    
    <h3 class="cidadesHome">Cidades</h3>
    <div class="row" id="listCidades">
    	<?php 
    		foreach ($cidades as $c):
    			echo '<div class="col-lg-4 col-sm-6 col-xs-12">';
    			echo '<a href="#">
    							<span class="glyphicon glyphicon-map-marker"></span> ' . $c['Cidade']['nome'] . '
    						</a><br>';
    			echo '</div>';
    		endforeach;
    	?>
    </div> 
  </div>

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

  <section class="subtitle-intro noticias agenda" style="background-color:#d4d4d4">
    <div class="container noticias">
      <h1 class="noticiasHome text-center">Agenda</h1>
      <div class="row border">
      	<?php $count = 0; 
      			for ($i=0; $i < 4; $i++) { 
      				if (count($eventos) == $count) {
      					$count = 0;
      				}
      		?>
		    	<div class="col-md-3 col-sm-6 divNoticia">
		    		<div class="noticia agenda">
		    			<?php 
		    				echo '<a class="noticia_foto" href="#'./*$eventos[$count]['Evento']['link'].*/'" target="_blank" escape="false">';
		    				echo $this->Html->image($eventos[$count]['Evento']['foto_anuncio'], array('width' => '100%', 'height' => '100%'));
		    				echo '</a>'
		    			?>	
		    		</div><br>
		    	</div>
	    	<?php $count++; } ?>
				<div class="col-md-12 divNoticia">
	    		<div class="noticia prop large">
	    			<?php 
		    				echo '<a href="'.$anuncios_large['0']['Parceiro']['site'].'" target="_blank" escape="false">';
		    				echo $this->Html->image($anuncios_large['0']['Parceiro']['foto'], array('width' => '100%', 'height' => '100%'));
		    				echo '</a>'
		    			?>	
	    		</div>
	    	</div>	
	    </div>    	
    </div>
  </section>

  <section class="subtitle-intro noticias">
    <div class="container noticias">
      <h1 class="noticiasHome text-center">Notícias Regionais</h1>
      <div class="row border">
      	<div class="col-lg-9">
      		<?php $count = 0; 
      			for ($i=0; $i < 6; $i++) { 
      				if (count($noticias_reg) == $count) {
      					$count = 0;
      				}
      		?>	
		    	<div class="col-lg-4 col-md-6 col-sm-6 divNoticia">
		    		<div class="noticia">
		    			<?php 
		    				echo '<a class="noticia_foto" href="'.$noticias_reg[$count]['Noticia']['link'].'" target="_blank" escape="false">';
		    				echo $this->Html->image($noticias_reg[$count]['Noticia']['foto'], array('width' => '100%', 'height' => '70%'));
		    				echo '<p class="noticia_title">'.$noticias_reg[$count]['Noticia']['titulo'].'</p>';
		    				echo '</a>'
		    			?>	
		    		</div><br>
		    	</div>
	    	<?php $count++; } ?>
      	</div>
      	<div class="col-lg-3">
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

  <section class="subtitle-intro noticias" style="background-color:#d4d4d4">
    <div class="container noticias">
      <h1 class="noticiasHome text-center">Boas Notícias</h1>
      <div class="row border">
	    	<?php $count = 0; 
      			for ($i=0; $i < 4; $i++) { 
      				if (count($noticias_boas) == $count) {
      					$count = 0;
      				}
      		?>
		    	<div class="col-md-3 col-sm-6 divNoticia">
		    		<div class="noticia agenda boas">
		    			<?php 
		    				echo '<a class="noticia_foto" href="'.$noticias_boas[$count]['Noticia']['link'].'" target="_blank" escape="false">';
		    				echo $this->Html->image($noticias_boas[$count]['Noticia']['foto'], array('width' => '100%', 'height' => '70%'));
		    				echo '<p class="noticia_title">'.$noticias_boas[$count]['Noticia']['titulo'].'</p>';
		    				echo '</a>'
		    			?>	
		    		</div><br>
		    	</div>
	    	<?php $count++; } ?>
	    </div>
	    <div class="col-md-12 divNoticia">
    		<div class="noticia prop large">
    			<?php 
	    				echo '<a href="'.$anuncios_large['0']['Parceiro']['site'].'" target="_blank" escape="false">';
	    				echo $this->Html->image($anuncios_large['0']['Parceiro']['foto'], array('width' => '100%', 'height' => '100%'));
	    				echo '</a>'
	    			?>	
    		</div>
    	</div>	
    </div>
  </section>

  <?php echo $this->Element('footer'); ?>

</main>    
