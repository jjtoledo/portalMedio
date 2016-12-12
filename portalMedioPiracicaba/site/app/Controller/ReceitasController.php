<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'PHPExcel', array('file' => 'PHPExcel.php'));
/**
 * Receitas Controller
 *
 * @property Receita $Receita
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class ReceitasController extends AppController {

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
				'Receita.cidade_id' => $id
			)
		);
		$this->set('receitas', $this->Paginator->paginate());

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
		if (!$this->Receita->exists($id)) {
			throw new NotFoundException(__('Invalid Receita'));
		}
		$options = array('conditions' => array('Receita.' . $this->Receita->primaryKey => $id));
		$this->set('receita', $this->Receita->find('first', $options));

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
		$this->request->data['Receita']['cidade_id'] = $id;

		if ($this->request->is('post')) {
			$this->Receita->create();
			if ($this->Receita->save($this->request->data)) {
				$this->Session->setFlash(__('The Receita has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $id));
			} else {
				$this->Session->setFlash(__('The Receita could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		$this->request->data['Receita']['cidade_id'] = $id;

		if ($this->request->is('post')) {
			$this->Receita->create();
			if ($this->Receita->save($this->request->data)) {
				$last_id = $this->Receita->getLastInsertId();		
				$receita = $this->Receita->findById($last_id);
				$this->Receita->delete();
				/** Load $inputFileName to a PHPExcel Object  **/
				$objPHPExcel = PHPExcel_IOFactory::load('files/'.$receita['Receita']['excel']);
				$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
				
				$receitas = array();				
				$receitas[0] = array('ano' => $sheetData[4]['B'],
									'icms' => $sheetData[5]['B'],
									'ipi' => $sheetData[6]['B'],
									'ipva' => $sheetData[7]['B'],
									'fpm' => $sheetData[8]['B'],
									'royalties' => $sheetData[9]['B'],
									'itr' => $sheetData[10]['B'],
									'cide' => $sheetData[11]['B'],
									'fundeb' => $sheetData[12]['B'],
									'lei_kandir' => $sheetData[13]['B'],
									'fex' => $sheetData[14]['B'],
									'afm_afe' => $sheetData[15]['B'],
									'iptu' => $sheetData[16]['B'],
									'iss' => $sheetData[17]['B'],
									'total' => $sheetData[18]['B'],
									'cidade_id' => $id);

				$receitas[1] = array('ano' => $sheetData[4]['C'],
									'icms' => $sheetData[5]['C'],
									'ipi' => $sheetData[6]['C'],
									'ipva' => $sheetData[7]['C'],
									'fpm' => $sheetData[8]['C'],
									'royalties' => $sheetData[9]['C'],
									'itr' => $sheetData[10]['C'],
									'cide' => $sheetData[11]['C'],
									'fundeb' => $sheetData[12]['C'],
									'lei_kandir' => $sheetData[13]['C'],
									'fex' => $sheetData[14]['C'],
									'afm_afe' => $sheetData[15]['C'],
									'iptu' => $sheetData[16]['C'],
									'iss' => $sheetData[17]['C'],
									'total' => $sheetData[18]['C'],
									'cidade_id' => $id);

				$receitas[2] = array('ano' => $sheetData[4]['D'],
									'icms' => $sheetData[5]['D'],
									'ipi' => $sheetData[6]['D'],
									'ipva' => $sheetData[7]['D'],
									'fpm' => $sheetData[8]['D'],
									'royalties' => $sheetData[9]['D'],
									'itr' => $sheetData[10]['D'],
									'cide' => $sheetData[11]['D'],
									'fundeb' => $sheetData[12]['D'],
									'lei_kandir' => $sheetData[13]['D'],
									'fex' => $sheetData[14]['D'],
									'afm_afe' => $sheetData[15]['D'],
									'iptu' => $sheetData[16]['D'],
									'iss' => $sheetData[17]['D'],
									'total' => $sheetData[18]['D'],
									'cidade_id' => $id);

				$receitas[3] = array('ano' => $sheetData[4]['E'],
									'icms' => $sheetData[5]['E'],
									'ipi' => $sheetData[6]['E'],
									'ipva' => $sheetData[7]['E'],
									'fpm' => $sheetData[8]['E'],
									'royalties' => $sheetData[9]['E'],
									'itr' => $sheetData[10]['E'],
									'cide' => $sheetData[11]['E'],
									'fundeb' => $sheetData[12]['E'],
									'lei_kandir' => $sheetData[13]['E'],
									'fex' => $sheetData[14]['E'],
									'afm_afe' => $sheetData[15]['E'],
									'iptu' => $sheetData[16]['E'],
									'iss' => $sheetData[17]['E'],
									'total' => $sheetData[18]['E'],
									'cidade_id' => $id);

				$receitas[4] = array('ano' => $sheetData[4]['F'],
									'icms' => $sheetData[5]['F'],
									'ipi' => $sheetData[6]['F'],
									'ipva' => $sheetData[7]['F'],
									'fpm' => $sheetData[8]['F'],
									'royalties' => $sheetData[9]['F'],
									'itr' => $sheetData[10]['F'],
									'cide' => $sheetData[11]['F'],
									'fundeb' => $sheetData[12]['F'],
									'lei_kandir' => $sheetData[13]['F'],
									'fex' => $sheetData[14]['F'],
									'afm_afe' => $sheetData[15]['F'],
									'iptu' => $sheetData[16]['F'],
									'iss' => $sheetData[17]['F'],
									'total' => $sheetData[18]['F'],
									'cidade_id' => $id);

				$receitas[5] = array('ano' => $sheetData[4]['G'],
									'icms' => $sheetData[5]['G'],
									'ipi' => $sheetData[6]['G'],
									'ipva' => $sheetData[7]['G'],
									'fpm' => $sheetData[8]['G'],
									'royalties' => $sheetData[9]['G'],
									'itr' => $sheetData[10]['G'],
									'cide' => $sheetData[11]['G'],
									'fundeb' => $sheetData[12]['G'],
									'lei_kandir' => $sheetData[13]['G'],
									'fex' => $sheetData[14]['G'],
									'afm_afe' => $sheetData[15]['G'],
									'iptu' => $sheetData[16]['G'],
									'iss' => $sheetData[17]['G'],
									'total' => $sheetData[18]['G'],
									'cidade_id' => $id);

				$receitas[6] = array('ano' => $sheetData[4]['H'],
									'icms' => $sheetData[5]['H'],
									'ipi' => $sheetData[6]['H'],
									'ipva' => $sheetData[7]['H'],
									'fpm' => $sheetData[8]['H'],
									'royalties' => $sheetData[9]['H'],
									'itr' => $sheetData[10]['H'],
									'cide' => $sheetData[11]['H'],
									'fundeb' => $sheetData[12]['H'],
									'lei_kandir' => $sheetData[13]['H'],
									'fex' => $sheetData[14]['H'],
									'afm_afe' => $sheetData[15]['H'],
									'iptu' => $sheetData[16]['H'],
									'iss' => $sheetData[17]['H'],
									'total' => $sheetData[18]['H'],
									'cidade_id' => $id);

				//debug($receitas);
				foreach ($receitas as $e) {
					$this->Receita->create();			
					if (!$this->Receita->save($e)) {
						$this->Session->setFlash(__('The Receita could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
					}
				}
				
				$this->Session->setFlash(__('The Receita has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $id));
			} else {
				$this->Session->setFlash(__('The Receita could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->Receita->exists($id)) {
			throw new NotFoundException(__('Invalid Receita'));
		}

		$this->request->data['Receita']['cidade_id'] = $idCity;

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Receita->save($this->request->data)) {
				$this->Session->setFlash(__('The Receita has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index', $idCity));
			} else {
				$this->Session->setFlash(__('The Receita could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Receita.' . $this->Receita->primaryKey => $id));
			$this->request->data = $this->Receita->find('first', $options);
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
		$this->Receita->id = $id;
		if (!$this->Receita->exists()) {
			throw new NotFoundException(__('Invalid Receita'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Receita->delete()) {
			$this->Session->setFlash(__('The Receita has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The Receita could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index', $idCity));
	}
}