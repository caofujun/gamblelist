<div class="bets form">
	<?php echo $this->Form->create('Bet'); ?>
	<fieldset>
		<legend><?php echo __('新たに賭ける'); ?></legend>
		<?php
		echo $this->Form->input('game_id', array('label' => 'ゲーム名'));
		?>

		<div class="choice">
			<?php 
			echo $this->Form->input('choice_item', array(
				'type' => 'radio',
				'legend' => ' ',
				'before' => '賭け選択 何番に賭ける？',
				'options'=>array('1'=>'選択1' , '2'=>'選択2' , '3'=>'選択3' , '4'=>'選択4' , '5'=>'選択5')
				));
			?>
		</div>

			<?php 
			echo $this->Form->input('payment', array('label' => '賭け金'));
			?>
	</fieldset>
		<?php echo $this->Form->end(__('賭ける！')); ?>
</div>

	<div class="actions">
		<h3><?php echo __('メニュー'); ?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('賭け状況'), array('action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('ユーザーリスト'), array('controller' => 'users', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('ユーザー登録'), array('controller' => 'users', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('ゲームリスト'), array('controller' => 'games', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('ゲームを作る'), array('controller' => 'games', 'action' => 'add')); ?> </li>
		</ul>
	</div>

	<table cellpadding = "0" cellspacing = "0">
		<tr>
			<th><?php echo __('ゲーム名'); ?></th>
			<th><?php echo __('選択1'); ?></th>
			<th><?php echo __('選択2'); ?></th>
			<th><?php echo __('選択3'); ?></th>
			<th><?php echo __('選択4'); ?></th>
			<th><?php echo __('選択5'); ?></th>
		</tr>

<?php foreach ($bets as $game): ?>
	<?php if (!$game['Game']['done']): ?>
		<tr>
			<td><?php echo $game['Game']['title']; ?></td>
			<td><?php echo h($game['Game']['item_1']); ?><br>

			<div class="odds">
				<?php if (isset($game['Game']['odds_1'])) {
					echo '(' . h($game['Game']['odds_1'] . '倍)');} ?></div></td>

			<td><?php echo h($game['Game']['item_2']); ?><br>

			<div class="odds">
				<?php if (isset($game['Game']['odds_2'])) {
					echo '(' . h($game['Game']['odds_2'] . '倍)');} ?></div></td>

			<td><?php echo h($game['Game']['item_3']); ?><br>

			<div class="odds">
				<?php if (isset($game['Game']['odds_3'])) {
					echo '(' . h($game['Game']['odds_3'] . '倍)');} ?></div></td>

			<td><?php echo h($game['Game']['item_4']); ?><br>

			<div class="odds">
				<?php if (isset($game['Game']['odds_4'])) {
					echo '(' . h($game['Game']['odds_4'] . '倍)');} ?></div></td>

			<td><?php echo h($game['Game']['item_5']); ?><br>

			<div class="odds">
				<?php if (isset($game['Game']['odds_5'])) {
					echo '(' . h($game['Game']['odds_5'] . '倍)');} ?></div></td>
		</tr>
	<?php endif ?>
<?php endforeach; ?>
		</table>