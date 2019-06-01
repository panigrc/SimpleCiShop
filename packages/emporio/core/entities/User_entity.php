<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_entity {
	use Getter_setter_trait;

	/**
	 * @var	int	$user_id
	 */
	protected $user_id;

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
	 * @var	DateTime	$birthdate
	 */
	protected $birthdate;

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
		return $this->user_id;
	}

	/**
	 * @param	int	$user_id
	 * @return	$this
	 */
	public function setUserId(int $user_id): User_entity
	{
		$this->user_id = $user_id;
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
	public function setPassword(string $password): User_entity
	{
		$this->password = $password;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function getFirstName(): string
	{
		return $this->first_name;
	}

	/**
	 * @param	string	$first_name
	 * @return	$this
	 */
	public function setFirstName(string $first_name): User_entity
	{
		$this->first_name = $first_name;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function getLastName(): string
	{
		return $this->last_name;
	}

	/**
	 * @param	string	$last_name
	 * @return	$this
	 */
	public function setLastName(string $last_name): User_entity
	{
		$this->last_name = $last_name;
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
	public function setEmail(string $email): User_entity
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
	public function setUrl(string $url): User_entity
	{
		$this->url = $url;
		return $this;
	}

	/**
	 * @return	DateTime
	 */
	public function getBirthdate(): DateTime
	{
		return $this->birthdate;
	}

	/**
	 * @param	DateTime $birthdate
	 * @return	$this
	 */
	public function setBirthdate(DateTime $birthdate): User_entity
	{
		$this->birthdate = $birthdate;
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
	public function setCity(string $city): User_entity
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
	public function setStreet(string $street): User_entity
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
	public function setZip(string $zip): User_entity
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
	public function setCountry(string $country): User_entity
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
	public function setPhone(string $phone): User_entity
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
	public function setLanguage(string $language): User_entity
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
	public function setRegistered(DateTime $registered): User_entity
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
	public function setCredits(int $credits): User_entity
	{
		$this->credits = $credits;
		return $this;
	}
}
