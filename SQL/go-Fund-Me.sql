-- First I'll clean the database
DROP TABLE IF EXISTS donation;
DROP TABLE IF EXISTS campaign;
DROP TABLE IF EXISTS profile;

-- I'll create my first entity "Profile"
CREATE TABLE profile (

	profileId          INT UNSIGNED AUTO_INCREMENT NOT NULL,
	profileAtHandle    VARCHAR(32)                 NOT NULL,
	profileBankAccount VARCHAR(32)                 NOT NULL,
	profileEmail       VARCHAR(128)                NOT NULL,

	UNIQUE (profileId),
	UNIQUE (profileAtHandle),
	UNIQUE (profileBankAccount),
	UNIQUE (profileEmail),

	PRIMARY KEY (profileId)
);
-- Now the campaign table
CREATE TABLE campaign (

	campaignId          INT UNSIGNED AUTO_INCREMENT NOT NULL,
	campaignDescription VARCHAR(600)               NOT NULL,
	campaignProfileId   INT UNSIGNED                NOT NULL,

	INDEX (campaignProfileId),

	FOREIGN KEY (campaignProfileId) REFERENCES profile (profileID),

	PRIMARY KEY (campaignId)
);
-- Finally my weak entity "donation"
CREATE TABLE donation (

	donationId         INT UNSIGNED NOT NULL,
	donationAmount DECIMAL(6,2) NOT NULL,
	donationCampaignId INT UNSIGNED                NOT NULL,
	donationProfileId  INT UNSIGNED                NOT NULL,

	INDEX (donationCampaignId),
	INDEX (donationProfileId),

	FOREIGN KEY (donationCampaignId) REFERENCES campaign (campaignId),
	FOREIGN KEY (donationProfileId) REFERENCES profile (profileId),

	PRIMARY KEY (donationCampaignId, donationProfileId)
);


