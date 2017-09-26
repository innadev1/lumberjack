<?php

    $language = [];    

    $language['lv'] = [];
    $language['en'] = [];
    $language['ru'] = [];
    $language['ee'] = [];

    $SiteUrl = 'http://localhost/www/testlumberjack.tk/';
    $language;

    if (isset($_GET['lang'])&&!empty($_GET['lang'])) {
        if ($_GET['lang']=='lv'||$_GET['lang']=='en'||$_GET['lang']=='ru'||$_GET['lang']=='ee') {
            $_SESSION['lang'] = $_GET['lang'];
        }
    }

    if (isset($_SESSION['lang'])) {
        $lang = $_SESSION['lang'];
    }else{
        $lang = 'lv';
    }

    // HEADER 
    $language['lv']['franch.'] = 'FRANČĪZE';
    $language['en']['franch.'] = 'FRANCHISE';
    $language['ru']['franch.'] = 'ФРАНЧИЗА';
    $language['ee']['franch.'] = 'IgauniskiTest';


    // BarBerShop 
    $language['lv']['barbtext'] = '
    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

    ';

    
    $language['en']['barbtext.'] = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.    
    ';


    $language['ru']['barbtext.'] = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
    
    ';



    // FOOTER
    $language['lv']['about company'] = 'about company';
    $language['en']['about company'] = 'about company';
    $language['ru']['about company'] = 'about company';
    $language['ee']['about company'] = 'about company';




?>