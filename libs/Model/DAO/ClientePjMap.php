<?php
/** @package    Sistemaigcar::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * ClientePjMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the ClientePjDAO to the cliente_pj datastore.
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
class ClientePjMap implements IDaoMap, IDaoMap2
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
			self::$FM["Id"] = new FieldMap("Id","cliente_pj","id",true,FM_TYPE_INT,11,null,true);
			self::$FM["NomeCompleto"] = new FieldMap("NomeCompleto","cliente_pj","nome_completo",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Email"] = new FieldMap("Email","cliente_pj","email",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Telefone"] = new FieldMap("Telefone","cliente_pj","telefone",false,FM_TYPE_INT,11,null,false);
			self::$FM["Celular"] = new FieldMap("Celular","cliente_pj","celular",false,FM_TYPE_INT,12,null,false);
			self::$FM["Cnh"] = new FieldMap("Cnh","cliente_pj","cnh",false,FM_TYPE_BLOB,null,null,false);
			self::$FM["Cpf"] = new FieldMap("Cpf","cliente_pj","cpf",false,FM_TYPE_INT,255,null,false);
			self::$FM["Endereco"] = new FieldMap("Endereco","cliente_pj","endereco",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Bairro"] = new FieldMap("Bairro","cliente_pj","bairro",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Cep"] = new FieldMap("Cep","cliente_pj","cep",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Cidade"] = new FieldMap("Cidade","cliente_pj","cidade",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["EstadoUf"] = new FieldMap("EstadoUf","cliente_pj","estado_UF",false,FM_TYPE_VARCHAR,255,null,false);
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