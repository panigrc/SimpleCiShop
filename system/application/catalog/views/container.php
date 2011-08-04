<?php
    $navigation = array('main_home' => 'home/index', 'main_catalog' => 'catalog/index', 'main_news' => 'news/index', 'main_contact' => 'contact/index');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="description" content="<?php echo $this->lang->line('main_meta_description'); ?>" />
	<meta name="keywords" content="<?php echo $this->lang->line('main_meta_keywords'); if(isset($meta_keywords)) echo ", ".$meta_keywords; ?>" />
	<meta name="robots" content="index,follow" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>theme/images/style.css" type="text/css" />
	<title><?php if($this->lang->line($pagename)) echo $this->lang->line($pagename). ' - '; if(!empty($title)) echo $title . ' - '; ?>Cool Clean Quiet</title>    
    <script src="<?php echo base_url() ?>javascript/prototype.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>javascript/effects.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>javascript/dragdrop.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>javascript/controls.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/validation/validation.js" type="text/javascript"></script>
    <?php echo @$scripts; ?>
</head>
<body>
    <div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
	<div class="content">
		<div class="header">
            <?php /*<div id="select_language">
            <span><?php echo $this->lang->line('main_select_language'); ?>: &nbsp;</span>
            <a href="<?php echo site_url(str_replace($lang, 'english', $this->uri->uri_string())); ?>"><img src="<?php echo base_url(); ?>/theme/images/gb.gif" title="<?php echo $this->lang->line('main_english'); ?>" alt="<?php echo $this->lang->line('main_english'); ?>" /></a>
            <a href="<?php echo site_url(str_replace($lang, 'greek', $this->uri->uri_string())); ?>"><img src="<?php echo base_url(); ?>/theme/images/gr.gif" title="<?php echo $this->lang->line('main_greek'); ?>" alt="<?php echo $this->lang->line('main_greek'); ?>" /></a>
            <a href="<?php echo site_url(str_replace($lang, 'german', $this->uri->uri_string())); ?>"><img src="<?php echo base_url(); ?>/theme/images/de.gif" title="<?php echo $this->lang->line('main_german'); ?>" alt="<?php echo $this->lang->line('main_german'); ?>" /></a>
            </div>
            */ ?>
		    <div style="clear: both;"></div>
			<div class="sf_right">
                <a href="<?php echo site_url(); ?>"><img src="<?php echo base_url() ?>theme/images/logo.png" alt="logo" style="border: none;" /></a>
                <?php /*<div id="nav">
    			    <ul>
<?php foreach($navigation as $tab => $url):?>
                        <li <?php echo $tab == $pagename ? 'id="current"' : ''; ?>><?php echo anchor($url.'/'.$lang, $this->lang->line($tab)) ?></li>
<?php endforeach; ?>
				    </ul>
                </div>
                */?>
                <h1><?php echo $this->lang->line('main_slogan'); ?></h1>
			</div>
<?php //echo empty($tblock) == true ? $this->load->view('blocks/tblock_tpl') : $tblock; ?>
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
                    <div style="text-align:center;">Αν θέλεις κάποιο προϊόν της Nexus το οποίο δεν έχουμε, μπορούμε να το παραγγείλουμε για σένα<br/><a href="http://www.nexustek.nl"><img src="<?php echo base_url() ?>theme/images/Nexus_badge.gif" alt="Nexus" style="border: none; float:none;" /></a></div>
                    <?php $this->load->view('cart/cart_tpl'); ?>

                    <?php $this->load->view('blocks/random_product_tpl'); ?>
                    <div style="text-align:center;"><a href="<?php echo site_url(); ?>blog/"><img src="<?php echo base_url() ?>theme/images/blog.png" alt="Cool Clean Quiet - Blog" style="border: none; float:none" /></a></div>
                </div>
                <div id="left">
                    <?php echo @$rblock; ?>
                    <?php $this->load->view('blocks/'.$lang.'/home_tpl'); ?>
                </div>
			</div>
            <div style="clear: both;"></div>
		</div>
		<div class="header_bottom"></div>
		<div class="footer">
			<p>&copy; Copyright <?php echo date ("Y"); ?> www.cool-clean-quiet.com</p>
		</div>
	</div>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-1362689-2";
urchinTracker();
</script>
</body>
</html>
