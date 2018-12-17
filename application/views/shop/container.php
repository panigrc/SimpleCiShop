<?php
    $navigation = array('main_home' => 'shop/home', 'main_catalog' => 'shop/catalog', 'main_news' => 'shop/news', 'main_contact' => 'shop/contact');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="description" content="<?php echo $this->lang->line('main_meta_description'); ?>" />
	<meta name="keywords" content="<?php echo $this->lang->line('main_meta_keywords'); if(isset($meta_keywords)) echo ", ".$meta_keywords; ?>" />
	<meta name="robots" content="index,follow" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>theme/default/style.css" type="text/css" />
    <link href="<?php echo base_url() ?>assets/fontawesome/css/all.css" rel="stylesheet">
	<title><?php if($this->lang->line($pagename)) echo $this->lang->line($pagename). ' - '; if( ! empty($title)) echo $title . ' - '; ?>SimpleCiShop</title>    
    <script src="<?php echo base_url() ?>assets/scriptaculous/lib/prototype.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/scriptaculous/src/effects.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/scriptaculous/src/dragdrop.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/scriptaculous/src/controls.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/validation/validation.js" type="text/javascript"></script>
    <?php echo @$scripts; ?>
</head>
<body>
    <div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
	<div class="content">
		<div class="header">
            <?php /*<div id="select_language">
            <span><?php echo $this->lang->line('main_select_language'); ?>: &nbsp;</span>
            <a href="<?php echo site_url(str_replace($lang, 'english', $this->uri->uri_string())); ?>"><img src="<?php echo base_url(); ?>/theme/default/images/gb.gif" title="<?php echo $this->lang->line('main_english'); ?>" alt="<?php echo $this->lang->line('main_english'); ?>" /></a>
            <a href="<?php echo site_url(str_replace($lang, 'greek', $this->uri->uri_string())); ?>"><img src="<?php echo base_url(); ?>/theme/default/images/gr.gif" title="<?php echo $this->lang->line('main_greek'); ?>" alt="<?php echo $this->lang->line('main_greek'); ?>" /></a>
            <a href="<?php echo site_url(str_replace($lang, 'german', $this->uri->uri_string())); ?>"><img src="<?php echo base_url(); ?>/theme/default/images/de.gif" title="<?php echo $this->lang->line('main_german'); ?>" alt="<?php echo $this->lang->line('main_german'); ?>" /></a>
            </div>
            */ ?>
		    <div style="clear: both;"></div>
			<div class="sf_right">
                <a href="<?php echo site_url(); ?>"><img src="<?php echo base_url() ?>theme/default/images/logo.png" alt="logo" style="border: none;" /></a>
                <?php /*<div id="nav">
    			    <ul>
<?php foreach($navigation as $tab => $url):?>
                        <li <?php echo $tab === $pagename ? 'id="current"' : ''; ?>><?php echo anchor($url, $this->lang->line($tab)) ?></li>
<?php endforeach; ?>
				    </ul>
                </div>
                */?>
                <h1><?php echo $this->lang->line('main_slogan'); ?></h1>
			</div>
<?php //echo empty($tblock) === TRUE ? $this->load->view('shop/blocks/tblock_tpl') : $tblock; ?>
		</div>
		<div class="bottom">
			<div style="clear: both;"></div>
            <div id="contentfloatholder">
                <div id="centerwrap">
                    <div id="center">
                        <div id="center_contents"><div id="center_contents_leftbg"><?php echo @$contents; ?></div></div>
                    </div>
                </div>
                <div id="right">
                    <?php $this->load->view('shop/cart/cart_tpl'); ?>

                    <?php $this->load->view('shop/blocks/random_product_tpl'); ?>
                    <div style="text-align:center;"><a href="<?php echo site_url(); ?>blog/"><img src="<?php echo base_url() ?>theme/default/images/blog.png" alt="Cool Clean Quiet - Blog" style="border: none; float:none" /></a></div>
                </div>
                <div id="left">
                    <?php echo @$rblock; ?>
                    <?php $this->load->view('shop/blocks/'.$lang.'/home_tpl'); ?>
                </div>
			</div>
            <div style="clear: both;"></div>
		</div>
		<div class="header_bottom"></div>
		<div class="footer">
			<p>&copy; Copyright <?php echo date ("Y"); ?> SimpleCiShop</p>
		</div>
	</div>
</body>
</html>
