<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>&#x1F399; Mon jukebox avec BD</title>
  <link rel="stylesheet" type="text/css" href="../view/design/style.css">
  <title></title>
</head>
<body>
  <header>
    <h1>Ma musique dans mon Jukebox</h1>
  </header>
  <!-- Navigation -->
  <nav>
    <p>
      <a href="jukebox.ctrl.php?page=1&pageSize=<?= $pageSize ; ?>">
        <span class="arrow left"></span><span class="arrow left"></span>
      </a>
      <?php if ($page == 1): ?>
        <a href="jukebox.ctrl.php?page=1&pageSize=<?=$pageSize;?>">
          <span class="arrow left"></span>
        </a>
      <?php else: ?>
        <a href="jukebox.ctrl.php?page=<?=$page-1;?>&pageSize=<?=$pageSize;?>">
          <span class="arrow left"></span>
        </a>
      <?php endif; ?>

      <?php
        $indice = $page+1;
        printf("<a class=\"selected\" href=\"jukebox.ctrl.php?page=$page&pageSize=$pageSize\">$page</a>");
        while ($indice <= 70 && $indice < ($page+7) ) {
        printf("<a href=\"jukebox.ctrl.php?page=$indice&pageSize=$pageSize\">$indice</a>");
          $indice++;
        }
       ?>

      <?php if ($page == 70): ?>
        <a href="jukebox.ctrl.php?page=70&pageSize=<?= $pageSize ; ?>">
          <span class="arrow right"></span>
        </a>
      <?php else: ?>
        <a href="jukebox.ctrl.php?page=<?= $page+1 ; ?>&pageSize=<?= $pageSize ; ?>">
          <span class="arrow right"></span>
        </a>
      <?php endif; ?>
      <a href="jukebox.ctrl.php?page=70&pageSize=<?= $pageSize ; ?>">
        <span class="arrow right"></span><span class="arrow right"></span>
      </a>
    </p>
    <form action="jukebox.ctrl.php" method="get">
      <p>Musiques/page</p>
      <input name="pageF" type="text" value="8" maxlength="4" size="2">
    </form>
  </nav>

  <!-- Contenu principal -->
  <main>
    <section>
      <?php for($i=0; $i < $pageSize; $i++): ?>
        <?php $music = $dao->get($id); ?>
        <figure>
          <a href="playId.ctrl.php?id=<?= $id ?>&page=<?= $page ?>&pageSize=<?= $pageSize ?>">
            <img src="http://www-info.iut2.upmf-grenoble.fr/intranet/enseignements/ProgWeb/data/musiques/img/<?= $id ?>.jpg" />
          </a>
          <figcaption>
            <music-song><?= $music->title ?></music-song>
            <music-group><?= $music->author ?></music-group>
            <music-category><?= $music->category ?></music-category>
          </figcaption>
        </figure>
        <?php $id++;
        if ($id > $dao->maxId()) {
          exit;
        }?>
      <?php endfor; ?>
    </section>
  </main>
  <footer>
    Jukebox IUT
  </footer>
</body>
</html>
