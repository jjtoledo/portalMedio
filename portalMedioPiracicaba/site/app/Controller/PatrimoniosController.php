<?php
App::uses('AppController', 'Controller');
/**
 * Patrimonios Controller
 *
 * @property Patrimonio $Patrimonio
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class PatrimoniosController extends AppController {

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
				'Patrimonio.cidade_id' => $id
			)
		);
		$this->set('patrimonios', $this->Paginator->paginate());

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
		if (!$this->Patrimonio->exists($id)) {
			throw new NotFoundException(__('Invalid Patrimonio'));
		}
		$options = array('conditions' => array('Patrimonio.' . $this->Patrimonio->primaryKey => $id));
		$this->set('patrimonio', $this->Patrimonio->find('first', $options));

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
		$this->request->data['Patrimonio']['cidade_id'] = $id;

		if ($this->request->is('post')) {
			$this->Patrimonio->create();
			if ($this->Patrimonio->save($this->request->data)) {
				$this->Session->setFlash(__('The Patrimonio has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $id));
			} else {
				$this->Session->setFlash(__('The Patrimonio could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->Patrimonio->exists($id)) {
			throw new NotFoundException(__('Invalid Patrimonio'));
		}

		$this->request->data['Patrimonio']['cidade_id'] = $idCity;

		if ($this->request->is(array('post', 'put'))) {
			if ($this->request->data['Patrimonio']['delete'] == '1') {
				$this->request->data['Patrimonio']['foto'] = '';
			} else if ($this->request->data['Patrimonio']['foto']['name'] == '') {
				$x = $this->Patrimonio->findById($id);
				$this->request->data['Patrimonio']['foto'] = $x['Patrimonio']['foto'];
			}

			if ($this->Patrimonio->save($this->request->data)) {
				$this->Session->setFlash(__('The Patrimonio has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $idCity));
			} else {
				$this->Session->setFlash(__('The Patrimonio could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Patrimonio.' . $this->Patrimonio->primaryKey => $id));
			$this->request->data = $this->Patrimonio->find('first', $options);
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
		$this->Patrimonio->id = $id;
		if (!$this->Patrimonio->exists()) {
			throw new NotFoundException(__('Invalid Patrimonio'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Patrimonio->delete()) {
			$this->Session->setFlash(__('The Patrimonio has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The Patrimonio could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index', $idCity));
	}
}