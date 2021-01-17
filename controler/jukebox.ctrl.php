<?php
// Inclusion du modèle
require_once('../model/music.class.php');
require_once('../model/musicDAO.class.php');
require_once('../framework/view.class.php');
if(! (isset($_GET['page']) && isset($_GET['pageSize']))){
  if (isset($_GET['pageF'])) { // Si pageF est donné
    $page = $_GET['pageF']; $pageSize = 8;
  }else{
    $page = 1; $pageSize = 8; // On mets des valeurs par défaut
  }
}else{
  $page = $_GET['page']; $pageSize = $_GET['pageSize'];
}
$dao = new MusicDAO();
$id = $pageSize * ($page-1) + 1;
$view = new View();
$view->assign('page',$page);
$view->assign('pageSize',$pageSize);
$view->assign('id',$id);
$view->assign('dao',$dao);
$view->display('../view/jukebox.view.php');
?>
