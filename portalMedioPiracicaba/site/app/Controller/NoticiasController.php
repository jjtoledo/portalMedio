<?php
App::uses('AppController', 'Controller');
/**
 * Noticias Controller
 *
 * @property Noticia $Noticia
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class NoticiasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

/* Métodos área admin ********************************************************************************************************** */

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
				'Noticia.tipo' => $tipo
			)
		);
		$this->set('noticias', $this->Paginator->paginate());
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
		if (!$this->Noticia->exists($id)) {
			throw new NotFoundException(__('Invalid Noticia'));
		}
		$options = array('conditions' => array('Noticia.' . $this->Noticia->primaryKey => $id));
		$this->set('noticia', $this->Noticia->find('first', $options));

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
		$this->request->data['Noticia']['tipo'] = $tipo;
		
		if ($this->request->is('post')) {
			$this->Noticia->create();
			if ($this->Noticia->save($this->request->data)) {
				$this->Session->setFlash(__('The Noticia has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $tipo));
			} else {
				$this->Session->setFlash(__('The Noticia could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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

		if (!$this->Noticia->exists($id)) {
			throw new NotFoundException(__('Invalid Noticia'));
		}

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Noticia->save($this->request->data)) {
				$this->Session->setFlash(__('The Noticia has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $tipo));
			} else {
				$this->Session->setFlash(__('The Noticia could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Noticia.' . $this->Noticia->primaryKey => $id));
			$this->request->data = $this->Noticia->find('first', $options);
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
		$this->Noticia->id = $id;
		if (!$this->Noticia->exists()) {
			throw new NotFoundException(__('Invalid Noticia'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Noticia->delete()) {
			$this->Session->setFlash(__('The Noticia has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The Noticia could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index', $tipo));
	}
}