<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Btb extends CI_Controller {

	/**
	 * PT Gapura Angkasa
	 * Warehouse Management System.
	 * ver 2.0.0
	 *
	 * Bukti Timbang Barang Controller controller
	 *
	 * url : http://192.168.1.150/ods/
	 * developer : www.studiokami.com
	 * phone : 0361 853 2400
	 * email : support@studiokami.com
	 */
	
	function __construct()
	{
        parent::__construct();
		
		# restrict all function access after log in
		/*$session_data = $this->session->userdata('logged_in');
		if(! $session_data['ui_app_level'] == 'admin')
        { 
            # non admin redirect to dashboard
			redirect('dashboard');
        } */
		
		# load model, library and helper
		$this->load->model('btb_model','', TRUE);
    }
	 
	public function index()
	{
		# Page Data
		$data['nav_btb'] = 'yes';
		$data['view_input_btb'] = 'class="this"';
		$data['page'] = 'input btb';
		
		# Page Content
		$data['airline_list'] = $this->btb_model->get_airline_list();
		$data['agent_list'] = $this->btb_model->get_agent_list();
		$data['destination_list'] = $this->btb_model->get_destination_list();
		
		# view call
		$this->load->view('btb/index', $data);
	}
	
	function insert_data_btb()
	{
		# Date for btb search
		$date = mdate('%Y%m%d',time());
		
		# Search BTB last number
		$last_number = $this->btb_model->get_last_btb_number($date);
		
		# Generating New Number
		if ($last_number == NULL)
		{
			$new_number = $date.'001';
		}else
		{
			foreach ($last_number as $row)
			{
				$btb_num = substr($row['btb_nomor'],-3,3) + 1;
				$new_number = $date.substr('000',strlen($btb_num),strlen($btb_num)).$btb_num;
			}
		}
		
		# Input into DB
		$this->btb_model->insert_data_btb($new_number);
		
		# Redirect to Input Barang
		redirect('btb/input_barang/'.$this->input->post('smu_ap').$this->input->post('smu_sn').$this->input->post('smu_cd'));
	}
	
	public function input_barang()
	{
		# Date for btb search
		$date = mdate('%Y%m%d',time());
		
		# Page Data
		$data['nav_btb'] = 'yes';
		$data['view_input_btb'] = 'class="this"';
		$data['page'] = 'input data barang';
		
		# Search BTB last number
		$last_number = $this->btb_model->get_last_btb_number($date);
		foreach ($last_number as $row)
			{
				$data['btb_number'] = $row['btb_nomor'];
			}
		
		# Page Content
		$data['jenis_barang'] = $this->btb_model->get_jenis_barang();
		$data['ktg_barang'] = $this->btb_model->get_katagori_barang();
		$data['data_barang'] = $this->btb_model->get_data_barang($data['btb_number']);
		
		# view call
		$this->load->view('btb/index', $data);
	}
	
	function insert_data_barang()
	{
		# Voluminus
		$volume = (int)$this->input->post('tinggi')*(int)$this->input->post('panjang')*(int)$this->input->post('lebar');
		$voluminus = $volume/6000;
				
		# Insert into DB
		$this->btb_model->insert_data_barang($voluminus);
		redirect('btb/input_barang/'.$this->input->post('smu'));
	}
	
	public function list_btb()
	{
		# Date for btb search
		$data['time'] = mdate('%Y-%m-%d',time());
		
		# Page Data
		$data['nav_btb'] = 'yes';
		$data['view_daftar_btb'] = 'class="this"';
		$data['page'] = 'daftar data btb';
		
		# Pagination Config
		$config['base_url'] = base_url().'index.php/btb/list_btb/'; //set the base url for pagination
		$config['total_rows'] = $this->btb_model->countBTB($data['time']); //total rows
		$config['per_page'] = 10; //the number of per page for pagination
		$config['uri_segment'] = 3; //see from base_url. 3 for this case
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		# Page Content
		$data['btb_list'] = $this->btb_model->get_btb_list($data['time'], $config['per_page'], $page);
		
		# view call
		$this->load->view('btb/index', $data);
	}
	
	function search_btb()
	{
		# Date for btb search
		if ($this->input->post('tgl_btb') != NULL)
		{
			$data['time'] = mdate('%Y-%m-%d',strtotime(str_replace('/','-',$this->input->post('tgl_btb'))));
		} else {
			$data['time'] = $this->uri->segment(3);
		}
		
		# Page Data
		$data['nav_btb'] = 'yes';
		$data['view_daftar_btb'] = 'class="this"';
		$data['page'] = 'daftar data btb';
		
		# Pagination Config
		$config['base_url'] = base_url().'index.php/btb/search_btb/'.$data['time']; //set the base url for pagination
		$config['total_rows'] = $this->btb_model->countBTB($data['time']); //total rows
		$config['per_page'] = 10; //the number of per page for pagination
		$config['uri_segment'] = 4; //see from base_url. 3 for this case
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		
		# Page Content
		$data['btb_list'] = $this->btb_model->get_btb_list($data['time'], $config['per_page'], $page);
		
		# view call
		$this->load->view('btb/index', $data);
	}
	
	function edit_btb($btb_id)
	{
		# Page Data
		$data['nav_btb'] = 'yes';
		$data['page'] = 'input btb';
		
		# Page Content
		$data['airline_list'] = $this->btb_model->get_airline_list();
		$data['agent_list'] = $this->btb_model->get_agent_list();
		$data['destination_list'] = $this->btb_model->get_destination_list();
		$data['data_btb'] = $this->btb_model->get_data_btb_by_id($btb_id);
		
		# view call
		$this->load->view('btb/index', $data);
	}
	
	function edit_data_btb($btb_id)
	{
		# Update data to DB
		$this->btb_model->update_data_btb($btb_id);
		
		#Redirecting to List BTB
		redirect('btb/list_btb');
	}
	
	function detail_btb($btb_id)
	{
		# Date for btb search
		$date = mdate('%Y%m%d',time());
		
		# Page Data
		$data['nav_btb'] = 'yes';
		$data['page'] = 'input data barang';
		
		# Search BTB last number
		$last_number = $this->btb_model->get_data_btb_by_id($btb_id);
		foreach ($last_number as $row)
			{
				$data['btb_number'] = $row['btb_nomor'];
			}
		
		# Page Content
		$data['jenis_barang'] = $this->btb_model->get_jenis_barang();
		$data['ktg_barang'] = $this->btb_model->get_katagori_barang();
		$data['data_barang'] = $this->btb_model->get_data_barang($data['btb_number']);
		
		# view call
		$this->load->view('btb/index', $data);
	}
	
	function delete_btb($btb_id)
	{
		# Update data to DB
		$this->btb_model->delete_data_btb($btb_id);
		
		#Redirecting to List BTB
		redirect('btb/list_btb');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */