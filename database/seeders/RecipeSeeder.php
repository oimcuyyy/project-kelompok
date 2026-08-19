<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recipes = [
            // ==================== NUSANTARA ====================
            [
                'title' => 'Rendang Daging Sapi Padang Asli',
                'category' => 'Nusantara',
                'cooking_time' => 180,
                'image' => 'https://images.unsplash.com/photo-1604382354936-07c5d9983bd3?w=800&auto=format&fit=crop&q=80',
                'description' => 'Olahan daging sapi dengan rempah aromatik khas Minangkabau yang dimasak perlahan hingga bumbu meresap hitam kecokelatan dan gurih maksimal.',
                'ingredients' => "1 kg Daging Sapi Bagian Paha/Sengkel (potong dadu besar)\n1000 ml Santan Kental dari 3 butir kelapa tua\n1000 ml Santan Encer\n4 batang Serai (memarkan)\n6 lembar Daun Jeruk Purut\n2 lembar Daun Kunyit (ikat simpul)\n3 buah Asam Kandis\n12 siung Bawang Merah\n8 siung Bawang Putih\n100 gram Cabai Merah Keriting\n3 cm Jahe & Lengkuas\n1 sdm Ketumbar Bubuk\n1 sdt Pala Bubuk\nGaram dan gula secukupnya",
                'steps' => "Haluskan bumbu: bawang merah, bawang putih, cabai merah, jahe, lengkuas, ketumbar, dan pala.\nRebus santan encer bersama bumbu halus, serai, daun jeruk, daun kunyit, dan asam kandis hingga mendidih sambil terus diaduk agar santan tidak pecah.\nMasukkan potongan daging sapi, aduk rata dan masak dengan api sedang hingga kuah mulai menyusut dan mengeluarkan minyak.\nTuangkan santan kental, kecilkan api dan masak perlahan hingga bumbu mengering dan berwarna cokelat kehitaman.\nAduk secara berkala hingga bumbu meresap sempurna. Angkat dan sajikan hangat.",
            ],
            [
                'title' => 'Nasi Goreng Kampung Spesial',
                'category' => 'Nusantara',
                'cooking_time' => 20,
                'image' => 'https://images.unsplash.com/photo-1603133872878-684f208fb84b?w=800&auto=format&fit=crop&q=80',
                'description' => 'Nasi goreng autentik rumahan dengan aroma terasi bakar gurih, suwiran ayam, telur mata sapi, dan taburan bawang goreng renyah.',
                'ingredients' => "2 piring Nasi Putih Dingin (pera)\n2 butir Telur Ayam\n100 gram Daging Ayam Suwir\n4 siung Bawang Merah\n2 siung Bawang Putih\n5 buah Cabai Rawit Merah\n1 sdt Terasi Bakar\n2 sdm Kecap Manis Berkualitas\n1 sdm Kecap Asin\n1 batang Daun Bawang (iris halus)\nKerupuk, acar mentimun, dan bawang goreng",
                'steps' => "Ulek kasar bawang merah, bawang putih, cabai rawit, dan terasi bakar.\nPanaskan sedikit minyak, orak-arik 1 butir telur lalu sisihkan.\nTumis bumbu ulek hingga harum dan matang, lalu masukkan suwiran ayam.\nMasukkan nasi putih dingin, tuangkan kecap manis, kecap asin, garam, dan lada bubuk.\nAduk cepat dengan api besar hingga bumbu merata dan beraroma harum smokey.\nMasukkan daun bawang sesaat sebelum diangkat. Sajikan bersama telur ceplok dan kerupuk.",
            ],
            [
                'title' => 'Soto Ayam Lamongan Kuah Koya Gurih',
                'category' => 'Nusantara',
                'cooking_time' => 50,
                'image' => 'https://images.unsplash.com/photo-1572656631137-7935297eff55?w=800&auto=format&fit=crop&q=80',
                'description' => 'Soto ayam berkuah kuning kental kaya kaldu dengan taburan bubuk koya renyah gurih yang khas dan menggugah selera.',
                'ingredients' => "500 gram Daging Ayam Kampung\n1.5 liter Air Bersih\n5 siung Bawang Merah & 4 siung Bawang Putih\n3 cm Kunyit Bakar & 2 cm Jahe\n4 butir Kemiri Sangrai\n2 batang Serai & 3 lembar Daun Salam\nBahan Koya: 5 keping kerupuk udang goreng + 3 siung bawang putih goreng (dihaluskan)\nPelengkap: Soun rebus, tauge pendek, kol iris, telur rebus, sambal cabai, dan perasan jeruk nipis",
                'steps' => "Rebus ayam dalam air hingga empuk untuk menghasilkan kaldu gurih.\nHaluskan bumbu kuning lalu tumis bersama serai dan daun salam hingga matang harum.\nMasukkan tumisan bumbu ke dalam kuah kaldu ayam rebusan. Bumbui garam, gula, dan lada.\nAngkat ayam, goreng sebentar lalu suwir-suwir.\nTata soun, kol, tauge, dan ayam suwir di mangkuk.\nSiram dengan kuah soto panas, taburkan bubuk koya renyah dan perasan jeruk nipis.",
            ],
            [
                'title' => 'Sate Ayam Madura Bumbu Kacang Kental',
                'category' => 'Nusantara',
                'cooking_time' => 45,
                'image' => 'https://images.unsplash.com/photo-1555939594-58d7cb561ad1?w=800&auto=format&fit=crop&q=80',
                'description' => 'Potongan daging ayam empuk dipadu bumbu marinasi, dibakar harum dengan siraman saus bumbu kacang lembut legit.',
                'ingredients' => "500 gram Daging Dada Ayam (potong dadu)\nTusuk sate secukupnya\n200 gram Kacang Tanah (goreng lalu haluskan)\n3 siung Bawang Putih & 4 siung Bawang Merah\n3 butir Kemiri Sangrai\n50 gram Gula Merah Sisir\n4 sdm Kecap Manis\n1 sdt Garam & 200 ml Air Matang\nPelengkap: Lontong, irisan bawang merah, dan cabai rawit",
                'steps' => "Tusuk daging ayam pada tusukan sate (3-4 potong per tusuk).\nCampurkan bumbu kacang: tumis bawang putih, bawang merah, dan kemiri halus, masukkan kacang halus, gula merah, kecap manis, garam, dan air. Masak hingga berminyak.\nAmbil 2 sdm bumbu kacang campur dengan sedikit kecap manis untuk bahan olesan saat memanggang.\nBakar sate di atas panggangan/arang sambil diolesi bumbu hingga matang kecokelatan.\nSajikan sate ayam hangat bersama siraman bumbu kacang, kecap manis, irisan bawang merah, dan lontong.",
            ],
            [
                'title' => 'Bakso Sapi Kuah Gurih & Tetelan',
                'category' => 'Nusantara',
                'cooking_time' => 60,
                'image' => 'https://images.unsplash.com/photo-1569718212165-3a8278d5f624?w=800&auto=format&fit=crop&q=80',
                'description' => 'Bakso sapi kenyal berdaging dengan kuah kaldu sapi sumsum bening gurih, potongan tetelan empuk, mie kuning, dan pangsit renyah.',
                'ingredients' => "30 butir Bakso Sapi Berkualitas\n250 gram Tetelan / Lemak Sapi\n2 liter Air Kaldu Tulang Sapi\n8 siung Bawang Putih (goreng lalu haluskan)\n4 siung Bawang Merah (goreng lalu haluskan)\n1 sdm Garam & 1 sdt Merica Bubuk\nPelengkap: Mie kuning, bihun, tahu bakso, seledri, bawang goreng, saus sambal, dan kecap manis",
                'steps' => "Rebus tetelan sapi dalam air kaldu hingga empuk dan mengeluarkan aroma harum kaldu.\nMasukkan bawang putih dan bawang merah goreng yang telah dihaluskan ke dalam kuah kaldu.\nBumbui kuah dengan garam, gula, merica bubuk, dan kaldu sapi bubuk. Koreksi rasa.\nMasukkan butiran bakso sapi, masak hingga bakso mengembang dan mengapung.\nSajikan di mangkuk bersama mie kuning, bihun, taburan seledri, bawang goreng, dan sambal pedas.",
            ],
            [
                'title' => 'Ayam Geprek Sambal Bawang Pedas Nampol',
                'category' => 'Nusantara',
                'cooking_time' => 30,
                'image' => 'https://images.unsplash.com/photo-1626082927389-6cd097cdc6ec?w=800&auto=format&fit=crop&q=80',
                'description' => 'Ayam goreng tepung super krispi yang digeprek bersama ulekan sambal bawang merah cabai rawit pedas berminyak panas.',
                'ingredients' => "4 potong Daging Ayam Fillet / Paha\n1 bungkus Tepung Bumbu Serbaguna Crispy\n15 buah Cabai Rawit Merah\n3 siung Bawang Putih\n1/2 sdt Garam & 1/4 sdt Penyedap Rasa\n3 sdm Minyak Panas Bekas Menggoreng Ayam\nNasi Putih Hangat & Timun Segar",
                'steps' => "Baluri ayam dengan tepung bumbu basah lalu gulingkan ke tepung kering sambil dicubit-cubit agar keriting.\nGoreng ayam dalam minyak panas terendam (deep frying) hingga matang keemasan dan renyah. Angkat dan tiriskan.\nUlek kasar cabai rawit merah, bawang putih, garam, dan penyedap rasa di atas cobek.\nSiram sambal dengan minyak panas sisa menggoreng ayam, aduk rata.\nLetakkan ayam goreng crispy di atas cobek, geprek hingga hancur dan lumuri dengan sambal bawang.",
            ],
            [
                'title' => 'Rawon Daging Sapi Khas Jawa Timur',
                'category' => 'Nusantara',
                'cooking_time' => 90,
                'image' => 'https://images.unsplash.com/photo-1541832676-9b763b0239ab?w=800&auto=format&fit=crop&q=80',
                'description' => 'Sup daging sapi kuah hitam pekat khas rempah kluwek Jawa Timur dengan rasa gurih kaya rempah, sambal terasi, dan telur asin.',
                'ingredients' => "500 gram Daging Sapi Sandung Lamur (potong dadu)\n5 buah Kluwek (ambil isinya, rendam air panas)\n8 siung Bawang Merah & 5 siung Bawang Putih\n4 butir Kemiri Sangrai & 2 cm Kunyit\n2 batang Serai & 4 lembar Daun Jeruk\n2 batang Daun Bawang (potong 1 cm)\nPelengkap: Tauge pendek segar, telur asin, sambal terasi, dan kerupuk udang",
                'steps' => "Rebus daging sapi sandung lamur hingga empuk, saring air kaldunya.\nHaluskan kluwek bersama bawang merah, bawang putih, kemiri, kunyit, dan jahe.\nTumis bumbu halus bersama serai dan daun jeruk hingga benar-benar harum dan matang.\nMasukkan tumisan bumbu ke dalam kuah kaldu daging rebusan.\nMasak hingga bumbu meresap sempurna ke dalam serat daging sapi.\nSajikan rawon panas bersama taburan daun bawang, tauge pendek, telur asin, dan sambal.",
            ],
            [
                'title' => 'Pempek Palembang Asli & Cuko Kental',
                'category' => 'Nusantara',
                'cooking_time' => 60,
                'image' => 'https://images.unsplash.com/photo-1589301760014-d929f3979dbc?w=800&auto=format&fit=crop&q=80',
                'description' => 'Pempek ikan tenggiri lembut kenyal gurih digoreng garing, disajikan bersama kuah cuko hitam kental manis asam pedas legit.',
                'ingredients' => "500 gram Daging Ikan Tenggiri Giling\n400 gram Tepung Tapioka / Sagu Tani\n1 butir Putih Telur\n250 ml Air Es Dingin\n1 sdm Garam & 1 sdt Gula Pasir\nBahan Cuko: 250 gram Gula Merah Batok Hitam + 500 ml Air + 50 gram Asam Jawa + 8 siung Bawang Putih + 15 Cabai Rawit Hijau (haluskan) + 1 sdt Garam\nPelengkap: Irisan mentimun dan mie kuning",
                'steps' => "Campurkan ikan tenggiri giling dengan air es dan putih telur, aduk rata hingga mengental.\nTambahkan garam dan gula, aduk searah hingga adonan kenyal.\nMasukkan tepung tapioka sedikit demi sedikit, uleni ringan agar adonan tidak keras.\nBentuk adonan menjadi kapal selam (isi kuning telur) atau lenjer.\nRebus pempek dalam air mendidih hingga mengapung matang, lalu tiriskan.\nBuat cuko: rebus air bersama gula merah batok dan asam jawa, masukkan bumbu halus bawang dan cabai, masak hingga mendidih kental lalu saring.\nGoreng pempek hingga berkulit krispi, potong-potong dan siram dengan kuah cuko pedas asam segar.",
            ],
            [
                'title' => 'Gado-Gado Betawi Saus Kacang Medok',
                'category' => 'Nusantara',
                'cooking_time' => 35,
                'image' => 'https://images.unsplash.com/photo-1540420773420-3366772f4999?w=800&auto=format&fit=crop&q=80',
                'description' => 'Salad sayuran khas Indonesia dengan siraman saus kacang tanah halus legit, dilengkapi lontong, tahu tempe goreng, dan emping renyah.',
                'ingredients' => "100 gram Kangkung / Bayam Rebus\n100 gram Tauge Seduh Air Panas\n1 buah Mentimun Segar (iris tipis)\n1 buah Pare / Labu Siam Rebus\n2 buah Tahu Goreng & Tempe Goreng\n2 butir Telur Rebus\nBahan Saus Kacang: 200 gram Kacang Tanah Goreng Halus + 3 siung Bawang Putih Goreng + 3 buah Cabai Merah + 50 gram Gula Merah + 1 sdt Air Asam Jawa + 150 ml Santan Hangat\nPelengkap: Emping melinjo dan kerupuk bawang",
                'steps' => "Ulek bawang putih, cabai, gula merah, dan garam di atas cobek.\nTambahkan kacang tanah goreng yang sudah dihaluskan, air asam jawa, dan santan hangat. Aduk hingga terbentuk saus kacang yang medok dan kental.\nTata semua sayuran rebus, irisan tahu, tempe, mentimun, dan potongan telur rebus di piring saji.\nSiram dengan saus kacang melimpah.\nTaburi dengan bawang goreng renyah dan emping melinjo gurih.",
            ],

            // ==================== WESTERN ====================
            [
                'title' => 'Spaghetti Creamy Carbonara Klasik',
                'category' => 'Western',
                'cooking_time' => 25,
                'image' => 'https://images.unsplash.com/photo-1612874742237-6526221588e3?w=800&auto=format&fit=crop&q=80',
                'description' => 'Pasta spaghetti Italia autentik dengan saus creamy kaya keju parmesan, kuning telur, smoked beef gurih, dan lada hitam tumbuk kasar.',
                'ingredients' => "200 gram Spaghetti\n3 lembar Smoked Beef / Beef Bacon (potong kotak)\n2 butir Kuning Telur + 1 butir Telur Utuh\n50 gram Keju Parmesan Parut\n2 siung Bawang Putih (cincang halus)\n1 sdm Extra Virgin Olive Oil\n1/2 sdt Lada Hitam Tumbuk Kasar\nAir rebusan pasta secukupnya",
                'steps' => "Rebus spaghetti dalam air mendidih bergaram hingga al dente (8-9 menit). Simpan 1/2 cangkir air pasta.\nKocok kuning telur, telur utuh, dan keju parmesan parut dengan lada hitam di mangkuk terpisah.\nPanaskan minyak zaitun, tumis bawang putih dan smoked beef hingga harum dan garing.\nMatikan api kompor, masukkan pasta spaghetti hangat ke dalam pan.\nTuang kocokan telur keju sambil diaduk cepat bersama sedikit air rebusan pasta hingga terbentuk saus lembut mengkilap tanpa menggumpal.\nSajikan segera dengan taburan parmesan ekstra.",
            ],
            [
                'title' => 'Juicy Gourmet Beef Burger with Melted Cheese',
                'category' => 'Western',
                'cooking_time' => 30,
                'image' => 'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=800&auto=format&fit=crop&q=80',
                'description' => 'Burger daging sapi tebal yang juicy dipanggang sempurna, dilapisi lelehan keju cheddar, selada renyah, tomat segar, dan saus racikan spesial.',
                'ingredients' => "2 buah Roti Bun Burger Brioche (panggang sebentar)\n300 gram Daging Sapi Giling (80/20 lemak)\n2 lembar Keju Cheddar Slice\n1 buah Tomat Segar (iris bulat)\nDaun Selada Hijau Segar\n1/2 buah Bawang Bombay (karamelisasi sebentar)\nSaus Burger: 2 sdm Mayones + 1 sdm Saus Tomat + 1 sdt Saus Mustard + 1/2 sdt Bubuk Bawang Putih\nGaram & Lada Hitam",
                'steps' => "Bentuk daging giling menjadi bulatan patty, bumbui kedua sisi dengan garam dan lada.\nPanggang patty di atas wajan besi panas selama 3-4 menit hingga kecokelatan.\nBalik patty dan letakkan keju cheddar di atasnya, tutup wajan sebentar hingga keju meleleh sempurna.\nOleskan saus burger pada belahan bawah roti bun burger yang hangat.\nSusun selada, irisan tomat, patty berkeju leleh, dan bawang bombay karamel.\nTutup dengan roti bagian atas dan nikmati selagi hangat.",
            ],
            [
                'title' => 'Crispy Thin Crust Pepperoni Pizza',
                'category' => 'Western',
                'cooking_time' => 35,
                'image' => 'https://images.unsplash.com/photo-1513104890138-7c749659a591?w=800&auto=format&fit=crop&q=80',
                'description' => 'Pizza Italia tipis renyah dengan saus tomat marinara herba, lelehan keju mozzarella melimpah, dan topping lembaran pepperoni gurih berlimpah.',
                'ingredients' => "1 lembar Adonan Pizza Dough Tipis\n100 gram Saus Tomat Marinara / Pizza Sauce\n150 gram Keju Mozzarella Parut\n15 lembar Daging Pepperoni Sapi\n1 sdt Minyak Zaitun\n1/2 sdt Oregano Kering & Daun Basil Segar",
                'steps' => "Panaskan oven pada suhu 220°C.\nPipihkan adonan pizza di atas loyang panggang bertabur sedikit tepung.\nOleskan saus tomat marinara secara merata ke seluruh permukaan adonan, sisakan tepi pinggiran.\nTaburkan keju mozzarella parut melimpah di atas saus.\nTata lembaran pepperoni sapi secara teratur di atas keju.\nPanggang selama 12-15 menit hingga keju meleleh berbuih keemasan dan pinggiran roti renyah.\nKeluarkan dari oven, taburi oregano dan potongan daun basil segar sebelum dipotong.",
            ],
            [
                'title' => 'Grilled Ribeye Steak with Herb Butter & Fries',
                'category' => 'Western',
                'cooking_time' => 25,
                'image' => 'https://images.unsplash.com/photo-1544025162-d76694265947?w=800&auto=format&fit=crop&q=80',
                'description' => 'Steak daging ribeye premium dipanggang dengan teknik baste mentega herba rosemary dan bawang putih, disajikan bersama kentang goreng renyah.',
                'ingredients' => "250 gram Daging Ribeye Sapi Premium (tebal 2-3 cm)\n2 sdm Mentega Tawar (Unsalted Butter)\n2 siung Bawang Putih (geprek)\n2 tangkai Rosemary Segar & Thyme\n1 sdt Garam Kasar (Sea Salt) & Lada Hitam Tumbuk\nPelengkap: Kentang goreng krispi dan selada baby",
                'steps' => "Keringkan permukaan daging ribeye dengan tisu dapur, bumbui merata dengan garam laut dan lada hitam.\nPanaskan wajan besi tebal (cast iron skillet) dengan api tinggi hingga sangat panas beruap.\nLetakkan steak ke dalam wajan, masak 2-3 menit tanpa digeser hingga terbentuk kerak cokelat karamel gurih.\nBalik steak, masukkan mentega, bawang putih geprek, dan rosemary.\nSendokkan lelehan mentega herba ke atas permukaan daging secara berulang (basting) selama 2 menit untuk kematangan medium rare/medium.\nAngkat steak dan istirahatkan (resting) selama 5-7 menit di atas talenan agar sari daging terkunci lembut.\nSajikan bersama kentang goreng renyah dan herba segar.",
            ],
            [
                'title' => 'Creamy Garlic Mushroom Fettuccine',
                'category' => 'Western',
                'cooking_time' => 20,
                'image' => 'https://images.unsplash.com/photo-1621996346565-e3d5d6281033?w=800&auto=format&fit=crop&q=80',
                'description' => 'Pasta fettuccine dengan saus krim bawang putih lembut berpadu irisan jamur kancing champignon segar dan taburan keju parmesan.',
                'ingredients' => "200 gram Fettuccine\n150 gram Jamur Kancing Champignon (iris tipis)\n200 ml Heavy Cream / Cooking Cream\n3 siung Bawang Putih (cincang halus)\n2 sdm Mentega\n40 gram Keju Parmesan Parut\n1 sdm Cincangan Peterseli Segar\nGaram, lada putih, dan pala bubuk",
                'steps' => "Rebus fettuccine dalam air mendidih bergaram hingga al dente, lalu tiriskan.\nLelehkan mentega di wajan, tumis bawang putih hingga wangi.\nMasukkan irisan jamur kancing, masak dengan api sedang hingga jamur berwarna kecokelatan.\nTuangkan cooking cream, bumbui dengan garam, lada putih, dan sejumput pala bubuk. Masak hingga krim mulai mendidih perlahan.\nMasukkan fettuccine dan keju parmesan parut, aduk hingga saus creamy membalur seluruh untaian pasta.\nAngkat dan sajikan hangat dengan taburan daun peterseli cincang.",
            ],

            // ==================== ASIA ====================
            [
                'title' => 'Chicken Katsu Curry Jepang',
                'category' => 'Asia',
                'cooking_time' => 35,
                'image' => 'https://images.unsplash.com/photo-1604908176997-125f25cc6f3d?w=800&auto=format&fit=crop&q=80',
                'description' => 'Dada ayam fillet berbalut tepung panko super renyah disajikan bersama siraman kuah kari Jepang kental beraroma wortel dan kentang empuk.',
                'ingredients' => "2 fillet Dada Ayam (pipihkan)\n1 butir Telur (kocok lepas)\n50 gram Tepung Terigu\n100 gram Tepung Roti Panko\n1 blok Bumbu Kari Jepang (Japanese Curry Roux)\n1 buah Wortel (potong dadu besar)\n1 buah Kentang (potong dadu besar)\n1/2 buah Bawang Bombay (iris memanjang)\n500 ml Air Kaldu Ayam\nNasi Putih Hangat & Biji Wijen Sangrai",
                'steps' => "Bumbui ayam dengan garam dan lada. Baluri ke tepung terigu, telur kocok, lalu tepung roti panko.\nGoreng katsu dalam minyak panas hingga keemasan dan renyah. Tiriskan.\nTumis bawang bombay hingga layu, masukkan wortel dan kentang, lalu tuang air kaldu.\nRebus sayuran hingga empuk, lalu masukkan blok kari Jepang. Aduk hingga kuah mengental harum.\nPotong katsu memanjang, tata di atas nasi hangat dan siram saus kari di sampingnya.",
            ],
            [
                'title' => 'Tom Yum Seafood Pedas Asam Segar',
                'category' => 'Asia',
                'cooking_time' => 30,
                'image' => 'https://images.unsplash.com/photo-1559847844-5315695dadae?w=800&auto=format&fit=crop&q=80',
                'description' => 'Sup khas Thailand kuah bening kemerahan berpadu udang segar, cumi, jamur enoki, aroma serai, daun jeruk, dan perasan jeruk nipis segar.',
                'ingredients' => "250 gram Udang Segar (kupas sisakan ekor, kepala untuk kaldu)\n150 gram Cumi (potong cincin)\n100 gram Jamur Merang / Enoki\n800 ml Kaldu Udang\n2 batang Serai (memarkan)\n4 lembar Daun Jeruk Purut\n3 cm Lengkuas\n2 sdm Pasta Tom Yum\n2 sdm Kecap Ikan\n6 buah Cabai Rawit Merah\n3 sdm Air Perasan Jeruk Nipis\nDaun Ketumbar Segar",
                'steps' => "Rebus kepala udang untuk membuat kaldu gurih, lalu saring.\nDidihkan air kaldu bersama serai, daun jeruk, dan lengkuas.\nMasukkan pasta tom yum, kecap ikan, dan cabai rawit utuh hingga kuah beraroma harum rempah.\nMasukkan jamur, udang, dan cumi. Masak singkat selama 2-3 menit agar seafood tetap kenyal lembut.\nMatikan api, masukkan perasan jeruk nipis dan daun ketumbar segar. Sajikan hangat.",
            ],
            [
                'title' => 'Japanese Salmon Mentai Rice Bowl',
                'category' => 'Asia',
                'cooking_time' => 25,
                'image' => 'https://images.unsplash.com/photo-1579871494447-9811cf80d66c?w=800&auto=format&fit=crop&q=80',
                'description' => 'Nasi bumbu nori gurih dengan topping suwiran salmon panggang lembut, diselimuti saus mentai creamy tobiko yang di-torch wangi aromatik.',
                'ingredients' => "2 mangkuk Nasi Putih Hangat (campur dengan 1 sdm minyak wijen + 1 sdm kecap asin + 2 sdm nori bubuk)\n150 gram Fillet Salmon Segar (panggang sebentar, suwir kasar)\nSaus Mentai: 4 sdm Mayones Jepang (Kewpie) + 1 sdm Saus Sambal + 1 sdm Tobiko (telur ikan terbang) + 1 sdt Minyak Wijen\nTopping: Taburan Nori rumput laut iris dan biji wijen sangrai",
                'steps' => "Campurkan nasi putih hangat dengan minyak wijen, kecap asin, dan nori bubuk hingga merata. Tata di wadah mangkuk tahan panas.\nTata suwiran salmon panggang secara merata di atas lapisan nasi.\nCampur semua bahan saus mentai hingga berwarna oranye merata.\nTuangkan dan ratakan saus mentai menutupi seluruh permukaan salmon.\nBakar permukaan saus mentai menggunakan blowtorch dapur hingga kecokelatan harum terpanggang (bisa juga di-oven mode grill selama 5-7 menit).\nBeri taburan nori iris dan sajikan selagi hangat.",
            ],
            [
                'title' => 'Dimsum Siomay Ayam Udang Lembut',
                'category' => 'Asia',
                'cooking_time' => 40,
                'image' => 'https://images.unsplash.com/photo-1496116218417-1a781b1c416c?w=800&auto=format&fit=crop&q=80',
                'description' => 'Siomay dimsum ala restoran oriental dengan adonan daging ayam giling berpadu cincangan udang segar kenyal dan saus cocol pedas manis.',
                'ingredients' => "300 gram Daging Paha Ayam Giling\n150 gram Udang Segar (kupas, cincang kasar)\n20 lembar Kulit Dimsum / Pangsit Bulat\n1 butir Putih Telur\n3 sdm Tepung Tapioka\n2 siung Bawang Putih Halus\n1 batang Daun Bawang (iris halus)\n1 sdm Minyak Wijen & 1 sdm Saus Tiram\n1 buah Wortel (parut halus untuk topping)\nSaus Cocol: Saus sambal dimsum asam manis",
                'steps' => "Campurkan ayam giling, udang cincang, putih telur, bawang putih, daun bawang, minyak wijen, saus tiram, garam, dan lada. Aduk hingga menyatu kalis.\nTambahkan tepung tapioka, aduk perlahan hingga rata.\nAmbil selembar kulit dimsum, beri 1 sdm adonan isian di tengahnya, lalu lipat dan rapikan pinggirannya ke atas.\nBeri sedikit parutan wortel di bagian atas setiap siomay.\nTata di dalam kukusan yang sudah diolesi minyak agar tidak lengket.\nKukus selama 20 menit hingga matang empuk. Sajikan hangat bersama saus sambal cocol.",
            ],
            [
                'title' => 'Shoyu Ramen Telur Setengah Matang (Ajitsuke)',
                'category' => 'Asia',
                'cooking_time' => 35,
                'image' => 'https://images.unsplash.com/photo-1569718212165-3a8278d5f624?w=800&auto=format&fit=crop&q=80',
                'description' => 'Mie ramen kenyal dalam kuah kaldu shoyu kaya rasa, dilengkapi irisan daging chashu ayam, jamur kuping, daun bawang, dan telur ajitsuke lumer.',
                'ingredients' => "2 porsi Mie Ramen Segar\n800 ml Kaldu Ayam Gurih\n3 sdm Shoyu (Kecap Asin Jepang)\n1 sdm Minyak Wijen & 1 sdt Dashi Bubuk\n2 butir Telur Ramen Setengah Matang (Ajitsuke Tamago)\nPelengkap: Irisan daging ayam chashu/panggang, lembaran nori, irisan daun bawang, dan jagung manis pipil",
                'steps' => "Rebus mie ramen segar dalam air mendidih selama 2-3 menit hingga kenyal al dente, tiriskan dan bagi ke dalam 2 mangkuk saji.\nDidihkan air kaldu ayam, tambahkan kecap shoyu, minyak wijen, dashi bubuk, garam, dan lada bubuk. Aduk rata.\nTuangkan kuah kaldu shoyu panas ke dalam mangkuk berisi mie.\nTata irisan ayam panggang, belahan telur ramen setengah matang, jamur, jagung manis, dan lembaran nori di atasnya.\nSajikan segera selagi kuah mengepul hangat.",
            ],

            // ==================== SEHAT ====================
            [
                'title' => 'Salmon Avocado & Quinoa Salad Bowl',
                'category' => 'Sehat',
                'cooking_time' => 15,
                'image' => 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=800&auto=format&fit=crop&q=80',
                'description' => 'Menu sehat padat nutrisi: salmon panggang lembut, alpukat mentega, quinoa, aneka sayuran segar, dan dressing lemon mustard zaitun.',
                'ingredients' => "150 gram Fillet Ikan Salmon Segar\n1/2 buah Alpukat Mentega (iris tipis)\n100 gram Quinoa Matang / Edamame Rebus\n1 ikat Selada Romaine & Bayam Baby\n6 buah Tomat Ceri (belah dua)\n1/2 buah Timun Jepang (iris bulat)\nDressing: 3 sdm Extra Virgin Olive Oil + 1 sdm Air Lemon + 1 sdt Madu + 1/2 sdt Dijon Mustard + Sejumput Garam & Lada",
                'steps' => "Bumbui fillet salmon dengan garam, lada, dan sedikit minyak zaitun.\nPanggang salmon di wajan anti lengket selama 3-4 menit setiap sisi hingga kulit renyah dan bagian tengah matang lembut.\nSusun selada, quinoa matang, tomat ceri, timun jepang, dan alpukat di dalam mangkuk saji besar.\nLetakkan salmon panggang di bagian tengah mangkuk.\nKocok bahan dressing hingga emulsi mengental, lalu siramkan ke atas salad sesaat sebelum dinikmati.",
            ],
            [
                'title' => 'Green Smoothie Detox & Chia Seed',
                'category' => 'Sehat',
                'cooking_time' => 10,
                'image' => 'https://images.unsplash.com/photo-1556881286-fc6915169721?w=800&auto=format&fit=crop&q=80',
                'description' => 'Minuman detoks alami kaya serat dari bayam jepang, buah pisang manis, nanas segar, air kelapa murni, dan taburan biji chia organik.',
                'ingredients' => "1 genggam Bayam Horenso / Baby Spinach\n1 buah Pisang Cavendish Beku\n1/2 cangkir Potongan Buah Nanas Madu\n200 ml Air Kelapa Murni Dingin\n1 sdm Biji Chia (Chia Seed)\n1 sdm Perasan Jeruk Lemon\nEs batu secukupnya",
                'steps' => "Cuci bersih bayam dengan air mengalir.\nMasukkan bayam, pisang beku, potongan nanas, perasan lemon, dan air kelapa ke dalam blender.\nBlender dengan kecepatan tinggi hingga tekstur halus dan creamy.\nTuang ke dalam gelas saji tinggi.\nTaburkan biji chia di atas smoothie dan nikmati di pagi hari untuk kesegaran tubuh.",
            ],
            [
                'title' => 'Avocado Toast with Poached Egg & Sesame',
                'category' => 'Sehat',
                'cooking_time' => 15,
                'image' => 'https://images.unsplash.com/photo-1525351484163-7529414344d8?w=800&auto=format&fit=crop&q=80',
                'description' => 'Sarapan sehat berenergi: roti gandum panggang renyah dengan alpukat tumbuk lemon berpadu telur rebus setengah matang (poached egg) lumer.',
                'ingredients' => "2 lembar Roti Gandum Sourdough (panggang renyah)\n1 buah Alpukat Mentega Matang\n1 sdt Air Perasan Lemon\n2 butir Telur Ayam Segar\n1 sdm Cuka Meja (untuk membuat poached egg)\nSejumput Garam Laut, Chili Flakes, dan Biji Wijen Sangrai",
                'steps' => "Lumatkan alpukat dalam mangkuk menggunakan garpu, campur dengan perasan lemon, garam, dan sedikit lada hitam.\nDidihkan air dalam panci kecil, tambahkan 1 sdm cuka. Buat pusaran air perlahan lalu masukkan telur perlahan ke tengah pusaran, rebus 3 menit hingga putih telur matang dan kuning masih meleleh.\nOleskan lumat alpukat secara tebal di atas roti gandum panggang yang hangat.\nLetakkan poached egg di atas alpukat dengan hati-hati.\nTaburkan chili flakes pedas, garam laut, dan biji wijen di atasnya. Siap disantap.",
            ],
            [
                'title' => 'Overnight Oatmeal Chia Seed & Fresh Berries',
                'category' => 'Sehat',
                'cooking_time' => 10,
                'image' => 'https://images.unsplash.com/photo-1517673132405-a56a62b18caf?w=800&auto=format&fit=crop&q=80',
                'description' => 'Oatmeal praktis tanpa dimasak yang direndam susu almond semalaman, dipadu biji chia, yogurt greek, madu, dan topping buah beri segar.',
                'ingredients' => "1/2 cangkir Rolled Oats Utuh\n1/2 cangkir Susu Almond / Susu Rendah Lemak\n2 sdm Greek Yogurt Plain\n1 sdm Biji Chia (Chia Seed)\n1 sdm Madu Murni / Maple Syrup\nTopping: Buah stroberi, blueberry, dan irisan kacang almond panggang",
                'steps' => "Masukkan rolled oats, chia seed, susu almond, greek yogurt, dan madu ke dalam toples kaca (mason jar).\nAduk semua bahan hingga tercampur merata.\nTutup toples rapat-rapat dan simpan di dalam kulkas minimal 4 jam atau semalaman.\nKeluarkan dari kulkas di pagi hari, beri topping buah stroberi, blueberry, dan kacang almond renyah di atasnya.",
            ],

            // ==================== KUE & DESSERT ====================
            [
                'title' => 'Klepon Pandan Gula Merah Tradisional',
                'category' => 'Kue & Dessert',
                'cooking_time' => 30,
                'image' => 'https://images.unsplash.com/photo-1509440159596-0249088772ff?w=800&auto=format&fit=crop&q=80',
                'description' => 'Kue jajanan pasar kenyal beraroma daun pandan suji asli dengan isian gula merah cair yang meletus manis di mulut berbalut parutan kelapa gurih.',
                'ingredients' => "250 gram Tepung Ketan Putih\n50 gram Tepung Beras\n200 ml Air Hangat + Endapan Jus Daun Pandan Suji\n150 gram Gula Merah Aren (sisir halus untuk isian)\n1/2 butir Kelapa Parut Setengah Tua (kukus bersama sejumput garam dan 1 lembar daun pandan)\nAir bersih untuk merebus",
                'steps' => "Campur tepung ketan, tepung beras, dan sedikit garam. Tuang air pandan sedikit demi sedikit sambil diuleni hingga kalis.\nAmbil 1 sdm adonan, pipihkan di telapak tangan lalu beri isian gula merah sisir di tengahnya.\nTutup rapat dan bulatkan kembali secara halus agar tidak bocor saat direbus.\nMasukkan bulatan klepon ke dalam air mendidih, rebus hingga terapung matang.\nAngkat dan tiriskan, lalu langsung gulingkan ke dalam kelapa parut kukus yang gurih.",
            ],
            [
                'title' => 'Fudgy Shiny Crust Chocolate Brownies',
                'category' => 'Kue & Dessert',
                'cooking_time' => 45,
                'image' => 'https://images.unsplash.com/photo-1606313564200-e75d5e30476c?w=800&auto=format&fit=crop&q=80',
                'description' => 'Brownies cokelat panggang dengan lapisan atas shiny crust renyah mengkilap dan bagian dalam yang super fudgy padat cokelat lumer.',
                'ingredients' => "150 gram Dark Cooking Chocolate (DCC)\n50 gram Mentega (Butter)\n40 ml Minyak Sayur\n2 butir Telur Ayam\n135 gram Gula Halus / Gula Kastor\n100 gram Tepung Terigu Protein Sedang\n30 gram Cokelat Bubuk Berkualitas\nTopping: Almond slice dan Chocochips",
                'steps' => "Lelehkan cokelat batang (DCC), mentega, dan minyak sayur dengan cara ditim (double boiler). Biarkan hangat kuku.\nKocok telur dan gula pasir menggunakan whisk hingga gula benar-benar larut sempurna (kunci lapisan shiny crust mengkilap).\nTuangkan lelehan cokelat ke dalam kocokan telur, aduk rata.\nAyak tepung terigu dan cokelat bubuk, masukkan ke adonan lalu aduk lipat dengan spatula (jangan overmix).\nTuang ke loyang berukuran 20x20 cm yang dialasi baking paper, beri topping almond dan chocochips.\nPanggang di oven suhu 175°C selama 25-30 menit. Biarkan dingin sebelum dipotong.",
            ],
            [
                'title' => 'Japanese Fluffy Souffle Pancake',
                'category' => 'Kue & Dessert',
                'cooking_time' => 25,
                'image' => 'https://images.unsplash.com/photo-1528207776546-365bb710ee93?w=800&auto=format&fit=crop&q=80',
                'description' => 'Pancake khas kafe Jepang yang super lembut dan bergoyang (jiggly fluffy) seperti kapas, disajikan bersama sirup maple dan butter.',
                'ingredients' => "2 butir Kuning Telur & 2 butir Putih Telur (dingin)\n25 gram Tepung Terigu\n2 sdm Gula Pasir\n1 sdm Susu Cair Full Cream\n1/2 sdt Ekstrak Vanila & 1/4 sdt Baking Powder\n1 sdt Air Perasan Lemon\nPelengkap: Mentega, sirup maple, dan buah beri",
                'steps' => "Campurkan kuning telur, susu cair, vanila, dan tepung terigu yang telah diayak bersama baking powder. Aduk rata.\nKocok putih telur dan perasan lemon dengan mixer hingga berbusa, masukkan gula bertahap hingga mencapai tekstur stiff peak (kaku mengkilap).\nCampurkan 1/3 adonan meringue putih telur ke adonan kuning telur secara bertahap dengan teknik aduk lipat lembut.\nPanaskan wajan anti lengket dengan api paling kecil, olesi sedikit minyak tipis.\nSendokkan adonan tinggi-tinggi ke wajan, beri 1 sdt air di pinggir wajan lalu tutup selama 4-5 menit.\nBalik pancake dengan hati-hati, beri sedikit air lagi dan tutup selama 3-4 menit hingga matang mengembang.\nSajikan segera bersama potongan mentega dan kucuran sirup maple manis.",
            ],
            [
                'title' => 'Martabak Manis Terang Bulan Keju Cokelat',
                'category' => 'Kue & Dessert',
                'cooking_time' => 35,
                'image' => 'https://images.unsplash.com/photo-1587314168485-3236d6710814?w=800&auto=format&fit=crop&q=80',
                'description' => 'Martabak manis bersarang sempurna dengan aroma mentega wijsman wangi, taburan keju cheddar parut melimpah, cokelat meses, dan susu kental manis.',
                'ingredients' => "250 gram Tepung Terigu Segitiga Biru\n350 ml Air / Susu Cair\n3 sdm Gula Pasir\n1 butir Telur Ayam\n1/2 sdt Baking Powder & 1/2 sdt Baking Soda\n1/2 sdt Vanila Bubuk & Sejumput Garam\nTopping: Mentega Wijsman, Keju Cheddar Parut, Meses Cokelat, Kacang Sangrai Cincang, dan Susu Kental Manis",
                'steps' => "Campur tepung terigu, gula, garam, vanila, telur, dan air. Kocok dengan whisk selama 10 menit hingga adonan lembut bergelembung. Diamkan selama 1 jam.\nLarutkan baking soda dengan 2 sdm air, tuang ke adonan sesaat sebelum dimasak, aduk rata.\nPanaskan loyang martabak / teflon tebal dengan api sedang hingga benar-benar panas.\nTuang adonan, putar sedikit tepi teflon untuk membentuk pinggiran renyah.\nBiarkan hingga muncul pori-pori sarang gelembung di seluruh permukaan, taburkan 1 sdm gula pasir lalu tutup teflon dengan api kecil hingga matang.\nAngkat martabak, olesi mentega wijsman melimpah saat masih panas.\nTaburi meses cokelat, keju parut, kacang cincang, dan kucuran susu kental manis. Belah dua lalu lipat dan potong-potong.",
            ],

            // ==================== MINUMAN ====================
            [
                'title' => 'Es Pisang Ijo Khas Makassar',
                'category' => 'Minuman',
                'cooking_time' => 35,
                'image' => 'https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?w=800&auto=format&fit=crop&q=80',
                'description' => 'Minuman penutup legendaris dari Makassar: pisang raja manis berbalut adonan kulit pandan hijau lembut, disajikan dengan bubur sumsum gurih, sirup merah, dan es serut.',
                'ingredients' => "5 buah Pisang Raja Matang (kukus sebentar)\n150 gram Tepung Beras & 50 gram Tepung Terigu\n50 gram Gula Pasir & 450 ml Santan Sedang\nPewarna Alami Pandan Hijau\nBahan Bubur Sumsum: 75 gram tepung beras + 600 ml santan + 1/2 sdt garam + 1 lembar daun pandan\nPelengkap: Sirup Pisang Ambon Merah DHT, Susu Kental Manis, dan Es Batu Serut",
                'steps' => "Campur tepung beras, terigu, gula, santan, dan pasta pandan. Masak dengan api kecil sambil diaduk hingga kalis.\nPipihkan adonan kulit di atas plastik oles minyak, letakkan 1 buah pisang di atasnya, bungkus rapat menyerupai bentuk pisang.\nKukus pisang berbalut kulit hijau selama 15 menit hingga matang. Angkat dan biarkan dingin.\nMasak bahan bubur sumsum sambil diaduk hingga mengental lembut meletup-letup.\nPotong melintang pisang ijo.\nTata bubur sumsum di mangkuk saji, letakkan irisan pisang ijo, beri es serut melimpah, lalu siram sirup merah dan susu kental manis.",
            ],
            [
                'title' => 'Es Kopi Susu Gula Aren Kekinian',
                'category' => 'Minuman',
                'cooking_time' => 10,
                'image' => 'https://images.unsplash.com/photo-1517701550927-30cf4ba1dba5?w=800&auto=format&fit=crop&q=80',
                'description' => 'Kombinasi espresso kopi yang mantap dengan susu segar creamy dan sirup gula aren asli yang legit wangi aromatik.',
                'ingredients' => "60 ml Espresso Kopi / 2 sdt Kopi Bubuk Tanpa Ampas dilarutkan air panas\n120 ml Susu Cair Full Cream / Fresh Milk\n30 ml Sirup Gula Aren Asli (rebusan gula aren + sedikit air dan daun pandan)\n2 sdm Krimer Kental Manis / Evaporasi\nEs batu melimpah",
                'steps' => "Siapkan sirup gula aren pekat di dasar gelas saji.\nIsi gelas dengan es batu hingga penuh.\nTuangkan susu cair full cream dan krimer evaporasi secara perlahan agar membentuk lapisan cantik.\nTerakhir, tuangkan ekstrak espresso kopi panas di bagian paling atas.\nNikmati tampilan layer cantiknya, lalu aduk merata sebelum diminum.",
            ],
            [
                'title' => 'Mango Sago Jelly Dessert Segar',
                'category' => 'Minuman',
                'cooking_time' => 20,
                'image' => 'https://images.unsplash.com/photo-1553530666-ba11a7da3888?w=800&auto=format&fit=crop&q=80',
                'description' => 'Dessert manis creamy dari potongan mangga harum manis matang, mutiara sagu kenyal, jelly mangga, dan kuah susu kelapa creamy dingin.',
                'ingredients' => "2 buah Mangga Harum Manis Matang (1 buah diblender halus, 1 buah dipotong dadu)\n50 gram Sagu Mutiara (rebus hingga bening kenyal)\n1 bungkus Jelly Mangga (masak lalu potong dadu)\n200 ml Susu Evaporasi\n100 ml Susu Cair Full Cream\n3 sdm Susu Kental Manis\n1 sdm Biji Selasih (rendam air hangat)",
                'steps' => "Rebus sagu mutiara dalam air mendidih selama 10 menit, matikan api dan tutup panci selama 20 menit hingga matang bening tanpa bintik putih.\nBlender 1 buah mangga bersama susu kental manis hingga menjadi puree lembut.\nCampurkan susu evaporasi dan susu cair di mangkuk terpisah.\nDalam gelas atau mangkuk saji, tata puree mangga di dasar gelas.\nMasukkan sagu mutiara, jelly mangga, biji selasih, dan potongan buah mangga segar.\nTuangkan kuah susu evaporasi creamy dan tambahkan es batu. Sajikan dingin.",
            ],
            [
                'title' => 'Iced Matcha Green Tea Latte Creamy',
                'category' => 'Minuman',
                'cooking_time' => 10,
                'image' => 'https://images.unsplash.com/photo-1536256263959-770b48d82b0a?w=800&auto=format&fit=crop&q=80',
                'description' => 'Minuman matcha khas Jepang dari bubuk matcha premium Kyoto yang dikocok halus, dipadu susu segar creamy dan sirup vanilla manis lembut.',
                'ingredients' => "2 sdt Bubuk Matcha Green Tea Murni (Ceremonial Grade)\n50 ml Air Hangat (suhu 80°C)\n150 ml Susu Segar Full Cream / Oat Milk\n2 sdm Simple Syrup / Sirup Vanila\nEs batu secukupnya",
                'steps' => "Ayak bubuk matcha ke dalam mangkuk kecil agar tidak menggumpal.\nTuangkan air hangat, lalu kocok menggunakan chasen (bamboo whisk) atau frother elektrik hingga larut berbusa halus.\nSiapkan gelas saji, tuangkan sirup vanila di bagian dasar.\nIsi gelas dengan es batu hingga penuh, lalu tuangkan susu segar.\nTuangkan larutan matcha hijau pekat di bagian paling atas secara perlahan untuk efek visual gradasi dua warna yang indah.\nAduk sebelum dinikmati.",
            ],
        ];

        Recipe::truncate();

        foreach ($recipes as $recipe) {
            Recipe::create($recipe);
        }
    }
}
