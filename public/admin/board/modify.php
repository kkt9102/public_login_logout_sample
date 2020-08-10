<?php
// 관리자 페이지들을 위한 공통 작업
require_once $_SERVER['DOCUMENT_ROOT'] . '/../init/admin.php';

$pageTitle = '게시판 수정';
// 관리자 페이지 공통 상단
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/admin/head.php';

$board = ArticleService::getBoardById($_REQUEST['id']);
?>

<!-- 게시판 리스트 HTML -->
<form class="con table-box form1" action="doModify.php" method="POST">
    <!-- method 를 "POST"로 하는 이유는 주소창에 아이디와 비밀번호 노출을 막기위해 꼭 써준다 -->
    <input type="hidden" name="id" value="<?=$board['id']?>">
    <table>
        <colgroup>
            <col width="300">
        </colgroup> 
        <tbody>
            <tr>
                <th>게시판 이름</th>
                <td>
                    <div class="form-control">
                        <input name="name" type="text" maxlength="20" placeholder="이름을 입력해주세요." required autofocus value="<?=$board['name']?>" >
                        <!-- value 를 입력하는 이유는 '수정'을 하기때문에 수정하려는 게시판의 기존 이름을 확인해야 하기 때문이다 -->
                        <!--  -->
                    </div>
                </td>
            </tr>
            <tr>
            <th>게시판 코드</th>
                <td>
                    <div class="form-control">
                        <input name="code" type="text" maxlength="20" placeholder="코드를 입력해주세요." require value="<?=$board['code']?>" >
                    </div>
                </td>
            </tr>
            <tr>
                <th>게시판 수정</th>
                <td>
                    <div class="form-control">
                        <button type="submit" class="btn btn-primary">게시판 수정</button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</form>

<?php
// 관리자 페이지 공통 하단
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/admin/foot.php';