<?php
    session_start();
    $language = [];
    $language['lv'] = [];
    $language['en'] = [];
    $language['ru'] = [];

    if(isset($_GET['lang'])){
        $lang = $_GET['lang'];
        $_SESSION['lang'] = $lang;
    }else{
        if(!isset($_SESSION['lang'])){
            $lang = 'en';
            $_SESSION['lang'] = $lang;
        }else{
            $lang = $_SESSION['lang'];
        }
    }

    // check user first time visit
    if(!isset($_SESSION['firstTime'])) {
        $_SESSION['firstTime'] = 1;
    } else {
        $_SESSION['firstTime'] = 0;
    }

    // do some action, when submited country
    if(isset($_POST['changeCountry'])) {
        $_SESSION['country'] = $_POST['country'];
        $lang = $_POST['country'] == 'ee' ? 'en' : $_POST['country'];
        $_SESSION['lang'] = $lang;
    }

    $SiteUrl = 'http://lumberjackbarbershop.com';

	// GIFT CARD

	$language['lv']['gift_card'] = 'Nopirkt karti';
	$language['en']['gift_card'] = 'Buy card';
	$language['ru']['gift_card'] = 'Купить карту';	
	
	$language['lv']['gift_franc'] = 'Nopirkt franšīzi';
	$language['en']['gift_franc'] = 'Buy franchise';
	$language['ru']['gift_franc'] = 'Купить франшизу';

	// FRANCHISE

	$language['lv']['franchise_'] = 'downloads/lumberjack_barbershop_franchise_en.pdf';
	$language['en']['franchise_'] = 'downloads/lumberjack_barbershop_franchise_en.pdf';
	$language['ru']['franchise_'] = 'downloads/lumberjack_barbershop_franchise_ru.pdf';

    // INDEX

    $language['lv']['longtext'] = "'It is not simply a haircut<br> – it is the philosophy of masculinity.','We will emphasize the male character<br> and the mood of a growing and an already held gentleman with irreproachable professionalism.','We believe that representatives of the stronger sex have rights to rely on a verified and top-quality personal care.','Lumberjack Barber- shop – remind yourself how cool it is to be a man!'";
    $language['en']['longtext'] = "'It is not simply a haircut<br> – it is the philosophy of masculinity.','We will emphasize the male character<br> and the mood of a growing and an already held gentleman with irreproachable professionalism.','We believe that representatives of the stronger sex have rights to rely on a verified and top-quality personal care.','Lumberjack Barber- shop – remind yourself how cool it is to be a man!'";
    $language['ru']['longtext'] = "'It is not simply a haircut<br> – it is the philosophy of masculinity.','We will emphasize the male character<br> and the mood of a growing and an already held gentleman with irreproachable professionalism.','We believe that representatives of the stronger sex have rights to rely on a verified and top-quality personal care.','Lumberjack Barber- shop – remind yourself how cool it is to be a man!'";

    $language['lv']['madelv_text'] = 'Visi mūsu produkti ir rūpīgi izstrādāti Anglijā kopš 1805. gada, un tie vislabāk iemieso britu mantojuma būtību. Mūsu īpašā augsti kvalificētu speciālistu, ķīmiķu, dizaineru un amatnieku komanda nepārtraukti strādā, lai piegādātu mūsu šodien pazīstamos produktus par viņu atšķirīgām inovācijām un izcilām tradīcijām. Anglijā turpināsies mūsu ikonu klāsts, jo mēs pastāvīgi cenšamies radīt jaunus un aizraujošus produktus, iegaumējot uz mūsu klientu vēlmēm.';
    $language['lv']['readmore'] = 'lasīt tālāk';

    $language['en']['madelv_text'] = 'All our products have been carefully crafted in England since 1805 and they embody the essence of the British heritage at its best. Our dedicated team of highly skilled professionals, chemists, designers and craftsmen work tirelessly to deliver our products known today for their distinctive tradition of innovation and excellence. Our iconic ranges will continue to be produced in England as we constantly endeavour to bring new and exciting products in response to our customer’s needs.';
    $language['en']['readmore'] = 'read more';

    $language['ru']['madelv_text'] = 'Все наши продукты были тщательно обработаны в Англии с 1805 года, и они воплощают в себе суть британского наследия. Наша целеустремленная команда высококвалифицированных специалистов, химиков, дизайнеров и мастеров неустанно работает над нашими продуктами, известными сегодня благодаря своей уникальной традиции инноваций и превосходства. Наши знаковые диапазоны будут по-прежнему выпускаться в Англии, поскольку мы постоянно стремимся принести новые и захватывающие продукты в ответ на потребности наших клиентов.';
    $language['ru']['readmore'] = 'читать дальше';

// [[[[-----]]]]

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

    // HEADER
    $language['lv']['franch.'] = 'FRANŠĪZE';
    $language['en']['franch.'] = 'FRANCHISE';
    $language['ru']['franch.'] = 'ФРАНШИЗА';

	// BUTTON
    $language['lv']['click'] = '<img src="img/lv.png">';
    $language['en']['click'] = '<img src="img/en.png">';
    $language['ru']['click'] = '<img src="img/ru.png">';

    // LV
    $language['lv']['home'] = 'SĀKUMS';
    $language['lv']['our_story'] = 'MŪSU VĒSTURE';
    $language['lv']['our_barber'] = 'MŪSU BARBERŠOPI';
    $language['lv']['online_store'] = 'E-SHOP';
    $language['lv']['haircuts'] = 'MATU GRIEZUMI';
    $language['lv']['price_list'] = 'CENAS';
    $language['lv']['contact_us'] = 'SAZINĀTIES AR MUMS';

    // RU
    $language['ru']['home'] = 'ГЛАВНАЯ';
    $language['ru']['our_story'] = 'НАША ИСТОРИЯ';
    $language['ru']['our_barber'] = 'НАШИ БАРБЕРШОПЫ';
    $language['ru']['online_store'] = 'E-SHOP';
    $language['ru']['haircuts'] = 'СТРИЖКИ';
    $language['ru']['price_list'] = 'ЦЕНЫ';
    $language['ru']['contact_us'] = 'СВЯЖИТЕСЬ С НАМИ';

    // EN
    $language['en']['home'] = 'HOME';
    $language['en']['our_story'] = 'OUR STORY';
    $language['en']['our_barber'] = 'OUR BARBERSHOPS';
    $language['en']['online_store'] = 'E-SHOP';
    $language['en']['haircuts'] = 'HAIRCUTS';
    $language['en']['price_list'] = 'PRICE LIST ';
    $language['en']['contact_us'] = 'CONTACT US ';

    // OURSTORY
    $language['lv']['great'] = 'PRICE LIST ';
    $language['lv']['from'] = 'С 1990';

    $language['en']['great'] = 'GREATNESS';
    $language['en']['from'] = 'Since 1990';

    $language['ru']['great'] = 'ВЕЛИЧИЕ';
    $language['ru']['from'] = 'Kopš 1990';

    // LV
    $language['lv']['Lumberjack_development'] = 'Lumberjack attīstība  – spilgti momenti, nozīmīgi datumi';
    $language['lv']['our_barber2'] = 'Tirgū no: 01.06.2015 <br> Tirgus – Latvija, Igaunija, Krievija';

    $language['lv']['that00'] = 'Atvērts kopš';
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
    $language['ru']['our_barber2'] = 'На рынке с: 01.06.2015 <br> Рынок – Латвия, Эстония, Россия';

    $language['ru']['that00'] = 'Открыты с';
    $language['ru']['that1'] = 'Представители большого спорта выбирают Lumberjack Barbershop';
    $language['ru']['that2'] = 'Среди них Эдгарс Гаурачс и Каспарс Камбала тоже выбирают Lumberjack Barbershop (вот над этим предложением нужно подумать, звучит как-то коряво)';
    $language['ru']['that3'] = 'Первое участие в движении MOVEMBER совместно с хоккейным клубом Dinamo Rīga';

    $language['ru']['that4'] = 'Открытие второго барбершопа в Риге';
    $language['ru']['that5'] = 'Все больше и больше латвийских спортсменов и знаменитостей выбирают Lumberjack Barbershop';
    $language['ru']['that6'] = 'В рамках турнира КХЛ стали официальным партнером хоккейного клуба Dinamo Rīga';

    $language['ru']['that7'] = 'Для подготовки к концерту группа De-Phazz выбирает Lumberjack Barbershop';
    $language['ru']['that8'] = 'Павел Воля, резидент Comedy Club, выбирает Lumberjack Barbershop';

    $language['ru']['that9'] = 'Открытие барбершопа в Таллине';
    $language['ru']['that10'] = 'Открытие нового барбершопа в гостинице премиум-класса Pullman';
    $language['ru']['that11'] = 'В сотрудничестве с гостиницей Pullman, участие в мероприятии Gumball 3000, специальный гость - CeeLo Green';

    // en
    $language['en']['Lumberjack_development'] = 'Chronology of the development of Lumberjack Barbershop - bright moments by dates and years ';
    $language['en']['our_barber2'] = 'Date of foundation -  01.06.2015 <br> The market - Latvia, Estonia, Russia';

    $language['en']['that00'] = 'Since';
    $language['en']['that1'] = 'Professional sports representatives choose';
    $language['en']['that2'] = 'Among them Edgars Gaurachs and Kaspars Kambala also choose Lumberjack Barbershop';
    $language['en']['that3'] = 'The first participation in the movement MOVEMENT together with the hockey club Dinamo Riga ';

    $language['en']['that4'] = 'Opening of the second barbershop in Riga';
    $language['en']['that5'] = 'More and more Latvian athletes and celebrities choose Lumberjack Barbershop';
    $language['en']['that6'] = 'As a part of KHL tournament, Lumberjack barbershop became the official parter of the Dinamo Riga hockey club';

    $language['en']['that7'] = 'De-Phazz chooses Lumberjack Barbershop to prepare for the concert';
    $language['en']['that8'] = 'Pavel Volya, the resident of the Comedy Club Russia, chooses Lumberjack Barbershop too';
    $language['en']['that9'] = 'Opening of a barbershop in Tallinn';
    $language['en']['that10'] = 'Opening of a new barbershop in a premium Pullman hotel';
    $language['en']['that11'] = 'In cooperation with the Pullman hotel participated in the Gumball 3000 event. Special guest - CeeLo Green';

	$language['en']['that12'] = 'Lumberjack barbershop branch opening in St. Petersburg';
	$language['lv']['that12'] = 'Barbershop atvēršana St. Peterburgā';
	$language['ru']['that12'] = 'Открытие нового барбершопа в Санкт-Петербурге';

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
    $language['lv']['lt'] = "LIETUVA";

    $language['ru']['lv'] = "ЛАТВИЯ";
    $language['ru']['est'] = "ЭСТОНИЯ";
    $language['ru']['russ'] = "РОССИЯ";
    $language['ru']['lt'] = "ЛИТВА";

    $language['en']['lv'] = "LATVIA";
    $language['en']['est'] = "ESTONIA";
    $language['en']['russ'] = "RUSSIA";
    $language['en']['lt'] = "LITHUANIA";

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
    $language['lv']['em'] = "E-pasts:";
    $language['lv']['te'] = "Tel:";
    $language['lv']['op'] = "Darba laiks";
    $language['lv']['mon'] = "Pirm. - Sesd.:";
    $language['lv']['sun'] = "Svētdiena:";

    // EN
    $language['en']['adr'] = "Adress:";
    $language['en']['em'] = "E-mail:";
    $language['en']['te'] = "Tel.:";
    $language['en']['op'] = "Working time";
    $language['en']['mon'] = "Mon.- Sat.:";
    $language['en']['sun'] = "Sunday:";

    // RU
    $language['ru']['adr'] = "Адрес:";
    $language['ru']['em'] = "Электронная почта:";
    $language['ru']['te'] = "Тел.:";
    $language['ru']['op'] = "Время работы";
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
    $language['lv']['rew'] = "Atsauksmes";

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

    $language['lv']['form0'] = 'Izvēlieties adresi';
    // $language['lv']['form0_1'] = 'Atzīmējiet pieteikšanās adresi andresi';

    $language['lv']['check-e'] = 'Pārbaudiet Jūsu e-pastu';
    $language['lv']['from'] = 'No:';
    $language['lv']['client'] = 'Klients';

    $language['lv']['form1'] = 'Vārds';
    $language['lv']['form1_1'] = 'Pilns vārds';
    $language['lv']['form1_e1'] = 'Vārds ir par īsu';
    $language['lv']['form1_e2'] = 'Tikai alfabēts.';

    $language['lv']['form2'] = 'Telefona numurs';
    $language['lv']['form2_1'] = 'Kontakt numurs';
    $language['lv']['form2_e1'] = 'Tikai cipari!';
    $language['lv']['form2_e2'] = 'Pārāk īss telefons!';

    $language['lv']['form3'] = 'e-pasts';
    $language['lv']['form3_1'] = 'Jūsu e-pasts';
    $language['lv']['form3_e1'] = 'Lūdzu, ievadiet e-pastu!';

    $language['lv']['form4'] = 'Servisa nosaukums';
    // $language['lv']['form4_1'] = 'Datums';
    $language['lv']['form4_e1'] = 'Stila veids ir tukšs. Lūdzu, ievadiet stila veidu!';

    $language['lv']['form5'] = 'Datums';
    $language['lv']['form5_1'] = 'Izvēlaties datumu';
    $language['lv']['form5_e1'] = 'Lūdzu, ievadiet datumu!';

    $language['lv']['form6'] = 'Detaļas';
    $language['lv']['form6_1'] = 'Lūdzu uzrakstiet pēc iespējas vairā informācijas';

    $language['lv']['form8'] = 'Aizsūtīt pieteikumu';

    //RUS
    $language['ru']['check-e'] = 'Pārbaudiet Jūsu e-pastu';
    $language['ru']['from'] = 'Oт:';
    $language['ru']['client'] = 'Kлиент';

    $language['ru']['form_top'] = 'Чтобы записаться на встречу на один из наших сервисов, просто заполните форму ниже, нажмите «Отправить», и администратор свяжется с вами, чтобы подтвердить ваше бронирование.';

    $language['ru']['form0'] = 'Выберите адрес';
    // $language['ru']['form0_1'] = 'Место пусто. Пожалуйста, введите место. ';

    $language['ru']['form1'] = 'Имя';
    $language['ru']['form1_1'] = 'Полное имя';
    $language['ru']['form1_e1'] = 'Имя слишком короткое.';
    $language['ru']['form1_e2'] = 'Только алфавит.';

    $language['ru']['form2'] = 'Номер телефона';
    $language['ru']['form2_1'] = 'контактный номер';
    $language['ru']['form2_e1'] = 'Только цифры! ';
    $language['ru']['form2_e2'] = 'Телефон слишком короткий!';

    $language['ru']['form4_1'] = 'Дата';
    $language['ru']['form3'] = 'электронная почта';
    $language['ru']['form3_1'] = 'Ваша электронная почта';
    $language['ru']['form3_e1'] = 'Пожалуйста, введите адрес электронной почты!';

    $language['ru']['form4'] = 'Тип стиля';
    $language['ru']['form4_e1'] = 'Тип стиля пуст. Введите тип стиля!';

    $language['ru']['form5'] = 'Дата';
    $language['ru']['form5_1'] = 'Выберите дату';
    $language['ru']['form5_e1'] = 'Введите дату!';

    $language['ru']['form6'] = 'Детали';
    $language['ru']['form6_1'] = 'Пожалуйста напишите по возможности больше информации';

    $language['ru']['form8'] = 'Отправить заявку';

    // ENG
    $language['en']['check-e'] = 'Check your e-mail';
    $language['en']['from'] = 'From:';
    $language['en']['client'] = 'The Client';


    $language['en']['form_top'] = 'To request an appointment for a one of our service - simply fill in the form below, click send and administrator will be in touch shortly to confirm your booking.';

    $language['en']['form0'] = 'Choose adress';
    // $language['en']['form0_1'] = 'Atzīmējiet pieteikšanās adresi andresi';

    $language['en']['form1'] = 'Name';
    $language['en']['form1_1'] = 'Your full name';
    $language['en']['form1_e1'] = 'Name too short.';
    $language['en']['form1_e2'] = 'Only alphabet.';

    $language['en']['form2'] = 'Phone';
    $language['en']['form2_1'] = 'Contact number';
    $language['en']['form2_e1'] = 'Only numbers!';
    $language['en']['form2_e2'] = 'Phone too short!';

    $language['en']['form3'] = 'E-mail';
    $language['en']['form3_1'] = 'Your email';
    $language['en']['form3_e1'] = 'Please enter email!';
    $language['en']['form4_1'] = 'Date';

    $language['en']['form4'] = 'Type of service';
    $language['en']['form4_e1'] = 'Type of style is empty. Please enter type of style!';

    $language['en']['form5'] = 'Date';
    $language['en']['form5_1'] = 'Pick your date';
    $language['en']['form5_e1'] = 'Please enter Date!';

    $language['en']['form6'] = 'Details';
    $language['en']['form6_1'] = 'Please give us as much details as possible!';

    $language['en']['form8'] = 'Send appointment';


    $language['lv']['bookanpoint'] = 'Send appointment';
    $language['ru']['bookanpoint'] = 'Send appointment';
    $language['en']['bookanpoint'] = 'Send appointment';

    // LIFE STYLE

    $language['en']['lfs'] = 'Lumberjack LIVE';
    $language['lv']['lfs'] = 'Lumberjack LIVE';
    $language['ru']['lfs'] = 'Lumberjack LIVE';

    //1
    $language['lv']['title1'] = "Lorem ipsum dolor";
    $language['en']['title1'] = "Lorem ipsum dolor";
    $language['ru']['title1'] = "Lorem ipsum dolor";
    $language['lv']['article1'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.";
    $language['en']['article1'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.";
    $language['ru']['article1'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.";
    //2
    $language['lv']['title2'] = "Lorem ipsum dolor";
    $language['en']['title2'] = "Lorem ipsum dolor";
    $language['ru']['title2'] = "Lorem ipsum dolor ";
    $language['lv']['article2'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.";
    $language['en']['article2'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.";
    $language['ru']['article2'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.";
    //3
    $language['lv']['title3'] = "Lorem ipsum dolor";
    $language['en']['title3'] = "Lorem ipsum dolor";
    $language['ru']['title3'] = "Lorem ipsum dolor";
    $language['lv']['article3'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.";
    $language['en']['article3'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.";
    $language['ru']['article3'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.";
    //4
    $language['lv']['title4'] = "Lorem ipsum dolor";
    $language['en']['title4'] = "Lorem ipsum dolor";
    $language['ru']['title4'] = "Lorem ipsum dolor";
    $language['lv']['article4'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.";
    $language['en']['article4'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.";
    $language['ru']['article4'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.";
    //5
    $language['lv']['title5'] = "Lorem ipsum dolor";
    $language['en']['title5'] = "Lorem ipsum dolor";
    $language['ru']['title5'] = "Lorem ipsum dolor";
    $language['lv']['article5'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.";
    $language['en']['article5'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.";
    $language['ru']['article5'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.";
    //6
    $language['lv']['title6'] = "Lorem ipsum dolor";
    $language['en']['title6'] = "Lorem ipsum dolor";
    $language['ru']['title6'] = "Lorem ipsum dolor";
    $language['lv']['article6'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.";
    $language['en']['article6'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.";
    $language['ru']['article6'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.";

//  Wall Of FAme
    $language['lv']['copy_right'] = 'Autortiesības 2017. Visas tiesības aizsargātas';
    $language['en']['copy_right'] = 'Copyright 2017. All rights reserved';
    $language['ru']['copy_right'] = 'Авторские права 2017. Все права защищены';

    // FOOTER
    $language['lv']['wof'] = 'WALL OF FAME';
    $language['en']['wof'] = 'WALL OF FAME';
    $language['ru']['wof'] = 'WALL OF FAME';

    // PARTNERS
    $language['lv']['partners'] = 'PARTNERI';
    $language['en']['partners'] = 'PARTNERS';
    $language['ru']['partners'] = 'ПАРТНЕРЫ';
	
	// WALL OF FAME
	$language['lv']['wall0'] = 'Zaurs Džavadovs';
    $language['en']['wall0'] = 'Zaur Dzhavadov';
    $language['ru']['wall0'] = 'Заур Джавадов';
	$language['lv']['wall0-1'] = 'Profesionālais cīnītājs';
    $language['en']['wall0-1'] = 'Professional fighter';
    $language['ru']['wall0-1'] = 'Профессиональный боец';
	
	$language['lv']['wall1'] = 'Miks Indrašis';
    $language['en']['wall1'] = 'Miks Indrašis';
    $language['ru']['wall1'] = 'Микс Индрашис';
	$language['lv']['wall1-1'] = 'Latvijas hokeists';
    $language['en']['wall1-1'] = 'Latvian hockey player';
    $language['ru']['wall1-1'] = 'Латвийский хоккеист';
	
	$language['lv']['wall2'] = 'Kaspars Gorkšs';
    $language['en']['wall2'] = 'Kaspars Gorkšs';
    $language['ru']['wall2'] = 'Каспарс Горкшс';
	$language['lv']['wall2-1'] = 'Latvija profesionālais futbolists';
    $language['en']['wall2-1'] = 'Latvian professional footballer';
    $language['ru']['wall2-1'] = 'Латвийский профессиональный футболист';
	
	$language['lv']['wall3'] = 'Aivars Šmaukstelis';
    $language['en']['wall3'] = 'Aivars Šmaukstelis';
    $language['ru']['wall3'] = 'Аиварс Шмаукстелис';
	$language['lv']['wall3-1'] = 'Spēkavīrs';
    $language['en']['wall3-1'] = 'Strongman';
    $language['ru']['wall3-1'] = 'Тяжелоатлет';
	
	$language['lv']['wall4'] = 'Pāvels Voļa';
    $language['en']['wall4'] = 'Pavel Volya';
    $language['ru']['wall4'] = 'Павел Воля';
	$language['lv']['wall4-1'] = 'Krievijas aktieris, komiķis un kinoproducents';
    $language['en']['wall4-1'] = 'Russian actor, comedian and movie producer';
    $language['ru']['wall4-1'] = 'Русский актер, комик и кинопродюссер';
	
	$language['lv']['wall5'] = 'Cee Lo Green/Gnarls Barkley';
    $language['en']['wall5'] = 'Cee Lo Green/Gnarls Barkley';
    $language['ru']['wall5'] = 'Cee Lo Green/Gnarls Barkley';
	$language['lv']['wall5-1'] = 'Amerikāņu dziedātājs, komponists un producents';
    $language['en']['wall5-1'] = 'American singer, songwriter and producer';
    $language['ru']['wall5-1'] = 'американский певец, автор песен и продюсер';
	
	$language['lv']['wall6'] = 'Karls Frīrsons';
    $language['en']['wall6'] = 'Karl Frierson';
    $language['ru']['wall6'] = 'Карл Фриерсон';
	$language['lv']['wall6-1'] = 'Grupas "De-Phazz" vokalists';
    $language['en']['wall6-1'] = '"De-Phazz" vocalist';
    $language['ru']['wall6-1'] = 'вокалист группы "De-Phazz"';
	
	$language['lv']['wall7'] = 'Piters Freudenthalers';
    $language['en']['wall7'] = 'Peter Freudenthaler';
    $language['ru']['wall7'] = 'Петер Фройденталер';
	$language['lv']['wall7-1'] = '“Fools Garden” vokalists';
    $language['en']['wall7-1'] = '“Fools Garden” vocalist';
    $language['ru']['wall7-1'] = 'вокалист группы "Fools Garden"';
	
	$language['lv']['wall8'] = 'Edgars Masaļskis';
    $language['en']['wall8'] = 'Edgars Masaļskis';
    $language['ru']['wall8'] = 'Эдгарс Масальскис';
	$language['lv']['wall8-1'] = 'Latviešu hokeists, vārtsargs';
    $language['en']['wall8-1'] = 'Latvian hockey player, goalkeeper';
    $language['ru']['wall8-1'] = 'Латвийский хоккеист, вратарь';
	
	$language['lv']['wall9'] = 'Roberto Meloni';
    $language['en']['wall9'] = 'Roberto Meloni';
    $language['ru']['wall9'] = 'Роберто Мелони';
	$language['lv']['wall9-1'] = 'dziedatājs';
    $language['en']['wall9-1'] = 'singer';
    $language['ru']['wall9-1'] = 'певец';
	
	$language['lv']['wall10'] = 'Armands Simsons';
    $language['en']['wall10'] = 'Armands Simsons';
    $language['ru']['wall10'] = 'Армандс Симсонс';
	$language['lv']['wall10-1'] = 'TV producents, pasākumu un raidījumu vadītājs';
    $language['en']['wall10-1'] = 'tv producer, event manager';
    $language['ru']['wall10-1'] = 'ТВ продюсер, ведущий';
	
	$language['lv']['wall11'] = 'Afrojack';
    $language['en']['wall11'] = 'Afrojack';
    $language['ru']['wall11'] = 'Afrojack';
	$language['lv']['wall11-1'] = 'DJ un ierakstu producents';
    $language['en']['wall11-1'] = 'DJ and record producer';
    $language['ru']['wall11-1'] = 'DJ и музыкальный продюссер';
	
	//WALL OF FAME NEW
	$language['lv']['wall-of-fame'] = 'url(img/wall-of-fame-lv.jpg)';
    $language['en']['wall-of-fame'] = 'url(img/wall-of-fame-en.jpg)';
    $language['ru']['wall-of-fame'] = 'url(img/wall-of-fame-ru.jpg)';
	
	//GIFT CARD
	$language['lv']['card'] = 'url(img/gift_card.jpg);';
    $language['en']['card'] = 'url(img/gift_card-en.jpg);';
    $language['ru']['card'] = 'url(img/gift_card-ru.jpg);';
	
?>
