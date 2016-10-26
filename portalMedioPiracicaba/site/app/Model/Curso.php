<?php
App::uses('AppModel', 'Model');
/**
 * Curso Model
 *
 * @property Escola $Escola
 */
class Curso extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Escola' => array(
			'className' => 'Escola',
			'foreignKey' => 'escola_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
