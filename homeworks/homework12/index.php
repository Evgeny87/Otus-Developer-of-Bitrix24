<?

use Bitrix\Main\Page\Asset;

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php"); ?>
<?php
$APPLICATION->SetTitle("ДЗ #12: Собственные обработчики REST");

Asset::getInstance()->addCss('//cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');


?>
<h1 class="mb-3"><? $APPLICATION->ShowTitle() ?></h1>

<h4 class="mb-3">Пояснительная записка</h4>
<div class="card p-3 shadow-sm mb-4 bg-light">
    <h5>Реализованная функциональность:</h5>
    <ul>
        <li><strong>Кастомный REST API scope:</strong> Разработан класс <code>\Otus\App\Classes\RestController</code>, расширяющий стандартный REST-интерфейс Битрикс24 собственным пространством методов <code>otus.*</code> с использованием системного события <code>OnRestServiceBuildDescription</code>.</li>
        <li><strong>Интеграция с сущностью:</strong> Реализован полноценный CRUD-цикл для сущности "Заявки" (Инфоблок ID 21) с методами: <code>add</code> (создание), <code>get</code> (чтение полей и свойств), <code>update</code> (изменение данных) и <code>delete</code> (удаление).</li>
        <li><strong>Сквозное логирование:</strong> Настроено обязательное логирование структуры входящих параметров запросов (REQUEST) и результатов обработки (RESPONSE) в формате JSON с помощью системного класса <code>\Otus\App\Debug\Logger</code>.</li>
        <li><strong>Локализация и стандарты:</strong> Код полностью соответствует стандарту PSR-12, снабжен комментариями PHPDoc, а текстовые сообщения вынесены в языковой файл локализации (модуль <code>main</code>, класс <code>Loc</code>).</li>
        <li><strong>Ювелирный обход конфликтов:</strong> В методе удаления реализовано точечное программное отключение обработчиков событий кастомных модулей (<code>otus.booking</code>, <code>otus.hospital</code>), что позволило протестировать метод удаления без отключения глобального функционала ядра Битрикса.</li>
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
            <!-- Ссылка на тестовую страницу (Сама эта страница) -->
            <li class="list-group-item list-group-item-action">
                <a href="/otus/homeworks/homework12/?clear_cache=Y" class="d-flex justify-content-between align-items-center">
                    <span>Ссылка на тестовую страницу (Пояснительная записка)</span>
                    <span class="badge bg-primary">Ссылка на просмотр</span>
                </a>
            </li>

            <!-- Общий список в панели DevOps -->
            <li class="list-group-item list-group-item-action">
                <a href="/devops/list/?clear_cache=Y" target="_blank" class="d-flex justify-content-between align-items-center">
                    <span>Общий список интеграций и вебхуков</span>
                    <span class="badge bg-dark">Общий список</span>
                </a>
            </li>

            <!-- Вебхук: Добавление -->
            <li class="list-group-item list-group-item-action">
                <a href="/devops/edit/in-hook/13/" target="_blank" class="d-flex justify-content-between align-items-center">
                    <span>Входящий вебхук: Добавление элемента (ID 13 -> otus.entity.add)</span>
                    <span class="badge bg-warning text-dark">Ссылка на просмотр</span>
                </a>
            </li>

            <!-- Вебхук: Чтение -->
            <li class="list-group-item list-group-item-action">
                <a href="/devops/edit/in-hook/15/" target="_blank" class="d-flex justify-content-between align-items-center">
                    <span>Входящий вебхук: Чтение элемента (ID 15 -> otus.entity.get)</span>
                    <span class="badge bg-warning text-dark">Ссылка на просмотр</span>
                </a>
            </li>

            <!-- Вебхук: Обновление -->
            <li class="list-group-item list-group-item-action">
                <a href="/devops/edit/in-hook/17/" target="_blank" class="d-flex justify-content-between align-items-center">
                    <span>Входящий вебхук: Обновление элемента (ID 17 -> otus.entity.update)</span>
                    <span class="badge bg-warning text-dark">Ссылка на просмотр</span>
                </a>
            </li>

            <!-- Вебхук: Удаление -->
            <li class="list-group-item list-group-item-action">
                <a href="/devops/edit/in-hook/18/" target="_blank" class="d-flex justify-content-between align-items-center">
                    <span>Входящий вебхук: Удаление элемента (ID 18 -> otus.entity.delete)</span>
                    <span class="badge bg-warning text-dark">Ссылка на просмотр</span>
                </a>
            </li>

            <!-- Ссылка на сущность -->
            <li class="list-group-item list-group-item-action">
                <a href="/services/lists/21/view/0/?list_section_id=" target="_blank" class="d-flex justify-content-between align-items-center">
                    <span>Ссылка на инфоблок "Заявки" (Сущность для CRUD)</span>
                    <span class="badge bg-secondary">Сущность</span>
                </a>
            </li>

            <!-- Основной класс контроллера REST -->
            <li class="list-group-item list-group-item-action">
                <a href="/bitrix/admin/fileman_file_view.php?path=/local/php_interface/src/App/Classes/RestController.php" class="d-flex justify-content-between align-items-center">
                    <span>Класс REST-контроллера (RestController.php)</span>
                    <span class="badge bg-success">Файл в админке</span>
                </a>
            </li>

            <!-- Файл локализации -->
            <li class="list-group-item list-group-item-action">
                <a href="/bitrix/admin/fileman_file_view.php?path=/local/php_interface/src/App/lang/ru/Classes/RestController.php" class="d-flex justify-content-between align-items-center">
                    <span>Языковой файл локализации (ru/RestController.php)</span>
                    <span class="badge bg-success">Файл в админке</span>
                </a>
            </li>

            <!-- Точка подключения в init.php -->
            <li class="list-group-item list-group-item-action">
                <a href="/bitrix/admin/fileman_file_view.php?path=/local/php_interface/init.php" class="d-flex justify-content-between align-items-center">
                    <span>Регистрация события и подключение контроллера (init.php)</span>
                    <span class="badge bg-success">Файл в админке</span>
                </a>
            </li>

            <!-- Кастомный файл логов -->
            <li class="list-group-item list-group-item-action">
                <a href="/bitrix/admin/fileman_file_edit.php?path=%2Flocal%2Flogs%2Flog_custom.log&full_src=Y&site=s1&lang=ru" class="d-flex justify-content-between align-items-center">
                    <span>Файл JSON-логов с результатами CRUD-тестов (log_custom.log)</span>
                    <span class="badge bg-danger">Файл в админке</span>
                </a>
            </li>
        </ul>
    </div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>