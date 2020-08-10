<?php

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