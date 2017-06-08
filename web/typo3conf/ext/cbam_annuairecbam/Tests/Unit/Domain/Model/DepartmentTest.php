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
 * Test case for class \CBAM\CbamAnnuairecbam\Domain\Model\Department.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Mathieu <mathieu.amyot@etu.u-bordeaux.fr>
 * @author Cécile Ballini <cecile.ballini@etu.u-bordeaux.fr>
 */
class DepartmentTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \CBAM\CbamAnnuairecbam\Domain\Model\Department
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \CBAM\CbamAnnuairecbam\Domain\Model\Department();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getDenominationReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getDenomination()
		);
	}

	/**
	 * @test
	 */
	public function setDenominationForStringSetsDenomination()
	{
		$this->subject->setDenomination('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'denomination',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getBuildingReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getBuilding()
		);
	}

	/**
	 * @test
	 */
	public function setBuildingForStringSetsBuilding()
	{
		$this->subject->setBuilding('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'building',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getOfficeReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getOffice()
		);
	}

	/**
	 * @test
	 */
	public function setOfficeForStringSetsOffice()
	{
		$this->subject->setOffice('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'office',
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
