<?php
App::uses('AppController', 'Controller');
/**
 * FotoOrgaos Controller
 *
 * @property FotoOrgao $FotoOrgao
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class FotoOrgaosController extends AppController {

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
				'FotoOrgao.orgao_publico_id' => $id
			)
		);
		$this->set('fotoOrgaos', $this->Paginator->paginate());

		$this->loadModel('OrgaoPublico');
		$options = array('conditions' => array('OrgaoPublico.' . $this->OrgaoPublico->primaryKey => $id));
		$this->set('orgao', $this->OrgaoPublico->find('first', $options));
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null, $idOrgao = null) {
		if (!$this->FotoOrgao->exists($id)) {
			throw new NotFoundException(__('Invalid Foto'));
		}
		$options = array('conditions' => array('FotoOrgao.' . $this->FotoOrgao->primaryKey => $id));
		$this->set('fotoOrgao', $this->FotoOrgao->find('first', $options));

		$this->loadModel('OrgaoPublico');
		$options = array('conditions' => array('OrgaoPublico.' . $this->OrgaoPublico->primaryKey => $idOrgao));
		$this->set('orgao', $this->OrgaoPublico->find('first', $options));

		$this->set('id', $id);
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
		$this->request->data['FotoOrgao']['orgao_publico_id'] = $id;
		
		$this->loadModel('OrgaoPublico');
		$options = array('conditions' => array('OrgaoPublico.' . $this->OrgaoPublico->primaryKey => $id));
		$this->set('orgao', $this->OrgaoPublico->find('first', $options));

		$photo = array();
		if ($this->request->is('post')) {				
			for ($i=0; $i < sizeof($this->request->data['FotoOrgao']['fotos']); $i++) { 
				$photo = array('FotoOrgao' => 
							array('orgao_publico_id' => $this->request->data['FotoOrgao']['orgao_publico_id'],
									'foto' => $this->request->data['FotoOrgao']['fotos'][$i]));
				$this->FotoOrgao->create();			
				if (!$this->FotoOrgao->save($photo)) {
					//debug($this->request->data['FotoOrgao']['fotos']);
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
	public function edit($id = null, $idOrgao = null) {
		if (!$this->FotoOrgao->exists($id)) {
			throw new NotFoundException(__('Invalid Foto'));
		}

		$this->request->data['FotoOrgao']['orgao_publico_id'] = $idOrgao;

		if ($this->request->is(array('post', 'put'))) {
			debug($this->request->data);
			if ($this->FotoOrgao->save($this->request->data)) {
				$this->Session->setFlash(__('The Foto has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $idOrgao));
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
	public function delete($id = null, $idOrgao = null) {
		$this->FotoOrgao->id = $id;
		if (!$this->FotoOrgao->exists()) {
			throw new NotFoundException(__('Invalid Foto'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->FotoOrgao->delete()) {
			$this->Session->setFlash(__('The Foto has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The Foto could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index', $idOrgao));
	}
}
