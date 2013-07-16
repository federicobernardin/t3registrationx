<?php


namespace TYPO3\T3registrationeb\Backend;


class TceMain {

	/**
	 * @var \TYPO3\T3registrationeb\Lib\UserModelBuilder
	 */
	protected $cacheBuilder = NULL;

	/**
	 * CONSTRUCTOR
	 */
	public function __construct() {
		$this->cacheBuilder = \TYPO3\T3registrationeb\Lib\UserModelBuilder::getInstance();
	}


	public function clearCacheCommand() {
		$this->cacheBuilder->removedCachedFile();
		$pippo = 1;
	}
}