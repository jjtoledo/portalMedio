<?php
App::uses('AppController', 'Controller');
/**
 * FotoEscolas Controller
 *
 * @property FotoEscola $FotoEscola
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class FotoEscolasController extends AppController {

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
				'FotoEscola.escola_id' => $id
			),
			'order' => array(
				'FotoEscola.id' => 'DESC'
			)
		);
		$this->set('fotoEscolas', $this->Paginator->paginate());

		$this->set('tipo', $tipo);

		$this->loadModel('Escola');
		$options = array('conditions' => array('Escola.' . $this->Escola->primaryKey => $id));
		$this->set('escola', $this->Escola->find('first', $options));
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null, $idEscola = null) {
		if (!$this->FotoEscola->exists($id)) {
			throw new NotFoundException(__('Invalid Foto'));
		}
		$options = array('conditions' => array('FotoEscola.' . $this->FotoEscola->primaryKey => $id));
		$this->set('fotoEscola', $this->FotoEscola->find('first', $options));

		$this->loadModel('Escola');
		$options = array('conditions' => array('Escola.' . $this->Escola->primaryKey => $idEscola));
		$this->set('escola', $this->Escola->find('first', $options));

		$this->set('id', $id);
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null, $tipo = null) {
		$this->request->data['FotoEscola']['escola_id'] = $id;
		
		$this->loadModel('Escola');
		$options = array('conditions' => array('Escola.' . $this->Escola->primaryKey => $id));
		$this->set('escola', $this->Escola->find('first', $options));

		$this->set('tipo', $tipo);

		$photo = array();
		if ($this->request->is('post')) {				
			for ($i=0; $i < sizeof($this->request->data['FotoEscola']['fotos']); $i++) { 
				$photo = array('FotoEscola' => 
							array('escola_id' => $this->request->data['FotoEscola']['escola_id'],
									'foto' => $this->request->data['FotoEscola']['fotos'][$i]));
				$this->FotoEscola->create();			
				if (!$this->FotoEscola->save($photo)) {
					//debug($this->request->data['FotoEscola']['fotos']);
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
	public function edit($id = null, $idEscola = null, $tipo = null) {
		if (!$this->FotoEscola->exists($id)) {
			throw new NotFoundException(__('Invalid Foto'));
		}

		$this->request->data['FotoEscola']['escola_id'] = $idEscola;

		if ($this->request->is(array('post', 'put'))) {
			debug($this->request->data);
			if ($this->FotoEscola->save($this->request->data)) {
				$this->Session->setFlash(__('The Foto has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $idEscola, $tipo));
			} else {
				$this->Session->setFlash(__('The Foto could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
	public function delete($id = null, $idEscola = null) {
		$this->FotoEscola->id = $id;
		if (!$this->FotoEscola->exists()) {
			throw new NotFoundException(__('Invalid Foto'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->FotoEscola->delete()) {
			$this->Session->setFlash(__('The Foto has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The Foto could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index', $idEscola));
	}
}
