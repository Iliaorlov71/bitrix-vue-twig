    </main>
    <!-- / main content -->

    <!-- footer -->
    <footer class="footer">
        <div class="footer__inner">
            <div class="footer__top">
                <div class="footer__container container">
                    <div class="footer__row">
                        FOOTER
                    </div>
                    <div class="footer__row row">
                        <div class="col">
                            <ul class="footer__list">
                                <li class="footer__item">
                                    <a href="#" class="footer__link">Раздел 1</a>
                                </li>
                                <li class="footer__item">
                                    <a href="#" class="footer__link">Раздел 2</a>
                                </li>
                                <li class="footer__item">
                                    <a href="#" class="footer__link">Раздел 3</a>
                                </li>
                                <li class="footer__item">
                                    <a href="#" class="footer__link">Раздел 4</a>
                                </li>
                                <li class="footer__item">
                                    <a href="#" class="footer__link">Раздел 5</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col">Lorem ipsum dolor sit amet</div>
                        <div class="col">Lorem ipsum dolor sit amet</div>
                    </div>
                </div>
            </div>
            <div class="footer__bottom">
                <?php $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    array(
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => "/__include__/footer/copyright.php",
                    ),
                    false
                ); ?>
            </div>
        </div>
    </footer>
    <!-- / footer -->
    <script src="<?= $assetManager->getEntry('main.js') ?>"></script>
</body>
</html>
