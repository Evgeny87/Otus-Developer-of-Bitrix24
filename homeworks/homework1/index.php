<?
use Bitrix\Main\Page\Asset;

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetTitle("ДЗ #1: Создание и настройка проекта в VScode");

Asset::getInstance()->addCss('//cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');


?>
<h1 class="mb-3"><? $APPLICATION->ShowTitle() ?></h1>

<h4 class="mb-3">Пояснительная записка</h4>
    <div style="color: green; font-weight: bold;">
        Развернута система Bitrix24 на виртуальном хостинге Timeweb.
        Настроен редактор VS Code для работы по защищенному протоколу SFTP с авторизацией по SSH-ключу.
        Настроены правила исключений для ядра системы.
    </div>
<br>
<br>
<hr>




<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>