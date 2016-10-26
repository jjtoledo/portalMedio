<?php
App::uses('AppController', 'Controller');
/**
 * Mesadiretoras Controller
 *
 * @property Mesadiretora $Mesadiretora
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class MesadiretorasController extends AppController {

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
				'Mesadiretora.camara_id' => $id
			)
		);
		$this->set('mesadiretoras', $this->Paginator->paginate());

		$this->loadModel('Camara');
		$options = array('conditions' => array('Camara.' . $this->Camara->primaryKey => $id));
		$this->set('camara', $this->Camara->find('first', $options));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null, $idEsc = null) {
		if (!$this->Mesadiretora->exists($id)) {
			throw new NotFoundException(__('Invalid mesadiretora'));
		}
		$options = array('conditions' => array('Mesadiretora.' . $this->Mesadiretora->primaryKey => $id));
		$this->set('mesadiretora', $this->Mesadiretora->find('first', $options));

		$this->loadModel('Camara');
		$options = array('conditions' => array('Camara.' . $this->Camara->primaryKey => $idEsc));
		$this->set('camara', $this->Camara->find('first', $options));

		$this->set('id', $id);
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
		$this->request->data['Mesadiretora']['camara_id'] = $id;

		if ($this->request->is('post')) {
			$this->Mesadiretora->create();
			if ($this->Mesadiretora->save($this->request->data)) {
				$this->Session->setFlash(__('The mesadiretora has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $id));
			} else {
				$this->Session->setFlash(__('The mesadiretora could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		
		$this->loadModel('Camara');
		$options = array('conditions' => array('Camara.' . $this->Camara->primaryKey => $id));
		$this->set('camara', $this->Camara->find('first', $options));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null, $idEsc = null) {
		if (!$this->Mesadiretora->exists($id)) {
			throw new NotFoundException(__('Invalid mesadiretora'));
		}

		$this->request->data['Mesadiretora']['camara_id'] = $idEsc;

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Mesadiretora->save($this->request->data)) {
				$this->Session->setFlash(__('The mesadiretora has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $idEsc));
			} else {
				$this->Session->setFlash(__('The mesadiretora could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Mesadiretora.' . $this->Mesadiretora->primaryKey => $id));
			$this->request->data = $this->Mesadiretora->find('first', $options);
		}
		
		$this->loadModel('Camara');
		$options = array('conditions' => array('Camara.' . $this->Camara->primaryKey => $idEsc));
		$this->set('camara', $this->Camara->find('first', $options));

		$this->set('id', $id);
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null, $idEsc = null) {
		$this->Mesadiretora->id = $id;
		if (!$this->Mesadiretora->exists()) {
			throw new NotFoundException(__('Invalid mesadiretora'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Mesadiretora->delete()) {
			$this->Session->setFlash(__('The mesadiretora has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The mesadiretora could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index', $idEsc));
	}
}
