<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/files/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/files/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/files/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-date-range-picker/0.14.2/daterangepicker.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <script src="<?php echo base_url();?>assets/files/jquery.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url();?>assets/style/style.css">
  <style type="text/css">
    .custom-container{
        height:100%!important;
    }
    html{
        height:100%;
    }
    body{
        min-height:100%;
    }
    #opedit{
        background-color:#4381C1;color:#fff;
    }
    .header {
        margin: 0 auto;
        margin-top: 0px;
        background-color: #92cddc;
        padding: 15px;
        text-align: center;
        color: #fff;
        transition:all 0.3s;
        margin-left:0;
        height:65px;
    }
    .header.active{
        transition:all 0.3s;
        margin-left:220px;
    }
    .header h2{
        font-size: 26px;
        margin: 0;
        text-align:center;
    }
    .header .dropdown button,.header .dropdown button:focus, .header .dropdown.open button{
        background-color: transparent;
        border-color: transparent;
        box-shadow: none!important;
        color: #4381c1;
        font-weight: 600;
    }
    .header .btn-secondary:not(:disabled):not(.disabled).active, .header .btn-secondary:not(:disabled):not(.disabled):active, .header .show>.btn-secondary.dropdown-toggle{
        background-color: transparent;
        border-color: transparent;
        box-shadow: none!important;
        color: #4381c1;
        font-weight: 600;
    }
    .header .dropdown-menu{
        top: 9px!important;
        background-color: #4381c1;
        border-radius: 0;
        border: 1px solid transparent;
    }
    .header .dropdown-menu a{
        background-color: transparent;
    }
    .header .dropdown-menu a{color:#fff;}
    [class*="col-"] >label,[class*="col-"] >div>label {
        font-weight:500;
        font-size: 14px;
        text-align: right;
        width: 100%;
    }
    .footer-sec button{font-size:18px;}
    .footer-sec button[type="reset"],.footer-sec button[type="button"] {background-color:#fff;}
    .footer-sec button[type="submit"],.btn-primary {background-color:#4381C1;color:#fff;border:none;}
    .btn-primary:hover{
        background-color:#4381C1;color:#fff;border:none;
    }
    .footer-sec button,.footer-sec a{
        min-width:100px;
        margin-left: 10px;
    }
    h3{
        text-align: center;
        margin-bottom: 10px;
        font-size: 20px;
    }
    .custom-container{
        width: 100%;
        margin: 0 auto;
        height: 100vh;
        background-color: #daeef3;
    }
    .header ul li{
        display: inline-block;
    }
    /*icon*/
    #nav-icon1{
      width: 39px;
      height: 27px;
      position: relative;
      -webkit-transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      transform: rotate(0deg);
      -webkit-transition: .5s ease-in-out;
      -moz-transition: .5s ease-in-out;
      -o-transition: .5s ease-in-out;
      transition: .5s ease-in-out;
      cursor: pointer;
        margin-left: 20px;
    }
    #nav-icon1 span{
        display: block;
        position: absolute;
        height: 5px;
        width: 100%;
        background: #4381c1;
      border-radius: 9px;
      opacity: 1;
      left: 0;
      -webkit-transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      transform: rotate(0deg);
      -webkit-transition: .25s ease-in-out;
      -moz-transition: .25s ease-in-out;
      -o-transition: .25s ease-in-out;
      transition: .25s ease-in-out;
    }
    #nav-icon1 span:nth-child(1) {
      top: 0px;
    }
    
    #nav-icon1 span:nth-child(2) {
      top: 12px;
    }
    
    #nav-icon1 span:nth-child(3) {
      top: 24px;
    }
    #nav-icon1.open span:nth-child(1) {
      top: 14px;
      -webkit-transform: rotate(135deg);
      -moz-transform: rotate(135deg);
      -o-transform: rotate(135deg);
      transform: rotate(135deg);
    }
    
    #nav-icon1.open span:nth-child(2) {
      opacity: 0;
      left: -60px;
    }
    
    #nav-icon1.open span:nth-child(3) {
      top: 14px;
      -webkit-transform: rotate(-135deg);
      -moz-transform: rotate(-135deg);
      -o-transform: rotate(-135deg);
      transform: rotate(-135deg);
    }
    /*menu ends*/
    /*menu wrapper*/
    .side-bar{
        position:fixed;
        left:0;
        width:220px;
        background-color:#4381c1;
        left:0;
        z-index: 100;
        transition:all 0.3s;
        transform: translateX(-100%);
    }
    .side-bar.active{
        transition:all 0.3s;
        transform: translateX(0%);
    }
    .side-bar ul{
        list-style:none;
        padding:0;
        margin:0;
    }
    .side-bar ul li{
        display:block;
        line-height:40px;
    }
    .side-bar ul li a{
        display:block;
        color:#fff;
        padding: 8px 20px;
        font-size:16px;
    }
    .align-width{
        width:70%;
        margin:0 auto;
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgb(226 249 255);
    }
    div#report-table_wrapper {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
    }
    .dt-buttons {
        width: 50%;
    }
    div#report-table_filter {
        width: 50%;
        margin-left: auto;
        text-align: right;
    }
    div#report-table_paginate {
        width: 100%;
        text-align: right;
    }
    div#report-table_paginate ul{
        justify-content: flex-end;
    }
    /* .sticky-table{
        position:relative;
        height:60%;
        overflow:auto;
    }
    #report-table th{
        position:sticky;
        top:0;
        background-color:#fff;
    } */
  </style>
</head>
<body>

<div class="side-bar">
    <ul>
        <li><a href="<?php echo base_url();?>index.php/dashboard/patientsRecord/RecordCreation/">Registration</a></li>
        <li><a href="<?php echo base_url();?>index.php/dashboard/patientsRecord/Revisit/">Revisit</a></li>
        <li><a href="<?php echo base_url();?>index.php/dashboard/patientsRecord/Report/">Report</a></li>
    </ul>
</div>
<div class="custom-container">
    <div class="header">
        <div class="row">
            <div class="col-3">
                <div class="btn-menu">
                    <div id="nav-icon1">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <h2><img src="<?php echo base_url();?>assets/img/logo.png">Al Azhar Dental College</h2>
            </div>
            <div class="col-3">
                <div class="dropdown text-right">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    admin
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Logout</a>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive sticky-table">
                    <table id="report-table" class="table table-striped table-bordered" style="background-color:#fff;">
        <thead>
            <tr>
                <th>Sl no.</th>
                <th>Date</th>
                <th>OP number</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Phone number</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i  = 0;
            foreach ($report as $row)
            {
                ?>
                <tr>
                    <td><?php echo ++$i;?></td>
                    <td><?php echo $row->reg_date;?></td>
                    <td><?php echo $row->reg_card_number;?></td>
                    <td><?php echo $row->name;?></td>
                    <td><?php echo $row->age;?></td>
                    <td><?php echo $row->gender;?></td>
                    <td><?php echo $row->contact_number;?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Sl no.</th>
                <th>Date</th>
                <th>OP number</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Phone number</th>
            </tr>
        </tfoot>
    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<script type="text/javascript" src="<?php echo base_url();?>assets/files/moment.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/files/daterangepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/files/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/files/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/files/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/files/jszip.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/files/pdfmake.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/files/vfs_fonts.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/files/buttons.html5.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/files/buttons.print.min.js"></script>

</body> 
</html>
<script type="text/javascript">
var dataTable;

	$(document).ready(function(){


		$('#nav-icon1').click(function(){
    		$(this).toggleClass('open');
    		$('.side-bar').toggleClass('active');
    	});

        //header height
        var HeadHeight = $('.header').outerHeight();
        $('.side-bar').css('top',HeadHeight);

        buildDataTable();
		
	});

    function buildDataTable(){
        dataTable = $('#report-table').DataTable({
        "dom": 'Bfrtip',
        "title": 'Bfrtip',
        "buttons": [
                    {
                        extend: 'excelHtml5',
                        title: 'Patients Report',
                        className: 'btn btn-primary'
                    },
                    {
                        extend: 'pdfHtml5',
                        title: 'Patients Report',
                        className: 'btn btn-primary'
                    }
                ]
        });
    }
</script>

    