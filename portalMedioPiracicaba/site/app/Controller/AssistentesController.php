<?php
App::uses('AppController', 'Controller');
/**
 * Assistentes Controller
 *
 * @property Assistente $Assistente
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class AssistentesController extends AppController {

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
				'Assistente.social_id' => $id
			)
		);
		$this->set('assistentes', $this->Paginator->paginate());

		$this->loadModel('Social');
		$options = array('conditions' => array('Social.' . $this->Social->primaryKey => $id));
		$this->set('social', $this->Social->find('first', $options));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null, $idEsc = null) {
		if (!$this->Assistente->exists($id)) {
			throw new NotFoundException(__('Invalid assistente'));
		}
		$options = array('conditions' => array('Assistente.' . $this->Assistente->primaryKey => $id));
		$this->set('assistente', $this->Assistente->find('first', $options));

		$this->loadModel('Social');
		$options = array('conditions' => array('Social.' . $this->Social->primaryKey => $idEsc));
		$this->set('social', $this->Social->find('first', $options));

		$this->set('id', $id);
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
		$this->request->data['Assistente']['social_id'] = $id;

		if ($this->request->is('post')) {
			$this->Assistente->create();
			if ($this->Assistente->save($this->request->data)) {
				$this->Session->setFlash(__('The assistente has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $id));
			} else {
				$this->Session->setFlash(__('The assistente could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		
		$this->loadModel('Social');
		$options = array('conditions' => array('Social.' . $this->Social->primaryKey => $id));
		$this->set('social', $this->Social->find('first', $options));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null, $idEsc = null) {
		if (!$this->Assistente->exists($id)) {
			throw new NotFoundException(__('Invalid assistente'));
		}

		$this->request->data['Assistente']['social_id'] = $idEsc;

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Assistente->save($this->request->data)) {
				$this->Session->setFlash(__('The assistente has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $idEsc));
			} else {
				$this->Session->setFlash(__('The assistente could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Assistente.' . $this->Assistente->primaryKey => $id));
			$this->request->data = $this->Assistente->find('first', $options);
		}
		
		$this->loadModel('Social');
		$options = array('conditions' => array('Social.' . $this->Social->primaryKey => $idEsc));
		$this->set('social', $this->Social->find('first', $options));

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
		$this->Assistente->id = $id;
		if (!$this->Assistente->exists()) {
			throw new NotFoundException(__('Invalid assistente'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Assistente->delete()) {
			$this->Session->setFlash(__('The assistente has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The assistente could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index', $idEsc));
	}
}
