<?

use Bitrix\Main\Page\Asset;

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php"); ?>
<?php
$APPLICATION->SetTitle("ДЗ #9: Написание своих активити для БП");

Asset::getInstance()->addCss('//cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');


?>
<h1 class="mb-3"><? $APPLICATION->ShowTitle() ?></h1>

<h4 class="mb-3">Пояснительная записка</h4>
<div class="text-muted">
    <p>В рамках выполнения домашнего задания разработан и успешно внедрен кастомный модуль автоматизации CRM на базе <strong>1С-Битрикс24 (новое ядро BaseActivity)</strong>.</p>
    <ul>
        <li><strong>Интеграция с API DaData:</strong> Написан отказоустойчивый бэкенд-обработчик запросов (с использованием cURL и безопасным перехватом исключений Throwable), который по переданному ИНН мгновенно получает официальное название организации и актуальный КПП головного офиса.</li>
        <li><strong>Контроль дубликатов:</strong> Реализован интеллектуальный пре-валидатор на основе системных реквизитов Битрикс24 (через CRM ORM <code>\Bitrix\Crm\RequisiteTable</code>). Если компания с таким ИНН уже существует в CRM, процесс предотвращает размножение дублей, блокирует создание новой карточки и использует существующий ID.</li>
        <li><strong>Сквозная автоматизация инфоблока (ИБ 20):</strong> Действие работает в полностью автоматическом режиме "без тишины" на выходе — переименовывает исходный элемент из "Без названия" в реальное имя компании, а также осуществляет прямую привязку к CRM через заполнение свойства «Заказчик» (код <code>CRM_COMPANY</code>).</li>
        <li><strong>Выходные параметры:</strong> Настроена корректная передача данных в конструктор БП (CompanyId, CompanyName, Status, ResultData, UserMessage), что позволяет использовать штатное действие Битрикса «Создать элемент CRM» для бесшовной генерации Сделок с чистыми наименованиями контрагентов.</li>
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
                <a href="/bitrix/admin/iblock_list_admin.php?IBLOCK_ID=20&type=lists&lang=ru&find_section_section=0&SECTION_ID=0&apply_filter=Y"
                   class="d-flex justify-content-between align-items-center">
                <span>
                    Ссылка на БП
                </span>
                    <span class="badge bg-primary">
                    Ссылка на просмотр
                </span>
                </a>
            </li>

            <li class="list-group-item list-group-item-action">
                <a href="/services/lists/20/view/0/"
                   class="d-flex justify-content-between align-items-center">
                <span>
                    Ссылка на ИБ
                </span>
                    <span class="badge bg-success">
                    Ссылка на просмотр
                </span>
                </a>
            </li>

            <li class="list-group-item list-group-item-action">
                <a href="/crm/company/list/"
                   class="d-flex justify-content-between align-items-center">
                <span>
                    Компании
                </span>
                    <span class="badge bg-success">
                    Ссылка на просмотр
                </span>
                </a>
            </li>

            <li class="list-group-item list-group-item-action">
                <a href="/bitrix/admin/fileman_file_view.php?path=/local/activities/custom/otuscustominnactivity/otuscustominnactivity.php"
                   class="d-flex justify-content-between align-items-center">
                <span>
                    Ссылка на активити
                </span>
                    <span class="badge bg-secondary">
                    файл в админке
                </span>
                </a>
            </li>

            <li class="list-group-item list-group-item-action">
                <a href="/bitrix/admin/fileman_file_view.php?path=/local/activities/custom/otuscustominnactivity/.description.php"
                   class="d-flex justify-content-between align-items-center">
                <span>
                    Ссылки на просмотр кода основных файлов ДЗ (связь таблиц, ORM, классы  и т.д.)
                </span>
                    <span class="badge bg-warning">
                    файл в админке
                </span>
                </a>
            </li>
        </ul>
    </div>



<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>