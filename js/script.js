$(document).ready(function () {
  $('#vehicleBrands').select2({
    placeholder: "Wybierz markę pojazdu",
    allowClear: true
  });
  const carModels = {
    Audi: ["A1", "A3", "A5", "A6", "A7", "A8", "E-tron", "Q2", "Q3", "Q4", "Q5", "Q6", "Q7", "Q8", "R8", "100", "200", "5000", "80", "90", "A2", "A4", "Allroad", "Quattro", "S1 (1984)", "TT", "V8"],
    BMW: ["i4", "i5", "i7", "iX", "iX1", "iX2", "iX3", "Seria 1", "Seria 2", "Seria 3", "Seria 4", "Seria 5", "Seria 7", "Seria 8", "X1", "X2", "X3", "X4", "X5", "X6", "X7", "XM", "Z4", "600", "i3", "i8", "Seria 02", "Seria 6", "Z1", "Z3", "Z8"],
    Mercedes: ["AMG GT", "Citan", "CLA", "CLE", "EQA", "EQB", "EQE", "EQS", "EQV", "GLA", "GLB", "GLC", "GLE", "GLS", "Klasa A", "Klasa B", "Klasa C", "Klasa E", "Klasa G", "Klasa S", "Klasa T", "Klasa V", "Maybach GLS", "Maybach S", "SL", "Sprinter", "Vito", "190", "CL", "CLC", "CLK", "CLS", "EQC", "GLK", "Klasa GL", "Klasa M", "Klasa R", "Klasa X", "MB-100", "SLC", "SLK", "SLR McLaren", "SLS AMG", "Strich 8", "Transporter T1", "Vaneo", "Viano", "W108/109", "W110", "W111", "W123", "W124"],
    Seat: ["Arona", "Ateca", "Ibiza", "Leon", "Tarraco", "Alhambra", "Altea", "Arosa", "Cordoba", "Exeo", "Malaga", "Inca", "Marbella", "Mii", "Ronda", "Terra", "Toledo"],
    Nissan: ["350Z", "370Z", "Altima", "Armada", "Frontier", "GT-R", "Juke", "Leaf", "Maxima", "Murano", "NV3500", "Pathfinder", "Quest", "Rogue", "Sentra", "Titan", "Versa", "Xterra"],
    Renault: ["Clio", "Captur", "Kadjar", "Koleos", "Mégane", "Scénic", "Twingo", "Zoe", "Lodgy", "Dokker", "Kangoo", "Espace", "Alpine A110", "Trafic"],
    Citroen: ["C1", "C3", "C4", "C5", "C6", "C8", "Berlingo", "C3 Aircross", "C4 Cactus", "C5 Aircross", "Grand C4 Picasso", "SpaceTourer", "DS3", "DS4", "DS5"],
    Chrysler: ["300C", "Pacifica", "Voyager", "Saratoga", "Neon", "Crossfire", "Aspen"],
    Dacia: ["Lodgy", "Dokker", "Sandero", "Spring", "Stepway", "Logan", "Dokker Van", "Lodgy Stepway"],
    Fiat: ["500", "500L", "500X", "Tipo", "Panda", "Doblo", "Punto", "Qubo", "Stilo", "Bravo"],
    Ford: ["Fiesta", "Focus", "Mondeo", "Kuga", "S-Max", "Galaxy", "Mustang", "C-Max", "Edge", "Puma", "Tourneo", "Transit", "Ranger", "Ka", "Ecosport"],
    Kia: ["Ceed", "Sportage", "Niro", "Stonic", "Seltos", "Xceed", "Soul", "Proceed", "Sorento", "Carnival", "Shuma", "Opirus", "K900"],
    Honda: ["Civic", "Accord", "CR-V", "HR-V", "Jazz", "Pilot", "Insight", "Fit", "Element", "Odyssey", "Ridgeline", "Passport"],
    Hyundai: ["i10", "i20", "i30", "i40", "Kona", "Tucson", "Santa Fe", "Elantra", "Sonata", "Palisade", "Veloster", "Kona N", "Ioniq"],
    Jaguar: ["XE", "XF", "XJ", "F-Type", "F-Pace", "E-Pace", "I-Pace"],
    Jeep: ["Cherokee", "Grand Cherokee", "Wrangler", "Renegade", "Compass", "Gladiator"],
    Lexus: ["IS", "GS", "LS", "RX", "NX", "LX", "UX", "LC", "RC", "RX Hybrid", "NX Hybrid", "ES"],
    Mazda: ["2", "3", "6", "CX-3", "CX-30", "CX-5", "CX-9", "MX-5 Miata", "MX-30"],
    Opel: ["Corsa", "Astra", "Insignia", "Mokka", "Grandland", "Zafira", "Vivaro", "Ampera", "Karl"],
    Mini: ["Mini Hatch", "Mini Convertible", "Mini Countryman", "Mini Clubman", "Mini Electric"],
    Mitsubishi: ["Outlander", "L200", "ASX", "Eclipse Cross", "Pajero", "Space Star", "Shogun"],
    Peugeot: ["208", "308", "3008", "5008", "Partner", "Expert", "Traveller", "308 SW", "Rifter"],
    Skoda: ["Fabia", "Octavia", "Superb", "Kodiaq", "Karoq", "Kamiq", "Scala", "Rapid", "Roomster"],
    Smart: ["Fortwo", "Forfour"],
    Suzuki: ["Alto", "Baleno", "Swift", "Vitara", "SX4", "S-Cross", "Jimny"],
    Tesla: ["Model S", "Model 3", "Model X", "Model Y", "Roadster"],
    Toyota: ["Corolla", "Camry", "Yaris", "Hilux", "Land Cruiser", "RAV4", "Auris", "Supra", "Prius", "Avensis"],
    Volkswagen: ["Golf", "Passat", "Polo", "Tiguan", "Touareg", "Arteon", "Up!", "Sharan", "Transporter", "Amarok"],
    Volvo: ["S60", "S90", "V60", "V90", "XC40", "XC60", "XC90", "V40", "V50", "C30"],
    AlfaRomeo: ["Giulia", "Stelvio", "Giulietta", "4C", "MiTo", "Spider", "GTV", "Alfetta"],
    Ferrari: ["488 GTB", "812 Superfast", "F8 Tributo", "Portofino", "Roma", "LaFerrari", "GTC4Lusso", "California T", "Dino"],
    Infiniti: ["Q50", "Q60", "Q70", "QX50", "QX60", "QX80"],
    LandRover: ["Range Rover", "Discovery", "Defender", "Velar", "Evoque", "Freelander", "Discovery Sport"],
    Porsche: ["911", "718 Cayman", "718 Boxster", "Panamera", "Macan", "Cayenne", "Taycan"],
    Saab: ["9-3", "9-5", "9-4X", "9-7X", "900", "9000", "928"],
    Subaru: ["Impreza", "Forester", "Outback", "XV", "Legacy", "WRX", "BRZ", "Tribeca"]
  }

  $('#vehicleBrands').on('change', function () {
    const brand = $(this).val();
    const modelSelect = $('#carModel');

    modelSelect.empty().append('<option value="">Wybierz model</option>');

    if (carModels[brand]) {
      carModels[brand].forEach(function (model) {
        modelSelect.append('<option value="' + model + '">' + model + '</option>');
      });
    }
  });
});

$(document).ready(function () {
  $('#voivodeship').select2({
    placeholder: "Wybierz miasto",
    allowClear: true
  });
  const cities = {
    Lubelskie: ["Annopol", "Bełżyce", "Biała Podlaska", "Biłgoraj", "Bychawa", "Chełm", "Czemierniki", "Dęblin", "Frampol", "Goraj", "Hrubieszów", "Izbica", "Janów Lubelski", "Józefów",
      "Józefów nad Wisłą", "Kamionka", "Kazimierz Dolny", "Kock", "Końskowola", "Krasnobród", "Krasnystaw", "Kraśnik", "Kurów", "Lubartów", "Lublin", "Lubycza Królewska", "Łaszczów", "Łęczna", "Łuków", "Międzyrzec Podlaski", "Modliborzyce", "Nałęczów", "Opole Lubelskie",
      "Ostrów Lubelski", "Parczew", "Piaski", "Piszczac", "Poniatowa", "Puławy", "Radzyń Podlaski", "Rejowiec", "Rejowiec Fabryczny", "Ryki", "Siedliszcze", "Stoczek Łukowski", "Szczebrzeszyn", "Świdnik", "Tarnogród", "Terespol", "Tomaszów Lubelski", "Turobin", "Tyszowce", "Urzędów", "Wąwolnica", "Włodawa", "Zamość", "Zwierzyniec"],
    Lubuskie: ["Babimost", "Brody (powiat żarski)", "Bytom Odrzański", "Cybinka", "Czerwieńsk", "Dobiegniew", "Drezdenko", "Gorzów Wielkopolski", "Gozdnica", "Gubin", "Iłowa", "Jasień (miasto)", "Kargowa", "Kostrzyn nad Odrą", "Kożuchów", "Krosno Odrzańskie", "Lubniewice", "Lubsko", "Łęknica", "Małomice", "Międzyrzecz", "Nowa Sól", "Nowe Miasteczko", "Nowogród Bobrzański", "Ośno Lubelskie", "Otyń", "Rzepin",
      "Skwierzyna", "Sława (miasto)", "Słubice", "Strzelce Krajeńskie", "Sulechów", "Sulęcin", "Szlichtyngowa", "Szprotawa", "Świebodzin", "Torzym", "Trzciel", "Witnica",
      "Wschowa", "Zbąszynek", "Zielona Góra", "Żagań", "Żary"],
    Mazowieckie: ["Białobrzegi", "Bieżuń", "Błonie", "Bodzanów", "Brok", "Brwinów", "Cegłów", "Chorzele", "Ciechanów", "Ciepielów", "Czerwińsk nad Wisłą", "Dobre", "Drobin", "Garwolin", "Gąbin", "Gielniów", "Glinojeck", "Głowaczów", "Gostynin", "Góra Kalwaria", "Grodzisk Mazowiecki", "Grójec",
      "Halinów", "Iłża", "Jadów", "Jastrząb (miasto)", "Jedlnia-Letnisko", "Józefów (powiat otwocki)", "Kałuszyn", "Karczew", "Kazanów", "Kobyłka", "Konstancin-Jeziorna", "Kosów Lacki", "Kozienice", "Latowicz", "Legionowo", "Lipsko", "Lubowidz", "Łaskarzew", "Łochów", "Łomianki", "Łosice", "Maciejowice", "Magnuszew", "Maków Mazowiecki", "Marki",
      "Milanówek", "Mińsk Mazowiecki", "Mława", "Mogielnica", "Mordy", "Mrozy", "Mszczonów", "Myszyniec", "Nasielsk", "Nowe Miasto (powiat płoński)",
      "Nowe Miasto nad Pilicą", "Nowy Dwór Mazowiecki", "Odrzywół", "Osieck", "Ostrołęka", "Ostrów Mazowiecka", "Otwock", "Ożarów Mazowiecki", "Piaseczno", "Piastów", "Pilawa (miasto)", "Pionki", "Płock", "Płońsk", "Podkowa Leśna", "Pruszków",
      "Przasnysz", "Przysucha", "Przytyk", "Pułtusk", "Raciąż", "Radom", "Radzymin", "Różan", "Sanniki", "Serock", "Siedlce", "Siennica", "Sienno", "Sierpc", "Skaryszew", "Sochaczew", "Sochocin", "Sokołów Podlaski", "Solec nad Wisłą", "Sulejówek", "Szydłowiec", "Tarczyn", "Tłuszcz (miasto)", "Warka", "Warszawa", "Węgrów", "Wiskitki", "Wołomin", "Wyszków", "Wyszogród (województwo mazowieckie)",
      "Wyśmierzyce", "Zakroczym", "Ząbki", "Zielonka (miasto)", "Zwoleń (powiat zwoleński)", "Żelechów", "Żuromin", "Żyrardów"],
    Małopolskie: ["Alwernia", "Andrychów", "Biecz", "Bobowa", "Bochnia", "Brzesko", "Brzeszcze", "Bukowno", "Chełmek", "Chrzanów", "Ciężkowice", "Czarny Dunajec (miasto)", "Czchów", "Dąbrowa Tarnowska", "Dobczyce", "Gorlice", "Grybów", "Jordanów",
      "Kalwaria Zebrzydowska", "Kęty", "Koszyce", "Kraków", "Krynica-Zdrój", "Krzeszowice", "Książ Wielki", "Libiąż",
      "Limanowa", "Maków Podhalański", "Miechów", "Mszana Dolna", "Muszyna", "Myślenice", "Niepołomice", "Nowe Brzesko", "Nowy Sącz", "Nowy Targ", "Nowy Wiśnicz", "Olkusz", "Oświęcim", "Piwniczna-Zdrój", "Proszowice", "Rabka-Zdrój", "Radłów", "Ryglice",
      "Skała", "Skawina", "Słomniki", "Stary Sącz", "Sucha Beskidzka", "Sułkowice", "Szczawnica", "Szczucin", "Świątniki Górne", "Tarnów", "Trzebinia", "Tuchów", "Wadowice", "Wieliczka", "Wojnicz", "Wolbrom", "Zakliczyn", "Zakopane", "Zator", "Żabno"],
    Świętokrzyskie: ["Bodzentyn", "Bogoria", "Busko-Zdrój", "Chęciny", "Chmielnik", "Ćmielów", "Daleszyce", "Działoszyce", "Gowarczów", "Iwaniska", "Jędrzejów", "Kazimierza Wielka", "Kielce", "Klimontów",
      "Końskie", "Koprzywnica", "Kunów", "Łagów", "Łopuszno", "Małogoszcz", "Morawica", "Nowa Słupia", "Nowy Korczyn", "Oleśnica", "Opatowiec", "Opatów", "Osiek", "Ostrowiec Świętokrzyski", "Ożarów", "Pacanów", "Piekoszów", "Pierzchnica", "Pińczów", "Połaniec", "Radoszyce", "Sandomierz", "Sędziszów",
      "Skalbmierz", "Skarżysko-Kamienna", "Sobków", "Starachowice", "Staszów", "Stąporków", "Stopnica", "Suchedniów", "Szydłów", "Wąchock", "Wiślica", "Włoszczowa", "Wodzisław", "Zawichost"],
    Dolnośląskie: ["Bardo", "Bielawa", "Bierutów", "Bogatynia", "Boguszów-Gorce", "Bolesławiec", "Bolków", "Brzeg Dolny", "Bystrzyca Kłodzka", "Chocianów", "Chojnów", "Duszniki-Zdrój", "Dzierżoniów", "Głogów", "Głuszyca", "Góra", "Gryfów Śląski", "Jawor", "Jaworzyna Śląska", "Jedlina-Zdrój", "Jelcz-Laskowice", "Jelenia Góra", "Kamieniec Ząbkowicki", "Kamienna Góra", "Karpacz", "Kąty Wrocławskie", "Kłodzko", "Kowary", "Kudowa-Zdrój", "Lądek-Zdrój", "Legnica",
      "Leśna", "Lubań", "Lubawka", "Lubin", "Lubomierz", "Lwówek Śląski", "Mieroszów", "Międzybórz", "Międzylesie", "Miękinia", "Milicz", "Mirsk", "Niemcza", "Nowa Ruda", "Nowogrodziec", "Oborniki Śląskie", "Oleśnica", "Olszyna", "Oława", "Piechowice", "Pieńsk", "Pieszyce", "Piława Górna", "Polanica-Zdrój", "Polkowice", "Prochowice", "Prusice", "Przemków", "Radków", "Siechnice", "Sobótka", "Stronie Śląskie", "Strzegom", "Strzelin", "Syców",
      "Szczawno-Zdrój", "Szczytna", "Szklarska Poręba", "Ścinawa", "Środa Śląska", "Świdnica", "Świebodzice",
      "Świeradów-Zdrój", "Świerzawa", "Trzebnica", "Twardogóra", "Wałbrzych", "Wąsosz", "Węgliniec", "Wiązów", "Wleń", "Wojcieszów", "Wołów", "Wrocław", "Zawidów", "Ząbkowice Śląskie", "Zgorzelec", "Ziębice", "Złotoryja", "Złoty Stok", "Żarów", "Żmigród"],
    KujawskoPomorskie: ["Aleksandrów Kujawski", "Barcin", "Bobrowniki", "Brodnica", "Brześć Kujawski", "Bydgoszcz", "Chełmno", "Chełmża", "Chodecz", "Ciechocinek", "Dobrzyń nad Wisłą", "Gąsawa", "Gniewkowo", "Golub-Dobrzyń", "Górzno", "Grudziądz", "Inowrocław", "Izbica Kujawska", "Jabłonowo Pomorskie", "Janikowo", "Janowiec Wielkopolski", "Kamień Krajeński", "Kcynia", "Kikół", "Koronowo", "Kowal", "Kowalewo Pomorskie", "Kruszwica", "Lipno", "Lubień Kujawski", "Lubraniec", "Łabiszyn", "Łasin", "Mogilno", "Mrocza", "Nakło nad Notecią", "Nieszawa", "Nowe", "Pakość", "Piotrków Kujawski", "Pruszcz", "Radziejów", "Radzyń Chełmiński", "Rypin", "Sępólno Krajeńskie", "Skępe", "Solec Kujawski", "Strzelno", "Szubin", "Świecie", "Toruń", "Tuchola", "Wąbrzeźno", "Więcbork", "Włocławek", "Żnin"],
    Lodzkie: ["Aleksandrów Łódzki", "Bełchatów", "Biała Rawska", "Białaczów", "Błaszki", "Bolesławiec", "Bolimów", "Brzeziny", "Dąbrowice", "Drzewica", "Działoszyn", "Głowno", "Grabów", "Inowłódz", "Jeżów", "Kamieńsk", "Kiernozia", "Koluszki", "Konstantynów Łódzki", "Krośniewice", "Kutno", "Lutomiersk", "Lututów", "Łask", "Łęczyca", "Łowicz", "Łódź", "Opoczno", "Osjaków", "Ozorków", "Pabianice", "Pajęczno", "Parzęczew", "Piątek", "Piotrków Trybunalski", "Poddębice", "Przedbórz", "Radomsko", "Rawa Mazowiecka", "Rozprza", "Rzgów", "Sieradz", "Skierniewice", "Stryków", "Sulejów", "Szadek", "Tomaszów Mazowiecki", "Tuszyn", "Ujazd",
      "Uniejów", "Warta", "Wieluń", "Wieruszów", "Wolbórz", "Zduńska Wola", "Zelów", "Zgierz", "Złoczew", "Żarnów", "Żychlin"],
    Opolskie: ["Baborów", "Biała", "Brzeg", "Byczyna", "Dobrodzień", "Głogówek", "Głubczyce", "Głuchołazy", "Gogolin", "Gorzów Śląski", "Grodków", "Kędzierzyn-Koźle", "Kietrz", "Kluczbork", "Kolonowskie", "Korfantów", "Krapkowice", "Leśnica", "Lewin Brzeski", "Namysłów", "Niemodlin", "Nysa", "Olesno", "Opole", "Otmuchów", "Ozimek", "Paczków", "Praszka", "Prószków", "Prudnik", "Strzelce Opolskie", "Strzeleczki", "Tułowice", "Ujazd", "Wołczyn", "Zawadzkie", "Zdzieszowice"],
    Podlaskie: ["Augustów", "Białystok", "Bielsk Podlaski", "Brańsk", "Choroszcz", "Ciechanowiec", "Czarna Białostocka", "Czyżew", "Dąbrowa Białostocka", "Drohiczyn", "Goniądz", "Grajewo", "Hajnówka", "Jedwabne", "Kleszczele", "Knyszyn", "Kolno", "Krynki", "Lipsk", "Łapy", "Łomża", "Michałowo", "Mońki", "Nowogród", "Rajgród", "Sejny", "Siemiatycze", "Sokółka", "Stawiski", "Suchowola", "Supraśl", "Suraż", "Suwałki", "Szczuczyn", "Szepietowo",
      "Tykocin", "Wasilków", "Wysokie Mazowieckie", "Zabłudów", "Zambrów"],
    Pomorskie: ["Brusy", "Bytów", "Chojnice", "Czarna Woda", "Czarne", "Czersk", "Człuchów", "Debrzno", "Dzierzgoń", "Gdańsk", "Gdynia", "Gniew", "Hel", "Jastarnia", "Kartuzy", "Kępice", "Kobylnica", "Kościerzyna", "Krynica Morska", "Kwidzyn", "Lębork", "Łeba", "Malbork", "Miastko", "Nowy Dwór Gdański", "Nowy Staw", "Pelplin", "Prabuty", "Pruszcz Gdański", "Puck", "Reda", "Rumia", "Skarszewy", "Skórcz", "Słupsk", "Sopot", "Starogard Gdański", "Sztum", "Tczew", "Ustka", "Wejherowo", "Władysławowo", "Żukowo"],
    WarminskoMazurskie: ["Barczewo", "Bartoszyce", "Biała Piska", "Biskupiec", "Bisztynek", "Braniewo", "Dobre Miasto", "Działdowo", "Elbląg", "Ełk", "Frombork", "Giżycko", "Gołdap", "Górowo Iławeckie", "Iława", "Jeziorany", "Kętrzyn", "Kisielice", "Korsze", "Lidzbark", "Lidzbark Warmiński", "Lubawa", "Mikołajki", "Miłakowo", "Miłomłyn", "Młynary", "Morąg", "Mrągowo", "Nidzica", "Nowe Miasto Lubawskie", "Olecko", "Olsztyn", "Olsztynek", "Orneta", "Orzysz", "Ostróda", "Pasłęk", "Pasym", "Pieniężno", "Pisz", "Reszel", "Ruciane-Nida", "Ryn", "Sępopol", "Susz", "Szczytno", "Tolkmicko", "Węgorzewo", "Wielbark", "Zalewo"],
    Zachodniopomorskie: ["Barlinek", "Barwice", "Białogard", "Biały Bór", "Bobolice", "Borne Sulinowo", "Cedynia", "Chociwel", "Chojna", "Choszczno", "Czaplinek", "Człopa", "Darłowo", "Dębno", "Dobra", "Dobrzany", "Drawno", "Drawsko Pomorskie", "Dziwnów", "Golczewo", "Goleniów", "Gościno", "Gryfice", "Gryfino", "Ińsko", "Kalisz Pomorski", "Kamień Pomorski", "Karlino", "Kołobrzeg", "Koszalin", "Lipiany", "Łobez", "Maszewo", "Mielno", "Mieszkowice", "Międzyzdroje", "Mirosławiec", "Moryń", "Myślibórz", "Nowe Warpno", "Nowogard", "Pełczyce", "Płoty", "Polanów", "Police",
      "Połczyn-Zdrój", "Pyrzyce", "Recz", "Resko", "Sianów", "Sławno", "Stargard", "Stepnica", "Suchań", "Szczecin", "Szczecinek", "Świdwin", "Świnoujście", "Trzcińsko-Zdrój", "Trzebiatów", "Tuczno", "Tychowo", "Wałcz", "Węgorzyno", "Wolin", "Złocieniec"],
    Wielkopolskie: ["Bojanowo", "Borek Wielkopolski", "Budzyń", "Buk", "Chocz", "Chodzież", "Czarnków", "Czempiń", "Czerniejewo", "Dąbie", "Dobra", "Dobrzyca", "Dolsk", "Gniezno", "Golina", "Gołańcz", "Gostyń", "Grabów nad Prosną", "Grodzisk Wielkopolski", "Jaraczewo", "Jarocin", "Jastrowie", "Jutrosin", "Kaczory", "Kalisz", "Kępno", "Kleczew", "Kłecko", "Kłodawa", "Kobylin", "Koło", "Konin", "Kostrzyn", "Kościan", "Koźmin Wielkopolski", "Koźminek", "Kórnik", "Krajenka", "Krobia", "Krotoszyn", "Krzywiń", "Krzyż Wielkopolski", "Książ Wielkopolski", "Leszno", "Luboń", "Lwówek", "Łobżenica", "Margonin", "Miasteczko Krajeńskie", "Miejska Górka",
      "Mieścisko", "Międzychód", "Mikstat", "Miłosław", "Mosina", "Murowana Goślina", "Nekla", "Nowe Skalmierzyce", "Nowy Tomyśl", "Oborniki", "Obrzycko", "Odolanów", "Okonek", "Opalenica", "Opatówek", "Osieczna", "Ostroróg", "Ostrów Wielkopolski", "Ostrzeszów", "Piła", "Pleszew", "Pniewy", "Pobiedziska", "Pogorzela", "Poniec", "Poznań", "Przedecz", "Puszczykowo", "Pyzdry", "Rakoniewice", "Raszków", "Rawicz", "Rogoźno", "Rychtal", "Rychwał", "Rydzyna", "Sieraków", "Skoki", "Słupca", "Sompolno", "Stawiszyn", "Stęszew", "Sulmierzyce", "Swarzędz", "Szamocin", "Szamotuły", "Ślesin", "Śmigiel", "Śrem", "Środa Wielkopolska", "Trzcianka", "Trzemeszno", "Tuliszków", "Turek", "Ujście", "Wągrowiec",
      "Wieleń", "Wielichowo", "Witkowo", "Wolsztyn", "Wronki", "Września", "Wyrzysk", "Wysoka", "Zagórów", "Zaniemyśl", "Zbąszyń", "Zduny", "Złotów", "Żerków"
    ],
  }

  $('#voivodeship').on('change', function () {
    const selectedVoivodeship = $(this).val();  
    const citySelect = $('#city');  
    citySelect.empty().append('<option value="">Wybierz miasto</option>'); 

    if (cities[selectedVoivodeship]) { 
      cities[selectedVoivodeship].forEach(function (city) {
        citySelect.append('<option value="' + city + '">' + city + '</option>');  
      });
    }
  });
});