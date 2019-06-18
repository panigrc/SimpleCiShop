<?php

/*
 * This file is part of the Emporio package.
 *
 * (c) Nikolaos Papagiannopoulos
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Emporio\Core\ORM\Entity;

use Emporio\Core\Traits\GettableSettableTrait;

use DateTime;

class User {
	use GettableSettableTrait;

	/**
	 * @var	int	$id
	 */
	protected $id;

	/**
	 * @var	string	$password
	 */
	protected $password;

	/**
	 * @var	string	$first_name
	 */
	protected $first_name;

	/**
	 * @var	string	$last_name
	 */
	protected $last_name;

	/**
	 * @var	string	$email
	 */
	protected $email;

	/**
	 * @var	string	$url
	 */
	protected $url;

	/**
	 * @var	DateTime	$birthDate
	 */
	protected $birthDate;

	/**
	 * @var	string	$city
	 */
	protected $city;

	/**
	 * @var	string	$street
	 */
	protected $street;

	/**
	 * @var	string	$zip
	 */
	protected $zip;

	/**
	 * @var	string	$country
	 */
	protected $country;

	/**
	 * @var	string	$phone
	 */
	protected $phone;

	/**
	 * @var	string	$language
	 */
	protected $language;

	/**
	 * @var	DateTime	$registered
	 */
	protected $registered;

	/**
	 * @var	int	$credits
	 */
	protected $credits;

	/**
	 * @return	int
	 */
	public function get_id(): int
	{
		return $this->id;
	}

	/**
	 * @param	int	$id
	 * @return	$this
	 */
	public function set_id(int $id): User
	{
		$this->id = $id;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function get_password(): string
	{
		return $this->password;
	}

	/**
	 * @param	string	$password
	 * @return	$this
	 */
	public function set_password(string $password): User
	{
		$this->password = $password;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function get_first_name(): string
	{
		return $this->first_name;
	}

	/**
	 * @param	string	$first_name
	 * @return	$this
	 */
	public function set_first_name(string $first_name): User
	{
		$this->first_name = $first_name;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function get_last_name(): string
	{
		return $this->last_name;
	}

	/**
	 * @param	string	$last_name
	 * @return	$this
	 */
	public function set_last_name(string $last_name): User
	{
		$this->last_name = $last_name;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function get_email(): string
	{
		return $this->email;
	}

	/**
	 * @param	string	$email
	 * @return	$this
	 */
	public function set_email(string $email): User
	{
		$this->email = $email;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function get_url(): string
	{
		return $this->url;
	}

	/**
	 * @param	string	$url
	 * @return	$this
	 */
	public function set_url(string $url): User
	{
		$this->url = $url;
		return $this;
	}

	/**
	 * @return	DateTime
	 */
	public function get_birth_date(): DateTime
	{
		return $this->birthDate;
	}

	/**
	 * @param	DateTime $birthDate
	 * @return	$this
	 */
	public function set_birth_date(DateTime $birthDate): User
	{
		$this->birthDate = $birthDate;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function get_city(): string
	{
		return $this->city;
	}

	/**
	 * @param	string	$city
	 * @return	$this
	 */
	public function set_city(string $city): User
	{
		$this->city = $city;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function get_street(): string
	{
		return $this->street;
	}

	/**
	 * @param	string	$street
	 * @return	$this
	 */
	public function set_street(string $street): User
	{
		$this->street = $street;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function get_zip(): string
	{
		return $this->zip;
	}

	/**
	 * @param	string	$zip
	 * @return	$this
	 */
	public function set_zip(string $zip): User
	{
		$this->zip = $zip;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function get_country(): string
	{
		return $this->country;
	}

	/**
	 * @param	string	$country
	 * @return	$this
	 */
	public function set_country(string $country): User
	{
		$this->country = $country;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function get_phone(): string
	{
		return $this->phone;
	}

	/**
	 * @param	string	$phone
	 * @return	$this
	 */
	public function set_phone(string $phone): User
	{
		$this->phone = $phone;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function get_language(): string
	{
		return $this->language;
	}

	/**
	 * @param	string	$language
	 * @return	$this
	 */
	public function set_language(string $language): User
	{
		$this->language = $language;
		return $this;
	}

	/**
	 * @return	DateTime
	 */
	public function get_registered(): DateTime
	{
		return $this->registered;
	}

	/**
	 * @param	DateTime $registered
	 * @return	$this
	 */
	public function set_registered(DateTime $registered): User
	{
		$this->registered = $registered;
		return $this;
	}

	/**
	 * @return	int
	 */
	public function get_credits(): int
	{
		return $this->credits;
	}

	/**
	 * @param	int	$credits
	 * @return	$this
	 */
	public function set_credits(int $credits): User
	{
		$this->credits = $credits;
		return $this;
	}
}
