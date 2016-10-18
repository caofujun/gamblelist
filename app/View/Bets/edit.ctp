<div class="bets form">
<?php echo $this->Form->create('Bet'); ?>
	<fieldset>
		<legend><?php echo __('Edit Bet'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('choice_item');
		echo $this->Form->input('payment');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

<div class="actions">
	<h3><?php echo __('メニュー'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink(__('削除'), array('action' => 'delete', $this->Form->value('Bet.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Bet.id')))); ?></li>
		<li><?php echo $this->Html->link(__('賭け状況'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('ユーザーリスト'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('ユーザー登録'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('ゲームリスト'), array('controller' => 'games', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('ゲームを作る'), array('controller' => 'games', 'action' => 'add')); ?> </li>
	</ul>
</div>
