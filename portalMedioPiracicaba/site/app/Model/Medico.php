<?php
App::uses('AppModel', 'Model');
/**
 * Medico Model
 *
 * @property Cidades $Cidades
 */
class Medico extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Cidades' => array(
			'className' => 'Cidades',
			'foreignKey' => 'cidade_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
