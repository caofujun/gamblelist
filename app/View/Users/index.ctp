<div class="users index">
	<h2><?php echo __('ユーザーリスト'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('ユーザー名'); ?></th>
			<th><?php echo $this->Paginator->sort('勝ち数'); ?></th>
			<th><?php echo $this->Paginator->sort('負け数'); ?></th>
			<th><?php echo $this->Paginator->sort('勝率'); ?></th>
			<th><?php echo $this->Paginator->sort('賭け金合計'); ?></th>
			<th><?php echo $this->Paginator->sort('配当金合計'); ?></th>
			<th><?php echo $this->Paginator->sort('負け金合計'); ?></th>
			<th><?php echo $this->Paginator->sort('収支'); ?></th>
			<th class="actions"><?php echo __(''); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['win_count']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['lose_count']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['average']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['sum_payment']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['sum_dividend']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['sum_lost']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['amount']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('詳細'), array('action' => 'view', $user['User']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>

	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('ページ {:page}/{:pages}: 表示レコード{:current}/{:count} , {:start}-{:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('前へ'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('次へ') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>

<div class="actions">
	<h3><?php echo __('メニュー'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('ユーザー登録'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('賭け状況'), array('controller' => 'bets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('新たに賭ける'), array('controller' => 'bets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('ゲームリスト'), array('controller' => 'games', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('ゲームを作る'), array('controller' => 'games', 'action' => 'add')); ?> </li>
	</ul>
</div>
