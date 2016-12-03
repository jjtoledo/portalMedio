<?php
App::uses('AppController', 'Controller');
/**
 * Camaras Controller
 *
 * @property Camara $Camara
 * @property PaginatorComponent $Paginator
 */
class CamarasController extends AppController {

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
 * add method
 *
 * @return void
 */
	public function add($id = null, $idCity = null) {
		if ($id != null && $idCity != null) {
			$this->redirect(array('action' => 'edit', $id, $idCity));
		}

		$this->request->data['Camara']['cidade_id'] = $id;

		if ($this->request->is('post')) {
			$this->Camara->create();
			if ($this->Camara->save($this->request->data)) {
				$this->Session->setFlash(__('The camara has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view', $this->Camara->id, $id));
			} else {
				$this->Session->setFlash(__('The camara could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}

		$this->set('id', $id);

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
		if (!$this->Camara->exists($id)) {
			throw new NotFoundException(__('Invalid camara'));
		}

		$this->request->data['Camara']['cidade_id'] = $idCity;

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Camara->save($this->request->data)) {
				$this->Session->setFlash(__('The camara has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view', $id, $idCity));
			} else {
				$this->Session->setFlash(__('The camara could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Camara.' . $this->Camara->primaryKey => $id));
			$this->request->data = $this->Camara->find('first', $options);
		}

		$this->set('idCity', $idCity);
		$this->set('id', $id);

		$this->loadModel('Cidade');
		$options = array('conditions' => array('Cidade.' . $this->Cidade->primaryKey => $idCity));
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
		if (!$this->Camara->exists($id)) {
			throw new NotFoundException(__('Invalid camara'));
		}
		$options = array('conditions' => array('Camara.' . $this->Camara->primaryKey => $id));
		$this->set('camara', $this->Camara->find('first', $options));

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
		$this->Camara->id = $id;
		if (!$this->Camara->exists()) {
			throw new NotFoundException(__('Invalid camara'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Camara->delete()) {
			$this->Session->setFlash(__('The camara has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The camara could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'add', $idCity));
	}
}
