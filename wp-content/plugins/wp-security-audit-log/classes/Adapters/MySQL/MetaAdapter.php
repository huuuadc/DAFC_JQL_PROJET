<?php
/**
 * Adapter: Meta data.
 *
 * MySQL database Metadata class.
 *
 * @package wsal
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * MySQL database Metadata class.
 *
 * MySQL wsal_metadata table used for to store the alert meta data:
 * username, user_roles, client_ip, user_agent, post_id, post_title, etc.
 *
 * @package wsal
 */
class WSAL_Adapters_MySQL_Meta extends WSAL_Adapters_MySQL_ActiveRecord implements WSAL_Adapters_MetaInterface {

	/**
	 * Contains the table name.
	 *
	 * @var string
	 */
	protected $_table = 'wsal_metadata';

	/**
	 * Contains primary key column name, override as required.
	 *
	 * @var string
	 */
	protected $_idkey = 'id';

	/**
	 * Meta id.
	 *
	 * @var int
	 */
	public $id = 0;

	/**
	 * Occurrence id.
	 *
	 * @var int
	 */
	public $occurrence_id = 0;

	/**
	 * Meta name.
	 *
	 * @var string
	 */
	public $name = '';

	/**
	 * Meta name max length.
	 *
	 * @var int
	 */
	public static $name_maxlength = 100;

	/**
	 * Meta value.
	 *
	 * @var mixed
	 */
	public $value = array(); // Force mixed type.

	/**
	 * Returns the model class for adapter.
	 *
	 * @return WSAL_Models_Meta
	 */
	public function GetModel() {
		return new WSAL_Models_Meta();
	}

	/**
	 * SQL table options (constraints, foreign keys, indexes etc).
	 *
	 * @return string
	 */
	protected function GetTableOptions() {
		return parent::GetTableOptions() . ',' . PHP_EOL
				. '    KEY occurrence_name (occurrence_id,name)';
	}

	public function DeleteByOccurrenceIds( $occurrence_ids ) {
		if ( ! empty( $occurrence_ids ) ) {
			$sql = 'DELETE FROM ' . $this->GetTable() . ' WHERE occurrence_id IN (' . implode( ',', $occurrence_ids ) . ')';
			// Execute query.
			parent::DeleteQuery( $sql );
		}
	}

	public function LoadByNameAndOccurrenceId( $meta_name, $occurrence_id ) {
		return $this->Load( 'occurrence_id = %d AND name = %s', array( $occurrence_id, $meta_name ) );
	}

	/**
	 * Get distinct values of IPs.
	 *
	 * @param int $limit - (Optional) Limit.
	 * @return array - Distinct values of IPs.
	 */
	public function GetMatchingIPs( $limit = null ) {
		$_wpdb = $this->connection;
		$sql   = "SELECT DISTINCT value FROM {$this->GetTable()} WHERE name = \"ClientIP\"";
		if ( ! is_null( $limit ) ) {
			$sql .= ' LIMIT ' . $limit;
		}
		$ips = $_wpdb->get_col( $sql );
		foreach ( $ips as $key => $ip ) {
			$ips[ $key ] = str_replace( '"', '', $ip );
		}
		return array_unique( $ips );
	}

	/**
	 * Create relevant indexes on the metadata table.
	 */
	public function create_indexes() {
		$db_connection = $this->get_connection();
		// check if an index exists.
		$index_exists = false;
		if ( $db_connection->query( 'SELECT COUNT(1) IndexIsThere FROM INFORMATION_SCHEMA.STATISTICS WHERE table_schema=DATABASE() AND table_name="' . $this->GetTable() . '" AND index_name="name_value"' ) ) {
			// query succeeded, does index exist?
			$index_exists = ( isset( $db_connection->last_result[0]->IndexIsThere ) ) ? $db_connection->last_result[0]->IndexIsThere : false;
		}
		// if no index exists then make one.
		if ( ! $index_exists ) {
			$db_connection->query( 'CREATE INDEX name_value ON ' . $this->GetTable() . ' (name, value(64))' );
		}
	}
}
