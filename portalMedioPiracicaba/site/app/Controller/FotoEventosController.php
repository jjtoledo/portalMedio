<?php
App::uses('AppController', 'Controller');
/**
 * FotoEventos Controller
 *
 * @property FotoEvento $FotoEvento
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class FotoEventosController extends AppController {

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
				'FotoEvento.evento_id' => $id
			)
		);
		$this->set('fotoEventos', $this->Paginator->paginate());

		$this->loadModel('Evento');
		$options = array('conditions' => array('Evento.' . $this->Evento->primaryKey => $id));
		$this->set('evento', $this->Evento->find('first', $options));
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null, $idEvento = null) {
		if (!$this->FotoEvento->exists($id)) {
			throw new NotFoundException(__('Invalid Foto'));
		}
		$options = array('conditions' => array('FotoEvento.' . $this->FotoEvento->primaryKey => $id));
		$this->set('fotoEvento', $this->FotoEvento->find('first', $options));

		$this->loadModel('Evento');
		$options = array('conditions' => array('Evento.' . $this->Evento->primaryKey => $idEvento));
		$this->set('evento', $this->Evento->find('first', $options));

		$this->set('id', $id);
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
		$this->request->data['FotoEvento']['evento_id'] = $id;
		
		$this->loadModel('Evento');
		$options = array('conditions' => array('Evento.' . $this->Evento->primaryKey => $id));
		$this->set('evento', $this->Evento->find('first', $options));

		$photo = array();
		if ($this->request->is('post')) {				
			for ($i=0; $i < sizeof($this->request->data['FotoEvento']['fotos']); $i++) { 
				$photo = array('FotoEvento' => 
							array('evento_id' => $this->request->data['FotoEvento']['evento_id'],
									'foto' => $this->request->data['FotoEvento']['fotos'][$i]));
				$this->FotoEvento->create();			
				if (!$this->FotoEvento->save($photo)) {
					//debug($this->request->data['FotoEvento']['fotos']);
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
	public function edit($id = null, $idEvento = null) {
		if (!$this->FotoEvento->exists($id)) {
			throw new NotFoundException(__('Invalid Foto'));
		}

		$this->request->data['FotoEvento']['evento_id'] = $idEvento;

		if ($this->request->is(array('post', 'put'))) {
			debug($this->request->data);
			if ($this->FotoEvento->save($this->request->data)) {
				$this->Session->setFlash(__('The Foto has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $idEvento));
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
	public function delete($id = null, $idEvento = null) {
		$this->FotoEvento->id = $id;
		if (!$this->FotoEvento->exists()) {
			throw new NotFoundException(__('Invalid Foto'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->FotoEvento->delete()) {
			$this->Session->setFlash(__('The Foto has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The Foto could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index', $idEvento));
	}
}
