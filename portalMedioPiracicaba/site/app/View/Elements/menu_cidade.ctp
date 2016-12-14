<?php 
	echo '<div class="col-lg-3 col-sm-6 col-xs-12">';
	if ($active == 'historia') {
		echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'História', array('action' => 'site_historia', $id), array('class' => 'listMenu active', 'escape' => false));
	} else {
		echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'História', array('action' => 'site_historia', $id), array('class' => 'listMenu', 'escape' => false));
	}	
	echo '</div>';

	echo '<div class="col-lg-3 col-sm-6 col-xs-12">';
	if ($active == 'estatistica') {
		echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Dados Estatísticos', array('action' => 'site_estatistica', $id), array('class' => 'listMenu active', 'escape' => false));
	} else {
		echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Dados Estatísticos', array('action' => 'site_estatistica', $id), array('class' => 'listMenu', 'escape' => false));
	}
	echo '</div>';

	echo '<div class="col-lg-3 col-sm-6 col-xs-12">';
	if ($active == 'mapas') {
		echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Mapas', array('action' => 'site_mapas', $id), array('class' => 'listMenu active', 'escape' => false));
	} else {
		echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Mapas', array('action' => 'site_mapas', $id), array('class' => 'listMenu', 'escape' => false));
	}
	echo '</div>';

	echo '<div class="col-lg-3 col-sm-6 col-xs-12">';
	if ($active == 'fotos') {
		echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Fotos', array('action' => 'site_fotos', $id), array('class' => 'listMenu active', 'escape' => false));
	} else {
		echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Fotos', array('action' => 'site_fotos', $id), array('class' => 'listMenu', 'escape' => false));
	}
	echo '</div>';

	/*echo '<div class="col-lg-3 col-sm-6 col-xs-12">';
	if ($active == 'videos') {
		echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Vídeos', array('action' => 'site_videos', $id), array('class' => 'listMenu active', 'escape' => false));
	} else {
		echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Vídeos', array('action' => 'site_videos', $id), array('class' => 'listMenu', 'escape' => false));
	}
	echo '</div>';*/

	echo '<div class="col-lg-3 col-sm-6 col-xs-12">';
	if ($active == 'turismo') {
		echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Lazer e Turismo', array('action' => 'site_turismo', $id), array('class' => 'listMenu active', 'escape' => false));
	} else {
		echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Lazer e Turismo', array('action' => 'site_turismo', $id), array('class' => 'listMenu', 'escape' => false));
	}
	echo '</div>';

	echo '<div class="col-lg-3 col-sm-6 col-xs-12">';
	if ($active == 'educacao') {
		echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Educação', array('action' => 'site_educacao', $id), array('class' => 'listMenu active', 'escape' => false));
	} else {
		echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Educação', array('action' => 'site_educacao', $id), array('class' => 'listMenu', 'escape' => false));
	}
	echo '</div>';

	echo '<div class="col-lg-3 col-sm-6 col-xs-12">';
	if ($active == 'transporte') {
	} else {
	}
	echo '</div>';

	echo '<div class="col-lg-3 col-sm-6 col-xs-12">';
	if ($active == 'economia') {
		echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Economia', array('action' => 'site_economia', $id), array('class' => 'listMenu active', 'escape' => false));
	} else {
		echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Economia', array('action' => 'site_economia', $id), array('class' => 'listMenu', 'escape' => false));
	}
	echo '</div>';

	echo '<div class="col-lg-3 col-sm-6 col-xs-12">';
	if ($active == 'saude') {
		echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Saúde', array('action' => 'site_saude', $id), array('class' => 'listMenu active', 'escape' => false));
	} else {
		echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Saúde', array('action' => 'site_saude', $id), array('class' => 'listMenu', 'escape' => false));
	}
	echo '</div>';

	echo '<div class="col-lg-3 col-sm-6 col-xs-12">';
	if ($active == 'prestadores') {
		echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Prestadores de Serviços', array('action' => 'site_prestadores', $id), array('class' => 'listMenu active', 'escape' => false));
	} else {
		echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Prestadores de Serviços', array('action' => 'site_prestadores', $id), array('class' => 'listMenu', 'escape' => false));
	}
	echo '</div>';

	echo '<div class="col-lg-3 col-sm-6 col-xs-12">';
	if ($active == 'executivo') {
		echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Poder Executivo', array('action' => 'site_executivo', $id), array('class' => 'listMenu active', 'escape' => false));
	} else {
		echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Poder Executivo', array('action' => 'site_executivo', $id), array('class' => 'listMenu', 'escape' => false));
	}
	echo '</div>';

	echo '<div class="col-lg-3 col-sm-6 col-xs-12">';
	if ($active == 'legislativo') {
		echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Poder Legislativo', array('action' => 'site_legislativo', $id), array('class' => 'listMenu active', 'escape' => false));
	} else {
		echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Poder Legislativo', array('action' => 'site_legislativo', $id), array('class' => 'listMenu', 'escape' => false));
	}
	echo '</div>';

	echo '<div class="col-lg-3 col-sm-6 col-xs-12">';
	if ($active == 'judiciario') {
		echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Poder Judiciário', array('action' => 'site_judiciario', $id), array('class' => 'listMenu active', 'escape' => false));
	} else {
		echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Poder Judiciário', array('action' => 'site_judiciario', $id), array('class' => 'listMenu', 'escape' => false));
	}
	echo '</div>';

	echo '<div class="col-lg-3 col-sm-6 col-xs-12">';
	if ($active == 'documentos') {
		echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Onde Fazer', array('action' => 'site_documentos', $id), array('class' => 'listMenu active', 'escape' => false));
	} else {
		echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Onde Fazer', array('action' => 'site_documentos', $id), array('class' => 'listMenu', 'escape' => false));
	}
	echo '</div>';

	echo '<div class="col-lg-3 col-sm-6 col-xs-12">';
	if ($active == 'orgaos') {
		echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Onde Fica', array('action' => 'site_orgaos', $id), array('class' => 'listMenu active', 'escape' => false));
	} else {
		echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Onde Fica', array('action' => 'site_orgaos', $id), array('class' => 'listMenu', 'escape' => false));
	}
	echo '</div>';

	echo '<div class="col-lg-3 col-sm-6 col-xs-12">';
	if ($active == 'social') {
		echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Órgãos Assistenciais', array('action' => 'site_social', $id), array('class' => 'listMenu active', 'escape' => false));
	} else {
		echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Órgãos Assistenciais', array('action' => 'site_social', $id), array('class' => 'listMenu', 'escape' => false));
	}
	echo '</div>';

	echo '<div class="col-lg-3 col-sm-6 col-xs-12">';
	if ($active == 'enderecos') {
		echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Endereços', array('action' => 'site_enderecos', $id), array('class' => 'listMenu active', 'escape' => false));
	} else {
		echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Endereços', array('action' => 'site_enderecos', $id), array('class' => 'listMenu', 'escape' => false));
	}
	echo '</div>';
?>