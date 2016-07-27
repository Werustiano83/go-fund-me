<?php

/**This class will be Campaign, in here the users will be able to describe their campaign and ask for the money they need. It will have the campaignId, campaignProfileId and the campaignDescription properties
 * @author Raul Villarreal rvillarrcal@cnm.edu
 *
 **/
class campaign {
	/**
	 * First Property and primary key will be campaignId
	 * @var int $campaignId
	 **/
	private $campaignId;
	/**
	 * Second Property, foreign key
	 * @var int $campaignProfileId
	 */
	private $campaignProfileId;
	/**
	 * Third Property
	 * @var string $campaignDescription
	 */
	public $campaignDescription;

	/**
	 * Constructor method for campaign class
	 *
	 * @param int /null $newCampaignId id of this cmpaign or null if new campaign
	 * @param int $newCampaignProfileId id of the profile that created this campaign
	 * @param string $newCampaignDescription detailed description of the campaign
	 * @throws \InvalidArgumentException if the data types are not valid
	 * @throws \RangeException if values are out of range, strings too long, etc.
	 * @throws \TypeError if data types violate the type hints
	 * @throws \Exception if some other exception occurs
	 **/
	public function __construct(int $newCampaignId = null, int $newCampaignProfileId, string $newCampaignDescription) {
		try {
			$this->setCampaignId($newCampaignId);
			$this->setCampaignProfileId($newCampaignProfileId);
			$this->setCampaignDescription($newCampaignDescription);
		} catch(\InvalidArgumentException $invalidArgument) {
//rethrow the exception to the caller
			throw(new \InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
		} catch(\RangeException $range) {
//rethrow tho the caller
			throw (new \RangeException($range->getMessage(), 0, $range));
		} catch(\TypeError $typeError) {
//rethrow to the caller
			throw(new \TypeError($typeError->getMessage(), 0, $typeError));
		} catch(\Exception $exception) {
//rethrow to the caller
			throw(new \Exception($exception->getMessage(), 0, $exception));
		}
	}

	/**
	 * Accessor method for campaignId
	 *
	 * @return int/null value of campaignId
	 **/
	public function getCampaignId() {
		return ($this->campaignId);
	}

	/**
	 * Mutator method for Campaign Id
	 *
	 * @param int /null $newCampaignId new value of campaignIf
	 * @throws RangeException if campaignId is not a positive
	 * @throw TypeError if campaignId is not an integer
	 */
	public function setCampaignId(int $newCampaignId = null) {
//base case if the campaign id is null this a new campaign without a mySQL assigned id(yet)
		if($newCampaignId === null) {
			$this->campaignId = null;
			return;
		}
//verify campaign Id is an positive
		if($newCampaignId <= 0) {
			throw(new \RangeException("Campaign Id is not positive"));
		}
//convert and store the campaign id
		$this->campaignId = $newCampaignId;
	}

	/**
	 * Accessor method for campaign profile id
	 * @return int value of campaignProfileId
	 **/
	public function getCampaignProfileId() {
		return ($this->campaignProfileId);
	}

	/**
	 * Mutator method for campaign profile id
	 *
	 * @param int $newCampaignProfileId new id for the user creating the campaign
	 * @throws \RangeException if the value is not positive
	 * @throws \TypeError if the vlue is not an integer
	 *
	 **/
	public function setCampaignProfileId(int $newCampaignProfileId) {
// verify the campaign profile id is positive
		if($newCampaignProfileId <= 0) {
			throw(new \RangeException("the profile id is not positive"));
		}

//convert and store campaign profile id
		$this->campaignProfileId = $newCampaignProfileId;
	}

	/**
	 * Accessor method for campaign description
	 * @return string value of campaign description
	 **/
	public function getCampaignDescription() {
		return ($this->campaignDescription);
	}

	/**
	 * mutator method for campaign description
	 *
	 * @param string $newCampaignDescription is the new value of campaign description
	 * @throws \InvalidArgumentException if $newCampaignDescription is not a string or insecure
	 * @throws \RangeException if $newCampaignDescription is longer than 1000 characters
	 * @throw \TypeError if $newCampaignDescription is not a string
	 **/
	public function setCampaignDescription(string $newCampaignDescription) {
		//verify the campaign description content is secure
		$newCampaignDescription = trim($newCampaignDescription);
		$newCampaignDescription = filter_var(FILTER_SANITIZE_STRING);
		if(empty($newCampaignDescription) === true) {
			throw(new\InvalidArgumentException("Campaign Description is empty or insecure"));
		}
//verify that campaign description content will fit in the database
		if(strlen($newCampaignDescription) > 1000) {
			throw(new\RangeException("Description content too large."));
		}

//convert and store campaign description
		$this->campaignDescription = $newCampaignDescription;
	}
}

?>