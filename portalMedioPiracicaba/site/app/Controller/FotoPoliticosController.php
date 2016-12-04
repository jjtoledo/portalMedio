<?php
App::uses('AppController', 'Controller');
/**
 * FotoPoliticos Controller
 *
 * @property FotoPolitico $FotoPolitico
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class FotoPoliticosController extends AppController {

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
				'FotoPolitico.politico_id' => $id
			)
		);
		$this->set('fotoPoliticos', $this->Paginator->paginate());

		$this->loadModel('Politico');
		$options = array('conditions' => array('Politico.' . $this->Politico->primaryKey => $id));
		$this->set('politico', $this->Politico->find('first', $options));
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null, $idPolitico = null) {
		if (!$this->FotoPolitico->exists($id)) {
			throw new NotFoundException(__('Invalid Foto'));
		}
		$options = array('conditions' => array('FotoPolitico.' . $this->FotoPolitico->primaryKey => $id));
		$this->set('fotoPolitico', $this->FotoPolitico->find('first', $options));

		$this->loadModel('Politico');
		$options = array('conditions' => array('Politico.' . $this->Politico->primaryKey => $idPolitico));
		$this->set('politico', $this->Politico->find('first', $options));

		$this->set('id', $id);
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
		$this->request->data['FotoPolitico']['politico_id'] = $id;
		
		$this->loadModel('Politico');
		$options = array('conditions' => array('Politico.' . $this->Politico->primaryKey => $id));
		$this->set('politico', $this->Politico->find('first', $options));

		$photo = array();
		if ($this->request->is('post')) {				
			for ($i=0; $i < sizeof($this->request->data['FotoPolitico']['fotos']); $i++) { 
				$photo = array('FotoPolitico' => 
							array('politico_id' => $this->request->data['FotoPolitico']['politico_id'],
									'foto' => $this->request->data['FotoPolitico']['fotos'][$i]));
				$this->FotoPolitico->create();			
				if (!$this->FotoPolitico->save($photo)) {
					//debug($this->request->data['FotoPolitico']['fotos']);
					$this->Session->setFlash(__('The Foto could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
				}
			}
			$this->Session->setFlash(__('The Foto has been saved.'), 'default', array('class' => '	alert alert-success'));
			return $this->redirect(array('action' => 'index', $id));
		}

	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null, $idPolitico = null) {
		if (!$this->FotoPolitico->exists($id)) {
			throw new NotFoundException(__('Invalid Foto'));
		}

		$this->request->data['FotoPolitico']['politico_id'] = $idPolitico;

		if ($this->request->is(array('post', 'put'))) {
			debug($this->request->data);
			if ($this->FotoPolitico->save($this->request->data)) {
				$this->Session->setFlash(__('The Foto has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $idPolitico));
			} else {
				$this->Session->setFlash(__('The Foto could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null, $idPolitico = null) {
		$this->FotoPolitico->id = $id;
		if (!$this->FotoPolitico->exists()) {
			throw new NotFoundException(__('Invalid Foto'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->FotoPolitico->delete()) {
			$this->Session->setFlash(__('The Foto has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The Foto could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index', $idPolitico));
	}
}
