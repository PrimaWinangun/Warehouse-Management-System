<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Btb_model extends CI_Model 
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function get_airline_list()
	{
		$airline = $this->db->get('wms_airline_list');
		return $airline->result_array();
	}
	
	function get_agent_list()
	{
		$agent = $this->db->get('wms_agent_list');
		return $agent->result_array();
	}
	
	function get_destination_list()
	{
		$this->db->order_by('wms_dest_name', 'ASC');
		$destination = $this->db->get('wms_destination');
		return $destination->result_array();
	}
	
	function get_jenis_barang()
	{
		$destination = $this->db->get('wms_tipe_barang');
		return $destination->result_array();
	}
	
	function get_katagori_barang()
	{
		$destination = $this->db->get('wms_category_barang');
		return $destination->result_array();
	}
	
	function get_btb_list($date, $num, $offset)
	{
		$query = ("
			SELECT * FROM wms_btb AS btb
			LEFT JOIN (SELECT max(id_smu),smu_btb, smu_nomor FROM wms_smu GROUP BY smu_btb) AS smu ON btb.btb_nomor = smu.smu_btb
			WHERE btb_date = '$date'
			LIMIT $offset , $num
		");
		$btb = $this->db->query($query);
		return $btb->result_array();
	}
	
	function get_data_btb_by_id($btb_id)
	{
		$query = ("
			SELECT * FROM wms_btb AS btb
			LEFT JOIN (SELECT max(id_smu),smu_btb, smu_nomor FROM wms_smu GROUP BY smu_btb) AS smu ON btb.btb_nomor = smu.smu_btb
			WHERE btb.id_btb = '$btb_id'
		");
		$btb = $this->db->query($query);
		return $btb->result_array();
	}
	
	function countBTB($date)
	{
		$this->db->where('btb_date', $date);
		$btb = $this->db->get('wms_btb');
		return $btb->num_rows();
	}
	
	function get_last_btb_number($datesearch)
	{	
		$this->db->select('btb_nomor');
		$this->db->like('btb_nomor', $datesearch, 'AFTER');
		$this->db->order_by('id_btb', 'DESC');
		$this->db->limit(1);
		$last_number = $this->db->get('wms_btb');
		return $last_number->result_array();
	}
	
	function get_data_barang($btb_no)
	{	
		$this->db->where('smu_btb', $btb_no);
		$this->db->order_by('id_smu', 'ASC');
		$last_number = $this->db->get('wms_smu');
		return $last_number->result_array();
	}
	
	function insert_data_btb($new_number)
	{
		$btb_data = array(
			'btb_nomor' => $new_number,
			'btb_airline' => $this->input->post('airline'),
			'btb_agent' => $this->input->post('agent'),
			'btb_tujuan' => $this->input->post('destination'),
			'btb_date' => mdate('%Y-%m-%d',strtotime($this->input->post('date'))),
			'btb_status' => 'OUT PENDING',
			'btb_update_by' => 'admin'
		);
		
		$this->db->insert('wms_btb',$btb_data);
	}
	
	function insert_data_barang($voluminus)
	{
		if ($this->input->post('berat_timbang') < $voluminus)
		{
			$voluminus = 'yes';
		}else
		{
			$voluminus = 'no';
		}
		$data_barang = array(
			'smu_btb' => $this->input->post('btb'),
			'smu_nomor' => $this->input->post('smu'),
			'smu_jenis_barang' => $this->input->post('jenis_barang'),
			'smu_kat_barang' => $this->input->post('katagori_barang'),
			'smu_berat_timbang' => $this->input->post('berat_timbang'),
			'smu_jum_koli' => $this->input->post('jum_koli'),
			'smu_tinggi' => $this->input->post('tinggi'),
			'smu_panjang' => $this->input->post('panjang'),
			'smu_lebar' => $this->input->post('lebar'),
			'smu_volume_minus' => $voluminus,
			'smu_update_by' => 'admin'
		);
		
		$this->db->insert('wms_smu',$data_barang);
	}
	
	function update_data_btb($btb_id)
	{
		$btb_data = array(
			'btb_airline' => $this->input->post('airline'),
			'btb_agent' => $this->input->post('agent'),
			'btb_tujuan' => $this->input->post('destination'),
			'btb_date' => mdate('%Y-%m-%d',strtotime($this->input->post('date'))),
			'btb_update_by' => 'admin'
		);
		$this->db->where('id_btb', $btb_id);
		$this->db->update('wms_btb', $btb_data);
		
		$data_smu = array('smu_nomor' => $this->input->post('smu_ap').$this->input->post('smu_sn').$this->input->post('smu_cd'));
		$this->db->where('smu_btb', $this->input->post('btb_nomor'));
		$this->db->update('wms_smu', $data_smu);
	}
}