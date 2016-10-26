<?php
App::uses('AppModel', 'Model');
/**
 * OnibusRota Model
 *
 * @property Escola $Escola
 */
class OnibusRota extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'EmpresaOnibus' => array(
			'className' => 'EmpresaOnibus',
			'foreignKey' => 'empresa_onibus_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
