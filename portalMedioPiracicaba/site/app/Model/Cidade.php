<?php
App::uses('AppModel', 'Model');
/**
 * Cidade Model
 *
 * @property Estatistica $Estatistica
 * @property AtrativoTuristico $AtrativoTuristico
 * @property Denominacao $Denominacao
 * @property Distrito $Distrito
 * @property EmpresaOnibus $EmpresaOnibus
 * @property Escola $Escola
 * @property EspacoEvento $EspacoEvento
 * @property Evento $Evento
 * @property Foto $Foto
 * @property Fundador $Fundador
 * @property Historia $Historia
 * @property Lei $Lei
 * @property OrgaoPublico $OrgaoPublico
 * @property Patrimonio $Patrimonio
 * @property Populacao $Populacao
 * @property Politico $Politico
 * @property Prestador $Prestador
 * @property Receita $Receita
 * @property Rio $Rio
 * @property Saude $Saude
 * @property Simbolo $Simbolo
 */
class Cidade extends AppModel {

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'Estatistica' => array(
			'className' => 'Estatistica',
			'foreignKey' => 'cidade_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Historia' => array(
			'className' => 'Historia',
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
		'AtrativoTuristico' => array(
			'className' => 'AtrativoTuristico',
			'foreignKey' => 'cidade_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Bairro' => array(
			'className' => 'Bairro',
			'foreignKey' => 'cidade_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Denominacao' => array(
			'className' => 'Denominacao',
			'foreignKey' => 'cidade_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Distrito' => array(
			'className' => 'Distrito',
			'foreignKey' => 'cidade_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'EmpresaOnibus' => array(
			'className' => 'EmpresaOnibus',
			'foreignKey' => 'cidade_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Economia' => array(
			'className' => 'Economia',
			'foreignKey' => 'cidade_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Escola' => array(
			'className' => 'Escola',
			'foreignKey' => 'cidade_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Empresa' => array(
			'className' => 'Empresa',
			'foreignKey' => 'cidade_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'EspacoEvento' => array(
			'className' => 'EspacoEvento',
			'foreignKey' => 'cidade_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Evento' => array(
			'className' => 'Evento',
			'foreignKey' => 'cidade_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Endereco' => array(
			'className' => 'Endereco',
			'foreignKey' => 'cidade_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Foto' => array(
			'className' => 'Foto',
			'foreignKey' => 'cidade_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Fundador' => array(
			'className' => 'Fundador',
			'foreignKey' => 'cidade_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Lei' => array(
			'className' => 'Lei',
			'foreignKey' => 'cidade_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Medico' => array(
			'className' => 'Medico',
			'foreignKey' => 'cidade_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'OrgaoPublico' => array(
			'className' => 'OrgaoPublico',
			'foreignKey' => 'cidade_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Patrimonio' => array(
			'className' => 'Patrimonio',
			'foreignKey' => 'cidade_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Populacao' => array(
			'className' => 'Populacao',
			'foreignKey' => 'cidade_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Politico' => array(
			'className' => 'Politico',
			'foreignKey' => 'cidade_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Prestador' => array(
			'className' => 'Prestador',
			'foreignKey' => 'cidade_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Receita' => array(
			'className' => 'Receita',
			'foreignKey' => 'cidade_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Rio' => array(
			'className' => 'Rio',
			'foreignKey' => 'cidade_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'OrgaoSaude' => array(
			'className' => 'OrgaoSaude',
			'foreignKey' => 'cidade_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Simbolo' => array(
			'className' => 'Simbolo',
			'foreignKey' => 'cidade_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Exvereador' => array(
			'className' => 'Exvereador',
			'foreignKey' => 'cidade_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
