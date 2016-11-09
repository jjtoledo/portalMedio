<?php
App::uses('AppModel', 'Model');
/**
 * Frequencia Model
 *
 * @property OnibusRota $OnibusRota
 */
class Frequencia extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'OnibusRota' => array(
			'className' => 'OnibusRota',
			'foreignKey' => 'onibus_rota_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
