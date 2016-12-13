<?php
App::uses('AppController', 'Controller');
/**
 * PresidenteCamaras Controller
 *
 * @property PresidenteCamara $PresidenteCamara
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class PresidenteCamarasController extends AppController {

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
				'PresidenteCamara.cidade_id' => $id
			),
			'limit' => 50
		);
		$this->set('presidenteCamaras', $this->Paginator->paginate());

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
	public function view($id = null, $idCam = null) {
		if (!$this->PresidenteCamara->exists($id)) {
			throw new NotFoundException(__('Invalid Presidente'));
		}
		$options = array('conditions' => array('PresidenteCamara.' . $this->PresidenteCamara->primaryKey => $id));
		$this->set('presidenteCamara', $this->PresidenteCamara->find('first', $options));

		$this->loadModel('Cidade');
		$options = array('conditions' => array('Cidade.' . $this->Cidade->primaryKey => $idCam));
		$this->set('cidade', $this->Cidade->find('first', $options));

		$this->set('id', $id);
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
		$this->request->data['PresidenteCamara']['cidade_id'] = $id;
		
		$this->loadModel('Cidade');
		$options = array('conditions' => array('Cidade.' . $this->Cidade->primaryKey => $id));
		$this->set('cidade', $this->Cidade->find('first', $options));

		$photo = array();
		if ($this->request->is('post')) {				
			for ($i=0; $i < sizeof($this->request->data['PresidenteCamara']['fotos']); $i++) { 
				$photo = array('PresidenteCamara' => 
							array('cidade_id' => $this->request->data['PresidenteCamara']['cidade_id'],
									'foto' => $this->request->data['PresidenteCamara']['fotos'][$i]));
				$this->PresidenteCamara->create();			
				if (!$this->PresidenteCamara->save($photo)) {
					//debug($this->request->data['PresidenteCamara']['fotos']);
					$this->Session->setFlash(__('The Presidente could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
				}
			}
			$this->Session->setFlash(__('The Presidente has been saved.'), 'default', array('class' => '	alert alert-success'));
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
	public function edit($id = null, $idCam = null) {
		if (!$this->PresidenteCamara->exists($id)) {
			throw new NotFoundException(__('Invalid Presidente'));
		}

		$this->request->data['PresidenteCamara']['cidade_id'] = $idCam;

		if ($this->request->is(array('post', 'put'))) {
			if ($this->PresidenteCamara->save($this->request->data)) {
				$this->Session->setFlash(__('The Foto has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $idCam));
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
	public function delete($id = null, $idCam = null) {
		$this->PresidenteCamara->id = $id;
		if (!$this->PresidenteCamara->exists()) {
			throw new NotFoundException(__('Invalid Presidente'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PresidenteCamara->delete()) {
			$this->Session->setFlash(__('The Presidente has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The Presidente could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index', $idCam));
	}
}
