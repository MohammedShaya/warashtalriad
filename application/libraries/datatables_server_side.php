<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatables_server_side {

	/**
	 * Database table
	 *
	 * @var	string
	 */
	private $table;

	/**
	 * Primary key
	 *
	 * @var	string
	 */
	private $primary_key;

	/**
	 * Columns to fetch
	 *
	 * @var	array
	 */
	private $columns;
	private $custom_select;
	private $detailes_select;
	private $custom_select_status;

	/**
	 * Where clause
	 *
	 * @var	mixed
	 */
	private $where;

	private $edit;

	private $delete;

	private $get_url;

	private $delete_url;

	/**
	 * CI Singleton
	 *
	 * @var	object
	 */
	private $CI;

	/**
	 * GET request
	 *
	 * @var	array
	 */
	private $request;

	// --------------------------------------------------------------------

	/**
	 * Constructor
	 *
	 * @param	array	$params	Initialization parameters
	 * @return	void
	 */
	public function __construct($params)
	{
		$this->table = (array_key_exists('table', $params) === TRUE && is_string($params['table']) === TRUE) ? $params['table'] : '';
		$this->custom_select = (array_key_exists('custom_select', $params) === TRUE && is_string($params['custom_select']) === TRUE) ? $params['custom_select'] : '';
		$this->detailes_select = (array_key_exists('detailes_select', $params) === TRUE && is_string($params['detailes_select']) === TRUE) ? $params['detailes_select'] : '';
		$this->custom_select_status = (array_key_exists('custom_select_status', $params) === TRUE && is_string($params['custom_select_status']) === TRUE) ? $params['custom_select_status'] : FALSE;
		$this->edit = (array_key_exists('edit', $params) === TRUE && is_string($params['edit']) === TRUE) ? $params['edit'] : '';
		$this->delete = (array_key_exists('delete', $params) === TRUE && is_string($params['delete']) === TRUE) ? $params['delete'] : '';
		$this->get_url = (array_key_exists('get_url', $params) === TRUE && is_string($params['get_url']) === TRUE) ? $params['get_url'] : '';
		$this->delete_url = (array_key_exists('delete_url', $params) === TRUE && is_string($params['delete_url']) === TRUE) ? $params['delete_url'] : '';
		
		$this->primary_key = (array_key_exists('primary_key', $params) === TRUE && is_string($params['primary_key']) === TRUE) ? $params['primary_key'] : '';
		
		$this->columns = (array_key_exists('columns', $params) === TRUE && is_array($params['columns']) === TRUE) ? $params['columns'] : [];

		$this->where = (array_key_exists('where', $params) === TRUE && (is_array($params['where']) === TRUE || is_string($params['where']) === TRUE)) ? $params['where'] : [];
		
		$this->CI =& get_instance();

		$this->request = $this->CI->input->get();

		$this->validate_table();

		$this->validate_primary_key();

		$this->validate_columns();

		$this->validate_request();
	}

	// --------------------------------------------------------------------

	/**
	 * Validate database table
	 *
	 * @return	void
	 */
	private function validate_table()
	{
		if ($this->CI->db->table_exists($this->table) === FALSE)
		{
			$this->response(array(
				'error' => 'Table doesn\'t exist.'
			));
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Validate primary key
	 *
	 * @return	void
	 */
	private function validate_primary_key()
	{
		if ($this->CI->db->field_exists($this->primary_key, $this->table) === FALSE)
		{
			$this->response(array(
				'error' => 'Invalid primary key.'
			));
		}
	}

	// --------------------------------------------------------------------

	/**
	 * validate columns to fetch
	 *
	 * @return	void
	 */
	private function validate_columns()
	{
		foreach ($this->columns as $column)
		{
			if(($column!='action' )&&( $column!='image')&&($column!='detailes')){
			if (is_string($column) === FALSE || $this->CI->db->field_exists($column, $this->table) === FALSE)
			{
				$this->response(array(
					'error' => 'Invalid column.'
				));
			}
		}
	}
	}

	// --------------------------------------------------------------------

	/**
	 * validate GET request
	 *
	 * @return	void
	 */
	private function validate_request()
	{
		if (count($this->request['columns']) !== count($this->columns))
		{
			$this->response(array(
				'error' => 'Column count mismatch.'
			));
		}

		foreach ($this->request['columns'] as $column)
		{
			if (isset($this->columns[$column['data']]) === FALSE )
			{
				$this->response(array(
					'error' => 'Missing column.'
				));
			}

			$this->request['columns'][$column['data']]['name'] = $this->columns[$column['data']];
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Generates the ORDER BY portion of the query
	 *
	 * @return	CI_DB_query_builder
	 */
	private function order()
	{
		// foreach ($this->request['order'] as $order)
		// {

		// 	$column = $this->request['columns'][$order['column']];

		// 	if ($column['orderable'] === 'true')
		// 	{
		// 		$this->CI->db->order_by($column['name'], strtoupper($order['dir']));
		// 	}
		// }
	}

	// --------------------------------------------------------------------

	/**
	 * Generates the LIKE portion of the query
	 *
	 * @return	CI_DB_query_builder
	 */
	private function search()
	{
		$global_search_value = $this->request['search']['value'];
		$likes = [];

		foreach ($this->request['columns'] as $column)
		{
			if ($column['searchable'] === 'true')
			{
				if (empty($global_search_value) === FALSE)
				{
					$likes[] = array(
						'field' => $column['name'],
						'match' => $global_search_value
					);
				}

				if (empty($column['search']['value']) === FALSE)
				{
					$likes[] = array(
						'field' => $column['name'],
						'match' => $column['search']['value']
					);
				}
			}
		}

		foreach ($likes as $index => $like)
		{

			if ($index === 0)
			{
				$this->CI->db->like($like['field'], $like['match']);
			}
			else
			{
				$this->CI->db->or_like($like['field'], $like['match']);
			}
		}
	}
	
	// --------------------------------------------------------------------

	/**
	 * Generates the WHERE portion of the query
	 *
	 * @return	CI_DB_query_builder
	 */
	private function where()
	{
		$this->CI->db->where($this->where);
	}

	// --------------------------------------------------------------------

	/**
	 * Send response to DataTables
	 *
	 * @param	array	$data
	 * @return	void
	 */
	private function response($data)
	{
		$this->CI->output->set_content_type('application/json');
        $this->CI->output->set_output(json_encode($data));
        $this->CI->output->_display();

        exit;
	}

	// --------------------------------------------------------------------

	/**
	 * Calculate total number of records
	 *
	 * @return	int
	 */
	private function records_total()
	{
		$this->CI->db->reset_query();

		$this->where();

		$this->CI->db->from($this->table);

		return $this->CI->db->count_all_results();
	}

	// --------------------------------------------------------------------

	/**
	 * Calculate filtered records
	 *
	 * @return	int
	 */
	private function records_filtered()
	{
		$this->CI->db->reset_query();

		$this->search();

		$this->where();

		$this->CI->db->from($this->table);

		return $this->CI->db->count_all_results();
	}

	// --------------------------------------------------------------------

	/**
	 * Process
	 *
	 * @param	string	$row_id = 'data'
	 * @param	string	$row_class = ''
	 * @return	void
	 */
	public function process($row_id = 'data', $row_class = '')
	{
		if (in_array($row_id, array('id', 'data', 'none'), TRUE) === FALSE)
		{
			$this->response(array(
				'error' => 'Invalid DT_RowId.'
			));
		}

		if (is_string($row_class) === FALSE)
		{
			$this->response(array(
				'error' => 'Invalid DT_RowClass.'
			));
		}

		$columns = array();

		$add_primary_key = TRUE;

		foreach ($this->columns as $column)
		{
			if ($column!='action'&&$column!='image'){
			$columns[] = $column;

			if ($column === $this->primary_key)
			{
				$add_primary_key = FALSE;
			}
		}
	}
		$columns[]=' ';

		if ($add_primary_key === TRUE)
		{
			$columns[] = $this->primary_key;
		}
		if ($this->custom_select_status) {
			
		$this->CI->db->select($this->custom_select);
		}
		else{

		$this->CI->db->select(implode(',', $columns));
		}

		$this->order();

		$this->search();

		$this->where();
		if ($this->custom_select_status) {
			
		$query =  $this->CI->db->query($this->custom_select.' limit '.$this->request['length']);
        // return $query->result();
		}
		else{

		$query = $this->CI->db->get($this->table, $this->request['length'], $this->request['start']);
		}

		$data['data'] = array();

		foreach ($query->result_array() as $key=>$row)
		{
			$r = [];

			foreach ($this->columns as $column)
			{
				if ($column=='action'){
					$x='';
					if ($this->edit) {
				$x.= '<a data-url="'.$this->get_url.'" data-id="'.$row[$this->primary_key].'" class="btn btn-default btn-xs pull-left edit_record"  data-toggle="tooltip" title= "تعديل"">
                            <i class="fa fa-edit"></i>
                            </a>';
                        }
                          if ($this->delete) {
                 $x.=' <a data-url="'.$this->delete_url.'" data-id="'.$row[$this->primary_key].'" class="btn pull-left btn-default btn-xs delete_record"  data-toggle="tooltip" title="حذف"  >
                           <i class="fa fa-remove"></i>
                           </a>';
                       }
                $r[]=$x;
				}
				else if($column=='id'){
					$r[] = $key+1;
				}else if($column=='is_siderbar' ||$column=='is_active'){
					if ($row[$column]=='on') {
						# code...
					$r[] = '<span class="label label-success" >نعم</span>';
					}else{
					$r[] = '<span class="label label-danger" >لا</span>';

					}
				}
				else if($column=='image'){

				$r[] = '<img width="100px" src="'.base_url() .'images/'.$row[$column].'" class="topuser-image" alt=""/> ';
				}else if($column=='icon'){

				$r[] = '<i class="'.$row[$column].'></i> ';
				}
				else if($column=='detailes'){
					$query =  $this->CI->db->query($this->detailes_select,[$row['id']]);
        			$query=$query->result();
        			$span='';
        			foreach ($query as $key => $value) {
        				$span.=' - '.$value->point.' . <br>';
        			}
				$r[] = $span;
				}
				else{

				$r[] = $row[$column];
				}
			}
			

			if ($row_id === 'id')
			{
				$r['DT_RowId'] = $row[$this->primary_key];
			}

			if ($row_id === 'data')
			{
				$r['DT_RowData'] = array(
					'id' => $row[$this->primary_key]
				);
			}

			if ($row_class !== '')
			{
				$r['DT_RowClass'] = $row_class;
			}

			$data['data'][] = $r;
		}

		$data['draw'] = intval($this->request['draw']);

		$data['recordsTotal'] = $this->records_total();

		$data['recordsFiltered'] = $this->records_filtered();

		$this->response($data);
	}
}