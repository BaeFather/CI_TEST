게시판 글쓰기 화면 입니다.

<form name="bfrm" action="/board/store" method="post">
    <table border="1" width="600">
        <tr>
            <th>제목</th>
            <td><input type="text" name="title" value="" style="width:100%"></td>
        </tr>
        <tr>
            <th>내용</th>
            <td><textarea name="contents" style="width:100%;height:300px;"></textarea></td>
        </tr>
        <tr>
            <th colspan="2"><input type="submit" value=" 저장 " /></th>
        </tr>
    </table>
</form>

<a href="/board">목록</a>