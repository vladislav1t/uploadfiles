<?php
if (move_uploaded_file($_FILES['file']['tmp_name'], 'files/'.$_FILES['file']['name'])) {
    echo "Файл корректен и был успешно загружен.\n";
} else {
    echo "Произошла ошибка при загрузки файла\n";
}
