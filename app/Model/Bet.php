<?php
App::uses('AppModel', 'Model');

/**
 * Bet Model
 *
 * @property User $User
 * @property Game $Game
 */
class Bet extends AppModel {
/**
 * Display field
 *
 * @var string
 */
public $displayField = 'game_id';

/**
 * Validation rules
 *
 * @var array
 */
public $validate = array(
	'user_id' => array(
		'numeric' => array(
			'rule' => array('numeric'),
			),
		),
	'game_id' => array(
		'numeric' => array(
			'rule' => array('numeric'),
			),
		),
	'choice_item' => array(
		'numeric' => array(
			'rule' => array('numeric'),
			),
		),
	'payment' => array(
		'numeric' => array(
			'rule' => array('numeric'),
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
		),
	'Game' => array(
		'className' => 'Game',
		'foreignKey' => 'game_id',
		'conditions' => '',
		'fields' => '',
		'order' => ''
		)
	);

public function reNew(){
	$amount = $this->find('all');

	for ($i=0; $i < count($amount); $i++) { 

		// 勝ち負けの結果win_lose
		$gameDone = $this->Game->find('first' , 
			array(
				'conditions'=>array(
					'Game.id'=> $amount[$i]['Bet']['game_id'])
				)
			);
		if (!$amount[$i]['Bet']['win_lose'] && $gameDone['Game']['done']) {

			if ($amount[$i]['Bet']['choice_item'] === $gameDone['Game']['result']) {
				$amount[$i]['Bet']['win_lose'] = 'win';
			}else{
				$amount[$i]['Bet']['win_lose'] = 'lose';
			}
		}

		// 失った金・負けた金lost
		if($amount[$i]['Bet']['win_lose'] === 'lose'){
			$amount[$i]['Bet']['lost'] = $amount[$i]['Bet']['payment'];
		}

		// ゲットした金・買った金dividend
		if($amount[$i]['Bet']['win_lose'] === 'win'){

		// $oddsはGame＞Game_id＞BetChoiceが同じOddｓに絞り込み
			$odds = $this->Game->find('first' , 
				array(
					'conditions'=>array(
						'Game.id'=>$amount[$i]['Bet']['game_id'])
					)
				);

			$amount[$i]['Bet']['dividend'] = 
			$amount[$i]['Bet']['payment'] * $odds['Game']['odds_'.$amount[$i]['Bet']['choice_item']];
		}

			// 配列の構造変換
		array_splice($amount[$i]['Bet'],8,2);
		array_splice($amount[$i]['Bet'],1,2);
		$data['Bet'][$i] = $amount[$i]['Bet'];
	}
	return $data;
}


}
