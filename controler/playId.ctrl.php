<?php
// Joue une musique conneu par son Id
// Inclusion du modèle
require_once('../model/music.class.php');
require_once('../model/musicDAO.class.php');
require_once('../framework/view.class.php');

if(! (isset($_GET['id']) && isset($_GET['page']) && isset($_GET['pageSize']))){
  $id = 5; $page = 1; $pageSize = 8; // On mets des valeurs par défaut
}else{
  $id = $_GET['id']; $page = $_GET['page']; $pageSize = $_GET['pageSize'];
}
$dao = new MusicDAO();
$music = $dao->get($id);
$simg = $music->getURL() . "img/" . $music->id . ".jpg";
$smp3 = $music->getURL() . "mp3/" . $music->id . ".mp3";
$view = new View();
$view->assign('page',$page);
$view->assign('pageSize',$pageSize);
$view->assign('id',$id);
$view->assign('music',$music);
$view->assign('simg',$simg);
$view->assign('smp3',$smp3);
$view->display('../view/playId.view.php');
?>
