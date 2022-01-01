<?php
class vue{
    function entete_page(){?>
       <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/style.css" type="text/css">
            <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
            <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">
            <link rel="stylesheet" href="../node_modules/bootstrap-social/bootstrap-social.css">
            <link rel="stylesheet" href="../node_modules/bootstrap-select/dist/css/bootstrap-select.min.css">
            <title>VTC</title>
        </head><?php 
    }

    function scripts(){?>
        <script src="../node_modules/jquery/dist/jquery.slim.min.js"></script>
        <script src="../node_modules/jquery/dist/jquery.min.js"></script>
        <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
        <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="../node_modules/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
        <script src="../js/scripts.js"></script><?php
    }
}
?>