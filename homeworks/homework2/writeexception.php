<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Ошибка для exeption");
?>
<ul class="list-group">
    <li class="list-group-item">
        Файл лога: 
        <a href="/local/logs/exceptions.log" target="_blank">[Открыть напрямую]</a>
        или 
        <a href="/bitrix/admin/fileman_file_edit.php?path=%2Flocal%2Flogs%2Fexceptions.log&full_src=Y&site=s1&lang=ru" target="_blank">[Открыть в текстовом редакторе админки]</a>, 
            в лог успешно добавлена запись об ошибке: "[OTUS EXCEPTION] Контролируемая ошибка успешно сгенерирована на странице writeexception.php"
    </li>
</ul>
<?

$num = 1 / 0;

?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
