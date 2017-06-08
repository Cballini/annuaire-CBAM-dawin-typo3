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
 * Department
 */
class Service extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * denomination
     *
     * @var string
     * @validate NotEmpty
     */
    protected $denomination = '';
    
    /**
     * building
     *
     * @var string
     */
    protected $building = '';
    
    /**
     * office
     *
     * @var string
     */
    protected $office = '';
    
    /**
     * phone
     *
     * @var string
     */
    protected $phone = '';
    
    /**
     * schedule
     *
     * @var string
     */
    protected $schedule = '';
    
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
     * Returns the building
     *
     * @return string $building
     */
    public function getBuilding()
    {
        return $this->building;
    }
    
    /**
     * Sets the building
     *
     * @param string $building
     * @return void
     */
    public function setBuilding($building)
    {
        $this->building = $building;
    }
    
    /**
     * Returns the office
     *
     * @return string $office
     */
    public function getOffice()
    {
        return $this->office;
    }
    
    /**
     * Sets the office
     *
     * @param string $office
     * @return void
     */
    public function setOffice($office)
    {
        $this->office = $office;
    }
    
    /**
     * Returns the phone
     *
     * @return string $phone
     */
    public function getPhone()
    {
        return $this->phone;
    }
    
    /**
     * Sets the phone
     *
     * @param string $phone
     * @return void
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
    
    /**
     * Returns the schedule
     *
     * @return string $schedule
     */
    public function getSchedule()
    {
        return $this->schedule;
    }
    
    /**
     * Sets the schedule
     *
     * @param string $schedule
     * @return void
     */
    public function setSchedule($schedule)
    {
        $this->schedule = $schedule;
    }

}