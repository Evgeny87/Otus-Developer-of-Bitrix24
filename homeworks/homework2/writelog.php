<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php"); ?>
<?php
$APPLICATION->SetTitle("Добавление в лог");
?>
    <ul>
        <li>
            Файл лога: 
            <a href="/local/logs/log_custom.log" target="_blank">[Открыть напрямую]</a> 
            или 
            <a href="/bitrix/admin/fileman_file_edit.php?path=%2Flocal%2Flogs%2Flog_custom.log&full_src=Y&site=s1&lang=ru" target="_blank">[Открыть в текстовом редакторе админки]</a>, 
            в лог успешно добавлена запись: 'Открыта страница writelog.php'
        </li>
    </ul>
<?

// Функция добавления в лог
\Otus\App\Debug\Logger::writeCustomLog('Открыта страница writelog.php');

?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>