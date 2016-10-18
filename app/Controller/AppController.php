<?php
App::uses('Controller', 'Controller');

class AppController extends Controller {

	public $components = array(
		// 'DebugKit.Toolbar', 
		'Paginator',
		'Session',
		'Flash',
		'Auth' => array(
			'loginAction' => '/users/login',
			'logoutRedirect' => '/',
			'authenticate' => array(
				'Form' => array(
					'passwordHasher' => array(
						'className' => 'Simple',
						'hashType' => 'sha256'
						),
					'userModel' => 'User',
					'fields' => array(
						'username' => 'username',
						'password' => 'password'
						)
					)
				),
			'authorize' => array('Controller')
			)
		);

	public function beforeFilter() {
		$this->Auth->allow('index','view', 'start');
		$this->set('loginUser', $this->Auth->user());
	}

	public function isAuthorized($user) {
		if (isset($user['role']) && $user['role'] === 'admin') {
			return true;
		}
		return false;
	}

}
