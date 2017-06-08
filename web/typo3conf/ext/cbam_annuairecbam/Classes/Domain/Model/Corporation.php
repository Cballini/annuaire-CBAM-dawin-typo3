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
 * Structure
 */
class Corporation extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * companyName
     *
     * @var string
     * @validate NotEmpty
     */
    protected $companyName = '';
    
    /**
     * address
     *
     * @var string
     * @validate NotEmpty
     */
    protected $address = '';
    
    /**
     * postalCode
     *
     * @var string
     * @validate NotEmpty
     */
    protected $postalCode = '';
    
    /**
     * city
     *
     * @var string
     * @validate NotEmpty
     */
    protected $city = '';
    
    /**
     * phone
     *
     * @var string
     */
    protected $phone = '';
    
    /**
     * fax
     *
     * @var string
     */
    protected $fax = '';
    
    /**
     * email
     *
     * @var string
     */
    protected $email = '';
    
    /**
     * description
     *
     * @var string
     */
    protected $description = '';
    
    /**
     * siret
     *
     * @var string
     * @validate NotEmpty
     */
    protected $siret = '';
    
    /**
     * logo
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $logo = null;
    
    /**
     * schedule
     *
     * @var string
     */
    protected $schedule = '';
    
    /**
     * Returns the companyName
     *
     * @return string $companyName
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }
    
    /**
     * Sets the companyName
     *
     * @param string $companyName
     * @return void
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;
    }
    
    /**
     * Returns the address
     *
     * @return string $address
     */
    public function getAddress()
    {
        return $this->address;
    }
    
    /**
     * Sets the address
     *
     * @param string $address
     * @return void
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }
    
    /**
     * Returns the postalCode
     *
     * @return string $postalCode
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }
    
    /**
     * Sets the postalCode
     *
     * @param string $postalCode
     * @return void
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }
    
    /**
     * Returns the city
     *
     * @return string $city
     */
    public function getCity()
    {
        return $this->city;
    }
    
    /**
     * Sets the city
     *
     * @param string $city
     * @return void
     */
    public function setCity($city)
    {
        $this->city = $city;
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
     * Returns the fax
     *
     * @return string $fax
     */
    public function getFax()
    {
        return $this->fax;
    }
    
    /**
     * Sets the fax
     *
     * @param string $fax
     * @return void
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
    }
    
    /**
     * Returns the email
     *
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    /**
     * Sets the email
     *
     * @param string $email
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    /**
     * Returns the siret
     *
     * @return string $siret
     */
    public function getSiret()
    {
        return $this->siret;
    }
    
    /**
     * Sets the siret
     *
     * @param string $siret
     * @return void
     */
    public function setSiret($siret)
    {
        $this->siret = $siret;
    }
    
    /**
     * Returns the logo
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $logo
     */
    public function getLogo()
    {
        return $this->logo;
    }
    
    /**
     * Sets the logo
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $logo
     * @return void
     */
    public function setLogo(\TYPO3\CMS\Extbase\Domain\Model\FileReference $logo)
    {
        $this->logo = $logo;
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