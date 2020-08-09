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
    public static function getMemberByLoginId(string $loginId): array {
        //MemberService 는 MemberDao한테 요청한다
        return MemberDao::getMemberByLoginId($loginId);
    }
}

class MemberDao {
    public static function getMemberByLoginId(string $loginId): array {
        // login을 했을 때 맴버 ID를 가져온다
        // MemberDao는 직접 DB와 통신을 한다
        $sql = "
        SELECT *
        FROM member
        WHERE loginId = '{$loginId}'
        ";
        return DB__getDBRow($sql);
    }
}


class ArticleService {
    public static function getForPrintBoards(): array {
        return ArticleDao::getForPrintBoards();
    }
}
//게시물관리 클릭시 해당 페이지로 이동하기위해 'ArticleDao에게 요정한다

class ArticleDao {
    public static function getForPrintBoards(): array {
        // login을 했을 때 맴버 ID를 가져온다
        // MemberDao는 직접 DB와 통신을 한다
        $sql = "
        SELECT *
        FROM board
        ORDER BY id DESC
        ";
        return DB__getDBRows($sql);
    }
}