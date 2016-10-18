<div class="users view">
<h2><?php echo __('ユーザー詳細'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ユーザー名'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('勝ち数'); ?></dt>
		<dd>
			<?php echo h($user['User']['win_count']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('負け数'); ?></dt>
		<dd>
			<?php echo h($user['User']['lose_count']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('勝率'); ?></dt>
		<dd>
			<?php echo h($user['User']['average']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('賭け金合計'); ?></dt>
		<dd>
			<?php echo h($user['User']['sum_payment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('配当金合計'); ?></dt>
		<dd>
			<?php echo h($user['User']['sum_dividend']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('負け金合計'); ?></dt>
		<dd>
			<?php echo h($user['User']['sum_lost']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('収支'); ?></dt>
		<dd>
			<?php echo h($user['User']['amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('権限'); ?></dt>
		<dd>
			<?php echo h($user['User']['role']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('作成日'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

<div class="actions">
	<h3><?php echo __('メニュー'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('ユーザーリスト'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('ユーザー登録'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('賭け状況'), array('controller' => 'bets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('新たに賭ける'), array('controller' => 'bets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('ゲームリスト'), array('controller' => 'games', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('ゲームを作る'), array('controller' => 'games', 'action' => 'add')); ?> </li>
		<li>　</li>
		<li><?php echo $this->Html->link(__('ユーザー編集'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('ユーザー削除'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('ユーザー「%s」を本当に削除してもよいですか?', $user['User']['username']))); ?> </li>
	</ul>
</div>

<div class="related">
	<?php if (!empty($user['Bet'])): ?>
	<h3><?php echo __('賭けた内容'); ?></h3>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('ゲーム名'); ?></th>
		<th><?php echo __('選んだ番号'); ?></th>
		<th><?php echo __('賭け金'); ?></th>
		<th><?php echo __('勝敗'); ?></th>
		<th><?php echo __('配当金'); ?></th>
		<th><?php echo __('負け金'); ?></th>
		<th><?php echo __('賭けた日付'); ?></th>
	</tr>
	<?php foreach ($user['Bet'] as $bet): ?>
		<tr>
			<td><?php echo $bet['Game']['title']; ?></td>
			<td><?php echo $bet['choice_item']; ?></td>
			<td><?php echo $bet['payment']; ?></td>
			<td><?php echo $bet['win_lose']; ?></td>
			<td><?php echo $bet['dividend']; ?></td>
			<td><?php echo $bet['lost']; ?></td>
			<td><?php echo $this->Time->format($bet['created'], '%m/%d'); ?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>

<div class="related">
	<?php if (!empty($user['Game'])): ?>
	<h3><?php echo __('賭けたゲーム'); ?></h3>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('ゲーム名'); ?></th>
		<th><?php echo __('選択1'); ?></th>
		<th><?php echo __('選択2'); ?></th>
		<th><?php echo __('選択3'); ?></th>
		<th><?php echo __('選択4'); ?></th>
		<th><?php echo __('選択5'); ?></th>
		<th><?php echo __('状況'); ?></th>
		<th><?php echo __('結果'); ?></th>
		<th class="actions"><?php echo __(''); ?></th>
	</tr>
	<?php foreach ($user['Game'] as $game): ?>
		<tr>
		<td><?php echo $game['title']; ?></td>
		<td><?php echo h($game['item_1']); ?><br>
		<div class="odds"><?php if (isset($game['odds_1'])) {
				echo '(' . h($game['odds_1'] . '倍)');} ?></div></td>
		<td><?php echo h($game['item_2']); ?><br>
		<div class="odds"><?php if (isset($game['odds_2'])) {
				echo '(' . h($game['odds_2'] . '倍)');} ?></div></td>
		<td><?php echo h($game['item_3']); ?><br>
		<div class="odds"><?php if (isset($game['odds_3'])) {
				echo '(' . h($game['odds_3'] . '倍)');} ?></div></td>
		<td><?php echo h($game['item_4']); ?><br>
		<div class="odds"><?php if (isset($game['odds_4'])) {
				echo '(' . h($game['odds_4'] . '倍)');} ?></div></td>
		<td><?php echo h($game['item_5']); ?><br>
		<div class="odds"><?php if (isset($game['odds_5'])) {
				echo '(' . h($game['odds_5'] . '倍)');} ?></div></td>
		<td><?php if($game['done'] === true){echo '終了';} ?></td>
		<td><?php echo $game['result']; ?></td>
		<td class="actions">
				<?php echo $this->Html->link(__('詳細'), array('controller' => 'games', 'action' => 'view', $game['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
