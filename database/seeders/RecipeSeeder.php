<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    public function run(): void
    {
        $recipes = [
            [
                'title' => 'Rendang Daging Sapi Padang Asli',
                'category' => 'Nusantara',
                'price' => 35000,
                'image' => 'https://tse1.mm.bing.net/th?q=Rendang+Daging+Sapi+Padang+Asli+food+recipe&w=800&h=600&c=7&rs=1&p=0',
                'description' => "Olahan daging sapi dengan rempah aromatik khas Minangkabau yang dimasak perlahan hingga bumbu meresap hitam kecokelatan dan gurih maksimal.\n\nKomposisi:\n1 kg Daging Sapi Bagian Paha/Sengkel\n1000 ml Santan Kental & Encer\nRempah-rempah (Serai, Daun Jeruk, Kunyit, Bawang, Cabai, Jahe, Lengkuas, Ketumbar, Pala)\n\nCatatan Chef:\nDimasak perlahan hingga bumbu mengering dan berwarna cokelat kehitaman untuk rasa yang sempurna.",
            ],
            [
                'title' => 'Nasi Goreng Kampung Spesial',
                'category' => 'Nusantara',
                'price' => 25000,
                'image' => 'https://tse1.mm.bing.net/th?q=Nasi+Goreng+Kampung+Spesial+food+recipe&w=800&h=600&c=7&rs=1&p=0',
                'description' => "Nasi goreng autentik rumahan dengan aroma terasi bakar gurih, suwiran ayam, telur mata sapi, dan taburan bawang goreng renyah.\n\nKomposisi:\nNasi Putih, Telur Ayam, Daging Ayam Suwir\nBumbu (Bawang Merah, Bawang Putih, Cabai, Terasi Bakar, Kecap Manis, Kecap Asin)\nPelengkap: Kerupuk, acar, dan bawang goreng\n\nCatatan Chef:\nDimasak dengan api besar hingga bumbu merata dan beraroma harum smokey khas nusantara.",
            ],
            [
                'title' => 'Soto Ayam Lamongan Kuah Koya Gurih',
                'category' => 'Nusantara',
                'price' => 20000,
                'image' => 'https://tse1.mm.bing.net/th?q=Soto+Ayam+Lamongan+Kuah+Koya+Gurih+food+recipe&w=800&h=600&c=7&rs=1&p=0',
                'description' => "Soto ayam berkuah kuning kental kaya kaldu dengan taburan bubuk koya renyah gurih yang khas dan menggugah selera.\n\nKomposisi:\nDaging Ayam Kampung, Kaldu Bening, Bumbu Kuning (Kunyit, Jahe, Kemiri)\nBubuk Koya, Soun, Tauge, Kol, Telur Rebus\n\nCatatan Chef:\nDisajikan panas dengan perasan jeruk nipis dan sambal untuk kesegaran ekstra.",
            ],
            [
                'title' => 'Sate Ayam Madura Bumbu Kacang Kental',
                'category' => 'Nusantara',
                'price' => 30000,
                'image' => 'https://tse1.mm.bing.net/th?q=Sate+Ayam+Madura+Bumbu+Kacang+Kental+food+recipe&w=800&h=600&c=7&rs=1&p=0',
                'description' => "Potongan daging ayam empuk dipadu bumbu marinasi, dibakar harum dengan siraman saus bumbu kacang lembut legit.\n\nKomposisi:\nDaging Dada Ayam, Kacang Tanah Halus, Gula Merah, Kecap Manis\nBawang Merah, Bawang Putih, Lontong\n\nCatatan Chef:\nDibakar di atas arang murni sambil diolesi bumbu hingga matang kecokelatan sempurna.",
            ],
            [
                'title' => 'Bakso Sapi Kuah Gurih & Tetelan',
                'category' => 'Nusantara',
                'price' => 25000,
                'image' => 'https://tse1.mm.bing.net/th?q=Bakso+Sapi+Kuah+Gurih+%26+Tetelan+food+recipe&w=800&h=600&c=7&rs=1&p=0',
                'description' => "Bakso sapi kenyal berdaging dengan kuah kaldu sapi sumsum bening gurih, potongan tetelan empuk, mie kuning, dan pangsit renyah.\n\nKomposisi:\nBakso Sapi Berkualitas, Tetelan/Lemak Sapi, Kuah Kaldu Tulang\nMie Kuning, Bihun, Tahu Bakso, Seledri, Bawang Goreng\n\nCatatan Chef:\nTetelan direbus perlahan agar kuah kaldu mengeluarkan aroma harum yang menggugah selera.",
            ],
            [
                'title' => 'Ayam Geprek Sambal Bawang Pedas Nampol',
                'category' => 'Nusantara',
                'price' => 25000,
                'image' => 'https://tse1.mm.bing.net/th?q=Ayam+Geprek+Sambal+Bawang+Pedas+Nampol+food+recipe&w=800&h=600&c=7&rs=1&p=0',
                'description' => "Ayam goreng tepung super krispi yang digeprek bersama ulekan sambal bawang merah cabai rawit pedas berminyak panas.\n\nKomposisi:\nDaging Ayam Fillet Crispy, Cabai Rawit Merah, Bawang Putih, Nasi Hangat\n\nCatatan Chef:\nSambal bawang disiram dengan minyak panas dan ayam digeprek langsung di atas cobek.",
            ],
            [
                'title' => 'Rawon Daging Sapi Khas Jawa Timur',
                'category' => 'Nusantara',
                'price' => 35000,
                'image' => 'https://tse1.mm.bing.net/th?q=Rawon+Daging+Sapi+Khas+Jawa+Timur+food+recipe&w=800&h=600&c=7&rs=1&p=0',
                'description' => "Sup daging sapi kuah hitam pekat khas rempah kluwek Jawa Timur dengan rasa gurih kaya rempah, sambal terasi, dan telur asin.\n\nKomposisi:\nDaging Sapi Sandung Lamur, Kluwek, Kemiri, Kunyit, Serai, Daun Jeruk\nTauge Pendek, Telur Asin, Kerupuk Udang\n\nCatatan Chef:\nDaging direbus hingga sangat empuk dan bumbu kluwek meresap sempurna ke dalam serat daging.",
            ],
            [
                'title' => 'Pempek Palembang Asli & Cuko Kental',
                'category' => 'Nusantara',
                'price' => 30000,
                'image' => 'https://tse1.mm.bing.net/th?q=Pempek+Palembang+Asli+%26+Cuko+Kental+food+recipe&w=800&h=600&c=7&rs=1&p=0',
                'description' => "Pempek ikan tenggiri lembut kenyal gurih digoreng garing, disajikan bersama kuah cuko hitam kental manis asam pedas legit.\n\nKomposisi:\nDaging Ikan Tenggiri Asli, Sagu Tani, Putih Telur\nKuah Cuko (Gula Merah Batok Hitam, Asam Jawa, Cabai, Bawang Putih)\n\nCatatan Chef:\nDisajikan dengan irisan mentimun segar dan mie kuning untuk pengalaman autentik.",
            ],
            [
                'title' => 'Gado-Gado Betawi Saus Kacang Medok',
                'category' => 'Nusantara',
                'price' => 20000,
                'image' => 'https://tse1.mm.bing.net/th?q=Gado-Gado+Betawi+Saus+Kacang+Medok+food+recipe&w=800&h=600&c=7&rs=1&p=0',
                'description' => "Salad sayuran khas Indonesia dengan siraman saus kacang tanah halus legit, dilengkapi lontong, tahu tempe goreng, dan emping renyah.\n\nKomposisi:\nKangkung, Tauge, Pare, Lontong, Tahu, Tempe, Telur Rebus\nSaus Kacang (Kacang Tanah, Air Asam Jawa, Santan, Gula Merah)\n\nCatatan Chef:\nSaus kacang diracik secara medok dan kental untuk menyelimuti semua isian sayuran.",
            ],

            // ==================== WESTERN ====================
            [
                'title' => 'Spaghetti Creamy Carbonara Klasik',
                'category' => 'Western',
                'price' => 45000,
                'image' => 'https://tse1.mm.bing.net/th?q=Spaghetti+Creamy+Carbonara+Klasik+food+recipe&w=800&h=600&c=7&rs=1&p=0',
                'description' => "Pasta spaghetti Italia autentik dengan saus creamy kaya keju parmesan, kuning telur, smoked beef gurih, dan lada hitam tumbuk kasar.\n\nKomposisi:\nSpaghetti Al Dente, Smoked Beef/Beef Bacon, Kuning Telur\nKeju Parmesan, Minyak Zaitun, Lada Hitam\n\nCatatan Chef:\nDibuat dengan teknik asli tanpa krim kental, hanya menggunakan emulsi keju dan kuning telur.",
            ],
            [
                'title' => 'Juicy Gourmet Beef Burger with Melted Cheese',
                'category' => 'Western',
                'price' => 50000,
                'image' => 'https://tse1.mm.bing.net/th?q=Juicy+Gourmet+Beef+Burger+with+Melted+Cheese+food+recipe&w=800&h=600&c=7&rs=1&p=0',
                'description' => "Burger daging sapi tebal yang juicy dipanggang sempurna, dilapisi lelehan keju cheddar, selada renyah, tomat segar, dan saus racikan spesial.\n\nKomposisi:\nRoti Bun Brioche Panggang, 100% Beef Patty (80/20 Lemak)\nKeju Cheddar, Bawang Bombay Karamel, Saus Burger House Blend\n\nCatatan Chef:\nPatty dipanggang di wajan besi panas (seared) untuk kerak luar yang gurih dan bagian dalam yang juicy.",
            ],
            [
                'title' => 'Crispy Thin Crust Pepperoni Pizza',
                'category' => 'Western',
                'price' => 65000,
                'image' => 'https://tse1.mm.bing.net/th?q=Crispy+Thin+Crust+Pepperoni+Pizza+food+recipe&w=800&h=600&c=7&rs=1&p=0',
                'description' => "Pizza Italia tipis renyah dengan saus tomat marinara herba, lelehan keju mozzarella melimpah, dan topping lembaran pepperoni gurih berlimpah.\n\nKomposisi:\nAdonan Pizza Tipis, Saus Tomat Marinara, Keju Mozzarella\nDaging Pepperoni Sapi, Oregano, Daun Basil\n\nCatatan Chef:\nDipanggang pada suhu 220°C agar keju meleleh berbuih keemasan dan roti renyah sempurna.",
            ],
            [
                'title' => 'Grilled Ribeye Steak with Herb Butter & Fries',
                'category' => 'Western',
                'price' => 120000,
                'image' => 'https://tse1.mm.bing.net/th?q=Grilled+Ribeye+Steak+with+Herb+Butter+%26+Fries+food+recipe&w=800&h=600&c=7&rs=1&p=0',
                'description' => "Steak daging ribeye premium dipanggang dengan teknik baste mentega herba rosemary dan bawang putih, disajikan bersama kentang goreng renyah.\n\nKomposisi:\nRibeye Sapi Premium, Mentega Tawar, Bawang Putih, Rosemary, Thyme\nKentang Goreng Krispi, Selada Baby\n\nCatatan Chef:\nDaging di-basting (disiram mentega secara berulang) saat dimasak, dan diistirahatkan agar jus terkunci.",
            ],
            [
                'title' => 'Creamy Garlic Mushroom Fettuccine',
                'category' => 'Western',
                'price' => 45000,
                'image' => 'https://tse1.mm.bing.net/th?q=Creamy+Garlic+Mushroom+Fettuccine+food+recipe&w=800&h=600&c=7&rs=1&p=0',
                'description' => "Pasta fettuccine dengan saus krim bawang putih lembut berpadu irisan jamur kancing champignon segar dan taburan keju parmesan.\n\nKomposisi:\nFettuccine, Jamur Kancing Champignon, Cooking Cream\nBawang Putih, Mentega, Keju Parmesan, Peterseli\n\nCatatan Chef:\nSaus creamy diracik hingga membalur seluruh untaian pasta secara sempurna.",
            ],

            // ==================== ASIA ====================
            [
                'title' => 'Chicken Katsu Curry Jepang',
                'category' => 'Asia',
                'price' => 45000,
                'image' => 'https://tse1.mm.bing.net/th?q=Chicken+Katsu+Curry+Jepang+food+recipe&w=800&h=600&c=7&rs=1&p=0',
                'description' => "Dada ayam fillet berbalut tepung panko super renyah disajikan bersama siraman kuah kari Jepang kental beraroma wortel dan kentang empuk.\n\nKomposisi:\nDada Ayam Crispy Panko, Nasi Hangat\nKuah Kari Jepang (Roux Kari, Wortel, Kentang, Bawang Bombay)\n\nCatatan Chef:\nKatsu digoreng deep-fry agar renyah, disandingkan dengan kuah kari hangat yang kental.",
            ],
            [
                'title' => 'Tom Yum Seafood Pedas Asam Segar',
                'category' => 'Asia',
                'price' => 55000,
                'image' => 'https://tse1.mm.bing.net/th?q=Tom+Yum+Seafood+Pedas+Asam+Segar+food+recipe&w=800&h=600&c=7&rs=1&p=0',
                'description' => "Sup khas Thailand kuah bening kemerahan berpadu udang segar, cumi, jamur enoki, aroma serai, daun jeruk, dan perasan jeruk nipis segar.\n\nKomposisi:\nUdang, Cumi, Jamur Enoki\nKuah Kaldu Udang, Pasta Tom Yum, Serai, Daun Jeruk, Cabai Rawit, Jeruk Nipis\n\nCatatan Chef:\nSeafood dimasak singkat agar teksturnya tetap kenyal dan tidak alot.",
            ],
            [
                'title' => 'Japanese Salmon Mentai Rice Bowl',
                'category' => 'Asia',
                'price' => 60000,
                'image' => 'https://tse1.mm.bing.net/th?q=Japanese+Salmon+Mentai+Rice+Bowl+food+recipe&w=800&h=600&c=7&rs=1&p=0',
                'description' => "Nasi bumbu nori gurih dengan topping suwiran salmon panggang lembut, diselimuti saus mentai creamy tobiko yang di-torch wangi aromatik.\n\nKomposisi:\nNasi Minyak Wijen Nori, Salmon Panggang Suwir\nSaus Mentai (Mayones Jepang, Tobiko, Saus Sambal), Nori Tabur\n\nCatatan Chef:\nSaus mentai di-torch langsung dengan api untuk menghasilkan aroma smokey yang khas.",
            ],
            [
                'title' => 'Dimsum Siomay Ayam Udang Lembut',
                'category' => 'Asia',
                'price' => 30000,
                'image' => 'https://tse1.mm.bing.net/th?q=Dimsum+Siomay+Ayam+Udang+Lembut+food+recipe&w=800&h=600&c=7&rs=1&p=0',
                'description' => "Siomay dimsum ala restoran oriental dengan adonan daging ayam giling berpadu cincangan udang segar kenyal dan saus cocol pedas manis.\n\nKomposisi:\nDaging Ayam Giling, Udang Segar, Minyak Wijen, Saus Tiram\nKulit Pangsit, Parutan Wortel\n\nCatatan Chef:\nDikukus dalam bambu (bamboo steamer) untuk tekstur kenyal dan lembut maksimal.",
            ],
            [
                'title' => 'Shoyu Ramen Telur Setengah Matang',
                'category' => 'Asia',
                'price' => 45000,
                'image' => 'https://tse1.mm.bing.net/th?q=Shoyu+Ramen+Telur+Setengah+Matang+food+recipe&w=800&h=600&c=7&rs=1&p=0',
                'description' => "Mie ramen kenyal dalam kuah kaldu shoyu kaya rasa, dilengkapi irisan daging chashu ayam, jamur kuping, daun bawang, dan telur ajitsuke lumer.\n\nKomposisi:\nMie Ramen, Kuah Kaldu Shoyu (Kecap Asin Jepang), Minyak Wijen\nChashu Ayam, Telur Ajitsuke Tamago (Setengah Matang), Nori\n\nCatatan Chef:\nDisajikan dengan kuah kaldu panas dan mie yang dimasak al dente.",
            ],

            // ==================== SEHAT ====================
            [
                'title' => 'Salmon Avocado & Quinoa Salad Bowl',
                'category' => 'Sehat',
                'price' => 65000,
                'image' => 'https://tse1.mm.bing.net/th?q=Salmon+Avocado+%26+Quinoa+Salad+Bowl+food+recipe&w=800&h=600&c=7&rs=1&p=0',
                'description' => "Menu sehat padat nutrisi: salmon panggang lembut, alpukat mentega, quinoa, aneka sayuran segar, dan dressing lemon mustard zaitun.\n\nKomposisi:\nFillet Salmon Panggang, Alpukat, Quinoa/Edamame, Selada Romaine, Tomat Ceri\nDressing Olive Oil Lemon Mustard\n\nCatatan Chef:\nKaya akan omega-3 dan protein nabati, sangat cocok untuk diet kalori.",
            ],
            [
                'title' => 'Green Smoothie Detox & Chia Seed',
                'category' => 'Sehat',
                'price' => 35000,
                'image' => 'https://tse1.mm.bing.net/th?q=Green+Smoothie+Detox+%26+Chia+Seed+food+recipe&w=800&h=600&c=7&rs=1&p=0',
                'description' => "Minuman detoks alami kaya serat dari bayam jepang, buah pisang manis, nanas segar, air kelapa murni, dan taburan biji chia organik.\n\nKomposisi:\nBayam Horenso, Pisang Cavendish, Buah Nanas Madu\nAir Kelapa Murni, Chia Seed, Perasan Lemon\n\nCatatan Chef:\nDiblender tanpa tambahan gula untuk menjaga khasiat alami antioksidan.",
            ],
            [
                'title' => 'Avocado Toast with Poached Egg',
                'category' => 'Sehat',
                'price' => 45000,
                'image' => 'https://tse1.mm.bing.net/th?q=Avocado+Toast+with+Poached+Egg+food+recipe&w=800&h=600&c=7&rs=1&p=0',
                'description' => "Sarapan sehat berenergi: roti gandum panggang renyah dengan alpukat tumbuk lemon berpadu telur rebus setengah matang (poached egg) lumer.\n\nKomposisi:\nRoti Gandum Sourdough, Alpukat Mentega Lumat Lemon\nPoached Egg, Chili Flakes, Biji Wijen Sangrai\n\nCatatan Chef:\nKuning telur akan meleleh saat dibelah, memberikan rasa creamy alami yang menyelimuti roti.",
            ],
            [
                'title' => 'Overnight Oatmeal Chia Seed & Fresh Berries',
                'category' => 'Sehat',
                'price' => 40000,
                'image' => 'https://tse1.mm.bing.net/th?q=Overnight+Oatmeal+Chia+Seed+%26+Fresh+Berries+food+recipe&w=800&h=600&c=7&rs=1&p=0',
                'description' => "Oatmeal praktis sehat yang direndam susu almond semalaman, dipadu biji chia, yogurt greek, madu, dan topping buah beri segar.\n\nKomposisi:\nRolled Oats, Susu Almond, Greek Yogurt, Madu Murni\nBuah Stroberi, Blueberry, Almond Panggang\n\nCatatan Chef:\nDirendam dingin (cold soak) semalaman agar nutrisi tetap terjaga sempurna.",
            ],

            // ==================== KUE & DESSERT ====================
            [
                'title' => 'Klepon Pandan Gula Merah Tradisional',
                'category' => 'Kue & Dessert',
                'price' => 20000,
                'image' => 'https://tse1.mm.bing.net/th?q=Klepon+Pandan+Gula+Merah+Tradisional+food+recipe&w=800&h=600&c=7&rs=1&p=0',
                'description' => "Kue jajanan pasar kenyal beraroma daun pandan suji asli dengan isian gula merah cair yang meletus manis di mulut berbalut parutan kelapa gurih.\n\nKomposisi:\nTepung Ketan, Ekstrak Daun Pandan Suji\nGula Merah Aren, Kelapa Parut Gurih\n\nCatatan Chef:\nGula merah di dalamnya akan meleleh dan pecah di mulut saat dikunyah.",
            ],
            [
                'title' => 'Fudgy Shiny Crust Chocolate Brownies',
                'category' => 'Kue & Dessert',
                'price' => 45000,
                'image' => 'https://tse1.mm.bing.net/th?q=Fudgy+Shiny+Crust+Chocolate+Brownies+food+recipe&w=800&h=600&c=7&rs=1&p=0',
                'description' => "Brownies cokelat panggang dengan lapisan atas shiny crust renyah mengkilap dan bagian dalam yang super fudgy padat cokelat lumer.\n\nKomposisi:\nDark Cooking Chocolate, Mentega Pilihan, Cokelat Bubuk\nTopping Almond Slice dan Chocochips\n\nCatatan Chef:\nDipanggang dengan suhu presisi agar menghasilkan kerak cokelat mengkilap di bagian atas.",
            ],
            [
                'title' => 'Japanese Fluffy Souffle Pancake',
                'category' => 'Kue & Dessert',
                'price' => 35000,
                'image' => 'https://tse1.mm.bing.net/th?q=Japanese+Fluffy+Souffle+Pancake+food+recipe&w=800&h=600&c=7&rs=1&p=0',
                'description' => "Pancake khas kafe Jepang yang super lembut dan bergoyang (jiggly fluffy) seperti kapas, disajikan bersama sirup maple dan butter.\n\nKomposisi:\nAdonan Meringue (Putih Telur Kaku), Mentega\nSirup Maple, Buah Beri Segar\n\nCatatan Chef:\nDimasak perlahan di atas pan dengan uap agar pancake mengembang tebal menyerupai awan.",
            ],
            [
                'title' => 'Martabak Manis Terang Bulan Keju Cokelat',
                'category' => 'Kue & Dessert',
                'price' => 50000,
                'image' => 'https://tse1.mm.bing.net/th?q=Martabak+Manis+Terang+Bulan+Keju+Cokelat+food+recipe&w=800&h=600&c=7&rs=1&p=0',
                'description' => "Martabak manis bersarang sempurna dengan aroma mentega wijsman wangi, taburan keju cheddar parut melimpah, cokelat meses, dan susu kental manis.\n\nKomposisi:\nAdonan Martabak Manis (Sarang Lembut), Mentega Wijsman Asli\nKeju Cheddar Parut, Meses Cokelat, Kacang Sangrai\n\nCatatan Chef:\nAdonan didiamkan lebih lama agar tekstur sarangnya empuk paripurna.",
            ],

            // ==================== MINUMAN ====================
            [
                'title' => 'Es Pisang Ijo Khas Makassar',
                'category' => 'Minuman',
                'price' => 25000,
                'image' => 'https://tse1.mm.bing.net/th?q=Es+Pisang+Ijo+Khas+Makassar+food+recipe&w=800&h=600&c=7&rs=1&p=0',
                'description' => "Minuman penutup legendaris dari Makassar: pisang raja manis berbalut adonan kulit pandan hijau lembut, disajikan dengan bubur sumsum gurih, sirup merah, dan es serut.\n\nKomposisi:\nPisang Raja, Adonan Kulit Pandan, Bubur Sumsum (Tepung Beras & Santan)\nSirup DHT/Pisang Ambon, Es Serut, Susu Kental Manis\n\nCatatan Chef:\nPerpaduan antara bubur sumsum gurih dan sirup manis membuat minuman ini sangat menyegarkan.",
            ],
            [
                'title' => 'Es Kopi Susu Gula Aren Kekinian',
                'category' => 'Minuman',
                'price' => 22000,
                'image' => 'https://tse1.mm.bing.net/th?q=Es+Kopi+Susu+Gula+Aren+Kekinian+food+recipe&w=800&h=600&c=7&rs=1&p=0',
                'description' => "Kombinasi espresso kopi yang mantap dengan susu segar creamy dan sirup gula aren asli yang legit wangi aromatik.\n\nKomposisi:\nEspresso Kopi Arabica/Robusta Blend, Susu Segar Full Cream\nSirup Gula Aren Asli, Krimer Evaporasi\n\nCatatan Chef:\nLapisan gula aren, susu, dan kopi memberikan sensasi rasa karamel kopi yang kuat namun creamy.",
            ],
            [
                'title' => 'Mango Sago Jelly Dessert Segar',
                'category' => 'Minuman',
                'price' => 30000,
                'image' => 'https://tse1.mm.bing.net/th?q=Mango+Sago+Jelly+Dessert+Segar+food+recipe&w=800&h=600&c=7&rs=1&p=0',
                'description' => "Dessert manis creamy dari potongan mangga harum manis matang, mutiara sagu kenyal, jelly mangga, dan kuah susu kelapa creamy dingin.\n\nKomposisi:\nMangga Harum Manis Asli, Sagu Mutiara Kenyal, Jelly Mangga\nSusu Evaporasi Creamy, Biji Selasih\n\nCatatan Chef:\nPuree mangga diblender bersama susu agar kuah kuah penutup ini terasa manis mangga sepenuhnya.",
            ],
            [
                'title' => 'Iced Matcha Green Tea Latte Creamy',
                'category' => 'Minuman',
                'price' => 28000,
                'image' => 'https://tse1.mm.bing.net/th?q=Iced+Matcha+Green+Tea+Latte+Creamy+food+recipe&w=800&h=600&c=7&rs=1&p=0',
                'description' => "Minuman matcha khas Jepang dari bubuk matcha premium Kyoto yang dikocok halus, dipadu susu segar creamy dan sirup vanilla manis lembut.\n\nKomposisi:\nBubuk Matcha Green Tea Asli (Ceremonial Grade), Susu Segar/Oat Milk\nSirup Vanila Premium\n\nCatatan Chef:\nMatcha diseduh dan diaduk perlahan untuk mengeluarkan buih busa teh hijau yang wangi aromatik.",
            ],
        ];

        Recipe::truncate();

        foreach ($recipes as $recipe) {
            Recipe::create($recipe);
        }
    }
}