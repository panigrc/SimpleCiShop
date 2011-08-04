<? header("Content-Type: text/html; charset=UTF-8"); ?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title><?php echo $title; ?></title>

<style type="text/css">
body {
 background-color: #fff;
 font-family: Lucida Grande, Verdana, Sans-serif;
 color: #4F5155;
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
 color: #000;
 border-bottom:5px solid #C3D9FF;
 
 width:100%;
 padding:1em 0em .5em;
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

table
{
	color:#000;
	background:#FFF;
	border-collapse:collapse;
	width:100%;
	border:5px solid #C3D9FF;
}

thead
{

}

thead th
{
	padding:1em 1em .5em;
 	border-bottom:1px dotted #356AA0;
 	font-size:100%;
 	text-align:left;
}



thead tr
{

}

td
{
	padding:.5em 1em;
}

tbody tr.odd td
{
	background:transparent url('<?php echo base_url(); ?>theme/images/tr_bg.png') repeat top left;
}

tfoot
{
    border-top:1px dotted #356AA0;
}

tfoot td
{

	padding-bottom:1.5em;
}

tfoot tr
{

}


* html tr.odd td
{
	background:#FFF;
	filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo base_url(); ?>theme/images/tr_bg.png', sizingMethod='scale');
}

#middle
{
	background-color:#FFF;
}

.user_code
{
    font-size: 105%;
    margin: 1em 0em;
}

.user_code strong
{
    font-size: 120%;
}

.user_stars
{
    font-size: 105%;
    margin: 1em 0em;
}

.user_stars strong
{
    font-size: 200%;
    color: #FF7400;
}


</style>
</head>
<body>
<div class="content">

<?php $sum=0; ?>
<?php if($lang=="greek"): ?>

<h1>Η παραγγελία σου</h1>
<p>
http://www.cool-clean-quiet.com<br />
info@cool-clean-quiet.com
</p>
<p>Προσωπικά Στοιχεία</p>
<div class="user_info">
<?php echo @$user['user_name']; ?><br />
<?php echo @$user['user_surname']; ?><br />
<?php echo @$user['user_address']; ?><br />
<?php echo @$user['user_zip']; ?><br />
<?php echo @$user['user_city']; ?><br />
<?php echo @$user['user_country']; ?><br />
<?php echo @$user['user_phone']; ?>
</div>
<div class="user_code">
Ο Κωδικός που μπορείς να χρησιμοποιήσεις στις επόμενες αγορές σου <strong><?php echo @$user['user_code']; ?></strong>
</div>
<div class="user_stars">
Τα Αστέρια σου είναι <strong><?php echo @$user['user_stars']; ?></strong>
</div>

<table>
<col>
<col id="middle">
<col>
<thead>

	<tr><th>Προϊόν</th><th>Ποσότητα</th><th>Τιμή</th></tr>
</thead>
<tbody>
<?php foreach($products as $product):?>
    <tr>
    <td><?php echo $product['title_'.$lang]; ?></td>
    <td><?php echo $product['quantity']; ?></td>
    <td><?php echo $product['price_'.$lang]*$product['quantity']; ?> <?php echo $this->lang->line("main_currency"); ?></td>

    </tr>

<?php $sum += $product['price_'.$lang]*$product['quantity']; ?>
<?php endforeach; ?>
</tbody>
<tfoot>
    <tr><td>Σύνολο</td><td></td><td><?php echo $sum; ?> <?php echo $this->lang->line("main_currency"); ?></td></tr>
</tfoot>
</table>

<?php endif; ?>



<?php if($lang=="english"): ?>
<h1>Your order</h1>
<p>
http://www.cool-clean-quiet.com<br />
info@cool-clean-quiet.com
</p>
<p>Personal Information</p>
<div class="user_info">
<?php echo @$user['user_name']; ?><br />
<?php echo @$user['user_surname']; ?><br />
<?php echo @$user['user_address']; ?><br />
<?php echo @$user['user_zip']; ?><br />
<?php echo @$user['user_country']; ?><br />
<?php echo @$user['user_phone']; ?>
</div>
<div class="user_code">
The code word which you can use for your future purchases <strong><?php echo @$user['user_code']; ?></strong>
</div>
<div class="user_stars">
The number of your stars <strong><?php echo @$user['user_stars']; ?></strong>
</div>

<table>
<col>
<col id="middle">
<col>
<thead>

	<tr><th>Product</th><th>Quantity</th><th>Price</th></tr>
</thead>
<tbody>
<?php foreach($products as $product):?>
    <tr>
    <td><?php echo $product['title_'.$lang]; ?></td>
    <td><?php echo $product['quantity']; ?></td>
    <td><?php echo $product['price_'.$lang]*$product['quantity']; ?> <?php echo $this->lang->line("main_currency"); ?></td>

    </tr>

<?php $sum += $product['price_'.$lang]*$product['quantity']; ?>
<?php endforeach; ?>
</tbody>
<tfoot>
    <tr><td>Sum</td><td></td><td><?php echo $sum; ?> <?php echo $this->lang->line("main_currency"); ?></td></tr>
</tfoot>
</table>


<?php endif; ?>


<?php if($lang=="german"): ?>
<h1>Ihre Bestellung</h1>
<p>
http://www.cool-clean-quiet.com<br />
info@cool-clean-quiet.com
</p>
<p>Persönliche Informationen</p>
<div class="user_info">
<?php echo @$user['user_name']; ?><br />
<?php echo @$user['user_surname']; ?><br />
<?php echo @$user['user_address']; ?><br />
<?php echo @$user['user_zip']; ?><br />
<?php echo @$user['user_country']; ?><br />
<?php echo @$user['user_phone']; ?>
</div>
<div class="user_code">
Das Schlüsselwort, das Sie für Ihre zukünftigen Einkäufe verwenden können <strong><?php echo @$user['user_code']; ?></strong>
</div>
<div class="user_stars">
Ihre Sterne <strong><?php echo @$user['user_stars']; ?></strong>
</div>

<table>
<col>
<col id="middle">
<col>
<thead>

	<tr><th>Produkt</th><th>Menge</th><th>Preis</th></tr>
</thead>
<tbody>
<?php foreach($products as $product):?>
    <tr>
    <td><?php echo $product['title_'.$lang]; ?></td>
    <td><?php echo $product['quantity']; ?></td>
    <td><?php echo $product['price_'.$lang]*$product['quantity']; ?> <?php echo $this->lang->line("main_currency"); ?></td>

    </tr>

<?php $sum += $product['price_'.$lang]*$product['quantity']; ?>
<?php endforeach; ?>
</tbody>
<tfoot>
    <tr><td>Summe</td><td></td><td><?php echo $sum; ?> <?php echo $this->lang->line("main_currency"); ?></td></tr>
</tfoot>
</table>



<?php endif; ?>

</div>
</body>
</html>
