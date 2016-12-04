<?php
App::uses('AppController', 'Controller');
/**
 * FotoSaudes Controller
 *
 * @property FotoSaude $FotoSaude
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class FotoSaudesController extends AppController {

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
				'FotoSaude.orgao_saude_id' => $id
			)
		);
		$this->set('fotoSaudes', $this->Paginator->paginate());

		$this->loadModel('OrgaoSaude');
		$options = array('conditions' => array('OrgaoSaude.' . $this->OrgaoSaude->primaryKey => $id));
		$this->set('saude', $this->OrgaoSaude->find('first', $options));
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null, $idSaude = null) {
		if (!$this->FotoSaude->exists($id)) {
			throw new NotFoundException(__('Invalid Foto'));
		}
		$options = array('conditions' => array('FotoSaude.' . $this->FotoSaude->primaryKey => $id));
		$this->set('fotoSaude', $this->FotoSaude->find('first', $options));

		$this->loadModel('OrgaoSaude');
		$options = array('conditions' => array('OrgaoSaude.' . $this->OrgaoSaude->primaryKey => $idSaude));
		$this->set('saude', $this->OrgaoSaude->find('first', $options));

		$this->set('id', $id);
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
		$this->request->data['FotoSaude']['orgao_saude_id'] = $id;
		
		$this->loadModel('OrgaoSaude');
		$options = array('conditions' => array('OrgaoSaude.' . $this->OrgaoSaude->primaryKey => $id));
		$this->set('saude', $this->OrgaoSaude->find('first', $options));

		$photo = array();
		if ($this->request->is('post')) {				
			for ($i=0; $i < sizeof($this->request->data['FotoSaude']['fotos']); $i++) { 
				$photo = array('FotoSaude' => 
							array('orgao_saude_id' => $this->request->data['FotoSaude']['orgao_saude_id'],
									'foto' => $this->request->data['FotoSaude']['fotos'][$i]));
				$this->FotoSaude->create();			
				if (!$this->FotoSaude->save($photo)) {
					//debug($this->request->data['FotoSaude']['fotos']);
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
	public function edit($id = null, $idSaude = null) {
		if (!$this->FotoSaude->exists($id)) {
			throw new NotFoundException(__('Invalid Foto'));
		}

		$this->request->data['FotoSaude']['orgao_saude_id'] = $idSaude;

		if ($this->request->is(array('post', 'put'))) {
			debug($this->request->data);
			if ($this->FotoSaude->save($this->request->data)) {
				$this->Session->setFlash(__('The Foto has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $idSaude));
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
	public function delete($id = null, $idSaude = null) {
		$this->FotoSaude->id = $id;
		if (!$this->FotoSaude->exists()) {
			throw new NotFoundException(__('Invalid Foto'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->FotoSaude->delete()) {
			$this->Session->setFlash(__('The Foto has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The Foto could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index', $idSaude));
	}
}
