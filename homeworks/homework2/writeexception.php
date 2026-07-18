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
// Выбрасываем контролируемое исключение, содержащее слово OTUS
try {
	throw new \Exception("Контролируемая ошибка успешно сгенерирована на странице writeexception.php");
} 
catch (\Exception $e) {
	// Явно вызываем метод нашего дочернего класса, чтобы записать данные строго в exceptions.log
	\Otus\App\Debug\Logger::writeExceptionLog($e);

    // 2. Выводим красивое, родное Bootstrap-окно ошибки прямо на экран для преподавателя
    ?>
    <div class="alert alert-danger mt-4" role="alert" style="margin-top: 20px; padding: 15px; background-color: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; border-radius: 4px;">
        <h4 class="alert-heading" style="margin-top: 0; font-size: 16px; font-weight: bold;">⚠️ Произошло контролируемое исключение!</h4>
        <p style="margin-bottom: 0; font-family: monospace; font-size: 13px;">
            <?= htmlspecialchars($e->getMessage()) ?>
        </p>
    </div>
    <?
}
?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
