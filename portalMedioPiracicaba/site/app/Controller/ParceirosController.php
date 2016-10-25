<?php
App::uses('AppController', 'Controller');
/**
 * Parceiros Controller
 *
 * @property Parceiro $Parceiro
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class ParceirosController extends AppController {

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
	public function index($tipo = null) {
		$this->Paginator->settings = array(
			'conditions' => array(
				'Parceiro.tipo' => $tipo
			)
		);
		$this->set('parceiros', $this->Paginator->paginate());
		$this->set('tipo', $tipo);
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null, $tipo = null) {
		if (!$this->Parceiro->exists($id)) {
			throw new NotFoundException(__('Invalid Parceiro'));
		}
		$options = array('conditions' => array('Parceiro.' . $this->Parceiro->primaryKey => $id));
		$this->set('parceiro', $this->Parceiro->find('first', $options));

		$this->set('id', $id);
		$this->set('tipo', $tipo);	
	}

/**
 * add method
 *
 * @return void
 */
	public function add($tipo = null) {
		$this->set('tipo', $tipo);
		$this->request->data['Parceiro']['tipo'] = $tipo;
		
		if ($this->request->is('post')) {
			$this->Parceiro->create();
			if ($this->Parceiro->save($this->request->data)) {
				$this->Session->setFlash(__('The Parceiro has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $tipo));
			} else {
				$this->Session->setFlash(__('The Parceiro could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null, $tipo = null) {
		$this->set('tipo', $tipo);

		if (!$this->Parceiro->exists($id)) {
			throw new NotFoundException(__('Invalid Parceiro'));
		}

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Parceiro->save($this->request->data)) {
				$this->Session->setFlash(__('The Parceiro has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $tipo));
			} else {
				$this->Session->setFlash(__('The Parceiro could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Parceiro.' . $this->Parceiro->primaryKey => $id));
			$this->request->data = $this->Parceiro->find('first', $options);
			$this->set('parceiro', $this->Parceiro->find('first', $options));

		}

		$this->set('id', $id);
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null, $tipo = null) {
		$this->Parceiro->id = $id;
		if (!$this->Parceiro->exists()) {
			throw new NotFoundException(__('Invalid Parceiro'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Parceiro->delete()) {
			$this->Session->setFlash(__('The Parceiro has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The Parceiro could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index', $tipo));
	}
}