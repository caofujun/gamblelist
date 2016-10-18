<div class="games view">
<h2><?php echo __('ゲーム詳細'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($game['Game']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ゲーム名'); ?></dt>
		<dd>
			<?php echo h($game['Game']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('開催日'); ?></dt>
		<dd>
			<?php echo h($game['Game']['eventday']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('選択1'); ?></dt>
		<dd>
			<?php echo h($game['Game']['item_1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('選択2'); ?></dt>
		<dd>
			<?php echo h($game['Game']['item_2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('選択3'); ?></dt>
		<dd>
			<?php echo h($game['Game']['item_3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('選択4'); ?></dt>
		<dd>
			<?php echo h($game['Game']['item_4']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('選択5'); ?></dt>
		<dd>
			<?php echo h($game['Game']['item_5']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('オッズ1'); ?></dt>
		<dd>
			<?php echo h($game['Game']['odds_1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('オッズ2'); ?></dt>
		<dd>
			<?php echo h($game['Game']['odds_2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('オッズ3'); ?></dt>
		<dd>
			<?php echo h($game['Game']['odds_3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('オッズ4'); ?></dt>
		<dd>
			<?php echo h($game['Game']['odds_4']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('オッズ5'); ?></dt>
		<dd>
			<?php echo h($game['Game']['odds_5']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('賭け金合計'); ?></dt>
		<dd>
			<?php echo h($game['Game']['sum']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('状況'); ?></dt>
		<dd>
			<!-- <?php echo h($game['Game']['done']); ?> -->
			<?php 
			if($game['Game']['done'] === true){echo '終了';} ?>
			&nbsp;
		</dd>
		<dt><?php echo __('結果'); ?></dt>
		<dd>
			<?php echo h($game['Game']['result']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('親ユーザー'); ?></dt>
		<dd>
			<?php echo $this->Html->link($game['User']['username'], array('controller' => 'users', 'action' => 'view', $game['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('作成日'); ?></dt>
		<dd>
			<?php echo h($game['Game']['created']); ?>
			&nbsp;
		</dd>
	</dl>
<br>
		<p>※不正防止のためゲームは削除することができません。<br>
			　選択などの変更は「賭けを編集」からお願いします。</p>
</div>

<div class="actions">
	<h3><?php echo __('メニュー'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('ゲームリスト'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('ゲームを作る'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('ユーザーリスト'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('ユーザー登録'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('賭け状況'), array('controller' => 'bets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('新たに賭ける'), array('controller' => 'bets', 'action' => 'add')); ?> </li>
		<li>　</li>
		<li><?php echo $this->Html->link(__('賭けを編集'), array('action' => 'edit', $game['Game']['id'])); ?> </li>
	</ul>
</div>

<div class="related">
	<?php if (!empty($game['Bet'])): ?>
	<h3><?php echo __('賭け状況'); ?></h3>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('ユーザー'); ?></th>
		<th><?php echo __('選んだ番号'); ?></th>
		<th><?php echo __('賭け金'); ?></th>
		<th><?php echo __('勝敗'); ?></th>
		<th><?php echo __('配当金'); ?></th>
		<th><?php echo __('負け金'); ?></th>
		<th><?php echo __('賭けた日付'); ?></th>
	</tr>
	<?php foreach ($game['Bet'] as $bet): ?>
	<tr>
		<td><?php echo $bet['User']['username']; ?></td>
		<td><?php echo $bet['choice_item']; ?></td>
		<td><?php echo $bet['payment']; ?></td>
		<td><?php echo $bet['win_lose']; ?></td>
		<td><?php echo $bet['dividend']; ?></td>
		<td><?php echo $bet['lost']; ?></td>
		<td><?php echo $bet['created']; ?></td>
	</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
