<?php
namespace TYPO3\T3registrationeb\Controller;

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
class RegistrationController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * frontendUserRepository
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Repository\FrontendUserRepository
	 * @inject
	 */
	protected $frontendUserRepository;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$validator = $this->validatorResolver->createValidator('NotEmpty',array());
		if($validator->isValid(null)){
			$result = 'OK';
		}
		else{
			$result = $validator->getErrors();
		}
		$frontendUsers = $this->frontendUserRepository->findAll();
		$user = $frontendUsers->current();
		$this->view->assign('frontendUsers', $frontendUsers);
		$this->view->assign('error', $result);
	}

	/**
	 * action show
	 *
	 * @param \TYPO3\T3registrationeb\Domain\Model\FrontendUser $frontendUser
	 * @return void
	 */
	public function showAction(\TYPO3\T3registrationeb\Domain\Model\FrontendUser $frontendUser) {
		$this->view->assign('frontendUser', $frontendUser);
	}

	/**
	 * action new
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FrontendUser $newFrontendUser
	 * @dontvalidate $newFrontendUser
	 * @return void
	 */
	public function newAction(\TYPO3\CMS\Extbase\Domain\Model\FrontendUser $newFrontendUser = NULL) {
		if ($newFrontendUser == NULL) { // workaround for fluid bug ##5636
			$newFrontendUser = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Domain\Model\FrontendUser');
		}
		$this->view->assign('newFrontendUser', $newFrontendUser);
	}

	/**
	 * action create
	 *
	 * @param \TYPO3\T3registrationeb\Domain\Model\FrontendUser $newFrontendUser
	 * @return void
	 */
	public function createAction(\TYPO3\T3registrationeb\Domain\Model\FrontendUser $newFrontendUser) {
		$this->frontendUserRepository->add($newFrontendUser);
		$this->flashMessageContainer->add('Your new FrontendUser was created.');
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param \TYPO3\T3registrationeb\Domain\Model\FrontendUser $frontendUser
	 * @return void
	 */
	public function editAction(\TYPO3\T3registrationeb\Domain\Model\FrontendUser $frontendUser) {
		$this->view->assign('frontendUser', $frontendUser);
	}

	/**
	 * action update
	 *
	 * @param \TYPO3\T3registrationeb\Domain\Model\FrontendUser $frontendUser
	 * @return void
	 */
	public function updateAction(\TYPO3\T3registrationeb\Domain\Model\FrontendUser $frontendUser) {
		$this->frontendUserRepository->update($frontendUser);
		$this->flashMessageContainer->add('Your FrontendUser was updated.');
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param \TYPO3\T3registrationeb\Domain\Model\FrontendUser $frontendUser
	 * @return void
	 */
	public function deleteAction(\TYPO3\T3registrationeb\Domain\Model\FrontendUser $frontendUser) {
		$this->frontendUserRepository->remove($frontendUser);
		$this->flashMessageContainer->add('Your FrontendUser was removed.');
		$this->redirect('list');
	}

	/**
	 * action changeUsername
	 *
	 * @return void
	 */
	public function changeUsernameAction() {

	}

	/**
	 * action preview
	 *
	 * @return void
	 */
	public function previewAction() {

	}

}
?>