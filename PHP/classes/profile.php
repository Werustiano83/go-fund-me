<?php

/**
 * We'll create a class for my profile entity.
 * It will have the following properties:
 * -profileId (private)
 * -profileEmail (public)
 * -profileBankAccount (public)
 * -profileAtHandle (public)
 * @author rvillarrcal <rvillarrcal@cnm.edu>
 * Date: 7/23/2016
 * Time: 10:02 AM
 */
class Profile {
	/**
	 * profileId property, this will be my primary key and will be a private property
	 * @var $profileId ;
	 **/
	private $profileId;
	/**
	 * profileAtHandle property, this will be a public property and it should have a unique value
	 * @var $profileAtHandle
	 **/
	public $profileAtHandle;
	/**
	 * profileBankAccount property, this will be a public property and it should have a unique value
	 * @var $profileBankAccount
	 **/
	public $profileBankAccount;
	/**
	 * profileEmail property, this will be a public property and will have a unique value
	 * @var $profileEmail
	 **/
	public $profileEmail;

	/**This will be the constructor method for Profile
	 *
	 * @param int $newProfileId new profile id
	 * @param string $newprofileAtHandle new profile at handle
	 * @param string $newProfileBankAccount new profile bank account
	 * @param string $newProfileEmail new profile email
	 *
	 * **/
	public function __construct($newProfileId, $newProfileAtHandle, $newProfileBankAccount, $newProfileEmail) {
		try {
			$this->setProfileId($newProfileId);
			$this->setProfileAtHandle($newProfileAtHandle);
			$this->setProfileBankAccount($newProfileBankAccount);
			$this->setProfileEmail($newProfileEmail);
		} catch(UnexpectedValueException $exception) {
			//rethrow to the caller
			throw(new UnexpectedValueException("Unable to construct profile", 0, $exception));

		}
	}

	/**
	 * Accessor method profileId property
	 *
	 * @return int value for profileId
	 **/
	public function getProfileId() {
		return $this->profileId;
	}

	/**
	 * Mutator method for profileId
	 *
	 * @param int $newProfileId new value of profileId
	 * @throws UnexpectedValueException if $newProfileId is not an integer
	 **/
	public function setProfileId($newProfileId) {
		//this is to verify that the profile id is a valid integer
		$newProfileId = filter_var($newProfileId, FILTER_VALIDATE_INT);
		IF($newProfileId === false) {
			throw(new UnexpectedValueException("profile id is not a valid integer"));
		}
		// convert and store profileId
		$this->profileId = intval($newProfileId);
	}

	/**
	 * this will be the accessor method for profileAtHandle
	 *
	 * @return string value for profileAtHandle
	 **/
	public function getProfileAtHandle() {
		return $this->profileAtHandle;
	}

	/** this will be the mutator method for $newProfileAtHandle
	 *
	 * @param string $newProfileAtHandle new value of $profileAtHandle
	 * @throws UnexpectedValueException if $newProfileAtHandle is not valid
	 */
	public function setProfileAtHandle($newProfileAtHandle) {
		// this is to verify that $newProfileAtHandle is a valid string
		$newProfileAtHandle = filter_var($newProfileAtHandle, FILTER_SANITIZE_STRING);
		IF($newProfileAtHandle === false) {
			THROW (new UnexpectedValueException ("Profile At Handle is not a valid string"));
		}
		//convert and store the profile at handle
		$this->profileAtHandle = $newProfileAtHandle;
	}

	/** This will be the accessor method for profileBankAccount
	 *
	 * @return string value for profileBankAccount
	 **/
	public function getProfileBankAccount() {
		return $this->profileBankAccount;
	}

	/** This will be the mutator method for profileBankAccount
	 *
	 * @param string $newProfileBankAccount new value of $profileBankAccount
	 * @throws UnexpectedValueException if $newProfileBankAccount is not valid
	 */
	public function setProfileBankAccount($newProfileBankAccount) {
		//this will verify that $newProfileBankAccount value is a valid string
		$newProfileBankAccount = filter_var($newProfileBankAccount, FILTER_SANITIZE_STRING);
		if($newProfileBankAccount === false) {
			throw (new UnexpectedValueException ("Profile Bank Account is not valid"));
		}
		//convert and store profileBankAccount
		$this->profileBankAccount = $newProfileBankAccount;
	}

	/**
	 * This will be an accessor method for profileEmail
	 * @return string value for profileEmail
	 **/
	public function getProfileEmail() {
		return $this->profileEmail;
	}

	/**This will be the mutator method for profileEmail
	 *
	 * @param string $newProfileEmail new value of $profileEmail
	 * @throw UnexpectedValueError if $newProfileEmail is not valid
	 **/
	public function setProfileEmail($newProfileEmail) {
		//this will verufy that $newProfileEmail is a valid string
		$newProfileEmail = filter_var($newProfileEmail, FILTER_SANITIZE_STRING);
		if($newProfileEmail === false) {
			throw (new UnexpectedValueException("email address not valid"));
		}
		//convert and store profileEmail
		$this->profileEmail = $newProfileEmail;
	}
}
?>