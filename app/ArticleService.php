<?php

class ArticleService {
    // ArticleService 는 ArtcileDao에게 요청한다
    public static function getForPrintBoards(): array {
        return ArticleDao::getForPrintBoards();
    }
    // 게시판 리스트를 불러오기 위한 함수
    // :array 배열이란 변수 하나에 여러가지 값들을 넣는 방식

    public static function getBoardById(int $id) {
        return ArticleDao::getBoardById($id);
    }
    // 게시판 id값을 불러오기위한 함수

    public static function deleteBoard(int $id) {
        ArticleDao::deleteBoard($id);
    }
    // 게시판 삭제를 위한 함수
    public static function getBoardByCode(string $id) {
        return ArticleDao::getBoardByCode($id);
    }
    // 게시판 code를 불러오기 위한 함수
    public static function makeBoard($args) : int {
        return ArticleDao::makeBoard($args);
    }
    // 게시판을 생성하기 위한 함수
    public static function modifyBoard($args) {
        return ArticleDao::modifyBoard($args);
    }
    // 게시판을 수정하기 위한 함수
    public static function getForPrintArticles(): array {
        return ArticleDao::getForPrintArticles();
    }
    // 게시물을 불러오기 위한 함수
    public static function getForPrintIsArticles($args) {
        $totalCount = getForPrintIsArticlesCount($args);

        $page = getArrValue($args , 'page', 1);
    }
    // 게시물을 불러올 때 페이징을 위한 함수(한페이지에 몇개의 게시물이 보이게 할 지)
}
//게시물관리 클릭시 해당 페이지로 이동하기위해 'ArticleDao에게 요정한다



