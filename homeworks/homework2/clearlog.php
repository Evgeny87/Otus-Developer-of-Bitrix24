<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

// Выполняем очистку лога
\Otus\App\Debug\Logger::clearCustomLog();

LocalRedirect('/otus/homeworks/homework2/');
