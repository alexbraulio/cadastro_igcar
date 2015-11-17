<?php
/** @package    Sistemaigcar::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the ClientePf object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package Sistemaigcar::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class ClientePfReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `cliente_pf` table
	public $CustomFieldExample;

	public $Id;
	public $RazaoSocial;
	public $Email;
	public $Telefone;
	public $Celular;
	public $Cnpj;
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
			,`cliente_pf`.`id` as Id
			,`cliente_pf`.`razao_social` as RazaoSocial
			,`cliente_pf`.`email` as Email
			,`cliente_pf`.`telefone` as Telefone
			,`cliente_pf`.`celular` as Celular
			,`cliente_pf`.`cnpj` as Cnpj
			,`cliente_pf`.`endereco` as Endereco
			,`cliente_pf`.`bairro` as Bairro
			,`cliente_pf`.`cep` as Cep
			,`cliente_pf`.`cidade` as Cidade
			,`cliente_pf`.`estado_UF` as EstadoUf
		from `cliente_pf`";

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
		$sql = "select count(1) as counter from `cliente_pf`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>