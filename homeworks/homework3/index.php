<?

use Bitrix\Main\Page\Asset;

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php"); ?>
<?php
$APPLICATION->SetTitle("ДЗ #3: Связывание моделей");

Asset::getInstance()->addCss('//cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');

?>
    <h1 class="mb-3"><? $APPLICATION->ShowTitle() ?></h1>

	<h4 class="mb-3">Пояснительная записка</h4>
	<div style="color: #334155; font-size: 14px; line-height: 1.6; padding: 15px; background: #f8fafc; border-left: 4px solid #16a34a; border-radius: 4px;">
	<strong>Реализация ДЗ №3:</strong><br>
	1. На базе ядра Битрикс D7 ORM спроектированы две объектные модели: <code>DoctorsPropertyValuesTable</code> для инфоблока Врачей (ID 17) и <code>ProcsPropertyValuesTable</code> для инфоблока Процедур (ID 16).<br>
	2. Реализована полноценная поддержка ЧПУ (человекопонятных URL) через кастомное правило в <code>urlrewrite.php</code>. Роутинг динамически обрабатывает детальные страницы врачей и формы по латинскому символьному коду элемента (<code>CODE</code>).<br>
	3. Выполнено связывание моделей: детальная страница доктора агрегирует и выводит список привязанных к нему услуг, выбирая данные из множественного свойства связи.<br>
	4. Добавлен интерактивныйCRUD-функционал (Дополнительное задание): реализовано добавление новых процедур, создание новых карточек врачей, а также полное обновление ФИО и привязанных множественных свойств на странице редактирования.
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
			 <a href="/otus/doctors/" target="_blank" class="d-flex justify-content-between align-items-center">
				 <span>Главная страница (Список врачей)</span>
				 <span class="badge bg-primary">Открыть раздел</span>
			 </a>
		 </li>
		 <li class="list-group-item list-group-item-action">
			 <a href="/otus/doctors/new" target="_blank" class="d-flex justify-content-between align-items-center">
				 <span>Интерфейс: Добавление нового врача</span>
				 <span class="badge bg-success">Тестировать CRUD</span>
			 </a>
		 </li>
		 <li class="list-group-item list-group-item-action">
			 <a href="/otus/doctors/newproc" target="_blank" class="d-flex justify-content-between align-items-center">
				 <span>Интерфейс: Создание новой процедуры</span>
				 <span class="badge bg-secondary">Тестировать CRUD</span>
			 </a>
		 </li>
		 <li class="list-group-item list-group-item-action">
			 <a href="/bitrix/admin/fileman_file_edit.php?path=%2Flocal%2Fphp_interface%2Fsrc%2FApp%2FModels%2FLists%2FDoctorsPropertyValuesTable.php&full_src=Y&site=s1&lang=ru" target="_blank" class="d-flex justify-content-between align-items-center">
				 <span>ORM-модель: Таблица Врачей (DoctorsPropertyValuesTable.php)</span>
				 <span class="badge bg-warning text-dark">Исходный код</span>
			 </a>
		 </li>
		 <li class="list-group-item list-group-item-action">
			 <a href="/bitrix/admin/fileman_file_edit.php?path=%2Flocal%2Fphp_interface%2Fsrc%2FApp%2FModels%2FLists%2FProcsPropertyValuesTable.php&full_src=Y&site=s1&lang=ru" target="_blank" class="d-flex justify-content-between align-items-center">
				 <span>ORM-модель: Таблица Процедур (ProcsPropertyValuesTable.php)</span>
				 <span class="badge bg-warning text-dark">Исходный код</span>
			 </a>
		 </li>
		 <li class="list-group-item list-group-item-action">
			 <a href="/bitrix/admin/fileman_file_edit.php?path=%2Fotus%2Fdoctors%2Findex.php&full_src=Y&site=s1&lang=ru" target="_blank" class="d-flex justify-content-between align-items-center">
				 <span>Контроллер и Представление (otus/doctors/index.php)</span>
				 <span class="badge bg-danger">Файл скрипта</span>
			 </a>
		 </li>
 </ul>

    </div>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>