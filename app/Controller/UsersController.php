<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {
	public $uses = array('User');

	public function beforeFilter() {
		$this->Auth->allow('add' , 'login' , 'logout');
		if ($this->action === 'index' || $this->action === 'view') {
			$this->User->saveAll($this->User->reNew()['User']);
		}
		parent::beforeFilter();
	}

	public function isAuthorized($user) {
		if (in_array($this->action, array('edit', 'delete'))) {
			$postId = (int) $this->request->params['pass'][0];
			if ($postId == $user['id']) {
				return true;
			}
		}
		return parent::isAuthorized($user);
	}

	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect(array('controller' => 'games' , 'action' => 'index'));
			} else {
				$this->Flash->error(__('ユーザー名かパスワードが無効です、再度入力してください。'));
			}
		}
	}

	public function logout() {
		$this->redirect($this->Auth->logout());
	}

/**
 * Components
 *
 * @var array
 */
public $components = array(
	'Paginator' =>array('order' => 'User.id desc'),
	);

/**
 * index method
 *
 * @return void
 */
public function index() {
	$this->User->recursive = 0;
	$this->set('users', $this->Paginator->paginate());
}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
public function view($id = null) {
	$this->User->recursive = 2;
	if (!$this->User->exists($id)) {
		throw new NotFoundException(__('Invalid user'));
	}
	$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
	$this->set('user', $this->User->find('first', $options));
}

/**
 * add method
 *
 * @return void
 */
public function add() {
	if ($this->request->is('post')) {
		$this->User->create();
		if ($this->User->save($this->request->data)) {
			$this->Flash->success(__('新規ユーザー登録しました'));
			$this->Auth->login();
			return $this->redirect(array('controller' => 'games' , 'action' => 'index'));
		} else {
			$this->Flash->error(__('ユーザー登録は受け付けられませんでした。。'));
		}
	}
}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
public function edit($id = null) {
	if (!$this->User->exists($id)) {
		throw new NotFoundException(__('Invalid user'));
	}
	if ($this->request->is(array('post', 'put'))) {
		if ($this->User->save($this->request->data)) {
			$this->Flash->success(__('ユーザー登録内容を変更しました'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Flash->error(__('登録変更を受け付けられませんでした。。'));
		}
	} else {
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->request->data = $this->User->find('first', $options);
	}
}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
public function delete($id = null) {
	$this->User->id = $id;
	if (!$this->User->exists()) {
		throw new NotFoundException(__('Invalid user'));
	}
	$this->request->allowMethod('post', 'delete');
	if ($this->User->delete()) {
		$this->Flash->success(__('ユーザー登録を削除しました'));
	} else {
		$this->Flash->error(__('ユーザー登録の削除は受け付けられませんでした。。'));
	}
	return $this->redirect(array('action' => 'index'));
}
}
