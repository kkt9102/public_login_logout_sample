<?php
class App {
    public static function isLogined(): bool {
        // 'is'로 시작하는것은 무조건 'true' or 'false'이다
        if ( isset($_SESSION['loginedMemberId']) ){
            // $_SESSION['loginedMemberId']; 는 로그인이 되어 있는지 확인하는 방법
            // $_SESSION은 브라우저 접속자마다 개별적으로 생성됨, 즉 현재 접속한 접속자의 아이디를 가져옴
            return true;
        }
        
        return false;
    }
}
// 'class'안에 넣으면 비슷한 함수들을 묶을 수 있다

require_once __DIR__ . '/ArticleDao.php';
require_once __DIR__ . '/ArticleService.php';
require_once __DIR__ . '/MemberDao.php';
require_once __DIR__ . '/MemberService.php';








