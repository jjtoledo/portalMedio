<?php
App::uses('AppController', 'Controller');
/**
 * Admins Controller
 *
 * @property Admin $Admin
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class AdminsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

    public function afterFilter() {
        if ($this->action != 'index_login') {
            $this->autenticarAdmin();
        }
    }

    public function autenticarAdmin() {        
        if (!$this->Session->check('Admin')) {
            $this->redirect(array('controller' => 'admins',
                                    'action' => 'index_login'));
            exit();
        } 
    }


    public function home_admin() {
	    $this->redirect(array('controller' => 'cidades', 
	    						'action' => 'index'));
	}

	public function index_login() {
		
	}

	public function login() {
		if (!empty($this->data['Admin']['email']) and
        	!empty($this->data['Admin']['senha'])) {
        	$admin = $this->validar();

        	if ($admin != false) {
        		$this->Session->write('Admin', $admin);

        		$this->set('admin', $admin);
        		$this->redirect(array('action' => 'home_admin', $admin['0']['Admin']['id']));
        		exit();
        	} else {
        		$this->Session->setFlash(__('Login e/ou senha inválidos!'), 'default', 
        			array('class' => 'text-center alert alert-danger'));
        		$this->redirect(array('action' => 'index_login'));
        		exit();
        	}
        } else {
        	$this->redirect(array('action' => 'index_login'));
        	exit();
        }
	}

	public function validar(){
    	$admin = $this->Admin->findAllByEmailAndSenha(
    								$this->data['Admin']['email'],
    								md5($this->data['Admin']['senha']));
    	if (!empty($admin)) {
    		return $admin;
    	} else {
    		return false;
    	}
    }

    public function logout(){
    	$this->Session->destroy();
    	$this->redirect('index_login');
    	exit();
    }
}
