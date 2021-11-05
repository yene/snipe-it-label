<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>A4</title>

  <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

  <!-- Load paper.css for happy printing -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
  <style>
  @page { size: A4 }

  .sheet {
    font-family: Verdana, Arial, Helvetica, sans-serif;
    font-size: 11pt;
  }
  .subtitle {
    font-size: 9pt;
    color: rgb(64,64,64);
  }
  .title-big {
    font-size: 13pt;
    font-weight: bold;
  }
  .box {
    display: flex;
    align-items: center;
    box-sizing: border-box;
    float: left;
    margin: 0;
    overflow: hidden;
    width: <?=210/$columnCount ?>mm; /* 210/3 */
    height: <?=297/$rowCount ?>mm; /* 297/8 */
    padding: 4mm;
  }
  .box img {
    width: 26mm;
    height: 26mm;
  }
  span {
    line-height: 120%;
  }
  .info {
    padding-left: 2mm;
    overflow: hidden;
  }

  </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<body class="A4">
  <?php foreach ($pages as $data) { ?>
  <section class="sheet">
    <?php foreach ($data as $asset) { ?>
    <div class="box">
      <img src="<?=$asset['svg']?>">
      <div class="info">
        <span class="subtitle">tag</span><br>
        <span class="title-big"><?=$asset['tag']?></span><br>
        <span class="subtitle">company</span><br>
        <span><?=$companyName ?></span><br>
        <span class="subtitle">serial</span><br>
        <span><?=$asset['serial']?>&nbsp</span>
      </div>
    </div>
    <?php } /*end data*/ ?>
  </section>
  <?php } /*end pages*/ ?>
</body>

</html>
