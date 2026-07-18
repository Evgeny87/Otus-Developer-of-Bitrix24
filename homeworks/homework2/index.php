<?

use Bitrix\Main\Page\Asset;

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetTitle("ДЗ #2: Отладка и логирование");

Asset::getInstance()->addCss('//cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');

?>
    <h1 class="mb-3"><? $APPLICATION->ShowTitle() ?></h1>

    <h4 class="mb-3">Пояснительная записка</h4>
	<div style="color: #334155; font-size: 14px; line-height: 1.6; padding: 15px; background: #f8fafc; border-left: 4px solid #16a34a; border-radius: 4px;">
		<strong>Реализация ДЗ №2:</strong><br>
		1. Кастомное логирование вынесено в изолированный класс <code>Logger</code>, наследующий базовый функционал ядра проекта.<br>
		2. Все кастомные сообщения автоматически тегируются обязательным префиксом <strong>[OTUS]</strong>.<br>
		3. Системные исключения перехватываются штатным обработчиком Битрикса через <code>.settings_extra.php</code> и логируются с меткой <strong>[OTUS EXCEPTION]</strong>.
	</div>
    <br>
    <br>
    <hr>

    <div class="card shadow-sm mt-4">
        <div class="card-header bg-success text-white">
            Файлы проекта: Часть 1 - Logger
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item list-group-item-action">
                <a href="/bitrix/admin/fileman_file_edit.php?path=%2Flocal%2Flogs%2Flog_custom.log&full_src=Y&site=s1&lang=ru" target="_blank"
                   class="d-flex justify-content-between align-items-center">
                <span>
                    local/logs/log_custom.log
                </span>
                    <span class="badge bg-success">
                    Файл лога из п1 ДЗ
                </span>
                </a>
            </li>
            <li class="list-group-item list-group-item-action">
                <a href="/otus/homeworks/homework2/writelog.php" target="_blank"
                   class="d-flex justify-content-between align-items-center">
                <span>
                    writelog.php
                </span>
                    <span class="badge bg-secondary">
                    Добавление в лог из п1 ДЗ
                </span>
                </a>
            </li>
            <li class="list-group-item list-group-item-action">
                <a href="/otus/homeworks/homework2/clearlog.php" target="_blank"
                   class="d-flex justify-content-between align-items-center">
                <span>
                    clearlog.php
                </span>
                    <span class="badge bg-warning">
                    Очистить лог из п1 ДЗ
                </span>
                </a>
            </li>
            <li class="list-group-item list-group-item-action">
                <a href="/bitrix/admin/fileman_file_edit.php?path=%2Flocal%2Fphp_interface%2Fsrc%2FApp%2FDebug%2FLogger.php&full_src=Y&site=s1&lang=ru" target="_blank"
                   class="d-flex justify-content-between align-items-center">
                <span>
                    Файл с классом кастомного логгера
                </span>
                    <span class="badge bg-primary">
                    класс логгера в админке
                </span>
                </a>
            </li>

        </ul>
    </div>

    <div class="card shadow-sm mt-4">
        <div class="card-header bg-success text-white">
            Файлы проекта: Часть 2 - Exception
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item list-group-item-action">
                <a href="/bitrix/admin/fileman_file_edit.php?path=%2Flocal%2Flogs%2Fexceptions.log&full_src=Y&site=s1&lang=ru" target="_blank"
                   class="d-flex justify-content-between align-items-center">
                <span>
                    local/logs/exceptions.log
                </span>
                    <span class="badge bg-primary">
                    Файл лога из п2 ДЗ
                </span>
                </a>
            </li>
            <li class="list-group-item list-group-item-action">
                <a href="/otus/homeworks/homework2/writeexception.php" target="_blank"
                   class="d-flex justify-content-between align-items-center">
                <span>
                    writeexception.php
                </span>
                    <span class="badge bg-success">
                    Добавление в лог из п2 ДЗ
                </span>
                </a>
            </li>
            <li class="list-group-item list-group-item-action">
                <a href="/otus/homeworks/homework2/clearexception.php" target="_blank"
                   class="d-flex justify-content-between align-items-center">
                <span>
                    clearexception.php
                </span>
                    <span class="badge bg-secondary">
                    Очистить лог из п2 ДЗ
                </span>
                </a>
            </li>
            <li class="list-group-item list-group-item-action">
                <a href="/bitrix/admin/fileman_file_edit.php?path=%2Flocal%2Fphp_interface%2Fsrc%2FApp%2FDebug%2FLogger.php&full_src=Y&site=s1&lang=ru" target="_blank"
                   class="d-flex justify-content-between align-items-center">
                <span>
                    Файл с классом системного исключений
                </span>
                    <span class="badge bg-warning">
                    класс логгера в админке
                </span>
                </a>
            </li>
        </ul>
    </div>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>