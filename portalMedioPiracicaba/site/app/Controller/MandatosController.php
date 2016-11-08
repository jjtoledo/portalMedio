<?php
App::uses('AppController', 'Controller');
/**
 * Mandatos Controller
 *
 * @property Mandato $Mandato
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class MandatosController extends AppController {

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
				'Mandato.politico_id' => $id
			)
		);
		$this->set('mandatos', $this->Paginator->paginate());

		$this->loadModel('Politico');
		$options = array('conditions' => array('Politico.' . $this->Politico->primaryKey => $id));
		$this->set('politico', $this->Politico->find('first', $options));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null, $idPolitico = null) {
		if (!$this->Mandato->exists($id)) {
			throw new NotFoundException(__('Invalid mandato'));
		}
		$options = array('conditions' => array('Mandato.' . $this->Mandato->primaryKey => $id));
		$this->set('mandato', $this->Mandato->find('first', $options));

		$this->loadModel('Politico');
		$options = array('conditions' => array('Politico.' . $this->Politico->primaryKey => $idPolitico));
		$this->set('politico', $this->Politico->find('first', $options));

		$this->set('id', $id);
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
		$this->request->data['Mandato']['politico_id'] = $id;

		if ($this->request->is('post')) {
			$this->Mandato->create();
			if ($this->Mandato->save($this->request->data)) {
				$this->Session->setFlash(__('The mandato has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $id));
			} else {
				$this->Session->setFlash(__('The mandato could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		
		$this->loadModel('Politico');
		$options = array('conditions' => array('Politico.' . $this->Politico->primaryKey => $id));
		$this->set('politico', $this->Politico->find('first', $options));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null, $idPolitico = null) {
		if (!$this->Mandato->exists($id)) {
			throw new NotFoundException(__('Invalid mandato'));
		}

		$this->request->data['Mandato']['politico_id'] = $idPolitico;

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Mandato->save($this->request->data)) {
				$this->Session->setFlash(__('The mandato has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $idPolitico));
			} else {
				$this->Session->setFlash(__('The mandato could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Mandato.' . $this->Mandato->primaryKey => $id));
			$this->request->data = $this->Mandato->find('first', $options);
		}
		
		$this->loadModel('Politico');
		$options = array('conditions' => array('Politico.' . $this->Politico->primaryKey => $idPolitico));
		$this->set('politico', $this->Politico->find('first', $options));

		$this->set('id', $id);
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null, $idPolitico = null) {
		$this->Mandato->id = $id;
		if (!$this->Mandato->exists()) {
			throw new NotFoundException(__('Invalid mandato'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Mandato->delete()) {
			$this->Session->setFlash(__('The mandato has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The mandato could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index', $idPolitico));
	}
}
