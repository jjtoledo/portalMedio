<?php
App::uses('AppController', 'Controller');
/**
 * Leis Controller
 *
 * @property Lei $Lei
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class LeisController extends AppController {

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
				'Lei.cidade_id' => $id
			)
		);
		$this->set('leis', $this->Paginator->paginate());

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
		if (!$this->Lei->exists($id)) {
			throw new NotFoundException(__('Invalid Lei'));
		}
		$options = array('conditions' => array('Lei.' . $this->Lei->primaryKey => $id));
		$this->set('lei', $this->Lei->find('first', $options));

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
		$this->request->data['Lei']['cidade_id'] = $id;

		if ($this->request->is('post')) {
			$this->Lei->create();
			if ($this->Lei->save($this->request->data)) {
				$this->Session->setFlash(__('The Lei has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $id));
			} else {
				$this->Session->setFlash(__('The Lei could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->Lei->exists($id)) {
			throw new NotFoundException(__('Invalid Lei'));
		}

		$this->request->data['Lei']['cidade_id'] = $idCity;

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Lei->save($this->request->data)) {
				$this->Session->setFlash(__('The Lei has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $idCity));
			} else {
				$this->Session->setFlash(__('The Lei could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Lei.' . $this->Lei->primaryKey => $id));
			$this->request->data = $this->Lei->find('first', $options);
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
		$this->Lei->id = $id;
		if (!$this->Lei->exists()) {
			throw new NotFoundException(__('Invalid Lei'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Lei->delete()) {
			$this->Session->setFlash(__('The Lei has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The Lei could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index', $idCity));
	}
}