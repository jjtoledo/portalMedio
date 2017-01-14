<?php
App::uses('AppController', 'Controller');
/**
 * Eleicaos Controller
 *
 * @property Eleicao $Eleicao
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class EleicaosController extends AppController {

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
				'Eleicao.cidade_id' => $id,
				'Eleicao.tipo' => $tipo
			),
			'order' => array(
				'Eleicao.ano' => 'DESC'
			)
		);

		$this->set('eleicaos', $this->Paginator->paginate());

		$this->loadModel('Cidade');
		$options = array('conditions' => array('Cidade.' . $this->Cidade->primaryKey => $id));
		$this->set('cidade', $this->Cidade->find('first', $options));
		$this->set('tipo', $tipo);
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null, $idCity = null, $tipo = null) {
		if (!$this->Eleicao->exists($id)) {
			throw new NotFoundException(__('Invalid Eleicao'));
		}
		$options = array('conditions' => array('Eleicao.' . $this->Eleicao->primaryKey => $id));
		$this->set('eleicao', $this->Eleicao->find('first', $options));

		$this->loadModel('Cidade');
		$options = array('conditions' => array('Cidade.' . $this->Cidade->primaryKey => $idCity));
		$this->set('cidade', $this->Cidade->find('first', $options));

		$this->set('id', $id);
		$this->set('tipo', $tipo);	
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null, $tipo = null) {
		$this->request->data['Eleicao']['cidade_id'] = $id;
		$this->request->data['Eleicao']['tipo'] = $tipo;
		
		$this->loadModel('Cidade');
		$options = array('conditions' => array('Cidade.' . $this->Cidade->primaryKey => $id));
		$this->set('cidade', $this->Cidade->find('first', $options));

		$this->set('tipo', $tipo);

		if ($this->request->is('post')) {
			$this->Eleicao->create();			
			if (!$this->Eleicao->save($this->request->data)) {
				$this->Session->setFlash(__('The Eleicao could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
			
			$this->Session->setFlash(__('The Eleicao has been saved.'), 'default', array('class' => 'alert alert-success'));
			return $this->redirect(array('action' => 'index', $id, $tipo));
		}

	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null, $idCity = null, $tipo = null) {
		if (!$this->Eleicao->exists($id)) {
			throw new NotFoundException(__('Invalid Receita'));
		}

		$this->request->data['Eleicao']['cidade_id'] = $idCity;

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Eleicao->save($this->request->data)) {
				$this->Session->setFlash(__('The Eleicao has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $idCity, $tipo));
			} else {
				$this->Session->setFlash(__('The Eleicao could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Eleicao.' . $this->Eleicao->primaryKey => $id));
			$this->request->data = $this->Eleicao->find('first', $options);
		}

		$this->loadModel('Cidade');
		$options = array('conditions' => array('Cidade.' . $this->Cidade->primaryKey => $idCity));
		$this->set('cidade', $this->Cidade->find('first', $options));

		$this->set('id', $id);
		$this->set('tipo', $tipo);
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null, $idCity = null, $tipo = null) {
		$this->Eleicao->id = $id;
		if (!$this->Eleicao->exists()) {
			throw new NotFoundException(__('Invalid Eleicao'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Eleicao->delete()) {
			$this->Session->setFlash(__('The Eleicao has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The Eleicao could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index', $idCity, $tipo));
	}
}