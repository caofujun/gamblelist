<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('ユーザー編集'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('username', array('label' => 'ユーザー名'));
		echo $this->Form->input('password', array('label' => 'パスワード' , 'value' => ''));
	?>
	</fieldset>
	
<?php echo $this->Form->end(__('変更する！')); ?>
</div>

<div class="actions">
	<h3><?php echo __('メニュー'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink(__('ユーザー削除'), array('action' => 'delete', $this->Form->value('User.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('User.id')))); ?></li>
		<li><?php echo $this->Html->link(__('ユーザーリスト'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('賭け状況'), array('controller' => 'bets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('新たに賭ける'), array('controller' => 'bets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('ゲームリスト'), array('controller' => 'games', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('ゲームを作る'), array('controller' => 'games', 'action' => 'add')); ?> </li>
	</ul>
</div>
