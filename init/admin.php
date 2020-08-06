<?php
session_start();


if ( isset($config) == false ) {
    // isset($config)가 없으면
    $config = [];
    // $config[]를 만들어 준다
}

if ( isset($config['needToLogin']) == false ) {
    // isset($config['needToLogin'])가 없으면
    $config['needToLogin'] = true;
    // $config['needToLogin']을 만들어 준다
}



require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../lib/lib.php';
//'lib' 공통적인 로직
require_once __DIR__ . '/../app/app.php';
//'app'
// __DIR__ 현재 폴더를 말한다



if ( $config['needToLogin'] and App::isLogined() == false ) {
    // 만약 로그인이 되어있지 않다면
    //if ( $config['needToLogin'] and App::isLogined() == false ) 이렇게는 undefind가 뜸
    jsAlert('로그인 후 이용해주세요.');
    // '로그인 후 이용해주세요.' 라는 메세지를 출력 후
    jsLocationReplace('/admin/member/login.php');
    // admin/member/login.php 로 돌려 보낸다
}