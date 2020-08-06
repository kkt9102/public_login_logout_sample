<!-- 라이브러리 PHP -->

<?php
function jsAlert(string $msg) {
    // string $msg 오직 'string' 타입만 들어갈 수 있다
    // '로그인 후 이용해주세요. 메세지 출력
    echo "<script> alert('{$msg}'); </script>";
}
function jsLocationReplace(string $url) {
    // 로그인 페이지로 자동 이동됨
    echo "<script> location.replace('{$url}'); </script>";
    exit;
    // 마지막에 exit 는 페이지 이동 후 이 프로그램을 꺼주기 위해서 써준다
}


function jsHistoryBack() {
    echo "<script> history.back(); </script>";
    exit;
}

function DB__execute($sql) {
    // DB__execute($sql) 은 $sql을 실행한다는 뜻
    global $config;
    //global $config는 외부에서 사용된 $config를 가져온다
    return mysqli_query($config['dbConn'], $sql);
}

function DB__getDBRows($sql) {
    $rs = DB__execute($sql);

    $rows = [];
    
    while ( $row = mysqli_fetch_assoc($rs) ) {
        $rows[] = $row;
    }
    return $rows;
}

function DB__getDBRow($sql) {
    $rows = DB__getDBRows($sql);

    if ( isset($rows[0]) ) {
        return $rows[0];
    }
    return [];
}