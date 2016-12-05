<?php
App::uses('AppController', 'Controller');
/**
 * Horarios Controller
 *
 * @property Horario $Horario
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class HorariosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

	public $helpers = array('Tinymce');

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
 * add method
 *
 * @return void
 */
	public function add($id = null, $idEmpresa = null, $idCity = null) {
		if ($id != null && $idEmpresa != null && $idCity != null) {
			$this->redirect(array('action' => 'edit', $id, $idEmpresa, $idCity));
		}

		$this->request->data['Horario']['empresa_onibus_id'] = $id;

		$this->loadModel('EmpresaOnibus');
		$options = array('conditions' => array('EmpresaOnibus.' . $this->EmpresaOnibus->primaryKey => $id));
		$this->set('empresaOnibus', $this->EmpresaOnibus->find('first', $options));

		if ($this->request->is('post')) {
			$this->Horario->create();
			if ($this->Horario->save($this->request->data)) {
				$this->Session->setFlash(__('The horario has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('controller' => 'empresaOnibuses', 
											'action' => 'view', $id, $idCity));
			} else {
				$this->Session->setFlash(__('The horario could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}

		$this->set('id', $idEmpresa);
		$this->set('idCity', $idCity);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null, $idEmpresa = null, $idCity = null) {
		if (!$this->Horario->exists($id)) {
			throw new NotFoundException(__('Invalid horario'));
		}

		$this->request->data['Horario']['empresa_onibus_id'] = $idEmpresa;

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Horario->save($this->request->data)) {
				$this->Session->setFlash(__('The horario has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('controller' => 'empresaOnibuses', 
											'action' => 'view', $idEmpresa, $idCity));
			} else {
				$this->Session->setFlash(__('The horario could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Horario.' . $this->Horario->primaryKey => $id));
			$this->request->data = $this->Horario->find('first', $options);
		}

		$this->set('id', $idEmpresa);
		$this->set('idCity', $idCity);

		$this->loadModel('EmpresaOnibus');
		$options = array('conditions' => array('EmpresaOnibus.' . $this->EmpresaOnibus->primaryKey => $idEmpresa));
		$this->set('empresaOnibus', $this->EmpresaOnibus->find('first', $options));
	}
}
