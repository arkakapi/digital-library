<?php

use Illuminate\Database\Seeder;

class IssuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $issues = [
            [
                'slug' => 'arka-kapi-dergi-sayi-1',
                'title' => 'Arka Kapı Dergi Sayı 1',
                'issue' => 1,
                'price' => 9.99,
                'month' => '02-03 2018',
                'language' => 'tr',
                'content' => '<ul>
    <li>Web 2014’te Ölmeye Başladı -  André Staltz</li>
    <li>Ağ Tarafsızlığı - Av. Mehmet Pehlivan</li>
    <li>Her 8 Kişiden 1’inin Parolası Biliniyor! - Mustafa Altınkaynak</li>
    <li>Parolalarınızı Tek Bir Yerden Yönetin: KeeePassXC - Ziyahan Albeniz</li>
    <li>Güvenli Mesajlaşma Programlarının Savaşı ve Signal’in Tartışmasız
Galibiyeti - Micah Lee</li>
    <li>"Kendi Bağlantım" ile VPN Sunucunuzu Kurun - Ömer Çıtak</li>
    <li>Kriptoloji’ye Giriş - Bayram Gök</li>
    <li>Özgürleştiren Bir Zincir: Blockchain Teknolojisi ve Akıllı (Smart)
Kontratlar - Musa Baş</li>
    <li>Devrim Niteliğindeki Blockchain Teknolojisi Güvenli mi? - Mustafa
Yalçın</li>
    <li>Meltdown ve Spectre Zafiyetlerinin Düşündürdükleri - Chris Stephenson</li>
    <li>KRACK (Key Reinstallation Attack Anahtarı Tekrar Oluşturma Saldırısı) -
Ulaş Fırat Özdemir</li>
    <li>Zafiyetlerle Bluetooth: Geçmişi ve Geleceği - Ulaş Fırat Özdemir</li>
    <li>Mobil Uygulamalar, Tehditler ve Uygulama Güvenliğinde Gerekli
Yaklaşımlar - Meryem Akdoğan</li>
    <li>WiPi Hunter Zararlı Kablosuz Ağ Aktivitelerinin Tespit Edilmesi - Besim
Altınok</li>
    <li>Web Application Firewall (WAF) Atlatma Yöntemleri - Ulaş Fırat Özdemir</li>
    <li>iPhone 6 Telefonum Çalındı, Hırsızı Nasıl Buldum? - Bahar Anahmias</li>
    <li>Parrot Security OS (Parrot Project) - M. Emrah ÜNSÜR</li>
    <li>Amatör Telsizcilik - Erhan Altındaş</li>
    <li>Android Cihazınız için Güvenlik Rehberi - Arka Kapı</li>
    <li>Mustafa Akgül Anısına - Arka Kapı</li>
</ul>',
                'preamble' => '<p>Yeni bir dergi, yeni bir heyecan ve yeni umutlar.</p>
<p>Konfiçyus’un harikulade bir sözü var, “Karanlığa söveceğine bir mum da sen yak!”</p>
<p>Bu dergi Siber Güvenlik alanında teknik bir dergi ihtiyacı için kıymetli dostların sıcacık kalpleriyle tutuşturduğu bir mumdan fazlası değil.</p>
<p>İnanıyoruz ki bu çalışma hem kalpleri ısıtacak, hem dimağları aydınlatacak.</p>
<p>Bir mumun, başka bir mumu tutuşturmakla kendinden kaybetmeyeceği hepimizin malumu.</p>
<p>Bizleri de zenginleştiren böyle bir çalışma için hem sevinçli, hem de affınıza ilticalen biraz da gururluyuz.</p>
<p>Böylesi bir çalışmanın tüm maddi yükünü omuzlayan Abaküs Yayınları’ndan Cevahir Demiryakan’a, Cem Demirezen’e ve Abaküs Kitabevi’nin basın-yayın emekçilerine.</p>
<p>Çalışmamıza teveccühü ile bizleri heyecanlandıran Chris Stephenson Hocamıza.</p>
<p>Derginin bir nevi isim babası olan Siberbulten.com’un yöneticisi Minhaç Çelik’e,</p>
<p>Yazıları ile bu dergiyi var eden kıymetli yazar dostlarımıza müteşekkiriz.</p>
<p>Dergi toplantıları esnasında vefat haberini aldığımız Mustafa Akgül Hoca’mızı da rahmet ve ülkemize kattıklarından ötürü şükran ile anıyoruz.</p>
<p>Yeni bir sayıda görüşmek dileği ile...</p>',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'slug' => 'arka-kapi-dergi-sayi-2',
                'title' => 'Arka Kapı Dergi Sayı 2',
                'issue' => 2,
                'price' => 9.99,
                'month' => '04-05 2018',
                'language' => 'tr',
                'content' => '<ul>
	<li>Haberler</li>
	<li>Siber Takvim</li>
	<li>GPS Olmadan Kullanıcıları İzlemenin Farklı Bir Yolu</li>
	<li>PinMe - Recep Kızılarslan</li>
	<li>BitLocker ile Disklerinizi Şifreleyin - Arka Kapı</li>
	<li>Internette Gizli Kalın: The Onion Router - Mehmet Enes Özen</li>
	<li>Haven - Micah Lee</li>
	<li>Veri Gizleme Sanatı: STEGANOGRAFİ - Huriye Özdemir</li>
	<li>Saman Altından Okyanus Yürütmek DNS Tünelleme ile Engelleri Aşın - Arka Kapı</li>
	<li>KEVIN MITNICK’TEN BYLOCK’A KADAR HTS, CGNAT, METADATA ve DAHA FAZLASI! Koray Peksayar - Röportaj: Şahin Solmaz</li>
	<li>Mühür Kimdeyse Süleyman O’dur: Kullanıcı Sözleşmeleri - Av. Mehmet Pehlivan</li>
	<li>Kriptoloji’nin Altın Çağı - Bayram Gök</li>
	<li>Kral Çıplak Diyebilmek: Blokzincirinin Kısıtları - Mert Susur</li>
	<li>Derinlemesine Ethereum - Musa Baş</li>
	<li>Blockchain Tabanlı Telif Hakları Projeleri - Mihraç Cerrahoğlu</li>
	<li>Meltdown Bilgisayarın Yapısı ve Tarihi - Chris Stephenson</li>
	<li>Sinyal İstihbaratı Sinyal Dinleme ve Analiz Yöntemleri - Murat Şişman</li>
	<li>Google’a Ortak Olmak: Google AdSense Gelirinizi Bine Katlayın! - Sönmez Ertem</li>
	<li>Hacker Palas Bir Hacking Hikâyesi - Yusuf Yaltırık</li>
	<li>Projman’ın Kaleminden TR Scene ve TCG Dergileri’nin Hikâyesi - Projman</li>
	<li>Esir Yeni Dünya Bugünün Hikâyesi - Çağatay Çalı</li>
	<li>Ubuntu Kurulumu ve Meraklısına Notlar - Erhan Altındaş</li>
	<li>Siber Güvenlik Sektörü Hacktrick ‘18 ile BTK’da Buluşuyor!</li>
	<li>Nedir Bu Amatör Telsizcilik Dedikleri? - TA1IHE Murat KAYGISIZ</li>
	<li>KUANTUM BİLGİSAYAR- Esra Serttaş</li>
</ul>',
                'preamble' => '<p>Arka Kapı Dergi’nin ikinci sayısından herkese merhaba! Bu sayımızın teması Anonymity (Anonimlik).</p>
<p>Kişisel bilgilerin nelere mal olabileceği, sıradan gibi görünen küçük verilerin nasıl toplumsal manipülasyonlara varan vakalara
yol açabileceğini Cambridge Analytica firmasının adı ile özdeşleşen hadiseden açıkça gözlemledik. Anonimlik, tüm hayatın dijitalleştiği dünyada diyebiliriz ki en önemli insani taleplerden biri.</p>
<p>Benim saklayabilecek bir şeyim yok diyenler, aşağıda bulunan e-posta adresime, parolalarını gönderebilirler mi lütfen?</p>
<p>Yahut bugün tümden engellenmesi söz konusu olan VPN hizmetleri! VPN, sadece yasaklı sitelere erişimin değil, hizmet sınırları
dünya hinterlandına yayılmış şirket ve iş modellerinin yerel kaynaklarına erişebilmek için kullandıkları güvenli bir bağlantı protokolü. Evet her şey gibi VPN’i de suçlular kullanıyor! Tıpkı suçluların otoyolları, yaya geçitlerini, telefon hatlarını kullandıkları
gibi kriminal aktivitelerde bulunan insanlar VPN’i de kullanıyorlar. Ama nasıl bu suçluların diğer başka şeylerden istifade etmeleri, bu vasıtaların toplumsal hayattan men edilmesinin akl-ı selim bir çözümü olarak görülmüyorsa, niçin aynı şeyi VPN için de
düşünmüyoruz? Aynı itirazı VPN için de yükseltemiyoruz?</p>
<p>Keza sansür meselesi! İnternet sahip olduğu zenginlikler sayesinde bizi zengin kılan bir teknoloji. Bu zenginlikleri engellemek
hangi saik ile olursa olsun kullandığımız zemini çoraklaştıracak bir hamledir. Elinizde TV kumandası varsa, bir TV programından şikayet etme hakkınız yok. Faaliyetleri aşikar olan sitelere girip girmemek kullanıcının kendi tercihindedir. Elbette toplumsal yaşantıyı felce uğratacak, nesillerin sağlıklı gelişimlerine zarar verebilecek yayınların varlığından gençleri, genç dimağları korumak zorundayız. Ama bu yasaklarla savuşturulabilecek bir hadise değil, bireysel sorumluluğun ön plana çıktığı/çıkması gereken bir alan. Devletin, ya da siyasal erkin vatandaşları adına her şeye karar verdiği rejimler totaliter rejimlerdir. Ve bu yol bir
kere açıldı mı, Orwell’ın 1984 distopyasına rahmet okutacak gelişmeler birbirini izler. Her siyasi erk kendince uygun bulduğunu
dayatır, sevmediğini yasaklar. Gelin buna dur diyelim! Modern insan, tercih edebilen insandır.</p>
<p>İlk sayımızın yayınından hemen sonra 17 Şubat tarihinde Çırak Atölye’de gerçekleşen bir etkinlikte buluşarak dergimizin ilk sayısını dostlarımız ile kutladık. Tahmin edeceğiniz gibi kahve bahane idi!</p>
<p>Chris Hoca, Abaküs Yayınları’nın sahibi Cevahir Ağabey’den sonra birkaç kelam etmek üzere söz bendenize verildi. Öylesine heyecanlıydım ki isim isim çalışmamıza omuz veren arkadaşlarımızı sayarken fahiş bir hata yaptım!</p>
<p>Bazı insanlar vardır, öylesine hayatınızdadırlar ki, varlıklarının sağlamasını dahi yapmanıza gerek kalmaz. Hep oradadırlar. Hep
desteklerini hissedersiniz. Sanki hiç gitmeyecek gibidirler. Hayatımdaki böyle dostlardan biri, varlığı ve desteği benim için tekrarına hacet olmayacak kadar tabii olan dostlarımdan biri, Bayram Gök. Dergimize kriptoloji yazıları ile renk katan bir dostumuz. O heyecanla, benim için hayattaki de-factolardan biri olan Bayram Ağabey’in adını zikretmeyi ihmal etmişim. İşte sebebi
budur. Hem kendisi teşekkür beklemeyecek kadar kalenderdir, hem de hayatımızdaki rolü teşekkürü bile unutturacak kadar tabii ve içten.</p>
<p>Hayatımda bana bu duyguyu tattıran ilk insan ise Annem! İlk sayıyı hazırladığımız esnada yoğun bakımda olan anneciğimi maalesef 22 Şubat tarihinde ebediyete uğurladık. Rahmet-i rahmana kavuştu. Dilerim kabri pür nur, mekânı cennet olsun. Hakk,
bendenizi de yarattıklarına hizmetle ve hürmetle anneciğimin kapanmayan amel defteri için bir vasıta kılsın.</p>
<p>Bir teknoloji dergisi için çok duygusal satırlar. Af buyurun!</p>
<p>Takdir edersiniz ki hayat sayılardan ve vesilelerden öte...</p>',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'slug' => 'arka-kapi-dergi-sayi-3',
                'title' => 'Arka Kapı Dergi Sayı 3',
                'issue' => 3,
                'price' => 9.99,
                'month' => '06-07 2018',
                'language' => 'tr',
                'content' => '<ul>
	<li>Haberler</li>
	<li>Siber Takvim</li>
	<li>Mit Temas Sergisi</li>
	<li>Sevdiğiniz İşi Yaparsanız Çalışmak Zorunda Kalmazsınız - Mert Sarıca - Röportaj: Şahin Solmaz</li>
	<li>Tek Kişilik Bir Okul - Simone -evilsocket- Margaritelli- Röportaj: Utku Şen</li>
	<li>Eski Teknolojilere Geri Dönüş Ofline İletişim Ağları ve Güvenlik - Utku Şen</li>
	<li>IPV6 Umutlar Başka Bahara Kaldı - Murat Yıldırımoğlu</li>
	<li>Kablosuz Ağlardaki Tehlikeler - Besim Altınok</li>
	<li>DynoRoot RedHat ve Türevi Dağıtımlarda Uzaktan Kod Çalıştırma Zafiyeti - Barkın Kılıç</li>
	<li>Defansif Dünyaya Ofansif Bir Dokunuş SPOOKFLARE - Halil Dalabasmaz</li>
	<li>Neden JavaScript Dosyalarında Hassas Verileri Saklamalısınız - Sven Morgenroth - Çev. Ziyahan Albeniz</li>
	<li>Web Application Firewall Atlatma Yöntemleri, Bölüm 2: Kandırmacalar ve Dolaylı Erişim - Ulaş Fırat Özdemir</li>
	<li>Specter ve Gelecek - Chris Stephenson</li>
	<li>Asal Sayılar Üzerine - Halit İnce</li>
	<li>Kriptolojinin Altın Çağında Kripto Analiz - Bayram Gök</li>
	<li>Merkeziyetsizleştiremediklerimizden misiniz? Yeni İnternete Merhaba - Mustafa Yalçın</li>
	<li>Blok Zincir Uygulamaları ve Güvenlik Sorunları - Mert Susur</li>
	<li>Bir Holdingin Issız Koridorlarında Gece Yarısı Genç Bir Hacker - Yusuf Şahin</li>
	<li>Amatör Telsizlerin Lisanslı Kullanım Zorunluluğu - TA1IHE Murat KAYGISIZ</li>
	<li>Bill Gosper Eski Hacker\'lardan Kim Kaldı?- Cansu Topukçu</li>
</ul>',
                'preamble' => '<p>Arka Kapı Dergi 3. sayısında dolu dolu bir içerik ile karşınızda!</p>
<p>Casusların kullandığı araçlardan, yeni internetin mümkün olup olmadığına, Redhat dağıtımlarında keşfedilen DHCP zafiyetine kadar pek çok konu
dergi sayfaları arasında sizleri bekliyor.</p>
<p>Okurlarımızdan gerek sosyal medyada, gerekse e-posta yolu ile harikulade tepkiler alıyoruz. Daha nice sayı için en büyük yol azığımız okurlarımızın
bu teveccühü. Dileriz artarak devam eder.</p>
<p>Bu teveccühün başka bir veçhesi de dergimizde yayınlanmak üzere bizimle paylaşılan yazılar. Bizimle paylaşılan her yazıyı dikkatle tetkik ediyor,
yazarların gösterdiği ilgiye layık olmaya çalışıyoruz. Fakat basılı bir dergi olmanın limitleri maalesef her yazıyı yayınlamaya imkân vermiyor. Ebatları
belli olan bir dergi için, üstelik de siber güvenlik gibi bir alt başlıkta yayın yapan bir dergi için her yazıyı yayınlayabilmek maalesef pek mümkün değil.
Siber güvenlik ile irtibatından hareketle yazıları sıralandırıyor, en çok teknik ayrıntı barındıran, okuru okumakla birlikte tatbikata sevk eden yazıları
önceliklendiriyoruz.</p>
<p>Örneğin yazı okunduktan sonra okur kendisi tatbik edebiliyor mu? Sözü edilen uygulama ya da konsepti kendi dijital hayatına uygulayabiliyor mu?</p>
<p>Bir hacking dergisi olmanın bunu gerektirdiğini düşünüyoruz.</p>
<p>Dergimize teslim edilen yazılarda aradığımız diğer şartlar özgün olmaları ve daha önce basılı ya da dijital herhangi bir mecrada yayınlanmamış
olmaları. Çeviri yazılarda bu ikinci şartı esnetebilmek elbette mümkün.</p>
<p>Yukarıdaki koşullardan hareketle her teslim edilen tüm yazılar kıymetli bir emanet gibi muhafaza ediliyor, dergi ekibi tarafından gözden geçiriliyor.</p>
<p>Bütün bunlara rağmen yayınlanamayan yahut gelecek sayılar için rezervde bekletilmek üzere yazarın iznine müracaat edilen yazılarımız da oluyor.</p>
<p>Okurlarımızın bu konuyu anlayışla karşılayacağını ümit ediyoruz.</p>
<p>Lütfen dergimize katkı koymak isterseniz, yazılarınızı, yazının ihtiva ettiği görsellerin orjinal halleri ile birlikte editor@arkakapidergi.com \'a gönderiniz. Dördüncü sayımız için 15 Temmuz tarihi son yazı teslim tarihidir.</p>
<p>...</p>
<p>Dergimiz iki ayda bir yayınlanan ücretli bir dergi. 10 TL gibi neredeyse bir sigara paketinin fiyatına denk, belki daha az bir fiyatı var.</p>
<p>Arka Kapı sadece teknik bilgilerle değil, bilginin özgür dolaşımı, internet yasakları konusunda da aldığı tavır ile özgün bir dergi.</p>
<p>Hayatta kalmasını, yayın politikasının ilkelerden taviz vererek eğilip bükülmemesi en büyük arzumuz.</p>
<p>Okurlarımızdan zaman zaman dergiye nasıl destek olabilecekleri konusunda içten mesajlar alıyoruz.</p>
<p>Dergimizi okuyarak, abone olarak ve etraflarında da okunmasını sağlayarak dergimize destek olabilir, Türkiye\'de ilk olan böylesi bir yayının hayatta
kalmasını sağlayabilirler.</p>
<p>Online ansiklopedi Wikipedia 15 aydır tüm dil seçenekleriyle erişime kapalı. Wikipedia\'ya erişim yasağı uygulayan tek ülke Türkiye değil. Çin ve
Suudi Arabistan da Wikipedia\'ya erişim yasağı uygulayan ülkelerden. Suudi Arabistan\'da Arapça dışındaki içeriklerde bazı maddelere erişim engelli
iken, Çin\'de ise Japonca ve Çince versiyonları engelli. Fakat her iki ülke de diğer dil tercihleri ile ilgili bir erişim yasağı uygulamıyor. Güzel ülkemizin
yöneticileri bu hususta ülkemizi birincilikle taçlandırıyor ve tüm dil tercihlerini yasaklayan tek ülke olma payesini kimselere yedirmiyorlar.
2016 yılında Birleşmiş Milletler tarafından temel insan hakkı kabul edilen internet erişim hakkının şu ya da bu saikle siyasal iktidarlar tarafından
engellenmesini kabul etmiyoruz. Bu hususta teknik bilgimizin el verdiği ölçüde bilgiyi özgür kılmak için elimizden gelen tüm çabayı sarfediyoruz,
sarfetmeye devam edeceğiz.</p>
<p>Wikipedia\'da yasağa konu olan maddelerdeki mücadele sivil alanın konusudur. Türkiyeli kullanıcılar Wikipedia içeriklerine editöryal olarak müdahil olabilir, gerçeğe aykırı noktaların kaldırılmasını, değiştirilmesini talep edebilirler. Şayet gerçeğe aykırı olduğu düşünülen, kanıtlanan noktalarda</p>
<p>Wikipedia\'nın ya da bir başka kuruluşun maksatlı bir ayak sürümesi söz konusu ise, siviller olarak bir tepki, bir erişim boykotu örgütlenebilir. Fakat
asla yasaklayarak, engelleyerek bu meselenin önü alınamaz. Yetkililer tüm dünyanın okuyabildiği ansiklopedi maddelerinden kendi vatandaşını
mahrum ederek aklı selim bir tavır sergilememektedir.</p>
<p>Gelelim işin bir diğer kısmına...</p>
<p>İnternet kullanıcıları yalnızca yasaklarla değil, online gözetim ile de mücadele etmek zorunda. Panoptik bir mekanizma ile tüm internet trafiğini
izleyerek kullanıcıları profilleyen, tercihlerini manipüle eden "büyük biraderin" dev gözetleme kulesi de özgürlüğe inanan kişilerin mücadele başlıklarından biri olmalı. Bu sebeple ikinci sayımzı Anonimity yani Gizlilik konusuna ayırmış idik. Bu hususta okurlarımızı bilgilendirmeye, internet
erişim özgürlüğünü tesis etmek için bilinçlendirmeye devam edeceğiz.</p>
<p>Bu yıl eski bir NSA* çalışanı olan Edward Snowden\'in ifşaatlarının beşinci yılı. Tüm dünyada online gözetimin gündemleşmesini sağlayan Snowden,
nasıl dünyanın geri kalanlarımız için online bir BBG evine dönüştüğünü gözler önüne sermiş idi. Snowden\'in ifşaatları tüm dünyada uçtan uca
şifreleme pratiklerinin yaygınlaşmasına ve kitlesel bir farkındalığa yol açtı. Herkesin kabul edebileceği gibi dünya Snowden\'in ifşaatlarından sonra
o eski dünya değil.</p>
<p>Gandhi misali gözlüklü ve çelimsiz bir teknik adamın tek başına taşları yerinden oynatıp, dünyayı değiştireceğine hâlâ inanmıyor musunuz?</p>
<p>Bir şeyleri değiştirebilmek için çok mu küçük, güçsüz olduğumuzu düşünüyorsunuz?</p>
<p>Dalai Lama\'nın sözlerine kulak vermeye ne dersiniz?</p>
<p>"Bir şeyleri değiştirmek için çok güçsüz olduğunuzu düşünüyorsanız, bir sivrisinek ile aynı odada uyumayı deneyin!"</p>
<p>Yeni bir sayıda görüşebilmek ümidiyle. Sevgiler.</p>
<p>* National Security Agency - Ulusal Güvenlik Ajansı</p>',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'slug' => 'arka-kapi-dergi-sayi-4',
                'title' => 'Arka Kapı Dergi Sayı 4',
                'issue' => 4,
                'price' => 9.99,
                'month' => '08-09 2018',
                'language' => 'tr',
                'content' => '<ul>
	<li>“Özgür” Ansiklopedi Wikipedia ile Yaptığımız Röportaj</li>
	<li>Siber Takvim</li>
	<li>Temmuz-Ağustos</li>
	<li>Blockchain ve Kripto Para Haberleri</li>
	<li>Toplu Gözetimde İşletim Sistemlerinin Rolü ve Karşılaştırılması (Qubes OS, Tails OS, Subgraph OS)</li>
	<li>Endüstri Devriminde Kriptoloji</li>
	<li>Özet (Hash) Fonksiyonlarına Doğum Günü Saldırısı</li>
	<li>Açık Anahtarlı Şifrelemede Anahtar Değişim Problemi ve Keybase</li>
	<li>Yaklaşan Devrimin Ayak Sesleri Meltdown, Spectre ve Foreshadow</li>
	<li>ReelPhish ile Gerçek Zamanlı Kimlik Avı</li>
	<li>Üniversiteye Sınavla Değil, Mobil Uygulama Üzerinden Girdim</li>
	<li>DoS Servis Dışı Bırakma Saldırıları ve BinaryCannon</li>
	<li>Domain Cached Credentials (DCC) ile Active Directory Yönetici Hesabını Ele Geçirin</li>
	<li>Olay 1 - Üçüncü Adam Kim Suçlu, Kim Değil? Aslında İkisi de Mağdur</li>
	<li>Laptop’um Hacklendi mi? Laptop’unun Hacklenmesi Kaçınılmazsa, Saldırganın İşini Zorlaştırmaya Bak!</li>
	<li>SS7 Protokolü ve GSM Ağlarındaki Potansiyel Tehlikeler</li>
	<li>APRS Nedir? Ne İşe Yarar? Nasıl Kullanılmalıdır?</li>
	<li>Yerli Siber Güvenlik Yazılımı Hamlesinde Gözden Kaçan Detaylar</li>
	<li>Yoksa Siber Güvenlik Bir Stratejik İletişim Meselesi mi?</li>
	<li>Veri Gazeteciliği ve Sızıntı Kültürü ile İlişkisi</li>
</ul>',
                'preamble' => '<p>Kıymetli okurlar,</p>
<p>Arka Kapı Dergi’nin yeni bir sayısı ile huzurlarınızdayız. Bu sayı
ile birlikte bir iyi, bir de maalesef kötü haberimiz olacak.</p>
<p>Kötü haberden başlayalım ki sevincimiz kursağımızda kalmasın!</p>
<p>Türkiye’nin içerisinden geçtiği zorlu atmosferde her şey gibi kâğıt
da zamlandı. Maalesef dışarı bağımlı olduğumuz kalemlerden biri
de kâğıt olduğu için, ister istemez basılı dergi fiyatlarımız artan
döviz kurundan ötürü bir miktar zamlanacak. Bu haberi bendeniz
de “fiyat değişikliği” olarak vermek isterdim ama insan hiç değilse
kuldan utanıyor.</p>
<p>İyi haberimize gelince, Arka Kapı Dergi’nin İngilizce versiyonu
olan Arka Kapı Magazine bu sayı sizlere ulaştığı esnada tüm dünya
ile buluşmuş olacak. Yerelden globale böylesi bir katkı sunmanın
şükrünü ifadeden acizim. Faydalı olmasını bütün yüreğimle diliyorum. Ayrıntılı bilgiye www.arkakapimag.com web adresinden
ulaşabilir, Twitter üzerinden @arkakapimag hesabını takip edebilirsiniz.</p>
<p>...</p>
<p>Bu yazıyı yazdığımız esnada Wikipedia erişim engeli 502. gününde idi. Yazı okunduğu esnada da rakamların artmasından ziyade
bir değişiklik olacağını açıkçası ummuyorum.</p>
<p>Wikipedia erişim yasağı dergimizin ilk sayısından itibaren gündemimizde olan, kendimize dert edindiğimiz bir mesele.</p>
<p>Dördüncü sayımızda yer vermek üzere Wikipedia yetkililerinden
engelleme sürecini ve gelecek planlarını dinlemek gayesi ile bir röportaj talep ettik. Röportaj sorularımızı Wikipedia Türkiye editörleri vasıtası ile Wikimedia Vakfı’na ulaştırdık.</p>
<p>Cevapları heyecanla beklediğimiz esnada, röportaj talebimiz Wikimedia Vakfı İletişim Direktörü Samantha Lien ‘ın, Türkiye editörleri tarafından yönlendirilen e-postası ile “yanıtlandı”.
Röportaj sorularını cevaplamak yerine Mayıs 2018’de yine Samantha Lien tarafından yayınlanan jenerik bir metni, “metnin büyük oranda sorularımıza yanıt vereceği ve hassas bir konu olması
hasebiyle daha fazla ayrıntı paylaşamayacakları” notu ile birlikte
tarafımıza ilettiler.</p>
<p>Kendilerine kamunun birinci ağızdan bilgi edinme hakkının Wikipedia eliyle engellenmesinin trajiokomik olduğunu, kurumsal endişeler ne olursa olsun salt sitenin açılması gayesiyle Wikipedia’nın
en önemli ilkelerinden olduğunu varsaydığımız şeffaflık ilkesinden taviz verilmesinin kabul edilemez olduğunu belirttik.</p>
<p>Kapalı kapılar ardında yapılan görüşmelerin, Wikipedia gibi kamuya mal olan bir site ve dava için sürdürülmesini; ayrıca kamuoyunun süreç ve yapılan görüşmeler hakkında yeterince bilgilendirilmemesini adilane ve etik bulmuyoruz.</p>
<p>Okurlarımız Wikipedia’nın dengeler namına cevaplamaktan
imtina ettiği soruları dergimiz sayfalarında bulacaklar. Bu soruların cevaplarını merak eden okurlarımız, “şeffaf ” ve “özgür”
Wikipedia’dan doğrudan soruların yanıtlarını talep edebilirler.</p>
<p>Ve lütfen cevapsız kalan bu soruları arkadaşlarınızla da paylaşınız,
çünkü onlar Wikipedia’yı hâlâ özgür sanıyor.</p>',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'slug' => 'arka-kapi-dergi-sayi-5',
                'title' => 'Arka Kapı Dergi Sayı 5',
                'issue' => 5,
                'price' => 9.99,
                'month' => '10-11 2018',
                'language' => 'tr',
                'content' => '<ul>
	<li>Şubat ‘19 Siber Güvenlik & Bilişim Etkinlikleri • Arka Kapı Dergi</li>
	<li>Kripto Para Haberleri - Uzmancoin.com</li>
	<li>Kubilay Onur Güngör Söyleşi: Cyber Struggle</li>
	<li>Gelecekte Antivirüs Ürünlerine Yer Yok - Utku Şen</li>
	<li>20. Yüzyıl Elektronik Çağında Kriptoloji - Bayram Gök</li>
	<li>Rastgele Sayılar Rastgele Olmayınca... - Chris Stephenson</li>
	<li>Sır Paylaşım Sistemleri - Ceren İnce</li>
	<li>IPFS (InterPlanetary File System) ile Kalıcı Web - Mustafa Yalçın</li>
	<li>Gerçek Gizlilik İsteyenler için Kripto Para Monero (XMR) - Arka Kapı Dergi</li>
	<li>Google vs. Authy 2FA’da Güvenlik Savaşları - Ulaş Fırat Özdemir</li>
	<li>Kablosuz Ağlarda Parola Kırma Saldırıları - Besim Altınok</li>
	<li>Bilgisayardaki Ajan PyShellSpy - Ferdi Gül</li>
	<li>Python Scapy Kütüphanesi ile Ağ Paketi Programlama II - Güray Yıldırım</li>
	<li>Siber Güvenlikte Yeni Odak Noktası Zihinsel Sağlık - Huriye Özdemir</li>
	<li>Yazılımcılar için Okuma Listesi - Muhammed Hilmi Koca</li>
	<li>SigintOS - Murat Şişman</li>
	<li>Telsiz Haberleşmesi Altyapı Bilgileri - Murat Kaygısız</li>
</ul>',
                'preamble' => '<p>Geçtiğimiz 10 Aralık İnsan Hakları Evrensel Bildigesi’nin 70. yıldönümü idi.</p>
<p>Spartaküs’den günümüze insanlığın tırnakları ile yazdığı bir destanın
en billur hali.</p>
<p>Bu evrensel haklar manzumesinde yer alan iki madde Arka Kapı Dergi’nin en önemli düsturları arasında yer alıyor.</p>
<p>İlki birdilgenin 12. maddesinde ifade bulan özel hayatın gizliliği meselesi. Yani hiçkimsenin özel hayatının, ailesinin, konutunun, iletişiminin keyfi müdahalelere, izlenmeye, zapt u rapt’a maruz kalmaması. Üstelik bu özel durumunun taraf devletlerce tüm yasal imkânlar seferber
edilmek suretiyle güvenceye alınması.</p>
<p>İlk sayımızdan bu yana internette gizliliği yani anonimity’i üstüne basa
basa tekrarlamamız işte bu yüzden.</p>
<p>Dergimizin kırmızı çizgilerinden bir diğeri ise evrensel insan hakları
sözleşmesinin 19. maddesi yani bireylerin düşünce ve ifade hürriyeti.
İfade hürriyeti olmadan düşünce hürriyetinin bir anlamı olmayacağı
açık. İfade hürriyeti olmadan, düşünce hürriyeti ile hepimiz Rodin’in
düşünen adam heykelinden farksız, pösteki sayan delilere dönmeyecek
miyiz? Öyle ise kişinin sadece kafasının içerisinde düşünmesi değil,
hiçbir baskı altında kalmadan bu fikirlerini ifade edebilmesi de temel
meselelerimizden biri olmalı.</p>
<p>Kişi, fikirlerini hem ifade edebilmeli, hem de herhangi bir kısıta maruz
kalmadan fikirlerini yayma hürriyetinden de mahrum edil(e)memeli.</p>
<p>Biz henüz bu sınırlara erişmeye çalışırken, insanlık üçüncü kuşak insan
haklarını konuşuyor, internet erişim hakkını!</p>
<p>İnternet erişim hakkı 2011 yılında temel bir insan hakkı olarak Birleşmiş Milletler tarafından kabul edildi. Aynı yıl Avrupa Konseyi de
benzer bir karar aldı.</p>
<p>Erişim yasaklarının hâlâ söz konusu olduğu ülkemiz bu iki uluslararası
sözleşmenin de imzacısıdır. Olsun hiç değilse niyetimiz temiz!</p>
<p>Avrupa ülkelerinin çıtayı yükseltip, geniş bant interneti insan hakları
cümlesinden saydığı ve hane başına 100Mbps’lik internet eşiğini belirledikleri bir dünyada, bizler Adil Kullanım Kotası’nın kaldırılması
kararının yürürlüğe girmesi arifesinde, servis sağlayıcıların fiyat etiketi
değişikliği seferberliğine tanık olmaktayız.</p>
<p>Uygulamanın ruhundan fersah fersah uzak, fiyat değişikliği hamlesinden öteye gidememiş, ruhlarda heyecandan çok kaygı uyandırmış,
otoritenin kutsal ruhlarını yardıma, gözü doymaz şirketleri amana çağırdığımız bir süreç!</p>
<p>Şark kurnazlığına müracaat eden servis sağlayıcılar, kârdan zarar mantığı ile bir dizi düzenlemeye gitmiş; adil kullanım kotasının söz konusu
olduğu dönemlerde kota sonrası hız düşüm eşiğinin dahi altındaki rakamları “sınırsız” internet adına pazarlama telaşındalar.</p>
<p>Özel şirketlerin kararlaştırdığı bu oranlara bir zahmet BTK’nın ilgi buyurup çeki düzen vermesini bekliyoruz.</p>
<p>Oysa bu denklemde eksik olan sivil toplumun, mesleki birliğin inşasının bir ufuk çizgisi olarak dahi gündemimizde olmaması ne acı!</p>
<p>Niçin bu alanda ciddi bir sivil toplum baskısı kurulamıyor? Niçin birileri adil kullanım kotasının kalkması gibi harikulade bir hamlenin
gerçek manasının altını çizmiyor? Bunu yapacak kuvvet şüphesiz sivil
toplumun kendisidir.</p>
<p>İnternet erişim hakkı, internette gizlilik bugünün temel insan haklarındandır.</p>
<p>İnternet, merhum Mustafa Akgül Hoca’mızın ifade ettiği gibi yaşamdır.</p>
<p>Ahir ömrünü bilişim teknolojilerinin gelişmesine, yaygınlaşmasına,
hepsinden de öte özgürleşmesine vakfeden Mustafa Akgül Hoca’yı bu
vesile ile rahmet ve minnet ile anıyoruz.</p>',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'slug' => 'arka-kapi-dergi-sayi-6',
                'title' => 'Arka Kapı Dergi Sayı 6',
                'issue' => 6,
                'price' => 9.99,
                'month' => '12-01 2019',
                'language' => 'tr',
                'content' => '<ul>
	<li>Şubat ‘19 Siber Güvenlik & Bilişim Etkinlikleri • Arka Kapı Dergi</li>
	<li>Kripto Para Haberleri - Uzmancoin.com</li>
	<li>Kubilay Onur Güngör Söyleşi: Cyber Struggle</li>
	<li>Gelecekte Antivirüs Ürünlerine Yer Yok - Utku Şen</li>
	<li>20. Yüzyıl Elektronik Çağında Kriptoloji - Bayram Gök</li>
	<li>Rastgele Sayılar Rastgele Olmayınca... - Chris Stephenson</li>
	<li>Sır Paylaşım Sistemleri - Ceren İnce</li>
	<li>IPFS (InterPlanetary File System) ile Kalıcı Web - Mustafa Yalçın</li>
	<li>Gerçek Gizlilik İsteyenler için Kripto Para Monero (XMR) - Arka Kapı Dergi</li>
	<li>Google vs. Authy 2FA’da Güvenlik Savaşları - Ulaş Fırat Özdemir</li>
	<li>Kablosuz Ağlarda Parola Kırma Saldırıları - Besim Altınok</li>
	<li>Bilgisayardaki Ajan PyShellSpy - Ferdi Gül</li>
	<li>Python Scapy Kütüphanesi ile Ağ Paketi Programlama II - Güray Yıldırım</li>
	<li>Siber Güvenlikte Yeni Odak Noktası Zihinsel Sağlık - Huriye Özdemir</li>
	<li>Yazılımcılar için Okuma Listesi - Muhammed Hilmi Koca</li>
	<li>SigintOS - Murat Şişman</li>
	<li>Telsiz Haberleşmesi Altyapı Bilgileri - Murat Kaygısız</li>
</ul>',
                'preamble' => '<p>Arka Kapı Dergi 1. Yaşında!</p>
<p>17 Şubat 2018’de başladığımız serüvenimiz birinci yılını doldurdu.</p>
<p>Bunun için şükrediyor, böyle bir çalışmayı, gönüllü çabalarla bir yıldır
sürdürebilmiş olmaktan ötürü memnuniyet duyuyoruz.</p>
<p>İlk sayımızdan itibaren hiçbir bedel gözetmeksizin bize destek veren
tüm yazarlarımıza, her sayımızı muştulu bir haber gibi bekleyen kıymetli okurlarımıza teşekkürü bir borç biliriz.</p>
<p>Elinizde tuttuğunuz 6. sayı ilk yılı doldurmadan okurlarımıza verdiğimiz 6 sayı sözünün sonucudur. Elbette gönüllü bir çalışmada aksamalar, takvimde uyumsuzluklar yaşanabiliyor. Böylesi sıkıntıları anbean
okurlarımızla iletişim kanallarımız üzerinden paylaşarak tüm süreçlerimizi şeffaf hale getirmeye çalıştık, çalışıyoruz. 2019’da daha iyi bir yıl,
daha istikrarlı bir takvim diliyorum.</p>
<p>Yola çıkarken hedefimiz ülkemizdeki hacking kültürünün semeresi
olabilecek bir yayın çıkartmak idi. Bunu ne derece başardığımız okurlarımızın ve elbette gelecekte bugünleri değerlendirecek olanların takdiri olacaktır.</p>
<p>Fakat ömrü hayatında sadece teknik bilgi aktarmakla yetinmeyip, bilginin üretimi ve dolaşımına engel olan dolaylı ya da dolayımsız tüm
yasaklara, engellemelere de karşı durarak hacking ruhunu elimizden
geldiğince yaşatmaya gayret ettik, ediyoruz.</p>
<p>Arka Kapı Dergi, bendeniz de dahil tüm yazar ve yayın kadrosunun bilabedel iştirak ettiği kolektif çalışmanın adı. Derginin üzerindeki fiyat
sadece bir sonraki sayıda önünüze gelebilmesi için ülke şartlarında takdir edilmiş en makul fiyat. Dergi sayfalarında gördüğünüz reklamlara
yaklaşımımız da aynı </p>
<p>Firmaların dergimize destek için verdiği reklamlarda gözettiğimiz tek
bir amaç var, o da dergimizi daha fazla okura ulaştırabilmek. 2019 itibariyle bir tam sayfa reklam bedeli olan 2000 TL + KDV karşılığında
firmalar yalnızca dergimizde bir tam sayfa reklam yayınlatmamış oluyor; aynı zamanda bu bedelin mukabilinde 143 adet dergiyi de ülkenin
çeşitli noktalarında etkinlik düzenleyip bizden dergi talep eden okurlarımıza bu firmalar adına ulaştırıyoruz.</p>
<p>Gelecek yıl planlarımız arasında her sayıdan sonra gerçekleştirdiğimiz
meet-up’ları Ankara başta olmak üzere, özellikle de dezavantajlı illerde
gerçekleştirmek var.</p>
<p>Bu hususta davetlere ve desteklere açık olduğumuzu belirtiriz.</p>
<p>*</p>
<p>Dergimizin arka kapağında vahşi bir saldırı sonucu katledilen akademisyen Ceren Damar’ın fotoğrafını ve buna eşlik eden Ahmed Arif ’in
mısralarını okuyacaksınız. Görevi başında ilim gayreti nedeniyle katledilen Ceren Damar’a Allah’tan rahmet, acılı ailesine sabrı cemil diliyoruz.</p>
<p>90’lı yıllara damgasını vurmuş TR-Scene dergi editörü Projman’ın sözleri ile bitirmek isterim: Bilgi güçtür!</p>
<p>Güç, kalbi adaletle çarpan, insanlık ailesinin tüm fertlerinin derdiyle
dertlenen kişilerle olsun!</p>
<p>Gayemiz ve çabamız budur.</p>
<p>“Bir umudum sende! Anlıyor musun?”</p>',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'slug' => 'arka-kapi-magazine-issue-1',
                'title' => 'Arka Kapı Magazine Issue 1',
                'issue' => 1,
                'price' => 9.99,
                'month' => '09-10 2018',
                'language' => 'en',
                'content' => '<ul>
 	<li>Set up your VPN with My Connection</li>
 	<li>Introduction to Cryptology</li>
 	<li>Chain of Independence: Blockchain</li>
 	<li>Revolutionary Blockchain Technology: Is it safe?</li>
 	<li>Thoughts on Meltdown and Spectre Vulnerabilities</li>
 	<li>Vulnerabilities of Bluetooth: Past and Future</li>
 	<li>Why you shouldn’t store sensitive data in javascript files</li>
 	<li>The art of Data Hiding: STEGANOGRAPHY</li>
 	<li>Acting on the Sly: Overcome Obstacles with DNS Tunnelling</li>
 	<li>Possession is Nine-Tenths of the Law: User Agreements</li>
 	<li>The King’s Naked: Constraints of Blockchain</li>
 	<li>Signal Intelligence: Methods of Signal Listening and Analysis</li>
 	<li>How to be a shareholder of Google: Double your income with Google Adsense</li>
 	<li>Anonymizing Internet from the Router with OpenWrt and TOR</li>
</ul>',
                'preamble' => '<p>Arka Kapı is a hackers’ magazine that began its journey in Turkey. ‘Arka Kapı’ stands for back door.</p>
<p>We’re publishing our fourth issue in Turkey as we introduce the first English issue to you.</p>
<p>The internet today hosts the core components of personal freedom: freedom of speech, freedom of
trade, and freedom of self-advocacy. That is, as long as you are aware of it and protect it.</p>
<p>An average internet user can make use of this freedom through various free tools on the internet. There
are multiple running headlines to protect this issue.</p>
<p>A united stand against mass surveillance and censorship, guarding the global net neutrality.</p>
<p>In Turkey, we became a hacker magazine which passed on tools and techniques to the readers but we
also stood for the benefits of the information revolution that strengthened human rights.</p>
<p>We’re hoping to do the same and more in our global issues. As an independent magazine, we need
your support to reach our goals!</p>
<p>...</p>
<p>The spotlight for our first issue is “Anonymity.” The mass surveillance we’re going through seems very
much like a chapter from the Orwellian dystopia except here everything we do is watched through our
smartphones and wearable technology.</p>
<p>Most of you might think that you’ve got nothing to hide. However, protecting our privacy from Big
Brother has a larger scope than the individual scale, as we saw in the very recent event that struck
millions through Cambridge Analytica.</p>
<p>The only antidote against this mass surveillance is the correct and conscious implication of anonymity.</p>
<p>As Snowden says, ‘Let’s take back the internet!’</p>
<p>Special thanks to Netsparker Ltd. for bringing our first issue alive</p>',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'slug' => 'arka-kapi-magazine-issue-2',
                'title' => 'Arka Kapı Magazine Issue 2',
                'issue' => 2,
                'price' => 9.99,
                'month' => '11-12 2018',
                'language' => 'en',
                'content' => '<ul>
 	<li>Cyber Security Conferences - Ayşenur Burak</li>
 	<li>WiPi Hunter Detecting - Besim Altınok</li>
 	<li>Web Application Firewall (WAF) Bypassing Methods - Ulaş Fırat Özdemir</li>
 	<li>Taking Control of Admin Account on Active Directory using the DCC - Girayhan Menekay</li>
 	<li>Dynamic Host Configuration to Root - Barkın Kılıç</li>
 	<li>Offensive Touch to Defensive World - Halil Dalabasmaz</li>
 	<li>Simone Margaritelli Interview - Utku Şen</li>
 	<li>Denial of Service - Bener Kaya</li>
 	<li>A Young Hacker in the Corridors of a Holding at Midnight - Yusuf Şahin</li>
 	<li>Revolutionary Blockchain Technology - Mustafa Yalçın</li>
 	<li>How I hacked into a college’s website! - Aditya Anand</li>
 	<li>Meltdown, Spectre and Foreshadow - Chris Stephenson</li>
 	<li>The Dangers of Wireless Networks - Besim Altınok</li>
</ul>',
                'preamble' => '<p>The cybersecurity sector borrows many terms from the military
jargon because believe it or not, this is an ongoing war. Sometimes
the atmosphere is more mischievous than the Cold War, and
sometimes it’s far more hot and effective than the battlefield.</p>
<p>One of the commonly used terminologies adapted from the war zone
to cybersecurity was the Red Team concept. In military strategies,
Red Team methodology stands for pretending to be the hostile forces
to model out the worst scenario and measure the durability of the
friendly forces.</p>
<p>The attackers are always a step ahead. So Red Teaming allows the
course of the battle to have a drastic change. Just like the microbes
vaccinated into the body to defend against illnesses, thinking like the
enemy helps build a stronger defense.</p>
<p>This is why the concept of Red Team has been very popular in the
past few years in cybersecurity. Instead of playing devil’s advocate,
you have to think like the devil to discover the most evil plans and test
them on the system.</p>
<p>Sun Tzu wrote about giving the utmost importance to knowing your
enemy in his ageless work The Art of War.</p>
<p>Socrates shared his valuable wisdom on knowing your enemy:</p>
<p>“Speak, So That I May See You.”</p>
<p>In the second issue of Arka Kapı Magazine, we will take a closer look
at Red Team methods:</p>
<p>The tool crafted by Besim Altınok WiPi Hunter will help you discover
the malicious WiFi networks surrounding you.</p>
<p>Do the security devices and software you invested a fortune in do
their job properly? You sure? The WAF Bypassing Methods written by</p>
<p>Ulaş Fırat Özdemir will question the integrity of your security.</p>
<p>Active Directory is a widely used software in the computer networks.</p>
<p>Girayhan Menekay wrote about taking over the admin account using
Domain Cached Credentials.</p>
<p>Barkın Kılıç wrote a detailed article on the DynoRoot vulnerability that
affects Redhat based Linux distributions with a tweet-long of exploit
code.</p>
<p>Halil Dalabasmaz gives a sneak peak of how you can bypass security
measures like anti malware using his own tool SpookFlare on his
article “An Offensive Touch to the Defensive World.”</p>
<p>Many other unique articles are waiting for you in the second issue of
Arka Kapı Magazine.</p>
<p>Special thanks to Netsparker Ltd. for sponsoring our second issue</p>',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'slug' => 'arka-kapi-magazine-issue-3',
                'title' => 'Arka Kapı Magazine Issue 3',
                'issue' => 3,
                'price' => 9.99,
                'month' => '01-02 2019',
                'language' => 'en',
                'content' => '<ul>
	<li>Cyber Security Conferences - Ayşenur Burak</li>
	<li>Cryptology In Industrial Revolution - Bayram Gök</li>
	<li>The 10 Biggest Hacks Of 2018 - Arka Kapi Magazine</li>
	<li>Back To The Old Tech: Offline Communication Networks And Security - Utku Şen</li>
	<li>Waf Bypassing Methods Part 2: Tricks And Indirect Access - Ulaş Firat Özdemir</li>
	<li>Mini Threat Intelligence - Mert Sarica</li>
	<li>Krack (Key Reinstallation Attack) - Ulaş Firat Özdemir</li>
	<li>Daniel Bohannon Interview - Utku Şen</li>
	<li>The Role And Comparison Of Operating Systems In Mass Surveillance (Qubes Os, Tails Os, Subgraph Os) - Furkan Senan</li>
	<li>The Ss7 Protocol And Potential Dangers In Gsm Networks - Murat Şişman</li>
	<li>Aprs: What Is It, What Does It Do And How To Use It - Murat Kaygisiz</li>
	<li>Key Exchange Problem In Public Key Cryptography And Keybase - Recep Kizilarslan</li>
	<li>Oldest Of The Hackers I - Bill Gosper - Cansu Topukçu</li>
	<li>Technical Constraints Of The Blockchain Projects - Mert Susur</li>
</ul>',
                'preamble' => '<p>Last month on 10 December it was the 70th anniversary of the proclamation of the Universal
Declaration of Human Rights; the purest form of
a saga humanity had been breaking its neck to write -
from Spartacus to today.</p>
<p>Especially there are such two articles of this declaration
that us, Arka Kapi Magazine, have embraced as one of
its most significant norms.</p>
<p>The first one is about the privacy of one’s life, as stated
in Article 12:
“No one shall be subjected to arbitrary interference with
his privacy, family, home or correspondence, nor to attacks upon his honour and reputation. Every- one has
the right to the protection of the law against such interference or attacks.”</p>
<p>These are so important that states should secure this
special occasion by mobilizing all legal means.</p>
<p>This is why we have been emphasizing anonymity since
the first issue. Our another important red line lies on the
opinion and expression freedom - the Article 19:
“Everyone has the right to freedom of opinion and expression; this right includes freedom to hold opinions
without interference and to seek, receive and impart
information and ideas through any media and regardless of frontiers.”</p>
<p>Without the freedom of expression, it is needless to say
that the freedom of opinion would have no meaning.</p>
<p>Lacking the expression freedom, would we differ in any
way from The Thinking Man statue of Rodin? That means
that it should be among our main issues that an individual
should not only be able to think, but also should be able
to express these thoughts without being under pressure,
while not being deprived of the right to spread it.
Another means of fundamental human rights is the right
to internet access (also mentioned as right to broadband
or freedom to connect). As humans, we all have the
right to access internet and remain private online.
In the third issue, we are going to talk about some of the
attack that threaten our individuality. You will find articles
on the dangers and working principles of various systems
and attacks, as well as some offline systems and more.</p>
<p>We aim so that you may predict where the attack may
come from to protect yourself- and your rights!</p>
<p>Special thanks to Netsparker Ltd. for sponsoring this issue!</p>',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        \App\Issue::insert($issues);
    }
}
