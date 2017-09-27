<?php

    $language = [];    

    $language['lv'] = [];
    $language['en'] = [];
    $language['ru'] = [];


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

        // LV 

        $language['lv']['our_story'] = 'MŪSU VĒSTURE ';
        $language['lv']['our_barber'] = 'MŪSU FRIZĒTAVAS ';
        $language['lv']['online_store'] = 'INTERNETA VEIKALS ';
        $language['lv']['haircuts'] = 'FRIZŪRAS';
        $language['lv']['price_list'] = 'CENAS';
        $language['lv']['contact_us'] = 'SAZINĀTIES AR MUMS';

        // RU

        $language['ru']['our_story'] = 'НАША ИСТОРИЯ';
        $language['ru']['our_barber'] = 'НАШИ ПАРИКМАХЕРСКИЕ';
        $language['ru']['online_store'] = 'ОНЛАЙН МАГАЗИН';
        $language['ru']['haircuts'] = 'СТРИЖКИ';
        $language['ru']['price_list'] = 'ЦЕНЫ';
        $language['ru']['contact_us'] = 'СВЯЖИТЕСЬ С НАМИ';


        // EN 

        $language['en']['our_story'] = 'OUR STORY';
        $language['en']['our_barber'] = 'OUR BARBERSHOPS';
        $language['en']['online_store'] = 'ONLINE STORE ';
        $language['en']['haircuts'] = 'HAIRCUTS ';
        $language['en']['price_list'] = 'PRICE LIST ';
        $language['en']['contact_us'] = 'CONTACT US ';



    // OURSTORY

    // LV
    $language['lv']['Lumberjack_development'] = 'Lumberjack attīstība  – spilgti momenti, nozīmīgi datumi';
    $language['lv']['our_barber2'] = 'Tirgū no: <br> 01.06.2015 </br> Tirgus – <br>Latvija, Igaunija, Krievija </br>';


    $language['lv']['that1'] = 'lielā sporta pārstāvji izvēlas Lumberjack Barbershop';
    $language['lv']['that2'] = 'starp tiem Edgars Gauračs un Kaspars Kambala izvēlas Lumberjack Barbershop ';
    $language['lv']['that3'] = 'pirmā piedalīšanās MOVEMBER pasākumā kopā ar hokeja klubu Dinamo Rīga ';

    $language['lv']['that4'] = 'otrā barbershopa atvēršana Rīgā ';
    $language['lv']['that5'] = 'arvien vairāk sportistu un slavenību izvēlas Lumberjack Barbershop ';
    $language['lv']['that6'] = 'oficiāli kļuvām par Dinamo Rīga partneriem KHL ietvaros';
    
    $language['lv']['that7'] = 'Barbershop atvēršana Tallinā ';
    $language['lv']['that8'] = 'grupa DE-PHAZZ – gatavojoties koncertam, izvēlas Lumberjack Barbershop ';
    $language['lv']['that9'] = 'Pāvels Voļa, Comedy Club rezidents, pirms gatavošanās koncertam izvēlas Lumberjack Barbershop ';
    $language['lv']['that10'] = 'nākamā Premium klases barbershop atvēršana Pullman viesnīcā ';
    $language['lv']['that11'] = 'nākamā Premium klases barbershop atvēršana Pullman viesnīcā ';

     // ru
     $language['ru']['Lumberjack_development'] = 'Хронология развития Lumberjack Barbershop - яркие моменты по датам и годам ';
     $language['ru']['our_barber2'] = 'Tirgū no: <br> 01.06.2015 </br> Рынок –  <br>Латвия, Эстония, Россия</br>';
 
 
     $language['ru']['that1'] = 'представители большого спорта выбирают Lumberjack Barbershop';
     $language['ru']['that2'] = 'среди них Эдгарс Гаурачс и Каспарс Камбала тоже выбирают Lumberjack Barbershop (вот над этим предложением нужно подумать, звучит как-то коряво)';
     $language['ru']['that3'] = 'первое участие в движении MOVEMBER совместно с хоккейным клубом Dinamo Rīga';
 
     $language['ru']['that4'] = 'Открытие второго барбершопа в Риге';
     $language['ru']['that5'] = 'Все больше и больше латвийских спортсменов и знаменитостей выбирают Lumberjack Barbershop';
     $language['ru']['that6'] = 'В рамках турнира КХЛ стали официальным партнером хоккейного клуба Dinamo Rīga';
     
     $language['ru']['that7'] = 'Открытие барбершопа в Таллине';
     $language['ru']['that8'] = 'Для подготовки к концерту группа De-Phazz выбирает Lumberjack Barbershop';
     $language['ru']['that9'] = 'Павел Воля, резидент Comedy Club, перед концертом тоже выбирает Lumberjack Barbershop (Меня этот «тоже» напрягает, посмотрите одного ли меня, уберите если я не один так считаю)';
     $language['ru']['that10'] = 'Открытие нового барбершопа в гостинице премиум класса Pullman';
     $language['ru']['that11'] = 'Совместно с гостиницей Pullman участие в мероприятии Gumball 3000, один из гостей - CeeLo Green (может написать как отдельный пункт «В рамках участия в мероприятии Gumball 3000 CeeLo Green выбирает Lumberjack Barbershop» ?)';

    // en
    $language['en']['Lumberjack_development'] = 'Chronology of the development of Lumberjack Barbershop - bright moments by dates and years ';
    $language['en']['our_barber2'] = 'Date of foundation - <br> 01.06.2015 </br> The market -  <br>Latvia, Estonia, Russia</br>';


    $language['en']['that1'] = 'representatives of a large sport choose Lumberjack Barbershop';
    $language['en']['that2'] = 'among them Edgars Gaurachs and Kaspars Kambala also choose Lumberjack Barbershop';
    $language['en']['that3'] = 'the first participation in the movement MOVEMBER together with the hockey club Dinamo Riga ';

    $language['en']['that4'] = 'Opening of the second barbershop in Riga';
    $language['en']['that5'] = 'More and more Latvian sportsmen and celebrities choose Lumberjack Barbershop';
    $language['en']['that6'] = 'As part of the tournament, the KHL became the official partner of the hockey club Dinamo Riga';
    
    $language['en']['that7'] = 'Opening of a barbershop in Tallinn';
    $language['en']['that8'] = 'To prepare for the concert, De-Phazz chooses Lumberjack Barbershop';
    $language['en']['that9'] = 'Pavel Volya, the resident of the Comedy Club, before the concert, too, chooses Lumberjack Barbershop ';
    $language['en']['that10'] = 'Opening of a new barbershop in a premium hotel Pullman';
    $language['en']['that11'] = 'Together with the hotel Pullman participated in the event Gumball 3000, one of the guests - CeeLo Green';






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