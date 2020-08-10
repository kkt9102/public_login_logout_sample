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
    // ArticleService 는 ArtcileDao에게 요청한다
    public static function getForPrintBoards(): array {
        return ArticleDao::getForPrintBoards();
    }
    // :array 배열이란 변수 하나에 여러가지 값들을 넣는 방식

    public static function getBoardById(int $id) {
        return ArticleDao::getBoardById($id);
    }

    public static function deleteBoard(int $id) {
        ArticleDao::deleteBoard($id);
    }
    public static function getBoardByCode(string $id) {
        return ArticleDao::getBoardByCode($id);
    }
    public static function makeBoard($args) : int {
        return ArticleDao::makeBoard($args);
    }
    public static function modifyBoard($args) {
        return ArticleDao::modifyBoard($args);
    }
    public static function getForPrintArticles(): array {
        return ArticleDao::getForPrintArticles();
    }
}
//게시물관리 클릭시 해당 페이지로 이동하기위해 'ArticleDao에게 요정한다

class ArticleDao {
    public static function getForPrintBoards(): array {
        // 게시판 리스를 받아오기 위한 코드
        // login을 했을 때 맴버 ID를 가져온다
        // MemberDao는 직접 DB와 통신을 한다
        $sql = "
        SELECT *
        FROM board
        ORDER BY id DESC
        ";
        return DB__getDBRows($sql);
    }

  
    public static function getBoardById(int $id) {
        // 게시판 id를 받아오기 위한 코드
        $sql = "
        SELECT *
        FROM board
        WHERE id = '{$id}'
        ";
        return DB__getDBRow($sql);
    }   
    
    public static function deleteBoard(int $id) {
        // 삭제하겠다 선택을 했을때 이루어지는 코드
        $sql = "
        DELETE FROM board
        WHERE id = '{$id}'
        ";
        // DELETE FROM board <- 삭제될 속성을 가지고 있는 위치는 'board'이다.
        // 삭제 될 대상의 기분은 'id'이다.
        DB__delete($sql);
    }   

    public static function getBoardByCode(string $code) {
        // 게시판 code를 받아오기 위한 코드
        $sql = "
        SELECT *
        FROM board
        WHERE id = '{$code}'
        ";
        return DB__getDBRow($sql);
    }
    public static function makeBoard($args) : int {
        // 게시판 생성을 위한 코드
        $sql = "
        INSERT INTO board
        SET regDate = NOW(),
        updateDate = NOW(),
        `name` = '${args['name']}',
        `code` = '${args['code']}'
        ";
        return DB__insert($sql);
    }
    public static function modifyBoard($args){
        // 게시판 수정을 위한 코드
        $sql = "
        UPDATE board
        SET updateDate = NOW(),
        `name` = '${args['name']}',
        `code` = '${args['code']}'
        WHERE id = '${args['id']}'
        ";
        DB__update($sql);
    }
    public static function getForPrintArticles(): array {
        // 게시물 리스를 받아오기 위한 코드
        $sql = "
        SELECT *
        FROM article
        ORDER BY id DESC
        ";
        return DB__getDBRows($sql);
    }


}


