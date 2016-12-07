<?php
App::uses('AppController', 'Controller');
/**
 * OrgaoPublicos Controller
 *
 * @property OrgaoPublico $OrgaoPublico
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class OrgaoPublicosController extends AppController {

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
				'OrgaoPublico.cidade_id' => $id
			)
		);
		$this->set('orgaoPublicos', $this->Paginator->paginate());

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
	public function view($id = null, $idCity = null) {
		if (!$this->OrgaoPublico->exists($id)) {
			throw new NotFoundException(__('Invalid OrgaoPublico'));
		}
		$options = array('conditions' => array('OrgaoPublico.' . $this->OrgaoPublico->primaryKey => $id));
		$this->set('orgaoPublico', $this->OrgaoPublico->find('first', $options));

		$this->loadModel('Cidade');
		$options = array('conditions' => array('Cidade.' . $this->Cidade->primaryKey => $idCity));
		$this->set('cidade', $this->Cidade->find('first', $options));

		$this->set('id', $id);	
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
		$this->request->data['OrgaoPublico']['cidade_id'] = $id;

		if ($this->request->is('post')) {
			$this->OrgaoPublico->create();
			if ($this->OrgaoPublico->save($this->request->data)) {
				$this->Session->setFlash(__('The OrgaoPublico has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $id));
			} else {
				$this->Session->setFlash(__('The OrgaoPublico could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		
		$this->loadModel('Cidade');
		$options = array('conditions' => array('Cidade.' . $this->Cidade->primaryKey => $id));
		$this->set('cidade', $this->Cidade->find('first', $options));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null, $idCity = null) {
		if (!$this->OrgaoPublico->exists($id)) {
			throw new NotFoundException(__('Invalid OrgaoPublico'));
		}

		$this->request->data['OrgaoPublico']['cidade_id'] = $idCity;

		if ($this->request->is(array('post', 'put'))) {
			if ($this->request->data['OrgaoPublico']['delete'] == '1') {
				$this->request->data['OrgaoPublico']['foto_anuncio'] = '';
			}

			if ($this->OrgaoPublico->save($this->request->data)) {
				$this->Session->setFlash(__('The OrgaoPublico has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $idCity));
			} else {
				$this->Session->setFlash(__('The OrgaoPublico could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('OrgaoPublico.' . $this->OrgaoPublico->primaryKey => $id));
			$this->request->data = $this->OrgaoPublico->find('first', $options);
		}
		
		$this->loadModel('Cidade');
		$options = array('conditions' => array('Cidade.' . $this->Cidade->primaryKey => $idCity));
		$this->set('cidade', $this->Cidade->find('first', $options));

		$this->set('id', $id);
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null, $idCity = null) {
		$this->OrgaoPublico->id = $id;
		if (!$this->OrgaoPublico->exists()) {
			throw new NotFoundException(__('Invalid OrgaoPublico'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->OrgaoPublico->delete()) {
			$this->Session->setFlash(__('The OrgaoPublico has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The OrgaoPublico could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index', $idCity));
	}
}
