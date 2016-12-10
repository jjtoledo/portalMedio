<?php
App::uses('AppController', 'Controller');
/**
 * Escolas Controller
 *
 * @property Escola $Escola
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class EscolasController extends AppController {

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
		$this->Paginator->settings = array(
			'conditions' => array(
				'Escola.cidade_id' => $id,
				'Escola.tipo' => $tipo
			)
		);

		$this->set('escolas', $this->Paginator->paginate());

		$this->set('tipo', $tipo);

		$this->loadModel('Cidade');
		$options = array('conditions' => array('Cidade.' . $this->Cidade->primaryKey => $id));
		$this->set('cidade', $this->Cidade->find('first', $options));
	}

/**
 * index_fac method
 *
 * @return void
 */
	public function index_fac($id = null) {
		$this->Paginator->settings = array(
			'conditions' => array(
				'Escola.cidade_id' => $id,
				'NOT' => array(
					'Escola.tipo' => array(0,1,2,5,6,7,8,9)
				)
			)
		);
		$this->set('escolas', $this->Paginator->paginate());

		$tipos = array('0' => 'Escola municipal', 
						'1' => 'Escola estadual',
						'2' => 'Escola privada',
						'3' => 'Faculdade federal',
						'4' => 'Faculdade privada'
				);
		$this->set('tipos', $tipos);

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
	public function view($id = null, $idCity = null, $tipo = null) {
		if (!$this->Escola->exists($id)) {
			throw new NotFoundException(__('Invalid escola'));
		}
		$options = array('conditions' => array('Escola.' . $this->Escola->primaryKey => $id));
		$this->set('escola', $this->Escola->find('first', $options));

		$tipos = array('0' => 'Escola municipal', 
						'1' => 'Escola estadual',
						'2' => 'Escola privada',
						'3' => 'Faculdade federal',
						'4' => 'Faculdade privada',
						'5' => 'Escolas Particulares',
						'6' => 'Escolas Profissionalizantes',
						'7' => 'Escolas de Idiomas',
						'8' => 'Pré Vestibulares',
						'9' => 'Escolas Especializadas'
				);
	
		$this->set('tipos', $tipos);
		$this->set('tipo', $tipo);

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
	public function add($id = null, $tipo = null) {
		$this->request->data['Escola']['cidade_id'] = $id;

		if ($tipo == 3) {
			$tipos = array('3' => 'Faculdade federal',
						'4' => 'Faculdade privada'
					);
			$this->set('tipos', $tipos);
		} else {
			$this->request->data['Escola']['tipo'] = $tipo;
		}		

		$this->set('tipo', $tipo);

		if ($this->request->is('post')) {
			$this->Escola->create();
			if ($this->Escola->save($this->request->data)) {
				$this->Session->setFlash(__('The escola has been saved.'), 'default', array('class' => 'alert alert-success'));
				if ($this->request->data['Escola']['tipo'] < 3 || $this->request->data['Escola']['tipo'] > 4) {
					return $this->redirect(array('action' => 'index', $id, $tipo));
				} else {
					return $this->redirect(array('action' => 'index_fac', $id));
				}
			} else {
				$this->Session->setFlash(__('The escola could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}		

		$this->loadModel('Cidade');
		$options = array('conditions' => array('Cidade.' . $this->Cidade->primaryKey => $id));
		$this->set('cidade', $this->Cidade->find('first', $options));
	}

/**
 * add bloco method
 *
 * @return void
 */
	public function add_bloco($id = null, $tipo = null) {
		$this->request->data['Escola']['cidade_id'] = $id;

		if ($tipo == 3) {
			$tipos = array('3' => 'Faculdade federal',
						'4' => 'Faculdade privada'
					);
			$this->set('tipos', $tipos);
		} else {
			$this->request->data['Escola']['tipo'] = $tipo;
		}		

		$this->set('tipo', $tipo);

		if ($this->request->is('post')) {
			$this->Escola->create();
			if ($this->Escola->save($this->request->data)) {
				$this->Session->setFlash(__('The escola has been saved.'), 'default', array('class' => 'alert alert-success'));
				if ($this->request->data['Escola']['tipo'] < 3 || $this->request->data['Escola']['tipo'] > 4) {
					return $this->redirect(array('action' => 'index', $id, $tipo));
				} else {
					return $this->redirect(array('action' => 'index_fac', $id));
				}
			} else {
				$this->Session->setFlash(__('The escola could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
	public function edit($id = null, $idCity = null, $tipo = null) {
		if (!$this->Escola->exists($id)) {
			throw new NotFoundException(__('Invalid escola'));
		}

		$this->request->data['Escola']['cidade_id'] = $idCity;

		if ($tipo == 3 || $tipo == 4) {
			$tipos = array('3' => 'Faculdade federal',
						'4' => 'Faculdade privada'
					);
			$this->set('tipos', $tipos);
		} 
		
		$this->set('tipo', $tipo);

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Escola->save($this->request->data)) {
				$this->Session->setFlash(__('The escola has been saved.'), 'default', array('class' => 'alert alert-success'));
				if ($tipo < 3 || $tipo > 4) {
					return $this->redirect(array('action' => 'index', $idCity, $tipo));
				} else {
					return $this->redirect(array('action' => 'index', $idCity));
				}
			} else {
				$this->Session->setFlash(__('The escola could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Escola.' . $this->Escola->primaryKey => $id));
			$this->request->data = $this->Escola->find('first', $options);
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
	public function delete($id = null, $idCity = null, $tipo = null) {
		$this->Escola->id = $id;
		if (!$this->Escola->exists()) {
			throw new NotFoundException(__('Invalid escola'));
		}

		$escola = $this->Escola->findById($id);
		$tipo = $escola['Escola']['tipo'];

		$this->request->onlyAllow('post', 'delete');
		if ($this->Escola->delete()) {
			$this->Session->setFlash(__('The escola has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The escola could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}

		if ($tipo < 3) {
			return $this->redirect(array('action' => 'index', $idCity, $tipo));
		} else {
			return $this->redirect(array('action' => 'index_fac', $idCity));
		}
	}

		/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete_foto($id = null, $idCity = null) {
		$this->Escola->id = $id;
		if (!$this->Escola->exists()) {
			throw new NotFoundException(__('Invalid Escola'));
		}
		
		$this->Escola->updateAll(array('foto_anuncio'=>null),array('Escola.id' => $id));
		return $this->redirect(array('action' => 'view', $id, $idCity));
	}
}
