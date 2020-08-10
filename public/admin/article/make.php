<?php
$config = [];
$config['needToLogin'] = false;
// 'login'페이지 만은 'needToLogin'을 false로 끈다

// 관리자 페이지들을 위한 공통작업
require_once $_SERVER['DOCUMENT_ROOT'] . '/../init/admin.php';
// 'include_once' 는 없으면 다음으로 넘어가지만
// 'require-once' 는 없으면 죽는다.
// $_SERVER['DOCUMENT_ROOT']; 웹 루트의 경로를 담고있다
// '/../config/config.php' 뒤로 돌아가 config 안의 config.php를 실행한다

$pageTitle = '게시판 생성';
// 관리자 페이지 공통 상단
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/admin/head.php';
?>

<form class="con table-box form1" action="doMake.php" method="POST">
    <!-- method 를 "POST"로 하는 이유는 주소창에 아이디와 비밀번호 노출을 막기위해 꼭 써준다 -->
    <table>
        <colgroup>
            <col width="300">
        </colgroup>
        <tbody>
            <tr>
                <th>게시판 이름</th>
                <td>
                    <div class="form-control">
                        <input name="name" type="text" maxlength="20" placeholder="이름을 입력해주세요." require autofocus>
                    </div>
                </td>
            </tr>
            <tr>
            <th>게시판 코드</th>
                <td>
                    <div class="form-control">
                        <input name="code" type="text" maxlength="20" placeholder="코드를 입력해주세요." require autofocus>
                    </div>
                </td>
            </tr>
            <tr>
                <th>게시판 생성</th>
                <td>
                    <div class="form-control">
                        <button type="submit" class="btn btn-primary">게시판 생성</button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</form>

<?php
// 관리자 페이지 공통 하단
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/admin/foot.php';