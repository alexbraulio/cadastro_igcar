<?php
/** @package    Sistemaigcar::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Criteria.php");

/**
 * ClientePjCriteria allows custom querying for the ClientePj object.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * Add any custom business logic to the ModelCriteria class which is extended from this class.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @inheritdocs
 * @package Sistemaigcar::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class ClientePjCriteriaDAO extends Criteria
{

	public $Id_Equals;
	public $Id_NotEquals;
	public $Id_IsLike;
	public $Id_IsNotLike;
	public $Id_BeginsWith;
	public $Id_EndsWith;
	public $Id_GreaterThan;
	public $Id_GreaterThanOrEqual;
	public $Id_LessThan;
	public $Id_LessThanOrEqual;
	public $Id_In;
	public $Id_IsNotEmpty;
	public $Id_IsEmpty;
	public $Id_BitwiseOr;
	public $Id_BitwiseAnd;
	public $NomeCompleto_Equals;
	public $NomeCompleto_NotEquals;
	public $NomeCompleto_IsLike;
	public $NomeCompleto_IsNotLike;
	public $NomeCompleto_BeginsWith;
	public $NomeCompleto_EndsWith;
	public $NomeCompleto_GreaterThan;
	public $NomeCompleto_GreaterThanOrEqual;
	public $NomeCompleto_LessThan;
	public $NomeCompleto_LessThanOrEqual;
	public $NomeCompleto_In;
	public $NomeCompleto_IsNotEmpty;
	public $NomeCompleto_IsEmpty;
	public $NomeCompleto_BitwiseOr;
	public $NomeCompleto_BitwiseAnd;
	public $Email_Equals;
	public $Email_NotEquals;
	public $Email_IsLike;
	public $Email_IsNotLike;
	public $Email_BeginsWith;
	public $Email_EndsWith;
	public $Email_GreaterThan;
	public $Email_GreaterThanOrEqual;
	public $Email_LessThan;
	public $Email_LessThanOrEqual;
	public $Email_In;
	public $Email_IsNotEmpty;
	public $Email_IsEmpty;
	public $Email_BitwiseOr;
	public $Email_BitwiseAnd;
	public $Telefone_Equals;
	public $Telefone_NotEquals;
	public $Telefone_IsLike;
	public $Telefone_IsNotLike;
	public $Telefone_BeginsWith;
	public $Telefone_EndsWith;
	public $Telefone_GreaterThan;
	public $Telefone_GreaterThanOrEqual;
	public $Telefone_LessThan;
	public $Telefone_LessThanOrEqual;
	public $Telefone_In;
	public $Telefone_IsNotEmpty;
	public $Telefone_IsEmpty;
	public $Telefone_BitwiseOr;
	public $Telefone_BitwiseAnd;
	public $Celular_Equals;
	public $Celular_NotEquals;
	public $Celular_IsLike;
	public $Celular_IsNotLike;
	public $Celular_BeginsWith;
	public $Celular_EndsWith;
	public $Celular_GreaterThan;
	public $Celular_GreaterThanOrEqual;
	public $Celular_LessThan;
	public $Celular_LessThanOrEqual;
	public $Celular_In;
	public $Celular_IsNotEmpty;
	public $Celular_IsEmpty;
	public $Celular_BitwiseOr;
	public $Celular_BitwiseAnd;
	public $Cnh_Equals;
	public $Cnh_NotEquals;
	public $Cnh_IsLike;
	public $Cnh_IsNotLike;
	public $Cnh_BeginsWith;
	public $Cnh_EndsWith;
	public $Cnh_GreaterThan;
	public $Cnh_GreaterThanOrEqual;
	public $Cnh_LessThan;
	public $Cnh_LessThanOrEqual;
	public $Cnh_In;
	public $Cnh_IsNotEmpty;
	public $Cnh_IsEmpty;
	public $Cnh_BitwiseOr;
	public $Cnh_BitwiseAnd;
	public $Cpf_Equals;
	public $Cpf_NotEquals;
	public $Cpf_IsLike;
	public $Cpf_IsNotLike;
	public $Cpf_BeginsWith;
	public $Cpf_EndsWith;
	public $Cpf_GreaterThan;
	public $Cpf_GreaterThanOrEqual;
	public $Cpf_LessThan;
	public $Cpf_LessThanOrEqual;
	public $Cpf_In;
	public $Cpf_IsNotEmpty;
	public $Cpf_IsEmpty;
	public $Cpf_BitwiseOr;
	public $Cpf_BitwiseAnd;
	public $Endereco_Equals;
	public $Endereco_NotEquals;
	public $Endereco_IsLike;
	public $Endereco_IsNotLike;
	public $Endereco_BeginsWith;
	public $Endereco_EndsWith;
	public $Endereco_GreaterThan;
	public $Endereco_GreaterThanOrEqual;
	public $Endereco_LessThan;
	public $Endereco_LessThanOrEqual;
	public $Endereco_In;
	public $Endereco_IsNotEmpty;
	public $Endereco_IsEmpty;
	public $Endereco_BitwiseOr;
	public $Endereco_BitwiseAnd;
	public $Bairro_Equals;
	public $Bairro_NotEquals;
	public $Bairro_IsLike;
	public $Bairro_IsNotLike;
	public $Bairro_BeginsWith;
	public $Bairro_EndsWith;
	public $Bairro_GreaterThan;
	public $Bairro_GreaterThanOrEqual;
	public $Bairro_LessThan;
	public $Bairro_LessThanOrEqual;
	public $Bairro_In;
	public $Bairro_IsNotEmpty;
	public $Bairro_IsEmpty;
	public $Bairro_BitwiseOr;
	public $Bairro_BitwiseAnd;
	public $Cep_Equals;
	public $Cep_NotEquals;
	public $Cep_IsLike;
	public $Cep_IsNotLike;
	public $Cep_BeginsWith;
	public $Cep_EndsWith;
	public $Cep_GreaterThan;
	public $Cep_GreaterThanOrEqual;
	public $Cep_LessThan;
	public $Cep_LessThanOrEqual;
	public $Cep_In;
	public $Cep_IsNotEmpty;
	public $Cep_IsEmpty;
	public $Cep_BitwiseOr;
	public $Cep_BitwiseAnd;
	public $Cidade_Equals;
	public $Cidade_NotEquals;
	public $Cidade_IsLike;
	public $Cidade_IsNotLike;
	public $Cidade_BeginsWith;
	public $Cidade_EndsWith;
	public $Cidade_GreaterThan;
	public $Cidade_GreaterThanOrEqual;
	public $Cidade_LessThan;
	public $Cidade_LessThanOrEqual;
	public $Cidade_In;
	public $Cidade_IsNotEmpty;
	public $Cidade_IsEmpty;
	public $Cidade_BitwiseOr;
	public $Cidade_BitwiseAnd;
	public $EstadoUf_Equals;
	public $EstadoUf_NotEquals;
	public $EstadoUf_IsLike;
	public $EstadoUf_IsNotLike;
	public $EstadoUf_BeginsWith;
	public $EstadoUf_EndsWith;
	public $EstadoUf_GreaterThan;
	public $EstadoUf_GreaterThanOrEqual;
	public $EstadoUf_LessThan;
	public $EstadoUf_LessThanOrEqual;
	public $EstadoUf_In;
	public $EstadoUf_IsNotEmpty;
	public $EstadoUf_IsEmpty;
	public $EstadoUf_BitwiseOr;
	public $EstadoUf_BitwiseAnd;

}

?>