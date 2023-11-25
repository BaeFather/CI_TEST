<div class="container">
	<?=form_open('members/store'); ?>
		<dl>
			<dt>email</dt>
			<dd>
				<input type="text" name="email" value="" />
			</dd>
		</dl>
		<dl>
			<dt>Password</dt>
			<dd>
				<input type="text" name="passwd" value="" />
			</dd>
		</dl>

	<button type="submit">저장하기</button>
	<? form_close(); ?>
</div>
