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

if ( empty($member) ) {
    jsAlert("해당 회원은 존재하지 않습니다.");
    jsHistoryBack();
}
// 'id'가 일치하지 않을 경우

if ( $member['loginPw'] != $_REQUEST['loginPw'] ) {
    jsAlert("비밀번호가 일치하지 않습니다.");
    jsHistoryBack();
}
// 'pw'가 일치 하지 않을 경우


$_SESSION['loginedMemberId'] = $member['id'];
$_SESSION['loginedMember'] = $member;

jsAlert("로그인 성공,{$member['name']}님 환영합니다.");
jsLocationReplace("/admin/home/main.php");
// 'id' 와 'pw'가 일치할 경우

