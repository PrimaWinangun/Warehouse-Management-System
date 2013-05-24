<div class = "oneThree">
	<div class="widget">
            <div class="title"><img src="<?php echo base_url()?>images/icons/dark/pencil.png" alt="" class="titleIcon" /><h6>BTB No. <?php echo $btb_number;?></h6></div>
			<?php 
			$attributes = array('class'=>'form','id'=>'wizard3');
			echo form_open('btb/insert_data_barang/', $attributes);
			echo form_hidden('btb', $btb_number);
			if ($this->uri->segment(2) == 'detail_btb')
			{
				foreach ($data_barang as $row_barang)
				{
					$nomor_smu = $row_barang['smu_nomor'];
				}
				echo form_hidden('smu', $nomor_smu);
			} else {
				echo form_hidden('smu', $this->uri->segment(3));
			}?>
                <fieldset class="step" id="w2first">
                    <h1></h1>
					<div class="formRow">
                        <label>Jenis Barang:</label>
                        <div class="formRight">
						<?php 
						$jb = array();
						foreach ($jenis_barang as $row_jb_list) :
						{
							$jb[$row_jb_list['wms_tipe_barang_nama']] = ($row_jb_list['wms_tipe_barang_nama']);
						} endforeach; 
						echo form_dropdown('jenis_barang',$jb,'');
						?>
						</div>
                        <div class="clear"></div>
                    </div>
					<div class="formRow">
                        <label>Kat. Barang:</label>
                        <div class="formRight">
						<?php 
						$kgb = array();
						foreach ($ktg_barang as $row_kgb_list) :
						{
							$kgb[$row_kgb_list['wms_cat_code']] = ($row_kgb_list['wms_cat_name']);
						} endforeach; 
						echo form_dropdown('katagori_barang',$kgb,'');
						?>
						</div>
                        <div class="clear"></div>
                    </div>
					<div class="formRow">
                        <label>Berat Timbang:</label>
                        <div class="formRight">
						<?php 
						$bt = array(
							'name' => 'berat_timbang',
							'id'   => 'berat_timbang',
							'style'=> 'width:50%'
						);
						echo form_input($bt); echo '&nbsp Kg';?>
						</div>
                        <div class="clear"></div>
                    </div>
					<div class="formRow">
                        <label>Jumlah Koli:</label>
                        <div class="formRight">
						<?php 
						$jk = array(
							'name' => 'jum_koli',
							'id'   => 'jum_koli',
							'style'=> 'width:50%'
						);
						echo form_input($jk);?>
						</div>
                        <div class="clear"></div>
                    </div>
					 <div class="formRow">
                        <label>Panjang:</label>
                        <div class="formRight">
						<?php
						$pj = array(
							'name' => 'panjang',
							'id'   => 'panjang',
							'style'=> 'width:50%'
						);
						echo form_input($pj);echo '&nbsp cm';?>
						</div>
                        <div class="clear"></div>
                    </div>
					<div class="formRow">
                        <label>Lebar:</label>
                        <div class="formRight">
						<?php 
						$lb = array(
							'name' => 'lebar',
							'id'   => 'lebar',
							'style'=> 'width:50%'
						);
						echo form_input($lb);echo '&nbsp cm';?>
						</div>
                        <div class="clear"></div>
                    </div>
					<div class="formRow">
                        <label>Tinggi:</label>
                        <div class="formRight">
						<?php 
						$tg = array(
							'name' => 'tinggi',
							'id'   => 'tinggi',
							'style'=> 'width:50%'
						);
						echo form_input($tg);echo '&nbsp cm';?>
						</div>
                        <div class="clear"></div>
                    </div>
				</fieldset>
				<div class="wizButtons"> 
                    <div class="status" id="status2"></div>
					<span class="wNavButtons">
                        <input class="brownB ml10" id="next2" value="Next" type="submit" />
                    </span>
				</div>
                <div class="clear"></div>
			</form>
			<div class="data" id="w2"></div>
        </div>
</div>
<div class = "twoOne2">
	<div class="widget">
	 <div class="title"><img src="<?php echo base_url()?>images/icons/dark/pencil.png" alt="" class="titleIcon" /><h6>SMU No. <?php 
		if (strlen($this->uri->segment(3)) != 11)
		{
			echo substr($nomor_smu,0,3).'-'.substr($nomor_smu,3,7).'-'.substr($nomor_smu,10,1);
		}else{
			echo substr($this->uri->segment(3),0,3).'-'.substr($this->uri->segment(3),3,7).'-'.substr($this->uri->segment(3),10,1);
		}
	 ?></h6></div>
	<table cellpadding="0" cellspacing="0" width="100%" class="sTable">
        <tfoot>
			<tr><td colspan=9></td></tr>
		</tfoot>
		<thead>
			<tr>
				<td>No</td>
				<td>Panjang</td>
				<td>Lebar</td>
				<td>Tinggi</td>
				<td>Koli</td>
				<td>Berat Timbang</td>
				<td>Berat Volume</td>
				<td>Berat Dibayar</td>
				<td>Action</td>
			</tr>
		</thead>
		<tbody>
		<?php 
		if ($data_barang != NULL)
		{
		$num = 1;
		$total_bayar = 0;
		$total_berat = 0;
		$total_koli = 0;
		$total_volume = 0;
		$v_minus = 0;
		foreach ($data_barang as $row_barang)
		{
			if ($row_barang['smu_volume_minus'] == 'yes')
			{
				$v_minus = $v_minus + 1;
			}
		}
		foreach ($data_barang as $row_barang)
		{ 
			$volume = (int)$row_barang['smu_panjang']*(int)$row_barang['smu_lebar']*(int)$row_barang['smu_tinggi'];
			$voluminus = $volume/6000;
			if (($voluminus > $row_barang['smu_berat_timbang']) or ($v_minus >= 1))
			{
				$bayar = round($voluminus,2);
			}else
			{
				$bayar = $row_barang['smu_berat_timbang'];
			}?>
			<tr>
				<td><center><?php echo $num++; ?></td>
				<td><center><?php echo $row_barang['smu_panjang']?></td>
				<td><center><?php echo $row_barang['smu_lebar']?></td>
				<td><center><?php echo $row_barang['smu_tinggi']?></td>
				<td><center><?php echo $row_barang['smu_jum_koli']?></td>
				<td><center><?php echo $row_barang['smu_berat_timbang']?></td>
				<td><center><?php echo round($voluminus,2)?></td>
				<td><center><?php echo $bayar;?></td>
				<td>Action</td>
            </tr> 
		<?php 
		$total_berat = $total_berat + $row_barang['smu_berat_timbang'];
		$total_koli  = $total_koli + $row_barang['smu_jum_koli'];
		$total_volume  = $total_volume + round($voluminus,2);
		$total_bayar = $total_bayar + $bayar;} ?>
		<tr>
			<td colspan="4"><div align="right"><b>Total : </div></td>
			<td><center><b><?php echo $total_koli. '&nbsp pcs';?></td>
			<td><center><b><?php echo $total_berat. '&nbsp kg';?></td>
			<td><center><b><?php echo $total_volume . '&nbsp pcs';?></td>
			<td><center><b><?php echo $total_bayar;?></td>
			<td></td>
		</tr><?php }?>
        </tbody>
    </table>
	<div id="clear"></div>
	</div>
</div>