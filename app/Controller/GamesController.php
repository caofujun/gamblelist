<?php
App::uses('AppController', 'Controller');

class GamesController extends AppController {
	public $uses = array('Game', 'User', 'Bet');

	public function beforeFilter() {
		if ($this->action == 'index' || $this->action == 'view' || $this->action == 'start') {
			$this->Game->saveAll($this->Game->reNew()['Game']);
		}
		parent::beforeFilter();
	}

	public function isAuthorized($user) {
	// 登録済ユーザーはゲームを作れる
		if ($this->action === 'add') {
			return true;
		}

		if (in_array($this->action, array('edit'))) {
			$postId = (int) $this->request->params['pass'][0];
			if ($this->Game->isOwnedBy($postId, $user['id'])) {
				return true;
			}
		}
		return parent::isAuthorized($user);
	}

/**
 * Components
 * @var array
 */
public $components = array('Paginator' => array(
	'order' => array('Game.done' => 'asc' , 'Game.eventday' => 'asc')
	));

public function start() {
}

/**
 * index method
 *
 * @return void
 */
public function index() {
	$this->Game->recursive = 0;
	$this->set('games', $this->Paginator->paginate());
}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
public function view($id = null) {
	$this->Game->recursive = 2;
	if (!$this->Game->exists($id)) {
		throw new NotFoundException(__('Invalid game'));
	}
	$options = array('conditions' => array('Game.' . $this->Game->primaryKey => $id));
	$this->set('game', $this->Game->find('first', $options));
}

/**
 * add method
 *
 * @return void
 */
public function add() {
	if ($this->request->is('post')) {
		$this->request->data['Game']['user_id'] = $this->Auth->user('id');
		$this->Game->create();
		if ($this->Game->save($this->request->data)) {
			$this->Flash->success(__('新しい賭博が開かれました！'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Flash->error(__('受け付けられません、新しい賭博は開かれませんでした。。'));
		}
	}
	$users = $this->Game->User->find('list');
	$this->set(compact('users'));
}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
public function edit($id = null) {
	if (!$this->Game->exists($id)) {
		throw new NotFoundException(__('Invalid game'));
	}
	if ($this->request->is(array('post', 'put'))) {
		if ($this->Game->save($this->request->data)) {
			$this->Flash->success(__('賭博は編集されました'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Flash->error(__('編集は受け付けられませんでした。。'));
		}
	} else {
		$options = array('conditions' => array('Game.' . $this->Game->primaryKey => $id));
		$this->request->data = $this->Game->find('first', $options);
	}
	$users = $this->Game->User->find('list');
	$this->set(compact('users'));
}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
public function delete($id = null) {
	$this->Game->id = $id;
	if (!$this->Game->exists()) {
		throw new NotFoundException(__('Invalid game'));
	}
	$this->request->allowMethod('post', 'delete');
	if ($this->Game->delete()) {
		$this->Flash->success(__('The game has been deleted.'));
	} else {
		$this->Flash->error(__('The game could not be deleted. Please, try again.'));
	}
	return $this->redirect(array('action' => 'index'));
}

}
