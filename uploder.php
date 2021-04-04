<?php
if ($_FILES['files']['size'] > 104857600){
    echo 'Првевышен допустимый размер файла 100мб';
    exit();
}
$newfile = 'files/'.$_FILES['file']['name'];
if (move_uploaded_file($_FILES['file']['tmp_name'], $newfile)) {
    if(file_exists($newfile)){
        echo 'файл с таким названием уже существует!<br> <a href='/'>назад</a>';
        exit();
    }

    echo "Файл был успешно загружен.<br> <a href='/'>назад</a>";

} else {
    echo "Произошла ошибка при загрузки файла ";
}
