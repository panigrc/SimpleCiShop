<?php

use Emporio\Ui\Factory\BlockFactory;

final class Home extends CI_Controller {

	public function index()
	{
		redirect('shop/catalog');
	}

	public function guide()
	{
		$mainBlock = BlockFactory::create('contents', 5, function (CI_Controller $CI, array $vars) {
			return $CI->load->view(
				sprintf("shop/contents/%s/guide_tpl", $CI->language_library->get_language()),
				$vars,
				TRUE
			);
		});

		$this->template_library->addBlock($mainBlock);

		$this->template_library->view(
			'shop/container_tpl',
			[
				'pagename' => '',
				'title' => '',
			]
		);
	}

	public function transactions()
	{
		$mainBlock = BlockFactory::create('contents', 5, function (CI_Controller $CI, array $vars) {
			return $CI->load->view(
				sprintf("shop/contents/%s/transactions_tpl", $CI->language_library->get_language()),
				$vars,
				TRUE
			);
		});

		$this->template_library->addBlock($mainBlock);

		$this->template_library->view(
			'shop/container_tpl',
			[
				'pagename' => '',
				'title' => '',
			]
		);
	}

	public function secure()
	{
		$mainBlock = BlockFactory::create('contents', 5, function (CI_Controller $CI, array $vars) {
			return $CI->load->view(
				sprintf("shop/contents/%s/secure_tpl", $CI->language_library->get_language()),
				$vars,
				TRUE
			);
		});

		$this->template_library->addBlock($mainBlock);

		$this->template_library->view(
			'shop/container_tpl',
			[
				'pagename' => '',
				'title' => '',
			]
		);
	}
}
