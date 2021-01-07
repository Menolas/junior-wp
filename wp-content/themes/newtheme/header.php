<!DOCTYPE html>
<html lang="ru">
<head>

    <?php wp_head();?>
    
    <title>Document</title>
</head>

<body <?php body_class();?>>
    <header class="sticky-top">
        <div class="container">

            <?php wp_nav_menu (
                array(
                    'theme_location' => 'top-menu',
                    'menu_class' => 'top-bar'
                )
            );?>

        </div>
    </header>
