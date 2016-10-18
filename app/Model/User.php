<?php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
/**
 * User Model
 *
 * @property Bet $Bet
 * @property Game $Game
 */
class User extends AppModel {
	public $displayField = 'username';

/**
 * Validation rules
 *
 * @var array
 */
public $validate = array(
	'username' => array(
		'rule1' => array(
			'rule' => 'notBlank',
			'message' => 'ユーザー名は必須で入力してください'
			),
		'rule2' => array(
			'rule' => 'isUnique',
			'message' => '違うユーザー名でお願いします。すでに登録があります。'
			)
		),

	'password' => array(
		'rule1' => array(
			'rule' => 'notBlank',
			'message' => 'パスワードは必須で入力してください'
			),
		'rule2' => array(
			'rule' => array('minLength', 4),
			'message' => '4文字以上で入力して下さい',
			'allowEmpty' => true
			)
		),

	'role' => array(
		'valid' => array(
			'rule' => array('inList', array('admin', 'author')),
			'message' => 'Please enter a valid role',
			'allowEmpty' => false
			)
		)

	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
public $hasMany = array(
	'Bet' => array(
		'className' => 'Bet',
		'foreignKey' => 'user_id',
		'dependent' => false,
		'conditions' => '',
		'fields' => '',
		'order' => '',
		'limit' => '',
		'offset' => '',
		'exclusive' => '',
		'finderQuery' => '',
		'counterQuery' => ''
		),
	'Game' => array(
		'className' => 'Game',
		'foreignKey' => 'user_id',
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

public function beforeSave($options = array()) {
	if (isset($this->data[$this->alias]['password'])) {
		$passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
		$this->data[$this->alias]['password'] = $passwordHasher->hash(
			$this->data[$this->alias]['password']
			);
	}
	return true;
}

public function reNew(){

	$amount = $this->find('all');

	for ($i=0; $i < count($amount); $i++) { 

			// 合計値：amountの計算
		$amount[$i]['User']['amount'] = 
		$amount[$i]['User']['sum_dividend'] - $amount[$i]['User']['sum_lost'];

			// 合計支払額：sum_paymentの計算
		$sum = $this->Bet->find('first' , 
			array(
				'fields' =>array(
					'sum(Bet.payment) as sumPayment'),
				'conditions'=>array(
					'Bet.user_id'=> $amount[$i]['User']['id'])
				)
			);
		$amount[$i]['User']['sum_payment'] = $sum[0]['sumPayment'];

			// 勝ち負けカウントwin_count lose_count
		$winCount = $this->Bet->find('count' , 
			array(
				'conditions'=>array(
					'and' => array( 
						'Bet.user_id'=> $amount[$i]['User']['id'] ,
						'Bet.win_lose' => 'win'
						)
					)
				)
			);

		$loseCount = $this->Bet->find('count' , 
			array(
				'conditions'=>array(
					'and' => array( 
						'Bet.user_id'=> $amount[$i]['User']['id'] ,
						'Bet.win_lose' => 'lose'
						)
					)
				)
			);

		if ($winCount + $loseCount > 0) {
			$amount[$i]['User']['win_count'] = $winCount;
			$amount[$i]['User']['lose_count'] = $loseCount;
		}else{
			$amount[$i]['User']['win_count'] = null;
			$amount[$i]['User']['lose_count'] = null;
		}

			// 勝った合計金額 sum_dividend
		$sumDividend = $this->Bet->find('first' , 
			array(
				'fields' =>array(
					'sum(Bet.dividend) as sumDividend'),
				'conditions'=>array( 
					'Bet.user_id'=> $amount[$i]['User']['id'])
				)
			);

		$amount[$i]['User']['sum_dividend'] = $sumDividend[0]['sumDividend'];


			// 平均値：averageの計算
		if($amount[$i]['User']['win_count'] > 0){
			$amount[$i]['User']['average'] = 
			round($amount[$i]['User']['win_count'] / ($amount[$i]['User']['win_count'] + $amount[$i]['User']['lose_count']) , 2);
		}elseif($amount[$i]['User']['win_count'] === 0 
			&& $amount[$i]['User']['lose_count'] > 0){
			$amount[$i]['User']['average'] = 0;
		}

			// 負けた合計金額 sum_lost
		$sumLost = $this->Bet->find('first' , 
			array(
				'fields' =>array(
					'sum(Bet.lost) as sumLost'),
				'conditions'=>array( 
					'Bet.user_id'=> $amount[$i]['User']['id'])
				)
			);
		$amount[$i]['User']['sum_lost'] = $sumLost[0]['sumLost'];

			// 配列の構造変換
		array_splice($amount[$i]['User'],9,4);
		array_splice($amount[$i]['User'],1,1);
		$data['User'][$i] = $amount[$i]['User'];
	}
	return $data;
}

}
