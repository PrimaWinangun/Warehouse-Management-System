<!-- Left navigation -->
    <ul id="menu" class="nav">
	<?php if (isset($nav_btb)){$nav_btb = 'current';} else {$nav_btb = '';}?>
        <li class="ui"><?php echo anchor('btb','<span>Bukti Timbang Barang</span>',array('class'=>'exp', 'title'=>'', 'id'=>$nav_btb));?>
		<ul class="sub">
				 <li <?php if(isset($view_input_btb)){ echo $view_input_btb; } ?>><?php echo anchor('btb/', 'Input BTB' ); ?></li>
                <li <?php if(isset($view_daftar_btb)){ echo $view_daftar_btb; } ?>><?php echo anchor('btb/list_btb/', 'Daftar BTB' ); ?></li>
			 </ul>
		</li>
	<?php if (isset($page_diklat)){$page_diklat = 'current';} else {$page_diklat = '';}?>
	<li class="charts"><?php echo anchor('diklat','<span>Diklat</span>', array('class'=>'exp', 'title'=>'', 'id'=>$page_diklat))?>
		<ul class="sub">
                <li <?php if(isset($view_stkp)){ echo $view_stkp; } ?>><?php echo anchor('diklat/get_stkp','Report STKP');?></li>
				<li <?php if(isset($view_nstkp)){ echo $view_nstkp; } ?>><?php echo anchor('diklat/get_non_stkp', 'Report Non STKP' ); ?></li>
				<li <?php if(isset($view_report_bulanan)){ echo $view_report_bulanan; } ?>><?php echo anchor('diklat/report_bulanan', 'Report Bulanan' ); ?></li>
				<li <?php if(isset($view_input_stkp)){ echo $view_input_stkp; } ?>><?php echo anchor('diklat/input_stkp_bulanan/part_one', 'Input Training Bulanan' ); ?></li>
				<li <?php if(isset($view_upload)){ echo $view_upload; } ?>><?php echo anchor('pekerja/upload/', 'Upload File' ); ?></li>
				
            </ul></li>
		<!-- hari libur -->
        <li class="dash"><a href="#" title="" class="exp" <?php if(isset($form_master)){ echo $form_master; } ?>>
        <span>Master</span></a>
            <ul class="sub">
                <li <?php if(isset($view_hari_libur)){ echo $view_hari_libur; } ?>><?php echo anchor('c_absensi/hari_libur', 'Hari Libur' ); ?></li>
                <li <?php if(isset($view_format_schedule)){ echo $view_format_schedule; } ?>><?php echo anchor('c_absensi/format_schedule', 'Format Schedule' ); ?></li>
                <li <?php if(isset($view_cuti_pegawai)){ echo $view_cuti_pegawai; } ?>><?php echo anchor('c_absensi/cuti_pegawai', 'Cuti Pegawai' ); ?></li>
                <li <?php //if(isset($view_master_gaji)){ echo $view_master_gaji; } ?>><?php //echo anchor('c_absensi/master_gaji', 'Master Gaji' ); 
						//echo anchor('gaji/master_gaji', 'Master Gaji' );
				?></li>
				
				<li <?php if(isset($view_master_jabatan)){ echo $view_master_jabatan; } ?>><?php echo anchor('pekerja/add_data_jabatan/part_one', 'Tambah Jabatan' ); ?></li>
				<li <?php if(isset($view_master_lembur)){ echo $view_master_lembur; } ?>><?php echo anchor('gaji/master_lembur', 'Master Lembur' ); ?></li>
            </ul>
        </li>
      <!-- absensi -->
        <li class="files"><a href="#" title="" class="exp" <?php if(isset($form_absensi)){ echo $form_absensi; } ?>>
        <span>ABSENSI</span><strong></strong></a>
            <ul class="sub">
                <li <?php if(isset($view_schedule_pegawai)){ echo $view_schedule_pegawai; } ?>><?php echo anchor('c_absensi/schedule_pegawai', 'SCHEDULE PEGAWAI' ); ?></li>
                <li <?php if(isset($view_cuti)){ echo $view_cuti; } ?>><?php echo anchor('c_absensi/add_pakai_cuti_pegawai', 'PENGGUNAAN CUTI' ); ?></li>
                <li><?php #echo anchor('c_absensi/tarik_absensi', 'TARIK ABSENSI' ); 
						echo anchor('c_absensi/tarik_absensi_x', 'TARIK ABSENSI' ); 
						//echo anchor('#', 'TARIK ABSENSI' ); 
				?></li>
                <li <?php if(isset($view_absensi)){ echo $view_absensi; } ?>><?php echo anchor('c_absensi/absensi', 'ABSENSI' ); ?></li>
            </ul>
        </li>
        
        
      <!-- Gaji -->
        <li class="widgets"><a href="#" title="" class="exp" <?php if(isset($form_gaji)){ echo $form_gaji; } ?>>
        <span>GAJI</span><strong></strong></a>
            <ul class="sub">
                <li <?php if(isset($view_gaji_pegawai)){ echo $view_gaji_pegawai; } ?>><?php echo anchor('gaji/gaji_pegawai', 'GAJI PEGAWAI' ); ?></li>
                <li <?php if(isset($view_lembur_pegawai)){ echo $view_lembur_pegawai; } ?>><?php echo anchor('gaji/lembur_pegawai', 'LEMBUR PEGAWAI' ); ?></li>
            	<li <?php if(isset($view_import)){ echo $view_import; } ?>><?php echo anchor('gaji/import', 'IMPORT FILE' ); ?></li>
           </ul>
			
        </li>
    </ul>
	
</div>