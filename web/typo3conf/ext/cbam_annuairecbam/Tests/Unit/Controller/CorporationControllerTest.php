<?php
namespace CBAM\CbamAnnuairecbam\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2017 Mathieu <mathieu.amyot@etu.u-bordeaux.fr>, DAWIN-ALT
 *  			Cécile Ballini <cecile.ballini@etu.u-bordeaux.fr>, DAWIN-ALT
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
 * Test case for class CBAM\CbamAnnuairecbam\Controller\CorporationController.
 *
 * @author Mathieu <mathieu.amyot@etu.u-bordeaux.fr>
 * @author Cécile Ballini <cecile.ballini@etu.u-bordeaux.fr>
 */
class CorporationControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \CBAM\CbamAnnuairecbam\Controller\CorporationController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('CBAM\\CbamAnnuairecbam\\Controller\\CorporationController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllCorporationsFromRepositoryAndAssignsThemToView()
	{

		$allCorporations = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$corporationRepository = $this->getMock('', array('findAll'), array(), '', FALSE);
		$corporationRepository->expects($this->once())->method('findAll')->will($this->returnValue($allCorporations));
		$this->inject($this->subject, 'corporationRepository', $corporationRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('corporations', $allCorporations);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenCorporationToView()
	{
		$corporation = new \CBAM\CbamAnnuairecbam\Domain\Model\Corporation();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('corporation', $corporation);

		$this->subject->showAction($corporation);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllCorporationsFromRepositoryAndAssignsThemToView()
	{

		$allCorporations = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$corporationRepository = $this->getMock('', array('findAll'), array(), '', FALSE);
		$corporationRepository->expects($this->once())->method('findAll')->will($this->returnValue($allCorporations));
		$this->inject($this->subject, 'corporationRepository', $corporationRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('corporations', $allCorporations);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllCorporationsFromRepositoryAndAssignsThemToView()
	{

		$allCorporations = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$corporationRepository = $this->getMock('', array('findAll'), array(), '', FALSE);
		$corporationRepository->expects($this->once())->method('findAll')->will($this->returnValue($allCorporations));
		$this->inject($this->subject, 'corporationRepository', $corporationRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('corporations', $allCorporations);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenCorporationToView()
	{
		$corporation = new \CBAM\CbamAnnuairecbam\Domain\Model\Corporation();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('corporation', $corporation);

		$this->subject->showAction($corporation);
	}
}
