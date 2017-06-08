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
 * Contact
 */
class Contact extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * lastname
     *
     * @var string
     * @validate NotEmpty
     */
    protected $lastname = '';
    
    /**
     * firstname
     *
     * @var string
     */
    protected $firstname = '';
    
    /**
     * phone
     *
     * @var string
     */
    protected $phone = '';
    
    /**
     * email
     *
     * @var string
     */
    protected $email = '';
    
    /**
     * address
     *
     * @var string
     */
    protected $address = '';
    
    /**
     * postalCode
     *
     * @var string
     */
    protected $postalCode = '';
    
    /**
     * city
     *
     * @var string
     */
    protected $city = '';
    
    /**
     * picture
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $picture = null;
    
    /**
     * description
     *
     * @var string
     */
    protected $description = '';
    
    /**
     * Corporation
     *
     * @var \CBAM\CbamAnnuairecbam\Domain\Model\Corporation
     */
    protected $corporation = null;
    
    /**
     * position
     *
     * @var \CBAM\CbamAnnuairecbam\Domain\Model\Position
     */
    protected $position = null;
    
    /**
     * service
     *
     * @var \CBAM\CbamAnnuairecbam\Domain\Model\Service
     */
    protected $service = null;
    
    /**
     * Returns the lastname
     *
     * @return string $lastname
     */
    public function getLastname()
    {
        return $this->lastname;
    }
    
    /**
     * Sets the lastname
     *
     * @param string $lastname
     * @return void
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }
    
    /**
     * Returns the firstname
     *
     * @return string $firstname
     */
    public function getFirstname()
    {
        return $this->firstname;
    }
    
    /**
     * Sets the firstname
     *
     * @param string $firstname
     * @return void
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
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
     * Returns the picture
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $picture
     */
    public function getPicture()
    {
        return $this->picture;
    }
    
    /**
     * Sets the picture
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $picture
     * @return void
     */
    public function setPicture(\TYPO3\CMS\Extbase\Domain\Model\FileReference $picture)
    {
        $this->picture = $picture;
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
     * Returns the position
     *
     * @return \CBAM\CbamAnnuairecbam\Domain\Model\Position $position
     */
    public function getPosition()
    {
        return $this->position;
    }
    
    /**
     * Sets the position
     *
     * @param \CBAM\CbamAnnuairecbam\Domain\Model\Position $position
     * @return void
     */
    public function setPosition(\CBAM\CbamAnnuairecbam\Domain\Model\Position $position)
    {
        $this->position = $position;
    }
    
    /**
     * Returns the corporation
     *
     * @return \CBAM\CbamAnnuairecbam\Domain\Model\Corporation corporation
     */
    public function getCorporation()
    {
        return $this->corporation;
    }
    
    /**
     * Sets the corporation
     *
     * @param \CBAM\CbamAnnuairecbam\Domain\Model\Corporation $corporation
     * @return void
     */
    public function setCorporation(\CBAM\CbamAnnuairecbam\Domain\Model\Corporation $corporation)
    {
        $this->corporation = $corporation;
    }
    
    /**
     * Returns the service
     *
     * @return \CBAM\CbamAnnuairecbam\Domain\Model\Service service
     */
    public function getService()
    {
        return $this->service;
    }
    
    /**
     * Sets the service
     *
     * @param \CBAM\CbamAnnuairecbam\Domain\Model\Service $service
     * @return void
     */
    public function setService(\CBAM\CbamAnnuairecbam\Domain\Model\Service $service)
    {
        $this->service = $service;
    }

}