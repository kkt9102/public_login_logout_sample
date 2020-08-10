<?php

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

    public static function getForPrintIsArticlesCount(): int {
        $sql = "
        SELECT COUNT(*) AS cnt
        FROM article
        WHERE displayStatus = 1
        ";
        return DB__getDBRowIntValue($sql, 0);
    }
}