<?php
// 관리자 페이지들을 위한 공통 작업
require_once $_SERVER['DOCUMENT_ROOT'] . '/../init/admin.php';

$pageTitle = '게시물 관리';
// 관리자 페이지 공통 상단
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/admin/head.php';

$articles = ArticleService::getForPrintArticles();
?>

<!-- 게시판 리스트 HTML -->
<div class="con table-box">
    <table>
        <colgroup>
            <col width="60">
            <col width="200">
            <col width="300">
            <col>
            <col width="300">
        </colgroup>
        <thead>
        <th>번호</th>
        <th>날짜</th>
        <th>제목</th>
        <th>내용</th>
        <th>비고</th>
    </thead>
    <tbody>
        <?php foreach ( $articles as $article ) { ?>
        <tr>
            <td><?=$article['id']?></td>
            <td><?=$article['regDate']?></td>
            <td><?=$article['title']?></td>
            <td><?=$article['body']?></td>
            <td class="text-align-center">
            <a href="/admin/board/modify.php?id=<?=$article['id']?>" class="btn btn-success">수정</a>
            <a onclick="if ( confrim('정말 삭제 하시겠습니까?') == false ) return false;" class="btn btn-danger" href="/admin/board/doDelete.php?id=<?=$article['id']?>">삭제</a>
            </td>
        </tr>    
        <?php } ?>
    </tbody>
    </table>
</div>

<div class="con">
<a href="/admin/board/make.php" class="btn btn-primary">게시물 생성</a></div>

<?php
// 관리자 페이지 공통 하단
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/admin/foot.php';