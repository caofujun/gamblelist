<!DOCTYPE html>
<html lang="ja">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>賭博個人録「任侠」</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->meta(array(
			'name'=> 'viewport',
			'content'=> 'width=device-width,initial-scale=1'
			));

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo $this->Html->link('賭博個人録「任侠」', '/');
			 ?></h1>
			<p>
				<?php 
				if (isset($loginUser['username'])) {
					echo 'ログイン中：' . $loginUser['username'] . '<br>';
					echo $this->Html->link(__('ログアウト'), array('controller' => 'users' , 'action' => 'logout'));
				}else{
					echo $this->Html->link(__('ログイン'), array('controller' => 'users' , 'action' => 'login')); 
					echo '<br>';
					echo $this->Html->link(__('ユーザー登録'), array('controller' => 'users' , 'action' => 'add')); 
				}
				?>
			</p>

		</div>
		<div id="content">
			<?php echo $this->Flash->render(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>

		<div id="footer">
		賭博個人録「任侠」
		</div>

	</div>


<script>
$(function() {
    setTimeout(function() {
        $('#flashMessage').fadeOut("slow");
    }, 3000);
});
</script>

</body>
</html>
