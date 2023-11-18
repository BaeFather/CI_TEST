<table border="1" width="600">
    <colgroup>
        <col width="100">
        <col width="">
    </colgroup>
    <tr>
        <th>제목</th>
        <td><?=$view->title;?></td>
    </tr>
    <tr>
        <th>등록일시</th>
        <td><?=$view->regdate;?></td>
    </tr>
    <tr>
        <th>내용</th>
        <td><?=$view->contents;?></td>
    </tr>
</table>

<a href="/board">목록</a>