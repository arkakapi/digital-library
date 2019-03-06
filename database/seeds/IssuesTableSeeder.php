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
</ul>'
            ],
            [
                'slug' => 'arka-kapi-dergi-sayi-2',
                'title' => 'Arka Kapı Dergi Sayı 2',
                'issue' => 2,
                'price' => 9.99,
                'month' => '04-05 2018',
                'language' => 'tr',
                'content' => 'Hayatımızın bu kadar dijitalleşip, her anımızın kayıt altına alınmasından yaka silkenlerden misiniz?
Gizlimiz saklımız kalmadı, hakkımızda her şeyi biliyorlar diye mi düşünüyorsunuz?
Ne izlemesi! Büyük Birader artık bizim adımıza karar bile veriyor mu diyorsunuz!
Gizlilik (Anonimity) kapak konusu ile Arka Kapı Dergisi 2. sayısı huzurlarınızda! GPS\'iniz kapalı dahi olsa, konumunuz ifşa olabilir! Endişelenmekte haklısınız! Recep Kızılarslan, GPS sensörü kapalı dahi olsa sizi adım adım izleyebilen pinMe isimli uygulamanın ayrıntılarını ve alınabilecek tedbirleri Arka Kapı okurları için yazdı.
Laptopunuzu çalınma riskine karşı sigortalatmak yetmez! Verileriniz hâlâ risk altında. Bitlocker kullanarak verilerinizi nasıl şifreleyeceğinizi öğrenin!
Internette gönlümce gezeyim, IP adresim ifşa olmasın diyorsanız işte TOR huzurlarınızda! Mehmet Enes Özen kaleminden anonimlik şehrinin ilk durağı TOR\'u okuyun.
Edward Snowden\'in Haven uygulaması ile akıllı telefonunuzu bir tehdit radarına dönüştürün! İster bir hırsızlık sensörü olarak kullanın, ister bebek telsizi :)
Veri gizleme bilimi Steganografi\'ye esaslı bir başlangıç için Huriye Özdemir\'in yazısı sizi bekliyor.
DNS Tünelleme ile tüm WiFi\'ler sizin olsun! Şehir meydanlarında, kabalıklarda yalnız kalmayın!
Koray Peksayar\'ın dilinden METADATA, CGNAT ve Bylock\'un bilinmeyenleri. Şahin Solmaz\'ın röportajını bir solukta okuyacaksınız!
Mühür kimdeyse Süleyman O\'dur. Av. Mehmet Pehlivan soruyor: Kullanıcı sözleşmeleri ne getiriyor, ne götürüyor? Nelerin altına imza attığınızı öğrenin. Mühür elinizde, güç izinle olsun!
Bayram Gök ile kriptololoji serisi devam ediyor. Kriptoloji\'nin Altın Çağı yazısı ile bir kağıt ve kalem yeter. Derhal şifrelemeye başlayabilirsiniz.
Blokzinciri sihirli bir sözcük. Her derde deva! Peki ya kısıtları? Mert Susur bu tılsımlı sözcüğün cilalarını biraz olsun dökmek pahasına, bizlere gerçekleri, sadece gerçekleri söylüyor.
Ethereum, Türkiye coin piyasalarında aktif alınıp satılan bir kripto para. Peki bundan fazlasını bilmek ister misiniz? Musa Baş Derinlemesine Ethereum yazısı ile ayrıntıları gözler önüne seriyor.
Blockchain teknolojisini kullanan Telif Hakları Projeleri\'ni Mihraç Cerrahoğlu bizler için derledi.
Chris Stephenson Meltdown konusu ile putları yıkmaya devam ediyor. Bu defa bilgisayarların yapısı ve tarihi arkaplanı da cabası!
Şair "Dışarıda Deli Dalgalar" diyor. Murat Şişman ise Sinyal İstihbaratı ile deli dolu ve tehlikeli bir oyunun perdesini aralıyor. Lütfen evlerinizde denemeyin!
Google Adsense ile zengin olmak ister misiniz? Bir webmaster yaızısından fazlası. Google\'a ortak olmak isterseniz Sönmez Ertem\'e kulak verin.
2000\'li yılların efsane dergisi Türk Crackerler Gazetesi ve TR Scene\'in hikâyesini birinci ağızdan, Projman\'dan dinleyin.
Hacker Palas hikâyesi ile Yusuf Yaltırık, yaşanmış bir hacking hikayesini anlatıyor.
Orwell\'in ünlü romanı 1984\'ün 70. yaşını erken kutlamak isteyenler için korkunç bir distopya Çağatay Çalı\'dan: Esir Yeni Dünya! Fark şu ki 1984\'ün distopyası Orwell\'ın kafasının içinde idi, Çağatay\'ın distopyası ise kanlı canlı karşımızda!
Amatör Telsizcilik yazı dizisinin ilki ile Tüm Telsiz Amatörleri Derneği (TAMAD) Başkanı Murat Kaygısız, Ubuntu Kurulumu\'na dair ipuçları ile Erhan Altındaş, Kuantum Bilgisayar yazısı ile Esra Serttaş Arka Kapı Dergisi 2. sayısında!'
            ],
            [
                'slug' => 'arka-kapi-dergi-sayi-3',
                'title' => 'Arka Kapı Dergi Sayı 3',
                'issue' => 3,
                'price' => 9.99,
                'month' => '06-07 2018',
                'language' => 'tr',
                'content' => 'Casuslar hangi araçları kullanıyor hiç merak ettiniz mi? Şahin Solmaz Milli İstihbarat Teşkilatı\'nın organize ettiği Temas sergisini sizler için gezdi.
Siber güvenlik dünyasının ağabeyi Mert Sarıca durmak bilmeyen temposu ile gençlere adeta taş çıkartıyor. Sevdiğiniz işi yaparsanız çalışmak zorunda kalmazsınız, sözünün canlı ispatı Mert Sarıca röportajını severek okuyacaksınız.
İtalyan araştırmacı Simone Margaritelli (evilsocket) için kendi kendine öğrenme eşsiz bir deneyim. Siber güvenlik dünyasının bu yaramaz çocuğu hakkında ilginç detaylar Utku Şen\'in röportajında sizleri bekliyor.
Hangi mesajlaşma uygulaması daha güvenli, diye merak mı ediyorsunuz? Üçüncü sayımızda yer alan Güvenli Mesajlaşma Uygulamaları Karşılaştırma Tablosu tam size göre!
Çevrimiçi olmayan bir iletişim ağı kurabilmek mümkün mü? Utku Şen bu soruyu yıllarca kafasında dolaştırdığı planı nihayet satırlara dökerek yanıtlıyor.
Her derde deva IPv6 sadra şifa oldu mu? Umutlar başka bahara mı kaldı? Murat Yıldırımoğlu engin bilgisi ile bu soruyu sizler için cevaplıyor.
Açık erişimli kablosuz ağlar fırsat mı tuzak mı? Ülkemizi Blackhat\'de temsil eden araştırmacılardan biri olan Besim Altınok, kablosuz ağlar konusunda gözümüzden kaçan ayrıntıları mercek altına alıyor.
Redhat temelli dağıtımların DHCP client\'ında bulunan DynoRoot zafiyeti nasıl istismar edilir? İç ağınıza sızan bir saldırgan bu zafiyeti kullanıp nasıl komut çalıştırabilir, konunun ayrıntılarını Barkın Kılıç yazdı.
Defansif dünyaya ofansif bir dokunuş için deneyimli sızma testi uzmanı Halil Dalabasmaz kendi geliştirdiği SpookFlare yazılımı ile hedef sistemlerdeki antivirüs vb. güvenlik mekanizmalarını aşmanın yollarını irdeliyor.
Neden JavaScript dosyalarında önemli bilgiler saklamamalısınız? Cross Site Script Inclusion (CSSI)\'nin göz kamaştıran detayları Sven Morgenroth Arka Kapı dergisi için kaleme aldı.
Ulaş Fırat Özdemir ilk sayıda başladığı WAF atlatma yöntemleri dizisine, üçüncü sayıda kaldığı yerden devam ediyor. Kaçırmayın!
Tünelin sonundaki ışık bir çıkış mı, yoksa üzerimize doğru gelen bir tren mi? Spectre ve Gelecek yazısı ile Chris Stephenson üçlemesini geleceğe dair varsayımlarla noktalıyor.
Kriptoloji alanındaki gelişmeler ile somut uygulama alanı bulan asal sayıların tüm gizemi Halit İnce\'nin yazısı ile aydınlanıyor.
Kriptolojinin Altın Çağında Kriptoanaliz yazısı ile Bayram Gök, okurlarını bir düelloya çağırıyor. Ne diyelim? İyi olan kazansın!
Merkezi olmayan bir internet mümkün mü? Zeki Müren de bizi görebilecek mi? Mustafa Yalçın\'ın yazısı ile yeni internete merhaba deyin!
Blok zinciri uygulamaları her derde deva. Modern dünyanın tüm problemlerini çözen dijital bir mesih! Peki kazın ayağı öyle mi? Mert Susur blok zinciri uygulamaları ve güvenlik sorunlarını bir uzman gözünden irdeliyor.
Bir holdingin ıssız koridorlarında, gece yarısı genç bir hacker ne arıyor? Yusuf başına bir iş gelmeyecekse, bu soruya Arka Kapı Dergisi\'nde yanıt veriyor.
Amatör Telsizcilik yazılarından sonra artık ikna oldunuz mu? Durun, siz amatör telsizci olamazsınız! Murat Kaygısız amatör telsiz kullanımlarındaki lisans zorunluluğunu kaleme aldı.
Eski hackerlardan kim kaldı? Efsanevi hacker Bill Gopser\'ı bir de Cansu Topukçu\'dan dinleyin.'
            ],
            [
                'slug' => 'arka-kapi-dergi-sayi-4',
                'title' => 'Arka Kapı Dergi Sayı 4',
                'issue' => 4,
                'price' => 9.99,
                'month' => '08-09 2018',
                'language' => 'tr',
                'content' => '"Wikipedia\'ya uygulanan erişim yasağı ikinci yılına yaklaşıyor. Wikipedia ile ilgili merak edilen soruları Wikimedia vakfına sizler için sorduk. Wikimedia\'nın yanıtları sizi çok şaşırtacak!
Neredeyse her gün bir sızıntı haberi ile uyanıyoruz. Bu veri sızıntılarıyla baş etmek samanlıkta iğne aramak mıdır? Pınar Dağ Veri Gazeteciliği ve Sızıntı Kültürü ilişkisini sizler için yazdı.
Önce Meltdown ve Spectre, ardından Foreshadow. Donanım üreticileri hız adına güvenliği feda mı ediyor? Yoksa başka sorular mı sormalıyız? Chris Stephenson donanım ve yazılım dünyasında yaklaşan devrimin ayak seslerini duymamızı sağlıyor.
Tüm telefon trafiğini izlemek ve yönlendirmeye imkân veren SS7 protokolü nasıl çalışıyor? Neden İsrail dışındaki tüm operatör altyapılarında SS7 saldırısı mümkün? Murat Şişman sizler için yanıtlıyor.
Koray Peksayar\'ın kaleminden yaşanmış bir adli soruşturma hikâyesi. Kendinizi karmaşık bir olayın tam ortasında bulmaya hazır mısınız? Usta bir adlibilişimci ile zor bir vakayı çözmeye ne dersiniz?
Laptop\'unuzun hacklenip hacklenmediğini merak ediyor musunuz? Micah Lee\'nin "Laptop\'um Hacklendi Mi?" yazısı tam size göre.
Siber güvenlik bir stratejik iletişim meselesi mi? Peki bir seçim kampanyasının iletişim danışmanı bir e-postayı yanlış cevaplarsa neler olur? Minhac Çelik bir kitap okudu ve tüm paradigmamızı değiştiriyor.
Hem yerli olsun hem de milli diyenler, çok geçmeden uzun dönem mi kısa dönem mi sorularını soruyor. Çünkü zorunlu askerlik hizmeti sektör çalışanlarının kariyerleri açısından önemli bir dönemeç. Utku Şen yerli yazılım hamlesindeki gözden kaçan detayları dikkatleri çekiyor. İsrail örneğinden hareketle, kalifiye elemanların zorunlu askerlik hizmetinin nasıl ülke için bir katma değerli hizmete dönüştürülebileceğini irdeleyerek, ülkemiz için önemli bir çözüm önerisi sunuyor.
Anahtarı komşuya yahut paspasın altına bırakabilirsiniz ancak PGP şifrelemesi için gerekli olan açık anahtarınızı nasıl paylaşacaksınız? İletişim kurduğunuz kişi, gerçekten sizin iletişim kurmayı istediğiniz kişi mi? Recep Kızılarslan Açık Anahtarlı Şifrelemede Anahtar Değişim Problemi ve Keybase\'i sizler için yazdı.
İki aşamalı doğrulama (2FA) kimlik saldırına karşı en önemli güvenlik mekanizmalarının başında geliyor. Ama ReelPhish gerçek zamanlı phishing aracı sayesinde güvendiğiniz dağlara kar yağabilir, 2FA gardınız da düşebilir. Ayrıntıları Huriye Özdemir\'in kaleminden okuyun.
Toplu gözetimde işletim sistemlerinin rolü nedir? En güvenli işletim sistemi hangisi? Tails mi QubeOS mu yoksa Whonix mi? Furkan Senan sizin için yanıtlıyor.
DoS (Denial of Service) saldırılarının anatomisi ve yeni bir DoS aracı BinaryCannon\'u uygulamanın yazarı Bener Kaya \'dan okuyun.
Domain Cached Credentials (DCC) ile Active Directory yönetici hesaplarını ele geçirin. Giray Menekay ayrıntıları sizler için yazdı.
İlk sayımızdan itibaren kriptoloji konusunda meraklı zihinleri aydınlatan Bayram Gök bu defa Endüstri Devrimi\'nde Kriptoloji yazısı ile karşınızda.
Bilgisayarımıza indirdiğimiz yazılım zararlı mı, arşivimizdeki dosyalar değişti mi, bağlandığımız web sitesinin sertifikası güvenli mi? Kullandığımız sistemler bütün bu sorulara yazılımların, dosyaların ve sertifikaların özet bilgilerine bakarak yanıt veriyorlar. Halit İnce ile Özet Fonksiyonları\'nın sihirli dünyasına bir yolculuğa ne dersiniz?
Amatör Telsizcilik sınavı yaklaşıyor. Tüm Telsiz Amatörleri Derneği başkanı Murat Kaygısız her yazısında gönüllere amatör telsizcilik tohumları ekmeye devam ediyor. Kesintisiz bir GPS sistemi Automatic Packet Reporting System\'nin (APRS) bilinmeyenlerini Murat Kaygısız\'dan okuyun.
3. sayımızda Holding koridorlarında gece yarısı macerasını okuduğumuz Yusuf Şahin bu defa bir üniversite ağına nasıl sızdığını anlatıyor.
Uluslarası camiada zararlı yazılım çalışmalarından çokça söz ettiren kadın araştırmacı Amanda Rousseau (malwareunicorn) röportajı Utku Şen imzası ile dergimizin dördüncü sayısında.'
            ],
            [
                'slug' => 'arka-kapi-dergi-sayi-5',
                'title' => 'Arka Kapı Dergi Sayı 5',
                'issue' => 5,
                'price' => 9.99,
                'month' => '10-11 2018',
                'language' => 'tr',
                'content' => '"Kripto paralara merakınız var, fakat baş döndüren gelişmelerin hızına bir türlü yetişemiyor muusunuz? Uzmancoin.com\'dan Burak Köse Kripto Para Haberlerini sizler için derledi.

Türkiye\'de siber güvenlik farkındalığının artmasında, kalifiye işgücünün yetişmesinde sadece özel sektör değil, kamu kurumları da çaba sarfediyor. Cafer Uluç, siber güvenlik çalışmaları kapsamında İstanbul Milli Eğitim Müdürlüğü ile gerçekleştirdiği keyifli bir söyleşisiye hazır mısınız?

Tüm gelişmelerin ışık hızında seyrettiği siber dünyada bir adım sonrası dahi sürprizler vaadediyor. Peki 30 yıl sonrası? Utku Şen kartları açıyor ve siber güvenliğin gelecek 30 yılı için kehanetlerini sıralıyor. Ne olacak ise halimiz, o çıksın falımız!

Geçtiğimiz günlerde NASA\'nın Insight isimli aracı Mars yüzeyine indi! Peki gezegenler arası yolculuk eden bu araçların yazılımları ne derece güvenlik ve kesinlik vaad ediyo? Chris Stephenson sizler için yanıtlıyor.

Polisiye film tadında nefes kesen bir hikâyeye hazır mısınız? Üstelik olan biten her şey gerçek. Ümran Yıldırımkaya 3VE dolandırıcılık şebekesinin uluslararası bir operasyonla nasıl çökertildiğini sizler için kaleme aldı. Soluksuz okuyacaksınız!

Ayaklarımızı yerden kesen havayolu şirketi hakkımızda hangi kişisel bilgileri toplayıp, nasıl ilişkiler kuruyor hiç merak ettiniz mi? Dr. Ferhat Dikbıyık ilgi çekici araştırması ile huzurlarınızda.

Ömer Faruk Çolakoğlu Veritabanı Saldırı ve Korunma Yöntemleri yazısında bir deneme yanılma saldırısının anatomisini ve önlemek için neler yapılabileceğini inceliyor. Üstelik bu işi otomatize edeceğiniz bir T-SQL scripti de yazının bonusu.

Berk Düşünür\'ün Escrow ödeme sistemlerinde bulduğu ve yüzbinlerce siteyi etkileyen zafiyetin ayrıntıları bu sayımızda sizlerle. Berk\'in çarşıda bulduğu bir zafiyet, nasıl yüzbinlerce siteyi etkiliyor öğrenmek istemez misiniz?

Google\'ın Bildiği Sır Değildir yazısı ile Yusuf Şahin arama motorundan hareketle eriştiği bilgilerin ne kadar ölümcül olabileceğini, bu bilgilerden hareketle bir sistemde erişim hakkı elde ederek kanıtlıyor.

Bener Kaya "Kendi Virüsünü Kendin Yaz: LockDown" yazısı ile Konfiçyus\'un "yaparsam öğrenirim" sözünü adeta doğruluyor. Siz siz olun Konfiçyüs\'ün bilgelik ve doğruluk yolundan ayrılmayın, öğrendiklerinizi arkadaşlarınızın bilgisayarında denemeyin.

Adli bilişim uzmanı Koray Peksayar X-Files yazısı ile pek çok davanın çözülmesinde önemli rol oynayan kilit bir soruyu soruyor: Bu dosyalar nereden geldi?

Arka Kapı okurlarının bilişim uzmanı röportajlarına aşina olduğu Utku Şen bu defa mikrofonu FireEye\'da uzman olarak çalışan Daniel Bohannon\'a uzatıyor. Bohannon suçluluları yakalamak için işinde "kötü" olmak zorunda kalan pek çok uzmanın hislerine tercüman oluyor.

Cansu Topukçu "Eski Hackerlar\'dan kim Kaldı" serisine Richard Greenblatt ile devam ediyor. Bir satranç ustası olan Greenblatt, gerçek bir oyuncu karşısında oynayabilen ilk satranç oyununu da yazan bir deha! Greenblatt satır aralarında kulaklarımıza hacking satranca fena halde benzer diye fısıldıyor.

Hakkında pek çok şehir efsanesi türeyen Lazarus hacker grubu hakkında flood\'a aşina sosyal medya kuşağı enfes bir yazı. Onur Oktay Kuzey Koreli hacker grubu Lazarus\'u sizler için yazdı.

Bayram Gök, İkinci dünya savaşının kara kutusu Enigma şifreleme makinesini Arka Kapı okurları için didik didik ediyor. İkinci Dünya Savaşı\'nın kriptoloji cephesinde konuşulacak şey çok.

Scapy kütüphanesi ile Python\'da ağ paketleri programlamak sadece kolay değil, aynı zamanda zevkli. Güray Yıldırım Scapy Dersleri serisinin ilk yazısı 5. sayımızda sizlerle.

Okunacak ne çok şey, fakat ne kadar az vakit var değil mi? Üstelik yazılımcıyız gecelerimiz kısa, dört nala okumak lazım. Muhammed Hilmi Koca bu samimi yakarışı işitti ve Yazılımcılar İçin Okuma Listesini sizler için hazırladı.

Zor zamanlarda imdadımıza yetişen telsizleri, eşref zamanlarımızın iletişim yolu internet ile bir arada kullanmak istemez misiniz? Şimdi voltran zamanı! İnternet ve telsiz dalgalarını birleştiren ECHOLINK teknolojisi ile ilgili ayrıntılar Murat Kaygısız\'ın kaleminden 5. sayımızda sizlerle."'
            ],
            [
                'slug' => 'arka-kapi-dergi-sayi-6',
                'title' => 'Arka Kapı Dergi Sayı 6',
                'issue' => 6,
                'price' => 9.99,
                'month' => '12-01 2019',
                'language' => 'tr',
                'content' => 'Arka Kapı 1 yaşında! Elinizdeki 6. sayı ile birlikte birinci yaşını dolduran Arka Kapı Dergi yine birbirinden ilginç konularla huzurlarınızda.

UzmanCoin işbirliğinde hazırlanan haberler kripto para dünyasının nabzını tutmaya devam ediyor.

"Annem beni siber güvenlik uzmanı sanıyor, sakın onlara komando olduğumu söylemeyin." Multi displiner bir yaklaşımla siber güvenlik uzmanları yetiştiren program Cyber Struggle merak edilen tüm ayrıntıları ile Arka Kapı \'da. Şahin Solmaz sordu, Kubilay Onur Güngör yanıtladı.

Yapay zekanın adımıza karar vereceği, insansı robotların her işimize koşacağı geleceğin dünyasına Utku Şen\'den farklı bir bakış. Utku Şen geleceğin dünyasında anti virüs ürünlerine yer olmayacağı savını tartışmaya açıyor.

20. yüzyılda kriptoloji yazısı ile Bayram Gök II. Dünya Savaşı\'nın cephe gerisi, kriptoloji cephesinden bildiriyor.

Bilgisayarlar aklında bir sayı tutabilir mi? Bir bilgisayarın seçtiği rastgele bir sayı ne kadar rastgele? Şifreleme sistemlerinin yumuşak karnı rastgele sayı üretimine hiç bu gözle bakmamıştınız. Chris Stephenson "Rastgele sayılar rastgele olmayınca" yazısı ile karşınızda.

Bir sırrınız var ve paylaşmak istiyorsanız Frigya Kralı Midas\'ın eşek kulakları olduğunu öğrenen berber gibi bu sırrı kuyulara haykırmak zorunda değilsiniz. Çözüm sır paylaşım sistemini kullanıp en doğru kişiler ile paylaşmak. Ceren İnce Sır Paylaşım Sistemlerini sizler için yazdı.

Günümüzün en büyük problemi web. Web\'in merkezi yapısı olası bir erişim engelleme kararında bilgiye ulaşımı felç ediyor. Peki dağıtık bir web\'i hiç hayal etmiş miydiniz? Mustafa Yalçın, IPFS ile Kalıcı bir webin mümkün olduğunu bizlere gösteriyor.

Finansal özgürlük ve gerçek bir gizlilik istiyor ve mevcut seçeneklerin ihtiyaçlarınızı karşılaşamadığını mı düşünüyorsunuz? Monero bu günler için var! Gerçek bir gizlilik ve güvenlik vaat eden, Dark Web\'in gayri resmi para birimi Monero\'nun tüm ayrıntıları Arka Kapı Dergide sizlerle.

Online hesaplarınızın güvenliği için güçlü bir parolanın yanında, iki aşamalı doğrulama da zaruri. Peki SMS mi yoksa bir OTP cihazı mı? Google Authenticator ve Authy iki yaygın doğrulama uygulaması olarak büyük ilgi görüyor. Peki ya hangisi daha güvenli? Ulaş Fırat Özdemir sizler için cevaplıyor.

Önüm, arkam, sağım, solum Wifi mi diyorsunuz? Peki ya bu kamusal ağlar güvenli mi? Besim Altınok, "Kablosuz Ağlarda Parola Kırma Saldırılarını sizler için yazdı.

Birgün bir PDF okudum ve bütün hayatım değişti dememek, benzer saldırı vektörlerine karşı uyanık olabilmek için Ferdi Gül deneysel çalışması "Bilgisayarınızdaki Ajan PowerSpy" yazısı ile Arka Kapı Dergide.

Güray Yıldırım Python ile Scapy\'de Ağ Paketi Programlama yazı dizisine kaldığı yerden devam ediyor. Dizinin ikinci yazısını dergimizde bulabilirsiniz.

Sağlam kafa sağlam vücutta mı bulunur, yoksa vücudun sağlığını tesis etmek sağlam kafaların işi midir? Huriye Özdemir, "Siber Güvenlikte Yeni Odak Noktası: Zihinsel Sağlık" yazısı ile siber güvenlik çalışanlarının mental sağlığı konusuna eğiliyor.

Muhammed Hilmi Koca, "Yazılımcılar İçin Okuma Listesi" ile heybesinde biriktirdiği yazıları bizlerle paylaşıyor.

Sinyal istihbaratı çalışmaları için Murat Şişman tarafından özel olarak tasarlanan Linux dağıtımı SigintOS\'u, proje lideri Şişman\'ın kaleminden okumak ister misiniz? Öyle ise buyrun.

Amatör telsizcilik serüveninde telsiz haberleşmesi için gerekli altyapı bilgileri nelerdir, neleri bilmeli, hangi konularda kendinizi geliştirmelisiniz. Murat Kaygısız, "Telsiz Haberleşmesi Altyapı Bilgileri" başlıklı yazıyı sizler için kaleme aldı.'
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
</ul>'
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
</ul>'
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
</ul>'
            ]
        ];

        DB::table('issues')->insert($issues);
    }
}
