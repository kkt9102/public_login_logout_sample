<?php
define("DB_HOST", "127.0.0.1");
//DB_HOST 주소 받아오기
define("DB_ID", "root");
//DB_ID 받아오기
define("DB_PW", "");
//DB_PW 받아오기
define("DB_NAME", "phpSiteTemplate");
//DB_NAME 받아오기


if ( !isset($config) ) {
    // !isset 만약 !isset()이란 변수가 없을때만 만들어준다
    $config = [];
}

$config['dbConn'] = mysqli_connect(DB_HOST, DB_ID, DB_PW, DB_NAME) or die();

$config['siteName'] = '<사이트명 입력하는곳>';
//Mysql 연결하기
?>
<!--'변수'가 아닌 '함수' 이렇게 만들면 수정불가!-->