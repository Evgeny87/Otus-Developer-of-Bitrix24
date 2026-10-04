<?

use Bitrix\Main\Page\Asset;

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php"); ?>
<?php
$APPLICATION->SetTitle("ДЗ #10: Обработка событий");

Asset::getInstance()->addCss('//cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');


?>
<h1 class="mb-3"><? $APPLICATION->ShowTitle() ?></h1>

<h4 class="mb-3">Пояснительная записка</h4>
<div class="alert alert-light border shadow-sm p-3">
    <p>В рамках домашнего задания №10 реализован класс <code>\Otus\App\Classes\SynchronizationHandler</code>, обеспечивающий автоматическую двухстороннюю синхронизацию данных между элементами инфоблока <strong>«Заявки» (ID: 21)</strong> и <strong>Сделками CRM</strong>.</p>
    
    <h5 class="mt-3">Ключевые особенности реализации:</h5>
    <ul>
        <li><strong>Защита от рекурсии (Race Condition):</strong> Для предотвращения бесконечного цикла обновлений (Заявка &harr; Сделка) используется инкапсулированный статический флаг класса <code>self::$isLoopBlocked</code>.</li>
        <li><strong>Оптимизация под высокие нагрузки:</strong> Поиск связанной заявки из события CRM выполняется с жестким ограничением выборки <code>'nTopCount' => 1</code>. СУБД останавливает поиск на первом совпадении по индексу, что предотвращает зависание базы данных.</li>
        <li><strong>Ленивое обновление (Lazy Update):</strong> Модификация данных в базе происходит только в случае реального изменения синхронизируемых полей (Сумма, Ответственный). Смена стадий сделки или других полей не создает избыточную нагрузку на сервер.</li>
        <li><strong>Чистый ООП-подход:</strong> Логика регистрации событий вынесена в метод <code>registerEvents()</code>, минимизируя код в глобальном файле <code>init.php</code>. Класс полностью автозагружается по стандарту PSR-4 через Composer.</li>
    </ul>
</div>

    <div class="card shadow-sm mt-4">
        <div class="card-header bg-success text-white">
            Файлы проекта
        </div>
        <ul class="list-group list-group-flush">

            <li class="list-group-item list-group-item-action">
                <a href="/services/lists/21/view/0/"
                   class="d-flex justify-content-between align-items-center" target="_blank">
                <span>
                    <strong>Инфоблок «Заявки»</strong> (Просмотр элементов списка и полей)
                </span>
                    <span class="badge bg-primary">
                    Открыть список
                </span>
                </a>
            </li>

            <li class="list-group-item list-group-item-action">
                <a href="/crm/deal/kanban/category/0/"
                   class="d-flex justify-content-between align-items-center" target="_blank">
                <span>
                    <strong>Сделки CRM</strong> (Режим отображения: Канбан)
                </span>
                    <span class="badge bg-success">
                    Открыть Канбан
                </span>
                </a>
            </li>

            <li class="list-group-item list-group-item-action">
                <a href="/bitrix/admin/fileman_file_view.php?path=/local/php_interface/init.php"
                   class="d-flex justify-content-between align-items-center" target="_blank">
                <span>
                    <strong>Файл инициализации системы:</strong> init.php (Точка входа и регистрация событий)
                </span>
                    <span class="badge bg-warning text-dark">
                    Открыть init.php
                </span>
                </a>
            </li>

            <li class="list-group-item list-group-item-action">
                <a href="/bitrix/admin/fileman_file_view.php?path=/local/php_interface/src/App/Classes/SynchronizationHandler.php"
                   class="d-flex justify-content-between align-items-center" target="_blank">
                <span>
                    <strong>Класс обработчика (События Инфоблока):</strong> OnAfterIBlockElementAdd / OnAfterIBlockElementUpdate
                </span>
                    <span class="badge bg-warning text-dark">
                    Открыть класс
                </span>
                </a>
            </li>

            <li class="list-group-item list-group-item-action">
                <a href="/bitrix/admin/fileman_file_view.php?path=/local/php_interface/src/App/Classes/SynchronizationHandler.php"
                   class="d-flex justify-content-between align-items-center" target="_blank">
                <span>
                    <strong>Класс обработчика (События CRM Сделок):</strong> OnAfterCrmDealAdd / OnAfterCrmDealUpdate / OnBeforeCrmDealDelete
                </span>
                    <span class="badge bg-warning text-dark">
                    Открыть класс
                </span>
                </a>
            </li>
        </ul>
    </div>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>