<?php
App::uses('AppController', 'Controller');
/**
 * Fotos Controller
 *
 * @property Foto $Foto
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class FotosController extends AppController {

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
	public function index($id = null, $tipo = null) {
		$options = array(
			'conditions' => array(
				'Foto.cidade_id' => $id,
				'Foto.tipo' => $tipo
			)
		);
		$fotos = $this->Foto->find('all', $options);
		$this->set(compact('fotos'));

		$this->loadModel('Cidade');
		$options = array('conditions' => array('Cidade.' . $this->Cidade->primaryKey => $id));
		$this->set('cidade', $this->Cidade->find('first', $options));
		$this->set('tipo', $tipo);
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null, $idCity = null) {
		if (!$this->Foto->exists($id)) {
			throw new NotFoundException(__('Invalid Foto'));
		}
		$options = array('conditions' => array('Foto.' . $this->Foto->primaryKey => $id));
		$this->set('foto', $this->Foto->find('first', $options));

		$this->loadModel('Cidade');
		$options = array('conditions' => array('Cidade.' . $this->Cidade->primaryKey => $idCity));
		$this->set('cidade', $this->Cidade->find('first', $options));

		$this->set('id', $id);
		$this->set('tipo', $tipo);	
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null, $tipo = null) {
		$this->request->data['Foto']['cidade_id'] = $id;
		$this->request->data['Foto']['tipo'] = $tipo;
		
		$this->loadModel('Cidade');
		$options = array('conditions' => array('Cidade.' . $this->Cidade->primaryKey => $id));
		$this->set('cidade', $this->Cidade->find('first', $options));

		$this->set('tipo', $tipo);

		$photo = array();
		if ($this->request->is('post')) {				
			for ($i=0; $i < sizeof($this->request->data['Foto']['fotos']); $i++) { 
				$photo = array('Foto' => 
							array('cidade_id' => $this->request->data['Foto']['cidade_id'],
									'tipo' => $this->request->data['Foto']['tipo'],
									'foto' => $this->request->data['Foto']['fotos'][$i]));
				$this->Foto->create();			
				if (!$this->Foto->save($photo)) {
					debug($this->request->data['Foto']['fotos']);
					$this->Session->setFlash(__('The Foto could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
				}
			}
			$this->Session->setFlash(__('The Foto has been saved.'), 'default', array('class' => '	alert alert-success'));
			return $this->redirect(array('action' => 'index', $id, $tipo));
		}

	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null, $idCity = null, $tipo = null) {
		if (!$this->Foto->exists($id)) {
			throw new NotFoundException(__('Invalid Foto'));
		}

		$this->request->data['Foto']['cidade_id'] = $idCity;
		$this->request->data['Foto']['tipo'] = $tipo;

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Foto->save($this->request->data)) {
				$this->Session->setFlash(__('The Foto has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $idCity, $tipo));
			} else {
				$this->Session->setFlash(__('The Foto could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Foto.' . $this->Foto->primaryKey => $id));
			$this->request->data = $this->Foto->find('first', $options);
		}
		
		$this->loadModel('Cidade');
		$options = array('conditions' => array('Cidade.' . $this->Cidade->primaryKey => $idCity));
		$this->set('cidade', $this->Cidade->find('first', $options));

		$this->set('id', $id);
		$this->set('tipo', $tipo);
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null, $idCity = null, $tipo = null) {
		$this->Foto->id = $id;
		if (!$this->Foto->exists()) {
			throw new NotFoundException(__('Invalid Foto'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Foto->delete()) {
			$this->Session->setFlash(__('The Foto has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The Foto could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index', $idCity, $tipo));
	}
}