özel sayfasında hangi ekran seçeceğini bilgisi olmalı 
sliderları gosterirken eğer resim ekli değilse onu göstermesin 
sonraki guncellemeye ne kadar kaldi saati jquery.countdown.min.js eklendi 
    <div class="col-md-6"> 
    <h1 class="title"><b>Bitmesine Kalan Süre</b></h1>
    <div class="countdown" id="normal-countdown" data-date="2021/04/10"></div>
</div>
    <div class="col-md-6"> 
    <h1 class="title"><b>Kurbana Kalan Süre</b></h1>
    <div class="countdown" id="kurban-countdown" data-date="2021/07/19"></div>
</div>
</div>


<script>
(function ($) {
"use strict";
//NORMAL TIMES COUNTDOWN
if(isExists('#normal-countdown')){
var date = $('#normal-countdown').data('date');
$('#normal-countdown').countdown(date, function(event) {
  var $this = $(this).html(event.strftime(''
    + '<div class="time-sec"><h3 class="main-time">%D</h3> <span>Gün</span></div>'
    + '<div class="time-sec"><h3 class="main-time">%H</h3> <span>Saat</span></div>'
    + '<div class="time-sec"><h3 class="main-time">%M</h3> <span>Dakika</span></div>'
    + '<div class="time-sec"><h3 class="main-time">%S</h3> <span>Saniye</span></div>'));
});
}

if(isExists('#kurban-countdown')){
var date = $('#kurban-countdown').data('date');
$('#kurban-countdown').countdown(date, function(event) {
  var $this = $(this).html(event.strftime(''
    + '<div class="time-sec"><h3 class="main-time">%D</h3> <span>Gün</span></div>'
    + '<div class="time-sec"><h3 class="main-time">%H</h3> <span>Saat</span></div>'
    + '<div class="time-sec"><h3 class="main-time">%M</h3> <span>Dakika</span></div>'
    + '<div class="time-sec"><h3 class="main-time">%S</h3> <span>Saniye</span></div>'));
});
}


})(jQuery);



function isExists(elem){
	if ($(elem).length > 0) { 
		return true;
	}
	return false;
}

</script>

https://github.com/notifirehq/notifire/tags  tag ve versiyonlama için buna bak 

notice gibi bişey eklemnecek onunla resimin olması gereken boyut uyarısı verecek yada sidebar falan bı yere eklenebilir 

sidebar metabox isimleri değişecek 

çoklu dil eklenebilir 

apiyi kapatma olayi olsun 

slide genel gorunme suresi 

slidelar hangi tipe gore siralansin tarih id 

hava durumu gecis suresi 

6 gunluk hava durumu olsun mu 

doviz altin sekmesini gosterme onun yerine 6 gunluk hava durumu olsun 

dolar 
euro
altin
ceyrek altin


unutma video ise onun testinin yapilmasi lazim 

