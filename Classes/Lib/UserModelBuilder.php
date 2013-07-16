<?php


namespace TYPO3\T3registrationeb\Lib;

/**
 * Singleton class to extend model property
 *
 * Class UserModelBuilder
 * @author  Federico Bernardin
 * @package TYPO3\T3registrationeb\Lib
 */
class UserModelBuilder implements \TYPO3\CMS\Core\SingletonInterface {

	/**
	 * Array of caching objects
	 * @var array
	 */
	static protected $cache = NULL;

	protected $extendedCacheFile = '';

	/**
	 * @var \TYPO3\T3registrationeb\Lib\UserModelBuilder
	 */
	static protected $instance = NULL;

	/**
	 * Unique Request ID
	 *
	 * @var string
	 */
	protected $requestId;

	/**
	 * @var \TYPO3\CMS\Extbase\Object\ObjectManager
	 */
	protected $objectManager;

	/**
	 * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManager
	 */
	protected $configurationManager;

	/**
	 * Disable direct creation of this object.
	 */
	protected function __construct() {
		self::$cache = array();
		$this->requestId = uniqid();
		$this->extendedCacheFile = PATH_site . 'typo3temp/Cache/Code/cache_phpcode/T3Registrationeb_extendedModel.php';
	}

	/**
	 * Disable direct cloning of this object.
	 */
	protected function __clone() {

	}

	/**
	 * Return 'this' as singleton
	 *
	 * @return \TYPO3\CMS\Core\Core\Bootstrap
	 * @internal This is not a public API method, do not use in own extensions
	 */
	static public function getInstance() {
		if (is_null(self::$instance)) {
			self::$instance = new \TYPO3\T3registrationeb\Lib\UserModelBuilder();
		}
		return self::$instance;
	}

	protected function cacheEnvironment() {
		$this->objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Object\ObjectManager');
		$this->configurationManager = $this->objectManager->get('TYPO3\CMS\Extbase\Configuration\ConfigurationManager');
	}

	/**
	 * Gets the request's unique ID
	 *
	 * @return string Unique request ID
	 * @internal This is not a public API method, do not use in own extensions
	 */
	public function getRequestId() {
		return $this->requestId;
	}

	public function build() {
		$content = array();
		$typoscript = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT);
		if (isset($typoscript['config.']['tx_extbase.']['persistence.']['classes.']['TYPO3\CMS\Extbase\Domain\Model\FrontendUser.']['extends.']['classes.'])) {
			$extendsClasses = $typoscript['config.']['tx_extbase.']['persistence.']['classes.']['TYPO3\CMS\Extbase\Domain\Model\FrontendUser.']['extends.']['classes.'];
			foreach ($extendsClasses as $key => $class) {
				if (($file = $this->getFilePath($class)) != null) {
					$content[] = $this->getExtendedContent($file);
				}
			}
		}
		return preg_replace('/([\w\W]*)(\})([\w\W]*)/', '${1}' . implode(LF, $content) . LF . '}${3}', $this->getOriginalFile());
	}

	protected function getExtendedContent($file) {
		//$regularExpression = '/class(?:.*)extends(?:.*)(?:FrontendUser(?:\s*){)([\w\W]*)(?:})/';
		$regularExpression = '/class(?:.*)extends(?:\s*)(?:\\\\TYPO3\\\\CMS\\\\Extbase\\\\Domain\\\\Model\\\\FrontendUser)(?:\s*)(?:{)([\w\W]*)(?:})/';
		$result = preg_match_all($regularExpression, file_get_contents($file), $matches);
		return $matches[1][0];
	}

	protected function getFilePath($class) {
		if (class_exists('\\' . $class)) {
			$reflectionClass = new \ReflectionClass('\\' . $class);
			return $reflectionClass->getFileName();
		} else {
			return null;
		}
	}

	protected function getOriginalFile() {
		$content = file_get_contents(
			\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('extbase') . 'Classes/Domain/Model/FrontendUser.php');
		return $content;
	}

	protected function setCache($class, $path) {

	}

	protected function createCache() {

	}

	protected function createCachingModel() {

	}

	protected function savedCachedModel($content) {
		file_put_contents($this->getCachedFileName(), $content);
	}

	protected function isCached() {
		return file_exists($this->getCachedFileName());
	}

	public function removedCachedFile() {
		$this->cacheEnvironment();
		$content = $this->build();
		$files = glob(PATH_site . 'typo3temp/Cache/Code/cache_phpcode/T3Registrationeb_*');
		foreach ($files as $file) {
			unlink($file);
		}
		\TYPO3\CMS\Core\Utility\GeneralUtility::writeFile($this->getCachedFileName(), $content);
		return true;
	}

	public function getCachedFileName() {
		return $this->extendedCacheFile;
	}
}