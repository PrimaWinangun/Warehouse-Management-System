<div class = "oneTwo">
	<div class="widget">
            <div class="title"><img src="<?php echo base_url()?>images/icons/dark/pencil.png" alt="" class="titleIcon" /><h6>Input Data BTB</h6></div>
			<?php 
			$attributes = array('class'=>'form','id'=>'wizard3');
			echo form_open('btb/insert_data_btb/', $attributes) ?>
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
						echo form_dropdown('airline',$airline,'');?>
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
						echo form_dropdown('agent',$agent,'');?>
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
						echo form_dropdown('destination',$destination,'');?>
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
							'style'=> 'width:10%'
						);
						echo form_input($ap);echo '<b> - </b>';
						$sn = array(
							'name' => 'smu_sn',
							'id'   => 'smu_sn',
							'maxlength' => '7',
							'style'=> 'width:40%'
						);
						echo form_input($sn);echo '<b> - </b>';
						$cd = array(
							'name' => 'smu_cd',
							'id'   => 'smu_cd',
							'maxlength' => '1',
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
						echo form_input($date,mdate('%d-%m-%Y',time()));
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