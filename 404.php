<?
// include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');
$sapi_type = php_sapi_name();
if ($sapi_type=="cgi") 
   header("Status: 404");
else 
   header("HTTP/1.1 404 Not Found");
@define("ERROR_404","Y");
//Тут уже подключение верней части шаблона и присваивание заголовка




require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
    $APPLICATION->SetTitle("Страница не найдена");
?>

    <div class="page404">
        <h1>Ошибка 404</h1>
        <div class="title">Запрашиваемая страница не найдена</div>
        <p>Неправильно набран адрес <br>или такой страницы никогда не было на этом сайте.</p>
        <ul class="links">
            <li><a href="/">Главная страница</a></li>
            <li><a href="/company/contacts/">Контактная информация</a></li>
            <li><a href="/services/">Услуги</a></li>
        </ul>
    </div>

<div class="sections pad-t bg-2"> <section class="row"> <article class="cell-t-16 first-item eq-height"> <a class="link-block button " href="/catalog/74/" > <figure class="pad vpad"> <img src="/bitrix/templates/design-station/img/cats/1.png"  /> </figure>
        <div class="pad text-center">Стулья</div>
       </a> </article> <article class="cell-t-16 first-item eq-height"> <a class="link-block button " href="/catalog/69/" > <figure class="pad vpad"> <img src="/bitrix/templates/design-station/img/cats/2.png"  /> </figure>
        <div class="pad text-center">Столы</div>
       </a> </article> <article class="cell-t-16 first-item eq-height"> <a class="link-block button " href="/catalog/61/" > <figure class="pad vpad"> <img src="/bitrix/templates/design-station/img/cats/3.png"  /> </figure>
        <div class="pad text-center">Подстолья</div>
       </a> </article> <article class="cell-t-16 first-item eq-height"> <a class="link-block button " href="/catalog/62/" > <figure class="pad vpad"> <img src="/bitrix/templates/design-station/img/cats/4.png"  /> </figure>
        <div class="pad text-center">Столешницы</div>
       </a> </article> <article class="cell-t-16 first-item eq-height"> <a class="link-block button " href="/catalog/57/" > <figure class="pad vpad"> <img src="/bitrix/templates/design-station/img/cats/5.png"  /> </figure>
        <div class="pad text-center">Мягкая мебель</div>
       </a> </article> <article class="cell-t-16 first-item eq-height"> <a class="link-block button " href="/catalog/48/" > <figure class="pad vpad"> <img src="/bitrix/templates/design-station/img/cats/6.png"  /> </figure>
        <div class="pad text-center">Мебель для уличных кафе</div>
       </a> </article> </section> <section class="row"> <article class="cell-t-16 first-item eq-height"> <a class="link-block button " href="/catalog/54/" > <figure class="pad vpad"> <img src="/bitrix/templates/design-station/img/cats/7.png"  /> </figure>
        <div class="pad text-center">Мебель под старину</div>
       </a> </article> <article class="cell-t-16 first-item eq-height"> <a class="link-block button " href="/catalog/47/" > <figure class="pad vpad"> <img src="/bitrix/templates/design-station/img/cats/8.png"  /> </figure>
        <div class="pad text-center">Барные стойки</div>
       </a> </article> <article class="cell-t-16 first-item eq-height"> <a class="link-block button " href="/catalog/86/" > <figure class="pad vpad"> <img src="/bitrix/templates/design-station/img/cats/9.png"  /> </figure>
        <div class="pad text-center">Стойки ресепшн</div>
       </a> </article> <article class="cell-t-16 first-item eq-height"> <a class="link-block button " href="/catalog/63/" > <figure class="pad vpad"> <img src="/bitrix/templates/design-station/img/cats/10.png"  /> </figure>
        <div class="pad text-center">Оборудование</div>
       </a> </article> <article class="cell-t-16 first-item eq-height"> <a class="link-block button " href="/catalog/79/" > <figure class="pad vpad"> <img src="/bitrix/templates/design-station/img/cats/11.png"  /> </figure>
        <div class="pad text-center">Свет</div>
       </a> </article> <article class="cell-t-16 first-item eq-height"> <a class="link-block button " href="/catalog/46/" > <figure class="pad vpad"> <img src="/bitrix/templates/design-station/img/cats/12.png"  /> </figure>
        <div class="pad text-center">Аксессуары</div>
       </a>
      <br />
</article> </section> </div>

<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");

$APPLICATION->SetTitle("404 - HTTP not found");