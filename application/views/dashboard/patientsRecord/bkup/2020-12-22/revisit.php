<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">
  	.details-div span{
  		padding-left: 10px;
  	}
  	#revisitDataTable tbody tr{
  		    cursor: pointer;
  	}
  	#revisitDataTable tbody tr:hover{
  		font-size: 16px;
    	color: #150d0d;
  	}
  </style>
</head>
<body>

<div class="container">
	<h2>Search</h2>
	<div class="form-group row">
	    <form id="revisitForm" method="post" action="<?php echo base_url();?>index.php/dashboard/patientsRecord/Revisit/">
	    	<div class="col-xs-4">
		    	<label for="searchBox">Search</label>
		    	<input class="form-control" id="searchBox" type="text">
		  	</div>
		  	<div class="col-xs-1">
		    	<button type="button" class="btn btn-primary" id="search" data-edit="true" style="margin-top: 19px;">
		    		<i class="fa fa-search" style="font-size:24px"></i>
		    	</button>
		  	</div>
		  	<div class="col-xs-7">
		  		<div style=" margin-top: 34px;">
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
		  	
		  	<div class="clearfix"></div>
		  	<div class="col-xs-4">
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
		    	<input class="form-control" id="visitDate" name="visitDate" type="text" value="<?php echo set_value('visitDate'); ?>">
		    	<input class="form-control" id="regNo" name="regNo" type="hidden" value="<?php echo set_value('regNo'); ?>">
		    	<input class="form-control" id="reVisitId" name="reVisitId" type="hidden" value="<?php echo set_value('reVisitId'); ?>">
		    	<label for="ex3">Department</label>
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
		    	<label for="remarks">Remarks</label>
		    	<textarea class="form-control" rows="5" id="remarks" name="remarks"  maxlength="200"><?php echo set_value('remarks'); ?></textarea>

  				<div class="" style="margin-top: 15px;text-align: center;">
				  	<button type="button" id="cancelBooking" class="btn btn-danger" style="margin-right: 40px;">Cancel Booking</button>
				  	<button type="submit" class="btn btn-success">Confirm Booking</button>
				</div>
		  	</div>
		</form>
		<div class="col-xs-8">
		  	
		  	<div class="col-xs-4 details-div">
		    	<label>Reg.no : </label><span id="searchedRegNo"></span><br>
		    	<label>Name : </label><span id="searchedName"></span><br>
		    	<label>Gender : </label><span id="searchedGender"></span><br>
		    	<label>DOB : </label><span id="searchedDob"></span><br>
		    	<label>Parent/Guardian : </label><span id="searchedParentName"></span><br>
		    	<label>Remarks : </label><span id="searchedRemarks"></span>
		  	</div>
		  	<div class="col-xs-4 details-div">
		  		<label>Reg.Date : </label><span id="searchedRegDate"></span><br>
		    	<label>Contact No : </label><span id="searchedContactNo"></span><br>
		    	<label>Age : </label><span id="searchedAge"></span><br>
		    	<label>Emg. Contact no : </label><span id="searchedEmgNo"></span><br>
		    	<label>Category : </label><span id="searchedCategory"></span>
		  	</div>
		  	<div class="col-xs-4 details-div">
		    	<label>Address : </label><br>
		    	<span id="searchedHouse">House</span><br>
		    	<span id="searchedPlace">Place</span><br>
		    	<span id="searchedPostOffice">Post office</span><br>
		    	<span id="searchedDistrict">District</span><br>
		    	<label>Pin : </label><span id="searchedPin"></span>
		  	</div>
		</div>
	    <a href="<?php echo base_url();?>index.php/dashboard/patientsRecord/RecordCreation/updateView" class="btn btn-warning pull-right">Edit Registration</a>
	</div>
	<div class="row">
		<div class="col-xs-8">
			<table class="table table-striped" id="revisitDataTable">
	          	<thead>
	          		<tr>
	          			<th>Sl. No</th>
	          			<th>Department</th>
	       				<th>Date</th>
	          			<th>Remarks</th>
	          		</tr>
	       		</thead>
	   			<tbody>
	          				
	          	</tbody>
	        </table>
		</div>
	</div>
<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Large Modal</button> -->
	  <!-- Modal -->
	<div class="modal fade" id="myModal" role="dialog">
	    <div class="modal-dialog modal-lg">
	      	<div class="modal-content">
	        	<div class="modal-header">
	          		<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Modal Header</h4>
	        	</div>
	        	<div class="modal-body" id="searchedModalBody">
	          		<table class="table table-striped">
	          			<thead>
	          				<tr>
	          					<th>Sl. No</th>
	          					<th>Reg.no</th>
	          					<th>Patient Name</th>
	          					<th>Reg. Date</th>
	          					<th>Contact no</th>
	          					<th>Dob</th>
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
	const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
	$(document).ready(function(){

		$('#searchBox').focus();
		$( "#visitDate" ).datepicker( {format: 'dd-M-yyyy',autoclose:true} );

		setTodaysDate();
		$("input[name='searchBy']").on('change',function(){

			if( $("input[name='searchBy']:checked").val()=='dob' ){
				$( "#searchBox" ).datepicker( {format: 'dd-M-yyyy',autoclose:true} );
			}
			else{
				$( "#searchBox" ).datepicker( 'remove' );
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

			$('#reVisitId').val(reVisitId);
			$('#visitDate').val(date);

			$('#department option[value="' + deptId + '"]').attr('selected',true);

			if( checkCancelAvailable(date) ){
				$('#cancelBooking').removeClass('disabled');
			}
			else{
				$('#cancelBooking').addClass('disabled');
			}

			
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
</script>
