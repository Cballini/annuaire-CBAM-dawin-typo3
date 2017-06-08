<?php
namespace CBAM\CbamAnnuairecbam\Domain\Model;

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
 * Position
 */
class Position extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * denomination
     *
     * @var string
     * @validate NotEmpty
     */
    protected $denomination = '';
    
    /**
     * manager
     *
     * @var bool
     */
    protected $manager = false;
    
    /**
     * Returns the denomination
     *
     * @return string $denomination
     */
    public function getDenomination()
    {
        return $this->denomination;
    }
    
    /**
     * Sets the denomination
     *
     * @param string $denomination
     * @return void
     */
    public function setDenomination($denomination)
    {
        $this->denomination = $denomination;
    }
    
    /**
     * Returns the manager
     *
     * @return bool $manager
     */
    public function getManager()
    {
        return $this->manager;
    }
    
    /**
     * Sets the manager
     *
     * @param bool $manager
     * @return void
     */
    public function setManager($manager)
    {
        $this->manager = $manager;
    }
    
    /**
     * Returns the boolean state of manager
     *
     * @return bool
     */
    public function isManager()
    {
        return $this->manager;
    }

}