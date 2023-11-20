<table style="width: 600px" border="1">
    <colgroup>
        <col width="100">
        <col width="">
    </colgroup>
    <tr>
        <th>제목</th>
        <td><?=$view->title?></td>
    </tr>
    <tr>
        <th>등록일시</th>
        <td><?=$view->regdate?></td>
    </tr>
	<tr>
		<th>수정일시</th>
		<td><?=$view->editdate?></td>
	</tr>
    <tr>
        <th>내용</th>
        <td><?=nl2br($view->contents)?></td>
    </tr>
	<tr>
		<th>조회</th>
		<td><?=number_format($view->cnt)?></td>
	</tr>
	<tr>
		<th>ip</th>
		<td><?=$view->ip?> / <?=$view->agent?></td>
	</tr>
</table>

<a href="/board">목록</a>
