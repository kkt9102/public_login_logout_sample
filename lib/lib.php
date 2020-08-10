<!-- PHP 라이브러리  -->
<!-- 아마 JavaScript 개념으로 보면 될듯? 혹은 css 개념...? php의 기능 커스텀?? 그런 느낌 -->

<?php
function jsAlert(string $msg) {
    // string $msg 오직 'string' 타입만 들어갈 수 있다
    // '로그인 후 이용해주세요. 메세지 출력
    echo "<script> alert('{$msg}'); </script>";
}
// 메세지 관련 출력 담당
function jsLocationReplace(string $url) {
    // 로그인 페이지로 자동 이동됨
    echo "<script> location.replace('{$url}'); </script>";
    exit;
    // 마지막에 exit 는 페이지 이동 후 이 프로그램을 꺼주기 위해서 써준다
}
// url 링크 이동 출력담당

function jsHistoryBack() {
    echo "<script> history.back(); </script>";
    exit;
}
// 뒤로가기 활성화 담당


function DB__execute($sql) {
    // DB__execute($sql) 은 $sql을 실행한다는 뜻
    global $config;
    //global $config는 외부에서 사용된 $config를 가져온다
    return mysqli_query($config['dbConn'], $sql);
}
// sql 실행담당

function DB__insert($sql) {
    global $config;
    DB__execute($sql);
    return mysqli_insert_id($config['dbConn']);
}
// insert 실행담당 ex:게시판 추가, 게시글 추가, 팝업 추가 등

function DB__update($sql) {
    DB__execute($sql);
}
// update 실행담당 ex:수정하기 담당

function DB__delete($sql) {
    DB__execute($sql);
}
// delete 실행담당 ex:삭제 담당


function DB__getDBRows($sql) {
    $rs = DB__execute($sql);

    $rows = [];
    
    while ( $row = mysqli_fetch_assoc($rs) ) {
        $rows[] = $row;
    }
    return $rows;
}
// sql 압축해제담당


function DB__getDBRow($sql) {
    $rows = DB__getDBRows($sql);

    if ( isset($rows[0]) ) {
        return $rows[0];
    }
    return [];
}

function DB__getDBRowIntValue($sql, $default) : int {
    $row = DB__getDBRows($sql);

    if ( empty($row) ) {
        // 만약 $row가 0이면은 
        return $default;
    }

    foreach ( $row as $val ) {
        return $val;
    }
}
// 값이 



function DB__getDBRowStrinValue($sql, $default) : strin {
    $row = DB__getDBRows($sql);

    if ( empty($row) ) {
        return $default;
    }

    foreach ( $row as $val ) {
        return $val;
    }
}
// 값을 하나만 가쟈온다

// isset으로 변수가 설정되었는지 확인

function filterSqlInjection(&$args) {
    global $config;
    foreach ( $args as $key => $val ) {
        $args[$key] = mysqli_real_escape_string($config['dbConn'], $val);
    }
}

function DB_insert($sql) {
    DB__execute($sql);
    return mysqli_insert_id($config['dbConn']);
}

function getArrValue(&$arr, $key, $default) {
    // &를 써주는 이유는메모리 절약을 위해...
    if ( isset($arr[$key]) ) {
        return $arr[$key];
    }
    
    return $default;
}