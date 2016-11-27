<?php
App::uses('AppController', 'Controller');
/**
 * Prestadors Controller
 *
 * @property Prestador $Prestador
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class PrestadorsController extends AppController {

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
				'Prestador.cidade_id' => $id
			)
		);
		$this->set('prestadors', $this->Paginator->paginate());

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
		if (!$this->Prestador->exists($id)) {
			throw new NotFoundException(__('Invalid Prestador'));
		}
		$options = array('conditions' => array('Prestador.' . $this->Prestador->primaryKey => $id));
		$this->set('prestador', $this->Prestador->find('first', $options));

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
		$this->request->data['Prestador']['cidade_id'] = $id;

		if ($this->request->is('post')) {
			$this->Prestador->create();
			if ($this->Prestador->save($this->request->data)) {
				$this->Session->setFlash(__('The Prestador has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $id));
			} else {
				$this->Session->setFlash(__('The Prestador could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		
		$this->loadModel('Cidade');
		$options = array('conditions' => array('Cidade.' . $this->Cidade->primaryKey => $id));
		$this->set('cidade', $this->Cidade->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add_bloco($id = null) {
		$this->request->data['Prestador']['cidade_id'] = $id;

		if ($this->request->is('post')) {
			$this->Prestador->create();
			if ($this->Prestador->save($this->request->data)) {
				$this->Session->setFlash(__('The Prestador has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $id));
			} else {
				$this->Session->setFlash(__('The Prestador could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->Prestador->exists($id)) {
			throw new NotFoundException(__('Invalid Prestador'));
		}

		$this->request->data['Prestador']['cidade_id'] = $idCity;

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Prestador->save($this->request->data)) {
				$this->Session->setFlash(__('The Prestador has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $idCity));
			} else {
				$this->Session->setFlash(__('The Prestador could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Prestador.' . $this->Prestador->primaryKey => $id));
			$this->request->data = $this->Prestador->find('first', $options);
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
		$this->Prestador->id = $id;
		if (!$this->Prestador->exists()) {
			throw new NotFoundException(__('Invalid Prestador'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Prestador->delete()) {
			$this->Session->setFlash(__('The Prestador has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The Prestador could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index', $idCity));
	}
}