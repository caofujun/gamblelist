<?php
App::uses('AppModel', 'Model');

/**
 * Game Model
 *
 * @property User $User
 * @property Bet $Bet
 */
class Game extends AppModel {

public function isOwnedBy($post, $user) {
	return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
}

/**
 * Display field
 *
 * @var string
 */
public $displayField = 'title';

/**
 * Validation rules
 *
 * @var array
 */
public $validate = array(
	'title' => array(
		'notBlank' => array(
			'rule' => array('notBlank'),
			'message' => 'タイトルは必須入力でお願いします'
			),
		),
	'done' => array(
		'boolean' => array(
			'rule' => array('boolean'),
					//'message' => 'Your custom message here',
			),
		),
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
public $belongsTo = array(
	'User' => array(
		'className' => 'User',
		'foreignKey' => 'user_id',
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
	'Bet' => array(
		'className' => 'Bet',
		'foreignKey' => 'game_id',
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

public function reNew(){
	$amount = $this->find('all');

	for ($i=0; $i < count($amount); $i++) { 

			// 結果doneの更新
		if ($amount[$i]['Game']['result'] > 0) {
			$amount[$i]['Game']['done'] = true;
		}else{
			$amount[$i]['Game']['done'] = false;
		}

			// 総支払額sumの更新
		$sum = $this->Bet->find('first' , 
			array(
				'fields' =>array(
					'sum(Bet.payment) as sumPayment'),
				'conditions'=>array(
					'Bet.game_id'=>$amount[$i]['Game']['id'])
				)
			);
		$amount[$i]['Game']['sum'] = $sum[0]['sumPayment'];

			// オッズの計算、更新　odds
		$sumPayment = $sum[0]['sumPayment'];
		$gameId = $amount[$i]['Game']['id'];
		for ($j=1; $j <= 5; $j++) { 
			$amount[$i]['Game']['odds_'.$j] = $this->__oddsCalc($j, $sumPayment , $gameId);
		}

			// 配列の構造変換
		array_splice($amount[$i]['Game'],16,3);
		$data['Game'][$i] = $amount[$i]['Game'];
	}
	return $data;
}

private function __oddsCalc($num, $sumPayment , $gameId){
	$sumChoice = $this->Bet->find('first' , 
		array(
			'fields' =>array(
				'sum(Bet.payment) as sumChoice'),
			'conditions'=>array(
				'and' =>array(
					'Bet.game_id'=>$gameId,
					'Bet.choice_item'=>$num))
			)
		);
	if($sumChoice[0]['sumChoice'] >1){
		$odds = round($sumPayment / $sumChoice[0]['sumChoice'] , 2);
	}else{
		$odds = null;
	}
	return $odds;
}


}
