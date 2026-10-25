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
    <p class="mb-2"><strong>Что и как было реализовано:</strong></p>
    <ul class="mb-0" style="font-size: 14px;">
        <li class="mb-2"><strong>Интерфейсная автоматизация (CRM):</strong> В карточке Контакта выведено на первое место кастомное поле даты/времени последней коммуникации (автоматически переключается между <code>UF_CRM_1792924131052</code> в Облаке и <code>UF_CRM_1791138890989</code> в Коробке).</li>
        <li class="mb-2"><strong>Архитектурное решение (REST API):</strong> В каталоге <code>/local/tools/activity_hook/</code> развернуто локальное приложение на базе официального <strong>CRest SDK</strong>. Выполнена чистая подписка на событие <code>ONCRMACTIVITYADD</code> и регистрация интерфейсного встраивания <code>CRM_CONTACT_DETAIL_TAB</code>.</li>
        <li class="mb-2"><strong>Безопасность и фильтрация (Бэкенд):</strong> Класс <code>ServiceHandler</code> выполняет регистронезависимый перехват входящего ID дела, строго фильтрует владельцев (только Контакты, <code>OWNER_TYPE_ID == 3</code>) и реализует интервальную защиту от рекурсивного зацикливания.</li>
        <li class="mb-2"><strong>Реактивный интерфейс (Фронтенд):</strong> Интегрирован асинхронный JavaScript-монитор на базе клиентского <strong>BX24 SDK</strong>. Он осуществляет фоновый опрос API и обновляет значение поля на экране <strong>автоматически и без перезагрузки страницы</strong> в течение 3 секунд после сохранения дела.</li>
        <li class="mb-0 text-success"><strong>Глубокий рефакторинг и переход на ООП:</strong> Для обеспечения полноценной мультиарендности (работа на Облаке и Коробке одновременно) мы полностью отказались от стандартного процедурного SDK. Были удалены 2 устаревших файла: <code>crest.php</code> и <code>checkserver.php</code>. Вместо них разработан изолированный объектный класс <code>SDKRest.php</code>, динамически управляющий OAuth-ключами и разделяющий токен-сессии разных порталов в автономные JSON-файлы.</li>
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
            <!-- Ссылка на тестовый контакт в Облаке -->
            <li class="list-group-item list-group-item-action">
                <a href="https://b24-t221ji.bitrix24.ru/crm/contact/details/1/" class="d-flex justify-content-between align-items-center" target="_blank">
                    <span>
                        <strong>Тестовый контакт в Облаке:</strong> Первый (Проверка даты коммуникации)
                    </span>
                    <span class="badge bg-primary">Открыть CRM</span>
                </a>
            </li>

            <!-- Ссылка на локальное приложение в Облаке -->
            <li class="list-group-item list-group-item-action">
                <a href="https://b24-t221ji.bitrix24.ru/devops/edit/application/1/" class="d-flex justify-content-between align-items-center" target="_blank">
                    <span>
                        <strong>Локальное REST-приложение:</strong> ДЗ №11: Дата последней коммуникации (REST API) (ID: 1)
                    </span>
                    <span class="badge bg-warning text-dark">Открыть в Маркете</span>
                </a>
            </li>

            <!-- Ссылка на точку входа приложения в админке хостинга -->
            <li class="list-group-item list-group-item-action">
                <a href="/bitrix/admin/fileman_file_view.php?path=/local/tools/activity_hook/index.php" class="d-flex justify-content-between align-items-center" target="_blank">
                    <span>
                        <strong>Код обработчика и UI приложения:</strong> /local/tools/activity_hook/index.php
                    </span>
                    <span class="badge bg-secondary">Файл в админке</span>
                </a>
            </li>

            <!-- Ссылка на класс бизнес-логики в админке хостинга -->
            <li class="list-group-item list-group-item-action">
                <a href="/bitrix/admin/fileman_file_view.php?path=/local/tools/activity_hook/ServiceHandler.php" class="d-flex justify-content-between align-items-center" target="_blank">
                    <span>
                        <strong>Класс бизнес-логики (Фильтрация и Анти-луп):</strong> /local/tools/activity_hook/ServiceHandler.php
                    </span>
                    <span class="badge bg-secondary">Файл в админке</span>
                </a>
            </li>

            <!-- Ссылка на наш объектный SDKRest клиент -->
            <li class="list-group-item list-group-item-action">
                <a href="/bitrix/admin/fileman_file_view.php?path=/local/tools/activity_hook/SDKRest.php" class="d-flex justify-content-between align-items-center" target="_blank">
                    <span>
                        <strong>Объектный мультипортальный клиент:</strong> /local/tools/activity_hook/SDKRest.php
                    </span>
                    <span class="badge bg-secondary">Файл в админке</span>
                </a>
            </li>

            <!-- Новое: Ссылка на инсталлятор приложения -->
            <li class="list-group-item list-group-item-action">
                <a href="/bitrix/admin/fileman_file_view.php?path=/local/tools/activity_hook/install.php" class="d-flex justify-content-between align-items-center" target="_blank">
                    <span>
                        <strong>Скрипт установки приложения (event.bind):</strong> /local/tools/activity_hook/install.php
                    </span>
                    <span class="badge bg-secondary">Файл в админке</span>
                </a>
            </li>

            <!-- Ссылка на файл конфигурации CRest SDK -->
            <li class="list-group-item list-group-item-action">
                <a href="/bitrix/admin/fileman_file_view.php?path=/local/tools/activity_hook/settings.php" class="d-flex justify-content-between align-items-center" target="_blank">
                    <span>
                        <strong>Конфигурация CRest SDK (Мультипортальные ключи):</strong> /local/tools/activity_hook/settings.php
                    </span>
                    <span class="badge bg-secondary">Файл в админке</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Информационный блок первоисточника заготовки для памяти -->
    <div class="alert alert-secondary border-0 p-3 mt-4 bg-light rounded text-muted" style="font-size: 13px;">
        <p class="mb-1"><strong>📌 Справка по истории разработки (для памяти):</strong></p>
        <p class="mb-2">
            В качестве первоначального шаблона и заготовки для проекта использовался официальный репозиторий 
            <a href="https://github.com/bitrix-tools/crest" target="_blank" class="text-decoration-none">bitrix-tools/crest</a> 
            и структура файлов каталога 
            <a href="https://github.com/bitrix-tools/crest/tree/master/src" target="_blank" class="text-decoration-none">/src/</a>.
        </p>
        <p class="mb-0">
            В ходе выполнения ДЗ структура была кардинально переработана: процедурные файлы были удалены, 
            а логика авторизации и выполнения REST-методов была полностью инкапсулирована внутри объектного класса 
            <code>SDKRest.php</code> для поддержки стабильной одновременной работы на нескольких порталах.
        </p>
    </div>



<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>