<?php
App::uses('AppController', 'Controller');
/**
 * Pessoas Controller
 *
 * @property Pessoa $Pessoa
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class PessoasController extends AppController {

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
 * index method
 *
 * @return void
 */
	public function index($id = null, $tipo = null) {
		$this->Paginator->settings = array(
			'conditions' => array(
				'Pessoa.cidade_id' => $id,
				'Pessoa.tipo' => $tipo
			)
		);
		$this->set('pessoas', $this->Paginator->paginate());

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
	public function view($id = null, $idCity = null, $tipo = null) {
		if (!$this->Pessoa->exists($id)) {
			throw new NotFoundException(__('Invalid Pessoa'));
		}
		$options = array('conditions' => array('Pessoa.' . $this->Pessoa->primaryKey => $id));
		$this->set('pessoa', $this->Pessoa->find('first', $options));

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
		$this->request->data['Pessoa']['cidade_id'] = $id;
		$this->request->data['Pessoa']['tipo'] = $tipo;

		if ($this->request->is('post')) {
			$this->Pessoa->create();
			if ($this->Pessoa->save($this->request->data)) {
				$this->Session->setFlash(__('The Pessoa has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $id, $tipo));
			} else {
				$this->Session->setFlash(__('The Pessoa could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		
		$this->loadModel('Cidade');
		$options = array('conditions' => array('Cidade.' . $this->Cidade->primaryKey => $id));
		$this->set('cidade', $this->Cidade->find('first', $options));
		$this->set('tipo', $tipo);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null, $idCity = null, $tipo = null) {
		if (!$this->Pessoa->exists($id)) {
			throw new NotFoundException(__('Invalid Pessoa'));
		}

		$this->request->data['Pessoa']['cidade_id'] = $idCity;

		if ($this->request->is(array('post', 'put'))) {

			if ($this->Pessoa->save($this->request->data)) {
				$this->Session->setFlash(__('The Pessoa has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $idCity, $tipo));
			} else {
				$this->Session->setFlash(__('The Pessoa could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Pessoa.' . $this->Pessoa->primaryKey => $id));
			$this->request->data = $this->Pessoa->find('first', $options);
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
		$this->Pessoa->id = $id;
		if (!$this->Pessoa->exists()) {
			throw new NotFoundException(__('Invalid Pessoa'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Pessoa->delete()) {
			$this->Session->setFlash(__('The Pessoa has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The Pessoa could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index', $idCity, $tipo));
	}

		/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete_foto($id = null, $idCity = null, $tipo = null) {
		$this->Pessoa->id = $id;
		if (!$this->Pessoa->exists()) {
			throw new NotFoundException(__('Invalid Pessoa'));
		}
		
		$this->Pessoa->updateAll(array('foto_anuncio'=>null),array('Pessoa.id' => $id));
		return $this->redirect(array('action' => 'view', $id, $idCity, $tipo));
	}
}
