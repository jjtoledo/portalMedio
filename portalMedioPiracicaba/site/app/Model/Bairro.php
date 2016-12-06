<?php
App::uses('AppModel', 'Model');
/**
 * Bairro Model
 *
 * @property Cidade $Cidade
 */
class Bairro extends AppModel {


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
		'FotoBairro' => array(
			'className' => 'FotoBairro',
			'foreignKey' => 'distrito_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => 'FotoBairro.id DESC',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
}
