<?php
App::uses('AppController', 'Controller');
/**
 * EmpresaOnibuss Controller
 *
 * @property EmpresaOnibus $EmpresaOnibus
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class EmpresaOnibusesController extends AppController {

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
	public function index($id = null) {
		$this->Paginator->settings = array(
			'conditions' => array(
				'EmpresaOnibus.cidade_id' => $id
			)
		);
		$this->set('empresaOnibuss', $this->Paginator->paginate());

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
		if (!$this->EmpresaOnibus->exists($id)) {
			throw new NotFoundException(__('Invalid EmpresaOnibus'));
		}
		$options = array('conditions' => array('EmpresaOnibus.' . $this->EmpresaOnibus->primaryKey => $id));
		$this->set('empresaOnibus', $this->EmpresaOnibus->find('first', $options));

		$this->loadModel('Cidade');
		$options = array('conditions' => array('Cidade.' . $this->Cidade->primaryKey => $idCity));
		$this->set('cidade', $this->Cidade->find('first', $options));

		$this->set('id', $id);	
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
		$this->request->data['EmpresaOnibus']['cidade_id'] = $id;

		if ($this->request->is('post')) {
			$this->EmpresaOnibus->create();
			if ($this->EmpresaOnibus->save($this->request->data)) {
				$this->Session->setFlash(__('The EmpresaOnibus has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $id));
			} else {
				$this->Session->setFlash(__('The EmpresaOnibus could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
	public function edit($id = null, $idCity = null) {
		if (!$this->EmpresaOnibus->exists($id)) {
			throw new NotFoundException(__('Invalid EmpresaOnibus'));
		}

		$this->request->data['EmpresaOnibus']['cidade_id'] = $idCity;

		if ($this->request->is(array('post', 'put'))) {
			if ($this->EmpresaOnibus->save($this->request->data)) {
				$this->Session->setFlash(__('The EmpresaOnibus has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $idCity));
			} else {
				$this->Session->setFlash(__('The EmpresaOnibus could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('EmpresaOnibus.' . $this->EmpresaOnibus->primaryKey => $id));
			$this->request->data = $this->EmpresaOnibus->find('first', $options);
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
	public function delete($id = null, $idCity = null) {
		$this->EmpresaOnibus->id = $id;
		if (!$this->EmpresaOnibus->exists()) {
			throw new NotFoundException(__('Invalid EmpresaOnibus'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->EmpresaOnibus->delete()) {
			$this->Session->setFlash(__('The EmpresaOnibus has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The EmpresaOnibus could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index', $idCity));
	}
}