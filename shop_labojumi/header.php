<?php
	// include 'shop/wp-content/theme/twentyseventeen/assets/lang.php';
    if(!isset($_SESSION)) {
        session_start();
   }

    $language = [];    

    $language['lv'] = [];
    $language['en'] = [];
    $language['ru'] = [];


    $SiteUrl = 'http://testlumberjack.tk/';
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

    

    $language['lv']['ofiss1'] = 'GALVENAIS BIROJS';
    $language['lv']['map2'] = 'PARĀDĪT KARTĒ';
    $language['lv']['shop3'] = 'INTERNETVEIKALS/RETAIL';
    $language['lv']['marketing4'] = 'MĀRKETINGS';

    $language['en']['ofiss1'] = 'MAIN OFFICE';
    $language['en']['map2'] = 'SHOW IN MAP';
    $language['en']['shop3'] = 'INTERNET SHOP/RETAIL';
    $language['en']['marketing4'] = 'MARKETING';

    $language['ru']['ofiss1'] = 'ГЛАВНЫЙ ОФИС';
    $language['ru']['map2'] = 'ПОКАЗАТЬ НА КАРТЕ';
    $language['ru']['shop3'] = 'ИНТЕРНЕТ МАГАЗИН/РИТЕЙЛ';
    $language['ru']['marketing4'] = 'МАРКЕТИНГ';
    
    
	// FRANCHISE
	
	$language['lv']['franchise_'] = 'http://testlumberjack.tk/downloads/lumberjack_barbershop_franchise_en.pdf';
	$language['en']['franchise_'] = 'http://testlumberjack.tk/downloads/lumberjack_barbershop_franchise_en.pdf';
	$language['ru']['franchise_'] = 'http://testlumberjack.tk/downloads/lumberjack_barbershop_franchise_ru.pdf';
    
    // HEADER 
    $language['lv']['franch.'] = 'FRANŠĪZE';
    $language['en']['franch.'] = 'FRANCHISE';
    $language['ru']['franch.'] = 'ФРАНШИЗА';

        // LV 

        $language['lv']['our_story'] = 'MŪSU VĒSTURE';
        $language['lv']['our_barber'] = 'MŪSU FRIZĒTAVAS';
        $language['lv']['online_store'] = 'E-SHOP';
        $language['lv']['haircuts'] = 'MATU GRIEZUMI';
        $language['lv']['price_list'] = 'CENAS';
        $language['lv']['contact_us'] = 'SAZINĀTIES AR MUMS';

        // RU

        $language['ru']['our_story'] = 'НАША ИСТОРИЯ';
        $language['ru']['our_barber'] = 'НАШИ ПАРИКМАХЕРСКИЕ';
        $language['ru']['online_store'] = 'E-SHOP';
        $language['ru']['haircuts'] = 'СТРИЖКИ';
        $language['ru']['price_list'] = 'ЦЕНЫ';
        $language['ru']['contact_us'] = 'СВЯЖИТЕСЬ С НАМИ';


        // EN 

        $language['en']['our_story'] = 'OUR STORY';
        $language['en']['our_barber'] = 'OUR BARBERSHOPS';
        $language['en']['online_store'] = 'E-SHOP';
        $language['en']['haircuts'] = 'HAIRCUTS';
        $language['en']['price_list'] = 'PRICE LIST ';
        $language['en']['contact_us'] = 'CONTACT US ';


        // index 

        $language['lv']['madelv_text'] = 'Visi mūsu produkti ir rūpīgi izstrādāti Anglijā kopš 1805. gada, un tie vislabāk iemieso britu mantojuma būtību. Mūsu īpašā augsti kvalificētu speciālistu, ķīmiķu, dizaineru un amatnieku komanda nepārtraukti strādā, lai piegādātu mūsu šodien pazīstamos produktus par viņu atšķirīgām inovācijām un izcilām tradīcijām. Anglijā turpināsies mūsu ikonu klāsts, jo mēs pastāvīgi cenšamies radīt jaunus un aizraujošus produktus, iegaumējot uz mūsu klientu vēlmēm.';
        $language['lv']['readmore'] = 'lasīt tālāk';
     
        $language['en']['madelv_text'] = 'All our products have been carefully crafted in England since 1805 and they embody the essence of the British heritage at its best. Our dedicated team of highly skilled professionals, chemists, designers and craftsmen work tirelessly to deliver our products known today for their distinctive tradition of innovation and excellence. Our iconic ranges will continue to be produced in England as we constantly endeavour to bring new and exciting products in response to our customer’s needs.';
        $language['en']['readmore'] = 'read more';

        $language['ru']['madelv_text'] = 'Все наши продукты были тщательно обработаны в Англии с 1805 года, и они воплощают в себе суть британского наследия. Наша целеустремленная команда высококвалифицированных специалистов, химиков, дизайнеров и мастеров неустанно работает над нашими продуктами, известными сегодня благодаря своей уникальной традиции инноваций и превосходства. Наши знаковые диапазоны будут по-прежнему выпускаться в Англии, поскольку мы постоянно стремимся принести новые и захватывающие продукты в ответ на потребности наших клиентов.';
        $language['ru']['readmore'] = 'читать дальше';

    // OURSTORY
    $language['lv']['great'] = 'PRICE LIST ';
    $language['lv']['from'] = 'С 1990';

    $language['en']['great'] = 'GREATNESS';
    $language['en']['from'] = 'Since 1990';

    $language['ru']['great'] = 'ВЕЛИЧИЕ';
    $language['ru']['from'] = 'Kopš 1990';


    // LV
    $language['lv']['Lumberjack_development'] = 'Lumberjack attīstība  – spilgti momenti, nozīmīgi datumi';
    $language['lv']['our_barber2'] = 'Tirgū no: 01.06.2015 Tirgus – Latvija, Igaunija, Krievija';


    $language['lv']['that1'] = 'Lielā sporta pārstāvji izvēlas Lumberjack Barbershop';
    $language['lv']['that2'] = 'Starp tiem Edgars Gauračs un Kaspars Kambala izvēlas Lumberjack Barbershop ';
    $language['lv']['that3'] = 'Pirmā piedalīšanās MOVEMBER pasākumā kopā ar hokeja klubu Dinamo Rīga ';

    $language['lv']['that4'] = 'Otrā barbershopa atvēršana Rīgā ';
    $language['lv']['that5'] = 'Arvien vairāk sportistu un slavenību izvēlas Lumberjack Barbershop ';
    $language['lv']['that6'] = 'Oficiāli kļuvām par Dinamo Rīga partneriem KHL ietvaros';
    
    $language['lv']['that7'] = 'Grupa DE-PHAZZ – gatavojoties koncertam, izvēlas Lumberjack Barbershop ';
    $language['lv']['that8'] = 'Pāvels Voļa, Comedy Club rezidents, pirms gatavošanās koncertam izvēlas Lumberjack Barbershop ';

    $language['lv']['that9'] = 'Barbershop atvēršana Tallinā ';
    $language['lv']['that10'] = 'Nākamā Premium klases barbershop atvēršana Pullman viesnīcā ';
    $language['lv']['that11'] = 'Kopā ar Pullman viesnīcu dalība Gumball 3000 pasākumā, galvenais viesis CeeLo Green';

     // ru
     $language['ru']['Lumberjack_development'] = 'Хронология развития Lumberjack Barbershop - яркие моменты по датам и годам ';
     $language['ru']['our_barber2'] = 'На рынке с: 01.06.2015 Рынок – Латвия, Эстония, Россия';
 
 
     $language['ru']['that1'] = 'Представители большого спорта выбирают Lumberjack Barbershop';
     $language['ru']['that2'] = 'Среди них Эдгарс Гаурачс и Каспарс Камбала тоже выбирают Lumberjack Barbershop (вот над этим предложением нужно подумать, звучит как-то коряво)';
     $language['ru']['that3'] = 'Первое участие в движении MOVEMBER совместно с хоккейным клубом Dinamo Rīga';
 
     $language['ru']['that4'] = 'Открытие второго барбершопа в Риге';
     $language['ru']['that5'] = 'Все больше и больше латвийских спортсменов и знаменитостей выбирают Lumberjack Barbershop';
     $language['ru']['that6'] = 'В рамках турнира КХЛ стали официальным партнером хоккейного клуба Dinamo Rīga';
     
     $language['ru']['that7'] = 'Для подготовки к концерту группа De-Phazz выбирает Lumberjack Barbershop';
     $language['ru']['that8'] = 'Павел Воля, резидент Comedy Club, перед концертом тоже выбирает Lumberjack Barbershop (Меня этот «тоже» напрягает, посмотрите одного ли меня, уберите если я не один так считаю)';
     
     $language['ru']['that9'] = 'Открытие барбершопа в Таллине';
     $language['ru']['that10'] = 'Открытие нового барбершопа в гостинице премиум класса Pullman';
     $language['ru']['that11'] = 'Совместно с гостиницей Pullman участие в мероприятии Gumball 3000, один из гостей - CeeLo Green (может написать как отдельный пункт «В рамках участия в мероприятии Gumball 3000 CeeLo Green выбирает Lumberjack Barbershop» ?)';

    // en
    $language['en']['Lumberjack_development'] = 'Chronology of the development of Lumberjack Barbershop - bright moments by dates and years ';
    $language['en']['our_barber2'] = 'Date of foundation -  01.06.2015 The market - Latvia, Estonia, Russia';


    $language['en']['that1'] = 'Representatives of a large sport choose Lumberjack Barbershop';
    $language['en']['that2'] = 'Among them Edgars Gaurachs and Kaspars Kambala also choose Lumberjack Barbershop';
    $language['en']['that3'] = 'The first participation in the movement MOVEMBER together with the hockey club Dinamo Riga ';

    $language['en']['that4'] = 'Opening of the second barbershop in Riga';
    $language['en']['that5'] = 'More and more Latvian sportsmen and celebrities choose Lumberjack Barbershop';
    $language['en']['that6'] = 'As part of the tournament, the KHL became the official partner of the hockey club Dinamo Riga';
    
    $language['en']['that7'] = ' To prepare for the concert, De-Phazz chooses Lumberjack Barbershop';
    $language['en']['that8'] = 'Pavel Volya, the resident of the Comedy Club, before the concert, too, chooses Lumberjack Barbershop 
    
    ';
    $language['en']['that9'] = 'Opening of a barbershop in Tallinn';
    $language['en']['that10'] = 'Opening of a new barbershop in a premium hotel Pullman';
    $language['en']['that11'] = 'Together with the hotel Pullman participated in the event Gumball 3000, one of the guests - CeeLo Green';



    // BarBerShop 
    $language['en']['opmap'] = "Open map";
    $language['en']['closmap'] = "Close map";
   

    $language['lv']['opmap'] = "Atvērt karti";
    $language['lv']['closmap'] = "Aizvērt karti";
    

    $language['ru']['opmap'] = "Открыть карту";
    $language['ru']['closmap'] = "Закрыть карту";




    $language['en']['4barb'] = "4 barbershops";
    $language['en']['3country'] = "3 countries";
   

    $language['lv']['4barb'] = "4 barberšopi";
    $language['lv']['3country'] = "3 valstis";
    

    $language['ru']['4barb'] = "4 барбершопа";
    $language['ru']['3country'] = "3 страны";

    // valstis
    $language['lv']['lv'] = "LATVIJA";
    $language['lv']['est'] = "IGAUNIJA";
    $language['lv']['russ'] = "KRIEVIJA";

    $language['ru']['lv'] = "ЛАТВИЯ";
    $language['ru']['est'] = "ЭСТОНИЯ";
    $language['ru']['russ'] = "РОССИЯ";

    $language['en']['lv'] = "LATVIA";
    $language['en']['est'] = "ESTONIA";
    $language['en']['russ'] = "RUSSIA";


    // lv
    $language['lv']['all'] = "VISI PAKALPOJUMI";
    $language['lv']['hair'] = "MATI";
    $language['lv']['mass'] = "MASĀŽA";
    $language['lv']['skin'] = "SKŪŠANA UN ĀDA";

    // en
    $language['en']['all'] = "ALL SERVICES";
    $language['en']['hair'] = "HAIR";
    $language['en']['mass'] = "MASSAGE";
    $language['en']['skin'] = "SHAVING & SKIN";

    // ru
    $language['ru']['all'] = "ВСЕ УСЛУГИ";
    $language['ru']['hair'] = "ВОЛОСЫ";
    $language['ru']['mass'] = "МАССАЖ";
    $language['ru']['skin'] = "БРИТЬЁ И КОЖА";



    // LV
    $language['lv']['adr'] = "Adrese:";
    $language['lv']['em'] = "Epasts:";
    $language['lv']['te'] = "Tel:";
    $language['lv']['op'] = "Atvērts";
    $language['lv']['mon'] = "Pirm. - Sesd.:";
    $language['lv']['sun'] = "Svētdiena:";

    // EN
    $language['en']['adr'] = "Adress:";
    $language['en']['em'] = "Email:";
    $language['en']['te'] = "Tel.:";
    $language['en']['op'] = "Open";
    $language['en']['mon'] = "Mon.- Sat.:";
    $language['en']['sun'] = "Sunday:";

    // RU
    $language['ru']['adr'] = "Адрес:";
    $language['ru']['em'] = "Электронная почта:";
    $language['ru']['te'] = "Тел.:";
    $language['ru']['op'] = "Открыт";
    $language['ru']['mon'] = "Пн.-Сб:";
    $language['ru']['sun'] = "Воскресенье:";


    // LV
    $language['lv']['check'] = "Pārbadiet savu e-pastu";
    // RU
    $language['ru']['check'] = "Проверьте свою почту";
    // EN
    $language['en']['check'] = "Check your email";


    $language['lv']['barbtext'] = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.';

    
    $language['en']['barbtext.'] = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.';


    $language['ru']['barbtext.'] = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.';

    
    // LV
    $language['lv']['service'] = "Servisi";
    $language['lv']['book'] = "Pieteikties";
    $language['lv']['rew'] = "Atsauces";


    $language['lv']['hair1.'] = "Matu griezums";
    $language['lv']['hair2.'] = "Groomings";
    $language['lv']['hair3.'] = "Bārdas+ matu griezums";
    $language['lv']['hair4.'] = "Karstā skūšanās";
    $language['lv']['hair5.'] = "Bērnu griezums ( no 5 līdz 10 gadiem)";
    $language['lv']['hair6.'] = "Matu griezums Dēls+ Tēvs";
    $language['lv']['hair7.'] = "Matu mazgāšana";
    $language['lv']['hair8.'] = "Bārdas krāsošana";
    $language['lv']['hair9.'] = "Studentu īpaša cena no sv.-cet. ";

    // RUS
    $language['ru']['service'] = "Услуги";
    $language['ru']['book'] = "Записаться";
    $language['ru']['rew'] = "Отзывы";


    $language['ru']['hair1.'] = "Стрижка ножницами";
    $language['ru']['hair2.'] = "Груминг";
    $language['ru']['hair3.'] = "Стрижка+коррекция бороды";
    $language['ru']['hair4.'] = "Горячее бритьё";
    $language['ru']['hair5.'] = "Детская стрижка ( от 5 до 10 лет )";
    $language['ru']['hair6.'] = "Стрижка отец + сын";
    $language['ru']['hair7.'] = "Мойка головы";
    $language['ru']['hair8.'] = "Покраска бороды";
    $language['ru']['hair9.'] = "Специальная цена для студентов воск.- чет.";
 
     // EN
     $language['en']['service'] = "Services";
     $language['en']['book'] = "Book";
     $language['en']['rew'] = "Reviews";
     
     $language['en']['hair1.'] = "Haircut Scissors";
     $language['en']['hair2.'] = "Grooming";
     $language['en']['hair3.'] = "Haircut + Beardtrim";
     $language['en']['hair4.'] = "Hot Shave";
     $language['en']['hair5.'] = "Kids haircut ( 5-10 years old )";
     $language['en']['hair6.'] = "DAD & SON";
     $language['en']['hair7.'] = "Headwash";
     $language['en']['hair8.'] = "Beardcoloring";
     $language['en']['hair9.'] = "Students special price sun.-thu.";
 

     $language['lv']['product'] = "produkti";
     $language['en']['product'] = "products";
     $language['ru']['product'] = "продукты";

    //  Sūtīšanas Forma
    // LV
    $language['lv']['form_top'] = 'Lai pieteiktos uz kādu no mūsu pakalpojumu - vienkārši aizpildiet zemāk redzamo veidlapu, noklikšķiniet uz Sūtīt un drīz administrātors ar jums sazināsies, lai apstiprinātu rezervāciju.';
    -
    $language['lv']['form0'] = 'Izvēlieties adresi';
    // $language['lv']['form0_1'] = 'Atzīmējiet pieteikšanās adresi andresi';

    $language['lv']['check-e'] = 'Pārbaudiet Jūsu e-pastu';
    $language['lv']['from'] = 'No:';
    $language['lv']['client'] = 'Klients';


    $language['lv']['form1'] = 'Vārds';
    $language['lv']['form1_1'] = 'Pilns vārds';
    $language['lv']['form1_e1'] = 'Vārds ir par īsu';
    $language['lv']['form1_e2'] = 'Tikai alfabēts.';
    -
    $language['lv']['form2'] = 'Telefona numurs';
    $language['lv']['form2_1'] = 'Kontakt numurs';
    $language['lv']['form2_e1'] = 'Tikai cipari!';
    $language['lv']['form2_e2'] = 'Pārāk īss telefons!';
    -
    $language['lv']['form3'] = 'e-pasts';
    $language['lv']['form3_1'] = 'Jūsu e-pasts';
    $language['lv']['form3_e1'] = 'Lūdzu, ievadiet e-pastu!';
    -
    $language['lv']['form4'] = 'Servisa nosaukums';
    // $language['lv']['form4_1'] = 'Datums';
    $language['lv']['form4_e1'] = 'Stila veids ir tukšs. Lūdzu, ievadiet stila veidu!';
    -
    $language['lv']['form5'] = 'Datums';
    $language['lv']['form5_1'] = 'Izvēlaties datumu';
    $language['lv']['form5_e1'] = 'Lūdzu, ievadiet datumu!';
    -
    $language['lv']['form6'] = 'Detaļas';
    $language['lv']['form6_1'] = 'Lūdzu uzrakstiet pēc iespējas vairā informācijas';
    -
    $language['lv']['form8'] = 'Aizsūtīt pieteikumu';

    //RUS
    $language['ru']['check-e'] = 'Pārbaudiet Jūsu e-pastu';
    $language['ru']['from'] = 'Oт:';
    $language['ru']['client'] = 'Kлиент';

    $language['ru']['form_top'] = 'Чтобы записаться на встречу на один из наших сервисов, просто заполните форму ниже, нажмите «Отправить», и администратор свяжется с вами, чтобы подтвердить ваше бронирование.';
    -
    $language['ru']['form0'] = 'Выберите адрес';
    // $language['ru']['form0_1'] = 'Место пусто. Пожалуйста, введите место. ';
    -
    $language['ru']['form1'] = 'Имя';
    $language['ru']['form1_1'] = 'Полное имя';
    $language['ru']['form1_e1'] = 'Имя слишком короткое.';
    $language['ru']['form1_e2'] = 'Только алфавит.';
    -
    $language['ru']['form2'] = 'Номер телефона';
    $language['ru']['form2_1'] = 'контактный номер';
    $language['ru']['form2_e1'] = 'Только цифры! ';
    $language['ru']['form2_e2'] = 'Телефон слишком короткий!';
    -
    $language['ru']['form4_1'] = 'Дата';
    $language['ru']['form3'] = 'электронная почта';
    $language['ru']['form3_1'] = 'Ваша электронная почта';
    $language['ru']['form3_e1'] = 'Пожалуйста, введите адрес электронной почты!';
    -
    $language['ru']['form4'] = 'Тип стиля';
    $language['ru']['form4_e1'] = 'Тип стиля пуст. Введите тип стиля!';
    -
    $language['ru']['form5'] = 'Дата';
    $language['ru']['form5_1'] = 'Выберите дату';
    $language['ru']['form5_e1'] = 'Введите дату!';
    -
    $language['ru']['form6'] = 'Детали';
    $language['ru']['form6_1'] = 'Пожалуйста напишите по возможности больше информации';
    -
    $language['ru']['form8'] = 'Отправить заявку';

    // ENG
    $language['en']['check-e'] = 'Check your e-mail';
    $language['en']['from'] = 'From:';
    $language['en']['client'] = 'The Client';
  

    $language['en']['form_top'] = 'To request an appointment for a one of our service - simply fill in the form below, click send and administrator will be in touch shortly to confirm your booking.';
    -
    $language['en']['form0'] = 'Choose adress';
    // $language['en']['form0_1'] = 'Atzīmējiet pieteikšanās adresi andresi';
    -
    $language['en']['form1'] = 'Name';
    $language['en']['form1_1'] = 'Your full name';
    $language['en']['form1_e1'] = 'Name too short.';
    $language['en']['form1_e2'] = 'Only alphabet.';
    -
    $language['en']['form2'] = 'Phone';
    $language['en']['form2_1'] = 'Contact number';
    $language['en']['form2_e1'] = 'Only numbers!';
    $language['en']['form2_e2'] = 'Phone too short!';
    -
    $language['en']['form3'] = 'E-mail';
    $language['en']['form3_1'] = 'Your email';
    $language['en']['form3_e1'] = 'Please enter email!';
    $language['en']['form4_1'] = 'Date';
    -
    $language['en']['form4'] = 'Type of service';
    $language['en']['form4_e1'] = 'Type of style is empty. Please enter type of style!';
    -
    $language['en']['form5'] = 'Date';
    $language['en']['form5_1'] = 'Pick your date';
    $language['en']['form5_e1'] = 'Please enter Date!';
    -
    $language['en']['form6'] = 'Details';
    $language['en']['form6_1'] = 'Please give us as much details as possible!';
    -
    $language['en']['form8'] = 'Send appointment';


    $language['lv']['bookanpoint'] = 'Send appointment';
    $language['ru']['bookanpoint'] = 'Send appointment';
    $language['en']['bookanpoint'] = 'Send appointment';



    // LIFE STYLE

    $language['en']['lfs'] = 'Lifestyle';
    $language['lv']['lfs'] = 'DZĪVES STILS';
    $language['ru']['lfs'] = 'СТИЛЬ ЖИЗНИ';



        //1
        $language['lv']['title1'] = "Sis ir pirmais virsraksts";
        $language['en']['title1'] = "This is first title";
        $language['ru']['title1'] = "Eto pervij ";
        $language['lv']['article1'] = "Sis ir pirmais Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.";
        $language['en']['article1'] = "This is first Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.";
        $language['ru']['article1'] = "Eto pervij Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.";
        //2
        $language['lv']['title1'] = "Sis ir otrais virsraksts";
        $language['en']['title1'] = "This is second title";
        $language['ru']['title1'] = "Eto taroj ";
        $language['lv']['article1'] = "Sis ir otrais Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.";
        $language['en']['article1'] = "This is second Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.";
        $language['ru']['article1'] = "Eto tarjo Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.";
        //3
        $language['lv']['title1'] = "Sis ir tresais virsraksts";
        $language['en']['title1'] = "This is third title";
        $language['ru']['title1'] = "Eto tekjij ";
        $language['lv']['article1'] = "Sis ir tresais Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.";
        $language['en']['article1'] = "This is third Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.";
        $language['ru']['article1'] = "Eto trekjij Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.";
        //4
        $language['lv']['title1'] = "Sis ir ceturtais virsraksts";
        $language['en']['title1'] = "This is fourth title";
        $language['ru']['title1'] = "Eto chetirij ";
        $language['lv']['article1'] = "Sis ir ceturtais Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.";
        $language['en']['article1'] = "This is fourth Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.";
        $language['ru']['article1'] = "Eto chetirij Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.";
        //5
        $language['lv']['title1'] = "Sis ir piektais virsraksts";
        $language['en']['title1'] = "This is fift title";
        $language['ru']['title1'] = "Eto pjetij ";
        $language['lv']['article1'] = "Sis ir piektais Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.";
        $language['en']['article1'] = "This is fift Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.";
        $language['ru']['article1'] = "Eto pjetij Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.";
        //6
        $language['lv']['title1'] = "Sis ir sestais virsraksts";
        $language['en']['title1'] = "This is sixth title";
        $language['ru']['title1'] = "Eto sesht ";
        $language['lv']['article1'] = "Sis ir sestais Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.";
        $language['en']['article1'] = "This is sixth Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.";
        $language['ru']['article1'] = "Eto sesht Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.";
    

//  Wall Of FAme

        $language['lv']['copy_right'] = 'Autortiesības 2017. Visas tiesības aizsargātas';
        $language['en']['copy_right'] = 'Copyright 2017. All rights reserved';
        $language['ru']['copy_right'] = 'Авторские права 2017. Все права защищены';


// E-Mail Stuff
// CONTACT



        


 

	$language['lv']['wof'] = 'WALL OF FAME';
    	$language['en']['wof'] = 'WALL OF FAME';
    	$language['ru']['wof'] = 'WALL OF FAME';

?>

<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

	<?php

	/*
	 * If a regular post or page, and not the front page, show the featured image.
	 * Using get_queried_object_id() here since the $post global may not be set before a call to the_post().
	 */
	if ( ( is_single() || ( is_page() && ! twentyseventeen_is_frontpage() ) ) && has_post_thumbnail( get_queried_object_id() ) ) :
		echo '<div class="single-featured-image-header">';
		echo get_the_post_thumbnail( get_queried_object_id(), 'twentyseventeen-featured-image' );
		echo '</div><!-- .single-featured-image-header -->';
	endif;
	?>
	
	
<link rel="stylesheet" type="text/css" href="style/header.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="text/javascript" src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600&amp;subset=cyrillic-ext" rel="stylesheet">

<div class="header">
<div id="information">
	<div class="information">
		<ul>
			<li><a href="<?php echo $language[$lang]['franchise_'] ?>" open="<?php echo $language[$lang]['franchise_'] ?>" target="_blank"><?php echo $language[$lang]['franch.'] ?></a></li>
			<li class="border"></li>
			<li><a href="http://testlumberjack.tk/contacts.php"><img src="<?php echo home_url(); ?>/img/call.png" width="1%"></a></li>
			<li class="border"></li>
			<li><a href="http://testlumberjack.tk/shop/shop"><img src="<?php echo home_url(); ?>/img/bag.png" width="0.8%"></a></li>
			<li class="border"></li>
			<li><a href="?lang=lv">LV</a></li>
			<li><a href="?lang=en">EN</a></li>
			<li><a href="?lang=ru">RU</a></li>
			
		</ul>
	</div>
</div>
			

<div id="logo">
	<a href="http://testlumberjack.tk/index.php"><img src="<?php echo home_url(); ?>/img/logo.png"></a>
</div>

<div class="menu"><a id="toggler" href="#"><img src="<?php echo home_url(); ?>/img/menu.png"></a></div>
<div id="box" style="display: none;">
	<a id="toggler_close" style="display:none" href="#"><div class="close"><img src="<?php echo home_url(); ?>/img/close.png"></div></a>
    <div>
        <ul class="box_li">
			<li><a href="http://testlumberjack.tk/index.php">HOME</a></li>
			<li><a href="http://testlumberjack.tk/our_story.php"><?php echo $language[$lang]['our_story'] ?></a></li>
			<li><a href="http://testlumberjack.tk/shop/shop"><?php echo $language[$lang]['online_store'] ?></a></li>
			<li><a href="http://testlumberjack.tk/barbershop.php"><?php echo $language[$lang]['our_barber'] ?></a></li>
			<li><a href="http://testlumberjack.tk/haircuts.php"><?php echo $language[$lang]['haircuts'] ?></a></li>
			<li><a href="http://testlumberjack.tk/lumberjack/lifestyle.php"><?php echo $language[$lang]['lfs'] ?></a></li>
			<li><a href="http://testlumberjack.tk/wall_of_fame.php"><?php echo $language[$lang]['wof'] ?></a></li>
			<li><a href="http://testlumberjack.tk/price_list.php"><?php echo $language[$lang]['price_list'] ?></a></li>
			<li><a href="http://testlumberjack.tk/contacts.php"><?php echo $language[$lang]['contact_us'] ?></a></li>
        </ul>
    </div>
	<div class="information">
			<p><?php echo $language[$lang]['franch.'] ?></p>
		<ul>
			<li><a href="#"><img src="<?php echo home_url(); ?>/img/call_brown.png" width="20px" style="padding-right:5px"></a></li>
			<li class="border"></li>
			<li><a href="#"><img src="<?php echo home_url(); ?>/img/bag_brown.png" width="22px" style="padding-right:5px; padding-left:5px"></a></li>
			<li class="border"></li>
			<li><a style="padding-left:5px">lv</a></li>
		</ul>
	</div>
</div>
		<script>
			$(document).ready(function(){
				$("#toggler").click(function () {
					$("#box").css("display","block");
					$("#toggler_close").css("display","block");
					$("#logo").css("position","fixed");
					$("#logo").css("z-index","10");
					$("#logo").css("width","100%");
			});
			$("#toggler_close").click(function () {
					$("#box").css("display","none");
					$("#toggler_close").css("display","none");
					$("#logo").css("position","relative");
					$("#logo").css("z-index","inherit");
					$("#logo").css("width","inherit");
			});
			});
		</script>		

<div id="navigation">
	<div class="navigation">
			<ul>
				<li><a><img src="<?php echo home_url(); ?>/img/radio.png" class="radio"></a></li>
				
				<li class="link"><a href="http://testlumberjack.tk/our_story.php"><?php echo $language[$lang]['our_story'] ?></a></li>

				<li><a><img src="<?php echo home_url(); ?>/img/vector.png"></a></li>
				<li class="link"><a href="http://testlumberjack.tk/barbershop.php"><?php echo $language[$lang]['our_barber'] ?></a></li>

				<li><a><img src="<?php echo home_url(); ?>/img/vector.png"></a></li>
				<li class="link"><a href="http://testlumberjack.tk/shop/shop"><?php echo $language[$lang]['online_store'] ?></a></li>

				<li><a><img src="<?php echo home_url(); ?>/img/vector.png"></a></li>
				<li class="link"><a href="http://testlumberjack.tk/haircuts.php"><?php echo $language[$lang]['haircuts'] ?></a></li>

				<li><a><img src="<?php echo home_url(); ?>/img/vector.png"></a></li>
				<li class="link"><a href="http://testlumberjack.tk/lifestyle.php"><?php echo $language[$lang]['lfs'] ?></a></li>
				
				<li><a><img src="<?php echo home_url(); ?>/img/vector.png"></a></li>
				<li class="link"><a href="http://testlumberjack.tk/wall_of_fame.php"><?php echo $language[$lang]['wof'] ?></a></li>
								
				<li><a><img src="<?php echo home_url(); ?>/img/vector.png"></a></li>
				<li class="link"><a href="http://testlumberjack.tk/price_list.php"><?php echo $language[$lang]['price_list'] ?></a></li>

				<li><a><img src="<?php echo home_url(); ?>/img/vector.png"></a></li>
				<li class="link"><a href="http://testlumberjack.tk/contacts.php"><?php echo $language[$lang]['contact_us'] ?></a></li>
			</ul>
	</div>
</div>
</div>

<style>
.header{height: 14.2vw; font-family: "Open Sans", sans-serif;}
ul, li{
	margin: 0;
	padding: 0;
}
a{
	text-decoration: none;
	color:inherit;
	font-weight: 500;
	margin: 0;
}
.information a{
	cursor: pointer;
}
#information{
	height: auto;
}
#information ul, li{
	padding: 0.3vw 0 0.3vw 0;
}
#navigation ul, li{
	padding: 0.5vw 0 0.5vw 0;
}
.information{
	position: relative;
	text-align: right;
    color: #1f0c06;
    font-size: 0.9vw;
    padding-right: 10vw;
	text-transform: uppercase;
}
.information li{
	display: inline;
	list-style: none;
	margin-right: 4px;
}
.border{
	border-right-color: #e0bf95;
    border-right-style: solid;
    border-right-width: 2px;
	padding: 0;
}
#logo{
	background-color: #1f0c06;
	height: 10vw;
	text-align: center;	
}
#logo img{
	width: 14%;
	position: relative;
    top: 1.5vw;
}
#navigation{
	height: auto;
}
.navigation{
	position: relative;
	text-align: center;
    color: #1f0c06;
    font-size: 1vw;
	text-transform: uppercase;
}
.navigation li{
	display: inline;
	list-style: none;
    padding-right: 0.5vw;
    padding-left: 0.5vw;
}
.radio{
    width: 2%;
    position: absolute;
    top: 0.1vw;
    left: 3vw;
}
.link:hover{
	background-color: rgb(189, 148, 86);
	color: white !important;
}

@media screen and (min-width: 1500px){
.navigation {
    font-size: 0.75vw;
}
.radio {
    width: 1.7vw;
}
.header{height: 13.8vw;}
}

.menu,
.close,
.box_li,
#box
{
	display: none;
}
@media screen and (max-width: 900px){
.header{height: unset;}
#information,
#navigation
{
	display: none;
}
#logo {
    height: 120px;
}
#logo img {
    width: 155px;
    top: 20px;
}
.menu {
    display: block;
    position: fixed;
    top: 35px;
    right: 15px;
    z-index: 1;
}
.menu img{
	width: 45px;
}
.close {
	display: block;
    position: absolute;
    width: 60px;
    z-index: 2;
    top: -90px;
    right: 0px;
    background-color: rgba(31, 12, 6, 0.9);
}
.close img{
	width: 45px;
}
#box{
	position: fixed;
    width: 100%;
    height: 140vw;
    background-color: rgba(31, 12, 6, 0.9);
    right: 0;
    padding: 30px;
    box-sizing: border-box;
    z-index: 100;
    top: 0;
    margin-top: 120px;
}
.box_li ul, li{list-style: none;}
.box_li{
	display: block;
    font-size: 5vw;
    font-family: "Roboto", sans-serif;
    color: rgba(203, 148, 78, 0.6);
    line-height: 9vw;
    text-align: center;
    padding-top: 0;
}
.box_li a{
	font-weight: bold;
}
.box_li a:hover{
	color: rgba(203, 148, 78, 1);
}
.information {
	padding-top: 5vw;
    text-align: center;
    font-size: 4vw;
    padding-right: 0;
    text-transform: uppercase;
    color: rgba(203, 148, 78, 1);
    letter-spacing: 0.5vw;
    font-stretch: condensed;
}

}
</style>

<div id="banner" style=" background-image: url(<?php echo home_url(); ?>/img/background_shop.jpg);">
	<div class="caption" style=" background-image: url(<?php echo home_url(); ?>/img/frame2.png);">
		<h1><!--<img src="<?php echo home_url(); ?>/img/vector_white.png">--><?php echo $language[$lang]['online_store'] ?><!--<img src="<?php echo home_url(); ?>/img/vector_white.png">--></h1>
	</div>
</div>

<style>
#banner {
    height: 35vw;
    background-size: cover;
    background-repeat: no-repeat;
    position: relative;
	
	justify-content: center;
    align-items: center;
	display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
}
.caption {
	z-index: 2;
    text-align: center;
    position: relative;
    background-size: 100% 100%;
    background-repeat: no-repeat;
    height: 6vw;
    width: auto;
    align-items: center;
	display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
}
.caption h1 {
    color: white;
    text-transform: uppercase;
	letter-spacing: 0.6vw !important;
	letter-height: unset !important;
	
	font-size: 3.4vw;
    margin: 0;
    font-family: "OpenSans", sans-serif;
    font-weight: bold;
    line-height: 0.8;
    text-align: center;
	text-shadow: 3px 1px 5px black;
	padding-left: 2.5vw;
    padding-right: 2vw;
}
.caption h1 img{
	margin: 1.2vw;
	width: 2%;
}
@media screen and (max-width: 900px){
#banner {
    height: 110vw;
    background-position: 50%;
}
.header{height: 120px;}
.caption h1 {
	font-size: 9vw;
    letter-spacing: 1vw;
    padding-bottom: 2vw;
    line-height: 9vw;
    padding-left: 11vw;
    padding-right: 10vw;
    padding-top: 1vw;
	padding-top: 4vw;
    padding-bottom: 4vw;
}
.caption {
    position: relative;
    top: 15vw;
    height: auto;
}
.caption img{display:none;}
.single-featured-image-header {
    top: 120px;
    height: 110vw;
}
.single-featured-image-header img {
	padding-top: 30px;
    width: 80%;
}
.checkout-button {
    margin-bottom: 5vw;
}
.products {
    display: block;
}
.products li {
    padding: 1vw;
    width: 100%;
}
.products img {
    height: 50vw !important;
    width: 50vw !important;
}
.woocommerce-loop-product__title {
    height: 26vw;
    font-size: 6vw;
    line-height: unset !important;
}
ul.products li.product .button {
    padding: 1.3vw;
    font-size: 3vw;
}
.single-featured-image-header img {
    display: block;
    margin: unset;
    width: unset;
    margin-top: unset;
    height: unset;
    margin-left: unset;
}
.summary, .entry-summary {
    display: block;
    position: relative;
    margin-top: unset;
    z-index: 3;
    margin-left: unset;
}

}
</style>