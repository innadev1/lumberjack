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


    // FOOTER
    $language['lv']['about company'] = 'about company';
    $language['en']['about company'] = 'about company';
    $language['ru']['about company'] = 'about company';
    $language['ee']['about company'] = 'about company';




?>