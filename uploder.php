<?php
if (move_uploaded_file($_FILES['file']['tmp_name'], 'files/'.$_FILES['file']['name'])) {
    echo "Файл был успешно загружен.<br> <a href='/'>назад</a>";
} else {
    echo "Произошла ошибка при загрузки файла ";
}
