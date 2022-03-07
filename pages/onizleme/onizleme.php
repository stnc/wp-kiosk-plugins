<?php
function stnc_wp_kiosk_onizleme(){


    if ( ! current_user_can( 'manage_options' ) ) {
        return;
      }
    
      $list_child_terms_args = array(
        'taxonomy' => 'stnc_kiosk_binalar',
        'use_desc_for_title' => 0, // best practice: don't use title attributes ever
        'orderby' => 'name',
        'order'   => 'ASC',
    );
    $root_categories = get_categories($list_child_terms_args);
      // print_r($root_categories[0] );
      // print_r($root_categories[0]->name );
    ?>
    <body>
        <div class="container-fluid ">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                  <a target="_blank" style="color:red" href="/kiosk/?onizleme=1">Önizleme Sayfasını Yeni Sekmede Aç</a>
                <div class="alert alert-danger" style="color:green" role="alert"> Lütfen görüntülenmesini istediğiniz binayı seçiniz</div>
                   <?php foreach ($root_categories as $key => $row ):?>
                    <a style="color:blue" target="iframe_a" href="/kiosk?onizleme=1&bina=<?php echo $row->term_id?>" class="btn btn-primary"><?php echo $row->name?></a>
                <?php endforeach ?>
                </div>
            </div>
        </div>
        </body>
    
    </html>
     
    
     <iframe src="/kiosk" name="iframe_a" style="width:100%;height:1980px" frameborder="0" allowfullscreen ></iframe>
    <?php
    }