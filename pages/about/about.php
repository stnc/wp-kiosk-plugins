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
         <p>Bu yazılım <a href="https://collectapi.com/">collect api</a> sisteminden veri çeker</p>
         <p>collect api de şu gmail adresine bağlıdır bla bla </p>
         collect api den veriler hava durumu verileri cuma gunu saat 5 de cekılır 
         altın ve dovız gunde 2 defa saat 8 ve  12 de guncellenır
         100 adet krediniz var api de 
         şu mail adresi ve şu apikeyi kullanıyor
         

         kullanımı 
         admin den bir sayfa açınız 
         sayfalar yeni sayfa deyiniz yan tarafdakı şablon (template) alanından ekranlar kiosk sayfasını seçiniz 

         collect api kapanırsa eğer elle güncelleme veya başka bir api ye geçiniz 
         bunun için curlddasfdsds.php dosyasını yazılımcı arkadaşa güncelletebilirsiniz.

         </div>
      </div>
    <?php
    }