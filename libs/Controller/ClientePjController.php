<?php
/** @package    SISTEMA_IGCAR::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/ClientePj.php");

/**
 * ClientePjController is the controller class for the ClientePj object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package SISTEMA_IGCAR::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class ClientePjController extends AppBaseController
{

	/**
	 * Override here for any controller-specific functionality
	 *
	 * @inheritdocs
	 */
	protected function Init()
	{
		parent::Init();

		// TODO: add controller-wide bootstrap code
		
		// TODO: if authentiation is required for this entire controller, for example:
		// $this->RequirePermission(ExampleUser::$PERMISSION_USER,'SecureExample.LoginForm');
	}

	/**
	 * Displays a list view of ClientePj objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for ClientePj records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new ClientePjCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('Id,NomeCompleto,Email,Telefone,Celular,Cnh,Cpf,Endereco,Bairro,Cep,Cidade,EstadoUf'
				, '%'.$filter.'%')
			);

			// TODO: this is generic query filtering based only on criteria properties
			foreach (array_keys($_REQUEST) as $prop)
			{
				$prop_normal = ucfirst($prop);
				$prop_equals = $prop_normal.'_Equals';

				if (property_exists($criteria, $prop_normal))
				{
					$criteria->$prop_normal = RequestUtil::Get($prop);
				}
				elseif (property_exists($criteria, $prop_equals))
				{
					// this is a convenience so that the _Equals suffix is not needed
					$criteria->$prop_equals = RequestUtil::Get($prop);
				}
			}

			$output = new stdClass();

			// if a sort order was specified then specify in the criteria
 			$output->orderBy = RequestUtil::Get('orderBy');
 			$output->orderDesc = RequestUtil::Get('orderDesc') != '';
 			if ($output->orderBy) $criteria->SetOrder($output->orderBy, $output->orderDesc);

			$page = RequestUtil::Get('page');

			if ($page != '')
			{
				// if page is specified, use this instead (at the expense of one extra count query)
				$pagesize = $this->GetDefaultPageSize();

				$clientepjs = $this->Phreezer->Query('ClientePj',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $clientepjs->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $clientepjs->TotalResults;
				$output->totalPages = $clientepjs->TotalPages;
				$output->pageSize = $clientepjs->PageSize;
				$output->currentPage = $clientepjs->CurrentPage;
			}
			else
			{
				// return all results
				$clientepjs = $this->Phreezer->Query('ClientePj',$criteria);
				$output->rows = $clientepjs->ToObjectArray(true, $this->SimpleObjectParams());
				$output->totalResults = count($output->rows);
				$output->totalPages = 1;
				$output->pageSize = $output->totalResults;
				$output->currentPage = 1;
			}


			$this->RenderJSON($output, $this->JSONPCallback());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method retrieves a single ClientePj record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('id');
			$clientepj = $this->Phreezer->Get('ClientePj',$pk);
			$this->RenderJSON($clientepj, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new ClientePj record and render response as JSON
	 */
	public function Create()
	{
		try
		{
						
			$json = json_decode(RequestUtil::GetBody());

			if (!$json)
			{
				throw new Exception('The request body does not contain valid JSON');
			}

			$clientepj = new ClientePj($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $clientepj->Id = $this->SafeGetVal($json, 'id');

			$clientepj->NomeCompleto = $this->SafeGetVal($json, 'nomeCompleto');
			$clientepj->Email = $this->SafeGetVal($json, 'email');
			$clientepj->Telefone = $this->SafeGetVal($json, 'telefone');
			$clientepj->Celular = $this->SafeGetVal($json, 'celular');
			$clientepj->Cnh = $this->SafeGetVal($json, 'cnh');
			$clientepj->Cpf = $this->SafeGetVal($json, 'cpf');
			$clientepj->Endereco = $this->SafeGetVal($json, 'endereco');
			$clientepj->Bairro = $this->SafeGetVal($json, 'bairro');
			$clientepj->Cep = $this->SafeGetVal($json, 'cep');
			$clientepj->Cidade = $this->SafeGetVal($json, 'cidade');
			$clientepj->EstadoUf = $this->SafeGetVal($json, 'estadoUf');

			$clientepj->Validate();
			$errors = $clientepj->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$clientepj->Save();
				$this->RenderJSON($clientepj, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing ClientePj record and render response as JSON
	 */
	public function Update()
	{
		try
		{
						
			$json = json_decode(RequestUtil::GetBody());

			if (!$json)
			{
				throw new Exception('The request body does not contain valid JSON');
			}

			$pk = $this->GetRouter()->GetUrlParam('id');
			$clientepj = $this->Phreezer->Get('ClientePj',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $clientepj->Id = $this->SafeGetVal($json, 'id', $clientepj->Id);

			$clientepj->NomeCompleto = $this->SafeGetVal($json, 'nomeCompleto', $clientepj->NomeCompleto);
			$clientepj->Email = $this->SafeGetVal($json, 'email', $clientepj->Email);
			$clientepj->Telefone = $this->SafeGetVal($json, 'telefone', $clientepj->Telefone);
			$clientepj->Celular = $this->SafeGetVal($json, 'celular', $clientepj->Celular);
			$clientepj->Cnh = $this->SafeGetVal($json, 'cnh', $clientepj->Cnh);
			$clientepj->Cpf = $this->SafeGetVal($json, 'cpf', $clientepj->Cpf);
			$clientepj->Endereco = $this->SafeGetVal($json, 'endereco', $clientepj->Endereco);
			$clientepj->Bairro = $this->SafeGetVal($json, 'bairro', $clientepj->Bairro);
			$clientepj->Cep = $this->SafeGetVal($json, 'cep', $clientepj->Cep);
			$clientepj->Cidade = $this->SafeGetVal($json, 'cidade', $clientepj->Cidade);
			$clientepj->EstadoUf = $this->SafeGetVal($json, 'estadoUf', $clientepj->EstadoUf);

			$clientepj->Validate();
			$errors = $clientepj->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$clientepj->Save();
				$this->RenderJSON($clientepj, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing ClientePj record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('id');
			$clientepj = $this->Phreezer->Get('ClientePj',$pk);

			$clientepj->Delete();

			$output = new stdClass();

			$this->RenderJSON($output, $this->JSONPCallback());

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}
}

?>
