<?php
namespace EBT\ExtensionBuilder\Tests\Functional;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

class RoundTripRenameVendorTest extends \EBT\ExtensionBuilder\Tests\BaseFunctionalTest
{
    /**
     * @var \EBT\ExtensionBuilder\Service\ObjectSchemaBuilder
     */
    protected $objectSchemaBuilder = null;
    /**
     * @var \EBT\ExtensionBuilder\Service\ExtensionSchemaBuilder
     */
    protected $extensionSchemaBuilder = null;
    /**
     * @var \EBT\ExtensionBuilder\Domain\Model\Extension
     */
    protected $fixtureExtension = null;

    public function setUp()
    {
        parent::setUp();
        $this->configurationManager = $this->getAccessibleMock(
            'EBT\ExtensionBuilder\Configuration\ConfigurationManager',
            array('dummy')
        );
        $this->extensionSchemaBuilder = $this->objectManager->get('EBT\ExtensionBuilder\Service\ExtensionSchemaBuilder');

        $testExtensionDir = $this->fixturesPath . 'TestExtensions/test_extension/';
        $jsonFile = $testExtensionDir . \EBT\ExtensionBuilder\Configuration\ConfigurationManager::EXTENSION_BUILDER_SETTINGS_FILE;

        if (file_exists($jsonFile)) {
            // compatibility adaptions for configurations from older versions
            $extensionConfigurationJSON = json_decode(file_get_contents($jsonFile), true);
            $extensionConfigurationJSON = $this->configurationManager->fixExtensionBuilderJSON($extensionConfigurationJSON, false);
        } else {
            $extensionConfigurationJSON = array();
            $this->fail('JSON file not found: ' . $jsonFile);
        }

        $this->fixtureExtension = $this->extensionSchemaBuilder->build($extensionConfigurationJSON);
        $this->fixtureExtension->setExtensionDir($testExtensionDir);
        $this->roundTripService->_set('extension', $this->fixtureExtension);
        $this->roundTripService->_set('previousExtensionDirectory', $testExtensionDir);
        $this->roundTripService->_set('extensionDirectory', $testExtensionDir);
        $this->roundTripService->_set('previousDomainObjects', array(
            $this->fixtureExtension->getDomainObjectByName('Main')->getUniqueIdentifier() => $this->fixtureExtension->getDomainObjectByName('Main')
        ));
        $this->fileGenerator->setSettings(
            array(
                'codeTemplateRootPath' => PATH_typo3conf . 'ext/extension_builder/Resources/Private/CodeTemplates/Extbase/',
                'extConf' => array(
                    'enableRoundtrip' => '1'
                )
            )
        );
    }

    public function tearDown()
    {
        // overwrite parent tearDown to avoid deletion of fixture extension
    }

    /**
     * @test
     */
    function changeVendorNameResultsInNewNamespace()
    {
        $this->fixtureExtension->setOriginalVendorName('FIXTURE');
        $this->fixtureExtension->setVendorName('VENDOR');
        $this->assertEquals('VENDOR\TestExtension', $this->fixtureExtension->getNamespaceName());
    }

    /**
     * @test
     */
    function changeVendorNameResultsInUpdatedTagsInControllerClass()
    {
        $this->fixtureExtension->setOriginalVendorName('FIXTURE');
        $this->fixtureExtension->setVendorName('VENDOR');

        $controllerClassFile = $this->roundTripService->getControllerClassFile($this->fixtureExtension->getDomainObjectByName('Main'));
        $controllerClassObject = $controllerClassFile->getFirstClass();
        $repositoryProperty = current($controllerClassObject->getProperties());
        $this->assertEquals('\VENDOR\TestExtension\Domain\Repository\MainRepository', $repositoryProperty->getTagValues('var'));
    }

    /**
     * @test
     */
    function changeVendorNameResultsInUpdatedTagsInModelClass()
    {
        $this->fixtureExtension->setOriginalVendorName('FIXTURE');
        $this->fixtureExtension->setVendorName('VENDOR');

        $modelClassFile = $this->roundTripService->getDomainModelClassFile($this->fixtureExtension->getDomainObjectByName('Main'));
        $modelClassObject = $modelClassFile->getFirstClass();
        $properties = $modelClassObject->getProperties();
        $this->assertEquals('\VENDOR\TestExtension\Domain\Model\Child1', $properties['child1']->getTagValue('var'));
        $this->assertEquals('\TYPO3\CMS\Extbase\Persistence\ObjectStorage<\VENDOR\TestExtension\Domain\Model\Child2>', $properties['children2']->getTagValue('var'));
        $this->assertEquals('\TYPO3\CMS\Extbase\Persistence\ObjectStorage<\VENDOR\TestExtension\Domain\Model\Child4>', $properties['children4']->getTagValue('var'));
    }
}