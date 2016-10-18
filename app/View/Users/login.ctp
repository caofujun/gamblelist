<div class="users form">
	<?php echo $this->Flash->render('auth'); ?>
	<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend>
			<?php echo __('ユーザー名とパスワードを入力して下さい'); ?>
		</legend>
		<?php echo $this->Form->input('username', array('label' => 'ユーザー名'));
		echo $this->Form->input('password', array('label' => 'パスワード'));
		?>
	</fieldset>
	<?php echo $this->Form->end(__('ログイン')); ?>
</div>