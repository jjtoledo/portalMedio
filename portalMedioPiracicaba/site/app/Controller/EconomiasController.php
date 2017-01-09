<?php
App::uses('AppController', 'Controller');
/**
 * Economias Controller
 *
 * @property Economia $Economia
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class EconomiasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

	public $helpers = array('Tinymce');

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
				'Economia.cidade_id' => $id,
				'Economia.tipo' => $tipo
			)
		);
		$this->set('economias', $this->Paginator->paginate());

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
		if (!$this->Economia->exists($id)) {
			throw new NotFoundException(__('Invalid Economia'));
		}
		$options = array('conditions' => array('Economia.' . $this->Economia->primaryKey => $id));
		$this->set('economia', $this->Economia->find('first', $options));

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
		$this->request->data['Economia']['cidade_id'] = $id;
		$this->request->data['Economia']['tipo'] = $tipo;

		if ($this->request->is('post')) {
			$this->Economia->create();
			if ($this->Economia->save($this->request->data)) {
				$this->Session->setFlash(__('The Economia has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $id, $tipo));
			} else {
				$this->Session->setFlash(__('The Economia could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		
		$this->loadModel('Cidade');
		$options = array('conditions' => array('Cidade.' . $this->Cidade->primaryKey => $id));
		$this->set('cidade', $this->Cidade->find('first', $options));

		$this->set('tipo', $tipo);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null, $idCity = null, $tipo = null) {
		if (!$this->Economia->exists($id)) {
			throw new NotFoundException(__('Invalid Economia'));
		}

		$this->request->data['Economia']['cidade_id'] = $idCity;

		if ($this->request->is(array('post', 'put'))) {			
			if ($this->Economia->save($this->request->data)) {
				$this->Session->setFlash(__('The Economia has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $idCity, $tipo));
			} else {
				$this->Session->setFlash(__('The Economia could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Economia.' . $this->Economia->primaryKey => $id));
			$this->request->data = $this->Economia->find('first', $options);
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
		$this->Economia->id = $id;
		if (!$this->Economia->exists()) {
			throw new NotFoundException(__('Invalid Economia'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Economia->delete()) {
			$this->Session->setFlash(__('The Economia has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The Economia could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index', $idCity, $tipo));
	}

	/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete_foto($id = null, $idCity = null, $tipo = null) {
		$this->Economia->id = $id;
		if (!$this->Economia->exists()) {
			throw new NotFoundException(__('Invalid Economia'));
		}
		
		$this->Economia->updateAll(array('foto'=>null),array('Economia.id' => $id));
		return $this->redirect(array('action' => 'view', $id, $idCity, $tipo));
	}
}
