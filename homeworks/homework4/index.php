<?

use Bitrix\Main\Page\Asset;

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php"); ?>
<?php
$APPLICATION->SetTitle("ДЗ #4: Создание своих таблиц БД и написание модели данных к ним");

Asset::getInstance()->addCss('//cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');

?>
    <h1 class="mb-3"><? $APPLICATION->ShowTitle() ?></h1>

	<h5>Что было сделано в ходе ДЗ №4:</h5>
	<ul>
		<li><b>Было (Проблема):</b> Таблицы инфоблоков (Врачи и Процедуры) существовали отдельно в БД Битрикса. Не было возможности хранить реляционные связи (например, расписание приёмов клиники) без создания лишних тяжелых элементов ИБ.</li>
		<li><b>Стало (Решение):</b> 
			<ul>
				<li>Создана легкая физическая таблица <code>b_hospital_schedule</code> (ID, день недели, ID врача, ID процедуры).</li>
				<li>Написана ORM-модель <code>HospitalScheduleInlineTable</code> для управления этой таблицей через API Битрикса.</li>
				<li>Через метод <code>registerRuntimeField</code> на лету построены связи (References) с системной таблицей элементов инфоблоков <code>ElementTable</code>.</li>
			</ul>
		</li>
		<li><b>Почему сделано именно так:</b> Использование прямой кастомной таблицы с динамическим runtime-связыванием экономит ресурсы базы данных. Это позволяет не плодить сущности в Битриксе и использовать всю мощность ORM D7 для быстрых и оптимизированных выборок, включая кэширование (<code>setCacheTtl</code>).</li>
	</ul>

    <div class="card shadow-sm mt-4">
        <div class="card-header bg-success text-white">
            Файлы проекта
        </div>
			<ul class="list-group list-group-flush">
				<!-- Ссылка 1: Наша кастомная таблица -->
				<li class="list-group-item list-group-item-action">
					<a href="/otus/hospital/schedule.php" class="d-flex justify-content-between align-items-center" target="_blank">
						<span>Кастомное расписание (Таблица БД)</span>
						<span class="badge bg-success">Открыть страницу</span>
					</a>
				</li>
				
				<!-- Ссылка 2: Инфоблок Врачей в админке -->
				<li class="list-group-item list-group-item-action">
					<a href="/bitrix/admin/iblock_element_admin.php?IBLOCK_ID=17&type=lists" class="d-flex justify-content-between align-items-center" target="_blank">
						<span>Инфоблок 1: Врачи (ID 17)</span>
						<span class="badge bg-primary">Просмотр в админке</span>
					</a>
				</li>
				
				<!-- Ссылка 3: Инфоблок Процедур в админке -->
				<li class="list-group-item list-group-item-action">
					<a href="/bitrix/admin/iblock_element_admin.php?IBLOCK_ID=16&type=lists" class="d-flex justify-content-between align-items-center" target="_blank">
						<span>Инфоблок 2: Процедуры (ID 16)</span>
						<span class="badge bg-primary">Просмотр в админке</span>
					</a>
				</li>
			
				<!-- Ссылка 4: Просмотр кода файла в админке Битрикса -->
				<li class="list-group-item list-group-item-action">
					<a href="/bitrix/admin/fileman_file_view.php?path=/otus/hospital/schedule.php" class="d-flex justify-content-between align-items-center" target="_blank">
						<span>Исходный код файла schedule.php (ORM, Runtime, Кэш)</span>
						<span class="badge bg-warning text-dark">Файл в админке</span>
					</a>
				</li>
			</ul>
    </div>





<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>