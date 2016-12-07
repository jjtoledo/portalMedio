<?php
App::uses('AppController', 'Controller');
/**
 * Prefeituras Controller
 *
 * @property Prefeitura $Prefeitura
 * @property PaginatorComponent $Paginator
 */
class PrefeiturasController extends AppController {

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
	public function add($id = null, $idCity = null) {
		if ($id != null && $idCity != null) {
			$this->redirect(array('action' => 'edit', $id, $idCity));
		}

		$this->request->data['Prefeitura']['cidade_id'] = $id;

		if ($this->request->is('post')) {
			$this->Prefeitura->create();
			if ($this->Prefeitura->save($this->request->data)) {
				$this->Session->setFlash(__('The prefeitura has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('controller' => 'cidades', 
											'action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The prefeitura could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}

		$this->set('id', $id);

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
		if (!$this->Prefeitura->exists($id)) {
			throw new NotFoundException(__('Invalid prefeitura'));
		}

		$this->request->data['Prefeitura']['cidade_id'] = $idCity;

		if ($this->request->is(array('post', 'put'))) {
			if ($this->request->data['Prefeitura']['delete'] == '1') {
				$this->request->data['Prefeitura']['foto'] = '';
			}

			if ($this->Prefeitura->save($this->request->data)) {
				$this->Session->setFlash(__('The prefeitura has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('controller' => 'cidades', 
											'action' => 'view', $idCity));
			} else {
				$this->Session->setFlash(__('The prefeitura could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Prefeitura.' . $this->Prefeitura->primaryKey => $id));
			$this->request->data = $this->Prefeitura->find('first', $options);
		}

		$this->set('id', $idCity);

		$this->loadModel('Cidade');
		$options = array('conditions' => array('Cidade.' . $this->Cidade->primaryKey => $idCity));
		$this->set('cidade', $this->Cidade->find('first', $options));
	}
}
