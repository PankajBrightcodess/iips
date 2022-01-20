<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php if(isset($title)){ echo "$title - E-Learning";}else{ echo 'IIPS - E-Learning';}?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo file_url('assets/website/css/mdb.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo file_url('assets/website/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo file_url('assets/website/css/custom.css'); ?>">
    <link rel="stylesheet" href="<?php echo file_url('assets/website/css/slider.css'); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400&display=swap" rel="stylesheet">
  </head>
  <body>
    <?php include'header.php' ; ?>
    <?php include'category.php' ; ?>