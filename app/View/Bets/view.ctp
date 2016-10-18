<div class="bets view">
	<h2><?php echo __('賭け状況ー詳細'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($bet['Bet']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ユーザー'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bet['User']['username'], array('controller' => 'users', 'action' => 'view', $bet['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('賭博'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bet['Game']['title'], array('controller' => 'games', 'action' => 'view', $bet['Game']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('選んだ番号'); ?></dt>
		<dd>
			<?php echo h($bet['Bet']['choice_item']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('賭け金'); ?></dt>
		<dd>
			<?php echo h($bet['Bet']['payment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('勝敗'); ?></dt>
		<dd>
			<?php echo h($bet['Bet']['win_lose']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('配当金'); ?></dt>
		<dd>
			<?php echo h($bet['Bet']['dividend']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('負け金'); ?></dt>
		<dd>
			<?php echo h($bet['Bet']['lost']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('作成日'); ?></dt>
		<dd>
			<?php echo h($bet['Bet']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('メニュー'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('賭け状況'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('新たに賭ける'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('ユーザーリスト'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('ユーザー登録'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('ゲームリスト'), array('controller' => 'games', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('ゲームを作る'), array('controller' => 'games', 'action' => 'add')); ?> </li>
	</ul>
</div>
