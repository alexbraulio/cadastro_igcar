<?php
/** @package    Sistemaigcar::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * ClientePfMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the ClientePfDAO to the cliente_pf datastore.
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
class ClientePfMap implements IDaoMap, IDaoMap2
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
			self::$FM["Id"] = new FieldMap("Id","cliente_pf","id",true,FM_TYPE_INT,11,null,true);
			self::$FM["RazaoSocial"] = new FieldMap("RazaoSocial","cliente_pf","razao_social",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Email"] = new FieldMap("Email","cliente_pf","email",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Telefone"] = new FieldMap("Telefone","cliente_pf","telefone",false,FM_TYPE_INT,11,null,false);
			self::$FM["Celular"] = new FieldMap("Celular","cliente_pf","celular",false,FM_TYPE_INT,12,null,false);
			self::$FM["Cnpj"] = new FieldMap("Cnpj","cliente_pf","cnpj",false,FM_TYPE_INT,255,null,false);
			self::$FM["Endereco"] = new FieldMap("Endereco","cliente_pf","endereco",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Bairro"] = new FieldMap("Bairro","cliente_pf","bairro",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Cep"] = new FieldMap("Cep","cliente_pf","cep",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Cidade"] = new FieldMap("Cidade","cliente_pf","cidade",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["EstadoUf"] = new FieldMap("EstadoUf","cliente_pf","estado_UF",false,FM_TYPE_VARCHAR,255,null,false);
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