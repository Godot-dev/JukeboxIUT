<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../view/design/style.css">
    <title></title>
  </head>
  <body>
    <header>
      <h1>Playing : <?= $music->title ?></h1>
    </header>
    <nav>
      <a href="<?="jukebox.ctrl.php?page=$page&pageSize=$pageSize"?>">
        back
      </a>
    </nav>
    <section>
      <figure>
        <img src="<?= $simg; ?>">
        <audio src="<?= $smp3; ?>" controls autoplay ></audio>
      </figure>
    </section>
    <br/>
  </body>
</html>
