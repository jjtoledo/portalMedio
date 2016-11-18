<?php
App::uses('AppController', 'Controller');
/**
 * Politicos Controller
 *
 * @property Politico $Politico
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class PoliticosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

	public function afterFilter() {
        $this->autenticarAdmin();
    }

    public function autenticarAdmin() {        
        if (!$this->Session->check('Admin')) {
            $this->redirect(array('controller' => 'admins',
                                    'action' => 'index_login'));
            exit();
        } 
    }

/**
 * index method
 *
 * @return void
 */
	public function index($id = null, $tipo = null) {
		$this->Paginator->settings = array(
			'conditions' => array(
				'Politico.cidade_id' => $id,
				'Politico.tipo' => $tipo
			)
		);
		$this->set('politicos', $this->Paginator->paginate());

		$this->set('tipo', $tipo);

		$this->loadModel('Cidade');
		$options = array('conditions' => array('Cidade.' . $this->Cidade->primaryKey => $id));
		$this->set('cidade', $this->Cidade->find('first', $options));
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null, $idCity = null) {
		if (!$this->Politico->exists($id)) {
			throw new NotFoundException(__('Invalid Politico'));
		}
		$options = array('conditions' => array('Politico.' . $this->Politico->primaryKey => $id));
		$this->set('politico', $this->Politico->find('first', $options));

		$this->loadModel('Cidade');
		$options = array('conditions' => array('Cidade.' . $this->Cidade->primaryKey => $idCity));
		$this->set('cidade', $this->Cidade->find('first', $options));

		$this->loadModel('Comissao');
		$options = array('conditions' => array('Comissao.cidade_id' => $idCity));
		$this->set('comissaos', $this->Comissao->find('all', $options));		

		$this->set('id', $id);	
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null, $tipo = null) {
		$this->request->data['Politico']['cidade_id'] = $id;
		$this->request->data['Politico']['tipo'] = $tipo;
		
		if ($tipo == 1) {
			$this->request->data['Politico']['comissao_id'] = 6;
		}

		$this->set('tipo', $tipo);

		$this->loadModel('Comissao');
		$options = array(
			'conditions' => array(
				'Comissao.cidade_id' => $id,
				'Comissao.id !=' => 6
			),
			'fields' => array(
				'Comissao.id',
				'Comissao.nome'
			)
		);
		$this->set('comissaos', $this->Comissao->find('list', $options));

		if ($this->request->is('post')) {
			$this->Politico->create();
			if ($this->Politico->save($this->request->data)) {
				$this->Session->setFlash(__('The Politico has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $id, $tipo));
			} else {
				$this->Session->setFlash(__('The Politico could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		
		$this->loadModel('Cidade');
		$options = array('conditions' => array('Cidade.' . $this->Cidade->primaryKey => $id));
		$this->set('cidade', $this->Cidade->find('first', $options));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null, $idCity = null, $tipo = null) {
		if (!$this->Politico->exists($id)) {
			throw new NotFoundException(__('Invalid Politico'));
		}

		$this->set(compact('tipo'));

		$this->request->data['Politico']['cidade_id'] = $idCity;

		$this->loadModel('Comissao');
		$options = array(
			'conditions' => array(
				'Comissao.cidade_id' => $idCity,
				'Comissao.id !=' => 6
			),
			'fields' => array(
				'Comissao.id',
				'Comissao.nome'
			)
		);
		$this->set('comissaos', $this->Comissao->find('list', $options));

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Politico->save($this->request->data)) {
				$this->Session->setFlash(__('The Politico has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $idCity, $tipo));
			} else {
				$this->Session->setFlash(__('The Politico could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Politico.' . $this->Politico->primaryKey => $id));
			$this->request->data = $this->Politico->find('first', $options);
		}
		
		$this->loadModel('Cidade');
		$options = array('conditions' => array('Cidade.' . $this->Cidade->primaryKey => $idCity));
		$this->set('cidade', $this->Cidade->find('first', $options));

		$this->set('id', $id);
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null, $idCity = null, $tipo = null) {
		$this->Politico->id = $id;
		if (!$this->Politico->exists()) {
			throw new NotFoundException(__('Invalid Politico'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Politico->delete()) {
			$this->Session->setFlash(__('The Politico has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The Politico could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index', $idCity, $tipo));
	}
}