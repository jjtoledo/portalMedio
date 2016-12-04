<?php
App::uses('AppController', 'Controller');
/**
 * FotoEspacos Controller
 *
 * @property FotoEspaco $FotoEspaco
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class FotoEspacosController extends AppController {

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
				'FotoEspaco.espaco_evento_id' => $id
			)
		);
		$this->set('fotoEspacos', $this->Paginator->paginate());

		$this->loadModel('EspacoEvento');
		$options = array('conditions' => array('EspacoEvento.' . $this->EspacoEvento->primaryKey => $id));
		$this->set('espaco', $this->EspacoEvento->find('first', $options));
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null, $idEspaco = null) {
		if (!$this->FotoEspaco->exists($id)) {
			throw new NotFoundException(__('Invalid Foto'));
		}
		$options = array('conditions' => array('FotoEspaco.' . $this->FotoEspaco->primaryKey => $id));
		$this->set('fotoEspaco', $this->FotoEspaco->find('first', $options));

		$this->loadModel('EspacoEvento');
		$options = array('conditions' => array('EspacoEvento.' . $this->EspacoEvento->primaryKey => $idEspaco));
		$this->set('espaco', $this->EspacoEvento->find('first', $options));

		$this->set('id', $id);
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
		$this->request->data['FotoEspaco']['espaco_evento_id'] = $id;
		
		$this->loadModel('EspacoEvento');
		$options = array('conditions' => array('EspacoEvento.' . $this->EspacoEvento->primaryKey => $id));
		$this->set('espaco', $this->EspacoEvento->find('first', $options));

		$photo = array();
		if ($this->request->is('post')) {				
			for ($i=0; $i < sizeof($this->request->data['FotoEspaco']['fotos']); $i++) { 
				$photo = array('FotoEspaco' => 
							array('espaco_evento_id' => $this->request->data['FotoEspaco']['espaco_evento_id'],
									'foto' => $this->request->data['FotoEspaco']['fotos'][$i]));
				$this->FotoEspaco->create();			
				if (!$this->FotoEspaco->save($photo)) {
					//debug($this->request->data['FotoEspaco']['fotos']);
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
	public function edit($id = null, $idEspaco = null) {
		if (!$this->FotoEspaco->exists($id)) {
			throw new NotFoundException(__('Invalid Foto'));
		}

		$this->request->data['FotoEspaco']['espaco_evento_id'] = $idEspaco;

		if ($this->request->is(array('post', 'put'))) {
			debug($this->request->data);
			if ($this->FotoEspaco->save($this->request->data)) {
				$this->Session->setFlash(__('The Foto has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $idEspaco));
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
	public function delete($id = null, $idEspaco = null) {
		$this->FotoEspaco->id = $id;
		if (!$this->FotoEspaco->exists()) {
			throw new NotFoundException(__('Invalid Foto'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->FotoEspaco->delete()) {
			$this->Session->setFlash(__('The Foto has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The Foto could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index', $idEspaco));
	}
}
