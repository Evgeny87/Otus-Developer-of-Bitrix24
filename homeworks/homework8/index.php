<?php
use Bitrix\Main\Page\Asset;

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetTitle("ДЗ #8: Учимся подключать свои скрипты, взаимодействовать с компонентами из фронтенда");

Asset::getInstance()->addCss('//cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');
?>

<h1 class="mb-3"><?= $APPLICATION->ShowTitle() ?></h1>

<h4 class="mb-3">Пояснительная записка</h4>
<div class="card p-3 bg-light mb-4">
    <p><strong>Что и как было реализовано:</strong></p>
    <ul>
        <li>Реализована модификация клиентского интерфейса тайм-менеджмента (учета рабочего времени) на портале Битрикс24.</li>
        <li>Для интеграции скрипта в глобальный контекст публичной части портала использован файл конфигурации <code>/local/php_interface/init.php</code> и зарегистрирован кастомный обработчик на событие главного модуля <code>OnProlog</code>.</li>
        <li>Внутри обработчика с помощью встроенного механизма ядра <code>\CJSCore::Init(['popup'])</code> гарантированно инициализирована штатная JS-библиотека модальных окон, а сам JS-компонент подключен через <code>Asset::getInstance()->addJs()</code>.</li>
        <li>На стороне фронтенда реализовано нативное делегирование событий через <code>document.addEventListener('click', ..., true)</code> на стадии перехвата (Event Capture). Это позволило обогнать стандартные JS-обработчики Битрикса и исключить конфликты при асинхронном перерендеринге виджета «Пульс».</li>
        <li>Реализован динамический анализ текстового контекста интерактивных элементов (сплит-кнопок и обычных кнопок управления временем) с использованием метода <code>.closest()</code>. На лету формируются 3 независимых сценария текстов и заголовков для попапа <code>BX.PopupWindow</code>: при начале дня, уходе на перерыв (паузу) и возвращении с него.</li>
        <li>Блокировка рекурсии при программном вызове нативного экшена Битрикса <code>.click()</code> обеспечена за счет контекстного флага защиты, сбрасываемого по таймауту. Кнопка «Отмена» корректно уничтожает объект попапа, оставляя нативный виджет в полностью рабочем состоянии для повторных вызовов.</li>
    </ul>
</div>

<hr>

<div class="card shadow-sm mt-4">
    <div class="card-header bg-success text-white">
        Файлы проекта
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item list-group-item-action">
            <a href="/bitrix/admin/fileman_file_view.php?path=/local/php_interface/init.php" 
               class="d-flex justify-content-between align-items-center text-decoration-none" target="_blank">
                <span>
                    <strong>/local/php_interface/init.php</strong> — Регистрация события OnProlog и подключение кастомного JS-скрипта.
                </span>
                <span class="badge bg-primary">PHP-код ядра</span>
            </a>
        </li>
        <li class="list-group-item list-group-item-action">
            <a href="/bitrix/admin/fileman_file_view.php?path=/local/js/otus.timemod/timeman.js" 
               class="d-flex justify-content-between align-items-center text-decoration-none" target="_blank">
                <span>
                    <strong>/local/js/otus.timemod/timeman.js</strong> — Основная JS-логика перехвата кликов, генерация PopupWindow и управление флагом рекурсии.
                </span>
                <span class="badge bg-warning text-dark">JS-фронтенд</span>
            </a>
        </li>
    </ul>
</div>

<?php 
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); 
?>
