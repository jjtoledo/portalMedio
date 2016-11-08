<?php
App::uses('AppModel', 'Model');
/**
 * Mandato Model
 *
 * @property Politico $Politico
 */
class Mandato extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Politico' => array(
			'className' => 'Politico',
			'foreignKey' => 'politico_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
