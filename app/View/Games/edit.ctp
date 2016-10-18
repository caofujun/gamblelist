<div class="games form">
<?php echo $this->Form->create('Game'); ?>
	<fieldset>
		<legend><?php echo __('賭博内容ー変更'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title', array('label' => 'ゲーム名'));
		echo $this->Form->input('eventday', array(
			'label' => '開催日',
			'dateFormat' => 'YMD',
			'monthNames' => false,
			'separator' => '/',
			'timeFormat' => '24',
			));
		echo $this->Form->input('item_1', array('label' => '選択1'));
		echo $this->Form->input('item_2', array('label' => '選択2'));
		echo $this->Form->input('item_3', array('label' => '選択3'));
		echo $this->Form->input('item_4', array('label' => '選択4'));
		echo $this->Form->input('item_5', array('label' => '選択5'));
		echo $this->Form->input('result', array('label' => '結果'));
		echo $this->Form->input('user_id', array('label' => '親ユーザーを交代する'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('変更する')); ?>
</div>

<div class="actions">
	<h3><?php echo __('メニュー'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('ゲームリスト'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('ユーザーリスト'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('ユーザー登録'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('賭け状況'), array('controller' => 'bets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('新たに賭ける'), array('controller' => 'bets', 'action' => 'add')); ?> </li>
	</ul>
</div>
