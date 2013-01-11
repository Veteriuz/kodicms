<?php defined('SYSPATH') or die('No direct access allowed.');

/**
 * @package    Kodi/Datasource
 */

abstract class Datasource_Object_Hybrid extends Datasource_Object_Decorator {
	
	protected $_agent = NULL;

	public $only_sub = FALSE;
	
	protected $_documents = array();

	/**
	 * 
	 * @return DataSource_Data_Hybrid_Agent
	 */
	protected function get_agent()
	{
		if($this->_agent === NULL)
		{
			$this->_agent = DataSource_Data_Hybrid_Agent::instance($this->ds_id, $this->ds_id, $this->only_sub);
		}
		
		return $this->_agent;
	}
}