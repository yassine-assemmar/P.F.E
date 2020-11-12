<html>

<head>
    <meta charset="utf-8" />
    <title> <?php echo $titre_page; ?></title>
    <link rel="stylesheet" media="screen" type="text/css" title="style" href="css/style.css" />
    <link rel="stylesheet" media="screen" type="text/css" title="style" href="css/style_mobile.css" />
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet">
    <script src="./admin/JS/main.js"></script>
    <link rel="stylesheet" media="screen" type="text/css" title="style" href="css/option.css" />

    <script language="JavaScript" type="text/javascript" src="/js/jquery-1.2.6.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="/js/jquery-ui-personalized-1.5.2.packed.js"></script>
    <script language="JavaScript" type="text/javascript" src="/js/sprinkle.js"></script>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    <script language="Javascript" type="text/javascript" src="../admin/JS/main.js"></script> 
</head>

<body>
    <header <?php if ($titre_page == "Accueil") {
                echo "class = 'home' ";
            } ?>>
        <?php
        include("menu.php");
        ?>
    </header>

