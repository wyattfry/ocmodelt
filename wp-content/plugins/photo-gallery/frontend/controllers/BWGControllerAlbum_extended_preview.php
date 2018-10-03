<?php

class BWGControllerAlbum_extended_preview {

  public function __construct() { }

  public function execute($params = array(), $from_shortcode = 0, $bwg = 0) {
    $this->display($params, $from_shortcode, $bwg);
  }

  public function display($params = array(), $from_shortcode = 0, $bwg = 0) {
    if( $params['show_gallery_description'] ) {
        if ( isset($_POST['type_' . $bwg]) && isset($_POST['album_gallery_id_' . $bwg]) ) {
            $description = WDWLibrary::get_album_gallery_title_description($_POST['type_' . $bwg], $_POST['album_gallery_id_' . $bwg]);
            $params['description'] = $description->description;
        } else {
            if( $params['album_id'] != 0 ) {
                $description = WDWLibrary::get_album_gallery_title_description('album', $params['album_id']);
                $params['description'] = $description->description;
            } else {
              $params['description'] = '';
            }
        }

    }
    if( $params['show_album_name'] ) {
        if ( isset($_POST['type_' . $bwg]) && isset($_POST['album_gallery_id_' . $bwg]) ) {
          $album_title = WDWLibrary::get_album_gallery_title_description($_POST['type_' . $bwg], $_POST['album_gallery_id_' . $bwg]);
          $params['album_title'] = $album_title->name;
        } else {
            if( $params['album_id'] != 0 ) {
              $album_title = WDWLibrary::get_album_gallery_title_description('album', $params['album_id']);
              $params['album_title'] = $album_title->name;
            }
            else {
              $params['album_title'] = "";
            }
        }
    }

    require_once BWG()->plugin_dir . "/frontend/views/BWGViewAlbum_extended_preview.php";
    $view = new BWGViewAlbum_extended_preview();
    $view->display($params, $from_shortcode, $bwg);
  }
}