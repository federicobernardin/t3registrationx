<?php

namespace TYPO3\T3registrationeb\Tests;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Federico Bernardin <federico@bernardin.it>, BFConsulting
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
 * Test case for class \TYPO3\T3registrationeb\Domain\Model\FrontendUser.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage TYPO3 Registration
 *
 * @author Federico Bernardin <federico@bernardin.it>
 */
class FrontendUserTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {
	/**
	 * @var \TYPO3\T3registrationeb\Domain\Model\FrontendUser
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new \TYPO3\T3registrationeb\Domain\Model\FrontendUser();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getPrivacyReturnsInitialValueForOolean() { }

	/**
	 * @test
	 */
	public function setPrivacyForOoleanSetsPrivacy() { }
	
	/**
	 * @test
	 */
	public function getAuthenticationCodeReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setAuthenticationCodeForStringSetsAuthenticationCode() { 
		$this->fixture->setAuthenticationCode('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getAuthenticationCode()
		);
	}
	
	/**
	 * @test
	 */
	public function getModeratorApprovalReturnsInitialValueForOolean() { }

	/**
	 * @test
	 */
	public function setModeratorApprovalForOoleanSetsModeratorApproval() { }
	
	/**
	 * @test
	 */
	public function getModeratorApprovalateDReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getModeratorApprovalateD()
		);
	}

	/**
	 * @test
	 */
	public function setModeratorApprovalateDForIntegerSetsModeratorApprovalateD() { 
		$this->fixture->setModeratorApprovalateD(12);

		$this->assertSame(
			12,
			$this->fixture->getModeratorApprovalateD()
		);
	}
	
	/**
	 * @test
	 */
	public function getUserApprovalReturnsInitialValueForOolean() { }

	/**
	 * @test
	 */
	public function setUserApprovalForOoleanSetsUserApproval() { }
	
}
?>