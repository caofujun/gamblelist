<?php
/**
 * User Fixture
 */
class UserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'username' => array('type' => 'string', 'null' => false, 'default' => null, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'win_count' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'lose_count' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'average' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'sum_payment' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'sum_dividend' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'sum_lost' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'amount' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'password' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'role' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'username' => array('column' => 'username', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'username' => 'Lorem ipsum dolor sit amet',
			'win_count' => 1,
			'lose_count' => 1,
			'average' => 1,
			'sum_payment' => 1,
			'sum_dividend' => 1,
			'sum_lost' => 1,
			'amount' => 1,
			'password' => 'Lorem ipsum dolor sit amet',
			'role' => 'Lorem ipsum dolor sit amet',
			'created' => '2016-09-26 03:38:09',
			'modified' => '2016-09-26 03:38:09'
		),
	);

}
