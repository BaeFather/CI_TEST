게시판 글 수정 화면 입니다.

<form name="bfrm" action="/board/update/<?=$edit->idx;?>" method="post">
    <input type="hidden" name="_method" value="PUT">
    <table border="1" width="600">
        <tr>
            <th>제목</th>
            <td><input type="text" name="title" value="<?=$edit->title;?>" style="width:100%"></td>
        </tr>
        <tr>
            <th>내용</th>
            <td><textarea name="contents" style="width:100%;height:300px;"><?=$edit->contents;?></textarea></td>
        </tr>
        <tr>
            <th colspan="2"><input type="submit" value=" 수정 " /></th>
        </tr>
    </table>
</form>

<a href="/board">목록</a>