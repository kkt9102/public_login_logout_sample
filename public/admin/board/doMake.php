<?php
$config = [];
$config['needToLogin'] = false;
// 'login'페이지 만은 'needToLogin'을 false로 끈다

// 관리자 페이지들을 위한 공통작업
require_once $_SERVER['DOCUMENT_ROOT'] . '/../init/admin.php';
// 'include_once' 는 없으면 다음으로 넘어가지만
// 'require-once' 는 없으면 죽는다.
// $_SERVER['DOCUMENT_ROOT']; 웹 루트의 경로를 담고있다
// '/../config/config.php' 뒤로 돌아가 config 안의 config.php를 실행한다

// doLogin.php 페이지는 잠깐 머물다 떠나는 페이지이다


$board = ArticleService::getBoardByCode($_REQUEST['code']);

if ( $board ) {
    jsAlert("이미 존재하는 게시판 코드 입니다.");
    jsHistoryBack();
}

ArticleService::makeBoard($_REQUEST);

jsAlert("{$_REQUEST['name']} 게시판이 생성되었습니다.");
jsLocationReplace("/admin/board/list.php");
// 게시판을 삭제하시겠습니까? 에서 삭제를 누를 경우 게시판이 삭제되었다는 메시지와 함께
// board/list.php 페이지로 돌아가게 된다.
 