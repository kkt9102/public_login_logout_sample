drop database phpSiteTemplate;
create database phpSiteTemplate;
use phpSiteTemplate;

create table `member` (
    id int(10) unsigned not null primary key auto_increment, # 번호
    regDate datetime not null, # 생성날짜
    updateDate datetime not null, # 수정날짜
    loginId char(50) not null unique, # 로그인 아이디
    loginPw char(200) not null, # 로그인 비번
    `name` CHAR(100) NOT NULL, # 이름
    `nickname` CHAR(100) NOT NULL, # 닉네임
    `email` CHAR(100) NOT NULL, # 이메일
    `phone` CHAR(20) NOT NULL # 휴대전화번호
);

# 관리자 회원 생성
insert into `member`
set regDate = NOW(),
updateDate = NOW(),
loginId = 'admin',
loginPw = 'admin',
`name` = '관리자',
`nickname` = '관리자';


CREATE TABLE `board` (
    id INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT, # 번호
    regDate DATETIME NOT NULL, # 생성날짜
    updateDate DATETIME NOT NULL, # 수정날짜
    `name` CHAR(100) NOT NULL, # 게시판 이름
    `code` CHAR(20) NOT NULL # 게시판 코드
);

CREATE TABLE `article` (
    id INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT, # 번호
    regDate DATETIME NOT NULL, # 생성날짜
    updateDate DATETIME NOT NULL, # 수정날짜
    boardId int(10) unsigned not null, # 게시판 ID
    memberId int(10) unsigned not null, # 작성자 ID
    `body` text NOT NULL, # 내용
    `replyBody` TEXT NOT NULL, # 응답내용
    displayStatus tinyint(1) unsigned not null, # 노출상태
    delStatus tinyint(1) unsigned not null, # 삭제상태
    delDate datetime NOT NULL, # 삭제날짜
    typeCode char(20) not null, # 1차 카테고리
    type2Code CHAR(20) NOT NULL, # 2차 카테고리
    readStatus tinyint(1) unsigned not null, # 수신자의 읽기 상태
    readDate DATETIME NOT NULL, # 수신자의 읽은 날짜
    completeStatus TINYINT(1) UNSIGNED NOT NULL, # 완료상태
    completeDate DATETIME NOT NULL, # 완료날짜
    writerName CHAR(20) NOT NULL, # 작성자 이름
    writerEmail CHAR(100) NOT NULL, # 작성자 이메일
    writerPhone CHAR(20) NOT NULL, # 작성자 휴대폰번호
    writerSnsType CHAR(20) NOT NULL, # 작성자 SNS 타입
    writerSnsId CHAR(20) NOT NULL # 작성자 SNS ID
);