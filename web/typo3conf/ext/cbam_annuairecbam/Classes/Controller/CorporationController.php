<?php
namespace CBAM\CbamAnnuairecbam\Controller;

/***************************************************************
 *
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
 *  the Free Software Foundation; either version 3 of the License, or
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
 * CorporationController
 */
class CorporationController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $corporations = $this->corporationRepository->findAll();
        $this->view->assign('corporations', $corporations);
    }
    
    /**
     * action show
     *
     * @param \CBAM\CbamAnnuairecbam\Domain\Model\Corporation $corporation
     * @return void
     */
    public function showAction(\CBAM\CbamAnnuairecbam\Domain\Model\Corporation $corporation)
    {
        $this->view->assign('corporation', $corporation);
    }
    
    /**
     * action contactList
     *
     * @return void
     */
    public function contactListAction()
    {
        
    }
    
    /**
     * action serviceList
     *
     * @return void
     */
    public function serviceListAction()
    {
        
    }
    
    /**
     * action serviceShow
     *
     * @return void
     */
    public function serviceShowAction()
    {
        
    }

}