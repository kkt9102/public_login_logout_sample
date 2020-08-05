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


class MemberService {
    public static function getMemverByLoginId(string $loginId): array {
        // login을 했을 때 맴버 ID를 가져온다
        if ( isset($_SESSION['loginedMemberId']) ){
        $sql = "
        SELECT *
        FROM member
        WHERE loginId = '{$loginId}'
        ";
        return getDBRow($sql);
        }
}