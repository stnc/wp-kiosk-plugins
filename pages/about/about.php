<?php
function stnc_wp_kiosk_about(){


    if ( ! current_user_can( 'manage_options' ) ) {
        return;
      }
    

      ?>
      <!-- Our admin page content should all be inside .wrap -->
      <div class="wrap">
        <!-- Print the page title -->
        <h1>Teknopark Ekranlar Bilinmesi Gerekenler</h1>
        <div style="background: #fff;
    border: 1px solid #c3c4c7;
    border-left-width: 4px;
    box-shadow: 0 1px 1px rgb(0 0 0 / 4%);
    margin: 5px 5px 2px;
    padding: 1px 12px;"
    >
    <p>Eklenti Selman Tunç tarafından geliştirilmiştir. sorularınız için selmantunc@gmail.com adresine mail atınız.</p>
   <a target="_blank" href="/kiosk/?onizleme=1">Televizyon Ekranları Önizleme Sayfası</a>
         <p>Bu yazılım <a href="https://collectapi.com/">collect api</a> sisteminden veri çeker</p>
         <p> <a href="https://collectapi.com/"> collect api de</a>  şu gmail adresine bağlıdır  erciyes.teknopark.it@gmail.com</p>
         <br>
         <a href="https://collectapi.com/"> collect api den</a> veriler hava durumu verileri cuma gunu saat 5 de çekilir 
         <br>
         altın ve dovız gunde 2 defa saat 8 ve  12 de guncellenır
         ücretsiz versiyon da 100 adet krediniz var <a href="https://collectapi.com/"> collect api de</a> 
         <br>
         <br>
     

         <strong>  Kullanımı </strong>
         <br>
     
         <br>
     
         admin den bir sayfa açınız 
         <br>
         sayfalar yeni sayfa deyiniz yan tarafdakı şablon (template) alanından ekranlar kiosk sayfasını seçiniz 
         <br>
         collect api kapanırsa eğer elle güncelleme veya başka bir api ye geçiniz.
         <br>
         cpanel cron işlemleri anadizinde bulunan curl.php dosyasını kullanır. 
         <br>
         plugin içinde bulunan curl.php yedek amaçlıdır, kullanılmaz
         <br>         

           cron işleri için kullanılacak yollar 
           
         https://erciyesteknopark.com/curl.php?dghjghhdd=sssd&sageon=hava
         <br>    
         https://erciyesteknopark.com/curl.php?dghjghhdd=sssd&sageon=exchange

         </div>
      </div>
    <?php
    }