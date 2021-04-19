<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://chavaradarsan.com/chavaraAdmissionsApplyOnline/assets/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url();?>assets/style/style.css">
  <style type="text/css">
    #revisitDataTable tbody tr{
            cursor: pointer;
    }
    #revisitDataTable tbody tr:hover{
        font-size: 16px;
        color: #150d0d;
    }
    .form-typical {
        margin: 0 auto 40px auto;
        padding: 15px 30px;
        background-color: #daeef3;
    }
    .form-typical >.row{
        margin:0!important;
    }
    .form-typical input[type=checkbox], input[type=radio]{
        margin-right: 5px!important;
        display: inline-block;
    }
    .form-typical label.radio-inline {
        padding-right: 10px;
    }
    #opedit{
        background-color:#4381C1;color:#fff;
    }
    .footer-sec{
        margin-top:40px;
        border-top:1px solid #ccc;
        padding-top:30px;
    }
    .header {
        margin: 0 auto;
        margin-top: 0px;
        background-color: #92cddc;
        padding: 15px;
        text-align: center;
        color: #fff;
        transition: all 0.3s;
        margin-left: 0;
    }
    [class*="col-"] >label,[class*="col-"] >div>label {
        font-weight:500;
    }
    
    .footer-sec button{font-size:18px;}
    .footer-sec button:first-child {background-color:#fff;}
    .footer-sec button:last-child {background-color:#4381C1;color:#fff;}
    h3{text-align: center;
    margin-bottom: 30px;}
    .seperator-div {
        padding:15px;
        border: 1px solid #9bcdda;
        height: 100%;
    }
    .custom-container{
        width: 100%;
        margin: 0 auto;
        height: 100vh;
        background-color: #daeef3;
    }
    .searc-wrapper button {
        position: absolute;
        right: 0;
        top: 0;
        margin: 0!important;
        height: 38px;
        border-radius: 0;
    }
    .searc-wrapper {
        position: relative;
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
    .details-div .col-4 {
        padding: 0 0 0 10px;
    }
    .details-div .col-8 {
        padding: 0 0 0 10px;
    }
    .col-4.details-div .row {
        align-items: baseline;
        margin-bottom: 5px;
    }
    .details-div .col-4 label {
        font-size: 12px;
        text-align: right;
        display: block;
        word-break: break-all;
        margin:0;
        font-weight: 400;
    }
    .details-div .col-8 > span {
        font-size: 12px;
    }
    .seperator-div >.row {
        margin-bottom: 10px;
    }
    .btn-primary {
        background-color: #4381C1;
        color: #fff;
    }
    .btn-secondary{
        background-color: #fff;
        color: #111;
    }
    .header .dropdown button, .header .dropdown button:focus, .header .dropdown.open button {
        background-color: transparent;
        border-color: transparent;
        box-shadow: none!important;
        color: #4381c1;
        font-weight: 600;
    }
    .header .dropdown-menu {
        top: 9px!important;
        background-color: #4381c1;
        border-radius: 0;
        border: 1px solid transparent;
    }
    .header .btn-secondary:not(:disabled):not(.disabled).active, .header .btn-secondary:not(:disabled):not(.disabled):active, .header .show>.btn-secondary.dropdown-toggle {
        background-color: transparent;
        border-color: transparent;
        box-shadow: none!important;
        color: #4381c1;
        font-weight: 600;
    }
    .header .dropdown-menu a {
        color: #fff;
    }
    .header .dropdown-menu a {
        background-color: transparent;
    }
    #main-area {}
  </style>
</head>
<body>

<div class="custom-container">
    <div class="side-bar">
        <ul>
            <li><a href="<?php echo base_url();?>index.php/dashboard/patientsRecord/RecordCreation/">Registration</a></li>
            <li><a href="<?php echo base_url();?>index.php/dashboard/patientsRecord/Revisit/">Revisit</a></li>
        </ul>
    </div>
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
                <h2><img src="<?php echo base_url();?>assets/img/logo.png">Al-Azhar Dental College</h2>
            </div>
            <div class="col-3">
                <div class="dropdown text-right">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    admin
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
                    <a class="dropdown-item" href="#">Logout</a>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <form class="form-typical" id="revisitForm" method="post" action="<?php echo base_url();?>index.php/dashboard/patientsRecord/Revisit/">
	        <div class="row">
	            <div class="col-12">
	                <div class="row" style="align-items: center;margin:10px 0;">
	                    <div class="col-5">
	                        <div class="row">
	                            <div class="col-4">
	                                <label for="searchBox">Search</label>
	                            </div>
	                            <div class="col-8">
	                                <div class="searc-wrapper">
                        		    	<input class="form-control" id="searchBox" type="text">
                        		    	<button type="button" class="btn btn-primary" id="search" data-edit="true" style="margin-top: 19px;">
                        		    		<i class="fa fa-search" style="font-size:24px"></i>
                        		    	</button>
    	                            </div>
	                            </div>
	                        </div>
            		  	</div>
            		  	<div class="col-7">
            		  		<div>
            			    	<label for="ex1">Search by</label>
            			    	<label class="radio-inline">
            			    		<input type="radio" name="searchBy" value="reg_card_number" checked>Reg. no
            			    	</label>
            					<label class="radio-inline">
            						<input type="radio" name="searchBy" value="name">Name
            					</label>
            					<label class="radio-inline">
            						<input type="radio" name="searchBy" value="contact_number">Contact No
            					</label>
            					<label class="radio-inline">
            						<input type="radio" name="searchBy" value="dob">Date of birth
            					</label>
            					<a href="<?php echo base_url();?>index.php/dashboard/patientsRecord/RecordCreation/" class="btn btn-primary pull-right">New Registration</a>
            				</div>
            		  	</div>
	                </div>
	            </div>
	            <div class="col-5">
	                <div class="seperator-div">
	                    <div class="row">
                		  	<div class="col-4">
                		  	    <?php
                		  		$message = $this->session->flashdata('message');
                		  		$messageClass = $this->session->flashdata('msg_class');
                		  		if( $message!='' ){
                		  			?>
                			  		<div class="alert <?php echo $messageClass;?> alert-dismissible">
                			  			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                					  	<?php echo $message;?>
                					</div>
                				<?php
                				} 
                				//echo validation_errors();
                				?>
                		  		<label for="visitDate">Consultation on</label>
                		  	 </div>
                		  	 <div class="col-8">
                		  	     <input class="form-control" id="visitDate" name="visitDate" type="text" value="<?php echo set_value('visitDate'); ?>">
                		    	<input class="form-control" id="regNo" name="regNo" type="hidden" value="<?php echo set_value('regNo'); ?>" placeholder="regNo">
                		    	<input class="form-control" id="reVisitId" name="reVisitId" type="hidden" value="<?php echo set_value('reVisitId'); ?>" placeholder="reVisitId">
                		  	 </div>
                		</div>
                		<div class="row">
                		    <div class="col-4">
                		  	     <label for="ex3">Department</label>
                		  	 </div>
                		  	 <div class="col-8">
                		  	     <select class="form-control" id="department" name="department" required="">
                				    <option value="" selected="" disabled="">--select any--</option>
                				    <?php
                				    $oldvalue = set_value('department');
                				    foreach ($departments as $key => $value) {
                				    	if( $value->id== $oldvalue){
                				    		echo sprintf('<option value="%s" selected>%s</option>', $value->id, $value->dept_name );
                				    	}
                				    	else{
                					    	echo sprintf('<option value="%s">%s</option>', $value->id, $value->dept_name );
                					    }
                					}
                					?>
                  				</select>
                		  	 </div>
                		</div>
                		<div class="row">
                		    <div class="col-4">
                		  	     <label for="remarks">Remarks</label>
                		  	 </div>
                		  	 <div class="col-8">
                		  	     <textarea class="form-control" rows="2" id="remarks" name="remarks"  maxlength="200"><?php echo set_value('remarks'); ?></textarea>
                		  	 </div>
                		</div>
                		<div class="row">
                            <div class="col-12">
                                <div class="footer-sec text-center" style="margin-top: 15px;text-align: center;">
                				  	<a href="#" class="btn">Refresh</a>
                                    <button type="button" id="cancelBooking" class="btn">Cancel Booking</button>
                				  	<button type="submit" class="btn">Confirm Booking</button>
                				</div>
                            </div>
    	                </div>
	                </div>
	            </div>
	            <div id="main-area" class="col-7">
	                <div class="seperator-div">
	                    <div class="row">
            		  	    <div class="col-4 details-div">
            		  	        <div class="row">
            		  	            <div class="col-4">
            		  	                <label>Reg.no : </label>
            		  	            </div>
            		  	            <div class="col-8">
            		  	                <span id="searchedRegNo"></span>
            		  	            </div>
            		  	        </div>
            		  	        <div class="row">
            		  	            <div class="col-4">
            		  	                <label>Name : </label>
            		  	            </div>
            		  	            <div class="col-8">
            		  	                <span id="searchedName"></span>
            		  	            </div>
            		  	        </div>
            		  	        <div class="row">
            		  	            <div class="col-4">
            		  	                <label>Gender : </label>
            		  	            </div>
            		  	            <div class="col-8">
            		  	                <span id="searchedGender"></span>
            		  	            </div>
            		  	        </div>
            		  	        <div class="row">
            		  	            <div class="col-4">
            		  	                <label>DOB : </label>
            		  	            </div>
            		  	            <div class="col-8">
            		  	                <span id="searchedDob"></span>
            		  	            </div>
            		  	        </div>
            		  	        <div class="row">
            		  	            <div class="col-4">
            		  	                <label>Guardian : </label>
            		  	            </div>
            		  	            <div class="col-8">
            		  	                <span id="searchedParentName"></span>
            		  	            </div>
            		  	        </div>
            		  	        <div class="row">
            		  	            <div class="col-4">
            		  	                <label>Remarks : </label>
            		  	            </div>
            		  	            <div class="col-8">
            		  	                <span id="searchedRemarks"></span>
            		  	            </div>
            		  	        </div>
                		  	</div>
                		  	<div class="col-4 details-div">
                		  	    <div class="row">
            		  	            <div class="col-4">
            		  	                <label>Reg.Date : </label>
            		  	            </div>
            		  	            <div class="col-8">
            		  	                <span id="searchedRegDate"></span>
            		  	            </div>
            		  	        </div>
            		  	        <div class="row">
            		  	            <div class="col-4">
            		  	                <label>Phone No : </label>
            		  	            </div>
            		  	            <div class="col-8">
            		  	                <span id="searchedContactNo"></span>
            		  	            </div>
            		  	        </div>
            		  	        <div class="row">
            		  	            <div class="col-4">
            		  	                <label>Age : </label>
            		  	            </div>
            		  	            <div class="col-8">
            		  	                <span id="searchedAge"></span>
            		  	            </div>
            		  	        </div>
            		  	        <div class="row">
            		  	            <div class="col-4">
            		  	                <label>Contact no : </label>
            		  	            </div>
            		  	            <div class="col-8">
            		  	                <span id="searchedEmgNo"></span>
            		  	            </div>
            		  	        </div>
            		  	        <div class="row">
            		  	            <div class="col-4">
            		  	                <label>Category : </label>
            		  	            </div>
            		  	            <div class="col-8">
            		  	                <span id="searchedCategory"></span>
            		  	            </div>
            		  	        </div>
                		  	</div>
                		  	<div class="col-4 details-div">
                		    	<label>Address : </label><br>
                		    	<span id="searchedHouse">House</span><br>
                		    	<span id="searchedPlace">Place</span><br>
                		    	<span id="searchedPostOffice">Post office</span><br>
                		    	<span id="searchedDistrict">District</span><br>
                		    	<label>Pin : </label><span id="searchedPin"></span>
                		  	</div>
                		  	<div class="col-12 text-right">
                		  	    <a id="update-link" href="<?php echo base_url();?>index.php/dashboard/patientsRecord/RecordUpdate/index/" class="btn btn-primary">Edit Registration</a>
                		  	</div>
            		  	</div>
	                </div>
        		</div>
        		<div class="col-12">
        			<table class="table table-striped table-bordered" id="revisitDataTable">
        	          	<thead>
        	          		<tr>
        	          			<th>Sl. No</th>
        	          			<th>Department</th>
        	       				<th>Date</th>
        	          			<th>Remarks</th>
                                <th>Status</th>
                                <th>Action</th>
        	          		</tr>
        	       		</thead>
        	   			<tbody>
        	          				
        	          	</tbody>
        	        </table>
        		</div>
	        </div>
		</form>
<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Large Modal</button> -->
	  <!-- Modal -->
	<div class="modal fade" id="myModal" role="dialog">
	    <div class="modal-dialog modal-lg">
	      	<div class="modal-content">
	        	<div class="modal-header">
	          		<button type="button" class="close" data-dismiss="modal">&times;</button>
					<!--<h4 class="modal-title">Modal Header</h4>-->
	        	</div>
	        	<div class="modal-body" id="searchedModalBody">
	          		<table class="table table-striped">
	          			<thead>
	          				<tr>
	          					<td>Sl. No</td>
	          					<td>Reg.no</td>
	          					<td>Patient Name</td>
	          					<td>Reg. Date</td>
	          					<td>Contact no</td>
	          					<td>Dob</td>
	          				</tr>
	          			</thead>
	          			<tbody>
	          				
	          			</tbody>
	          		</table>
	        	</div>
		        <div class="modal-footer">
		          	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        </div>
	      	</div>
	    </div>
	</div>
</div>
<script type="text/javascript" src="http://chavaradarsan.com/chavaraAdmissionsApplyOnline/assets/js/bootstrap-datepicker.min.js"></script>
</body> 
</html>
<script type="text/javascript">
     //menu 
    $(document).ready(function(){
    	$('#nav-icon1').click(function(){
    		$(this).toggleClass('open');
    		$('.side-bar').toggleClass('active');
    	});
    });
	const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
	$(document).ready(function(){

		$('#searchBox').focus();
		$( "#visitDate" ).datepicker( {format: 'dd-M-yyyy',autoclose:true} );
        $('#update-link').hide();

		setTodaysDate();
		$("input[name='searchBy']").on('change',function(){

			if( $("input[name='searchBy']:checked").val()=='dob' ){
				$( "#searchBox" ).datepicker( {format: 'dd-M-yyyy',autoclose:true} );
                $( "#searchBox" ).val('');
                $( "#searchBox" ).attr('placeholder','DD-MMM-YYYY');
			}
			else{
				$( "#searchBox" ).datepicker( 'remove' );
                $( "#searchBox" ).val('');
                $( "#searchBox" ).attr('placeholder','');
			}
			$('#searchBox').focus();
		});

		$('#search').on('click',function(){
			auSearchPatients();
		})
		$('#searchBox').on('keypress',function(e){
			if(e.which==13){
				e.preventDefault();
				auSearchPatients();
				
			}
		});

		$(document).on('dblclick','#searchedModalBody tbody tr',function(){

			var reg = $(this).find('td').eq(1).text();
			if( reg ){
				var data = {searchKey:reg,searchBy:''}
				auAjaxCall(data);
			}
			else{

			}
		});


		$(document).on('dblclick','#revisitDataTable tbody tr',function(){

			var reVisitId = $(this).data('visitid');
			var deptId = $(this).find('td').eq(1).data('deptid');
			var date = $(this).find('td').eq(2).text();
            var remarks = $(this).find('td').eq(3).text();
            var datas = {
                            reVisitId:reVisitId,
                            deptId:deptId,
                            date:date,
                            remarks:remarks
                        };

			setRevisitUpdateData( datas );

			
		});

        $(document).on('click','#revisitDataTable tbody tr .au-edit-btn',function(){


            var reVisitId = $(this).parent().parent().data('visitid');
            var deptId = $(this).parent().parent().find('td').eq(1).data('deptid');
            var date = $(this).parent().parent().find('td').eq(2).text();
            var remarks = $(this).parent().parent().find('td').eq(3).text();
            var datas = {
                            reVisitId:reVisitId,
                            deptId:deptId,
                            date:date,
                            remarks:remarks
                        };

            setRevisitUpdateData( datas );

        });

		$('#cancelBooking').on('click',function(){
			var con;
			if( $('#reVisitId').val()=='' ){
				// $('#revisitForm')[0].reset();
				window.location.reload();
			}
			else if( $('#reVisitId').val()!='' && !$(this).hasClass('disabled') ){
				con = confirm("Are you sure?");

				if(con){
					cancelBooking( $('#reVisitId').val() );
				}
			}
		});


	});



	function auSearchPatients(){
		var searchBy = $("input[name='searchBy']:checked").val();

		$.ajax({
				url:'<?php echo base_url();?>index.php/dashboard/patientsRecord/Revisit/patientSearchAjax/',
				method:'POST',
				data:{searchKey:$('#searchBox').val(),searchBy:searchBy},
				success: function(data){
					// console.log(data);
					if(data){
						data = JSON.parse(data);

						if(data.error==true){
							alert(data.msg);
							return;
						}
						// console.log(data.length);
						if(data.length==1){
							
							setSearchedData( data[0] );
						}
						else if(data.length>1){
							setSearchedDataInTable( data );
							$("#myModal").modal('show');
						}
						else{
							alert('Patient not found!');
						}
					}
					else{
						alert('Patient not found!');
					}
				}
			});
	}
	function auAjaxCall(datas){
		$.ajax({
				url:'<?php echo base_url();?>index.php/dashboard/patientsRecord/Revisit/patientSearchAjax/',
				method:'POST',
				data:datas,
				success: function(data){
						$("#myModal").modal('hide');
						data = JSON.parse(data);
						// console.log(data);
						setSearchedData( data[0] );
				}
		});
	}


	function setTodaysDate(){

		var curDate = new Date();
		var day = curDate.getDate();
		if( day<10 ){
			day = '0'+day;
		}

		$( "#visitDate" ).val(day+'-'+months[curDate.getMonth()]+'-'+curDate.getFullYear());

	}

	function setSearchedData( data ){

		var dob = setCustomeDateFormat(data.dob);
		var regDate = setCustomeDateFormat(data.reg_date);
		// console.log(data);
		$('#regNo').val(data.reg_card_number);
		$('#searchedRegNo').text(data.reg_card_number);
		$('#searchedName').text(data.name);
		$('#searchedGender').text(data.gender);
		$('#searchedDob').text(dob);
		$('#searchedParentName').text(data.parent_gurdian_name);
		$('#searchedRemarks').text(data.remarks);
		$('#searchedRegDate').text(regDate);
		$('#searchedContactNo').text(data.contact_number);
		$('#searchedAge').text(data.age);
		$('#searchedEmgNo').text(data.emergency_contact);
		$('#searchedCategory').text(data.cat_name);
		$('#searchedHouse').text(data.house);
		$('#searchedPlace').text(data.Place);
		$('#searchedPostOffice').text(data.post_office);
		$('#searchedDistrict').text(data.district);
		$('#searchedPin').text(data.pin);

		var updatedRegLink =  $('#update-link').attr('href');
        var seperated = updatedRegLink.split('/');
        seperated.pop();
        seperated.push(data.reg_card_number);
        updatedRegLink = seperated.join('/');

		$('#update-link').attr('href',updatedRegLink);
        $('#update-link').show()
		fetchOldVisitDetails( data.reg_card_number );
	}

	function fetchOldVisitDetails( regNo, offset=0, limit=10 ){

		$.ajax({
				url:'<?php echo base_url();?>index.php/dashboard/patientsRecord/Revisit/patientOldVisitDetailsAjax/',
				method:'POST',
				data:{regNo:regNo,offset:offset,limit:limit},
				success: function(data){
						// console.log(data);
						$('#revisitDataTable tbody tr').remove();
						$('#revisitDataTable tbody').append( data );
				}
		});

	}
	function setSearchedDataInTable( data ){

		$('#searchedModalBody tbody tr').remove();
		var trLen = data.length;
		var html = '';
		for(var i=0;i<trLen;i++){
			html += '<tr>\
						<td>'+(i+1)+'</td>\
						<td>'+data[i].reg_card_number+'</td>\
						<td>'+data[i].name+'</td>\
						<td>'+setCustomeDateFormat(data[i].reg_date)+'</td>\
						<td>'+data[i].contact_number+'</td>\
						<td>'+setCustomeDateFormat(data[i].dob)+'</td>\
					</tr>'; 
		}
		$('#searchedModalBody tbody').append(html);

        //modal table height dynamic
        var trHeight = $('#searchedModalBody table tr').length;
        if(trHeight >6 ) {
           $('#searchedModalBody').addClass('height');
        }
        else{
            $('#searchedModalBody').removeClass('height');
        }
	}

	function setCustomeDateFormat( date='' ){

		if(!date){
			return '';
		}
		date = date.split(' ',1)[0];
		date = date.split('-');
		if(date[0]=='0000' && date[1]=='00' && date[2]=='00'){
			return '';
		}
		date[1] = months[date[1]-1];
		date = date[2]+'-'+date[1]+'-'+date[0];
		return date;
	}

	function checkCancelAvailable( date ){

		var newDate = new Date();
		var today = new Date();
		var day,month,year;
		date = date.split('-',3);
		day = date[0];
		month = months.indexOf(date[1]);
		year = date[2];

		newDate.setFullYear( year, month, day );

		if ( newDate < today) {
		  return false;//no cancel available ,because of old date
		} 
		else {
		  return true;//Cancel available ,because of the booking date if from today to future
		}
		// console.log(text);
		// console.log(date);
		// console.log(day);
		// console.log(month);
		// console.log(year);

	}

	function cancelBooking( visitId ){

		$.ajax({
				url:'<?php echo base_url();?>index.php/dashboard/patientsRecord/Revisit/cancelBookingAjax/',
				method:'POST',
				data:{visitId:visitId},
				success: function(data){
						data = JSON.parse(data);	

						alert(data.msg);
						fetchOldVisitDetails($('#regNo').val());
				}
		});

	}

    function setRevisitUpdateData( datas ){

        $('#reVisitId').val(datas.reVisitId);
        $('#visitDate').val(datas.date);
        $('#remarks').val(datas.remarks);

        $('#department option[value="' + datas.deptId + '"]').attr('selected',true);

        if( checkCancelAvailable(datas.date) ){
            $('#cancelBooking').removeClass('disabled');
        }
        else{
            $('#cancelBooking').addClass('disabled');
        }

    }
</script>
