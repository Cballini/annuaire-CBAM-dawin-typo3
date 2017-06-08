<?php

namespace CBAM\CbamAnnuairecbam\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2017 Mathieu <mathieu.amyot@etu.u-bordeaux.fr>, DAWIN-ALT
 *           Cécile Ballini <cecile.ballini@etu.u-bordeaux.fr>, DAWIN-ALT
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Test case for class \CBAM\CbamAnnuairecbam\Domain\Model\Corporation.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Mathieu <mathieu.amyot@etu.u-bordeaux.fr>
 * @author Cécile Ballini <cecile.ballini@etu.u-bordeaux.fr>
 */
class CorporationTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \CBAM\CbamAnnuairecbam\Domain\Model\Corporation
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \CBAM\CbamAnnuairecbam\Domain\Model\Corporation();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getCompanyNameReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getCompanyName()
		);
	}

	/**
	 * @test
	 */
	public function setCompanyNameForStringSetsCompanyName()
	{
		$this->subject->setCompanyName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'companyName',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getAddressReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getAddress()
		);
	}

	/**
	 * @test
	 */
	public function setAddressForStringSetsAddress()
	{
		$this->subject->setAddress('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'address',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPostalCodeReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getPostalCode()
		);
	}

	/**
	 * @test
	 */
	public function setPostalCodeForStringSetsPostalCode()
	{
		$this->subject->setPostalCode('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'postalCode',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getCityReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getCity()
		);
	}

	/**
	 * @test
	 */
	public function setCityForStringSetsCity()
	{
		$this->subject->setCity('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'city',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPhoneReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getPhone()
		);
	}

	/**
	 * @test
	 */
	public function setPhoneForStringSetsPhone()
	{
		$this->subject->setPhone('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'phone',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getFaxReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getFax()
		);
	}

	/**
	 * @test
	 */
	public function setFaxForStringSetsFax()
	{
		$this->subject->setFax('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'fax',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getEmailReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getEmail()
		);
	}

	/**
	 * @test
	 */
	public function setEmailForStringSetsEmail()
	{
		$this->subject->setEmail('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'email',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDescriptionReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getDescription()
		);
	}

	/**
	 * @test
	 */
	public function setDescriptionForStringSetsDescription()
	{
		$this->subject->setDescription('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'description',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getSiretReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getSiret()
		);
	}

	/**
	 * @test
	 */
	public function setSiretForStringSetsSiret()
	{
		$this->subject->setSiret('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'siret',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getLogoReturnsInitialValueForFileReference()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getLogo()
		);
	}

	/**
	 * @test
	 */
	public function setLogoForFileReferenceSetsLogo()
	{
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setLogo($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'logo',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getScheduleReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getSchedule()
		);
	}

	/**
	 * @test
	 */
	public function setScheduleForStringSetsSchedule()
	{
		$this->subject->setSchedule('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'schedule',
			$this->subject
		);
	}
}
