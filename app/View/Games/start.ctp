<div class="games index">
	<h2><?php echo __('はじめに'); ?></h2>

	<div id="first">
		<h2>「任侠」は賭け内容の記録管理アプリです。</h2>

		<div id="btn_explain">機能説明</div>
		<div id="text_explain">
		<br>
			<h3>主な機能</h3>
			<p>自動でオッズ計算し、合計賭け金額も計算します。<br>
				また、当選結果を確定すると、<br>
				ユーザー毎に勝ち負け判定、配当金の計算、収支状況を自動反映！<br>
				ゲーム毎に自動更新し、未終了のゲームをソート反映します。<br>
				ユーザー詳細ページでは、過去にどのゲームにいくら賭けたか、勝敗、配当金額などを連動表示します。</p>
				<br>

			<h3>「ゲームリスト」</h3>
			<p>賭け対象のゲームを一覧表示できます。<br>
				　・「詳細」でゲームの細かい内容をみることができます。<br>
				　・「詳細＞編集」でゲーム内容を編集することができます。<br>　　編集可能なのはそのゲームを作成した「親ユーザー」のみとなります。</p>
				<br>

			<h3>「ゲームを作る」</h3>
			<p>賭け対象のゲームを作成することができます。<br>
				　・作成したユーザーが「親ユーザー」となり、<br>
				　　親ユーザーのみ編集可能です。</p>
				<br>

			<h3>「新たに賭ける」</h3>
			<p>ゲームに賭けることができます。<br>
				　・未終了のゲームのみ選択可能となります。<br>
				　・関係するゲーム内容・オッズも表示されます。</p>
				<br>

			<h3>「賭け状況」</h3>
			<p>賭けられた内容の一覧です。他ユーザーの賭けも確認できます。</p>
			<br>

			<h3>「ユーザーリスト」</h3>
			<p>ユーザーの一覧表示となります。<br>
				　・作成したユーザー本人のみ、編集・削除することが可能です。</p>
		</div>
		<br>
		<p style="color:red;">※実際の賭博を助長するものではございません。<br>
													　自己責任でお願いします。</p>
	</div>
</div>

<div class="actions">
	<h3><?php echo __('メニュー'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('ゲームリスト'), array('controller' => 'games', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('ユーザーリスト'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('賭け状況'), array('controller' => 'bets', 'action' => 'index')); ?> </li>
	</ul>
</div>

<script>
	$(function(){
		$("#btn_explain").click(function(){
			$("#text_explain").fadeToggle();
		});
	});
</script>