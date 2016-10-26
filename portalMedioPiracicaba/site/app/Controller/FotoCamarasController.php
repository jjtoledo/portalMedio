<?php
App::uses('AppController', 'Controller');
/**
 * FotoCamaras Controller
 *
 * @property FotoCamara $FotoCamara
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class FotoCamarasController extends AppController {

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
				'FotoCamara.camara_id' => $id
			)
		);
		$this->set('fotoCamaras', $this->Paginator->paginate());

		$this->loadModel('Camara');
		$options = array('conditions' => array('Camara.' . $this->Camara->primaryKey => $id));
		$this->set('camara', $this->Camara->find('first', $options));
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null, $idDist = null) {
		if (!$this->FotoCamara->exists($id)) {
			throw new NotFoundException(__('Invalid Foto'));
		}
		$options = array('conditions' => array('FotoCamara.' . $this->FotoCamara->primaryKey => $id));
		$this->set('fotoCamara', $this->FotoCamara->find('first', $options));

		$this->loadModel('Camara');
		$options = array('conditions' => array('Camara.' . $this->Camara->primaryKey => $idDist));
		$this->set('camara', $this->Camara->find('first', $options));

		$this->set('id', $id);
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
		$this->request->data['FotoCamara']['camara_id'] = $id;
		
		$this->loadModel('Camara');
		$options = array('conditions' => array('Camara.' . $this->Camara->primaryKey => $id));
		$this->set('camara', $this->Camara->find('first', $options));

		$photo = array();
		if ($this->request->is('post')) {				
			for ($i=0; $i < sizeof($this->request->data['FotoCamara']['fotos']); $i++) { 
				$photo = array('FotoCamara' => 
							array('camara_id' => $this->request->data['FotoCamara']['camara_id'],
									'foto' => $this->request->data['FotoCamara']['fotos'][$i]));
				$this->FotoCamara->create();			
				if (!$this->FotoCamara->save($photo)) {
					//debug($this->request->data['FotoCamara']['fotos']);
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
	public function edit($id = null, $idDist = null) {
		if (!$this->FotoCamara->exists($id)) {
			throw new NotFoundException(__('Invalid Foto'));
		}

		$this->request->data['FotoCamara']['camara_id'] = $idDist;

		if ($this->request->is(array('post', 'put'))) {
			if ($this->FotoCamara->save($this->request->data)) {
				$this->Session->setFlash(__('The Foto has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $idDist));
			} else {
				$this->Session->setFlash(__('The Foto could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('FotoCamara.' . $this->FotoCamara->primaryKey => $id));
			$this->request->data = $this->FotoCamara->find('first', $options);
		}
		
		$this->loadModel('Camara');
		$options = array('conditions' => array('Camara.' . $this->Camara->primaryKey => $idDist));
		$this->set('camara', $this->Camara->find('first', $options));

		$this->set('id', $id);
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null, $idDist = null) {
		$this->FotoCamara->id = $id;
		if (!$this->FotoCamara->exists()) {
			throw new NotFoundException(__('Invalid Foto'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->FotoCamara->delete()) {
			$this->Session->setFlash(__('The Foto has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The Foto could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index', $idDist));
	}
}
