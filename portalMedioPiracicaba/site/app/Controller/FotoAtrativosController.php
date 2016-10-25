<?php
App::uses('AppController', 'Controller');
/**
 * FotoAtrativos Controller
 *
 * @property FotoAtrativo $FotoAtrativo
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class FotoAtrativosController extends AppController {

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
				'FotoAtrativo.atrativo_turistico_id' => $id
			)
		);
		$this->set('fotoAtrativos', $this->Paginator->paginate());

		$this->loadModel('AtrativoTuristico');
		$options = array('conditions' => array('AtrativoTuristico.' . $this->AtrativoTuristico->primaryKey => $id));
		$this->set('atrativo', $this->AtrativoTuristico->find('first', $options));
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null, $idDist = null) {
		if (!$this->FotoAtrativo->exists($id)) {
			throw new NotFoundException(__('Invalid Foto'));
		}
		$options = array('conditions' => array('FotoAtrativo.' . $this->FotoAtrativo->primaryKey => $id));
		$this->set('fotoAtrativo', $this->FotoAtrativo->find('first', $options));

		$this->loadModel('AtrativoTuristico');
		$options = array('conditions' => array('AtrativoTuristico.' . $this->AtrativoTuristico->primaryKey => $idDist));
		$this->set('atrativo', $this->AtrativoTuristico->find('first', $options));

		$this->set('id', $id);
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
		$this->request->data['FotoAtrativo']['atrativo_turistico_id'] = $id;
		
		$this->loadModel('AtrativoTuristico');
		$options = array('conditions' => array('AtrativoTuristico.' . $this->AtrativoTuristico->primaryKey => $id));
		$this->set('atrativo', $this->AtrativoTuristico->find('first', $options));

		$photo = array();
		if ($this->request->is('post')) {				
			for ($i=0; $i < sizeof($this->request->data['FotoAtrativo']['fotos']); $i++) { 
				$photo = array('FotoAtrativo' => 
							array('atrativo_turistico_id' => $this->request->data['FotoAtrativo']['atrativo_turistico_id'],
									'foto' => $this->request->data['FotoAtrativo']['fotos'][$i]));
				$this->FotoAtrativo->create();			
				if (!$this->FotoAtrativo->save($photo)) {
					//debug($this->request->data['FotoAtrativo']['fotos']);
					$this->Session->setFlash(__('The Foto could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
				}
			}
			$this->Session->setFlash(__('The Foto has been saved.'), 'default', array('class' => '	alert alert-success'));
			return $this->redirect(array('action' => 'index', $id));
		}

	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null, $idDist = null) {
		if (!$this->FotoAtrativo->exists($id)) {
			throw new NotFoundException(__('Invalid Foto'));
		}

		$this->request->data['FotoAtrativo']['atrativo_turistico_id'] = $idDist;

		if ($this->request->is(array('post', 'put'))) {
			if ($this->FotoAtrativo->save($this->request->data)) {
				$this->Session->setFlash(__('The Foto has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $idDist));
			} else {
				$this->Session->setFlash(__('The Foto could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('FotoAtrativo.' . $this->FotoAtrativo->primaryKey => $id));
			$this->request->data = $this->FotoAtrativo->find('first', $options);
		}
		
		$this->loadModel('AtrativoTuristico');
		$options = array('conditions' => array('AtrativoTuristico.' . $this->AtrativoTuristico->primaryKey => $idDist));
		$this->set('atrativo', $this->AtrativoTuristico->find('first', $options));

		$this->set('id', $id);
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null, $idDist = null) {
		$this->FotoAtrativo->id = $id;
		if (!$this->FotoAtrativo->exists()) {
			throw new NotFoundException(__('Invalid Foto'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->FotoAtrativo->delete()) {
			$this->Session->setFlash(__('The Foto has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The Foto could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index', $idDist));
	}
}
