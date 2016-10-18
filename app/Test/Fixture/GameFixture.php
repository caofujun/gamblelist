<?php
/**
 * Game Fixture
 */
class GameFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'eventday' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'item_1' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'item_2' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'item_3' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'item_4' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'item_5' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'odds_1' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'odds_2' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'odds_3' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'odds_4' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'odds_5' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'sum' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'done' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'result' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'title' => 'Lorem ipsum dolor sit amet',
			'eventday' => '2016-09-26 03:35:07',
			'item_1' => 'Lorem ipsum dolor sit amet',
			'item_2' => 'Lorem ipsum dolor sit amet',
			'item_3' => 'Lorem ipsum dolor sit amet',
			'item_4' => 'Lorem ipsum dolor sit amet',
			'item_5' => 'Lorem ipsum dolor sit amet',
			'odds_1' => 1,
			'odds_2' => 1,
			'odds_3' => 1,
			'odds_4' => 1,
			'odds_5' => 1,
			'sum' => 1,
			'done' => 1,
			'result' => 1,
			'user_id' => 1,
			'created' => '2016-09-26 03:35:07',
			'modified' => '2016-09-26 03:35:07'
		),
	);

}
