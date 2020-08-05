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

$member = MemberService::getMemberByLoginId($_REQUEST['loginId']);



// https://www.youtube.com/watch?v=whdi4mu_OvA    1:12:00 영상 봐야함