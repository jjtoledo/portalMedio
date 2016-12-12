<?php
App::uses('AppController', 'Controller');
/**
 * Comissaos Controller
 *
 * @property Comissao $Comissao
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class ComissaosController extends AppController {

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
	public function index($id = null) {
		$this->Paginator->settings = array(
			'conditions' => array(
				'Comissao.cidade_id' => $id,
				'Comissao.id !=' => 6
			)
		);
		$this->set('comissaos', $this->Paginator->paginate());

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
		if (!$this->Comissao->exists($id)) {
			throw new NotFoundException(__('Invalid Comissao'));
		}
		$options = array('conditions' => array('Comissao.' . $this->Comissao->primaryKey => $id));
		$this->set('comissao', $this->Comissao->find('first', $options));

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
		$this->request->data['Comissao']['cidade_id'] = $id;

		if ($this->request->is('post')) {
			$this->Comissao->create();
			if ($this->Comissao->save($this->request->data)) {
				$this->Session->setFlash(__('The Comissao has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $id));
			} else {
				$this->Session->setFlash(__('The Comissao could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->Comissao->exists($id)) {
			throw new NotFoundException(__('Invalid Comissao'));
		}

		$this->request->data['Comissao']['cidade_id'] = $idCity;

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Comissao->save($this->request->data)) {
				$this->Session->setFlash(__('The Comissao has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $idCity));
			} else {
				$this->Session->setFlash(__('The Comissao could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Comissao.' . $this->Comissao->primaryKey => $id));
			$this->request->data = $this->Comissao->find('first', $options);
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
		$this->Comissao->id = $id;
		if (!$this->Comissao->exists()) {
			throw new NotFoundException(__('Invalid Comissao'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Comissao->delete()) {
			$this->Session->setFlash(__('The Comissao has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The Comissao could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index', $idCity));
	}
}