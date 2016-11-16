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

	public function index() {
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
 * Métodos site **********************************************************************************************************
 * listar todas as notícias com base no tipo
 *
 * @param int $tipo
 * @return void
 */	

	public function site_noticias($tipo = null) {
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

/** 
 * 
 * listar cidade específica
 *
 * @param int $id
 * @return void
 */	

	public function site_cidade($id = null) {
		$this->loadModel('Cidade');
		if (!$this->Cidade->exists($id)) {
			throw new NotFoundException(__('Invalid Cidade'));
		}
		$options = array('conditions' => array('Cidade.' . $this->Cidade->primaryKey => $id));
		$cidade = $this->Cidade->find('first', $options);
		$this->set('cidade', $cidade);

		$this->set('id', $id);

		/*Carregamento das fotos antigas e atuais */
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

		$cidades = $this->Cidade->find('all');
		$this->set(compact('cidades'));
		$this->set('results', $this->clima_cidade($cidade));
	}

	public function site_historia($id = null) {
		$this->loadModel('Cidade');
		if (!$this->Cidade->exists($id)) {
			throw new NotFoundException(__('Invalid Cidade'));
		}
		$options = array('conditions' => array('Cidade.' . $this->Cidade->primaryKey => $id));
		$this->set('cidade', $this->Cidade->find('first', $options));

		$this->set('id', $id);

		/*Carregamento das fotos antigas e atuais */
		$this->loadModel('Foto');
		$options = array(
			'order' => 'rand()',
			'conditions' => array(
				'Foto.tipo' => 1,
				'Foto.cidade_id' => $id
			),
			'limit' => 4
		);
		$this->set('fotos_antigas', $this->Foto->find('all', $options));

		$options = array(
			'order' => 'rand()',
			'conditions' => array(
				'Foto.tipo' => 2,
				'Foto.cidade_id' => $id
			),
			'limit' => 4
		);
		$this->set('fotos_atuais', $this->Foto->find('all', $options));

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

		/*Carregamento das fotos dos distritos */
		$this->loadModel('Distrito');
		$options = array(
			'order' => array(
				'Distrito.id' => 'DESC'
			),
			'conditions' => array(
				'Distrito.cidade_id' => $id
			)
		);
		$this->set('distritos', $this->Distrito->find('all', $options));

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

		$cidades = $this->Cidade->find('all');
		$this->set(compact('cidades'));
		$this->set('results', $this->clima($cidades));
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
}