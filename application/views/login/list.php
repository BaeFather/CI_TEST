회원목록페이지
<table style="width:800px;font-size:14px">
	<colgroup>
		<col style="width:60px">
		<col style="width:200px">
		<col style="width:60px">
		<col style="width:200px">
	</colgroup>
	<tr>
		<th>no</th>
		<th>email</th>
		<th>date</th>
		<th>proc</th>
	</tr>
<?php
$no = $start_no;
foreach ($list as $LIST) {
?>
	<tr style="text-align: center">
		<td><?=$no?></td>
		<td><?=$LIST->email?></td>
		<td><?=$LIST->regTs?></td>
		<td>
			<a href="/members/show/<?=$LIST->idx?>">View</a>
			<a href="/members/edit/<?=$LIST->idx?>">Edit</a>
			<a href="/members/delete/<?=$LIST->idx?>">Delete</a>
		</td>
	</tr>
<?
	$no--;
}
?>
</table>
