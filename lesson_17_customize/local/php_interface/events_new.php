<?php

global $APPLICATION;

use Bitrix\Main\Page\Asset;

$content = '';

/*
ob_start();
?>
    <div class="pagetitle-conmtainer">
        <a href="#" class="ui-btn ui-btn-success">Кнопка</a>
    </div>
<?
$content = ob_get_clean();

$APPLICATION->AddViewContent('inside_pagetitle', $content);
//*/


// if (preg_match('/\/crm\/deal\/category.*/', GetPagePath()))
// {
//     Asset::getInstance()->addJs('/local/js/otus/console/script.js');
// }
//
// CJSCore::RegisterExt('OtusJsExt', [
//     'js'        => [
//         '/local/js/otus/console/script.js',
//     ],
// ]);
//
// CJSCore::Init('OtusJsExt');

// CJSCore::Init('otus.console');

