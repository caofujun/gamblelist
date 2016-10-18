<?php
App::uses('AppController', 'Controller');

class BetsController extends AppController {

	public function beforeFilter() {
		if ($this->action == 'index' || $this->action == 'view') {
			$this->Bet->saveAll($this->Bet->reNew()['Bet']);
		}
		parent::beforeFilter();
	}

	public function isAuthorized($user) {
		// 登録済ユーザーは賭け可能
		if ($this->action === 'add') {
			return true;
		}
		return parent::isAuthorized($user);
	}

public $components = array('Paginator' => array(
	'order' => array('Bet.created' => 'desc'))
);

/**
 * index method
 *
 * @return void
 */
public function index() {
	$this->Bet->recursive = 0;
	$this->set('bets', $this->Paginator->paginate());
}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
public function view($id = null) {
	if (!$this->Bet->exists($id)) {
		throw new NotFoundException(__('Invalid bet'));
	}
	$options = array('conditions' => array('Bet.' . $this->Bet->primaryKey => $id));
	$this->set('bet', $this->Bet->find('first', $options));
}

/**
 * add method
 *
 * @return void
 */
public function add() {
	if ($this->request->is('post')) {

		$this->request->data['Bet']['user_id'] = $this->Auth->user('id');

		$this->Bet->create();
		if ($this->Bet->save($this->request->data)) {
			$this->Flash->success(__('賭けを受け付けました！'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Flash->error(__('賭けが成立していません、再度お願いします。'));
		}
	}
	$bets = $this->Bet->Game->find('all');
	$users = $this->Bet->User->find('list');
	$games = $this->Bet->Game->find('list' , 
		array(
			'conditions'=>array(
				'Game.done'=>false)
			)
		);

	$this->set(compact('users', 'games', 'bets'));
}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
public function edit($id = null) {
	if (!$this->Bet->exists($id)) {
		throw new NotFoundException(__('Invalid bet'));
	}
	if ($this->request->is(array('post', 'put'))) {
		if ($this->Bet->save($this->request->data)) {
			$this->Flash->success(__('The bet has been saved.'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Flash->error(__('The bet could not be saved. Please, try again.'));
		}
	} else {
		$options = array('conditions' => array('Bet.' . $this->Bet->primaryKey => $id));
		$this->request->data = $this->Bet->find('first', $options);
	}
	$users = $this->Bet->User->find('list');
	$games = $this->Bet->Game->find('list');
	$this->set(compact('users', 'games'));
}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
public function delete($id = null) {
	$this->Bet->id = $id;
	if (!$this->Bet->exists()) {
		throw new NotFoundException(__('Invalid bet'));
	}
	$this->request->allowMethod('post', 'delete');
	if ($this->Bet->delete()) {
		$this->Flash->success(__('The bet has been deleted.'));
	} else {
		$this->Flash->error(__('The bet could not be deleted. Please, try again.'));
	}
	return $this->redirect(array('action' => 'index'));
}
}
