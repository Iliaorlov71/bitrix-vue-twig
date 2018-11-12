
                </div>
            </div>
        </div>
    </main>
    <!-- / main content -->

    <!-- footer -->
    <footer class="footer">
        <div class="footer__inner container-fluid no-padding-both">
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
    </footer>
    <!-- / footer -->
    <script src="<?= $assetManager->getEntry('main.js') ?>"></script>
</body>
</html>