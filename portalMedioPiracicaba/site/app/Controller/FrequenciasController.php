<?php
App::uses('AppController', 'Controller');
/**
 * Frequencias Controller
 *
 * @property Frequencia $Frequencia
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class FrequenciasController extends AppController {

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
				'Frequencia.onibus_rota_id' => $id
			)
		);
		$this->set('frequencias', $this->Paginator->paginate());

		$this->loadModel('OnibusRota');
		$options = array('conditions' => array('OnibusRota.' . $this->OnibusRota->primaryKey => $id));
		$this->set('onibus_rota', $this->OnibusRota->find('first', $options));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null, $idOnibusRota = null) {
		if (!$this->Frequencia->exists($id)) {
			throw new NotFoundException(__('Invalid frequencia'));
		}
		$options = array('conditions' => array('Frequencia.' . $this->Frequencia->primaryKey => $id));
		$this->set('frequencia', $this->Frequencia->find('first', $options));

		$this->loadModel('OnibusRota');
		$options = array('conditions' => array('OnibusRota.' . $this->OnibusRota->primaryKey => $idOnibusRota));
		$this->set('onibus_rota', $this->OnibusRota->find('first', $options));

		$this->set('id', $id);
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
		$this->request->data['Frequencia']['onibus_rota_id'] = $id;

		$frequencias = 
			array('Diariamente' => 'Diariamente',
				'Diariamente (exceto domingos e feridos)' => 'Diariamente (exceto domingos e feridos)',
				'Dias úteis' => 'Dias úteis',
				'Finais de semana' => 'Finais de semana',
				'Domingos e feridos' => 'Domingos e feridos');

		$this->set(compact('frequencias'));

		if ($this->request->is('post')) {
			$this->Frequencia->create();
			if ($this->Frequencia->save($this->request->data)) {
				$this->Session->setFlash(__('The frequencia has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $id));
			} else {
				$this->Session->setFlash(__('The frequencia could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		
		$this->loadModel('OnibusRota');
		$options = array('conditions' => array('OnibusRota.' . $this->OnibusRota->primaryKey => $id));
		$this->set('onibus_rota', $this->OnibusRota->find('first', $options));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null, $idOnibusRota = null) {
		if (!$this->Frequencia->exists($id)) {
			throw new NotFoundException(__('Invalid frequencia'));
		}

		$this->request->data['Frequencia']['onibus_rota_id'] = $idOnibusRota;

		$frequencias = 
			array('Diariamente' => 'Diariamente',
				'Diariamente (exceto domingos e feridos)' => 'Diariamente (exceto domingos e feridos)',
				'Dias úteis' => 'Dias úteis',
				'Finais de semana' => 'Finais de semana',
				'Domingos e feridos' => 'Domingos e feridos');

		$this->set(compact('frequencias'));

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Frequencia->save($this->request->data)) {
				$this->Session->setFlash(__('The frequencia has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $idOnibusRota));
			} else {
				$this->Session->setFlash(__('The frequencia could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Frequencia.' . $this->Frequencia->primaryKey => $id));
			$this->request->data = $this->Frequencia->find('first', $options);
		}
		
		$this->loadModel('OnibusRota');
		$options = array('conditions' => array('OnibusRota.' . $this->OnibusRota->primaryKey => $idOnibusRota));
		$this->set('onibus_rota', $this->OnibusRota->find('first', $options));

		$this->set('id', $id);
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null, $idOnibusRota = null) {
		$this->Frequencia->id = $id;
		if (!$this->Frequencia->exists()) {
			throw new NotFoundException(__('Invalid frequencia'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Frequencia->delete()) {
			$this->Session->setFlash(__('The frequencia has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The frequencia could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index', $idOnibusRota));
	}
}
