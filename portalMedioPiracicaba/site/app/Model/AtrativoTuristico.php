<?php
App::uses('AppModel', 'Model');
/**
 * AtrativoTuristico Model
 *
 * @property Cidade $Cidade
 * @property FotoAtrativo $FotoAtrativo
 */
class AtrativoTuristico extends AppModel {


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
		'FotoAtrativo' => array(
			'className' => 'FotoAtrativo',
			'foreignKey' => 'atrativo_turistico_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => 'FotoAtrativo.id DESC',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
