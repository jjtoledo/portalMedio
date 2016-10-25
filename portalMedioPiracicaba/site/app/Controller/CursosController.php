<?php
App::uses('AppController', 'Controller');
/**
 * Cursos Controller
 *
 * @property Curso $Curso
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class CursosController extends AppController {

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
				'Curso.escola_id' => $id
			)
		);
		$this->set('cursos', $this->Paginator->paginate());

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
	public function view($id = null, $idEsc = null) {
		if (!$this->Curso->exists($id)) {
			throw new NotFoundException(__('Invalid curso'));
		}
		$options = array('conditions' => array('Curso.' . $this->Curso->primaryKey => $id));
		$this->set('curso', $this->Curso->find('first', $options));

		$this->loadModel('Escola');
		$options = array('conditions' => array('Escola.' . $this->Escola->primaryKey => $idEsc));
		$this->set('escola', $this->Escola->find('first', $options));

		$this->set('id', $id);
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
		$this->request->data['Curso']['escola_id'] = $id;

		if ($this->request->is('post')) {
			$this->Curso->create();
			if ($this->Curso->save($this->request->data)) {
				$this->Session->setFlash(__('The curso has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $id));
			} else {
				$this->Session->setFlash(__('The curso could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		
		$this->loadModel('Escola');
		$options = array('conditions' => array('Escola.' . $this->Escola->primaryKey => $id));
		$this->set('escola', $this->Escola->find('first', $options));

		$periodos = array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5',
						'6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10'
				);
		$this->set('periodos', $periodos);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null, $idEsc = null) {
		if (!$this->Curso->exists($id)) {
			throw new NotFoundException(__('Invalid curso'));
		}

		$this->request->data['Curso']['escola_id'] = $idEsc;

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Curso->save($this->request->data)) {
				$this->Session->setFlash(__('The curso has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $idEsc));
			} else {
				$this->Session->setFlash(__('The curso could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Curso.' . $this->Curso->primaryKey => $id));
			$this->request->data = $this->Curso->find('first', $options);
		}
		
		$this->loadModel('Escola');
		$options = array('conditions' => array('Escola.' . $this->Escola->primaryKey => $idEsc));
		$this->set('escola', $this->Escola->find('first', $options));

		$periodos = array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5',
						'6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10'
				);
		$this->set('periodos', $periodos);

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
		$this->Curso->id = $id;
		if (!$this->Curso->exists()) {
			throw new NotFoundException(__('Invalid curso'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Curso->delete()) {
			$this->Session->setFlash(__('The curso has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The curso could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index', $idEsc));
	}
}
