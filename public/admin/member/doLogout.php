<?php
$config = [];
$config['needToLogin'] = false;

// 관리자 페이지들을 위한 공통 작업
require_once $_SERVER['DOCUMENT_ROOT'] . '/../init/admin.php';

unset($_SESSION['loginedMemberId']);
unset($_SESSION['loginedMember']);
// unset 은 자체를 날려버린다

jsAlert("로그아웃 되었습니다.");
jsLocationReplace("/admin/member/login.php");