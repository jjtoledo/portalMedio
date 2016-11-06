<?php
App::uses('AppModel', 'Model');
/**
 * Politico Model
 *
 * @property Cidade $Cidade
 * @property Comissao $Comissao
 * @property Mesadiretora $Mesadiretora
 * @property Mandato $Mandato
 */
class Politico extends AppModel {


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
		),
		'Comissao' => array(
			'className' => 'Comissao',
			'foreignKey' => 'comissao_id',
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
		'Mandato' => array(
			'className' => 'Mandato',
			'foreignKey' => 'politico_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
