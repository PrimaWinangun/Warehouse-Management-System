<div class = "oneTwo">
	<div class="widget">
	<?php 
	if (isset($data_btb))
			{
				foreach ($data_btb as $row)
				{
					$id = $row['id_btb'];
					$al = $row['btb_airline'];
					$ag = $row['btb_agent'];
					$dst= $row['btb_tujuan'];
					$dt = mdate('%d-%m-%Y', strtotime($row['btb_date']));
					$nm = $row['btb_nomor'];
					$smu= $row['smu_nomor'];
				}
				 echo '<div class="title"><img src="'.base_url().'images/icons/dark/pencil.png" alt="" class="titleIcon" /><h6> Edit Data BTB No. '.$nm.' </h6></div>';
			} else {
				$al = '';
				$ag = '';
				$dst= '';
				$dt = mdate('%d-%m-%Y',time());
				$nm = '';
				$smu= '';
				echo '<div class="title"><img src="'.base_url().'images/icons/dark/pencil.png" alt="" class="titleIcon" /><h6> Input Data BTB</h6></div>';
			}
	?>
           
			<?php 
			if (isset($data_btb))
			{
				$attributes = array('class'=>'form','id'=>'wizard3');
				echo form_open('btb/edit_data_btb/'.$id, $attributes);
				echo form_hidden('btb_nomor', $nm);
			} else {
				$attributes = array('class'=>'form','id'=>'wizard3');
				echo form_open('btb/insert_data_btb/', $attributes);
			}	?>
                <fieldset class="step" id="w2first">
                    <h1></h1>
					<div class="formRow">
                        <label>Airline:</label>
                        <div class="formRight">
						<?php 
						$airline = array();
						foreach ($airline_list as $row_airline_list) :
						{
							$airline[$row_airline_list['wms_airline_code']] = ($row_airline_list['wms_airline_name']);
						} endforeach; 
						echo form_dropdown('airline',$airline,$al);?>
						</div>
                        <div class="clear"></div>
                    </div>
					<div class="formRow">
                        <label>Agent:</label>
                        <div class="formRight">
						<?php 
						$agent = array();
						foreach ($agent_list as $row_agent_list) :
						{
							$agent[$row_agent_list['wms_agent']] = ($row_agent_list['wms_agent']);
						} endforeach; 
						echo form_dropdown('agent',$agent,$ag);?>
						</div>
                        <div class="clear"></div>
                    </div>
					 <div class="formRow">
                        <label>Tujuan:</label>
                        <div class="formRight">
						<?php
						$destination = array();
						foreach ($destination_list as $row_destination_list) :
						{
							$destination[$row_destination_list['wms_dest_code']] = ($row_destination_list['wms_dest_name']);
						} endforeach; 
						echo form_dropdown('destination',$destination,$dst);?>
						</div>
                        <div class="clear"></div>
                    </div>
					<div class="formRow">
                        <label>No. SMU:</label>
                        <div class="formRight">
						<?php 
						$ap = array(
							'name' => 'smu_ap',
							'id'   => 'smu_ap',
							'maxlength' => '3',
							'value'=> substr($smu,0,3),
							'style'=> 'width:10%'
						);
						echo form_input($ap);echo '<b> - </b>';
						$sn = array(
							'name' => 'smu_sn',
							'id'   => 'smu_sn',
							'maxlength' => '7',
							'value'=> substr($smu,3,7),
							'style'=> 'width:40%'
						);
						echo form_input($sn);echo '<b> - </b>';
						$cd = array(
							'name' => 'smu_cd',
							'id'   => 'smu_cd',
							'maxlength' => '1',
							'value'=> substr($smu,10,1),
							'style'=> 'width:5%'
						);
						echo form_input($cd);?></div>
                        <div class="clear"></div>
                    </div>
					<div class="formRow">
                        <label>Tanggal:</label>
                        <div class="formRight">
						<?php 
						$date = array(
							'name' => 'date',
							'id'   => 'date',
							'style'=> 'width:20%',
							'readonly'=> 'yes'
						);
						echo form_input($date, $dt);
						?></div>
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