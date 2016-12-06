<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'PHPExcel', array('file' => 'PHPExcel.php'));
/**
 * Enderecos Controller
 *
 * @property Endereco $Endereco
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class EnderecosController extends AppController {

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
				'Endereco.cidade_id' => $id
			)
		);
		$this->set('enderecos', $this->Paginator->paginate());

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
	public function view($id = null, $idCity = null) {
		if (!$this->Endereco->exists($id)) {
			throw new NotFoundException(__('Invalid Endereco'));
		}
		$options = array('conditions' => array('Endereco.' . $this->Endereco->primaryKey => $id));
		$this->set('endereco', $this->Endereco->find('first', $options));

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
	public function add($id = null) {		 
		$this->request->data['Endereco']['cidade_id'] = $id;

		if ($this->request->is('post')) {
			$this->Endereco->create();
			if ($this->Endereco->save($this->request->data)) {
				$last_id = $this->Endereco->getLastInsertId();		
				$endereco = $this->Endereco->findById($last_id);
				$this->Endereco->delete();
				/** Load $inputFileName to a PHPExcel Object  **/
				$objPHPExcel = PHPExcel_IOFactory::load('files/'.$endereco['Endereco']['excel']);
				$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
				//var_dump($sheetData);
				foreach ($sheetData as $e) {
					if ($e['C'] != 'Cidade' && $e['C'] != null) {
						$end = array('Endereco' => 
							array('cidade_id' => $id,
									'rua' => $e['A'],
									'bairro' => $e['B'],
									'cep' => $e['D']));
						$this->Endereco->create();			
						if (!$this->Endereco->save($end)) {
							$this->Session->setFlash(__('The Endereco could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
						}
					}
				}
				
				$this->Session->setFlash(__('The Endereco has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $id));
			} else {
				$this->Session->setFlash(__('The Endereco could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		
		$this->loadModel('Cidade');
		$options = array('conditions' => array('Cidade.' . $this->Cidade->primaryKey => $id));
		$this->set('cidade', $this->Cidade->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add_bloco($id = null) {
		$this->request->data['Endereco']['cidade_id'] = $id;

		if ($this->request->is('post')) {
			$this->Endereco->create();
			if ($this->Endereco->save($this->request->data)) {
				$this->Session->setFlash(__('The Endereco has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $id));
			} else {
				$this->Session->setFlash(__('The Endereco could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
	public function edit($id = null, $idCity = null) {
		if (!$this->Endereco->exists($id)) {
			throw new NotFoundException(__('Invalid Endereco'));
		}

		$this->request->data['Endereco']['cidade_id'] = $idCity;

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Endereco->save($this->request->data)) {
				$this->Session->setFlash(__('The Endereco has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $idCity));
			} else {
				$this->Session->setFlash(__('The Endereco could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Endereco.' . $this->Endereco->primaryKey => $id));
			$this->request->data = $this->Endereco->find('first', $options);
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
	public function delete($id = null, $idCity = null) {
		$this->Endereco->id = $id;
		if (!$this->Endereco->exists()) {
			throw new NotFoundException(__('Invalid Endereco'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Endereco->delete()) {
			$this->Session->setFlash(__('The Endereco has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The Endereco could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index', $idCity));
	}
}