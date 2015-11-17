<?php
/** @package    Sistemaigcar::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the ClientePj object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package Sistemaigcar::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class ClientePjReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `cliente_pj` table
	public $CustomFieldExample;

	public $Id;
	public $NomeCompleto;
	public $Email;
	public $Telefone;
	public $Celular;
	public $Cnh;
	public $Cpf;
	public $Endereco;
	public $Bairro;
	public $Cep;
	public $Cidade;
	public $EstadoUf;

	/*
	* GetCustomQuery returns a fully formed SQL statement.  The result columns
	* must match with the properties of this reporter object.
	*
	* @see Reporter::GetCustomQuery
	* @param Criteria $criteria
	* @return string SQL statement
	*/
	static function GetCustomQuery($criteria)
	{
		$sql = "select
			'custom value here...' as CustomFieldExample
			,`cliente_pj`.`id` as Id
			,`cliente_pj`.`nome_completo` as NomeCompleto
			,`cliente_pj`.`email` as Email
			,`cliente_pj`.`telefone` as Telefone
			,`cliente_pj`.`celular` as Celular
			,`cliente_pj`.`cnh` as Cnh
			,`cliente_pj`.`cpf` as Cpf
			,`cliente_pj`.`endereco` as Endereco
			,`cliente_pj`.`bairro` as Bairro
			,`cliente_pj`.`cep` as Cep
			,`cliente_pj`.`cidade` as Cidade
			,`cliente_pj`.`estado_UF` as EstadoUf
		from `cliente_pj`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();
		$sql .= $criteria->GetOrder();

		return $sql;
	}
	
	/*
	* GetCustomCountQuery returns a fully formed SQL statement that will count
	* the results.  This query must return the correct number of results that
	* GetCustomQuery would, given the same criteria
	*
	* @see Reporter::GetCustomCountQuery
	* @param Criteria $criteria
	* @return string SQL statement
	*/
	static function GetCustomCountQuery($criteria)
	{
		$sql = "select count(1) as counter from `cliente_pj`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>