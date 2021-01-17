<?php
require_once(dirname(__FILE__).'/music.class.php');

// Le Data Access Objet
class MusicDAO {
  private $db;

  // Constructeur chargé d'ouvrir la BD
  function __construct() {
    $database = 'sqlite:'.dirname(__FILE__).'/../data/music.db';
    try{
      $this->db = new PDO($database);
    }catch (PDOException $e){
      die("ERREUR connexion : " . $e.getMessage());
    }
  }

  // Accès à une musique
  function get(int $id) : Music {
    $m = $this->db->query("SELECT * FROM music WHERE id='$id'");
    $sortie = $m->fetchALL(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Music');
    return $sortie[0];
  }

  // Retourne l'idf minimum
  function minId() : int {
    $m = $this->db->query("SELECT MIN(id) FROM music");
    $sortie = $m->fetchALL(PDO::FETCH_NUM);
    return $sortie[0][0];
  }

  // Retourne l'idf maximum
  function maxId() : int {
    $m = $this->db->query("SELECT MAX(id) FROM music");
    $sortie = $m->fetchALL(PDO::FETCH_NUM);
    return $sortie[0][0];
  }
}

?>
