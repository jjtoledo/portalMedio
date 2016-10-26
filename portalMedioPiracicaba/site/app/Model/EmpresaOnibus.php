<?php
App::uses('AppModel', 'Model');
/**
 * EmpresaOnibus Model
 *
 * @property Cidade $Cidade
 */
class EmpresaOnibus extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Cidade' => array(
			'className' => 'Cidade',
			'foreignKey' => 'cidade_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
