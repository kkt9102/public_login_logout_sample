<!DOCTYPE html>
<html lang="ko">

<head>
    <?php require_once __DIR__ . '/../common.php'; ?>
    <title><?=$config['siteName']?>관리자 페이지</title>

    <link rel="stylesheet" href="/resource/common.css">
    <link rel="stylesheet" href="/resource/app.css">
    <link rel="stylesheet" href="/resource/admin/app.css">
</head>

<body>

    <div class="top-bar">
        <div class="con height-100p flex flex-jc-sb">
            <a href="" class="logo flex flex-ai-c"><i class="far fa-eye"></i></a>

            <nav>
                <ul class="flex height-100p">
                    <li><a href="" class="flex flex-ai-c height-100p">홈</a></li>
                    <li><a href="/admin/board/list.php" class="flex flex-ai-c height-100p">게시판 관리</a></li>
                    <li><a href="/" class="flex flex-ai-c height-100p">게시물 관리</a></li>
                    <?php if ( App::isLogined() ) { ?>

                    <li>
                        <a href="/admin/member/doLogout.php" class="flex flex-ai-c height-100p">로그아웃</a>
                    </li>
                    <?php } ?>
                    <!-- 로그인 상태일때만 로그아웃 버튼이 나온다 -->
                    <li><a href="" class="flex flex-ai-c height-100p">팝업관리</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <h1 class='title-box con'>
        <?=$pageTitle?>
    </h1>