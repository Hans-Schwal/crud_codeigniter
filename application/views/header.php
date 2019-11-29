<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url("css/bootstrap.min.css") ?>">
</head>
<body>
<div class="container">
<ul class="nav">
  <li class="nav-item">
    <a class="nav-link active" href="<?= site_url("produit/page1") ?>">page1</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?= site_url("produit/page2") ?>">page2</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?= site_url("produit/page3") ?>">page3</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?= site_url("welcome") ?>" tabindex="-1" aria-disabled="true">Welcome</a>
  </li>
</ul>