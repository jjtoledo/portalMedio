<?php
App::uses('AppModel', 'Model');
/**
 * Rio Model
 *
 * @property Cidade $Cidade
 */
class Rio extends AppModel {


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

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'FotoRio' => array(
			'className' => 'FotoRio',
			'foreignKey' => 'rio_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => 'FotoRio.id DESC',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
}
