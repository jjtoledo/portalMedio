<?php
App::uses('AppController', 'Controller');
/**
 * OnibusRotas Controller
 *
 * @property OnibusRota $OnibusRota
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class OnibusRotasController extends AppController {

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
		$options = array(
			'conditions' => array(
				'OnibusRota.empresa_onibus_id' => $id
			)
		);
		$this->set('onibusRotas', $this->OnibusRota->find('all', $options));

		$this->loadModel('EmpresaOnibus');
		$options = array('conditions' => array('EmpresaOnibus.' . $this->EmpresaOnibus->primaryKey => $id));
		$this->set('empresa_onibus', $this->EmpresaOnibus->find('first', $options));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null, $idEsc = null) {
		if (!$this->OnibusRota->exists($id)) {
			throw new NotFoundException(__('Invalid onibusRota'));
		}
		$options = array('conditions' => array('OnibusRota.' . $this->OnibusRota->primaryKey => $id));
		$this->set('onibusRota', $this->OnibusRota->find('first', $options));

		$this->loadModel('EmpresaOnibus');
		$options = array('conditions' => array('EmpresaOnibus.' . $this->EmpresaOnibus->primaryKey => $idEsc));
		$this->set('empresa_onibus', $this->EmpresaOnibus->find('first', $options));

		$this->set('id', $id);
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
		$this->request->data['OnibusRota']['empresa_onibus_id'] = $id;

		$this->loadModel('EmpresaOnibus');
		$options = array('conditions' => array('EmpresaOnibus.' . $this->EmpresaOnibus->primaryKey => $id));
		$this->set('empresa_onibus', $this->EmpresaOnibus->find('first', $options));

		$pdf = array();
		if ($this->request->is('post')) {				
			debug($this->request->data['OnibusRota']['pdfs']);
			for ($i=0; $i < sizeof($this->request->data['OnibusRota']['pdfs']); $i++) { 
				$pdf = array('OnibusRota' => 
							array('empresa_onibus_id' => $this->request->data['OnibusRota']['empresa_onibus_id'],
									'pdf' => $this->request->data['OnibusRota']['pdfs'][$i]));
				$this->OnibusRota->create();			
				if (!$this->OnibusRota->save($pdf)) {
					debug($this->request->data['OnibusRota']['pdfs']);
					$this->Session->setFlash(__('The OnibusRota could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
				}
			}
			$this->Session->setFlash(__('The OnibusRota has been saved.'), 'default', array('class' => 'alert alert-success'));
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
	public function edit($id = null, $idEsc = null) {
		if (!$this->OnibusRota->exists($id)) {
			throw new NotFoundException(__('Invalid onibusRota'));
		}

		$this->request->data['OnibusRota']['empresa_onibus_id'] = $idEsc;

		if ($this->request->is(array('post', 'put'))) {
			if ($this->OnibusRota->save($this->request->data)) {
				$this->Session->setFlash(__('The OnibusRota has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $idEsc));
			} else {
				$this->Session->setFlash(__('The OnibusRota could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
	public function delete($id = null, $idEsc = null) {
		$this->OnibusRota->id = $id;
		if (!$this->OnibusRota->exists()) {
			throw new NotFoundException(__('Invalid onibusRota'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->OnibusRota->delete()) {
			$this->Session->setFlash(__('The onibusRota has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The onibusRota could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index', $idEsc));
	}
}
