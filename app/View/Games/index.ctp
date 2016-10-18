<div class="games index">
	<h2><?php echo __('ゲームリスト'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title','ゲーム名'); ?></th>
			<th><?php echo $this->Paginator->sort('item_1' , '選択1'); ?></th>
			<th><?php echo $this->Paginator->sort('item_1' , '選択2'); ?></th>
			<th><?php echo $this->Paginator->sort('item_1' , '選択3'); ?></th>
			<th><?php echo $this->Paginator->sort('item_1' , '選択4'); ?></th>
			<th><?php echo $this->Paginator->sort('item_1' , '選択5'); ?></th>
			<th><?php echo $this->Paginator->sort('eventday','開催日'); ?></th>
			<th><?php echo $this->Paginator->sort('done' , '状況'); ?></th>
			<th><?php echo $this->Paginator->sort('result' , '結果'); ?></th>
			<th class="actions"><?php echo __(''); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($games as $game): ?>
	<tr>
		<td><?php echo h($game['Game']['id']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['title']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['item_1']); ?><br>
		<div class="odds"><?php if (isset($game['Game']['odds_1'])) {
				echo '(' . h($game['Game']['odds_1'] . '倍)');} ?></div></td>
		<td><?php echo h($game['Game']['item_2']); ?><br>
		<div class="odds"><?php if (isset($game['Game']['odds_2'])) {
				echo '(' . h($game['Game']['odds_2'] . '倍)');} ?></div></td>
						<td><?php echo h($game['Game']['item_3']); ?><br>
		<div class="odds"><?php if (isset($game['Game']['odds_3'])) {
				echo '(' . h($game['Game']['odds_3'] . '倍)');} ?></div></td>
		<td><?php echo h($game['Game']['item_4']); ?><br>
		<div class="odds"><?php if (isset($game['Game']['odds_4'])) {
				echo '(' . h($game['Game']['odds_4'] . '倍)');} ?></div></td>
		<td><?php echo h($game['Game']['item_5']); ?><br>
		<div class="odds"><?php if (isset($game['Game']['odds_5'])) {
				echo '(' . h($game['Game']['odds_5'] . '倍)');} ?></div></td>
		<td><?php echo $this->Time->format($game['Game']['eventday'], '%m/%d'); ?>&nbsp;</td>
		<td><?php if($game['Game']['done'] === true){echo '終了';} ?>&nbsp;</td>
		<td><?php echo h($game['Game']['result']); ?>&nbsp;</td>

		<td class="actions">
			<?php echo $this->Html->link(__('詳細'), array('action' => 'view', $game['Game']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('ゲームを作る'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('ユーザーリスト'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('ユーザー登録'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('賭け状況'), array('controller' => 'bets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('新たに賭ける'), array('controller' => 'bets', 'action' => 'add')); ?> </li>
	</ul>
</div>
