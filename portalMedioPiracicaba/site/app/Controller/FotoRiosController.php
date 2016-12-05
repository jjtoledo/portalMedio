<?php
App::uses('AppController', 'Controller');
/**
 * FotoRios Controller
 *
 * @property FotoRio $FotoRio
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class FotoRiosController extends AppController {

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
				'FotoRio.rio_id' => $id
			)
		);
		$this->set('fotoRios', $this->Paginator->paginate());

		$this->loadModel('Rio');
		$options = array('conditions' => array('Rio.' . $this->Rio->primaryKey => $id));
		$this->set('rio', $this->Rio->find('first', $options));
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null, $idRio = null) {
		if (!$this->FotoRio->exists($id)) {
			throw new NotFoundException(__('Invalid Foto'));
		}
		$options = array('conditions' => array('FotoRio.' . $this->FotoRio->primaryKey => $id));
		$this->set('fotoRio', $this->FotoRio->find('first', $options));

		$this->loadModel('Rio');
		$options = array('conditions' => array('Rio.' . $this->Rio->primaryKey => $idRio));
		$this->set('rio', $this->Rio->find('first', $options));

		$this->set('id', $id);
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
		$this->request->data['FotoRio']['rio_id'] = $id;
		
		$this->loadModel('Rio');
		$options = array('conditions' => array('Rio.' . $this->Rio->primaryKey => $id));
		$this->set('rio', $this->Rio->find('first', $options));

		$photo = array();
		if ($this->request->is('post')) {				
			for ($i=0; $i < sizeof($this->request->data['FotoRio']['fotos']); $i++) { 
				$photo = array('FotoRio' => 
							array('rio_id' => $this->request->data['FotoRio']['rio_id'],
									'foto' => $this->request->data['FotoRio']['fotos'][$i]));
				$this->FotoRio->create();			
				if (!$this->FotoRio->save($photo)) {
					//debug($this->request->data['FotoRio']['fotos']);
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
	public function edit($id = null, $idRio = null) {
		if (!$this->FotoRio->exists($id)) {
			throw new NotFoundException(__('Invalid Foto'));
		}

		$this->request->data['FotoRio']['rio_id'] = $idRio;

		if ($this->request->is(array('post', 'put'))) {
			if ($this->FotoRio->save($this->request->data)) {
				$this->Session->setFlash(__('The Foto has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $idRio));
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
	public function delete($id = null, $idRio = null) {
		$this->FotoRio->id = $id;
		if (!$this->FotoRio->exists()) {
			throw new NotFoundException(__('Invalid Foto'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->FotoRio->delete()) {
			$this->Session->setFlash(__('The Foto has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The Foto could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index', $idRio));
	}
}
