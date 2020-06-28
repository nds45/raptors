<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_setting extends CI_Model

{

	

/*======================================================================================

								user list

=======================================================================================*/	

	

	function get_client($data)

	{		

		$this->db->select("*",false);			

		

		//Set limit

		if($data['start'] != '')

			$this->db->limit($data['no_of_rec'], $data['start']);

		

		if($data['sSearch'] != '')

		{

			$this->db->like('name', $data['sSearch'] , 'both');	

		}

					

		if($data['sSortDir_0'] != '')

		{

			if($data['iSortCol_0'] == 1)

			{

				if($data['sSortDir_0'] == 'asc')

					$this->db->order_by('name', 'asc');

				else

					$this->db->order_by('name', 'desc');

			}

		}

												

		$this->db->order_by('id', 'desc');

		$this->db->from('p_register');

		

		return $qry = $this->db->get();

	}


	

}

?>