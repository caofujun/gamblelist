<div class="bets index">
	<h2><?php echo __('賭け状況'); ?></h2>
	<table cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('id'); ?></th>
				<th><?php echo $this->Paginator->sort('ユーザー'); ?></th>
				<th><?php echo $this->Paginator->sort('ゲーム名'); ?></th>
				<th><?php echo $this->Paginator->sort('選んだ番号'); ?></th>
				<th><?php echo $this->Paginator->sort('賭け金'); ?></th>
				<th><?php echo $this->Paginator->sort('勝敗'); ?></th>
				<th><?php echo $this->Paginator->sort('配当金'); ?></th>
				<th><?php echo $this->Paginator->sort('負け金'); ?></th>
				<th><?php echo $this->Paginator->sort('賭けた日付'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($bets as $bet): ?>
				<tr>
					<td><?php echo h($bet['Bet']['id']); ?>&nbsp;</td>
					<td>
						<?php echo $this->Html->link($bet['User']['username'], array('controller' => 'users', 'action' => 'view', $bet['User']['id'])); ?>
					</td>
					<td>
						<?php echo $this->Html->link($bet['Game']['title'], array('controller' => 'games', 'action' => 'view', $bet['Game']['id'])); ?>
					</td>
					<td><?php echo h($bet['Bet']['choice_item']); ?>&nbsp;</td>
					<td><?php echo h($bet['Bet']['payment']); ?>&nbsp;</td>
					<td><?php echo h($bet['Bet']['win_lose']); ?>&nbsp;</td>
					<td><?php echo h($bet['Bet']['dividend']); ?>&nbsp;</td>
					<td><?php echo h($bet['Bet']['lost']); ?>&nbsp;</td>
					<td><?php echo $this->Time->format($bet['Bet']['created'], '%m/%d %H:%m') ?></td>
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
				<li><?php echo $this->Html->link(__('新たに賭ける'), array('action' => 'add')); ?></li>
				<li><?php echo $this->Html->link(__('ユーザーリスト'), array('controller' => 'users', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('ユーザー登録'), array('controller' => 'users', 'action' => 'add')); ?> </li>
				<li><?php echo $this->Html->link(__('ゲームリスト'), array('controller' => 'games', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('ゲームを作る'), array('controller' => 'games', 'action' => 'add')); ?> </li>
			</ul>
		</div>
