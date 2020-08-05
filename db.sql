DROP DATABASE phpSiteTemplate;
CREATE DATABASE phpSiteTemplate;
USE phpSiteTemplate;

CREATE TABLE `member` ( # 맴버
    id INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT, # 번호
    regDate DATETIME NOT NULL, # 작성날짜
    updateDate DATETIME NOT NULL, # 수정날짜
    loginId CHAR(50) NOT NULL UNIQUE, # 로그인 아이디
    loginpw CHAR(200) NOT NULL, # 로그인 비번
    `name` CHAR(100) NOT NULL, # 이름 
    `nickname` CHAR(100) NOT NULL, # 닉네임
    `email` CHAR(100) NOT NULL, # 이메일
    `phone` CHAR(20) NOT NULL  # 휴대폰번호
);

CREATE TABLE `board` ( # 게시판 보기
    id INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT, # 번호
    regDate DATETIME NOT NULL, # 작성날짜
    updateDate DATETIME NOT NULL, # 수정날짜
    `name` CHAR(100) NOT NULL, # 게시판 이름
    `code` CHAR(20) NOT NULL # 게시판 코드
);

CREATE TABLE `article` ( # 게시판
    id INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT, # 번호
    regDate DATETIME NOT NULL, # 생성날짜
    updateDate DATETIME NOT NULL, # 수정날짜
    boardId INT(10) UNSIGNED NOT NULL, # 게사판ID
    memberId INT(10) UNSIGNED NOT NULL, # 작성자ID
    `body` TEXT NOT NULL, # 내용
    `replybody` TEXT NOT NULL, # 응답내용
    displayStatus TINYINT(1) UNSIGNED NOT NULL, # 노출상태
    delStatus TINYINT(1) UNSIGNED NOT NULL, # 삭제상태
    deldate DATETIME NOT NULL, # 삭제날짜
    typeCode CHAR(20) NOT NULL, # 1차 카테고리
    type2Code CHAR(20) NOT NULL, # 2차 카테고리
    readStatus TINYINT(1) UNSIGNED NOT NULL, #수신자의 읽기상태
    readDate DATETIME NOT NULL, # 수신자의 읽은 날짜
    completeStatus TINYINT(1) UNSIGNED NOT NULL, # 완료상태
    completeDate DATETIME NOT NULL, # 완료날짜
    writerName CHAR(20) NOT NULL, # 작성자 이름
    writerEmail CHAR(100) NOT NULL, # 작성자 이메일
    writerPhone CHAR(20) NOT NULL, # 작성자 핸드폰번호
    writerSnsType CHAR(20) NOT NULL, # 작성자 SNS 타입
    writerSnsId CHAR(20) NOT NULL # 작성자 SNS ID
);