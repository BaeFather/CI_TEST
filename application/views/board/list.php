게시판 리스트 입니다.

<table border="1" width="800" style="font-size:14px">
    <colgroup>
        <col width="60">
        <col width="">
        <col width="200">
        <col width="200">
    </colgroup>
    <tr>
        <th>no</th>
        <th>제목</th>
        <th>등록일시</th>
        <th>관리</th>
    </tr>
<?
$no = $start_no;
foreach ($list as $LIST) {
?>
    <tr>
        <td align="center"><?=$no?></td>
        <td><?=$LIST->title;?></td>
        <td align="center"><?=$LIST->regdate;?></td>
        <td align="center">
            <a href="/board/show/<?=$LIST->idx;?>">View</a>
            <a href="/board/edit/<?=$LIST->idx;?>">Edit</a>
            <a href="javascript:;" onClick="boardProc('delete','<?=$LIST->idx;?>');">Delete</a>
            <a href="javascript:;" onClick="boardProc('drop','<?=$LIST->idx;?>');">Drop</a>
        </td>
    </tr>
<?
    $no--;
}
?>
    <tr>
        <th colspan="4"><?=$pages?></th>
    </tr>
    <form id="searchForm" method="get">
        <tr>
            <td colspan="4" align="center">
                <select id="searchField" name="searchField">
                    <option value="">::검색::</option>
                    <option value="title">제목</option>
                    <option value="contents">내용</option>
                </select>
                <input type="text" id="keyword" name="keyword">
                <input type="submit" value="검색">
            </td>
        </tr>
    </form>
</table>

<a href="/board/create">글쓰기</a>

<script>
function boardProc(mode, no) {
    if( (mode=='delete' || mode=='drop') && no ) {
        printStr = (mode=='delete') ? '삭제' : '영구삭제';
        if( confirm(printStr + ' 처리 하시겠습니까?') ) {
            location.href = '/board/' + mode + '/' + no;
        }
    }
}
</script>