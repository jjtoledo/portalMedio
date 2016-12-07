<?php
App::uses('AppController', 'Controller');
/**
 * EspacoEventos Controller
 *
 * @property EspacoEvento $EspacoEvento
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class EspacoEventosController extends AppController {

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
				'EspacoEvento.cidade_id' => $id
			)
		);
		$this->set('espacoEventos', $this->Paginator->paginate());

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
		if (!$this->EspacoEvento->exists($id)) {
			throw new NotFoundException(__('Invalid EspacoEvento'));
		}
		$options = array('conditions' => array('EspacoEvento.' . $this->EspacoEvento->primaryKey => $id));
		$this->set('espacoEvento', $this->EspacoEvento->find('first', $options));

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
		$this->request->data['EspacoEvento']['cidade_id'] = $id;

		if ($this->request->is('post')) {
			$this->EspacoEvento->create();
			if ($this->EspacoEvento->save($this->request->data)) {
				$this->Session->setFlash(__('The EspacoEvento has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $id));
			} else {
				$this->Session->setFlash(__('The EspacoEvento could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->EspacoEvento->exists($id)) {
			throw new NotFoundException(__('Invalid EspacoEvento'));
		}

		$this->request->data['EspacoEvento']['cidade_id'] = $idCity;

		if ($this->request->is(array('post', 'put'))) {
			if ($this->request->data['EspacoEvento']['delete'] == '1') {
				$this->request->data['EspacoEvento']['foto_anuncio'] = '';
			}

			if ($this->EspacoEvento->save($this->request->data)) {
				$this->Session->setFlash(__('The EspacoEvento has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $idCity));
			} else {
				$this->Session->setFlash(__('The EspacoEvento could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('EspacoEvento.' . $this->EspacoEvento->primaryKey => $id));
			$this->request->data = $this->EspacoEvento->find('first', $options);
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
		$this->EspacoEvento->id = $id;
		if (!$this->EspacoEvento->exists()) {
			throw new NotFoundException(__('Invalid EspacoEvento'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->EspacoEvento->delete()) {
			$this->Session->setFlash(__('The EspacoEvento has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The EspacoEvento could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index', $idCity));
	}
}
