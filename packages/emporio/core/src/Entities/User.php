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

namespace Emporio\Core\Entities;

use Emporio\Core\Traits\GettableSettableTrait;

use DateTime;

class User {
	use GettableSettableTrait;

	/**
	 * @var	int	$userId
	 */
	protected $userId;

	/**
	 * @var	string	$password
	 */
	protected $password;

	/**
	 * @var	string	$firstName
	 */
	protected $firstName;

	/**
	 * @var	string	$lastName
	 */
	protected $lastName;

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
	public function getUserId(): int
	{
		return $this->userId;
	}

	/**
	 * @param	int	$userId
	 * @return	$this
	 */
	public function setUserId(int $userId): User
	{
		$this->userId = $userId;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function getPassword(): string
	{
		return $this->password;
	}

	/**
	 * @param	string	$password
	 * @return	$this
	 */
	public function setPassword(string $password): User
	{
		$this->password = $password;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function getFirstName(): string
	{
		return $this->firstName;
	}

	/**
	 * @param	string	$firstName
	 * @return	$this
	 */
	public function setFirstName(string $firstName): User
	{
		$this->firstName = $firstName;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function getLastName(): string
	{
		return $this->lastName;
	}

	/**
	 * @param	string	$lastName
	 * @return	$this
	 */
	public function setLastName(string $lastName): User
	{
		$this->lastName = $lastName;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function getEmail(): string
	{
		return $this->email;
	}

	/**
	 * @param	string	$email
	 * @return	$this
	 */
	public function setEmail(string $email): User
	{
		$this->email = $email;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function getUrl(): string
	{
		return $this->url;
	}

	/**
	 * @param	string	$url
	 * @return	$this
	 */
	public function setUrl(string $url): User
	{
		$this->url = $url;
		return $this;
	}

	/**
	 * @return	DateTime
	 */
	public function getBirthDate(): DateTime
	{
		return $this->birthDate;
	}

	/**
	 * @param	DateTime $birthDate
	 * @return	$this
	 */
	public function setBirthDate(DateTime $birthDate): User
	{
		$this->birthDate = $birthDate;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function getCity(): string
	{
		return $this->city;
	}

	/**
	 * @param	string	$city
	 * @return	$this
	 */
	public function setCity(string $city): User
	{
		$this->city = $city;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function getStreet(): string
	{
		return $this->street;
	}

	/**
	 * @param	string	$street
	 * @return	$this
	 */
	public function setStreet(string $street): User
	{
		$this->street = $street;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function getZip(): string
	{
		return $this->zip;
	}

	/**
	 * @param	string	$zip
	 * @return	$this
	 */
	public function setZip(string $zip): User
	{
		$this->zip = $zip;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function getCountry(): string
	{
		return $this->country;
	}

	/**
	 * @param	string	$country
	 * @return	$this
	 */
	public function setCountry(string $country): User
	{
		$this->country = $country;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function getPhone(): string
	{
		return $this->phone;
	}

	/**
	 * @param	string	$phone
	 * @return	$this
	 */
	public function setPhone(string $phone): User
	{
		$this->phone = $phone;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function getLanguage(): string
	{
		return $this->language;
	}

	/**
	 * @param	string	$language
	 * @return	$this
	 */
	public function setLanguage(string $language): User
	{
		$this->language = $language;
		return $this;
	}

	/**
	 * @return	DateTime
	 */
	public function getRegistered(): DateTime
	{
		return $this->registered;
	}

	/**
	 * @param	DateTime $registered
	 * @return	$this
	 */
	public function setRegistered(DateTime $registered): User
	{
		$this->registered = $registered;
		return $this;
	}

	/**
	 * @return	int
	 */
	public function getCredits(): int
	{
		return $this->credits;
	}

	/**
	 * @param	int	$credits
	 * @return	$this
	 */
	public function setCredits(int $credits): User
	{
		$this->credits = $credits;
		return $this;
	}
}
