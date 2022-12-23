<!doctype html>
<?php session_start(); ?>
<head>
    <title>Транслитерация текста</title>
    <meta charset="utf-8">
    <link href="styles.css" rel="stylesheet">
</head>
<body>
<h1>Транслитерация текста</h1>
<form action="" name="translit_form" class="translit_form" method="POST">
    <p class="label_form">Введите текст:</p><textarea class="translit_textarea" name="translit_form" rows="25" required
        ><?php if(isset($_POST['translit_form'])) echo $_POST['translit_form']; ?></textarea>
    <label class="is_paragraph"><input type="checkbox" class="is_paragraph" name="is_paragraph" <?php if (isset($_POST['is_paragraph'])){echo "checked";}?>> Сохранять абзацы</label>
    <div class="buttons">
        <input class="submit" type="submit" value="Обработать">
        <input class="reset" type="reset" value="Очистить">
    </div>
<?php
include 'action.php';

$str = '';
$is_paragraph = '';

if (isset($_POST['translit_form'])){
    $str = $_POST['translit_form'];
}
if (isset($_POST['is_paragraph'])){
    $is_paragraph = $_POST['is_paragraph'];
}

if (isset($_POST['translit_form'])){
    echo "<p class='translit_result'>Результат транслитерации:</p>";
}

if($is_paragraph == 'on'){
    echo "<span class='translit_span'><pre>".transLit($str)."</pre></span>";
}
else echo "<span class='translit_span'>".transLit($str)."</span>";

if (isset($_POST['translit_form'])){
    echo "<br><br><a class='home' href='index.php'>Попробовать снова</a>";
}

?>

</form>
</body>