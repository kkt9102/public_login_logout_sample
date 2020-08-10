<?php

class MemberService {
    public static function getMemberByLoginId(string $loginId): array {
        //MemberService 는 MemberDao한테 요청한다
        return MemberDao::getMemberByLoginId($loginId);
    }
}