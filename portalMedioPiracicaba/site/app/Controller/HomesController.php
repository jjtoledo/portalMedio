<?php
App::uses('AppController', 'Controller');
App::uses('HttpSocket', 'Network/Http');

/**
 * Historias Controller
 *
 * @property Historia $Historia
 * @property PaginatorComponent $Paginator
 */
class HomesController extends AppController {

	var $components = array('Email');

	public function index() {
		$this->set('title_for_layout', 'Home');

		$this->loadModel('Cidade');
		$options = array('order' => 'Cidade.nome');
		$cidades = $this->Cidade->find('all', $options);
		$this->set(compact('cidades'));

		/*Carregamento das fotos antigas e atuais */
		$this->loadModel('Foto');
		$options = array(
			'order' => 'rand()',
			'conditions' => array(
				'Foto.tipo' => 3
			),
			'limit' => 4
		);
		$this->set('fotos_aereas', $this->Foto->find('all', $options));

		$options = array(
			'order' => 'rand()',
			'conditions' => array(
				'Foto.tipo' => 2
			),
			'limit' => 4
		);
		$this->set('fotos_atuais', $this->Foto->find('all', $options));

		/* Agenda */
		$this->loadModel('Evento');
		$options = array('order' => 'Evento.data');
		$eventos = $this->Evento->find('all', $options);
		$this->set(compact('eventos'));

		/*Carregamento das notícias*/
		$conditions = array(
			'conditions' => array('Noticia.tipo' => '1')
			);
		$this->loadModel('Noticia');
		$noticias_gerais = $this->Noticia->find('all', $conditions);
		$this->set(compact('noticias_gerais'));

		$conditions = array(
			'conditions' => array('Noticia.tipo' => '2')
			);
		$noticias_reg = $this->Noticia->find('all', $conditions);
		$this->set(compact('noticias_reg'));

		$conditions = array(
			'conditions' => array('Noticia.tipo' => '3')
			);
		$noticias_boas = $this->Noticia->find('all', $conditions);
		$this->set(compact('noticias_boas'));

		/*Carregamento dos parceiros e anúncios*/
		$conditions = array(
			'conditions' => array('Parceiro.tipo' => '1')
			);
		$this->loadModel('Parceiro');
		$parceiros = $this->Parceiro->find('all', $conditions);
		$this->set(compact('parceiros'));

		$conditions = array(
			'conditions' => array('Parceiro.tipo' => '2')
			);
		$anuncios_quad = $this->Parceiro->find('all', $conditions);
		$this->set(compact('anuncios_quad'));

		$conditions = array(
			'conditions' => array('Parceiro.tipo' => '3')
			);
		$anuncios_large = $this->Parceiro->find('all', $conditions);
		$this->set(compact('anuncios_large'));

		$this->set('results', $this->clima($cidades));
		$this->set('moedas', $this->moeda());
	}

/** 
 * 
 * listar cidade específica
 *
 * @param int $id
 * @return void
 */	

	public function site_cidade($id = null) {		
		$this->common($id, 'title');
		$this->set('active', '');
	}

	public function site_historia($id = null) {
		$this->set('title_for_layout', 'História');
		$this->common($id);
		$this->set('active', 'historia');

		$this->loadModel('Distrito');
		$options = array(
			'conditions' => array(
				'Distrito.cidade_id' => $id
			)
 		);
		$distritos = $this->Distrito->find('all', $options);
		$this->set('distritos', $distritos);
	}

	public function site_estatistica($id = null) {
		$this->set('title_for_layout', 'Estatísticas');
		$this->common($id);
		$this->set('active', 'estatistica');
	}

	public function site_mapas($id = null) {
		$this->set('title_for_layout', 'Mapas');		
		$this->common($id);
		$this->set('active', 'mapas');
	}

	public function site_fotos($id = null) {
		$this->set('title_for_layout', 'Fotos');
		$this->common($id);
		$this->set('active', 'fotos');
	}

	public function site_turismo($id = null) {
		$this->set('title_for_layout', 'Turismo');
		$cidade = $this->common($id);
		$this->set('active', 'turismo');

		$this->loadModel('AtrativoTuristico');
		$options = array(
			'conditions' => array(
				'AtrativoTuristico.cidade_id' => $id
			)
 		);
		$atrativos = $this->AtrativoTuristico->find('all', $options);
		$this->set('atrativos', $atrativos);

		$this->loadModel('Patrimonio');
		$options = array(
			'fields' => array(
				'DISTINCT Patrimonio.tipo'
			),
			'conditions' => array(
				'Patrimonio.cidade_id' => $id
			)
 		);
 		$patrimonios = $this->Patrimonio->find('all', $options);
		$this->set('patrimonios', $patrimonios);		
	}

	public function site_educacao($id = null) {
		$this->set('title_for_layout', 'Educação');
		$this->common($id);
		$this->set('active', 'educacao');
	}

	public function site_transporte($id = null) {
		$this->set('title_for_layout', 'Transporte');
		$this->common($id);
		$this->set('active', 'transporte');
	}

	public function site_economia($id = null) {
		$this->set('title_for_layout', 'Economia');		
		$this->common($id);
		$this->set('active', 'economia');
	}

	public function site_saude($id = null) {
		$this->set('title_for_layout', 'Saúde');
		$this->common($id);
		$this->set('active', 'saude');

		$this->loadModel('OrgaoSaude');
		$options = array(
			'fields' => array(
				'DISTINCT OrgaoSaude.tipo',
			),
			'group' => 'OrgaoSaude.tipo',
			'conditions' => array(
				'OrgaoSaude.cidade_id' => $id
			)
 		);
 		$tipos = $this->OrgaoSaude->find('all', $options);
		$this->set('tipos', $tipos);

		$this->loadModel('Medico');
		$options = array(
			'fields' => array(
				'DISTINCT Medico.especialidade',
			),
			'group' => 'Medico.especialidade',
			'conditions' => array(
				'Medico.cidade_id' => $id
			)
 		);
 		$especialidades = $this->Medico->find('all', $options);
		$this->set('especialidades', $especialidades);
	}

	public function site_prestadores($id = null) {
		$this->set('title_for_layout', 'Prestadores de serviços');
		$this->common($id);
		$this->set('active', 'prestadores');

		$this->loadModel('Prestador');
		$options = array(
			'fields' => array(
				'DISTINCT Prestador.especialidade',
			),
			'group' => 'Prestador.especialidade',
			'conditions' => array(
				'Prestador.cidade_id' => $id
			)
 		);
 		$especialidades = $this->Prestador->find('all', $options);
		$this->set('especialidades', $especialidades);
	}

	public function site_executivo($id = null) {
		$this->set('title_for_layout', 'Poder Executivo');
		$this->common($id);
		$this->set('active', 'executivo');
	}

	public function site_legislativo($id = null) {
		$this->set('title_for_layout', 'Poder Legislativ');
		$this->common($id);
		$this->set('active', 'legislativo');
	}

	public function site_judiciario($id = null) {
		$this->set('title_for_layout', 'Poder Judiciário');
		$this->common($id);
		$this->set('active', 'judiciario');
	}

	public function site_documentos($id = null) {
		$this->set('title_for_layout', 'Retirada de Documentos');
		$this->common($id);
		$this->set('active', 'documentos');
	}

	public function site_orgaos($id = null) {
		$this->set('title_for_layout', 'Órgãos Públicos');		
		$this->common($id);
		$this->set('active', 'orgaos');
	}

	public function site_social($id = null) {
		$this->set('title_for_layout', 'Assistências Sociais');
		$this->common($id);
		$this->set('active', 'social');
	}

	public function site_enderecos($id = null) {
		$this->set('title_for_layout', 'Endereços');
		$this->common($id);
		$this->set('active', 'enderecos');
	}

	public function site_contato($id = null) {
		$this->set('title_for_layout', 'Contato');
		$this->common($id);

		if ($this->request->is('post')) {
			$name = $this->data['Contato']['nome'];
	        $from = $this->data['Contato']['email'];
	        $subject = $this->data['Contato']['assunto'];
	        $msg = $this->data['Contato']['mensagem'];

	        $this->Email->sendAs = 'both'; // html, text, both
	        $this->set('conteudo', $msg); // especifica variavel da mensagem para o template
	        //$this->Email->layout = 'contact'; // views/elements/email/html/contact.ctp
	        //$this->Email->template = 'contact';

	        // set view variables as normal
	        $this->set('from', $name);
	        $this->set('msg', $msg);

			$this->Email->to = 'contato@portalmediopiracicaba.com';
			$this->Email->subject = $subject;
			$this->Email->from = $name . '<' . $from .'>';

			if ( $this->Email->send($msg) ) {
			   $this->Session->setFlash('E-mail enviado');
			} else {
			   $this->Session->setFlash('E-mail nao enviado');
			}
			$this->redirect('action', 'site_contato');
		}		
	}

/** 
 * Métodos site **********************************************************************************************************
 * listar todas as notícias com base no tipo
 *
 * @param int $tipo
 * @return void
 */	

	public function site_noticias($tipo = null) {
		$this->set('title_for_layout', 'Notícias');

		$this->loadModel('Noticia');
		$options = array(
			'conditions' => array(
				'Noticia.tipo' => $tipo
			),
			'order' => array(
				'Noticia.id' => 'DESC'
			)
		);

		$noticias = $this->Noticia->find('all', $options);
		$this->set('noticias', $noticias);
		$this->set('tipo', $tipo);

		$this->loadModel('Cidade');
		$this->set('cidades', $this->Cidade->find('all'));

		if(isset($this->params['url']['search'])){  
			$search = "%" . $this->params['url']['search'] . "%";
			$options = array(
				'conditions' => array(
					'Noticia.tipo' => $tipo,
					'Noticia.titulo LIKE' => $search
				),
				'order' => array(
					'Noticia.id' => 'DESC'
				)
			);

			$noticias = $this->Noticia->find('all', $options);
			$this->set('noticias', $noticias);	
		}
	}

/** 
 * 
 * listar notícia específica
 *
 * @param int $tipo, $id
 * @return void
 */	

	public function site_noticia($id = null, $tipo = null) {
		$this->set('title_for_layout', 'Notícia');

		$this->loadModel('Noticia');
		if (!$this->Noticia->exists($id)) {
			throw new NotFoundException(__('Invalid Noticia'));
		}
		$options = array('conditions' => array('Noticia.' . $this->Noticia->primaryKey => $id));
		$this->set('noticia', $this->Noticia->find('first', $options));

		$this->set('id', $id);
		$this->set('tipo', $tipo);	

		$this->loadModel('Cidade');
		$this->set('cidade', $this->Cidade->find('all'));

		$options = array(
			'conditions' => array(
				'Noticia.tipo' => $tipo,
				'Noticia.id !=' => $id
			),
			'order' => array(
				'Noticia.id' => 'DESC'
			),
			'limit' => 5
		);

		$noticias = $this->Noticia->find('all', $options);
		$this->set('noticias', $noticias);

		$conditions = array(
			'conditions' => array('Parceiro.tipo' => '2')
			);
		$this->loadModel('Parceiro');
		$anuncios_quad = $this->Parceiro->find('all', $conditions);
		$this->set(compact('anuncios_quad'));

		$conditions = array(
			'conditions' => array('Parceiro.tipo' => '3')
			);
		$anuncios_large = $this->Parceiro->find('all', $conditions);
		$this->set(compact('anuncios_large'));
	}


/* Funções diversas */
	public function clima($cidades)	{
		$cityArray = array();
		foreach ($cidades as $c) {
			array_push($cityArray, $c['Cidade']['id']);
		}

		$city = mt_rand (min($cityArray),max($cityArray));

		foreach ($cidades as $c) {
			if ($c['Cidade']['id'] == $city) {
				$nome = $c['Cidade']['nome'];
			}
		}

		while ($nome == 'Dionísio') {
			$city = mt_rand (min($cityArray),max($cityArray));
			foreach ($cidades as $c) {
				if ($c['Cidade']['id'] == $city) {
					$nome = $c['Cidade']['nome'];
				}
			}
		}

		$this->set('city', $nome);		

		$HttpSocket = new HttpSocket();
		// string query
		if ($nome == 'Santa Bárbara') {
			$results = json_decode($HttpSocket->get('https://api.hgbrasil.com/weather/?format=json&cid=BRXX3283'), true);
			return $results;
		}

		$query = 'https://api.hgbrasil.com/weather/?format=json&city_name='.$nome.'&key=0d949cbb';
		$results = json_decode($HttpSocket->get($query), true);
		return $results;
	}

	public function clima_cidade($cidade = null) {

		$nome = $cidade['Cidade']['nome'];

		$this->set('city', $nome);		

		$HttpSocket = new HttpSocket();
		// string query
		if ($nome == 'Santa Bárbara') {
			$results = json_decode($HttpSocket->get('https://api.hgbrasil.com/weather/?format=json&cid=BRXX3283'), true);
			return $results;
		}

		$query = 'https://api.hgbrasil.com/weather/?format=json&city_name='.$nome.'&key=0d949cbb';
		$results = json_decode($HttpSocket->get($query), true);
		return $results;
	}

	public function moeda()	{
		$HttpSocket = new HttpSocket();
		// string query
		$results = json_decode($HttpSocket->get('http://api.promasters.net.br/cotacao/v1/valores'), true);
		return $results;
	}

	public function common($id = null, $title = null) {
		$this->loadModel('Cidade');

		/*Carregamento dos parceiros e anúncios*/
		$conditions = array(
			'conditions' => array('Parceiro.tipo' => '1')
			);
		$this->loadModel('Parceiro');
		$parceiros = $this->Parceiro->find('all', $conditions);
		$this->set(compact('parceiros'));

		$conditions = array(
			'conditions' => array('Parceiro.tipo' => '2')
			);
		$anuncios_quad = $this->Parceiro->find('all', $conditions);
		$this->set(compact('anuncios_quad'));

		$conditions = array(
			'conditions' => array('Parceiro.tipo' => '3')
			);
		$anuncios_large = $this->Parceiro->find('all', $conditions);
		$this->set(compact('anuncios_large'));

		/*Carregamento das notícias*/
		$conditions = array(
			'conditions' => array('Noticia.tipo' => '2')
			);
		$this->loadModel('Noticia');
		$noticias_reg = $this->Noticia->find('all', $conditions);
		$this->set(compact('noticias_reg'));

		$conditions = array(
			'conditions' => array('Noticia.tipo' => '3')
			);
		$noticias_boas = $this->Noticia->find('all', $conditions);
		$this->set(compact('noticias_boas'));

		$options = array('order' => 'Cidade.nome');
		$cidades = $this->Cidade->find('all', $options);
		$this->set(compact('cidades'));		

		if ($id != null) {			
			if (!$this->Cidade->exists($id)) {
				throw new NotFoundException(__('Invalid Cidade'));
			}

			$options = array('conditions' => array('Cidade.' . $this->Cidade->primaryKey => $id));
			$cidade = $this->Cidade->find('first', $options);
			$this->set('cidade', $cidade);
			$this->set('results', $this->clima_cidade($cidade));

			if ($title != null) {
				$this->set('title_for_layout', $cidade['Cidade']['nome']);
			}

			$this->set('id', $id);

			/*Carregamento das fotos */
			$this->loadModel('Foto');
			$options = array(
				'order' => 'rand()',
				'conditions' => array(
					'Foto.tipo' => 3,
					'Foto.cidade_id' => $id
				),
				'limit' => 4
			);
			$this->set('fotos_aereas', $this->Foto->find('all', $options));

			$options = array(
				'order' => 'rand()',
				'conditions' => array(
					'Foto.tipo' => 2,
					'Foto.cidade_id' => $id
				),
				'limit' => 4
			);
			$this->set('fotos_atuais', $this->Foto->find('all', $options));

			$options = array(
				'order' => 'rand()',
				'conditions' => array(
					'Foto.tipo' => 1,
					'Foto.cidade_id' => $id
				),
				'limit' => 4
			);
			$this->set('fotos_antigas', $this->Foto->find('all', $options));

			/* Agenda */
			$this->loadModel('Evento');
			$options = array(
				'order' => 'Evento.data',
				'conditions' => array(
					'Evento.cidade_id' => $id
				)
			);
			$eventos = $this->Evento->find('all', $options);
			$this->set(compact('eventos'));

			return $cidade;
		}
	}
}