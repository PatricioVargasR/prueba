
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Document</title> -->

    <title><?php if(isset($page_title)) { echo "$page_title"; } else { echo " "; } ?></title>
    <meta name="author" content="Todo el equipo" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/mystyle.css'); ?>">

    <link rel="stylesheet" href="<?= base_url('assets/css/custom.css'); ?>">

    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap5.min.css'); ?> ">
</head>
<body>
    
