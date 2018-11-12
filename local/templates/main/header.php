<!doctype html>
<html lang="<?= LANGUAGE_ID ?>">
<head>
    <title><?php $APPLICATION->ShowTitle() ?></title>

    <?php $APPLICATION->ShowHead() ?>

    <?php CJSCore::Init('jquery2') ?>

    <?php
    $assetManager = new Local\Util\Assets();
    ?>

    <meta id="viewport" name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="<?= $assetManager->getEntry('global.css') ?>">

</head>
<body class="page page_<?= LANGUAGE_ID ?> page_<?php $APPLICATION->ShowProperty('page_type', 'secondary') ?>">
<?php $APPLICATION->ShowPanel() ?>

    <!-- header -->
    <header class="header">
        <div class="header__container container-fluid d-flex flex-row">
            <div class="header__col header__col__logo col-md-3 d-flex align-items-center">
                <!-- logo -->
                <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => "/__include__/logo.php"
                    )
                );?>
                <!-- / logo -->
            </div>
            <div class="header__col header__col__nav col-md-9">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "top",
                    array(
                        "ALLOW_MULTI_SELECT" => "N",
                        "CHILD_MENU_TYPE" => "submenu",
                        "DELAY" => "N",
                        "MAX_LEVEL" => "2",
                        "MENU_CACHE_GET_VARS" => array(
                        ),
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "ROOT_MENU_TYPE" => "top",
                        "USE_EXT" => "Y",
                    ),
                    false
                );?>
            </div>
        </div>
    </header>
    <!-- / header -->

    <!-- main content -->
    <main class="main">
        <div class="container">
            <div class="row">

                <div class="content">
                    <?php if ($APPLICATION->GetCurPage(false) != SITE_DIR) : ?>
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:breadcrumb",
                            "",
                            Array(
                                "PATH" => "",
                                "SITE_ID" => "s1",
                                "START_FROM" => "0"
                            )
                        ); ?>
                        <h1 class="page__title"><?php $APPLICATION->ShowTitle(false) ?></h1>
                    <?php endif; ?>