<!DOCTYPE html>
<html ng-app lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if(isset($this->title)) echo $this->title; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <?php if(isset($_layoutParams['libscssjs']) && count($_layoutParams['libscssjs'])): ?>
    <?php for($i = 0; $i < count($_layoutParams['libscssjs']); $i++): ?>
    <link href="<?php echo $_layoutParams['libscssjs'][$i]; ?>" rel="stylesheet" type="text/css" />
    <?php endfor; ?>
    <?php endif; ?>
    <?php if(isset($_layoutParams['css']) && count($_layoutParams['css'])): ?>
    <?php for($i = 0; $i < count($_layoutParams['css']); $i++): ?>
    <link href="<?php echo $_layoutParams['css'][$i]; ?>" rel="stylesheet" type="text/css" />
    <?php endfor; ?>
    <?php endif; ?>
</head>
<body> 
    <noscript>No function JavaScript browser</noscript>  