
<!--
    $config = [];
    $config['needToLogin'] = false;
    //이부분을 빼면 로그인 없이는 들어올 수 없는 페이지가 된다
    -->

<?php
// 관리자 페이지들을 위한 공통 작업
require_once $_SERVER['DOCUMENT_ROOT'] . '/../init/admin.php';

$pageTitle = '관리자 메인';
// 관리자 페이지 공통 상단
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/admin/head.php';
?>

<div class="con">
    <a href="/admin/member/doLogout.php">로그아웃</a>
</div>

<?php
// 관리자 페이지 공통 하단
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/admin/foot.php';