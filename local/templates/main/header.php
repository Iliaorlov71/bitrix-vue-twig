<!doctype html>
<html lang="<?=LANGUAGE_ID?>">
<head>
    <title><?php $APPLICATION->ShowTitle()?></title>

    <?php $APPLICATION->ShowHead()?>

    <?php CJSCore::Init('jquery2')?>

    <?php
        $assetManager = new Local\Util\Assets();
    ?>

    <link rel="stylesheet" href="<?= $assetManager->getEntry('global.css') ?>">


</head>
<body class="page page_<?=LANGUAGE_ID?> page_<?php $APPLICATION->ShowProperty('page_type', 'secondary')?>">
<?php $APPLICATION->ShowPanel()?>

<div class="page__top">
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 d-flex align-items-center">
                    <div class="header__logo">
                        <img src="/local/build/images/test_logo.jpg" alt="logo" class="logo__img">
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="header__nav">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:menu",
                            "top",
                            array(
                                "ALLOW_MULTI_SELECT" => "N",
                                "CHILD_MENU_TYPE" => "left",
                                "DELAY" => "N",
                                "MAX_LEVEL" => "1",
                                "MENU_CACHE_GET_VARS" => array(
                                ),
                                "MENU_CACHE_TIME" => "3600",
                                "MENU_CACHE_TYPE" => "N",
                                "MENU_CACHE_USE_GROUPS" => "Y",
                                "ROOT_MENU_TYPE" => "top",
                                "USE_EXT" => "N",
                            ),
                            false
                        );?>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="page__middle">

        <section class="page__content">
            <?php if ($APPLICATION->GetCurPage(false) != SITE_DIR) :?>
				<?$APPLICATION->IncludeComponent(
					"bitrix:breadcrumb",
					"",
					Array(
						"PATH" => "",
						"SITE_ID" => "s1",
						"START_FROM" => "0"
					)
				);?>
                <h1 class="page__title"><?php $APPLICATION->ShowTitle(false)?></h1>
            <?php endif;?>
