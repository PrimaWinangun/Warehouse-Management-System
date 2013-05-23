<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <?php $this->load->view('template/head') ?>

<body>

<!-- Left side content -->
<div id="leftSide">
    <div class="logo"><a href=""><img src="<?php echo base_url()?>images/logo.png" alt="" /></a></div>
    
    <div class="sidebarSep mt0"></div>
    
    <!-- Search widget 
    <form action="" class="sidebarSearch">
        <input type="text" name="search" placeholder="search..." id="ac" />
        <input type="submit" value="" />
    </form> 
    
    <div class="sidebarSep"></div>

    <!-- General balance widget 
    <div class="genBalance">
        <a href="#" title="" class="amount">
            <span>General balance:</span>
            <span class="balanceAmount">$10,900.36</span>
        </a>
        <a href="#" title="" class="amChanges">
            <strong class="sPositive">+0.6%</strong>
        </a>
    </div> 
    
    <!-- Next update progress widget 
    <div class="nextUpdate">
        <ul>
            <li>Next update in:</li>
            <li>23 hrs 14 min</li>
        </ul>
        <div class="pWrapper"><div class="progressG" title="78%"></div></div>
    </div> 
    
    <div class="sidebarSep"></div> -->
    
    <?php $this->load->view('template/navigation') ?>


<!-- Right side -->
<div id="rightSide">
	<!-- Top fixed navigation -->
    <?php $this->load->view('template/fixed_nav') ?>
    
    <!-- Title area -->
    <?php $this->load->view('template/title_area'); ?>
    
    <div class="line"></div>
    
    <!-- Page statistics and control buttons area
    <?php $this->load->view('template/statistic'); ?>  
    
    <div class="line"></div> -->
    
    <!-- Main content wrapper -->
    <div class="wrapper">
    
		<?php 
		if ($page == 'input btb')
		{
			$this->load->view('btb/page/input_btb');
		}
		elseif ($page == 'input data barang')
		{
			$this->load->view('btb/page/input_data_barang');
		}
		elseif ($page == 'daftar data btb')
		{
			$this->load->view('btb/page/daftar_btb');
		}?>
	</div>
    
    <!-- Footer line -->
    <div id="footer">
        <div class="wrapper"></div>
    </div>

</div>

<div class="clear"></div>

</body>
</html>