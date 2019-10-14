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
            <a href="<?php echo site_url(str_replace($this->language_library->get_language(), 'english', $this->uri->uri_string())); ?>"><img src="<?php echo base_url(); ?>/theme/default/images/gb.gif" title="<?php echo $this->lang->line('main_english'); ?>" alt="<?php echo $this->lang->line('main_english'); ?>" /></a>
            <a href="<?php echo site_url(str_replace($this->language_library->get_language(), 'greek', $this->uri->uri_string())); ?>"><img src="<?php echo base_url(); ?>/theme/default/images/gr.gif" title="<?php echo $this->lang->line('main_greek'); ?>" alt="<?php echo $this->lang->line('main_greek'); ?>" /></a>
            <a href="<?php echo site_url(str_replace($this->language_library->get_language(), 'german', $this->uri->uri_string())); ?>"><img src="<?php echo base_url(); ?>/theme/default/images/de.gif" title="<?php echo $this->lang->line('main_german'); ?>" alt="<?php echo $this->lang->line('main_german'); ?>" /></a>
            </div>
            */ ?>
		    <div style="clear: both;"></div>
			<div class="sf_right">
                <div id="logo"><a href="<?php echo site_url(); ?>">SimpleCiShop</a></div>
                <?php /*<div id="nav">
    			    <ul>
<?php foreach($navigation as $tab => $url):?>
                        <li <?php echo $tab === $pagename ? 'id="current"' : ''; ?>><?php echo anchor($url, $this->lang->line($tab)) ?></li>
<?php endforeach; ?>
				    </ul>
                </div>
                */?>
                <div id="slogan"><?php echo $this->lang->line('main_slogan'); ?></div>
			</div>
<?php //echo empty($tblock) === TRUE ? $this->load->view('shop/blocks/tblock_tpl') : $tblock; ?>
		</div>
		<div class="bottom">
			<div style="clear: both;"></div>
            <div id="content-float-holder">
                <div id="center-wrap">
                    <div id="center">
                        <div id="center_contents"><div id="center_contents_leftbg"><?php echo @$contents; ?></div></div>
                    </div>
                </div>
                <div id="right">
                    <?php $this->load->view('shop/blocks/cart/cart_tpl'); ?>

                    <?php $this->load->view('shop/blocks/random_product_tpl'); ?>
                    <div style="text-align:center;">
                        <a href="https://nikospapagiannopoulos.com">
                            <span class="fa-stack fa-2x">
                                <i class="fas fa-certificate fa-stack-2x"></i>
                                <span class="fas fa-stack-1x" style="color: white; font-size: .5em">Blog</span>
                            </span>
                        </a>
                    </div>
                </div>
                <div id="left">
                    <?php echo @$rblock; ?>
                    <?php $this->load->view('shop/blocks/'.$this->language_library->get_language().'/home_tpl'); ?>
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
