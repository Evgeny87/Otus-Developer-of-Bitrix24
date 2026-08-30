<?
use Bitrix\Main\Page\Asset;

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php"); ?>
<?php
$APPLICATION->SetTitle("ДЗ #6: Написание своего модуля");

Asset::getInstance()->addCss('//cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');
?>
<h1 class="mb-3"><? $APPLICATION->ShowTitle() ?></h1>

<h4 class="mb-3">Пояснительная записка</h4>
<div class="card p-3 bg-light shadow-sm">
    <p>В рамках домашнего задания №6 был разработан и успешно интегрирован кастомный модуль <strong>«Расписание клиники (otus.hospital)»</strong>. Вся логика реализована в соответствии с современными стандартами ядра 1С-Битрикс (D7) и требованиями объектно-ориентированного программирования.</p>
    
    <h5>Что и как было реализовано:</h5>
    <ul>
        <li><strong>Архитектура модуля:</strong> Модуль изолирован в пространстве имён <code>Otus\Hospital</code>. Реализован полноценный инсталлятор (<code>install/index.php</code>), поддерживающий двухшаговую установку (выбор демо-данных) и корректное удаление кастомных таблиц и регистраций без повреждения системных данных (инфоблоки врачей и процедур не затрагиваются).</li>
        <li><strong>База данных и ORM D7:</strong> Создана кастомная таблица <code>b_hospital_schedule</code>. Для работы с ней разработан класс модели <code>HospitalScheduleInlineTable</code>, унаследованный от <code>DataManager</code>. Настроены сложные реляционные связи типа <code>Reference</code> с системной таблицей элементов инфоблоков <code>ElementTable</code>, что позволило вытягивать текстовые имена врачей и процедур одним оптимальным SQL-запросом через JOIN.</li>
        <li><strong>Интеграция с CRM Битрикс24:</strong> Через менеджер событий (<code>EventManager</code>) модуль подписывается на событие <code>onEntityDetailsTabsInitialized</code>. Реализовано динамическое объектное добавление кастомной вкладки «Расписание клиники» в карточку Сделки CRM.</li>
        <li><strong>Компонент и ленивая загрузка (Lazyload):</strong> Для вывода расписания разработан компонент <code>otus:hospital.schedule.grid</code>. Чтобы вкладка в CRM не блокировала общую загрузку карточки, рендеринг переведен на асинхронный механизм (через изолированный скрипт <code>lazyload.ajax.php</code>). ID сделки безопасно извлекается из входящего массива параметров <code>PARAMS</code>, передаваемого фронтендом CRM.</li>
        <li><strong>Интерфейсный грид:</strong> В шаблоне компонента задействован системный интерфейс <code>bitrix:main.ui.grid</code>, настроенный в жестком Ajax-режиме с валидным расчётом уникального <code>AJAX_ID</code>, локализацией колонок и заглушками под навигацию, что исключает ошибки в пустом Ajax-окружении карточки.</li>
    </ul>
</div>
<br>
<br>
<hr>

<div class="card shadow-sm mt-4">
    <div class="card-header bg-success text-white">
        Файлы проекта
    </div>
    <ul class="list-group list-group-flush">

        <li class="list-group-item list-group-item-action">
            <a href="/crm/deal/details/1/"
               target="_blank"
               class="d-flex justify-content-between align-items-center">
            <span>
                Ссылка на тестовую страницу с компонентом (Вкладка в карточке Сделки №1)
            </span>
                <span class="badge bg-warning">
                Ссылка на просмотр
            </span>
            </a>
        </li>

        <li class="list-group-item list-group-item-action">
            <a href="/bitrix/admin/partner_modules.php?lang=ru"
               target="_blank"
               class="d-flex justify-content-between align-items-center">
            <span>
                Ссылка на установленные решения, модуль: otus.hospital
            </span>
                <span class="badge bg-warning">
                Ссылка на просмотр в админке
            </span>
            </a>
        </li>

        <li class="list-group-item list-group-item-action">
            <a href="/bitrix/admin/perfmon_table.php?lang=ru&table_name=b_hospital_schedule"
               target="_blank"
               class="d-flex justify-content-between align-items-center">
            <span>
                Ссылка на таблицу (Просмотр b_hospital_schedule в Мониторе производительности)
            </span>
                <span class="badge bg-warning">
                Ссылка на просмотр в админке
            </span>
            </a>
        </li>

        <li class="list-group-item list-group-item-action">
            <a href="/bitrix/admin/fileman_file_view.php?path=/local/modules/otus.hospital/lib/hospitalscheduleinlinetable.php&lang=ru"
               target="_blank"
               class="d-flex justify-content-between align-items-center">
            <span>
                Ссылка на просмотр кода ORM-модели данных (HospitalScheduleInlineTable)
            </span>
                <span class="badge bg-warning">
                файл в админке
            </span>
            </a>
        </li>

        <li class="list-group-item list-group-item-action">
            <a href="/bitrix/admin/fileman_file_view.php?path=/local/modules/otus.hospital/lib/eventhandlers.php&lang=ru"
               target="_blank"
               class="d-flex justify-content-between align-items-center">
            <span>
                Ссылка на просмотр кода обработчиков событий карточки CRM (EventHandlers)
            </span>
                <span class="badge bg-warning">
                файл в админке
            </span>
            </a>
        </li>

        <li class="list-group-item list-group-item-action">
            <a href="/bitrix/admin/fileman_file_view.php?path=/local/modules/otus.hospital/components/otus/hospital-schedule-grid/lazyload.ajax.php&lang=ru"
               target="_blank"
               class="d-flex justify-content-between align-items-center">
            <span>
                Ссылка на просмотр кода скрипта ленивой Ajax-загрузки (lazyload.ajax.php)
            </span>
                <span class="badge bg-warning">
                файл в админке
            </span>
            </a>
        </li>
    </ul>
</div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>