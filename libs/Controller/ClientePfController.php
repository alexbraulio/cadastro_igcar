<?php
/** @package    SISTEMA_IGCAR::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/ClientePf.php");

/**
 * ClientePfController is the controller class for the ClientePf object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package SISTEMA_IGCAR::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class ClientePfController extends AppBaseController
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
		//$this->RequirePermission(ExampleUser::$PERMISSION_USER,'SecureExample.LoginForm');
	}

	/**
	 * Displays a list view of ClientePf objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for ClientePf records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new ClientePfCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('Id,RazaoSocial,Email,Telefone,Celular,Cnpj,Endereco,Bairro,Cep,Cidade,EstadoUf'
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

				$clientepfs = $this->Phreezer->Query('ClientePf',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $clientepfs->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $clientepfs->TotalResults;
				$output->totalPages = $clientepfs->TotalPages;
				$output->pageSize = $clientepfs->PageSize;
				$output->currentPage = $clientepfs->CurrentPage;
			}
			else
			{
				// return all results
				$clientepfs = $this->Phreezer->Query('ClientePf',$criteria);
				$output->rows = $clientepfs->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single ClientePf record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('id');
			$clientepf = $this->Phreezer->Get('ClientePf',$pk);
			$this->RenderJSON($clientepf, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new ClientePf record and render response as JSON
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

			$clientepf = new ClientePf($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $clientepf->Id = $this->SafeGetVal($json, 'id');

			$clientepf->RazaoSocial = $this->SafeGetVal($json, 'razaoSocial');
			$clientepf->Email = $this->SafeGetVal($json, 'email');
			$clientepf->Telefone = $this->SafeGetVal($json, 'telefone');
			$clientepf->Celular = $this->SafeGetVal($json, 'celular');
			$clientepf->Cnpj = $this->SafeGetVal($json, 'cnpj');
			$clientepf->Endereco = $this->SafeGetVal($json, 'endereco');
			$clientepf->Bairro = $this->SafeGetVal($json, 'bairro');
			$clientepf->Cep = $this->SafeGetVal($json, 'cep');
			$clientepf->Cidade = $this->SafeGetVal($json, 'cidade');
			$clientepf->EstadoUf = $this->SafeGetVal($json, 'estadoUf');

			$clientepf->Validate();
			$errors = $clientepf->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$clientepf->Save();
				$this->RenderJSON($clientepf, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing ClientePf record and render response as JSON
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
			$clientepf = $this->Phreezer->Get('ClientePf',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $clientepf->Id = $this->SafeGetVal($json, 'id', $clientepf->Id);

			$clientepf->RazaoSocial = $this->SafeGetVal($json, 'razaoSocial', $clientepf->RazaoSocial);
			$clientepf->Email = $this->SafeGetVal($json, 'email', $clientepf->Email);
			$clientepf->Telefone = $this->SafeGetVal($json, 'telefone', $clientepf->Telefone);
			$clientepf->Celular = $this->SafeGetVal($json, 'celular', $clientepf->Celular);
			$clientepf->Cnpj = $this->SafeGetVal($json, 'cnpj', $clientepf->Cnpj);
			$clientepf->Endereco = $this->SafeGetVal($json, 'endereco', $clientepf->Endereco);
			$clientepf->Bairro = $this->SafeGetVal($json, 'bairro', $clientepf->Bairro);
			$clientepf->Cep = $this->SafeGetVal($json, 'cep', $clientepf->Cep);
			$clientepf->Cidade = $this->SafeGetVal($json, 'cidade', $clientepf->Cidade);
			$clientepf->EstadoUf = $this->SafeGetVal($json, 'estadoUf', $clientepf->EstadoUf);

			$clientepf->Validate();
			$errors = $clientepf->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$clientepf->Save();
				$this->RenderJSON($clientepf, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing ClientePf record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('id');
			$clientepf = $this->Phreezer->Get('ClientePf',$pk);

			$clientepf->Delete();

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
