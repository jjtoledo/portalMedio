<?php
App::uses('AppController', 'Controller');
/**
 * FotoBairros Controller
 *
 * @property FotoBairro $FotoBairro
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class FotoBairrosController extends AppController {

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
				'FotoBairro.distrito_id' => $id
			),
			'order' => array(
				'FotoBairro.id' => 'DESC'
			)
		);
		$this->set('fotoBairros', $this->Paginator->paginate());

		$this->loadModel('Bairro');
		$options = array('conditions' => array('Bairro.' . $this->Bairro->primaryKey => $id));
		$this->set('bairro', $this->Bairro->find('first', $options));
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null, $idDist = null) {
		if (!$this->FotoBairro->exists($id)) {
			throw new NotFoundException(__('Invalid Foto'));
		}
		$options = array('conditions' => array('FotoBairro.' . $this->FotoBairro->primaryKey => $id));
		$this->set('fotoBairro', $this->FotoBairro->find('first', $options));

		$this->loadModel('Bairro');
		$options = array('conditions' => array('Bairro.' . $this->Bairro->primaryKey => $idDist));
		$this->set('bairro', $this->Bairro->find('first', $options));

		$this->set('id', $id);
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
		$this->request->data['FotoBairro']['distrito_id'] = $id;
		
		$this->loadModel('Bairro');
		$options = array('conditions' => array('Bairro.' . $this->Bairro->primaryKey => $id));
		$this->set('bairro', $this->Bairro->find('first', $options));

		$photo = array();
		if ($this->request->is('post')) {				
			for ($i=0; $i < sizeof($this->request->data['FotoBairro']['fotos']); $i++) { 
				$photo = array('FotoBairro' => 
							array('distrito_id' => $this->request->data['FotoBairro']['distrito_id'],
									'foto' => $this->request->data['FotoBairro']['fotos'][$i]));
				$this->FotoBairro->create();			
				if (!$this->FotoBairro->save($photo)) {
					//debug($this->request->data['FotoBairro']['fotos']);
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
		if (!$this->FotoBairro->exists($id)) {
			throw new NotFoundException(__('Invalid Foto'));
		}

		$this->request->data['FotoBairro']['distrito_id'] = $idDist;

		if ($this->request->is(array('post', 'put'))) {
			debug($this->request->data);
			if ($this->FotoBairro->save($this->request->data)) {
				$this->Session->setFlash(__('The Foto has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $idDist));
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
	public function delete($id = null, $idDist = null) {
		$this->FotoBairro->id = $id;
		if (!$this->FotoBairro->exists()) {
			throw new NotFoundException(__('Invalid Foto'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->FotoBairro->delete()) {
			$this->Session->setFlash(__('The Foto has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The Foto could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index', $idDist));
	}
}
