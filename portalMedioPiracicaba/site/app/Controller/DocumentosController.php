<?php
App::uses('AppController', 'Controller');
/**
 * Documentos Controller
 *
 * @property Documento $Documento
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class DocumentosController extends AppController {

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
				'Documento.cidade_id' => $id
			)
		);
		$this->set('documentos', $this->Paginator->paginate());

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
		if (!$this->Documento->exists($id)) {
			throw new NotFoundException(__('Invalid Documento'));
		}
		$options = array('conditions' => array('Documento.' . $this->Documento->primaryKey => $id));
		$this->set('documento', $this->Documento->find('first', $options));

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
		$this->request->data['Documento']['cidade_id'] = $id;

		if ($this->request->is('post')) {
			$this->Documento->create();
			if ($this->Documento->save($this->request->data)) {
				$this->Session->setFlash(__('The Documento has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $id));
			} else {
				$this->Session->setFlash(__('The Documento could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->Documento->exists($id)) {
			throw new NotFoundException(__('Invalid Documento'));
		}

		$this->request->data['Documento']['cidade_id'] = $idCity;

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Documento->save($this->request->data)) {
				$this->Session->setFlash(__('The Documento has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $idCity));
			} else {
				$this->Session->setFlash(__('The Documento could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Documento.' . $this->Documento->primaryKey => $id));
			$this->request->data = $this->Documento->find('first', $options);
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
		$this->Documento->id = $id;
		if (!$this->Documento->exists()) {
			throw new NotFoundException(__('Invalid Documento'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Documento->delete()) {
			$this->Session->setFlash(__('The Documento has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The Documento could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index', $idCity));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete_foto($id = null, $idCity = null) {
		$this->Documento->id = $id;
		if (!$this->Documento->exists()) {
			throw new NotFoundException(__('Invalid Documento'));
		}
		
		$this->Documento->updateAll(array('foto_anuncio'=>null),array('Documento.id' => $id));
		return $this->redirect(array('action' => 'view', $id, $idCity));
	}
}