<?php
use Bitrix\Main\Page\Asset;

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetTitle("ДЗ #7: Создание кастомных полей и встраивание их в систему");

Asset::getInstance()->addCss('//cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');
?>

<h1 class="mb-3"><?= $APPLICATION->ShowTitle() ?></h1>

<h4 class="mb-3">Пояснительная записка</h4>
<div class="card p-3 bg-light mb-4">
    <p><strong>Что и как было реализовано в модуле otus.booking:</strong></p>
    <ul>
        <li>Создан кастомный тип свойства инфоблока <code>otus_booking_property</code> с интерфейсом подбора времени для записи к медицинским специалистам.</li>
        <li>Разработан универсальный адаптивный DOM-парсер для сбора доступных процедур. Скрипт распознает контекст окружения и работает в двух режимах: парсит инпуты и текстовые ноды в классической административной панели и динамически разбирает HTML-ссылки с ID в квадратных скобках внутри Универсальных списков Битрикс24.</li>
        <li>Обеспечен сбор контекстных данных: ID врача извлекается как из стандартных полей формы, так и путем разбора параметров строки запроса URL (параметр <code>&ID=</code>) и структуры роутинга папок Списков Б24.</li>
        <li>Валидация полей переведена на канонические рельсы многоязычности Bitrix Framework. Массив ошибок считывает фразы через <code>BX.message()</code>, которые экспортируются из PHP-файла локализации модуля с помощью метода <code>\CUtil::PhpToJSObject</code> на бэкенде.</li>
        <li>Проверка заполнения формы выводится в нативный попап на экране, а отладочный слой изолирован в самом низу файла для быстрой зачистки перед релизом.</li>
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
        <!-- Ссылка на список процедур в админке -->
        <li class="list-group-item list-group-item-action">
            <a href="/bitrix/admin/iblock_list_admin.php?IBLOCK_ID=16&type=lists&lang=ru&find_section_section=0" 
               class="d-flex justify-content-between align-items-center text-decoration-none" target="_blank">
                <span>Ссылка на список процедур</span>
                <span class="badge bg-warning text-dark">Ссылка на просмотр</span>
            </a>
        </li>

        <!-- Ссылка на список бронирований в админке -->
        <li class="list-group-item list-group-item-action">
            <a href="/bitrix/admin/iblock_list_admin.php?IBLOCK_ID=18&type=lists&lang=ru&find_section_section=0&SECTION_ID=0&apply_filter=Y" 
               class="d-flex justify-content-between align-items-center text-decoration-none" target="_blank">
                <span>Ссылка на список бронирований</span>
                <span class="badge bg-warning text-dark">Ссылка на просмотр</span>
            </a>
        </li>
        
        <!-- Ссылка на список врачей в админке -->
        <li class="list-group-item list-group-item-action">
            <a href="/bitrix/admin/iblock_list_admin.php?IBLOCK_ID=17&type=lists&lang=ru&find_section_section=0" 
               class="d-flex justify-content-between align-items-center text-decoration-none" target="_blank">
                <span>Ссылка на список врачей</span>
                <span class="badge bg-warning text-dark">Ссылка на просмотр</span>
            </a>
        </li>

        <!-- Ссылки на код основных файлов ДЗ -->
        <li class="list-group-item list-group-item-action">
            <a href="/bitrix/admin/fileman_file_view.php?path=/local/modules/otus.booking/lib/bookingproperty.php" 
               class="d-flex justify-content-between align-items-center text-decoration-none" target="_blank">
                <span><strong>bookingproperty.php</strong> — Класс свойства инфоблока (Связь таблиц, ORM, регистрация типов)</span>
                <span class="badge bg-secondary">Файл в админке</span>
            </a>
        </li>
        <li class="list-group-item list-group-item-action">
            <a href="/bitrix/admin/fileman_file_view.php?path=/local/modules/otus.booking/install/js/otus.booking/script.js" 
               class="d-flex justify-content-between align-items-center text-decoration-none" target="_blank">
                <span><strong>script.js</strong> — Фронтенд-скрипт (Универсальный парсинг процедур, вызов PopupWindow и валидация)</span>
                <span class="badge bg-secondary">Файл в админке</span>
            </a>
        </li>
        <li class="list-group-item list-group-item-action">
            <a href="/bitrix/admin/fileman_file_view.php?path=/local/modules/otus.booking/ajax/create_booking.php" 
               class="d-flex justify-content-between align-items-center text-decoration-none" target="_blank">
                <span><strong>create_booking.php</strong> — Обработчик AJAX (Прием данных формы и создание элемента инфоблока)</span>
                <span class="badge bg-secondary">Файл в админке</span>
            </a>
        </li>
        <li class="list-group-item list-group-item-action">
            <a href="/bitrix/admin/fileman_file_view.php?path=/local/modules/otus.booking/ajax/get_procedures.php" 
               class="d-flex justify-content-between align-items-center text-decoration-none" target="_blank">
                <span><strong>get_procedures.php</strong> — Асинхронный обработчик списка услуг (Автоматический поиск и выгрузка привязанных к врачу процедур для селекта и грида)</span>
                <span class="badge bg-secondary">Файл в админке</span>
            </a>
        </li>
        <li class="list-group-item list-group-item-action">
            <a href="/bitrix/admin/fileman_file_view.php?path=/local/modules/otus.booking/lang/ru/install/index.php" 
               class="d-flex justify-content-between align-items-center text-decoration-none" target="_blank">
                <span><strong>index.php (lang)</strong> — Языковой файл модуля (Локализованные фразы ошибок и подписей формы)</span>
                <span class="badge bg-secondary">Файл в админке</span>
            </a>
        </li>
    </ul>
</div>

<?php 
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); 
?>
