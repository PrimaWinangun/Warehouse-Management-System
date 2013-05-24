<div class = "oneThree">
	<div class="widget">
            <div class="title"><img src="<?php echo base_url()?>images/icons/dark/pencil.png" alt="" class="titleIcon" /><h6>BTB History</h6></div>
			<?php 
			$attributes = array('class'=>'form','id'=>'wizard3');
			echo form_open('btb/search_btb/', $attributes);?>
                <fieldset class="step" id="w2first">
                    <h1></h1>
					<div class="formRow">
                        <label>Tanggal BTB:</label>
                        <div class="formRight">
						<?php 
						$tgl = array(
							'name' => 'tgl_btb',
							'id'   => 'tgl_btb',
							'style'=> 'width:50%',
							'class'=> 'maskDate',
							'value'=> mdate('%d-%m-%Y',strtotime($time))
						);
						echo form_input($tgl); echo '<h7>&nbsp dd/mm/YYYY</h7>';
						?>
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
	 <div class="title"><img src="<?php echo base_url()?>images/icons/dark/pencil.png" alt="" class="titleIcon" /><h6>BTB tanggal <?php echo mdate('%d-%m-%Y', strtotime($time));?></h6></div>
	<table cellpadding="0" cellspacing="0" width="100%" class="sTable">
        <tfoot>
			<tr><td colspan=9><div class="pagination"><?php echo $this->pagination->create_links();?></div></td></tr>
		</tfoot>
		<thead>
			<tr>
				<td>No</td>
				<td>No. BTB</td>
				<td>No. SMU</td>
				<td>Tujuan</td>
				<td>Bayar</td>
				<td>Action</td>
			</tr>
		</thead>
		<tbody>
		<?php 
		if ($btb_list != NULL)
		{
			if (($this->uri->segment(2) == 'list_btb') && ($this->uri->segment(3) == NULL))
			{
				$num = 1;
			}
			elseif (($this->uri->segment(2) == 'search_btb') && ($this->uri->segment(4) == NULL))
			{
				$num = 1;
			}
			elseif (($this->uri->segment(2) == 'list_btb') && ($this->uri->segment(3) != NULL))
			{
				$num = $this->uri->segment(3)+1;
			}
			elseif ((($this->uri->segment(2) == 'search_btb') && ($this->uri->segment(4) != NULL)))
			{
				$num = $this->uri->segment(4)+1;
			}
		foreach ($btb_list as $row_btb)
		{
			if($row_btb['btb_status'] == 'OUT PENDING')
			{
				$status = 'Belum Bayar';
			}else{
				$status = 'Sudah Bayar';
			}?>
			<tr>
				<td><center><?php echo $num++; ?></td>
				<td><center><?php echo $row_btb['btb_nomor']?></td>
				<td><center><?php echo $row_btb['smu_nomor']?></td>
				<td><center><?php echo $row_btb['btb_tujuan']?></td>
				<td><center><?php echo $status?></td>
				<td>
					<?php
					#edit btb
					echo anchor('btb/edit_btb/'.$row_btb['id_btb'], 'edit btb');
					?>
				</td>
            </tr> 
		<?php 
		}
		}?>
        </tbody>
    </table>
	<div id="clear"></div>
	</div>
</div>