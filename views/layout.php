<?php
// demarrage de la session
session_start();
include('helpers/datas.php');
include_once('helpers/functions.php');
?>
<!DOCTYPE html>
<html lang="fr" data-theme="light">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- daisy -->
  <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.4/dist/full.css" rel="stylesheet" type="text/css" />
  <!-- tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>HappySchool | <?= $title ?></title>
</head>

<body>
  <header class="bg-indigo-600 px-24 py-10 text-gray-50">
    <nav class="flex justify-between items-center">
      <div class="">
        <a href="index.php" class="font-black text-2xl">happySchꝎl</a>
      </div>
      <div class="space-x-6 uppercase">
        <?php
        foreach ($navItems as $item) { ?>
          <a href="<?= $item['url'] ?>"><?= $item['name'] ?></a>
        <?php } ?>
      </div>
    </nav>
  </header>
  <main class="px-24 py-20 min-h-screen">
    <?php titleH1($title) ?>
    <?= $content ?>
  </main>
  <footer class="bg-indigo-600 p-16 text-center">
    <p class="text-gray-50 text-2xl ">Welcome to happySchOOl</p>
  </footer>
</body>

</html>