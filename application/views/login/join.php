<div class="container">
	<?=form_open('members/store', array('method'=>'post', 'id'=>'loginForm')); ?>
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
			<dd><button type="submit">회원가입</button></dd>
		</dl>
	<?=form_close();?>
</div>
