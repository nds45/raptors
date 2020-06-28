// Brands
var brand_arr = new Array("Audi","BMW","Chevrolet","Datsun","Fiat","Ford","Hindustan Motors","Honda","Hyundai","Isuzu","Jaguar","Land Rover","Mahindra","Maruti Suzuki","Mercedes Benz","MINI","Mitsubishi","Nissan","Opel","Porsche","Renault","Skoda","Tata","Toyota","Volkswagen","Volvo");

// models
var model_a = new Array();
model_a[0] = " |";
model_a[1] = " |A3|A4|A6|A7|A8|Q3|Q5|Q7|RS4|RS6|S4|S6";//Audi
model_a[2] = " |1 Series|3 Series|5 Series|6 Series|7 Series|GT|M5|X1|X3|X5|X6";//BMW
model_a[3] = " |Aveo|Aveo U-VA|Beat|Captiva|Cruze|Enjoy|Forester|Optra|Sail|Sail Hatchback|Sail U-VA|Spark|Tavera|Trailblazer";//Chevrolet
model_a[4] = " |Go|Go Plus|Redi GO";//Datsun
model_a[5] = " |Abarth Punto|Adventure|Fiat 500|Grande Punto|Linea|Linea Classic|Palio|Petra|Punto|Uno";//Fiat
model_a[6] = " |Classic|EcoSport|EcoSport 2017|Endeavour|Endeavour 2017|Fiesta|Fiesta Classic|Figo|Figo Aspire|Freestyle|Fusion|Ikon|Mondeo|Mustang";//Ford
model_a[7] = " |Ambassador";//Hindustan Motors
model_a[8] = " |Accord|Amaze|Brio|BR-V|City|City 2017|Civic|CR-V|CR-V 2018|Jazz|Mobilio|WR-V|Civic-2019";//Honda
model_a[9] = " |Accent|Creta|Elantra|Elite i20|Eon|Getz|Grand i10|i10|I20|i20 Active|Santa Fe|Santro|Sonata|Terracan|Tucson|Verna|Xcent|Santro 2018|Venue";//Hyundai
model_a[10] = " |D-Max";//Isuzu
model_a[11] = " |XF|XFS|XJ|XJL|F-Pace|XE 2018";//Jaguar
model_a[12] = " |Discovery|Evoque|Freelander|Range Rover Sport";//Land Rover
model_a[13] = " |Alturas G4|Bolero|e2o|Jeep|KUV100|Marshal|Marazzo|NuvoSport|Quanto|Reva|Scorpio|Ssangyong Rexton|Thar|TUV300|Verito|Verito Vibe|XUV500|Xylo|XUV 300";//Mahindra
model_a[14] = " |Alto|Alto 800|Alto K10|A-Star|Baleno|Celerio|Ciaz|Dzire 2017|Eeco|Ertiga|Ertiga 2018|Esteem|Grand Vitara|Gypsy|Ignis|Kizashi|Maruti 800|Omni|Ritz|S-Cross|Swift|Swift 2018|Swift Dzire|SX4|Versa|Vitara Brezza|WagonR|WagonR Stingray|WagonR 2019|Zen|Zen Estilo";//Maruti Suzuki
model_a[15] = " |A-Class|AMG|B-Class|C-Class|CLA|CLS|E-Class|GLA|GLC|GLE|GLS|ML|S-Class";//Mercedes Benz
model_a[16] = " |Cooper|Countryman";//MINI
model_a[17] = " |Cedia|Lancer|Outlander|Pajero|Pajero Sport";//Mitsubishi
model_a[18] = " |Evalia|Micra|Micra Active|Sunny|Teana|Terrano|X-Trail|Kicks";//Nissan
model_a[19] = " |Astra|Corsa";//Opel
model_a[20] = " |Cayenne|Cayman|Panamera";//Porsche
model_a[21] = " |Captur|Duster|Fluence|Koleos|Kwid|Lodgy|Logan|Pulse|Scala";//Renault
model_a[22] = " |Fabia|Laura|Octavia|Rapid|Superb|Yeti";//Skoda
model_a[23] = " |Aria|Bolt|Hexa|Harrier|Indica|Indigo|Manza|Nano|Nexon|Safari|Sumo|Tiago|Tigor|Zest";//Tata
model_a[24] = " |Camry|Corolla|Corolla Altis|Etios|Etios Cross|Etios Liva|Fortuner|Innova|Innova Crysta|Land Cruiser|Land Cruiser Prado|New Fortuner|Prius|Qualis|Toyota Yaris";//Toyota
model_a[25] = " |Ameo|Cross Polo|Jetta|Passat|Polo|Touareg|Vento|Volkswagen Tiguan";//Volkswagen
model_a[26]= "|Volvo S90|Volvo XC90";

var url_a = new Array();
url_a[0] = " |";
url_a[1] = " |audi-a3|audi-a4|audi-a6|audi-a7|audi-a8|audi-q3|audi-q5|audi-q7|audi-rs4|audi-rs6|audi-s4|audi-s6";
url_a[2] = " |bmw-1-series|bmw-3-series|bmw-5-series|bmw-6-series|bmw-7-series|bmw-gt|bmw-m5|bmw-x1|bmw-x3|bmw-x5|bmw-x6";
url_a[3] = " |chevrolet-aveo|chevrolet-aveo-u-va|chevrolet-beat|chevrolet-captiva|chevrolet-cruze|chevrolet-enjoy|chevrolet-forester|chevrolet-optra|chevrolet-sail|chevrolet-sail-hatchback|chevrolet-sail-u-va|chevrolet-spark|chevrolet-tavera|chevrolet-trailblazer";
url_a[4] = " |datsun-go|datsun-go-plus|datsun-redi-go";
url_a[5] = " |fiat-abarth-punto|fiat-adventure|fiat-500|fiat-grande-punto|fiat-linea|fiat-linea-classic|fiat-palio|fiat-petra|fiat-punto|fiat-uno";
url_a[6] = "|ford-classic|ford-ecosport|ecosport-2017|ford-endeavour|ford-endeavour-2017|ford-fiesta|ford-fiesta-classic|ford-figo|ford-aspire|ford-freestyle|ford-fusion|ford-ikon|ford-mondeo|ford-mustang";
url_a[7] = " |ambassador";
url_a[8] = " |honda-accord|honda-amaze|honda-brio|honda-br-v|honda-city|honda-city-2017|honda-civic|honda-cr-v|honda-cr-v-2018|honda-jazz|honda-mobilio|honda-wr-v|honda-civic-2019";
url_a[9] = " |hyundai-accent|hyundai-creta|hyundai-elantra|hyundai-elite-i20|hyundai-eon|hyundai-getz|hyundai-grand-i10|hyundai-i10|hyundai-i20|hyundai-i20-active|hyundai-santa-fe|hyundai-santro|hyundai-sonata|hyundai-terracan|hyundai-tucson|hyundai-verna|hyundai-xcent|santro-2018|hyundai-venue";
url_a[10] = " |d-max";
url_a[11] = " |jaguar-xf|jaguar-xfs|jaguar-xj|jaguar-xjl|jaguar-f-pace|jaguar-xe-2018";
url_a[12] = " |land-rover-discovery|land-rover-range-rover-evoque|land-rover-freelander|land-rover-range-rover-sport";
url_a[13] = " |mahindra-alturas-g4|mahindra-bolero|mahindra-e2o|mahindra-jeep|mahindra-kuv100|mahindra-marshal|mahindra-marazzo|mahindra-nuvosport|mahindra-quanto|mahindra-reva|mahindra-scorpio|ssangyong-rexton|mahindra-thar|mahindra-tuv300|mahindra-verito|mahindra-verito-vibe|mahindra-xuv500|mahindra-xylo|mahindra-xuv300";
url_a[14] = " |maruti-alto|maruti-alto-800|alto-k10|maruti-a-star|maruti-baleno|maruti-celerio|maruti-ciaz|dzire-2017|maruti-eeco|maruti-ertiga|maruti-ertiga-2018|maruti-esteem|maruti-grand-vitara|maruti-gypsy|maruti-ignis|maruti-suzuki-kizashi|maruti-800|maruti-omni|maruti-ritz|maruti-s-cross|maruti-swift|swift-2018|maruti-swift-dzire|maruti-sx4|maruti-versa|maruti-vitara-brezza|maruti-wagonr|maruti-wagonr-stingray|maruti-wagonr-2019-car-accessories|maruti-zen|maruti-zen-estilo";
url_a[15] = " |mercedes-benz-a180|mercedes-benz-c63-amg|mercedes-benz-b-class|mercedes-c200|mercedes-cla|mercedes-benz-cls|mercedes-e350|mercedes-benz-gl|mercedes-benz-glc|mercedes-benz-gle|mercedes-benz-gls|mercedes-benz-ml|mercedes-benz-s-class";
url_a[16] = " |mini-cooper-2|mini-cooper-countryman";
 url_a[17] = "|mitsubishi-cedia|mitsubishi-lancer|mitsubishi-outlander|mitsubishi-pajero|mitsubishi-pajero-sport";
url_a[18] = " |nissan-evalia|nissan-micra|nissan-micra-active|nissan-sunny|nissan-teana|nissan-terrano|nissan-x-trail|nissan-kicks";
url_a[19] = " |opel-astra|opel-corsa";
url_a[20] = " |porsche-cayenne|porsche-cayman|porsche-panamera";
url_a[21] = " |renault-captur|renault-duster|renault-fluence|renault-koleos|renault-kwid|renault-lodgy|renault-logan|renault-pulse|renault-scala";
url_a[22] = " |skoda-fabia|skoda-laura|skoda-octavia|skoda-rapid|skoda-superb|skoda-yeti";
url_a[23] = " |tata-aria|tata-bolt|tata-hexa|tata-harrier|tata-indica|tata-indigo|tata-manza|tata-nano|tata-nexon|tata-safari|tata-sumo|tata-tiago|tata-tigor|tata-zest";
url_a[24] = " |toyota-camry|toyota-corolla|toyota-corolla-altis|toyota-etios|toyota-etios-cross|toyota-etios-liva|toyota-fortuner|toyota-innova|toyota-innova-crysta|toyota-land-cruiser|toyota-land-cruiser-prado|toyota-new-fortuner|toyota-prius|toyota-qualis|toyota-yaris";
url_a[25] = " |volkswagen-ameo|volkswagen-cross-polo|volkswagen-jetta|volkswagen-passat|volkswagen-polo|volkswagen-touareg|volkswagen-vento|volkswagen-tiguan";
url_a[26]="|volvo-s90|volvo-xc90";

function populatemodels(brandElementId, modelElementId) {

	var selectedbrandIndex = document.getElementById(brandElementId).selectedIndex;
	var modelElement = document.getElementById(modelElementId);
	modelElement.length = 0; // Fixed by Julian Woods
	//modelElement.options[0] = new Option('Select model', '0');
	modelElement.selectedIndex = 0;
	var model_arr = model_a[selectedbrandIndex].split("|");

	var selectedmodelIndex = document.getElementById(brandElementId).selectedIndex;	
	var url_arr = url_a[selectedmodelIndex].split("|");
	console.log(selectedbrandIndex);

	for (var i = 1; i < model_arr.length; i++) {
		//console.log(modelElement.length);
		var f = selectedbrandIndex;
		modelElement.options[modelElement.length] = new Option(model_arr[i], url_arr[i]);
	}

	if( selectedbrandIndex !== 0 ) {
		$('#make_url').removeClass('inactiveLink');
	}else{
		$('#make_url').addClass('inactiveLink');
	}
}

function populatebrands(brandElementId, modelElementId) {
	var brandElement = document.getElementById(brandElementId);
	brandElement.length = 0;
	brandElement.options[0] = new Option('Select brand',);
	brandElement.selectedIndex = 0;
	for (var i = 0; i < brand_arr.length; i++) {
		brandElement.options[brandElement.length] = new Option(brand_arr[i], brand_arr[i]);
	}
	if (modelElementId) {
		brandElement.onchange = function () {
			populatemodels(brandElementId, modelElementId);
		};
	}
}