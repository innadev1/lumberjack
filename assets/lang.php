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
    $language['lv']['barbtext'] = 'Lumberjack attīstība  – spilgti momenti, nozīmīgi datumi
    Tirgū no: 01.06.2015	Tirgus – Latvija, Igaunija, Krievija
    
    
    2015 
    lielā sporta pārstāvji izvēlas Lumberjack Barbershop
    starp tiem Edgars Gauračs un Kaspars Kambala izvēlas Lumberjack Barbershop 
    pirmā piedalīšanās MOVEMBER pasākumā kopā ar hokeja klubu Dinamo Rīga 
    2016 
    otrā barbershopa atvēršana Rīgā 
    arvien vairāk sportistu un slavenību izvēlas Lumberjack Barbershop 
    oficiāli kļuvām par Dinamo Rīga partneriem KHL ietvaros
    Barbershop atvēršana Tallinā 
    grupa DE-PHAZZ – gatavojoties koncertam, izvēlas Lumberjack Barbershop 
    Pāvels Voļa, Comedy Club rezidents, pirms gatavošanās koncertam izvēlas Lumberjack Barbershop 
    2017 
    nākamā Premium klases barbershop atvēršana Pullman viesnīcā 
    kopā ar Pullman viesnīcu dalība Gumball 3000 pasākumā, galvenais viesis CeeLo Green
    ';

    
    $language['en']['barbtext.'] = 'Chronology of the development of Lumberjack Barbershop - bright moments by dates and years -
    Date of foundation - 01.06.2015 The market - Latvia, Estonia, Russia
    2015 
    - representatives of a large sport choose Lumberjack Barbershop
    - among them Edgars Gaurachs and Kaspars Kambala also choose Lumberjack Barbershop
    - the first participation in the movement MOVEMBER together with the hockey club Dinamo Riga 
    2016
    - Opening of the second barbershop in Riga
    - More and more Latvian sportsmen and celebrities choose Lumberjack Barbershop
    - As part of the tournament, the KHL became the official partner of the hockey club 
    Dinamo Riga
    - Opening of a barbershop in Tallinn
    - To prepare for the concert, De-Phazz chooses Lumberjack Barbershop
    - Pavel Volya, the resident of the Comedy Club, before the concert, too, chooses Lumberjack Barbershop 
    2017
    - Opening of a new barbershop in a premium hotel Pullman
    - Together with the hotel Pullman participated in the event Gumball 3000, one of the guests - CeeLo Green
    ';


    $language['ru']['barbtext.'] = 'Хронология развития Lumberjack Barbershop - яркие моменты по датам и годам - 
    Дата основания – 01.06.2015		Рынок – Латвия, Эстония, Россия
    2015 
    представители большого спорта выбирают Lumberjack Barbershop
    среди них Эдгарс Гаурачс и Каспарс Камбала тоже выбирают Lumberjack Barbershop (вот над этим предложением нужно подумать, звучит как-то коряво)
    первое участие в движении MOVEMBER совместно с хоккейным клубом Dinamo Rīga
    2016
    Открытие второго барбершопа в Риге
    Все больше и больше латвийских спортсменов и знаменитостей выбирают Lumberjack Barbershop
    В рамках турнира КХЛ стали официальным партнером хоккейного клуба Dinamo Rīga
    Открытие барбершопа в Таллине
    Для подготовки к концерту группа De-Phazz выбирает Lumberjack Barbershop
    Павел Воля, резидент Comedy Club, перед концертом тоже выбирает Lumberjack Barbershop (Меня этот «тоже» напрягает, посмотрите одного ли меня, уберите если я не один так считаю)
    
    2017
    Открытие нового барбершопа в гостинице премиум класса Pullman
    Совместно с гостиницей Pullman участие в мероприятии Gumball 3000, один из гостей - CeeLo Green (может написать как отдельный пункт «В рамках участия в мероприятии Gumball 3000 CeeLo Green выбирает Lumberjack Barbershop» ?)
    ';



    // FOOTER
    $language['lv']['about company'] = 'about company';
    $language['en']['about company'] = 'about company';
    $language['ru']['about company'] = 'about company';
    $language['ee']['about company'] = 'about company';




?>