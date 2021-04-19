<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/style/print-css.css">
</head>
<body>
<?php 
// print_r($patientsDetails);

function extractData( $details, $key ){

	$value = ( isset( $details[0]->$key ) ? $details[0]->$key : '' );
	return $value;
}
$regno = extractData($patientsDetails,'reg_card_number');
$name = extractData($patientsDetails,'name');
$dob = explode( ' ', extractData($patientsDetails,'dob') );
$dob = auCommon_revertDate( $dob[0] );
$age = extractData($patientsDetails,'age');
$gender = extractData($patientsDetails,'gender');
$blood_group = extractData($patientsDetails,'blood_group');
$house = extractData($patientsDetails,'house');
$Place = extractData($patientsDetails,'Place');
$post_office = extractData($patientsDetails,'post_office');
$district = extractData($patientsDetails,'district');
$state = extractData($patientsDetails,'state');
$pin = extractData($patientsDetails,'pin');
$contact_number = extractData($patientsDetails,'contact_number');
$parent_gurdian_name = extractData($patientsDetails,'parent_gurdian_name');
$emergency_contact = extractData($patientsDetails,'emergency_contact');
$category = extractData($patientsDetails,'category');
$reg_date = explode( ' ', extractData($patientsDetails,'reg_date') );
$reg_date = auCommon_revertDate( $reg_date[0] );
$remarks = extractData($patientsDetails,'remarks');

$pre1 = strtolower($gender);
$pre = '';
if( $pre1 == 'male'){
	$pre = 'Mr.';
}
elseif ( $pre1 == 'female' ) {
	$pre = 'Ms.';
}
else{

}
// echo auCommon_revertDate( $dob );
// echo "<br>".$name;
// echo "<br>".$gender;
// echo "<br>".$age;
// echo "<br>".$house;
// echo "<br>".$contact_number;
// echo "<br>".$reg_date;
?>
<div id="sticker-wrapper">
	<div id="sticker" class="id">
		<div class="barcode">
			<div><b><?php echo $regno;?></b></div>
			<img src="<?php echo $barcode;?>">
		</div>
		<div class="content">
			<div><?php echo $pre. ' ' .$name;?></div>
			<div style="display: inline-block;">Sex: <?php echo $gender;?></div>
			<div style="display: inline-block;margin-left: 18px;">Age: <?php echo $age;?></div>
			<div>House: <?php echo $house;?></div>
			<div>Place: <?php echo $Place;?></div>
			<div>Phone No: <?php echo $contact_number;?></div>
			<div>Reg date: <?php echo $reg_date;?></div>
		</div>
	</div>
	<button class="au-custom-btn" onclick="printContent('sticker-wrapper')">Print Sticker</button>
</div>
<div id="id-wrapper">
	<div id="id-front" class="id">
		<!-- <img class="bg-back" src="<?php echo base_url();?>assets/img/front.jpg"> -->
		<div class="barcode">
			<img src="<?php echo $barcode;?>">
		</div>
		<div class="content">
			<div style="font-size: 18px;"><?php echo $pre. ' ' .$name;?></div>
			<div style="display: inline-block;margin-right: 20px;">Sex: <?php echo $gender;?></div>
			<div style="display: inline-block;">Age: <?php echo $age;?></div>
			<div>Ph: <?php echo $contact_number;?></div>
		</div>
		<div class="reg-date">Reg Date: <?php echo $reg_date;?><br/> Reg No: <b><?php echo $regno;?></b></div>
	</div>
	<div id="id-back" class="id" style="display: none;">
	</div>
	<button class="au-custom-btn" onclick="printContent('id-wrapper')">Print ID Card</button>
</div>
</body>
<style>
	body{
		display: flex;
		flex-wrap: wrap;
	}
	#id-wrapper,#sticker-wrapper{
		width: 50%;
	}
	.id{
		width: 3.5in;
		height: 2in;
		position: relative;
		z-index: 2;
		font-family: Arial, Helvetica, sans-serif;
	}
	#id-front, #id-back{
		width: 8.5cm;
		height: 5.4cm;
	}

		.bg-back{
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			width: 100%;
			height: auto;
			z-index: -1;
		}
		.barcode{}
		.barcode img{
			max-width: 100%;
			height: auto;
		}
		.content{
			font-size: 14px;
			color: #111;
			line-height: 22px;
		}
		#sticker{
			padding:15px;
			width: 8cm;
			height: 4cm;
		}
		#sticker .barcode {
		    position: absolute;
		    right: 20px;
		    top: 20px;
		}
		.au-custom-btn {
		    display: inline-block;
		    font-weight: 400;
		    text-align: center;
		    white-space: nowrap;
		    vertical-align: middle;
		    -webkit-user-select: none;
		    -moz-user-select: none;
		    -ms-user-select: none;
		    user-select: none;
		    border: 1px solid transparent;
		    padding: .375rem .75rem;
		    font-size: 1rem;
		    line-height: 1.5;
		    border-radius: .25rem;
		    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
		        color: #fff;
	    background-color: #007bff;
	    border-color: #007bff;
	    cursor: pointer;
		}
		.btn-primary:hover {
		    color: #fff;
		    background-color: #0069d9;
		    border-color: #0062cc;
		}
		#id-front .content {
		    font-size: 9px;
		    color: #111;
		    line-height: 14px;
		    position: relative;
		    left: 16px;
		    top: 80px;
		}
		.reg-date{
			font-size: 9px;
			color: #111;
			line-height: 14px;
			position: absolute;
			left: 69px;
    		top: 57px;
		}
		#id-front .barcode img{
			width: 100px;
    		height: auto;
		}
		#id-front .barcode{
			position: absolute;
		    right: 15px;
		    top: 83px;
		    display: inline-block;
		}
</style>
<script type="text/javascript">

	function printContent( divId ){
		var prtContent = document.getElementById( divId );
		var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
		var style = '<link rel="stylesheet" href="<?php echo base_url();?>assets/style/print-css.css">';
		style = style+prtContent.innerHTML;
		WinPrint.document.write(style);
		WinPrint.document.close();
		WinPrint.focus();
		setTimeout( function(){
		WinPrint.print();
		WinPrint.close();
		},3000);
	}
	
</script>
</html>