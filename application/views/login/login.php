<div class="container">
	<?=form_open('members/login', array('method'=>'post', 'id'=>'loginForm')); ?>
	<dl>
		<dt>email</dt>
		<dd>
			<input type="text" name="email" value="" />
		</dd>
	</dl>
	<dl>
		<dt>Password</dt>
		<dd>
			<input type="password" name="passwd" value="" />
		</dd>
	</dl>
	<dl>
		<dd><button type="submit">로그인</button></dd>
	</dl>
	<?=form_close();?>
</div>
