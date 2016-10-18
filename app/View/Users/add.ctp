<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('ユーザー登録'); ?></legend>
	<?php
		echo $this->Form->input('username', array('label' => 'ユーザー名'));
		echo $this->Form->input('password', array('label' => 'パスワード'));
		echo $this->Form->hidden('role', array('value' => 'author'));
	?>
	</fieldset>

<?php echo $this->Form->end(__('新規登録')); ?>
</div>

<div class="actions">
	<h3><?php echo __('メニュー'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('ユーザーリスト'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('賭け状況'), array('controller' => 'bets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('新たに賭ける'), array('controller' => 'bets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('ゲームリスト'), array('controller' => 'games', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('ゲームを作る'), array('controller' => 'games', 'action' => 'add')); ?> </li>
	</ul>
</div>