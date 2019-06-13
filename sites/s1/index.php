<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Главная страница");
$APPLICATION->SetPageProperty("page_type", "main");
?>

    <!--First Section-->
    <section class="section mainFirstSection container">
        <h2>
            <a href="#" class="title mainFirstSection__title">Заголовок 1</a>
        </h2>
        <div class="subtitle mainFirstSection__subtitle">Подзаголовок 1</div>
        <div class="text mainFirstSection__text">
            <p>
                <i class="fas fa-cocktail"></i>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro quod saepe voluptate voluptatum. Ab assumenda
                commodi consectetur distinctio dolor doloremque ea error est expedita explicabo facere impedit ipsa ipsum libero
                modi nihil obcaecati odio perferendis perspiciatis quas quidem, quo recusandae repudiandae sed ullam voluptas
                voluptates voluptatibus? Ab aspernatur earum fugiat omnis porro quia quo veritatis?
            </p>
        </div>
    </section>
    <!--/First Section-->

    <!--Second Section-->
<section class="section mainSecondSection container">
    <h2>
        <a href="#" class="title mainSecondSection__title">Заголовок 2</a>
    </h2>
    <div class="subtitle mainSecondSection__subtitle">Подзаголовок 2</div>
    <div class="text mainSecondSection__text row">
        <div class="col">Lorem ipsum dolor sit amet</div>
        <div class="col">Lorem ipsum dolor sit amet</div>
        <div class="col">Lorem ipsum dolor sit amet</div>
    </div>
</section>
    <!--/Second Section-->

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
