<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php echo validation_errors();?>
<div class="container">
	<h2>Registration</h2>
  	<form method="post" action="<?php echo base_url();?>index.php/dashboard/patientsRecord/RecordUpdate/index/<?php echo $regNo;?>">
	    <div class="form-group row">
	    	<div class="col-xs-10">
		    	<label for="regNo">Register number:</label>
		    	<input class="form-control" id="regNo" name="regNo" type="text" readonly="true" value="<?php echo $regNo; ?>">
		    	<input type="text" id="hiddenRegNo" name="hiddenRegNo" value="<?php echo $hiddenRegNo;?>">
		  	</div>
		  	<div class="col-xs-2">
		    	<button type="button" class="btn btn-primary" id="opedit" data-edit="true">
		    		<i class="fa fa-pencil" style="font-size:24px"></i>
		    	</button>
		  	</div>
		  	<div class="col-xs-4">
		    	<label for="patientName">Patient name</label>
		    	<input class="form-control" id="patientName" name="patientName" type="text" value="<?php echo $inform['patientName']; ?>">
		  	</div>
		  	<div class="col-xs-2">
		    	<label for="dob">Date Of Birth</label>
		    	<input class="form-control" id="dob" name="dob"  value="<?php echo $inform['dob']; ?>" type="text">
		  	</div>
		  	<div class="col-xs-2">
		    	<label for="age">Age</label>
		    	<!-- <select class="form-control" id="age">
				    <option value="1">1</option>
  				</select> -->
  				<input class="form-control" id="age" name="age" type="text"  value="<?php echo $inform['age']; ?>">
		  	</div>
		  	<div class="col-xs-2">
		    	<?php
		  		$gender = $inform['gender'];
				$genderArray = array('Male','Female','Others');
				$len = count($genderArray);
				?>
		    	<label for="gender">Gender<span class="man">*</span></label>
		    	<?php
				for($z= 0; $z<$len;$z++){
					if($genderArray[$z] == $gender){
						?>
				    	<label class="radio-inline">
				    		<input type="radio" name="gender" value="<?php echo $genderArray[$z];?>" checked><?php echo $genderArray[$z];?>
				    	</label>
				    	<?php
			    	}
			    	else{
			    		?>
			    		<label class="radio-inline">
				    		<input type="radio" name="gender" value="<?php echo $genderArray[$z];?>"><?php echo $genderArray[$z];?>
				    	</label>
				    	<?php
			    	}
			    }
			    ?>
		  	</div>
		  	<div class="clearfix"></div>
		  	<div class="col-xs-4">
		    	<label for="ex1">House</label>
		    	<input class="form-control" id="ex3" name="house" type="text" value="<?php echo $inform['house']; ?>" maxlength="100">
		  	</div>
		  	<div class="col-xs-4">
		    	<label for="ex1">Place</label>
		    	<input class="form-control" id="ex3" name="place" type="text" value="<?php echo $inform['place']; ?>">
		  	</div>
		  	<div class="col-xs-4">
		    	<label for="ex1">Post Office</label>
		    	<input class="form-control" id="poffice" name="poffice" type="text" value="<?php echo $inform['poffice']; ?>" maxlength="50">
		  	</div>
		  	<div class="col-xs-4">
		    	<label for="state">State</label>
		    	<input class="form-control" id="state" name="state" type="text" value="<?php echo $inform['state']; ?>"  maxlength="50">
		  	</div>
		  	<div class="col-xs-4">
		    	<label for="ex1">Distric</label>
		    	<input class="form-control" id="district" name="district" type="text" value="<?php echo $inform['district']; ?>"  maxlength="50">
		  	</div>
		  	<div class="col-xs-4">
		    	<label for="ex1">Pin</label>
		    	<input class="form-control" id="pin" name="pin" type="text" value="<?php echo $inform['pin']; ?>"  maxlength="10">
		  	</div>
		  	<div class="col-xs-4">
		    	<label for="ex1">Contact No</label>
		    	<input class="form-control" id="contactNo" name="contactNo" type="text" value="<?php echo $inform['contactNo']; ?>"  maxlength="20">
		  	</div>
		  	<div class="col-xs-4">
		    	<label for="ex1">Parent /Guardian Name</label>
		    	<input class="form-control" id="parentName" name="parentName" type="text" value="<?php echo $inform['parentName']; ?>"  maxlength="100">
		  	</div>
		  	<div class="col-xs-4">
		    	<label for="ex1">Emergency Contact No</label>
		    	<input class="form-control" id="emgNo" name="emgNo" type="text" value="<?php echo $inform['emgNo']; ?>"  maxlength="20">
		  	</div>
		  	<div class="col-xs-4">
		    	<?php
		  		$cat = $inform['category'];
				$len = count($category);
				?>
		    	<label for="category">Category<span class="man">*</span></label>
				<select class="form-control" id="category" name="category">
					<?php
					for($z= 0; $z<$len;$z++){
						if($category[$z]->id == $cat){
							?>
							<option value="<?php echo $category[$z]->id;?>" selected><?php echo $category[$z]->cat_name;?></option>
							<?php
						}
						else{
							?>
							<option value="<?php echo $category[$z]->id;?>"><?php echo $category[$z]->cat_name;?></option>
							<?php
						}
					}
					?>
				</select>
		  	</div>
		  	<div class="col-xs-4">
		    	<label for="regDate">Registration Date</label>
		    	<input class="form-control" id="regDate" type="text" name="regDate" value="<?php echo $inform['regDate']; ?>">
		  	</div>
		  	<div class="col-xs-4">
		    	<label for="ex1">Remarks</label>
		    	<textarea class="form-control" rows="5" id="comment" name="remarks"><?php echo $inform['remarks']; ?></textarea>
		  	</div>
		</div>
	    <button type="submit" id="submit-btn" class="btn btn-success pull-right">Submit</button>
  	</form>
</div>
<script type="text/javascript" src="http://chavaradarsan.com/chavaraAdmissionsApplyOnline/assets/js/bootstrap-datepicker.min.js"></script>
</body> 
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$( "#dob,#regDate" ).datepicker( {format: 'dd-M-yyyy'} );

		$( "#dob" ).on( 'change', function(){
			var age = 0, currentYear;

			age = $(this).val().split('-')[2];
			
			currentYear = new Date();
			currentYear = currentYear.getFullYear();
			age = currentYear - age;

			// console.log(age);
			$('#age').val(age);
		});

		$('#opedit').on('click',function(){


			if( $(this).data('edit') ){

				$('#regNo').attr('readonly',false);
				$(this).data('edit',false);
				$(this).empty();
				$(this).html('<i class="fa fa-check"></i>');
				$('#submit-btn').addClass('disabled');
				$('#submit-btn').attr('disabled',true);

			}
			else{
				$('#regNo').attr('readonly',true);
				$(this).data('edit',true);
				$(this).empty();
				$(this).html('<i class="fa fa-pencil" style="font-size:24px"></i>');
				$('#submit-btn').removeClass('disabled');
				$('#submit-btn').attr('disabled',false);


				if( $('#regNo').val()!=$('#hiddenRegNo').val() ){

					$.ajax({
						url:'<?php echo base_url();?>index.php/dashboard/patientsRecord/RecordCreation/checkRegNoAlreadyExistsAjax/',
						method:'POST',
						data:{regNo:$('#regNo').val()},
						success: function(data){
							if(data){
								alert('This register number already exists!');
								$('#regNo').val($('#hiddenRegNo').val());
							}
						}
					});
				}

			}
		});

		/*only allows numbers,space and +*/
		$('#contactNo,#emgNo,#pin').on('keypress',function(e){
			if(!((e.which>=48 && e.which<=57) || (e.which==32) || (e.which==43))){
				return false;
			}
		});

		$('#patientName').focus();

		$(document).on('keypress',function(e){
			
			if(e.which==13){
				if( $(":focus").attr('id')=='regNo' ){
					$('#opedit').click();
				}
				e.preventDefault();
			}
		});
	});
</script>
