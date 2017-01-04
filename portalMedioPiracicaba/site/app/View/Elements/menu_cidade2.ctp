<?php 

	echo '<li>' . $this->Html->link(' História', array('action' => 'site_historia', $id), array('class' => 'entypo-hourglass', 'escape' => false)) . '</li>';
	
	echo '<li>' . $this->Html->link(' Dados Estatísticos', array('action' => 'site_estatistica', $id), array('class' => 'entypo-chart-line', 'escape' => false)) . '</li>';

	echo '<li>' . $this->Html->link(' Mapas', array('action' => 'site_mapas', $id), array('class' => 'entypo-globe', 'escape' => false)) . '</li>';
	
	echo '<li>' . $this->Html->link(' Fotos', array('action' => 'site_fotos', $id), array('class' => 'entypo-picture', 'escape' => false)) . '</li>';
	

	/*echo '<div class="col-lg-3 col-sm-6 col-xs-12">';
	if ($active == 'videos') {
		echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Vídeos', array('action' => 'site_videos', $id), array('class' => 'listMenu active', 'escape' => false));
	} else {
		echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Vídeos', array('action' => 'site_videos', $id), array('class' => 'listMenu', 'escape' => false));
	}
	echo '</div>';*/

	
	echo '<li>' . $this->Html->link('Lazer e Turismo', array('action' => 'site_turismo', $id), array('class' => 'entypo-dribbble', 'escape' => false)) . '</li>';
	
	echo '<li>' . $this->Html->link('Educação', array('action' => 'site_educacao', $id), array('class' => 'entypo-graduation-cap', 'escape' => false)) . '</li>';
	
	echo '<li>' . $this->Html->link('Horários de Ônibus', array('action' => 'site_transporte', $id), array('class' => 'entypo-clock', 'escape' => false)) . '</li>';
	
	echo '<li>' . $this->Html->link('Economia', array('action' => 'site_economia', $id), array('class' => 'entypo-chart-bar', 'escape' => false)) . '</li>';
	
	echo '<li>' . $this->Html->link('Saúde', array('action' => 'site_saude', $id), array('class' => 'entypo-thermometer', 'escape' => false)) . '</li>';
	
	echo '<li>' . $this->Html->link('Prestadores de Serviços', array('action' => 'site_prestadores', $id), array('class' => 'entypo-tools', 'escape' => false)) . '</li>';
	
	echo '<li>' . $this->Html->link('Poder Executivo', array('action' => 'site_executivo', $id), array('class' => 'entypo-plus-circled', 'escape' => false)) . '</li>';
	
	echo '<li>' . $this->Html->link('Poder Legislativo', array('action' => 'site_legislativo', $id), array('class' => 'entypo-plus-circled', 'escape' => false)) . '</li>';

	echo '<li>' . $this->Html->link('Poder Judiciário', array('action' => 'site_judiciario', $id), array('class' => 'entypo-plus-circled', 'escape' => false)) . '</li>';
	
	echo '<li>' . $this->Html->link('Onde Fazer', array('action' => 'site_documentos', $id), array('class' => 'entypo-direction', 'escape' => false)) . '</li>';
	
	echo '<li>' . $this->Html->link('Onde Fica', array('action' => 'site_orgaos', $id), array('class' => 'entypo-map', 'escape' => false)) . '</li>';
	
	echo '<li>' . $this->Html->link('Órgãos Assistenciais', array('action' => 'site_social', $id), array('class' => 'entypo-plus-circled', 'escape' => false)) . '</li>';
	
	echo '<li>' . $this->Html->link('Endereços', array('action' => 'site_enderecos', $id), array('class' => 'entypo-address', 'escape' => false)) . '</li>';
	
?>