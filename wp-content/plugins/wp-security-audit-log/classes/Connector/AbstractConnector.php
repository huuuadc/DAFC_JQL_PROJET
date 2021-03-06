<?php
/**
 * Class: Abstract Connector.
 *
 * Abstract class used as a class loader.
 *
 * @package wsal
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// require_once('ConnectorInterface.php');.
require_once( 'wp-db-custom.php' );

/**
 * Adapter Classes loader class.
 *
 * Abstract class used as a class loader.
 *
 * @package wsal
 */
abstract class WSAL_Connector_AbstractConnector {

	/**
	 * Connection Variable.
	 *
	 * @var null
	 */
	protected $connection = null;

	/**
	 * Adapter Base Path.
	 *
	 * @var null
	 */
	protected $adaptersBasePath = null;

	/**
	 * Adapter Directory Name.
	 *
	 * @var null
	 */
	protected $adaptersDirName = null;

	/**
	 * Method: Constructor.
	 *
	 * @param  string $adapters_dir_name - Adapter directory name.
	 */
	public function __construct( $adapters_dir_name = null ) {
		$this->adaptersBasePath = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Adapters' . DIRECTORY_SEPARATOR;
		if ( ! empty( $adapters_dir_name ) ) {
			$this->adaptersDirName = $adapters_dir_name;
			require_once( $this->getAdaptersDirectory() . DIRECTORY_SEPARATOR . 'ActiveRecordAdapter.php' );
			require_once( $this->getAdaptersDirectory() . DIRECTORY_SEPARATOR . 'MetaAdapter.php' );
			require_once( $this->getAdaptersDirectory() . DIRECTORY_SEPARATOR . 'OccurrenceAdapter.php' );
			require_once( $this->getAdaptersDirectory() . DIRECTORY_SEPARATOR . 'QueryAdapter.php' );
			require_once( $this->getAdaptersDirectory() . DIRECTORY_SEPARATOR . 'TmpUserAdapter.php' );
			do_action( 'wsal_require_additional_adapters' );
		}
	}

	/**
	 * Method: Get adapters directory.
	 */
	public function getAdaptersDirectory() {
		if ( ! empty( $this->adaptersBasePath ) && ! empty( $this->adaptersDirName ) ) {
			return $this->adaptersBasePath . $this->adaptersDirName;
		} else {
			return false;
		}
	}
}
