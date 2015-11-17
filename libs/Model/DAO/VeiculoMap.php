<?php
/** @package    Sistemaigcar::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * VeiculoMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the VeiculoDAO to the veiculo datastore.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * You can override the default fetching strategies for KeyMaps in _config.php.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package Sistemaigcar::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class VeiculoMap implements IDaoMap, IDaoMap2
{

	private static $KM;
	private static $FM;
	
	/**
	 * {@inheritdoc}
	 */
	public static function AddMap($property,FieldMap $map)
	{
		self::GetFieldMaps();
		self::$FM[$property] = $map;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public static function SetFetchingStrategy($property,$loadType)
	{
		self::GetKeyMaps();
		self::$KM[$property]->LoadType = $loadType;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetFieldMaps()
	{
		if (self::$FM == null)
		{
			self::$FM = Array();
			self::$FM["Id"] = new FieldMap("Id","veiculo","id",true,FM_TYPE_INT,11,null,false);
			self::$FM["Placa"] = new FieldMap("Placa","veiculo","placa",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Marca"] = new FieldMap("Marca","veiculo","marca",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Modelo"] = new FieldMap("Modelo","veiculo","modelo",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Doc"] = new FieldMap("Doc","veiculo","doc",false,FM_TYPE_BLOB,null,null,false);
		}
		return self::$FM;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetKeyMaps()
	{
		if (self::$KM == null)
		{
			self::$KM = Array();
		}
		return self::$KM;
	}

}

?>