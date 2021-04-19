<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://chavaradarsan.com/chavaraAdmissionsApplyOnline/assets/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url();?>assets/style/style.css">
  <style type="text/css">
    span.man{
        color: red;
        font-size: 18px;
        font-weight: bold;
        padding-left: 5px;
    }
    .form-typical {
        margin: 0 auto 40px auto;
        padding: 15px 30px;
        background-color: #daeef3;
    }
    .form-typical input[type=checkbox], input[type=radio]{
        margin-right: 5px!important;
        display: inline-block;
    }
    .form-typical label.radio-inline {
        padding-right: 10px;
        width: auto;
    }
    .form-typical .row{
        /*margin-bottom:10px;*/
    }
    .seperator-div > div{
        margin-bottom:10px;
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
    .footer-sec button[type="submit"],.btn-primary {background-color:#4381C1;color:#fff;}
    .footer-sec button{
        min-width:100px;
        margin-left: 10px;
    }
    h3{
        text-align: center;
        margin-bottom: 10px;
        font-size: 20px;
    }
    .seperator-div {
        padding:15px;
        border: 1px solid #9bcdda;
        height: 100%;
    }
    .seperator-div >.col-12{
        margin-bottom:10px;
    }
    .seperator-div > .row{
        align-items:center;
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
    .searc-wrapper {
        position: relative;
    }
    .searc-wrapper button {
        position: absolute;
        right: 0;
        top: 0;
        margin: 0!important;
        height: 38px;
        border-radius: 0;
    }
    .chumma >.col-8, .chumma >.col-4 {
        margin-top: 10px;
    }
    .chumma .col-4 label{
        margin-right:15px;
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
    .form-typical #regDate{
        width: auto;
    }
  </style>
</head>
<body>
<?php //echo validation_errors();?>
<div class="side-bar">
    <ul>
        <li><a href="<?php echo base_url();?>index.php/dashboard/patientsRecord/RecordCreation/">Registration</a></li>
        <li><a href="<?php echo base_url();?>index.php/dashboard/patientsRecord/Revisit/">Revisit</a></li>
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
  	<form class="form-typical" method="post" action="<?php echo base_url();?>index.php/dashboard/patientsRecord/RecordCreation/">
  	    <h3>Patient Registration</h3>
	    <div class="form-group">
	        <div class="row align-width">
	            <div class="col-6">
	                <div class="row" style="align-items:flex-end;">
	                   <div class="col-4">
	                    <label for="regNo">Registration No:	</label>
	                   </div>
	                   <div class="col-6">
    	                    <div class="searc-wrapper">
                                <?php 
                                if( form_error('regNo') ){
                                    $errorClass = 'form-error-class';
                                    echo sprintf( '<span class="form-error-class">%s</span>', form_error('regNo') );
                                }
                                else{
                                    $errorClass = '';
                                }
                                ?>
    	                        <input class="form-control <?php echo $errorClass;?>" id="regNo" name="regNo" type="text" readonly="true" value="<?php echo $regNo; ?>" maxlength="6">
                                
                		        <input type="hidden" id="hiddenRegNo" name="hiddenRegNo" value="<?php echo $hiddenRegNo;?>">
                		    	<button type="button" class="btn" id="opedit" data-edit="true">
                                    <i class="fa fa-pencil" style="font-size:24px"></i>
                                </button>
    	                    </div>
	                   </div>
	                </div>
	            </div>
	            <div class="col-6">
	                <div class="row" style="align-items:flex-end;">
	                    <div class="col-4">
            		    	<label for="regDate">Registration Date:	</label>
            		  	</div>
            		  	<div class="col-8">
                            <?php 
                            if( form_error('regDate') ){
                                $errorClass = 'form-error-class';
                                echo sprintf( '<span class="form-error-class">%s</span>', form_error('regDate') );
                            }
                            else{
                                $errorClass = '';
                            }
                            ?>
            		  	    <input class="form-control <?php echo $errorClass;?> au-remove-pointer-events" id="regDate" name="regDate" type="text" value="<?php echo set_value('regDate'); ?>" placeholder="DD-MMM-YYYY">
            		  	</div>
	                </div>
	            </div>
	        </div>
	        <div class="row chumma">
	            <div class="col-8">
	            <div class="seperator-div">
	                <div class="row">
	                    <div class="col-6">
	                        <div class="row">
	                            <div class="col-4">
	                                <label for="patientName">Patient name<span class="man">*</span></label>
	                            </div>
	                            <div class="col-8">
                                    <?php 
                                    if( form_error('patientName') ){
                                        $errorClass = 'form-error-class';
                                        echo sprintf( '<span class="form-error-class">%s</span>', form_error('patientName') );
                                    }
                                    else{
                                        $errorClass = '';
                                    }
                                    ?>
	                                <input class="form-control <?php echo $errorClass;?>" id="patientName" name="patientName" type="text" value="<?php echo set_value('patientName'); ?>" maxlength="100">
	                            </div>
	                        </div>
            		  	</div>
            		  	<div class="col-6">
            		  	    <div class="row">
            		  	        <div class="col-4">
            		  	            <?php
                    		  		$gender = set_value('gender');
                    				$genderArray = array('Male','Female','Transgender');
                    				$len = count($genderArray);
                    				?>
                    		    	<div><label for="gender">Gender<span class="man">*</span></label></div>
            		  	        </div>
            		  	        <div class="col-8">
            		  	            <?php
                    				for($z= 0; $z<$len;$z++){
                    					if($genderArray[$z] == $gender){
                    						?>
                    				    	<label class="radio-inline">
                    				    		<input type="radio" name="gender" value="<?php echo $genderArray[$z];?>" checked required><?php echo $genderArray[$z];?>
                    				    	</label>
                    				    	<?php
                    			    	}
                    			    	else{
                    			    		?>
                    			    		<label class="radio-inline">
                    				    		<input type="radio" name="gender" value="<?php echo $genderArray[$z];?>" required><?php echo $genderArray[$z];?>
                    				    	</label>
                    				    	<?php
                    			    	}
                    			    }
                    			    ?>
            		  	        </div>
            		  	    </div>
            		  	</div>
	                </div>
	                <div class="row">
	                    <div class="col-6">
	                        <div class="row">
	                            <div class="col-4">
	                                <label for="dob">Date Of Birth</label>
	                            </div>
	                            <div class="col-8">
                                    <?php 
                                    if( form_error('dob') ){
                                        $errorClass = 'form-error-class';
                                        echo sprintf( '<span class="form-error-class">%s</span>', form_error('dob') );
                                    }
                                    else{
                                        $errorClass = '';
                                    }
                                    ?>
	                                <input class="form-control <?php echo $errorClass;?>" id="dob"  type="text" name="dob"  value="<?php echo set_value('dob'); ?>" placeholder="DD-MMM-YYYY">
	                            </div>
	                        </div>
            		  	</div>
            		  	<div class="col-6">
            		  	    <div class="row">
            		  	        <div class="col-4">
            		  	            <label for="age">Age<span class="man">*</span></label>
            		  	        </div>
            		  	        <div class="col-8">
                                    <?php 
                                    if( form_error('age') ){
                                        $errorClass = 'form-error-class';
                                        echo sprintf( '<span class="form-error-class">%s</span>', form_error('age') );
                                    }
                                    else{
                                        $errorClass = '';
                                    }
                                    ?>
            		  	            <input class="form-control <?php echo $errorClass;?>" id="age" name="age" type="text" value="<?php echo set_value('age'); ?>">
            		  	        </div>
            		  	    </div>
            		  	</div>
	                </div>
	                <div class="row">
    		  	        <div class="col-6">
    		  	            <div class="row">
    		  	                <div class="col-4">
    		  	                    <label for="contactNo">Contact No<span class="man">*</span></label>
    		  	                </div>
    		  	                <div class="col-8">
                                    <?php 
                                    if( form_error('contactNo') ){
                                        $errorClass = 'form-error-class';
                                        echo sprintf( '<span class="form-error-class">%s</span>', form_error('contactNo') );
                                    }
                                    else{
                                        $errorClass = '';
                                    }
                                    ?>
    		  	                    <input class="form-control <?php echo $errorClass;?>" id="contactNo" name="contactNo" type="text" value="<?php echo set_value('contactNo'); ?>"  maxlength="20">
    		  	                </div>
    		  	            </div>
            		  	</div>
            		  	<div class="col-6">
            		  	    <div class="row">
            		  	        <div class="col-4">
            		  	            <?php
                    		  		$cat = ( set_value('category')!==''  ) ? set_value('category') : '1';
                    				$len = count($category);
                    				?>
                    		    	<label for="category">Category<span class="man">*</span></label>
            		  	        </div>
            		  	        <div class="col-8">
            		  	            <select class="form-control" id="category" name="category" reqired>
                    					<?php
                    					for($z= 0; $z<$len;$z++){
                    						if($category[$z]->id == $cat){
                    							?>
                    							<option value="<?php echo $category[$z]->id;?>" selected><?php echo $category[$z]->cat_name ;?></option>
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
            		  	    </div>
            		  	</div>
	                </div>
	                <div class="row">
	                    <div class="col-6">
	                        <div class="row">
	                            <div class="col-4">
	                                <label for="parentName">Parent /Guardian Name</label>
	                            </div>
	                            <div class="col-8">
                                    <?php 
                                    if( form_error('parentName') ){
                                        $errorClass = 'form-error-class';
                                        echo sprintf( '<span class="form-error-class">%s</span>', form_error('parentName') );
                                    }
                                    else{
                                        $errorClass = '';
                                    }
                                    ?>
	                                <input class="form-control <?php echo $errorClass;?>" id="parentName" name="parentName" type="text" value="<?php echo set_value('parentName'); ?>"  maxlength="100">
	                            </div>
	                        </div>
            		  	</div>
            		  	<div class="col-6">
            		  	    <div class="row">
            		  	        <div class="col-4">
            		  	            <label for="emgNo">Emergency Contact No</label>
            		  	        </div>
            		  	        <div class="col-8">
                                    <?php 
                                    if( form_error('emgNo') ){
                                        $errorClass = 'form-error-class';
                                        echo sprintf( '<span class="form-error-class">%s</span>', form_error('emgNo') );
                                    }
                                    else{
                                        $errorClass = '';
                                    }
                                    ?>
            		  	            <input class="form-control <?php echo $errorClass;?>" id="emgNo" name="emgNo" type="text" value="<?php echo set_value('emgNo'); ?>"  maxlength="20">
            		  	        </div>
            		  	    </div>
            		  	</div>
	                </div>
	                <div class="row">
	                    <div class="col-6">
	                        <div class="row">
	                            <div class="col-4">
	                                <label for="remarks">Remarks</label>
	                           </div>
	                            <div class="col-8">
                                    <?php 
                                    if( form_error('remarks') ){
                                        $errorClass = 'form-error-class';
                                        echo sprintf( '<span class="form-error-class">%s</span>', form_error('remarks') );
                                    }
                                    else{
                                        $errorClass = '';
                                    }
                                    ?>
	                                <textarea class="form-control <?php echo $errorClass;?>" rows="2" id="remarks" name="remarks"  maxlength="200"><?php echo set_value('remarks'); ?></textarea>
	                            </div>
	                        </div>
            		  	</div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-4">
                                    <label for="remarks">Blood group</label>
                               </div>
                                <div class="col-8">
                                    <?php
                                    $bloodGroup = set_value('bloodGroup');
                                    $bloodGroupArray = array('N/A', 'A+','A-','AB+', 'AB-', 'B+', 'B-', 'O+', 'O-', 'Other');
                                    $len = count($bloodGroupArray);
                                    ?>
                                    <select class="form-control" id="bloodGroup" name="bloodGroup">
                                        <?php
                                        for($z= 0; $z<$len;$z++){
                                            if($bloodGroupArray[$z] == $bloodGroup){
                                                ?>
                                                <option value="<?php echo $bloodGroupArray[$z];?>" selected><?php echo $bloodGroupArray[$z] ;?></option>
                                                <?php
                                            }
                                            else{
                                                ?>
                                                <option value="<?php echo $bloodGroupArray[$z];?>"><?php echo $bloodGroupArray[$z];?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
	                </div>
	            </div>
	        </div>
	        <div class="col-4">
	            <div class="seperator-div">
	                <div class="row">
	                    <div class="col-12">
	                        <div class="row">
	                            <div class="col-3">
	                                <label for="house">House</label>
	                            </div>
                                <div class="col-1"></div>
	                            <div class="col-8">
                                    <?php 
                                    if( form_error('house') ){
                                        $errorClass = 'form-error-class';
                                        echo sprintf( '<span class="form-error-class">%s</span>', form_error('house') );
                                    }
                                    else{
                                        $errorClass = '';
                                    }
                                    ?>
	                                <input class="form-control <?php echo $errorClass;?>" id="ex3" name="house" type="text" value="<?php echo set_value('house'); ?>" maxlength="100">
	                            </div>
	                        </div>
            		  	</div>
            		  	<div class="col-12">
            		  	    <div class="row">
            		  	        <div class="col-3">
            		  	            <label for="place">Place/Street	</label>
            		  	        </div>
                                <div class="col-1"></div>
            		  	        <div class="col-8">
                                    <?php 
                                    if( form_error('place') ){
                                        $errorClass = 'form-error-class';
                                        echo sprintf( '<span class="form-error-class">%s</span>', form_error('place') );
                                    }
                                    else{
                                        $errorClass = '';
                                    }
                                    ?>
            		  	            <input class="form-control <?php echo $errorClass;?>" id="place" name="place" type="text" value="<?php echo set_value('place'); ?>"  maxlength="100">
            		  	        </div>
            		  	    </div>
            		  	</div>
            		  	<div class="col-12">
            		  	    <div class="row">
            		  	        <div class="col-3">
            		  	            <label for="poffice">Post Office</label>
            		  	        </div>
                                <div class="col-1"></div>
            		  	        <div class="col-8">
                                    <?php 
                                    if( form_error('poffice') ){
                                        $errorClass = 'form-error-class';
                                        echo sprintf( '<span class="form-error-class">%s</span>', form_error('poffice') );
                                    }
                                    else{
                                        $errorClass = '';
                                    }
                                    ?>
            		  	            <input class="form-control <?php echo $errorClass;?>" id="poffice" name="poffice" type="text" value="<?php echo set_value('poffice'); ?>" maxlength="50">
            		  	        </div>
            		  	    </div>
            		  	</div>
            		  	<div class="col-12">
            		  	    <div class="row">
            		  	        <div class="col-3">
            		  	            <label for="district">Distric</label>
            		  	        </div>
                                <div class="col-1"></div>
            		  	        <div class="col-8">
                                    <?php 
                                    if( form_error('district') ){
                                        $errorClass = 'form-error-class';
                                        echo sprintf( '<span class="form-error-class">%s</span>', form_error('district') );
                                    }
                                    else{
                                        $errorClass = '';
                                    }
                                    ?>
            		  	            <input class="form-control <?php echo $errorClass;?>" id="district" name="district" type="text" value="<?php echo set_value('district'); ?>"  maxlength="50">
            		  	        </div>
            		  	    </div>
            		  	</div>
            		  	<div class="col-12">
            		  	    <div class="row">
            		  	        <div class="col-3">
            		  	            <label for="state">State</label>
            		  	        </div>
                                <div class="col-1"></div>
            		  	        <div class="col-8">
                                    <?php 
                                    if( form_error('state') ){
                                        $errorClass = 'form-error-class';
                                        echo sprintf( '<span class="form-error-class">%s</span>', form_error('state') );
                                    }
                                    else{
                                        $errorClass = '';
                                    }
                                    ?>
            		  	            <input class="form-control <?php echo $errorClass;?>" id="state" name="state" type="text" value="<?php echo set_value('state'); ?>"  maxlength="50">
            		  	        </div>
            		  	    </div>
            		  	</div>
            		  	<div class="col-12">
            		  	    <div class="row">
            		  	        <div class="col-3">
            		  	            <label for="pin">Pin</label>
            		  	        </div>
                                <div class="col-1"></div>
            		  	        <div class="col-8">
                                    <?php 
                                    if( form_error('pin') ){
                                        $errorClass = 'form-error-class';
                                        echo sprintf( '<span class="form-error-class">%s</span>', form_error('pin') );
                                    }
                                    else{
                                        $errorClass = '';
                                    }
                                    ?>
            		  	            <input class="form-control <?php echo $errorClass;?>" id="pin" name="pin" type="text" value="<?php echo set_value('pin'); ?>"  maxlength="10">
            		  	        </div>
            		  	    </div>
            		  	</div>
	                </div>
	           </div>
	        </div>
	        </div>
	        <div class="row align-items-center align-width" style="margin-top:10px;">
	            <div class="col-6">
	                <div class="row align-items-center">
	                    <div class="col-6">
	                        <div>
	                            <div class="form-check-inline">
                				 	<label><input type="checkbox" name="print[]" value="idcard" checked>Print ID card</label>
                				</div>
	                        </div>
	                        <div>
	                            <div class="form-check-inline">
                				  	<label><input type="checkbox" name="print[]"  value="coverPage" checked>Print Cover page</label>
                				</div>
	                        </div>
	                    </div>
	                    <div class="col-6">
	                        <button type="submit" id="saveAndPrint" name="saveAndPrint" class="btn btn-primary">Save and print</button>
	                    </div>
	                </div>
    		  	</div>
    		  	<div class="col-6">
    		  	    <div class="footer-sec text-right">
    		  	        <button type="submit" id="submit-btn" name="save" class="btn">Submit</button>
            			<button type="reset" class="btn">Cancel</button>
            			<button type="button" class="btn">Close</button>
            		</div>
    		  	</div>
	        </div>
		</div>
  	</form>
</div>
<script type="text/javascript" src="http://chavaradarsan.com/chavaraAdmissionsApplyOnline/assets/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body> 
</html>
<script type="text/javascript">

    const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
	$(document).ready(function(){


		$('#nav-icon1').click(function(){
    		$(this).toggleClass('open');
    		$('.side-bar').toggleClass('active');
    	});


		$( "#dob,#regDate" ).datepicker( {
		    format: 'dd-M-yyyy',autoclose:true} 
		    );

        setTodaysDate();
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

                $('#saveAndPrint').addClass('disabled');
                $('#saveAndPrint').attr('disabled',true);

                $('#regDate').removeClass('au-remove-pointer-events');

			}
			else{
				$('#regNo').attr('readonly',true);
				$(this).data('edit',true);
				$(this).empty();
				$(this).html('<i class="fa fa-pencil" style="font-size:24px"></i>');

				$('#submit-btn').removeClass('disabled');
				$('#submit-btn').attr('disabled',false);

                $('#saveAndPrint').removeClass('disabled');
                $('#saveAndPrint').attr('disabled',false);

                $('#regDate').addClass('au-remove-pointer-events');


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
		
		function setTodaysDate(){

    		var curDate = new Date();
    		var day = curDate.getDate();
    		if( day<10 ){
    			day = '0'+day;
    		}
    
    		$( "#regDate" ).val(day+'-'+months[curDate.getMonth()]+'-'+curDate.getFullYear());
    
    	}

        // $('#saveAndPrint').on('')
	});
</script>
