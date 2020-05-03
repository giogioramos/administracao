<!DOCTYPE html>
<html lang="pt-BR">
    <?php require_once "core/template/head.php";?>
    <body>
        <?php 
            require_once 'core/funcao/util.php';
            require_once "core/init.php";

            if (!isset($_GET['page'])) {
                require "action/login.php";
            } else {
                $file = 'action/'.$_GET['page'].'.php';
                if (file_exists($file)) {
                    require $file;
                } else {
                    require "action/login.php";
                }
            }
        ?>
    </body>
</html>
