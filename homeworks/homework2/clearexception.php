<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

// Вызываем метод очистки файла exceptions.log из класса Logger
\Otus\App\Debug\Logger::clearExceptionLog();

LocalRedirect('/otus/homeworks/homework2/');
