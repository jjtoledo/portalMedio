<?php
App::uses('AppController', 'Controller');
/**
 * OrgaoSaudes Controller
 *
 * @property OrgaoSaude $OrgaoSaude
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class OrgaoSaudesController extends AppController {

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
				'OrgaoSaude.cidade_id' => $id
			)
		);
		$this->set('orgaoSaudes', $this->Paginator->paginate());

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
		if (!$this->OrgaoSaude->exists($id)) {
			throw new NotFoundException(__('Invalid OrgaoSaude'));
		}
		$options = array('conditions' => array('OrgaoSaude.' . $this->OrgaoSaude->primaryKey => $id));
		$this->set('orgaoSaude', $this->OrgaoSaude->find('first', $options));

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
		$this->request->data['OrgaoSaude']['cidade_id'] = $id;

		if ($this->request->is('post')) {
			$this->OrgaoSaude->create();
			if ($this->OrgaoSaude->save($this->request->data)) {
				$this->Session->setFlash(__('The OrgaoSaude has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $id));
			} else {
				$this->Session->setFlash(__('The OrgaoSaude could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		$this->request->data['OrgaoSaude']['cidade_id'] = $id;

		if ($this->request->is('post')) {
			$this->OrgaoSaude->create();
			if ($this->OrgaoSaude->save($this->request->data)) {
				$this->Session->setFlash(__('The OrgaoSaude has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $id));
			} else {
				$this->Session->setFlash(__('The OrgaoSaude could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->OrgaoSaude->exists($id)) {
			throw new NotFoundException(__('Invalid OrgaoSaude'));
		}

		$this->request->data['OrgaoSaude']['cidade_id'] = $idCity;

		if ($this->request->is(array('post', 'put'))) {
			if ($this->OrgaoSaude->save($this->request->data)) {
				$this->Session->setFlash(__('The OrgaoSaude has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $idCity));
			} else {
				$this->Session->setFlash(__('The OrgaoSaude could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('OrgaoSaude.' . $this->OrgaoSaude->primaryKey => $id));
			$this->request->data = $this->OrgaoSaude->find('first', $options);
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
		$this->OrgaoSaude->id = $id;
		if (!$this->OrgaoSaude->exists()) {
			throw new NotFoundException(__('Invalid OrgaoSaude'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->OrgaoSaude->delete()) {
			$this->Session->setFlash(__('The OrgaoSaude has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The OrgaoSaude could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index', $idCity));
	}
}
