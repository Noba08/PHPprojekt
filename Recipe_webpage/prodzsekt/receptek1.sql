-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2022 at 11:48 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `receptek1`
--

-- --------------------------------------------------------

--
-- Table structure for table `receptek`
--

CREATE TABLE `receptek` (
  `id` int(11) NOT NULL,
  `nev` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `leiras` text CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `nehezseg` enum('konnyu','kozepes','nehez') CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `hozzavalok` text CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `elkeszitesi_ido` int(11) NOT NULL,
  `ertekeles` int(11) DEFAULT NULL,
  `feltolto` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `imgurl` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `nemzetiseg` text CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receptek`
--

INSERT INTO `receptek` (`id`, `nev`, `leiras`, `nehezseg`, `hozzavalok`, `elkeszitesi_ido`, `ertekeles`, `feltolto`, `imgurl`, `nemzetiseg`) VALUES
(101, 'Tokány', 'A tokányok alapja a szalonna, amit kockára vágva kisütünk. Minden, ami ezek után következik, változhat, kivéve ezt.\r\nA kisült szalonnához adjuk a kockára vágott hagymát is, amit üvegesre párolunk.\r\nMajd jöhet a lehetőleg csíkokra vágott hús, ami miatt a tokány a tokány nevet kapta. Fehéredésig süssük, majd ízlésünknek megfelelően sózzuk és borsozzuk.\r\nAz ugyancsak kockára vágott paradicsomot és paprikát is a húshoz adhatjuk, majd addig főzzük, míg levet ereszt, és picit elkezdi elfőni.\r\nEkkor öntsük fel annyi vízzel, amennyi ellepi a húst. Majd közepes lángon hagyjuk, hogy a víz jelentős része elfőjön.\r\nA legvégén még egy evőkanál lisztet szórunk a tokányra, amit jól elkeverünk, hogy ne legyen csomós. Köretként pedig tésztát vagy nokedlit kínáljunk hozzá.', 'konnyu', '25 dkg sertéscomb,\r\n15 dkg kolozsvári szalonna,\r\n1 közepes db vöröshagyma,\r\n2 közepes db paradicsom,\r\n2 közepes db tv paprika,\r\n5 dl víz,\r\n1 csapott ek finomliszt,\r\nbors ízlés szerint,\r\nsó ízlés szerint', 50, 0, 'Noba09', './images/egyszeru-borsos-tokany.png', 'Magyaros'),
(102, 'Marhapörkölt', 'A húst vágjuk kockára.\r\n\r\nA megtisztított hagymát vágjuk finomra, a paradicsomot és a paprikát ízlésünknek megfelelően daraboljuk össze.\r\n\r\nEgy nagy edényben kezdjük el dinsztelni a finomra vágott hagymát olaj vagy zsír társaságában, amikor a hagyma összeesett, dobjuk rá a marhahúskockákat, alaposan keverjük el és fehéredésig pirítsuk.\r\n\r\nEzután sózzuk, borsozzuk, szórjuk rá a pirospaprikát, keverjük el, majd öntsük fel 150-200 milliliter vízzel, végül adjuk a köményt is a pörkölthöz. Közepes lángon, gyakori kevergetés mellett 3-4 óráig főzzük, ha szükséges, az elfőtt vizet pótoljuk. A paprika, paradicsom és fokhagyma a főzési idő felénél kerüljön a pörkölthöz, majd amikor a hús már megpuhult, a szaft is sűrű, keverjünk hozzá 1 evőkanál paradicsompürét, alaposan keverjük el, még néhány percig főzzük.', 'kozepes', '1 kg marhalábszár,\r\n4 ek olaj vagy zsír,\r\n3 fej hagyma,\r\n1 darab paradicsom,\r\n1 darab sárga vagy zöld paprika,\r\n2 gerezd fokhagyma,\r\n2 ek őrölt pirospaprika,\r\nsó és bors ízlés szerint,\r\n1 tk őrölt köménymag,\r\n1 ek paradicsompüré,\r\n2 dl víz', 90, 0, 'Noba09', './images/marhapori1.png', 'Magyaros'),
(103, 'Hamburger', 'A darált húst egy tálba tesszük, megsózzuk, 2-3 mokkáskanálnyi borsot szórunk bele, hozzáadjuk a nagyon apró kockákra vágott hagymát, a mustárt, a tojást, és kanalanként a ketchupot.\r\nA masszát összegyúrjuk, és 4 egyenlő kupacra osztjuk, amelyekből szép, formás húspogácsákat készítünk. Célszerű olyan nagyságú pogácsákat készíteni, amekkora a puffancs átmérője. Egy ecsettel a húspogácsák mindkét oldalát kicsit megolajozzuk, és egy jénaira fektetve, fóliával lefedve 1-2 órára a hűtőbe tesszük, hogy az ízek jól összeérjenek.\r\nEgy teflonserpenyőt kissé megolajozunk, és kis lángon, lassan (mindkét oldalát kb. 8-8 perc alatt) pirosra sütjük.\r\nA puffancsot kettévágjuk, megrakjuk egy kis csalamádéval, rátesszük a húspogácsát, egy szelet sajtot, lilahagymát, ketchupot, mustárt, és előmelegített sütőben 5 perc alatt átmelegítjük a hamburgereket.', 'konnyu', '4db hamburgerzsemle,\r\ncsalamádé,\r\nlilahagyma,\r\nketchup,\r\nmustár,\r\nsajt,\r\n50dkg darált hús,\r\n1fej hagyma,\r\nsó,\r\nőrölt bors,\r\n2ek mustár,\r\n4ek ketchup,\r\n1db tojás,\r\n1ek zsemlemorzsa', 40, 0, 'Noba09', './images/lead_L_hazi-hamburger-recept.png', 'Amerikai'),
(104, 'Gofri', 'A száraz hozzávalókat összekeverjük egy tálban.\r\nA tojást, a langyos tejet és az olvasztott vajat pedig egy másik tálban felverjük.\r\nA liszthez hozzáöntjük jó sűrű kevergetés mellett az előzőleg jól felvert tejes keveréket, majd az egészet kikeverjük úgy, hogy egy jó sűrű, de mégis kissé folyós masszát kapjunk.\r\nA gofrisütőt olajjal kikenjük, és belemerjük adagonként a gofri masszáját, és megsütjük. A végén ízlésünknek megfelelően fogyasztjuk!', 'kozepes', '20 dkg finomliszt,\r\n1 csomag vaníliás cukor,\r\n1 ek cukor,\r\n1 csomag sütőpor,\r\n2 db tojás,\r\n2 dl tej,\r\n2 ek vaj,\r\n1 csipet só', 15, 0, 'Noba09', './images/gofri.jpg', 'Német'),
(105, 'Forralt bor', 'A vizet, a cukrot és a fűszereket kis lábasba öntjük, és pár perc alatt összeforraljuk.\r\nHozzáöntjük a bort, kevés citromlevet facsarunk bele, és addig hagyjuk a tűz felett, míg kellőképpen felmelegszik az ital, de forrpont előtt lezárjuk a lángot.\r\nAzon melegében elkortyolgatjuk.', 'konnyu', '375 ml száraz vörösbor (vagy száraz fehérbor),\r\n1.8 dl víz,\r\n2 db fahéjrúd,\r\n13 db szegfűszeg,\r\n1 db csillagánizs,\r\n4 ek cukor,\r\n0.3 db citrom (2 szélesebb citromkarika),\r\n1 fél citromból nyert citromlé', 30, 0, 'Noba09', './images/letöltés (1).jpg', 'Olaszos'),
(106, 'Szögedi halászlé', 'A megtisztított halakat kifilézzük, és a csontokból, fejekből a félfőre vágott vöröshagymával, sóval, borssal, fokhagymával, a tetejére szórt őrölt pirospaprikával és fejenként egy liter vízzel felöntjük és legalább 2 – 2,5 órán keresztül főzzük.\r\nA megmaradt halfiléket beirdaljuk, felkockázzuk, megszórjuk kevés sóval és felhasználásig hűtőbe rakjuk.\r\nHa az alaplevünk elkészült, akkor átpasszírozzuk egy tésztaszűrőn, fakanállal vagy egy húsverő kalapáccsal mozgatva a szűrőben a kimert halcsontokat. Erre azért van szükség, hogy a halcsontról lejöjjön a husi, és ez fogja tartalmassá tenni az alaplevünket.\r\nHa megvagyunk az alaplével akkor felforraljuk és belerakjuk a már előkészített halkockákat, Ezt követően 10 percig főzzük. Amennyiben volt belsőség a halakban akkor azt most hozzáadjuk, még 10 percig főzzük. Kóstolás után újra ízesítjük, ha szükséges.\r\nHegyes erős paprikát vagy csípős tört paprikát és friss kenyeret vagy kalácsot tálalunk hozzá.', 'kozepes', '1.5kg ponty,	\r\n1dl olaj,\r\n4fej vöröshagyma,\r\n3ek pirospaprika,\r\n1tk erős pirospaprika,\r\n2db paradicsom,\r\n2db zöldpaprika,\r\nsó	', 45, 0, 'Noba09', './images/halaszlehalaszosan.jpg', 'Magyaros'),
(107, 'Wellington bélszín', 'A bélszínt éles késsel lehártyázzuk, a borssal és a mustárral jól bedörzsöljük, majd egy akkora tálba tesszük, amekkorába éppen belefér. Annyi olajat öntünk rá, amennyi ellepi, és letakarva érleljük a hűtőszekrényben 3-4 napig.\r\nA kissé lecsöpögtetett érlelt bélszínt kb. 1 tk sóval bedörzsöljük. A pácoláshoz használt olajból serpenyőben felforrósítunk egy keveset, és körbepirítjuk rajta a húst 7-8 perc alatt. Lecsöpögtetve hűlni hagyjuk, majd folpakba csomagoljuk, és jól behűtjük.\r\nA vajas tésztát szobahőmérsékleten felengedjük. A megtisztított gombát és hagymát lereszeljük vagy nagyon finomra vágjuk, és a hús pácolásához használt 3-4 ek olajon keverés közben addig pirítjuk, amíg a leve el nem fő. Ezután megsózzuk, megborsozzuk, és a morzsával együtt rövid ideig tovább pirítjuk. Végül ráöntjük a 2 db felvert tojást, és dermedésig sütjük. A tűzről lehúzva a felaprított petrezselyemmel fűszerezzük.\r\nA tésztát enyhén meglisztezett deszkán 1 cm vastagra, téglalap alakúra nyújtjuk. Az elősütött húst körbetapasztjuk a gombapéppel, és a tészta közepére helyezzük. Minden oldalról jól megkenjük az elkevert tojással, majd ráhajtjuk a tésztát és az illesztéssel lefelé sütőpapírral bélelt tepsibe tesszük. A maradék felvert tojással bekenjük, villával pár helyen megszurkáljuk és a 180 fokra előmelegített sütőben kb. 30 percig sütjük. Tálalás előtt 10-15 percig pihentetjük, végül ujjnyi vastagon felszeleteljük. Főtt burgonya, krumplipüré vagy zöldségköret illik hozzá.', 'nehez', '80dkg	bélszín,\r\n1tk	őrölt fekete bors,	\r\n1tk	mustár,\r\nsó,\r\nolaj,\r\n50dkg	fagyasztott leveles vajastészta,\r\nliszt,\r\n1db	tojás,\r\n40dkg	csiperkegomba,\r\n1fej	vöröshagyma,\r\n1tk	só,\r\n0.5tk	őrölt fekete bors,	\r\n2ek	zsemlemorzsa,\r\n2db	tojás,\r\n0.5csok	petrezselye', 120, 0, 'Noba09', './images/photo.jpg', 'Brit'),
(108, 'Mézeskalács', 'Először a száraz hozzávalókat keverjük alaposan össze, majd jöhet a tojás, a méz és a picit megolvasztott margarin. Addig gyúrjuk, míg egynemű, illatos, rugalmas tésztát nem kapunk.\r\n3 részre osztjuk, majd egyenként kinyújtjuk 0,5 cm-es vastagságúra a tésztát. Kiszaggatjuk, sütőlemezre tesszük, ne szorosan, mert sülés közben összenőnek. Megsütjük.\r\nmáz\r\n2 tojásfehérjét félig felverünk robotgéppel, majd 30 dkg porcukrot apránként hozzádolgozunk, és keményedésig keverjük.', 'kozepes', '1 kg finomliszt,\r\n30 dkg porcukor,\r\n3 teáskanál szódabikarbóna,\r\n14 g mézeskalács fűszerkeverék (1 tasak),\r\n30 dkg margarin,\r\n250 ml méz,\r\n3 db tojás,\r\n2 db tojásfehérje,\r\n30 dkg porcukor', 40, 0, 'Noba09', './images/anvalor-modern-mezeskalacs-diszites-nyomaban.jpg', 'Magyaros'),
(109, 'Carbonara', 'A szalonnát felkockázzuk, majd száraz serpenyőben pirítsuk meg jó ropogósra. Szűrőkanállal szedjük ki, és tegyük félre.\r\nA tojásokat üssük egy tálba, majd verjük fel. Adjuk hozzá a reszelt sajtot, fokhagymát, és ízesítsük sóval, borssal, majd az egészet keverjük össze.\r\nA tésztát főzzük meg, de mielőtt leöntetnénk a levét, tegyünk félre belőle fél decivel. Szűrjük le a tésztát, és azonnal, még forrón dobjuk abba a serpenyőbe, amiben a szalonnát pirítottuk, de már ne égjen alatt a láng.\r\nA forró tésztára öntsük rá a tojásos keveréket, gyorsan kezdjük el kavargatni, majd addig adagoljuk hozzá a félretett főzővizet, amíg egy krémes szósz be nem vonja a tésztát. (Ha a tészta már nem lenne elég forró, akkor kapcsoljuk be alatta a lángot, de csakis a legkisebb fokozaton, és addig keverjük, amíg krémes nem lesz.)\r\nLegvégül adjuk hozzá a pirított szalonnát, és tálalásnál szórjuk meg a tetejét aprított kakukkfűvel és extra borssal, valamint sajttal.', 'konnyu', '100 g bacon,\r\n4 db tojássárgája,\r\n70 g grana padano,\r\n1 gerezd fokhagyma,\r\nsó ízlés szerint,\r\nfekete bors ízlés szerint,\r\n400 g spagetti tészta\r\n', 15, 0, 'Noba09', './images/carbonara.jpg', 'Olaszos'),
(110, 'Kínai szezámmagos csirke', 'Készítsük el a szószt: minden hozzávalót keverjünk el csomómentesre, és egy lábasban lassan forraljuk fel, és tartsuk melegen. Ha túl édesnek találjuk, további ecet hozzáadásávalállítsuk be az ízt óvatosan. (Én jobban szeretek 5%-os almaecetet használni, ha nincs rizsecet,attól sokkal lágyabb benne a savanyú, sokkal finomabb ízt ad, és könnyebben eltalálható a helyes íz, mint a 10 %-os ételecettel.)\r\nVágjuk 2-3 cm-es kockákra a csirkehúst, egy időre pácoljuk be kevés szakéba és szójaszószba.\r\nKeverjükel a tésztához szükséges hozzávalókat, minden folyékony rész legyen jéghideg.(Tekintettel egy kedves hozzászólóra, akinek nem sikerült, csapott evőkanállal dolgozzunk, és ha így is túl tömör lenne a massza, higítsuk óvatosan a szakéval. De sűrűnek kell maradnia, hogy bevonja a húst.)\r\nA csirkét forgassuk bele, majd kezdjük el bő olajban, kis lángonkisütni. Akkorjó, amikor a bunda máraranybarna.Ezt folytassukaddig, amíg a csirke el nem fogy, igyekezzünk minél hamarabb ezzel végezni. Forgassuk bele a meleg szószba, hintsük meg az előre, olaj nélkül lepirítottszezámmaggal, és főtt rizzsel tálaljuk.', 'nehez', '40 dkg csirkemellfilé,\r\n2 ek szójaszósz,\r\n10 ml szaké,\r\n2 csepp szezámolaj,\r\n2 csapott ek finomliszt,\r\n2 csapott ek étkezési keményítő,\r\n2 ek víz,\r\n0.4 tk sütőpor,\r\n0.4 tk szódabikarbóna,\r\n0.5 ek napraforgó olaj,\r\n100 ml víz,\r\n100 ml csirke alaplé,\r\n3 ek rizsecet,\r\n2 csapott ek étkezési keményítő,\r\n150 g cukor,\r\n3 ek szójaszósz,\r\n2 ek szezámolaj,\r\n1 teáskanál chiliszósz,\r\n1 gerezd fokhagyma,', 30, 0, 'Noba09', './images/szezammagos-csirke-napsutottevidekunkon-konyhajabol.jpeg', 'Kínai'),
(111, 'Csigaleves', 'A megmosott csigákat lobogó forró vízben 30 percig főzzük, majd hideg vízzel leöblítjük, lehűtjük. Hegyes tűt szúrunk a csigahúsba, és csavaró mozdulattal kihúzzuk a házából. A csigahús tetején lévő törékeny, csavaros bélrészt letörjük és eldobjuk. A csigahúst a rajta lévő fekete résszel – amelyben a belső részek vannak – sok sóval és kevés ecettel átdörzsöljük a tenyerünk között. A vastag, nyálkás részt eltávolítjuk, ezután jól leöblítjük, és tiszta vízben kiáztatjuk a sok sót. Megmossuk, majd bő vízben feltesszük főni. A főzővízbe tegyük a fűszerzacskót és sót.4 órán keresztül főzzük lassú tűzőn, majd a saját levében hűtsük ki.Egy lábosban megolvasztjuk a vajat és a rövid metéltre vágott zöldségeket megdinszteljük. Beletesszük a főtt csigahúst és egy csészényit a főzőléből. Rászórjuk a finomra vágott fűszereket, elkeverjük és felöntjük a borral, húslevessel, majd 10 percig forraljuk. A tejszínt elkeverjük a keményítővel és a leveshez öntjük, majd még 3 percig forraljuk.\r\n\r\nÍzesítjük konyakkal és sóval. Forrón csészékbe tálaljuk.', 'kozepes', '1 kg éti csiga (3-4 napig éheztetjük, naponta kétszer átmossuk),\r\nbabérlevél,\r\nköménymag,\r\negész bors,\r\n1 fej fokhagyma félbevágva,\r\nsó,\r\n50 g vaj,\r\n50 g póréhagyma,\r\n50 g sárgarépa,\r\n50 g zeller,\r\n50 g gyökér-fehérrépa,\r\n30 g trombitagomba,\r\n1 tk petrezselyem,\r\n1 tk turbolya,\r\n1 tk kakukkfű,\r\n1 tk csalánlevél,\r\n1 csésze fehérbor,\r\n3 csésze húsleves,\r\n1 csésze tejszín,\r\n1 ek kukoricakeményítő,\r\n3 cl konyak,\r\nsó', 300, 0, 'Noba09', './images/csigaleves.jpg', 'Francia'),
(112, 'Pacalpörkölt', 'A szalonnát vágjuk csíkokra, majd a zsíron pirítsuk meg.\r\nSzűrőkanállal vegyük ki a szalonnákat a zsírból, majd tegyük bele a finomra vágott vöröshagymát, és pirítsuk aranysárgára.\r\nHa ezzel megvagyunk, vegyük le az edényünket a tűzhelyről, adjuk hozzá a fűszerpaprikát, majd tegyük vissza a tűzre, és kevés vízzel öntsük fel.\r\nA zöldpaprikát kockázzuk fel (csumáját eltávolítva), de mindenek előtt kostóljuk meg, hogy nem erős-e. Amennyiben igen, távolítsuk el az &quot;erejét&quot;. Adjuk a pörköltalaphoz, majd a felkockázott paradicsomot is. Lassú tűzön pároljuk.\r\nKözben a pacal tisztítsuk meg. Ha előfözött pacalt vásároltunk (ma már többnyire csak azt lehet kapni) akkor váltott vízben mossuk meg, majd vágjuk csíkokra, a tokányhoz hasonlóan. (Az előfőzött pacalt én már nem szoktam abálni, tovább van a pörköltalapban, amíg megpuhul, szaftja ízletesebb lesz.)\r\nAdjuk a csíkozott pacalt a pörköltalaphoz, fűszerezük zúzott fokhagymával, őrölt köménnyel, sózzuk, majd öntsük fel annyi vízzel, hogy majdnem ellepje.\r\nFedő alatt pároljuk készre, közben ellenőrizzük időnként a levét, illetve a megfelelő sós ízt alakítsuk ki.', 'konnyu', '2 kg pacal (marha),\r\n10 dkg disznózsír,\r\n12 dkg füstölt szalonna,\r\n30 dkg vöröshagyma (makói),\r\n10 g fokhagyma,\r\n5 g őrölt fűszerkömény,\r\nfűszerpaprika ízlés szerint,\r\n30 dkg zöldpaprika (nem TV paprika),\r\n15 dkg paradicsom,\r\nsó ízlés szerint', 190, 0, 'Noba09', './images/pacalpori.jpg', 'Magyaros'),
(113, 'Palacsinta', 'Egy tálba ütjük a tojásokat, majd a cukrokkal együtt kikeverjük.\r\nFolyamatos keverés mellett hozzáadjuk a tojásos keverékhez a lisztet, majd a tejet és a szódát, végül az olajat, és csomómentesre keverjük.\r\nEgy serpenyőt vagy palacsintasütőt egy ecsettel vékonyan megkenünk olajjal, majd megsütjük a palacsintákat.', 'konnyu', '3 db tojás,\r\n2 ek cukor,\r\n1 csomag vaníliás cukor,\r\n240 g finomliszt,\r\n2.5 dl tej,\r\n2.5 dl szódavíz,\r\n0.5 dl napraforgó olaj', 30, 0, 'Noba09', './images/maxresdefault.jpg', 'Magyaros'),
(114, 'Murgh makhani', 'Első körben pácoljuk be a csirkemelleket, ha van rá lehetőség, érdemes egy egész éjszakára vagy 1-2 órára. Egy nagy tálban keverjük össze a joghurtot a garam masalával és a többi (recept elején) felsorolt fűszerrel, a reszelt citromhéjjal és a sóval. Majd adjuk hozzá a nagyobb kockákra vágott csirkemelldarabokat, és alaposan forgassuk át a páccal. Rakjuk hűtőbe, és hagyjuk állni.\r\nEgy lábasban forrósítsuk fel a ghee-t. Adjuk hozzá a finomra reszelt hagymát, fokhagymát, gyömbért és az apróra vágott chilipaprikát. Pirítsuk pár percig, míg illatos nem lesz.\r\nAdjuk hozzá a sűrített paradicsomot és ízlés szerint sót. Öntsünk hozzá egy kevés vizet (opcionális, ha nagyon sűrű lenne).\r\nTegyük bele a csirkét és a passzírozott paradicsomot, majd keverjük át, és egyszer enyhén forraljuk fel. Alacsony lángon főzzük tovább fedő alatt 15-20 percig.\r\nVégül, miután a csirke megpuhult, zárjuk el a lángot alatta, és apránként keverjük bele a vajat, folyamatosan kevergetve.\r\nFőtt basmati rizzsel és házi naan kenyérrel tálaljuk, hiszen mindkettő a vajas csirke klasszikus körete.', 'nehez', '350 ml görög joghurt,\r\n1 kg csirkemellfilé,\r\n2 ek garam masala,\r\n2 ek kurkuma,\r\n1 ek római kömény,\r\n1 ek őrölt fűszerkömény,\r\n1 teáskanál füstölt pirospaprika,\r\n1 kk chilipehely,\r\n1 citromból nyert citromhéj,\r\n1 ek koriandermag,\r\n1 tk só,\r\n120 g ghee (vagy vaj),\r\n1 nagy fej fehér hagyma,\r\n4 gerezd fokhagyma,\r\n1 hüvelykujjnyi gyömbér (lereszelve),\r\n1 db chili (kimagozva),\r\n150 g sűrített paradicsom (1 konzerv),\r\nsó ízlés szerint,\r\n5 dl passzírozott paradicsom,\r\n120 g vaj,\r\n1 csokor koriander (tálaláshoz)', 60, 0, 'Noba09', './images/restaurant-style-butter-chicken-masala-murgh-makhani-1.jpg', 'Indiai');

-- --------------------------------------------------------

--
-- Table structure for table `szurok`
--

CREATE TABLE `szurok` (
  `recept_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `vegetarianus` tinyint(1) NOT NULL,
  `vegan` tinyint(1) NOT NULL,
  `gluten` tinyint(1) NOT NULL,
  `laktoz` tinyint(1) NOT NULL,
  `tojas` tinyint(1) NOT NULL,
  `szoja` tinyint(1) NOT NULL,
  `cukor` tinyint(1) NOT NULL,
  `kukorica` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `szurok`
--

INSERT INTO `szurok` (`recept_id`, `vegetarianus`, `vegan`, `gluten`, `laktoz`, `tojas`, `szoja`, `cukor`, `kukorica`) VALUES
('101', 0, 0, 0, 0, 0, 1, 1, 1),
('102', 0, 0, 1, 1, 1, 1, 1, 1),
('103', 0, 0, 0, 0, 0, 1, 0, 1),
('104', 1, 1, 0, 0, 0, 0, 0, 0),
('105', 1, 1, 0, 1, 1, 1, 0, 1),
('106', 0, 0, 1, 1, 1, 1, 1, 1),
('107', 0, 0, 0, 0, 0, 0, 0, 0),
('108', 1, 1, 0, 0, 0, 1, 0, 0),
('109', 0, 0, 0, 0, 0, 1, 1, 1),
('110', 0, 0, 0, 0, 0, 0, 0, 0),
('111', 0, 0, 0, 0, 0, 0, 1, 0),
('112', 0, 0, 1, 1, 1, 1, 1, 1),
('113', 1, 0, 0, 0, 0, 1, 0, 1),
('114', 0, 0, 0, 0, 1, 1, 1, 1),
('115', 0, 0, 0, 0, 0, 0, 1, 1),
('116', 0, 0, 1, 0, 1, 1, 1, 0),
('89', 0, 0, 0, 0, 0, 1, 1, 1),
('89', 0, 0, 0, 0, 0, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `teljes_nev` varchar(25) NOT NULL,
  `pw` varchar(100) NOT NULL,
  `szul_ido` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `teljes_nev`, `pw`, `szul_ido`, `created_at`, `email`) VALUES
(1, 'Admin', 'Admin', 'Admin', '1995-04-21', '2022-11-02 14:15:42', 'dsamkjda@fsajlkfsa.hu'),
(10, 'Teszt1', 'Teszt1', 'danamana', '1995-04-21', '2022-11-02 14:15:42', 'dsamkjda@fsajlkfsa.hu'),
(11, 'teszt1', 'teszt1', 'teszt1', '2022-12-29', '2022-11-02 14:16:21', 'teszt1@gmail.com'),
(12, 'Noba09', 'Nógrádi Balázs', 'Jelszo', '1999-03-22', '2022-12-04 20:39:05', 'nogradibalazs1999@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `receptek`
--
ALTER TABLE `receptek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `szurok`
--
ALTER TABLE `szurok`
  ADD KEY `recept_id` (`recept_id`,`vegetarianus`,`vegan`,`gluten`,`laktoz`,`tojas`,`szoja`,`cukor`,`kukorica`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `receptek`
--
ALTER TABLE `receptek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
