<?php
/**
 * Internationalisation file for extension BiblioPlus.
 *
 * @file
 * @ingroup Extensions
 */
 
$messages = array();

/** English
 * @author Karen Eddy
 */
$messages['en'] = array(
	'biblioplus-desc' => 'Automatically retrieves citations from PubMed and the ISBN database',
	'biblioplus-doi-tooltip' => 'View or buy article from publisher',
	'biblioplus-pmid-tooltip' => 'View or buy article from publisher (if available)',
	'biblioplus-isbn-tooltip' => 'Book information at isbndb.org',
	'biblioplus-medline-abstracts' => 'All Medline abstracts:',
	'biblioplus-pubmed-abstracts' => 'All abstracts at PubMed',
	'biblioplus-hubmed-abstracts' => 'All abstracts at HubMed',
	'biblioplus-vkey-title' => 'link to bibliography database'
);

/** Message documentation (Message documentation)
 * @author Shirayuki
 */
$messages['qqq'] = array(
	'biblioplus-desc' => '{{desc|name=Biblio Plus|url=http://www.mediawiki.org/wiki/Extension:BiblioPlus}}',
	'biblioplus-doi-tooltip' => 'Message in the tooltip when hovering over a reference in the References section.',
	'biblioplus-pmid-tooltip' => 'Message in the tooltip when hovering over a reference in the References section.',
	'biblioplus-isbn-tooltip' => 'Message in the tooltip when hovering over an ISBN link in the References section.',
	'biblioplus-medline-abstracts' => '{{doc-important|Do not translate <code>Medline</code>.}}
Text that appears after the list of references. It is followed by links to PubMed and HubMed.

Link texts for PubMed and HubMed are:
* {{msg-mw|Biblioplus-pubmed-abstracts}}
* {{msg-mw|Biblioplus-hubmed-abstracts}}',
	'biblioplus-pubmed-abstracts' => 'Message in the tooltip when hovering over a link to all references.

The link is preceded by the label {{msg-mw|Biblioplus-medline-abstracts}}.

Followed by {{msg-mw|Biblioplus-hubmed-abstracts}}.',
	'biblioplus-hubmed-abstracts' => 'Message in the tooltip when hovering over a link to all references.

Preceded by {{msg-mw|Biblioplus-medline-abstracts}} and {{msg-mw|Biblioplus-pubmed-abstracts}}.',
	'biblioplus-vkey-title' => 'Message in the tooltip when hovering over a certain type of reference. Same as saying "This is a link to the bibliography database".',
);

/** Arabic (العربية)
 * @author Tarawneh
 */
$messages['ar'] = array(
	'biblioplus-doi-tooltip' => 'عرض أو شراء المادة من الناشر',
	'biblioplus-pmid-tooltip' => 'عرض أو شراء المادة من الناشر (إذا كانت متوفرة)',
	'biblioplus-isbn-tooltip' => 'معلومات الكتاب ضمن isbndb.org',
);

/** Asturian (asturianu)
 * @author Xuacu
 */
$messages['ast'] = array(
	'biblioplus-desc' => 'Recupera automáticamente cites de PubMed y la base de datos ISBN',
	'biblioplus-doi-tooltip' => "Ver o mercar l'artículu del editor",
	'biblioplus-pmid-tooltip' => "Ver o mercar l'artículu del editor (si ta disponible)",
	'biblioplus-isbn-tooltip' => 'Información del llibru en isbndb.org',
	'biblioplus-medline-abstracts' => 'Tolos resumes de Medline:',
	'biblioplus-pubmed-abstracts' => 'Tolos resumes de PubMed',
	'biblioplus-hubmed-abstracts' => 'Tolos resumes de HubMed',
	'biblioplus-vkey-title' => 'enllaz a la base de datos bibliográfica',
);

/** Bashkir (башҡортса)
 * @author Sagan
 */
$messages['ba'] = array(
	'biblioplus-doi-tooltip' => 'Мәҡәләне ҡарарға йәки нәшерсенән һатып алырға.',
	'biblioplus-pmid-tooltip' => 'Мәҡәләне ҡарарға йәки нәшерсенән һатып алырға (мөмкин булһа).',
	'biblioplus-isbn-tooltip' => 'Китап тураһында мәғлүмәт isbndb.org',
);

/** Bikol Central (Bikol Central)
 * @author Geopoet
 */
$messages['bcl'] = array(
	'biblioplus-desc' => 'Awtomatikong minahalungkat kan mga kasambitan gikan sa PubMed asin sa datos-sarayan kan ISBN',
	'biblioplus-doi-tooltip' => 'Tanawon o bakalon an artikulo gikan sa tagapagpublikar',
	'biblioplus-pmid-tooltip' => 'Tanawon o bakalon an artikulo gikan sa tagapagpublikar (kun yaon)',
	'biblioplus-isbn-tooltip' => 'Impormasyon kan libro yaon sa isbndb.org',
	'biblioplus-medline-abstracts' => 'Gabos na karurakan kan Medline:',
	'biblioplus-pubmed-abstracts' => 'Gabos na mga karurakan na yaon sa PubMed',
	'biblioplus-hubmed-abstracts' => 'Gabos na mga karurakan na yaon sa HubMed',
	'biblioplus-vkey-title' => 'kasugpon sa bibliograpiyang datos-sarayan',
);

/** Breton (brezhoneg)
 * @author Fohanno
 */
$messages['br'] = array(
	'biblioplus-doi-tooltip' => 'Gwelet pe prenañ ur pennad digant un embanner',
	'biblioplus-vkey-title' => 'liamm war-du an diaz roadennoù levrlennadur',
);

/** Catalan (català)
 * @author Arnaugir
 */
$messages['ca'] = array(
	'biblioplus-pubmed-abstracts' => 'Tots els resums a PubMed',
	'biblioplus-hubmed-abstracts' => 'Tots els resums a HubMed',
	'biblioplus-vkey-title' => 'enllaç a la base de dades de bibliografia',
);

/** Czech (čeština)
 * @author Vks
 */
$messages['cs'] = array(
	'biblioplus-isbn-tooltip' => 'Informace o knize na isbndb.org',
	'biblioplus-pubmed-abstracts' => 'Všechny abstrakty na PubMed',
);

/** German (Deutsch)
 * @author Kghbln
 * @author Metalhead64
 */
$messages['de'] = array(
	'biblioplus-desc' => 'Ermöglicht den automatischen Abruf von Zitaten über PubMed und die ISBN-Datenbank',
	'biblioplus-doi-tooltip' => 'Den Artikel beim Verlag ansehen oder ihn dort kaufen.',
	'biblioplus-pmid-tooltip' => 'Den Artikel beim Verlag ansehen oder ihn dort kaufen (sofern verfügbar).',
	'biblioplus-isbn-tooltip' => 'Die Informationen zum Buch auf der Website isbndb.org.',
	'biblioplus-medline-abstracts' => 'Alle Zusammenfassungen von Medline:',
	'biblioplus-pubmed-abstracts' => 'Alle Zusammenfassungen bei PubMed',
	'biblioplus-hubmed-abstracts' => 'Alle Zusammenfassungen bei HubMed',
	'biblioplus-vkey-title' => 'Dies ist der Link zur bibliografischen Datenbank.',
);

/** Zazaki (Zazaki)
 * @author Erdemaslancan
 * @author Mirzali
 */
$messages['diq'] = array(
	'biblioplus-medline-abstracts' => 'Heme xulasaya Medliney:',
	'biblioplus-pubmed-abstracts' => 'PubMed de heme xulasey',
	'biblioplus-hubmed-abstracts' => 'HubMed de heme xulasey',
);

/** Lower Sorbian (dolnoserbski)
 * @author Michawiki
 */
$messages['dsb'] = array(
	'biblioplus-desc' => 'Wótwołujo awtomatiski citaty z PubMed a datoweje banki ISBN',
);

/** Spanish (español)
 * @author Armando-Martin
 */
$messages['es'] = array(
	'biblioplus-desc' => 'Recupera automáticamente las citas de PubMed y la base de datos ISBN',
	'biblioplus-doi-tooltip' => 'Ver o comprar el artículo del editor',
	'biblioplus-pmid-tooltip' => 'Ver o comprar el artículo del editor (si está disponible)',
	'biblioplus-isbn-tooltip' => 'Información del libro en isbndb.org',
	'biblioplus-medline-abstracts' => 'Todos los resúmenes de Medline:',
	'biblioplus-pubmed-abstracts' => 'Todos los resúmenes de PubMed',
	'biblioplus-hubmed-abstracts' => 'Todos los resúmenes de HubMed',
	'biblioplus-vkey-title' => 'enlace a la base de datos bibliográfica',
);

/** Persian (فارسی)
 * @author Alireza
 * @author Armin1392
 */
$messages['fa'] = array(
	'biblioplus-desc' => 'بازیابی خودکار ایرادها از پایگاه اطلاعاتی پابمد و آی‌اس‌بی‌ان',
	'biblioplus-doi-tooltip' => 'مشاهده یا خرید مقاله از ناشر',
	'biblioplus-pmid-tooltip' => 'مقاله را (در صورت موجود) از ناشر، مشاهده یا خریداری کنید',
	'biblioplus-isbn-tooltip' => 'اطلاعات کتاب در isbndb.org',
	'biblioplus-medline-abstracts' => 'همهٔ چکیده‌های مدلین:',
	'biblioplus-pubmed-abstracts' => 'همهٔ چکیده‌ها در پاب‌مِد',
	'biblioplus-hubmed-abstracts' => 'همهٔ چکیده‌ها در هاب‌مِد',
	'biblioplus-vkey-title' => 'اتصال به پایگاه اطلاعاتی کتاب‌شناسی',
);

/** Finnish (suomi)
 * @author Nedergard
 * @author VezonThunder
 */
$messages['fi'] = array(
	'biblioplus-desc' => 'Hakee lähteet automaattisesti PubMedistä ja ISBN-tietokannasta',
	'biblioplus-doi-tooltip' => 'Lue tai osta artikkeli julkaisijalta',
	'biblioplus-pmid-tooltip' => 'Lue tai osta artikkeli julkaisijalta (jos saatavilla)',
	'biblioplus-isbn-tooltip' => 'Kirjan tiedot osoitteessa isbndb.org',
	'biblioplus-medline-abstracts' => 'Kaikki Medlinen tiivistelmät:',
	'biblioplus-pubmed-abstracts' => 'Kaikki tiivistelmät PubMedissä',
	'biblioplus-hubmed-abstracts' => 'Kaikki tiivistelmät HubMedissä',
	'biblioplus-vkey-title' => 'linkki bibliografiseen tietokantaan',
);

/** Faroese (føroyskt)
 * @author EileenSanda
 */
$messages['fo'] = array(
	'biblioplus-doi-tooltip' => 'Síggj ella keyp greinina frá útgevaranum',
	'biblioplus-pmid-tooltip' => 'Síggj ella keyp greinina frá útgevaranum (um hon er tøk)',
	'biblioplus-isbn-tooltip' => 'Kunning um bókina á isbndb.org',
	'biblioplus-pubmed-abstracts' => 'Øll abstraktini á PubMed',
);

/** French (français)
 * @author Cquoi
 * @author Tititou36
 */
$messages['fr'] = array(
	'biblioplus-desc' => "Récupère automatiquement les références de PubMed et de la base de données de l'ISBN",
	'biblioplus-doi-tooltip' => "Consulter ou acheter un article de l'éditeur",
	'biblioplus-pmid-tooltip' => "Consulter ou acheter l'article de l'éditeur (si disponible)",
	'biblioplus-isbn-tooltip' => 'Information sur le livre à isbndb.org',
	'biblioplus-medline-abstracts' => 'Tous les résumés de Medline :',
	'biblioplus-pubmed-abstracts' => 'Tous les résumés à PubMed',
	'biblioplus-hubmed-abstracts' => 'All abstracts at HubMed',
	'biblioplus-vkey-title' => 'lien vers la base de données Bibliographie',
);

/** Franco-Provençal (arpetan)
 * @author ChrisPtDe
 */
$messages['frp'] = array(
	'biblioplus-medline-abstracts' => 'Tôs los rèsumâs de Medline :',
	'biblioplus-pubmed-abstracts' => 'Tôs los rèsumâs a PubMed',
	'biblioplus-hubmed-abstracts' => 'Tôs los rèsumâs a HubMed',
	'biblioplus-vkey-title' => 'lim de vers la bâsa de donâs bibliografica',
);

/** Galician (galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'biblioplus-desc' => 'Obtén automaticamente citas de PubMed e da base de datos de ISBN',
	'biblioplus-doi-tooltip' => 'Consultar ou mercar un artigo do editor',
	'biblioplus-pmid-tooltip' => 'Consultar ou mercar un artigo do editor (se está dispoñible)',
	'biblioplus-isbn-tooltip' => 'Información do libro en isbndb.org',
	'biblioplus-medline-abstracts' => 'Todos os resumos de Medline:',
	'biblioplus-pubmed-abstracts' => 'Todos os resumos en PubMed',
	'biblioplus-hubmed-abstracts' => 'Todos os resumos en HubMed',
	'biblioplus-vkey-title' => 'ligazón cara á base de datos bibliográfica',
);

/** Hebrew (עברית)
 * @author Yona b
 * @author חיים
 * @author ליאור
 */
$messages['he'] = array(
	'biblioplus-desc' => 'מאחזר באופן אוטומטי ציטוטים על-פי PubMed ומסד הנתונים ISBN',
	'biblioplus-doi-tooltip' => 'הצג או קנה מאמר מ- publisher',
	'biblioplus-pmid-tooltip' => 'הצג או קנה מאמר מ- publisher (במידה וזמין)',
	'biblioplus-isbn-tooltip' => 'מידע אודות ספרים ב- isbndb.org',
	'biblioplus-medline-abstracts' => 'כל תקצירי Medline:',
	'biblioplus-pubmed-abstracts' => 'כל תקצירי המאמרים מאתר פאבמד (PubMed)',
	'biblioplus-hubmed-abstracts' => 'כל תקצירי המאמרים מאתר האבמד (HubMed)',
	'biblioplus-vkey-title' => 'קישור למסד נתונים ביבליוגרפי',
);

/** Upper Sorbian (hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'biblioplus-desc' => 'Wotwołuje awtomatisce citaty z PubMed a datoweje banki ISBN',
	'biblioplus-doi-tooltip' => 'Nastawk sej pola wudawaćela wobhladać abo wot njeho kupić',
	'biblioplus-pmid-tooltip' => 'Nastawk sej pola wudawaćela wobhladać abo wot njeho kupić (jeli k dispozicij)',
	'biblioplus-isbn-tooltip' => 'Informacije wo knize na isbndb.org',
	'biblioplus-medline-abstracts' => 'Wšě zarysy z Medline:',
	'biblioplus-pubmed-abstracts' => 'Wšě zarysy z PubMed',
	'biblioplus-hubmed-abstracts' => 'Wšě zarysy z HubMed',
	'biblioplus-vkey-title' => 'wotkaz k bibliografiskej datowej bance',
);

/** Interlingua (interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'biblioplus-desc' => 'Recupera automaticamente citationes ab PubMed e ab le base de datos ISBN',
	'biblioplus-doi-tooltip' => 'Vider o comprar articulo ab le editor',
	'biblioplus-pmid-tooltip' => 'Vider o comprar articulo ab le editor (si disponibile)',
	'biblioplus-isbn-tooltip' => 'Information del libro in isbndb.org',
	'biblioplus-medline-abstracts' => 'Tote le summarios de Medline:',
	'biblioplus-pubmed-abstracts' => 'Tote le summarios in PubMed',
	'biblioplus-hubmed-abstracts' => 'Tote le summarios in HubMed',
	'biblioplus-vkey-title' => 'ligamine al base de datos bibliographic',
);

/** Indonesian (Bahasa Indonesia)
 * @author Farras
 */
$messages['id'] = array(
	'biblioplus-doi-tooltip' => 'Lihat atau beli artikel dari penerbit',
	'biblioplus-pmid-tooltip' => 'Lihat atau beli artikel dari penerbit (jika tersedia)',
	'biblioplus-isbn-tooltip' => 'Informasi buku di isbndb.org',
	'biblioplus-medline-abstracts' => 'Semua abstrak Medline:',
	'biblioplus-pubmed-abstracts' => 'Semua abstrak di PubMed',
	'biblioplus-hubmed-abstracts' => 'Semua abstrak di HubMed',
	'biblioplus-vkey-title' => 'tautan ke basis data pustaka',
);

/** Italian (italiano)
 * @author Beta16
 * @author Darth Kule
 */
$messages['it'] = array(
	'biblioplus-desc' => 'Recupera automaticamente citazioni da PubMed e dal database ISBN',
	'biblioplus-doi-tooltip' => "Vedi o acquista l'articolo dall'editore",
	'biblioplus-pmid-tooltip' => "Vedi o acquista l'articolo dall'editore (se disponibile)",
	'biblioplus-isbn-tooltip' => 'Informazioni sul libro da isbndb.org',
	'biblioplus-medline-abstracts' => 'Tutti gli abstract di Medline:',
	'biblioplus-pubmed-abstracts' => 'Tutti gli abstract su PubMed',
	'biblioplus-hubmed-abstracts' => 'Tutti gli abstract su HubMed',
	'biblioplus-vkey-title' => 'collegamento al database bibliografico',
);

/** Japanese (日本語)
 * @author Fryed-peach
 * @author Shirayuki
 */
$messages['ja'] = array(
	'biblioplus-desc' => 'PubMed および ISBN データベースから引用を自動的に取得する',
	'biblioplus-doi-tooltip' => '発行者の記事を閲覧または購入',
	'biblioplus-pmid-tooltip' => '発行者の記事を閲覧または購入 (利用できる場合)',
	'biblioplus-isbn-tooltip' => 'isbndb.org の書籍情報',
	'biblioplus-medline-abstracts' => 'すべての Medline のアブストラクト:',
	'biblioplus-pubmed-abstracts' => 'PubMed の全アブストラクト',
	'biblioplus-hubmed-abstracts' => 'HubMed の全アブストラクト',
	'biblioplus-vkey-title' => '書誌データベースへのリンク',
);

/** Korean (한국어)
 * @author LFM
 * @author 아라
 */
$messages['ko'] = array(
	'biblioplus-desc' => 'PubMed와 ISBN 데이터베이스에서 인용을 자동으로 검색합니다',
	'biblioplus-doi-tooltip' => '발행자의 문서를 보거나 구입',
	'biblioplus-pmid-tooltip' => '(가능한 경우) 발행자의 문서를 보거나 구입',
	'biblioplus-isbn-tooltip' => 'isbndb.org의 서지 정보',
	'biblioplus-medline-abstracts' => 'Medline의 모든 초록',
	'biblioplus-pubmed-abstracts' => 'PubMed의 모든 초록',
	'biblioplus-hubmed-abstracts' => 'HubMed의 모든 초록',
	'biblioplus-vkey-title' => '서지 데이터베이스로 연결',
);

/** Colognian (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'biblioplus-desc' => 'Hollt automattesch Zitaate vun dä PubMed Daatebangk unuß dä ISBN Daatebangk.',
	'biblioplus-doi-tooltip' => 'Lißß udder kouf dä Atikkel beim Verlaach',
	'biblioplus-pmid-tooltip' => 'Lißß udder kouf dä Atikkel beim Verlaach wann müjjelesch',
	'biblioplus-isbn-tooltip' => 'Aanjaabe zom Booch op isbndb.org',
	'biblioplus-medline-abstracts' => 'Alle Zosammefaßonge op <i lang="en">Medline</i>:',
	'biblioplus-pubmed-abstracts' => 'Alle Zosammefaßonge op <i lang="en">PubMed</i>',
	'biblioplus-hubmed-abstracts' => 'Alle Zosammefaßonge op <i lang="en">HubMed</i>',
	'biblioplus-vkey-title' => 'Lengk op en biblijojraafesche Daatebangk',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 * @author Soued031
 */
$messages['lb'] = array(
	'biblioplus-desc' => 'Rifft Zitatiounen automatesch vu PubMed an aus der ISBN-Datebank erof',
	'biblioplus-doi-tooltip' => 'Den Artikel beim Editeur kucken oder kafen',
	'biblioplus-pmid-tooltip' => 'Artikel vum Verlag kucken oder kafen (wann se disponibel sinn)',
	'biblioplus-isbn-tooltip' => "Informatioun iwwer d'Buch op isbndb.org",
	'biblioplus-medline-abstracts' => 'All Resuméë vu Medline:',
	'biblioplus-pubmed-abstracts' => 'All Resuméë vu PubMed',
	'biblioplus-hubmed-abstracts' => 'All Resuméë vu HubMed',
	'biblioplus-vkey-title' => "Link op d'Datebank vun de Bibliografien",
);

/** Lithuanian (lietuvių)
 * @author Eitvys200
 */
$messages['lt'] = array(
	'biblioplus-doi-tooltip' => 'Peržiūrėti ar pirkti straipsnį iš leidėjo',
	'biblioplus-pmid-tooltip' => 'Peržiūrėti ar pirkti straipsnį iš leidėjo (jei įmanoma)',
);

/** Macedonian (македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'biblioplus-desc' => 'Автоматски се оповикува на наводи од PubMed и базата на ISBN',
	'biblioplus-doi-tooltip' => 'Прочитајте или купете ја статијата од издавачот',
	'biblioplus-pmid-tooltip' => 'Прочитајте или купете ја статијата од издавачот (ако е достапна)',
	'biblioplus-isbn-tooltip' => 'Информации за книгата на isbndb.org',
	'biblioplus-medline-abstracts' => 'Сите извадоци од Medline:',
	'biblioplus-pubmed-abstracts' => 'Сите извадоци од PubMed',
	'biblioplus-hubmed-abstracts' => 'Сите извадоци од HubMed',
	'biblioplus-vkey-title' => 'Врска до библиографската база',
);

/** Malay (Bahasa Melayu)
 * @author Anakmalaysia
 */
$messages['ms'] = array(
	'biblioplus-desc' => 'Menerima petikan secara automatik dari PubMed dan pangkalan data ISBN',
	'biblioplus-doi-tooltip' => 'Baca atau beli rencana dari penerbit',
	'biblioplus-pmid-tooltip' => 'Baca atau beli rencana dari penerbit (jika ada)',
	'biblioplus-isbn-tooltip' => 'Keterangan buku di isbndb.org',
	'biblioplus-medline-abstracts' => 'Semua abstrak Medline:',
	'biblioplus-pubmed-abstracts' => 'Semua abstrak di PubMed',
	'biblioplus-hubmed-abstracts' => 'Semua abstrak di HubMed',
	'biblioplus-vkey-title' => 'pautan ke pangkalan data bibliografi',
);

/** Maltese (Malti)
 * @author Chrisportelli
 */
$messages['mt'] = array(
	'biblioplus-desc' => 'Tirkupra awtomatikament ċitazzjoni minn PubMed u mid-databażi ISBN',
);

/** Dutch (Nederlands)
 * @author SPQRobin
 * @author Siebrand
 */
$messages['nl'] = array(
	'biblioplus-desc' => 'Haalt automatisch citaten op van PubMed en de ISBN-database',
	'biblioplus-doi-tooltip' => 'Artikel van uitgever bekijken of kopen',
	'biblioplus-pmid-tooltip' => 'Artikel van uitgever bekijken of kopen (als beschikbaar)',
	'biblioplus-isbn-tooltip' => 'Informatie over het boek op isbndb.org',
	'biblioplus-medline-abstracts' => 'Alle samenvattingen van Medline:',
	'biblioplus-pubmed-abstracts' => 'Alle samenvattingen van PubMed',
	'biblioplus-hubmed-abstracts' => 'Alle samenvattingen van HubMed',
	'biblioplus-vkey-title' => 'verwijzen naar bibliografiedatabase',
);

/** Occitan (occitan)
 * @author Cedric31
 */
$messages['oc'] = array(
	'biblioplus-medline-abstracts' => 'Totes los resumits de Medline :',
	'biblioplus-pubmed-abstracts' => 'Totes los resumits a PubMed',
);

/** Oriya (ଓଡ଼ିଆ)
 * @author Jnanaranjan Sahu
 */
$messages['or'] = array(
	'biblioplus-doi-tooltip' => 'ଏହି ପ୍ରକାଶକଙ୍କ ଲେଖାଗୁଡ଼ିକ ଦେଖିବେ କିମ୍ବା କିଣିବେ',
	'biblioplus-pmid-tooltip' => 'ପ୍ରକାଶକଙ୍କ ଲେଖାଗୁଡିକୁ ଦେଖିବେ କିମ୍ବା କିଣିବେ (ଯଦି ଉପଲବ୍ଧ)',
);

/** Polish (polski)
 * @author BeginaFelicysym
 */
$messages['pl'] = array(
	'biblioplus-desc' => 'Automatycznie pobiera cytaty z baz danych PubMed i ISBN',
	'biblioplus-doi-tooltip' => 'Przejrzyj lub kup artykuł od wydawcy',
	'biblioplus-pmid-tooltip' => 'Przejrzyj lub kup artykuł od wydawcy (jeśli jest dostępny)',
	'biblioplus-isbn-tooltip' => 'Informacje o książce w isbndb.org',
	'biblioplus-medline-abstracts' => 'Wszystkie streszczenia z Medline:',
	'biblioplus-pubmed-abstracts' => 'Wszystkie streszczenia z PubMed',
	'biblioplus-hubmed-abstracts' => 'Wszystkie streszczenia z HubMed',
	'biblioplus-vkey-title' => 'łącze do bazy danych bibliografii',
);

/** Piedmontese (Piemontèis)
 * @author Borichèt
 * @author Dragonòt
 */
$messages['pms'] = array(
	'biblioplus-desc' => "A treuva automaticament le corëspondense da PubMed e da la base ëd dàit d'ISBN",
	'biblioplus-doi-tooltip' => "Consulté o caté n'artìcol da l'editor",
	'biblioplus-pmid-tooltip' => "Consulté o caté l'artìcol da l'editor (se disponìbil)",
	'biblioplus-isbn-tooltip' => 'Anformassion an sël lìber a isbndb.org',
	'biblioplus-medline-abstracts' => 'Tùit ij resumé ëd Medline:',
	'biblioplus-pubmed-abstracts' => 'Tùit ij resumé a PubMed',
	'biblioplus-hubmed-abstracts' => 'Tùit ij resumé a HubMed',
	'biblioplus-vkey-title' => 'liura a la base ëd dàit bibliogràfica',
);

/** Portuguese (português)
 * @author Fúlvio
 * @author Giro720
 */
$messages['pt'] = array(
	'biblioplus-desc' => 'Recupera automaticamente as referências da base de dados PubMed e ISBN',
	'biblioplus-doi-tooltip' => 'Ver ou comprar o artigo da editora',
	'biblioplus-pmid-tooltip' => 'Ver ou comprar o artigo da editora (se disponível)',
	'biblioplus-isbn-tooltip' => 'Informação do livro em isbndb.org',
	'biblioplus-vkey-title' => 'ligação para a base de dados bibliográfica',
);

/** tarandíne (tarandíne)
 * @author Joetaras
 */
$messages['roa-tara'] = array(
	'biblioplus-desc' => "Automaticamende acchie le citaziune da PubMed e da 'u database ISBN",
	'biblioplus-doi-tooltip' => "'Ndruche o accatte l'articole da 'u pubblecatore",
	'biblioplus-pmid-tooltip' => "'Ndruche o accatte l'articole da 'u pubblecatore (ce disponibbile)",
	'biblioplus-isbn-tooltip' => "'Mbormaziune sus a 'u libbre sus a isbndb.org",
	'biblioplus-medline-abstracts' => 'Tutte le astraziune Medline:',
	'biblioplus-pubmed-abstracts' => "Tutte l'astraziune a PubMed",
	'biblioplus-hubmed-abstracts' => "Tutte l'astraziune a HubMed",
	'biblioplus-vkey-title' => "collegamende a l'archivije d'a bibbliografije",
);

/** Russian (русский)
 * @author Kaganer
 */
$messages['ru'] = array(
	'biblioplus-desc' => 'Автоматически извлекает цитаты из PubMed и базы данных ISBN',
	'biblioplus-doi-tooltip' => 'Просмотр или купить статью у издателя',
	'biblioplus-pmid-tooltip' => 'Просмотреть или купить статью у издателя (если доступно)',
	'biblioplus-isbn-tooltip' => 'Информация о книге на isbndb.org',
	'biblioplus-medline-abstracts' => 'Все тезисы из Medline:',
	'biblioplus-pubmed-abstracts' => 'Все тезисы в PubMed',
	'biblioplus-hubmed-abstracts' => 'Все тезисы в HubMed',
	'biblioplus-vkey-title' => 'ссылка на библиографическую базу данных',
);

/** Sinhala (සිංහල)
 * @author පසිඳු කාවින්ද
 */
$messages['si'] = array(
	'biblioplus-doi-tooltip' => 'ප්‍රකාශකගෙන් ලිපිය නරඹන්න හෝ මිලදී ගන්න',
	'biblioplus-isbn-tooltip' => 'isbndb.org හී පොත් තොරතුරු',
	'biblioplus-medline-abstracts' => 'සියලුම මෙඩ්ලයින් සාරාංශ:',
	'biblioplus-pubmed-abstracts' => 'PubMed හී සියලුම සාරාංශ',
	'biblioplus-hubmed-abstracts' => 'HubMed හී සියලුම සාරාංශ',
	'biblioplus-vkey-title' => 'ග්‍රන්ථනාමාවලි දත්ත සංචිතය වෙත සබැඳිය',
);

/** Swedish (svenska)
 * @author LittleGun
 * @author WikiPhoenix
 */
$messages['sv'] = array(
	'biblioplus-desc' => 'Skapar en referens av en artikel i PubMed eller ISBN:s databas',
	'biblioplus-doi-tooltip' => 'Visa eller köpa artikel från utgivaren',
	'biblioplus-pmid-tooltip' => 'Visa eller köpa artikel från utgivaren (om den är tillgänglig)',
	'biblioplus-isbn-tooltip' => 'Bokinformation på isbndb.org',
	'biblioplus-medline-abstracts' => 'Alla Medlines sammanfattningar:',
	'biblioplus-pubmed-abstracts' => 'Alla sammanfattningar på PubMed',
	'biblioplus-hubmed-abstracts' => 'Alla sammanfattningar på HubMed',
	'biblioplus-vkey-title' => 'länk till databasen med bibliografier',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'biblioplus-desc' => 'Kusang kumukuhang muli ng mga pagbanggit magmula sa kalipunan ng dato ng PubMed at ng ISBN',
	'biblioplus-doi-tooltip' => 'Tingnan o bilhin ang artikulo mula sa tagapaglathala',
	'biblioplus-pmid-tooltip' => 'Tingnan o bilhin ang artikulo mula sa tagapaglathala (kung makukuha)',
	'biblioplus-isbn-tooltip' => 'Kabatiran sa aklat na nandoon sa isbndb.org',
	'biblioplus-medline-abstracts' => 'Lahat ng mga kabuuran ng Medline:',
	'biblioplus-pubmed-abstracts' => 'Lahat ng mga kabuuran na nasa PubMed',
	'biblioplus-hubmed-abstracts' => 'Lahat ng mga kabuuran na nasa HubMed',
	'biblioplus-vkey-title' => 'Kawing sa kalipunan ng dato ng talaaklatan',
);

/** Ukrainian (українська)
 * @author Ата
 */
$messages['uk'] = array(
	'biblioplus-desc' => 'Автоматично отримує цитати з PubMed та бази даних ISBN',
	'biblioplus-doi-tooltip' => 'Переглянути або купити статтю у видавця',
	'biblioplus-pmid-tooltip' => 'Переглянути або купити статтю у видавця (якщо можливо)',
	'biblioplus-isbn-tooltip' => 'Інформація про книгу на isbndb.org',
	'biblioplus-medline-abstracts' => 'Усі тези з Medline:',
	'biblioplus-pubmed-abstracts' => 'Усі тези в PubMed',
	'biblioplus-hubmed-abstracts' => 'Усі тези в HubMed',
	'biblioplus-vkey-title' => 'посилання на бібліографічну базу даних',
);

/** Simplified Chinese (中文（简体）‎)
 * @author Hzy980512
 * @author Yfdyh000
 */
$messages['zh-hans'] = array(
	'biblioplus-desc' => '自动从PubMed和ISBN数据库检索引文',
	'biblioplus-doi-tooltip' => '从发行者处查看或购买文章',
	'biblioplus-pmid-tooltip' => '从发行者处查看或购买文章（若可用）',
	'biblioplus-isbn-tooltip' => 'isbndb.org 上的书籍信息',
	'biblioplus-medline-abstracts' => '所有Medline摘要：',
	'biblioplus-pubmed-abstracts' => '所有在PubMed的摘要',
	'biblioplus-hubmed-abstracts' => '所有在HubMed的摘要',
	'biblioplus-vkey-title' => '链接到参考文献数据库',
);

/** Traditional Chinese (中文（繁體）‎)
 * @author Justincheng12345
 * @author Kevinhksouth
 */
$messages['zh-hant'] = array(
	'biblioplus-desc' => '自動從PubMed和ISBN數據庫取得參考',
	'biblioplus-doi-tooltip' => '從發佈者查看或購買條目',
	'biblioplus-pmid-tooltip' => '從發佈者查看或購買條目（如適用）',
	'biblioplus-isbn-tooltip' => '在 isbndb.org 上的書籍資訊',
	'biblioplus-medline-abstracts' => '所有 Medline 摘要：',
	'biblioplus-pubmed-abstracts' => '所有 PubMed 摘要',
	'biblioplus-hubmed-abstracts' => '所有 HubMed 摘要',
	'biblioplus-vkey-title' => '連結到參考書目資料庫',
);
