<?php
namespace TYPO3\T3registrationeb\Domain\Model;

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
 *
 *
 * @package T3registrationeb
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class FrontendUser extends \TYPO3\CMS\Extbase\Domain\Model\FrontendUser {

	/**
	 * Privacy flag
	 *
	 * @var boolean
	 */
	protected $privacy = FALSE;

	/**
	 * @validate NotEmpty
	 * User authentication code
	 *
	 * @var \string
	 */
	protected $authenticationCode;

	/**
	 * moderatorApproval
	 *
	 * @var boolean
	 */
	protected $moderatorApproval = FALSE;

	/**
	 * Date and time (timestamp) of moderator approval
	 *
	 * @var \integer
	 */
	protected $moderatorApprovalateD;

	/**
	 * user approval date and time
	 *
	 * @var boolean
	 */
	protected $userApproval = FALSE;

	/**
	 * Returns the privacy
	 *
	 * @return boolean $privacy
	 */
	public function getPrivacy() {
		return $this->privacy;
	}

	/**
	 * Sets the privacy
	 *
	 * @param boolean $privacy
	 * @return $this
	 */
	public function setPrivacy($privacy) {
		$this->privacy = $privacy;
		return $this;
	}

	/**
	 * Returns the boolean state of privacy
	 *
	 * @return boolean
	 */
	public function isPrivacy() {
		return $this->getPrivacy();
	}

	/**
	 * Returns the authenticationCode
	 *
	 * @return \string $authenticationCode
	 */
	public function getAuthenticationCode() {
		return $this->authenticationCode;
	}

	/**
	 * Sets the authenticationCode
	 *
	 * @param \string $authenticationCode
	 * @return $this
	 */
	public function setAuthenticationCode($authenticationCode) {
		$this->authenticationCode = $authenticationCode;
		return $this;
	}

	/**
	 * Returns the moderatorApproval
	 *
	 * @return boolean $moderatorApproval
	 */
	public function getModeratorApproval() {
		return $this->moderatorApproval;
	}

	/**
	 * Sets the moderatorApproval
	 *
	 * @param boolean $moderatorApproval
	 * @return $this
	 */
	public function setModeratorApproval($moderatorApproval) {
		$this->moderatorApproval = $moderatorApproval;
		return $this;
	}

	/**
	 * Returns the boolean state of moderatorApproval
	 *
	 * @return boolean
	 */
	public function isModeratorApproval() {
		return $this->getModeratorApproval();
	}

	/**
	 * Returns the moderatorApprovalateD
	 *
	 * @return \integer $moderatorApprovalateD
	 */
	public function getModeratorApprovalateD() {
		return $this->moderatorApprovalateD;
	}

	/**
	 * Sets the moderatorApprovalDate
	 *
	 * @param \integer $moderatorApprovalDate
	 * @return $this
	 */
	public function setModeratorApprovalateD($moderatorApprovalDate) {
		$this->moderatorApprovalateD = $moderatorApprovalDate;
		return $this;
	}

	/**
	 * Returns the userApproval
	 *
	 * @return boolean $userApproval
	 */
	public function getUserApproval() {
		return $this->userApproval;
	}

	/**
	 * Sets the userApproval
	 *
	 * @param boolean $userApproval
	 * @return $this
	 */
	public function setUserApproval($userApproval) {
		$this->userApproval = $userApproval;
		return $this;
	}

	/**
	 * Returns the boolean state of userApproval
	 *
	 * @return boolean
	 */
	public function isUserApproval() {
		return $this->getUserApproval();
	}

}
?>