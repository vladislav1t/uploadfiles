<?php
/*ini_set('display', 1);
error_reporting(E_ALL);
var_dump($_FILES);*/
$max_size = ini_get('upload_max_filesize');
$fileErrors = array(
    0 => 'Файл был успешно загружен.<br><a href="/">назад</a>',
    1 => 'Размер принятого файла превысил максимально допустимый размер.<br><a href="/">назад</a>',
    2 => 'Размер принятого файла превысил максимально допустимый размер.<br><a href="/">назад</a>',
    3 => 'Загружаемый файл был получен только частично.<br><a href="/">назад</a>',
    4 => 'Файл не был загружен.<br><a href="/">назад</a>',
    6 => 'Отсутствует временная папка.<br><a href="/">назад</a>',
    7 => 'Не удалось записать файл на диск.<br><a href="/">назад</a>',
    8 => 'Остановленна загрузка файла.<br><a href="/">назад</a>',
);
$ext = ['jpeg','jpg','png'];
$info = new SplFileInfo($_FILES['file']['name']);

if ($_FILES) {
    $newfile = 'files/' . $_FILES['file']['name'];
    if(!in_array($info->getExtension(),$ext)){
        exit('Недопустимое расшерение файла');
    }
    if (file_exists($newfile)) {
        echo "файл с таким названием уже существует!<br> <a href='/'>назад</a>";
        exit();
    }
    $uploadError = $_FILES['file']['error'];
    if($uploadError > 0){
    echo $fileErrors[$uploadError];
    exit();
    }

    if (move_uploaded_file($_FILES['file']['tmp_name'], $newfile)) {
        echo "Файл был успешно загружен.<br> <a href='/'>назад</a>";

    } else {
        echo "Произошла ошибка при загрузки файла ";
    }
} else {
    echo 'Размер принятого файла превысил максимально допустимый размер ' .$max_size. '.<br><a href="/">назад</a>';
}
