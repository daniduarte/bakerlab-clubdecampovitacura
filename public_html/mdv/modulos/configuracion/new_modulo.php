<?php 
    // Nombre action
    $action_name    = "Módulos";
    $action_item    = substr($action_name, 0, -1);
?>
<div id="content-header">
    <div id="breadcrumb"> 
      <a href="<?=BASEURL;?>inicio" title="Ir a Inicio" class="tip-bottom"><i class="icon-home"></i> Inicio</a>
      <a href="<?=$mod_root;?>modulos" class="tip-bottom">Configuración</a>   
      <a href="<?=$mod_root;?>modulos" class="tip-bottom"><?=$action_name;?></a> 
      <a href="<?=$mod_root;?>new_modulo" class="current">Crear <?=$action_item;?></a> 
    </div>
    <h1>Crear <?=$action_item;?></h1>
</div>

<div class="container-fluid">
    <hr>
    <div class="row-fluid">
      	<div class="span12">

        	<div class="widget-box">
          		<div class="widget-title"> 
                  <span class="icon"> <i class="<?=$icono;?>"></i> </span>
                  <h5><?=$action_item;?></h5>
              </div>

              <div class="widget-content nopadding" id="printhere">
                  
                  <form class="form-horizontal" method="post" action="#" autocomplete="off" 
                      name="modulo" id="modulo" novalidate="novalidate">

                      <input type="hidden" name="modo" value="nuevo" />
                      <input type="hidden" name="ruta" value="<?=$mod_root;?>" />

                      <div class="control-group">
                          <label class="control-label">Nombre</label>
                          <div class="controls">
                              <input type="text" name="nombre" id="nombre" class="span4">
                          </div>
                      </div>

                      <div class="control-group">
                          <label class="control-label">Código</label>
                          <div class="controls">
                              <input type="text" name="codigo" id="codigo" class="span4">
                          </div>
                      </div>
                    
                      <div class="control-group">
                          <label class="control-label">Icono</label>
                          <div class="controls">
                                <select name="icono" id="icono" class="span4">

                                    <option value="icon-glass"> icon-glass</option>
                                    <option value="icon-music"><i class="icon-music"></i> icon-music</option>
                                    <option value="icon-search"><i class="icon-search"></i> icon-search</option>
                                    <option value="icon-envelope"><i class="icon-envelope"></i> icon-envelope</option>
                                    <option value="icon-heart"><i class="icon-heart"></i> icon-heart</option>
                                    <option value="icon-star"><i class="icon-star"></i> icon-star</option>
                                    <option value="icon-star-empty"><i class="icon-star-empty"></i> icon-star-empty</option>
                                    <option value="icon-user"><i class="icon-user"></i> icon-user</option>
                                    <option value="icon-film"><i class="icon-film"></i> icon-film</option>
                                    <option value="icon-th-large"><i class="icon-th-large"></i> icon-th-large</option>
                                    <option value="icon-th"><i class="icon-th"></i> icon-th</option>
                                    <option value="icon-th-list"><i class="icon-th-list"></i> icon-th-list</option>
                                    <option value="icon-ok"><i class="icon-ok"></i> icon-ok</option>
                                    <option value="icon-remove"><i class="icon-remove"></i> icon-remove</option>
                                    <option value="icon-zoom-in"><i class="icon-zoom-in"></i> icon-zoom-in</option>
                                    <option value="icon-zoom-out"><i class="icon-zoom-out"></i> icon-zoom-out</option>
                                    <option value="icon-off"><i class="icon-off"></i> icon-off</option>
                                    <option value="icon-signal"><i class="icon-signal"></i> icon-signal</option>
                                    <option value="icon-cog"><i class="icon-cog"></i> icon-cog</option>
                                    <option value="icon-trash"><i class="icon-trash"></i> icon-trash</option>
                                    <option value="icon-home"><i class="icon-home"></i> icon-home</option>
                                    <option value="icon-file"><i class="icon-file"></i> icon-file</option>
                                    <option value="icon-time"><i class="icon-time"></i> icon-time</option>
                                    <option value="icon-road"><i class="icon-road"></i> icon-road</option>
                                    <option value="icon-download-alt"><i class="icon-download-alt"></i> icon-download-alt</option>
                                    <option value="icon-download"><i class="icon-download"></i> icon-download</option>
                                    <option value="icon-upload"><i class="icon-upload"></i> icon-upload</option>
                                    <option value="icon-inbox"><i class="icon-inbox"></i> icon-inbox</option>
                                    <option value="icon-play-circle"><i class="icon-play-circle"></i> icon-play-circle</option>
                                    <option value="icon-repeat"><i class="icon-repeat"></i> icon-repeat</option>
                                    <option value="icon-refresh"><i class="icon-refresh"></i> icon-refresh</option>
                                    <option value="icon-list-alt"><i class="icon-list-alt"></i> icon-list-alt</option>
                                    <option value="icon-lock"><i class="icon-lock"></i> icon-lock</option>
                                    <option value="icon-flag"><i class="icon-flag"></i> icon-flag</option>
                                    <option value="icon-headphones"><i class="icon-headphones"></i> icon-headphones</option>
                                    <option value="icon-volume-off"><i class="icon-volume-off"></i> icon-volume-off</option>
                                    <option value="icon-volume-down"><i class="icon-volume-down"></i> icon-volume-down</option>
                                    <option value="icon-volume-up"><i class="icon-volume-up"></i> icon-volume-up</option>
                                    <option value="icon-qrcode"><i class="icon-qrcode"></i> icon-qrcode</option>
                                    <option value="icon-barcode"><i class="icon-barcode"></i> icon-barcode</option>
                                    <option value="icon-tag"><i class="icon-tag"></i> icon-tag</option>
                                    <option value="icon-tags"><i class="icon-tags"></i> icon-tags</option>
                                    <option value="icon-book"><i class="icon-book"></i> icon-book</option>
                                    <option value="icon-bookmark"><i class="icon-bookmark"></i> icon-bookmark</option>
                                    <option value="icon-print"><i class="icon-print"></i> icon-print</option>
                                    <option value="icon-camera"><i class="icon-camera"></i> icon-camera</option>
                                    <option value="icon-font"><i class="icon-font"></i> icon-font</option>
                                    <option value="icon-bold"><i class="icon-bold"></i> icon-bold</option>
                                    <option value="icon-italic"><i class="icon-italic"></i> icon-italic</option>
                                    <option value="icon-text-height"><i class="icon-text-height"></i> icon-text-height</option>
                                    <option value="icon-text-width"><i class="icon-text-width"></i> icon-text-width</option>
                                    <option value="icon-align-left"><i class="icon-align-left"></i> icon-align-left</option>
                                    <option value="icon-align-center"><i class="icon-align-center"></i> icon-align-center</option>
                                    <option value="icon-align-right"><i class="icon-align-right"></i> icon-align-right</option>
                                    <option value="icon-align-justify"><i class="icon-align-justify"></i> icon-align-justify</option>
                                    <option value="icon-list"><i class="icon-list"></i> icon-list</option>
                                    <option value="icon-indent-left"><i class="icon-indent-left"></i> icon-indent-left</option>
                                    <option value="icon-indent-right"><i class="icon-indent-right"></i> icon-indent-right</option>
                                    <option value="icon-facetime-video"><i class="icon-facetime-video"></i> icon-facetime-video</option>
                                    <option value="icon-picture"><i class="icon-picture"></i> icon-picture</option>
                                    <option value="icon-pencil"><i class="icon-pencil"></i> icon-pencil</option>
                                    <option value="icon-map-marker"><i class="icon-map-marker"></i> icon-map-marker</option>
                                    <option value="icon-adjust"><i class="icon-adjust"></i> icon-adjust</option>
                                    <option value="icon-tint"><i class="icon-tint"></i> icon-tint</option>
                                    <option value="icon-edit"><i class="icon-edit"></i> icon-edit</option>
                                    <option value="icon-share"><i class="icon-share"></i> icon-share</option>
                                    <option value="icon-check"><i class="icon-check"></i> icon-check</option>
                                    <option value="icon-move"><i class="icon-move"></i> icon-move</option>
                                    <option value="icon-step-backward"><i class="icon-step-backward"></i> icon-step-backward</option>
                                    <option value="icon-fast-backward"><i class="icon-fast-backward"></i> icon-fast-backward</option>
                                    <option value="icon-backward"><i class="icon-backward"></i> icon-backward</option>
                                    <option value="icon-play"><i class="icon-play"></i> icon-play</option>
                                    <option value="icon-pause"><i class="icon-pause"></i> icon-pause</option>
                                    <option value="icon-stop"><i class="icon-stop"></i> icon-stop</option>
                                    <option value="icon-forward"><i class="icon-forward"></i> icon-forward</option>
                                    <option value="icon-fast-forward"><i class="icon-fast-forward"></i> icon-fast-forward</option>
                                    <option value="icon-step-forward"><i class="icon-step-forward"></i> icon-step-forward</option>
                                    <option value="icon-eject"><i class="icon-eject"></i> icon-eject</option>
                                    <option value="icon-chevron-left"><i class="icon-chevron-left"></i> icon-chevron-left</option>
                                    <option value="icon-chevron-right"><i class="icon-chevron-right"></i> icon-chevron-right</option>
                                    <option value="icon-plus-sign"><i class="icon-plus-sign"></i> icon-plus-sign</option>
                                    <option value="icon-minus-sign"><i class="icon-minus-sign"></i> icon-minus-sign</option>
                                    <option value="icon-remove-sign"><i class="icon-remove-sign"></i> icon-remove-sign</option>
                                    <option value="icon-ok-sign"><i class="icon-ok-sign"></i> icon-ok-sign</option>
                                    <option value="icon-question-sign"><i class="icon-question-sign"></i> icon-question-sign</option>
                                    <option value="icon-info-sign"><i class="icon-info-sign"></i> icon-info-sign</option>
                                    <option value="icon-screenshot"><i class="icon-screenshot"></i> icon-screenshot</option>
                                    <option value="icon-remove-circle"><i class="icon-remove-circle"></i> icon-remove-circle</option>
                                    <option value="icon-ok-circle"><i class="icon-ok-circle"></i> icon-ok-circle</option>
                                    <option value="icon-ban-circle"><i class="icon-ban-circle"></i> icon-ban-circle</option>
                                    <option value="icon-arrow-left"><i class="icon-arrow-left"></i> icon-arrow-left</option>
                                    <option value="icon-arrow-right"><i class="icon-arrow-right"></i> icon-arrow-right</option>
                                    <option value="icon-arrow-up"><i class="icon-arrow-up"></i> icon-arrow-up</option>
                                    <option value="icon-arrow-down"><i class="icon-arrow-down"></i> icon-arrow-down</option>
                                    <option value="icon-share-alt"><i class="icon-share-alt"></i> icon-share-alt</option>
                                    <option value="icon-resize-full"><i class="icon-resize-full"></i> icon-resize-full</option>
                                    <option value="icon-resize-small"><i class="icon-resize-small"></i> icon-resize-small</option>
                                    <option value="icon-plus"><i class="icon-plus"></i> icon-plus</option>
                                    <option value="icon-minus"><i class="icon-minus"></i> icon-minus</option>
                                    <option value="icon-asterisk"><i class="icon-asterisk"></i> icon-asterisk</option>
                                    <option value="icon-exclamation-sign"><i class="icon-exclamation-sign"></i> icon-exclamation-sign</option>
                                    <option value="icon-gift"><i class="icon-gift"></i> icon-gift</option>
                                    <option value="icon-leaf"><i class="icon-leaf"></i> icon-leaf</option>
                                    <option value="icon-fire"><i class="icon-fire"></i> icon-fire</option>
                                    <option value="icon-eye-open"><i class="icon-eye-open"></i> icon-eye-open</option>
                                    <option value="icon-eye-close"><i class="icon-eye-close"></i> icon-eye-close</option>
                                    <option value="icon-warning-sign"><i class="icon-warning-sign"></i> icon-warning-sign</option>
                                    <option value="icon-plane"><i class="icon-plane"></i> icon-plane</option>
                                    <option value="icon-calendar"><i class="icon-calendar"></i> icon-calendar</option>
                                    <option value="icon-random"><i class="icon-random"></i> icon-random</option>
                                    <option value="icon-comment"><i class="icon-comment"></i> icon-comment</option>
                                    <option value="icon-magnet"><i class="icon-magnet"></i> icon-magnet</option>
                                    <option value="icon-chevron-up"><i class="icon-chevron-up"></i> icon-chevron-up</option>
                                    <option value="icon-chevron-down"><i class="icon-chevron-down"></i> icon-chevron-down</option>
                                    <option value="icon-retweet"><i class="icon-retweet"></i> icon-retweet</option>
                                    <option value="icon-shopping-cart"><i class="icon-shopping-cart"></i> icon-shopping-cart</option>
                                    <option value="icon-folder-close"><i class="icon-folder-close"></i> icon-folder-close</option>
                                    <option value="icon-folder-open"><i class="icon-folder-open"></i> icon-folder-open</option>
                                    <option value="icon-resize-vertical"><i class="icon-resize-vertical"></i> icon-resize-vertical</option>
                                    <option value="icon-resize-horizontal"><i class="icon-resize-horizontal"></i> icon-resize-horizontal</option>
                                    <option value="icon-bar-chart"><i class="icon-bar-chart"></i> icon-bar-chart</option>
                                    <option value="icon-twitter-sign"><i class="icon-twitter-sign"></i> icon-twitter-sign</option>
                                    <option value="icon-facebook-sign"><i class="icon-facebook-sign"></i> icon-facebook-sign</option>
                                    <option value="icon-camera-retro"><i class="icon-camera-retro"></i> icon-camera-retro</option>
                                    <option value="icon-key"><i class="icon-key"></i> icon-key</option>
                                    <option value="icon-cogs"><i class="icon-cogs"></i> icon-cogs</option>
                                    <option value="icon-comments"><i class="icon-comments"></i> icon-comments</option>
                                    <option value="icon-thumbs-up"><i class="icon-thumbs-up"></i> icon-thumbs-up</option>
                                    <option value="icon-thumbs-down"><i class="icon-thumbs-down"></i> icon-thumbs-down</option>
                                    <option value="icon-star-half"><i class="icon-star-half"></i> icon-star-half</option>
                                    <option value="icon-heart-empty"><i class="icon-heart-empty"></i> icon-heart-empty</option>
                                    <option value="icon-signout"><i class="icon-signout"></i> icon-signout</option>
                                    <option value="icon-linkedin-sign"><i class="icon-linkedin-sign"></i> icon-linkedin-sign</option>
                                    <option value="icon-pushpin"><i class="icon-pushpin"></i> icon-pushpin</option>
                                    <option value="icon-external-link"><i class="icon-external-link"></i> icon-external-link</option>
                                    <option value="icon-signin"><i class="icon-signin"></i> icon-signin</option>
                                    <option value="icon-trophy"><i class="icon-trophy"></i> icon-trophy</option>
                                    <option value="icon-github-sign"><i class="icon-github-sign"></i> icon-github-sign</option>
                                    <option value="icon-upload-alt"><i class="icon-upload-alt"></i> icon-upload-alt</option>
                                    <option value="icon-lemon"><i class="icon-lemon"></i> icon-lemon</option>
                                    <option value="icon-phone"><i class="icon-phone"></i> icon-phone</option>
                                    <option value="icon-check-empty"><i class="icon-check-empty"></i> icon-check-empty</option>
                                    <option value="icon-bookmark-empty"><i class="icon-bookmark-empty"></i> icon-bookmark-empty</option>
                                    <option value="icon-phone-sign"><i class="icon-phone-sign"></i> icon-phone-sign</option>
                                    <option value="icon-twitter"><i class="icon-twitter"></i> icon-twitter</option>
                                    <option value="icon-facebook"><i class="icon-facebook"></i> icon-facebook</option>
                                    <option value="icon-github"><i class="icon-github"></i> icon-github</option>
                                    <option value="icon-unlock"><i class="icon-unlock"></i> icon-unlock</option>
                                    <option value="icon-credit-card"><i class="icon-credit-card"></i> icon-credit-card</option>
                                    <option value="icon-rss"><i class="icon-rss"></i> icon-rss</option>
                                    <option value="icon-hdd"><i class="icon-hdd"></i> icon-hdd</option>
                                    <option value="icon-bullhorn"><i class="icon-bullhorn"></i> icon-bullhorn</option>
                                    <option value="icon-bell"><i class="icon-bell"></i> icon-bell</option>
                                    <option value="icon-certificate"><i class="icon-certificate"></i> icon-certificate</option>
                                    <option value="icon-hand-right"><i class="icon-hand-right"></i> icon-hand-right</option>
                                    <option value="icon-hand-left"><i class="icon-hand-left"></i> icon-hand-left</option>
                                    <option value="icon-hand-up"><i class="icon-hand-up"></i> icon-hand-up</option>
                                    <option value="icon-hand-down"><i class="icon-hand-down"></i> icon-hand-down</option>
                                    <option value="icon-circle-arrow-left"><i class="icon-circle-arrow-left"></i> icon-circle-arrow-left</option>
                                    <option value="icon-circle-arrow-right"><i class="icon-circle-arrow-right"></i> icon-circle-arrow-right</option>
                                    <option value="icon-circle-arrow-up"><i class="icon-circle-arrow-up"></i> icon-circle-arrow-up</option>
                                    <option value="icon-circle-arrow-down"><i class="icon-circle-arrow-down"></i> icon-circle-arrow-down</option>
                                    <option value="icon-globe"><i class="icon-globe"></i> icon-globe</option>
                                    <option value="icon-wrench"><i class="icon-wrench"></i> icon-wrench</option>
                                    <option value="icon-tasks"><i class="icon-tasks"></i> icon-tasks</option>
                                    <option value="icon-filter"><i class="icon-filter"></i> icon-filter</option>
                                    <option value="icon-briefcase"><i class="icon-briefcase"></i> icon-briefcase</option>
                                    <option value="icon-fullscreen"><i class="icon-fullscreen"></i> icon-fullscreen</option>
                                    <option value="icon-group"><i class="icon-group"></i> icon-group</option>
                                    <option value="icon-link"><i class="icon-link"></i> icon-link</option>
                                    <option value="icon-cloud"><i class="icon-cloud"></i> icon-cloud</option>
                                    <option value="icon-beaker"><i class="icon-beaker"></i> icon-beaker</option>
                                    <option value="icon-cut"><i class="icon-cut"></i> icon-cut</option>
                                    <option value="icon-copy"><i class="icon-copy"></i> icon-copy</option>
                                    <option value="icon-paper-clip"><i class="icon-paper-clip"></i> icon-paper-clip</option>
                                    <option value="icon-save"><i class="icon-save"></i> icon-save</option>
                                    <option value="icon-sign-blank"><i class="icon-sign-blank"></i> icon-sign-blank</option>
                                    <option value="icon-reorder"><i class="icon-reorder"></i> icon-reorder</option>
                                    <option value="icon-list-ul"><i class="icon-list-ul"></i> icon-list-ul</option>
                                    <option value="icon-list-ol"><i class="icon-list-ol"></i> icon-list-ol</option>
                                    <option value="icon-strikethrough"><i class="icon-strikethrough"></i> icon-strikethrough</option>
                                    <option value="icon-underline"><i class="icon-underline"></i> icon-underline</option>
                                    <option value="icon-table"><i class="icon-table"></i> icon-table</option>
                                    <option value="icon-magic"><i class="icon-magic"></i> icon-magic</option>
                                    <option value="icon-truck"><i class="icon-truck"></i> icon-truck</option>
                                    <option value="icon-pinterest"><i class="icon-pinterest"></i> icon-pinterest</option>
                                    <option value="icon-pinterest-sign"><i class="icon-pinterest-sign"></i> icon-pinterest-sign</option>
                                    <option value="icon-google-plus-sign"><i class="icon-google-plus-sign"></i> icon-google-plus-sign</option>
                                    <option value="icon-google-plus"><i class="icon-google-plus"></i> icon-google-plus</option>
                                    <option value="icon-money"><i class="icon-money"></i> icon-money</option>
                                    <option value="icon-caret-down"><i class="icon-caret-down"></i> icon-caret-down</option>
                                    <option value="icon-caret-up"><i class="icon-caret-up"></i> icon-caret-up</option>
                                    <option value="icon-caret-left"><i class="icon-caret-left"></i> icon-caret-left</option>
                                    <option value="icon-caret-right"><i class="icon-caret-right"></i> icon-caret-right</option>
                                    <option value="icon-columns"><i class="icon-columns"></i> icon-columns</option>
                                    <option value="icon-sort"><i class="icon-sort"></i> icon-sort</option>
                                    <option value="icon-sort-down"><i class="icon-sort-down"></i> icon-sort-down</option>
                                    <option value="icon-sort-up"><i class="icon-sort-up"></i> icon-sort-up</option>
                                    <option value="icon-envelope-alt"><i class="icon-envelope-alt"></i> icon-envelope-alt</option>
                                    <option value="icon-linkedin"><i class="icon-linkedin"></i> icon-linkedin</option>
                                    <option value="icon-undo"><i class="icon-undo"></i> icon-undo</option>
                                    <option value="icon-legal"><i class="icon-legal"></i> icon-legal</option>
                                    <option value="icon-dashboard"><i class="icon-dashboard"></i> icon-dashboard</option>
                                    <option value="icon-comment-alt"><i class="icon-comment-alt"></i> icon-comment-alt</option>
                                    <option value="icon-comments-alt"><i class="icon-comments-alt"></i> icon-comments-alt</option>
                                    <option value="icon-bolt"><i class="icon-bolt"></i> icon-bolt</option>
                                    <option value="icon-sitemap"><i class="icon-sitemap"></i> icon-sitemap</option>
                                    <option value="icon-umbrella"><i class="icon-umbrella"></i> icon-umbrella</option>
                                    <option value="icon-paste"><i class="icon-paste"></i> icon-paste</option>
                                    <option value="icon-lightbulb"><i class="icon-lightbulb"></i> icon-lightbulb</option>
                                    <option value="icon-exchange"><i class="icon-exchange"></i> icon-exchange</option>
                                    <option value="icon-cloud-download"><i class="icon-cloud-download"></i> icon-cloud-download</option>
                                    <option value="icon-cloud-upload"><i class="icon-cloud-upload"></i> icon-cloud-upload</option>
                                    <option value="icon-user-md"><i class="icon-user-md"></i> icon-user-md</option>
                                    <option value="icon-stethoscope"><i class="icon-stethoscope"></i> icon-stethoscope</option>
                                    <option value="icon-suitcase"><i class="icon-suitcase"></i> icon-suitcase</option>
                                    <option value="icon-bell-alt"><i class="icon-bell-alt"></i> icon-bell-alt</option>
                                    <option value="icon-coffee"><i class="icon-coffee"></i> icon-coffee</option>
                                    <option value="icon-food"><i class="icon-food"></i> icon-food</option>
                                    <option value="icon-file-alt"><i class="icon-file-alt"></i> icon-file-alt</option>
                                    <option value="icon-building"><i class="icon-building"></i> icon-building</option>
                                    <option value="icon-hospital"><i class="icon-hospital"></i> icon-hospital</option>
                                    <option value="icon-ambulance"><i class="icon-ambulance"></i> icon-ambulance</option>
                                    <option value="icon-medkit"><i class="icon-medkit"></i> icon-medkit</option>
                                    <option value="icon-fighter-jet"><i class="icon-fighter-jet"></i> icon-fighter-jet</option>
                                    <option value="icon-beer"><i class="icon-beer"></i> icon-beer</option>
                                    <option value="icon-h-sign"><i class="icon-h-sign"></i> icon-h-sign</option>
                                    <option value="icon-plus-sign-alt"><i class="icon-plus-sign-alt"></i> icon-plus-sign-alt</option>
                                    <option value="icon-double-angle-left"><i class="icon-double-angle-left"></i> icon-double-angle-left</option>
                                    <option value="icon-double-angle-right"><i class="icon-double-angle-right"></i> icon-double-angle-right</option>
                                    <option value="icon-double-angle-up"><i class="icon-double-angle-up"></i> icon-double-angle-up</option>
                                    <option value="icon-double-angle-down"><i class="icon-double-angle-down"></i> icon-double-angle-down</option>
                                    <option value="icon-angle-left"><i class="icon-angle-left"></i> icon-angle-left</option>
                                    <option value="icon-angle-right"><i class="icon-angle-right"></i> icon-angle-right</option>
                                    <option value="icon-angle-up"><i class="icon-angle-up"></i> icon-angle-up</option>
                                    <option value="icon-angle-down"><i class="icon-angle-down"></i> icon-angle-down</option>
                                    <option value="icon-desktop"><i class="icon-desktop"></i> icon-desktop</option>
                                    <option value="icon-laptop"><i class="icon-laptop"></i> icon-laptop</option>
                                    <option value="icon-tablet"><i class="icon-tablet"></i> icon-tablet</option>
                                    <option value="icon-mobile-phone"><i class="icon-mobile-phone"></i> icon-mobile-phone</option>
                                    <option value="icon-circle-blank"><i class="icon-circle-blank"></i> icon-circle-blank</option>
                                    <option value="icon-quote-left"><i class="icon-quote-left"></i> icon-quote-left</option>
                                    <option value="icon-quote-right"><i class="icon-quote-right"></i> icon-quote-right</option>
                                    <option value="icon-spinner"><i class="icon-spinner"></i> icon-spinner</option>
                                    <option value="icon-circle"><i class="icon-circle"></i> icon-circle</option>
                                    <option value="icon-reply"><i class="icon-reply"></i> icon-reply</option>
                                    <option value="icon-github-alt"><i class="icon-github-alt"></i> icon-github-alt</option>
                                    <option value="icon-folder-close-alt"><i class="icon-folder-close-alt"></i> icon-folder-close-alt</option>
                                    <option value="icon-folder-open-alt"><i class="icon-folder-open-alt"></i> icon-folder-open-alt</option>
                                  
                                </select>
                                <br /><br />
                          </div>
                      </div>

                        <div class="control-group">
                            <label class="control-label">¿Es dinámico?</label>
                            <div class="controls">
                                <input type="checkbox" name="es_dinamico" id="es_dinamico" class="span4"
                                    onchange="$('#dynamic_field').slideToggle();" value="si">
                                Si
                            </div>
                        </div>

                        <div id="dynamic_field" class="hide">
                            
                            <div class="control-group">
                                <label class="control-label">Slug</label>
                                <div class="controls">
                                    <input type="text" name="slug" id="slug" class="span4">
                                    <span class="help-block">
                                        Identificador singular del elemento
                                    </span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Género</label>
                                <div class="controls">
                                    <input type="radio" name="genero" value="0" checked class="span4">
                                    Femenino
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="genero" value="1" class="span4">
                                    Masculino
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Funcionalidades</label>
                                <div class="controls">
                                    <input type="checkbox" name="ingresar" value="si" class="span4">Ingresar
                                    <br />
                                    <input type="checkbox" name="editar" value="si" class="span4">Editar
                                    <br />
                                    <input type="checkbox" name="activar" value="si" class="span4">Activar / Desactivar
                                    <br />
                                    <input type="checkbox" name="reordenar" value="si" class="span4">Reordenar
                                    <br />
                                </div>
                            </div>

                        </div>

                      <div class="form-actions">
                          <input type="submit" value="Guardar" class="btn btn-success">
                          &nbsp;&nbsp;
                          <a href="<?=$mod_root;?>modulos" class="btn btn-danger">Cancelar</a>
                      </div>

                  </form>

              </div>
       		</div>

        </div>
    </div>
</div>