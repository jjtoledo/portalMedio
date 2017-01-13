<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'PHPExcel', array('file' => 'PHPExcel.php'));
/**
 * Despesas Controller
 *
 * @property Despesa $Despesa
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class DespesasController extends AppController {

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
				'Despesa.cidade_id' => $id
			)
		);
		$this->set('despesas', $this->Paginator->paginate());

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
		if (!$this->Despesa->exists($id)) {
			throw new NotFoundException(__('Invalid Despesa'));
		}
		$options = array('conditions' => array('Despesa.' . $this->Despesa->primaryKey => $id));
		$this->set('despesa', $this->Despesa->find('first', $options));

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
		$this->request->data['Despesa']['cidade_id'] = $id;

		if ($this->request->is('post')) {
			$this->Despesa->create();
			if ($this->Despesa->save($this->request->data)) {
				$this->Session->setFlash(__('The Despesa has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $id));
			} else {
				$this->Session->setFlash(__('The Despesa could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
	public function add_excel($id = null) {
		$this->request->data['Despesa']['cidade_id'] = $id;

		if ($this->request->is('post')) {
			$this->Despesa->create();
			if ($this->Despesa->save($this->request->data)) {
				$last_id = $this->Despesa->getLastInsertId();		
				$despesa = $this->Despesa->findById($last_id);
				$this->Despesa->delete();
				/** Load $inputFileName to a PHPExcel Object  **/
				$objPHPExcel = PHPExcel_IOFactory::load('files/'.$despesa['Despesa']['excel']);
				$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
				//debug($sheetData);
				
				$despesas = array();				
				$despesas[0] = array('ano' => $sheetData[4]['B'],
									'desp1' => $sheetData[5]['B'],
									'desp2' => $sheetData[6]['B'],
									'desp3' => $sheetData[7]['B'],
									'desp4' => $sheetData[8]['B'],
									'desp5' => $sheetData[9]['B'],
									'desp6' => $sheetData[10]['B'],
									'desp7' => $sheetData[11]['B'],
									'desp8' => $sheetData[12]['B'],
									'desp9' => $sheetData[13]['B'],
									'desp10' => $sheetData[14]['B'],
									'desp11' => $sheetData[15]['B'],
									'desp12' => $sheetData[16]['B'],
									'desp13' => $sheetData[17]['B'],
									'desp14' => $sheetData[18]['B'],
									'desp15' => $sheetData[19]['B'],
									'desp16' => $sheetData[20]['B'],
									'desp17' => $sheetData[21]['B'],
									'desp18' => $sheetData[22]['B'],
									'total' => $sheetData[23]['B'],
									'cidade_id' => $id);

				$despesas[1] = array('ano' => $sheetData[4]['C'],
									'desp1' => $sheetData[5]['C'],
									'desp2' => $sheetData[6]['C'],
									'desp3' => $sheetData[7]['C'],
									'desp4' => $sheetData[8]['C'],
									'desp5' => $sheetData[9]['C'],
									'desp6' => $sheetData[10]['C'],
									'desp7' => $sheetData[11]['C'],
									'desp8' => $sheetData[12]['C'],
									'desp9' => $sheetData[13]['C'],
									'desp10' => $sheetData[14]['C'],
									'desp11' => $sheetData[15]['C'],
									'desp12' => $sheetData[16]['C'],
									'desp13' => $sheetData[17]['C'],
									'desp14' => $sheetData[18]['C'],
									'desp15' => $sheetData[19]['C'],
									'desp16' => $sheetData[20]['C'],
									'desp17' => $sheetData[21]['C'],
									'desp18' => $sheetData[22]['C'],
									'total' => $sheetData[23]['C'],
									'cidade_id' => $id);

				$despesas[2] = array('ano' => $sheetData[4]['D'],
									'desp1' => $sheetData[5]['D'],
									'desp2' => $sheetData[6]['D'],
									'desp3' => $sheetData[7]['D'],
									'desp4' => $sheetData[8]['D'],
									'desp5' => $sheetData[9]['D'],
									'desp6' => $sheetData[10]['D'],
									'desp7' => $sheetData[11]['D'],
									'desp8' => $sheetData[12]['D'],
									'desp9' => $sheetData[13]['D'],
									'desp10' => $sheetData[14]['D'],
									'desp11' => $sheetData[15]['D'],
									'desp12' => $sheetData[16]['D'],
									'desp13' => $sheetData[17]['D'],
									'desp14' => $sheetData[18]['D'],
									'desp15' => $sheetData[19]['D'],
									'desp16' => $sheetData[20]['D'],
									'desp17' => $sheetData[21]['D'],
									'desp18' => $sheetData[22]['D'],
									'total' => $sheetData[23]['D'],
									'cidade_id' => $id);

				$despesas[3] = array('ano' => $sheetData[4]['E'],
									'desp1' => $sheetData[5]['E'],
									'desp2' => $sheetData[6]['E'],
									'desp3' => $sheetData[7]['E'],
									'desp4' => $sheetData[8]['E'],
									'desp5' => $sheetData[9]['E'],
									'desp6' => $sheetData[10]['E'],
									'desp7' => $sheetData[11]['E'],
									'desp8' => $sheetData[12]['E'],
									'desp9' => $sheetData[13]['E'],
									'desp10' => $sheetData[14]['E'],
									'desp11' => $sheetData[15]['E'],
									'desp12' => $sheetData[16]['E'],
									'desp13' => $sheetData[17]['E'],
									'desp14' => $sheetData[18]['E'],
									'desp15' => $sheetData[19]['E'],
									'desp16' => $sheetData[20]['E'],
									'desp17' => $sheetData[21]['E'],
									'desp18' => $sheetData[22]['E'],
									'total' => $sheetData[23]['E'],
									'cidade_id' => $id);

				//debug($despesas);
				foreach ($despesas as $e) {
					$this->Despesa->create();			
					if (!$this->Despesa->save($e)) {
						$this->Session->setFlash(__('The Despesa could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
					}
				}
				
				$this->Session->setFlash(__('The Despesa has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $id));
			} else {
				$this->Session->setFlash(__('The Despesa could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->Despesa->exists($id)) {
			throw new NotFoundException(__('Invalid Despesa'));
		}

		$this->request->data['Despesa']['cidade_id'] = $idCity;

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Despesa->save($this->request->data)) {
				$this->Session->setFlash(__('The Despesa has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $idCity));
			} else {
				$this->Session->setFlash(__('The Despesa could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Despesa.' . $this->Despesa->primaryKey => $id));
			$this->request->data = $this->Despesa->find('first', $options);
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
		$this->Despesa->id = $id;
		if (!$this->Despesa->exists()) {
			throw new NotFoundException(__('Invalid Despesa'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Despesa->delete()) {
			$this->Session->setFlash(__('The Despesa has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The Despesa could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index', $idCity));
	}
}