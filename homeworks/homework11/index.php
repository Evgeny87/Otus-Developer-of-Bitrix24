<?

use Bitrix\Main\Page\Asset;

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php"); ?>
<?php
$APPLICATION->SetTitle("ДЗ #11: Локальное REST приложение дата последней коммуникации");

Asset::getInstance()->addCss('//cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');


?>
<h1 class="mb-3"><? $APPLICATION->ShowTitle() ?></h1>

<h4 class="mb-3">Пояснительная записка</h4>
<div class="alert alert-light border shadow-sm p-3 bg-body rounded">
    <p class="mb-2"><strong>Что реализовано:</strong></p>
    <ul class="mb-0">
        <li>В карточку Контакта CRM добавлено и вынесено на первое место кастомное поле <code>UF_CRM_1791138890989</code> (Дата со временем).</li>
        <li>В каталоге <code>/local/tools/b24_app/</code> развернуто Локальное REST-приложение, зарегистрированное внутри коробочной версии Битрикс24.</li>
        <li>Создан изолированный автозагружаемый класс <code>RestActivityHandler</code>, перехватывающий создание Дел (Activity) в CRM и асинхронно пинающий обработчик приложения через curl.</li>
    </ul>
</div>

    <div class="card shadow-sm mt-4">
        <div class="card-header bg-success text-white">
            Файлы проекта
        </div>
        <ul class="list-group list-group-flush">

            <li class="list-group-item list-group-item-action">
                <a href="/crm/contact/details/1/"
                   class="d-flex justify-content-between align-items-center" target="_blank">
                <span>
                    <strong>Тестовый контакт:</strong> Владислав Михайлов (Проверка даты коммуникации)
                </span>
                    <span class="badge bg-primary">
                    Открыть CRM
                </span>
                </a>
            </li>

            <li class="list-group-item list-group-item-action">
                <a href="/devops/edit/application/3/"
                   class="d-flex justify-content-between align-items-center" target="_blank">
                <span>
                    <strong>Локальное REST-приложение:</strong> Обновление даты коммуникации (ID: 3)
                </span>
                    <span class="badge bg-warning text-dark">
                    Открыть в Маркете
                </span>
                </a>
            </li>

            <li class="list-group-item list-group-item-action">
                <a href="/bitrix/admin/fileman_file_view.php?path=/local/tools/b24_app/index.php"
                   class="d-flex justify-content-between align-items-center" target="_blank">
                <span>
                    <strong>Код обработчика приложения:</strong> /local/tools/b24_app/index.php
                </span>
                    <span class="badge bg-secondary">
                    файл в админке
                </span>
                </a>
            </li>

            <li class="list-group-item list-group-item-action">
                <a href="/bitrix/admin/fileman_file_view.php?path=/local/php_interface/src/App/Classes/RestActivityHandler.php"
                   class="d-flex justify-content-between align-items-center" target="_blank">
                <span>
                    <strong>Бэкенд-класс перехвата событий дел:</strong> /local/php_interface/src/App/Classes/RestActivityHandler.php
                </span>
                    <span class="badge bg-secondary">
                    файл в админке
                </span>
                </a>
            </li>

            <li class="list-group-item list-group-item-action">
                <a href="/bitrix/admin/fileman_file_view.php?path=/local/php_interface/init.php"
                   class="d-flex justify-content-between align-items-center" target="_blank">
                <span>
                    <strong>Подключение класса в init.php:</strong> /local/php_interface/init.php
                </span>
                    <span class="badge bg-secondary">
                    файл в админке
                </span>
                </a>
            </li>
        </ul>
    </div>



<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>