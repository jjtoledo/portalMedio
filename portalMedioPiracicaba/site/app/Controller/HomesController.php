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
		$this->loadModel('Noticia');
		$noticias_reg = $this->Noticia->find('all', $conditions);
		$this->set(compact('noticias_reg'));

		$conditions = array(
			'conditions' => array('Noticia.tipo' => '3')
			);
		$this->loadModel('Noticia');
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
		$this->loadModel('Parceiro');
		$anuncios_quad = $this->Parceiro->find('all', $conditions);
		$this->set(compact('anuncios_quad'));

		$conditions = array(
			'conditions' => array('Parceiro.tipo' => '3')
			);
		$this->loadModel('Parceiro');
		$anuncios_large = $this->Parceiro->find('all', $conditions);
		$this->set(compact('anuncios_large'));

		$this->set('results', $this->clima($cidades));
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
		$this->loadModel('Parceiro');
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
		$this->set('cidade', $this->Cidade->find('first', $options));

		$this->set('id', $id);

		$this->loadModel('Foto');
		$options = array(
			'order' => array(
				'Foto.id' => 'DESC'
			),
			'limit' => 5
		);
		$this->set('fotos', $this->Foto->find('all', $options));

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
		$this->loadModel('Parceiro');
		$anuncios_quad = $this->Parceiro->find('all', $conditions);
		$this->set(compact('anuncios_quad'));

		$conditions = array(
			'conditions' => array('Parceiro.tipo' => '3')
			);
		$this->loadModel('Parceiro');
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
		$this->loadModel('Noticia');
		$noticias_boas = $this->Noticia->find('all', $conditions);
		$this->set(compact('noticias_boas'));

		$cidades = $this->Cidade->find('all');
		$this->set(compact('cidades'));
		$this->set('results', $this->clima($cidades));
	}

	public function clima($cidades)	{
		$cids = 
		array('0' => array('nome' => 'Alvinópolis', 'cid' => 'BRXX0925'),
			'1' => array('nome' => 'Barão de Cocais', 'cid' => 'BRXX1122'),
			'2' => array('nome' => 'Dom Silvério', 'cid' => 'BRXX1737'),
			'3' => array('nome' => 'Itabira', 'cid' => 'BRXX0571'),
			'4' => array('nome' => 'João Monlevade', 'cid' => 'BRXX2312'),
			'5' => array('nome' => 'Nova Era', 'cid' => 'BRXX2711'),
			'6' => array('nome' => 'Rio Piracicaba', 'cid' => 'BRXX3216'),
			'7' => array('nome' => 'Santa Bárbara', 'cid' => 'BRXX3283'),
			'8' => array('nome' => 'Santa Maria de Itabira', 'cid' => 'BRXX3323'),
			'9' => array('nome' => 'São Domingos do Prata', 'cid' => 'BRXX3411'),
			'10' => array('nome' => 'São José do Goiabal', 'cid' => 'BRXX3482')
		);

		$city = rand (0,16);
		$nome = $cidades[$city]['Cidade']['nome'];

		while ($nome == 'Barão de Cocais' || $nome == 'Bela Vista de Minas' ||
			   $nome == 'Bom Jesus do Amparo' || $nome == 'Catas Altas' ||
			   $nome == 'Dionísio' || $nome == 'São Gonçalo do Rio Abaixo' ||
			   $nome == 'Sem Peixe') {
			$city = rand (0,16);
			$nome = $cidades[$city]['Cidade']['nome'];
		}
		
		$this->set(compact('city'));	

		foreach ($cids as $cid) {
			if ($cid['nome'] == $nome) {
				$cdg = $cid['cid'];
			}	
		}

		$HttpSocket = new HttpSocket();
		// string query
		$results = json_decode($HttpSocket->get('https://api.hgbrasil.com/weather/?format=json&cid='.$cdg), true);
		return $results;
	}
}