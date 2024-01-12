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


    
         <strong>Eklentinin Kullanımı</strong>
          
          admin den bir sayfa açınız 
          <br>
          sayfalar yeni sayfa ->  yan tarafdakı şablon (template) alanından ekranlar kiosk sayfasını seçiniz 
          <br> <br>
          Bu sitede <a href="https://erciyesteknopark.com/wp-admin/post.php?post=9477&action=edit">Kiosk sayfasi ayarlidir, buraya bakilabilir https://erciyesteknopark.com/kiosk/</a>
          <br>
          collect api kapanırsa eğer elle güncelleme veya başka bir api ye geçiniz 
          <br>
          bunun için curl.php dosyasını yazılımcı arkadaşa yada php bilen birisine güncelletebilirsiniz.
         <p>Bu yazılım <a href="https://collectapi.com/">collect api</a> sisteminden veri çeker</p>
         <p>collect api teknopark gmail adreslerinden birisine  bağlıdır  </p>
         Collect apinin size verdigi APIKEY kodunu curl dosyasina yaziniz.
         <br>
         curl dosyasi eklenti icinde bulunmaktadir
         <br>
         collect api den veriler hava durumu verileri cuma gunu saat 5 de cekılır 
         <br>
         altın ve dovız gunde 2 defa saat 8 ve  12 de guncellenır
         <br>
         aylik 100 adet krediniz var collect api de 
         <br>
     
  
         </div>
      </div>
    <?php
    }