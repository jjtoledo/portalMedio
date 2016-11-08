<?php
App::uses('AppController', 'Controller');
/**
 * AtrativoTuristicos Controller
 *
 * @property AtrativoTuristico $AtrativoTuristico
 * @property PaginatorComponent $Paginator
 */
class AtrativoTuristicosController extends AppController {

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
				'AtrativoTuristico.cidade_id' => $id
			)
		);
		$this->set('atrativoTuristicos', $this->Paginator->paginate());

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
		if (!$this->AtrativoTuristico->exists($id)) {
			throw new NotFoundException(__('Invalid atrativo turistico'));
		}
		$options = array('conditions' => array('AtrativoTuristico.' . $this->AtrativoTuristico->primaryKey => $id));
		$this->set('atrativoTuristico', $this->AtrativoTuristico->find('first', $options));

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
		$this->request->data['AtrativoTuristico']['cidade_id'] = $id;

		if ($this->request->is('post')) {
			$this->AtrativoTuristico->create();
			if ($this->AtrativoTuristico->save($this->request->data)) {
				$this->Session->setFlash(__('The atrativo turistico has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $id));
			} else {
				$this->Session->setFlash(__('The atrativo turistico could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->AtrativoTuristico->exists($id)) {
			throw new NotFoundException(__('Invalid atrativo turistico'));
		}

		$this->request->data['AtrativoTuristico']['cidade_id'] = $idCity;

		if ($this->request->is(array('post', 'put'))) {
			if ($this->AtrativoTuristico->save($this->request->data)) {
				$this->Session->setFlash(__('The atrativo turistico has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $idCity));
			} else {
				$this->Session->setFlash(__('The atrativo turistico could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('AtrativoTuristico.' . $this->AtrativoTuristico->primaryKey => $id));
			$this->request->data = $this->AtrativoTuristico->find('first', $options);
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
		$this->AtrativoTuristico->id = $id;
		if (!$this->AtrativoTuristico->exists()) {
			throw new NotFoundException(__('Invalid atrativo turistico'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AtrativoTuristico->delete()) {
			$this->Session->setFlash(__('The atrativo turistico has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The atrativo turistico could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index', $idCity));
	}
}
