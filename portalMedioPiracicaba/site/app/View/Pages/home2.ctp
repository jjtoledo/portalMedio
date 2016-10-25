<?php echo $this->Element('navigation'); ?>

	<div class="filtro">
		<video autoplay="autoplay" muted preload="preload" loop="loop" class="videoCidadades" ">
			<source src="files/cocacola.mp4" type="video/mp4">
		</video>
	</div>

<main>

  
  <section class="subtitle-intro noticias">
    <div class="container">
      <h1 class="noticiasHome text-center">Notícias Regionais</h1>
      <div class="row border">
	    	<div class="col-md-2 col-md-offset-1 col-sm-6 divNoticia">
	    		<div class="noticia">
	    			
	    		</div><br>
	    		<div class="noticia">
	    			
	    		</div>
	    	</div>
	    	<div class="col-md-2 col-sm-6 divNoticia">
	    		<div class="noticia">
	    			
	    		</div><br>
	    		<div class="noticia">
	    			
	    		</div>
	    	</div>
	    	<div class="col-md-2 col-sm-6 divNoticia">
	    		<div class="noticia">
	    			
	    		</div><br>
	    		<div class="noticia">
	    			
	    		</div>
	    	</div>
	    	<div class="col-md-4 col-sm-6 divNoticia" id="prop">
	    		<div class="noticia prop">
	    			
	    		</div>
	    	</div>
    </div>
  </section>

  <section class="subtitle-intro noticias agenda" style="background-color:#d4d4d4">
    <div class="container noticias">
      <h1 class="noticiasHome text-center">Agenda</h1>
      <div class="row border">
	    	<div class="col-md-3 col-sm-6 divNoticia">
	    		<div class="noticia">
	    			
	    		</div>
	    	</div>
	    	<div class="col-md-3 col-sm-6 divNoticia">
	    		<div class="noticia">
	    			
	    		</div>
	    	</div>
	    	<div class="col-md-3 col-sm-6 divNoticia">
	    		<div class="noticia">
	    			
	    		</div>
	    	</div>
	    	<div class="col-md-3 col-sm-6 divNoticia">
	    		<div class="noticia">
	    			
	    		</div>
	    	</div>
    </div>
  </section>

  <section class="subtitle-intro noticias">
    <div class="container noticias">
      <h1 class="noticiasHome text-center">Notícias Nacionais</h1>
      <div class="row border">
	    	<div class="col-md-2 col-md-offset-1 col-sm-6 divNoticia">
	    		<div class="noticia">
	    			
	    		</div><br>
	    		<div class="noticia">
	    			
	    		</div>
	    	</div>
	    	<div class="col-md-2 col-sm-6 divNoticia">
	    		<div class="noticia">
	    			
	    		</div><br>
	    		<div class="noticia">
	    			
	    		</div>
	    	</div>
	    	<div class="col-md-2 col-sm-6 divNoticia">
	    		<div class="noticia">
	    			
	    		</div><br>
	    		<div class="noticia">
	    			
	    		</div>
	    	</div>
	    	<div class="col-md-4 col-sm-6 divNoticia" id="prop">
	    		<div class="noticia prop">
	    			
	    		</div>
	    	</div>
    </div>
  </section>

  <section class="subtitle-intro noticias agenda" style="background-color:#d4d4d4">
    <div class="container noticias">
      <h1 class="noticiasHome text-center">Boas Notícias</h1>
      <div class="row border">
	    	<div class="col-md-3 col-sm-6 divNoticia">
	    		<div class="noticia">
	    			
	    		</div>
	    	</div>
	    	<div class="col-md-3 col-sm-6 divNoticia">
	    		<div class="noticia">
	    			
	    		</div>
	    	</div>
	    	<div class="col-md-3 col-sm-6 divNoticia">
	    		<div class="noticia">
	    			
	    		</div>
	    	</div>
	    	<div class="col-md-3 col-sm-6 divNoticia">
	    		<div class="noticia">
	    			
	    		</div>
	    	</div>
    </div>
  </section>

</main>    

<p>
	<?php
	$filePresent = null;
	if (file_exists(APP . 'Config' . DS . 'database.php')):
		echo '<span class="notice success">';
			echo __d('cake_dev', 'Your database configuration file is present.');
			$filePresent = true;
		echo '</span>';
	else:
		echo '<span class="notice">';
			echo __d('cake_dev', 'Your database configuration file is NOT present.');
			echo '<br/>';
			echo __d('cake_dev', 'Rename %s to %s', 'APP/Config/database.php.default', 'APP/Config/database.php');
		echo '</span>';
	endif;
	?>
</p>
<?php
if (isset($filePresent)):
	App::uses('ConnectionManager', 'Model');
	try {
		$connected = ConnectionManager::getDataSource('default');
	} catch (Exception $connectionError) {
		$connected = false;
		$errorMsg = $connectionError->getMessage();
		if (method_exists($connectionError, 'getAttributes')):
			$attributes = $connectionError->getAttributes();
			if (isset($errorMsg['message'])):
				$errorMsg .= '<br />' . $attributes['message'];
			endif;
		endif;
	}
	?>
	<p>
		<?php
			if ($connected && $connected->isConnected()):
				echo '<span class="notice success">';
					echo __d('cake_dev', 'CakePHP is able to connect to the database.');
				echo '</span>';
			else:
				echo '<span class="notice">';
					echo __d('cake_dev', 'CakePHP is NOT able to connect to the database.');
					echo '<br /><br />';
					echo $errorMsg;
				echo '</span>';
			endif;
		?>
	</p>
<?php
endif;
