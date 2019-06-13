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

    <!-- wrapper -->
    <div class="wrapper">

        <?php $APPLICATION->ShowPanel() ?>

        <!--подключение twig-->
        <?php

        $loader = new Twig_Loader_Filesystem($_SERVER['DOCUMENT_ROOT'] . '/local/twig/');

        $twig = new Twig_Environment($loader, array(
            'debug' => env('DEBUG'),
            'cache' => $_SERVER['DOCUMENT_ROOT'] . '/bitrix/cache/twig',
        ));

        ?>
        <!--/подключение twig-->

        <!-- header -->


        <div class="vue-component" id="vue-header" data-component="Header">
            <?= $twig->render('header.twig', array()); ?>
        </div>
        <!-- / header -->

        <!-- main content -->
        <main class="main">
