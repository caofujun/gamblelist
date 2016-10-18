<?php
/**
 * Bet Fixture
 */
class BetFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'game_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'choice_item' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'payment' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'win_lose' => array('type' => 'varchar', 'null' => true, 'default' => null),
		'dividend' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'lost' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
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
			'user_id' => 1,
			'game_id' => 1,
			'choice_item' => 1,
			'payment' => 1,
			'win_lose' => 1,
			'dividend' => 1,
			'lost' => 1,
			'created' => '2016-09-26 03:39:26',
			'modified' => '2016-09-26 03:39:26'
		),
	);

}
