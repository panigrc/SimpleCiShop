<? header("Content-Type: text/html; charset=UTF-8"); ?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title><?php echo $title; ?></title>

<script src="<?php echo base_url() ?>javascript/prototype.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>javascript/effects.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>javascript/dragdrop.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>javascript/controls.js" type="text/javascript"></script>

<style type="text/css">

body {
 background-color: #fff;
 font-family: Lucida Grande, Verdana, Sans-serif;
 font-size: 75%;
 color: #4F5155;
}

table {
 font-size: 1em;
 background-color: #AAAAAA;
}

th, td{
    background-color: white;
    padding: 5px;
}

.content{
 margin: 40px 10px 0px 10px;
}

.greek{
    background-color: #ECF6FF;
}

.german{
    background-color: #FFFFEA;
}

.english{
    background-color: #FFEAEF;
}

.general{
    background-color: #EEEEEE;
}

.odd td{
    background-color: #F5F5F5;
}

.even td{
    background-color: #FFFFFF;
}

a {
 color: #003399;
 background-color: transparent;
 font-weight: normal;
}

img {
    border: 0px;
}

h1 {
 color: #444;
 background-color: transparent;
 border-bottom: 1px solid #D0D0D0;
 font-size: 16px;
 font-weight: bold;
 margin: 24px 0 2px 0;
 padding: 5px 0 6px 0;
}

code {
 font-family: Monaco, Verdana, Sans-serif;
 font-size: 12px;
 background-color: #f9f9f9;
 border: 1px solid #D0D0D0;
 color: #002166;
 display: block;
 margin: 14px 0 14px 0;
 padding: 12px 10px 12px 10px;
}

#navcontainer ul
{
padding-left: 0;
margin-left: 0;
background-color: #036;
color: White;
float: left;
width: 100%;
}

#navcontainer ul li { display: inline; }

#navcontainer ul li a
{
padding: 0.2em 1em;
background-color: #036;
color: White;
text-decoration: none;
float: left;
border-right: 1px solid #fff;
}

#navcontainer ul li a:hover
{
background-color: #369;
color: #fff;
}

</style>
</head>
<body>
<div id="navcontainer">
    <ul id="navlist">
        <li id="active"><?php echo anchor("catalog", 'Διαχείριση Προϊόντων'); ?></li>
        <li><?php echo anchor("category", 'Διαχείριση Κατηγοριών'); ?></li>
        <li><?php echo anchor("user", 'Διαχείριση Χρηστών'); ?></li>
        <li><?php echo anchor("order", 'Διαχείριση Παραγγελιών'); ?></li>
        <li><?php echo anchor("coupon", 'Διαχείριση Κουπονιών'); ?></li>
        <li><?php echo anchor("news", 'Διαχείριση Νέων'); ?></li>
    </ul>
</div>
<div class="content">
<h2><?php echo $heading; ?></h2>
<?php echo $contents; ?>
</div>
</body>
</html>
