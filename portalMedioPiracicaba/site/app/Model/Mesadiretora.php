<?php
App::uses('AppModel', 'Model');
/**
 * Mesadiretora Model
 *
 * @property Escola $Escola
 */
class Mesadiretora extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Camara' => array(
			'className' => 'Camara',
			'foreignKey' => 'camara_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
