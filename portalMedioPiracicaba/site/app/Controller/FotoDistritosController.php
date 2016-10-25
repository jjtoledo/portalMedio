<?php
App::uses('AppController', 'Controller');
/**
 * FotoDistritos Controller
 *
 * @property FotoDistrito $FotoDistrito
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class FotoDistritosController extends AppController {

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
				'FotoDistrito.distrito_id' => $id
			)
		);
		$this->set('fotoDistritos', $this->Paginator->paginate());

		$this->loadModel('Distrito');
		$options = array('conditions' => array('Distrito.' . $this->Distrito->primaryKey => $id));
		$this->set('distrito', $this->Distrito->find('first', $options));
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null, $idDist = null) {
		if (!$this->FotoDistrito->exists($id)) {
			throw new NotFoundException(__('Invalid Foto'));
		}
		$options = array('conditions' => array('FotoDistrito.' . $this->FotoDistrito->primaryKey => $id));
		$this->set('fotoDistrito', $this->FotoDistrito->find('first', $options));

		$this->loadModel('Distrito');
		$options = array('conditions' => array('Distrito.' . $this->Distrito->primaryKey => $idDist));
		$this->set('distrito', $this->Distrito->find('first', $options));

		$this->set('id', $id);
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
		$this->request->data['FotoDistrito']['distrito_id'] = $id;
		
		$this->loadModel('Distrito');
		$options = array('conditions' => array('Distrito.' . $this->Distrito->primaryKey => $id));
		$this->set('distrito', $this->Distrito->find('first', $options));

		$photo = array();
		if ($this->request->is('post')) {				
			for ($i=0; $i < sizeof($this->request->data['FotoDistrito']['fotos']); $i++) { 
				$photo = array('FotoDistrito' => 
							array('distrito_id' => $this->request->data['FotoDistrito']['distrito_id'],
									'foto' => $this->request->data['FotoDistrito']['fotos'][$i]));
				$this->FotoDistrito->create();			
				if (!$this->FotoDistrito->save($photo)) {
					//debug($this->request->data['FotoDistrito']['fotos']);
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
		if (!$this->FotoDistrito->exists($id)) {
			throw new NotFoundException(__('Invalid Foto'));
		}

		$this->request->data['FotoDistrito']['distrito_id'] = $idDist;

		if ($this->request->is(array('post', 'put'))) {
			if ($this->FotoDistrito->save($this->request->data)) {
				$this->Session->setFlash(__('The Foto has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $idDist));
			} else {
				$this->Session->setFlash(__('The Foto could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('FotoDistrito.' . $this->FotoDistrito->primaryKey => $id));
			$this->request->data = $this->FotoDistrito->find('first', $options);
		}
		
		$this->loadModel('Distrito');
		$options = array('conditions' => array('Distrito.' . $this->Distrito->primaryKey => $idDist));
		$this->set('distrito', $this->Distrito->find('first', $options));

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
		$this->FotoDistrito->id = $id;
		if (!$this->FotoDistrito->exists()) {
			throw new NotFoundException(__('Invalid Foto'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->FotoDistrito->delete()) {
			$this->Session->setFlash(__('The Foto has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The Foto could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index', $idDist));
	}
}
