<?php
App::uses('AppModel', 'Model');
/**
 * Assistente Model
 *
 * @property Escola $Escola
 */
class Assistente extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Social' => array(
			'className' => 'Social',
			'foreignKey' => 'social_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
