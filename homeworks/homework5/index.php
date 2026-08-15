<?

use Bitrix\Main\Page\Asset;

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php"); ?>
<?php
$APPLICATION->SetTitle("ДЗ #5: Компонент списка таблицы БД");

Asset::getInstance()->addCss('//cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');

?>
    <h1 class="mb-3"><? $APPLICATION->ShowTitle() ?></h1>

    <h4 class="mb-3">Пояснительная записка</h4>
    <div class="text-secondary" style="line-height: 1.6;">
        <p>В рамках домашнего задания №5 реализован кастомный компонент <code>otus:currency.rate</code>, предназначенный для динамического вывода актуального курса выбранной валюты из штатного справочника Битрикс.</p>
        
        <strong>Основные этапы и особенности реализации:</strong>
        <ul>
            <li><strong>Интеграция с ядром D7 ORM:</strong> Для получения списка доступных валют и их текущих базовых курсов задействован штатный класс модуля Валют <code>\Bitrix\Currency\CurrencyTable</code>. Компонент осуществляет прямую выборку данных из базы без использования устаревших методов CCurrency.</li>
            <li><strong>Гибкая настройка параметров:</strong> В файле <code>.parameters.php</code> описан выпадающий список (тип <code>LIST</code>), который автоматически наполняется всеми активными валютами, зарегистрированными в административном справочнике системы по адресу <code>/bitrix/admin/currencies.php</code>.</li>
            <li><strong>Безопасность и фильтрация:</strong> Внутри метода <code>onPrepareComponentParams</code> класса компонента реализована строгая валидация входящих данных. Строковые параметры очищаются функцией <code>htmlspecialcharsbx()</code> и методом <code>trim()</code> для предотвращения XSS-уязвимостей.</li>
            <li><strong>Локализация:</strong> Код полностью соответствует стандартам 1С-Битрикс — все интерфейсные фразы и параметры вынесены в языковые файлы (папки <code>lang/ru/</code>) и подключаются через современный класс локализации <code>Bitrix\Main\Localization\Loc</code>.</li>
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
                <a href="/otus/currencies.php" class="d-flex justify-content-between align-items-center text-decoration-none text-dark">
                    <span>Ссылка на тестовую страницу с компонентом</span>
                    <span class="badge bg-primary">Ссылка на просмотр</span>
                </a>
            </li>
           <li class="list-group-item list-group-item-action">
                <a href="/bitrix/admin/fileman_file_view.php?path=/local/components/otus/currency.rate/class.php" class="d-flex justify-content-between align-items-center text-decoration-none text-dark">
                    <span>Логика компонента (class.php)</span>
                    <span class="badge bg-warning text-dark">файл в админке</span>
                </a>
            </li>
            <li class="list-group-item list-group-item-action">
                <a href="/bitrix/admin/fileman_file_view.php?path=/local/components/otus/currency.rate/.parameters.php" class="d-flex justify-content-between align-items-center text-decoration-none text-dark">
                    <span>Настройка параметров компонента (.parameters.php)</span>
                    <span class="badge bg-warning text-dark">файл в админке</span>
                </a>
            </li>
            <li class="list-group-item list-group-item-action">
                <a href="/bitrix/admin/fileman_file_view.php?path=/local/components/otus/currency.rate/templates/.default/template.php" class="d-flex justify-content-between align-items-center text-decoration-none text-dark">
                    <span>Визуальный шаблон вывода данных (template.php)</span>
                    <span class="badge bg-warning text-dark">файл в админке</span>
                </a>
            </li>
        </ul>
    </div>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>