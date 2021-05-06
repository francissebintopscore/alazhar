<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$config = array(
			'insertPatientsRecord' => array(
				array(
		                'field' => 'regNo',
		                'label' => 'Registration number',
		                'rules' => 'callback_checkRegNoFormat|callback_checkRegNoAlreadyExists',
		                'errors'=> array(
		                		'required' => 'You must provide a %s.',
		                ),
		        ),
		        array(
		                'field' => 'patientName',
		                'label' => 'Patient name',
		                'rules' => 'required|max_length[30]|trim',
		                'errors'=> array(
		                		'required' => 'You must provide a %s.',
		                		'max_length' => 'Length of %s must not exceed greater than 30.',
		                ),
		        ),
		        array(
		                'field' => 'dob',
		                'label' => 'Date Of Birth',
		                'rules' => 'callback_checkDateFormat',
		        ),
		        array(
		                'field' => 'age',
		                'label' => 'Age',
		                'rules' => 'required|less_than_equal_to[150]|trim',
		                'errors'=> array(
		                		'required' => 'You must provide a %s.',
		                		'less_than_equal_to' => '%s must not exceed greater than 150 and not contain any decimal values.',
		                ),
		        ),
		       array(
		                'field' => 'gender',
		                'label' => 'Gender',
		                'rules' => 'required|in_list[Male,Female,Others]|trim',
		                'errors'=> array(
		                		'required' => 'You must provide a %s.',
		                		'in_list' => 'The value of %s must Male,Female or Others.',
		                ),
		        ),
		       array(
		                'field' => 'house',
		                'label' => 'House',
		                'rules' => 'max_length[100]|trim',
		                'errors'=> array(
		                		'max_length' => 'The length of %s must not exceed 100 characters',
		                ),
		        ),
		       array(
		                'field' => 'place',
		                'label' => 'Place',
		                'rules' => 'max_length[100]|trim',
		                'errors'=> array(
		                		'max_length' => 'The length of %s must not exceed 100 characters',
		                ),
		        ),
		       array(
		                'field' => 'poffice',
		                'label' => 'Post office',
		                'rules' => 'max_length[50]|trim',
		                'errors'=> array(
		                		'max_length' => 'The length of %s must not exceed 50 characters',
		                ),
		        ),
		       array(
		                'field' => 'state',
		                'label' => 'State',
		                'rules' => 'max_length[50]|trim',
		                'errors'=> array(
		                		'max_length' => 'The length of %s must not exceed 50 characters',
		                ),
		        ),
		       array(
		                'field' => 'district',
		                'label' => 'Distric',
		                'rules' => 'max_length[50]|trim',
		                'errors'=> array(
		                		'max_length' => 'The length of %s must not exceed 50 characters',
		                ),
		        ),
		       array(
		                'field' => 'pin',
		                'label' => 'Pincode',
		                'rules' => 'max_length[10]|trim',
		                'errors'=> array(
		                		'max_length' => 'The length of %s must not exceed 10 characters',
		                ),
		        ),
		       array(
		                'field' => 'contactNo',
		                'label' => 'Contact Number',
		                'rules' => 'required|max_length[20]|trim',
		                'errors'=> array(
		                		'max_length' => 'The length of %s must not exceed 20 characters',
		                ),
		        ),
		       array(
		                'field' => 'parentName',
		                'label' => 'Parent/Guardian Name',
		                'rules' => 'max_length[100]|trim',
		                'errors'=> array(
		                		'max_length' => 'The length of %s must not exceed 100 characters',
		                ),
		        ),
		       array(
		                'field' => 'emgNo',
		                'label' => 'Emergency Contact Number',
		                'rules' => 'max_length[20]|trim',
		                'errors'=> array(
		                		'max_length' => 'The length of %s must not exceed 20 characters',
		                ),
		        ),
		       array(
		                'field' => 'category',
		                'label' => 'Category',
		                'rules' => 'required|trim',
		                'errors'=> array(
		                		'required' => 'You must provide a %s.',
		                ),
		        ),
		       array(
		                'field' => 'regDate',
		                'label' => 'Registration Date',
		                'rules' => 'required|callback_checkDateFormat',
		                'errors'=> array(
		                		'required' => 'You must provide a %s.',
		                ),
		        ),
		       array(
		                'field' => 'remarks',
		                'label' => 'Remarks',
		                'rules' => 'max_length[200]|trim',
		                'errors'=> array(
		                		'max_length' => 'The length of %s must not exceed 200 characters',
		                ),
		        ),
				array(
		                'field' => 'visitDate',
		                'label' => 'Visiting Date',
		                'rules' => 'callback_checkDateFormat',
		                // 'errors'=> array(
		                // 		'required' => 'You must provide a %s.',
		                // ),
		        ),
				array(
		                'field' => 'bremarks',
		                'label' => 'Remarks',
		                'rules' => 'max_length[200]|trim',
		                'errors'=> array(
		                		'max_length' => 'The length of %s must not exceed 200 characters',
		                ),
		        ),
		       
		    ),
		    'updatePatientsRecord' => array(
				array(
		                'field' => 'regNo',
		                'label' => 'Registration number',
		                'rules' => 'callback_checkRegNoFormat',
		                // 'rules' => 'required|valid_email',
		                'errors'=> array(
		                		'required' => 'You must provide a %s.',
		                ),
		        ),
		        array(
		                'field' => 'patientName',
		                'label' => 'Patient name',
		                'rules' => 'required|max_length[30]|trim',
		                'errors'=> array(
		                		'required' => 'You must provide a %s.',
		                		'max_length' => 'Length of %s must not exceed greater than 30.',
		                		// 'username_check' => '%s already taken',
		                ),
		        ),
		        array(
		                'field' => 'dob',
		                'label' => 'Date Of Birth',
		                'rules' => 'callback_checkDateFormat',
		        ),
		        array(
		                'field' => 'age',
		                'label' => 'Age',
		                'rules' => 'required|less_than_equal_to[150]|trim',
		                'errors'=> array(
		                		'required' => 'You must provide a %s.',
		                		'less_than_equal_to' => '%s must not exceed greater than 150 and not contain any decimal values.',
		                ),
		        ),
		       array(
		                'field' => 'gender',
		                'label' => 'Gender',
		                'rules' => 'required|in_list[Male,Female,Others]|trim',
		                'errors'=> array(
		                		'required' => 'You must provide a %s.',
		                		'in_list' => 'The value of %s must Male,Female or Others.',
		                ),
		        ),
		       array(
		                'field' => 'house',
		                'label' => 'House',
		                'rules' => 'max_length[100]|trim',
		                'errors'=> array(
		                		'max_length' => 'The length of %s must not exceed 100 characters',
		                ),
		        ),
		       array(
		                'field' => 'place',
		                'label' => 'Place',
		                'rules' => 'max_length[100]|trim',
		                'errors'=> array(
		                		'max_length' => 'The length of %s must not exceed 100 characters',
		                ),
		        ),
		       array(
		                'field' => 'poffice',
		                'label' => 'Post office',
		                'rules' => 'max_length[50]|trim',
		                'errors'=> array(
		                		'max_length' => 'The length of %s must not exceed 50 characters',
		                ),
		        ),
		       array(
		                'field' => 'state',
		                'label' => 'State',
		                'rules' => 'max_length[50]|trim',
		                'errors'=> array(
		                		'max_length' => 'The length of %s must not exceed 50 characters',
		                ),
		        ),
		       array(
		                'field' => 'district',
		                'label' => 'Distric',
		                'rules' => 'max_length[50]|trim',
		                'errors'=> array(
		                		'max_length' => 'The length of %s must not exceed 50 characters',
		                ),
		        ),
		       array(
		                'field' => 'pin',
		                'label' => 'Pincode',
		                'rules' => 'max_length[10]|trim',
		                'errors'=> array(
		                		'max_length' => 'The length of %s must not exceed 10 characters',
		                ),
		        ),
		       array(
		                'field' => 'contactNo',
		                'label' => 'Contact Number',
		                'rules' => 'required|max_length[20]|trim',
		                'errors'=> array(
		                		'max_length' => 'The length of %s must not exceed 20 characters',
		                ),
		        ),
		       array(
		                'field' => 'parentName',
		                'label' => 'Parent/Guardian Name',
		                'rules' => 'max_length[100]|trim',
		                'errors'=> array(
		                		'max_length' => 'The length of %s must not exceed 100 characters',
		                ),
		        ),
		       array(
		                'field' => 'emgNo',
		                'label' => 'Emergency Contact Number',
		                'rules' => 'max_length[20]|trim',
		                'errors'=> array(
		                		'max_length' => 'The length of %s must not exceed 20 characters',
		                ),
		        ),
		       array(
		                'field' => 'category',
		                'label' => 'Category',
		                'rules' => 'required|trim',
		                'errors'=> array(
		                		'required' => 'You must provide a %s.',
		                ),
		        ),
		       array(
		                'field' => 'regDate',
		                'label' => 'Registration Date',
		                'rules' => 'required|callback_checkDateFormat',
		                'errors'=> array(
		                		'required' => 'You must provide a %s.',
		                ),
		        ),
		       array(
		                'field' => 'remarks',
		                'label' => 'Remarks',
		                'rules' => 'max_length[200]|trim',
		                'errors'=> array(
		                		'max_length' => 'The length of %s must not exceed 200 characters',
		                ),
		        ),
		       
		    ),
		    'insertPatientsRevisitRecord' => array(
				array(
		                'field' => 'visitDate',
		                'label' => 'Consultation Date',
		                'rules' => 'required|callback_checkDateFormat',
		                'errors'=> array(
		                		'required' => 'You must provide a %s.',
		                ),
		        ),
		        array(
		                'field' => 'regNo',
		                'label' => 'Registration number',
		                'rules' => 'required',
		                'errors'=> array(
		                		'required' => 'You must provide a %s.',
		                		// 'username_check' => '%s already taken',
		                ),
		        ),
		        array(
		                'field' => 'department',
		                'label' => 'Department',
		                'rules' => 'required|trim',
		                'errors'=> array(
		                		'required' => 'You must provide a %s.',
		                		// 'username_check' => '%s already taken',
		                ),
		        ),
		        array(
		                'field' => 'remarks',
		                'label' => 'Remarks',
		                'rules' => 'max_length[200]|trim',
		                'errors'=> array(
		                		'max_length' => 'Length of %s must not exceed greater than 200.',
		                		// 'username_check' => '%s already taken',
		                ),
		        ),
		       
		    ),
		    'login' => array(
				array(
		                'field' => 'username',
		                'label' => 'Username',
		                'rules' => 'required',
		                'errors'=> array(
		                		'required' => 'You must provide a %s.',
		                ),
		        ),
		        array(
		                'field' => 'password',
		                'label' => 'Password',
		                'rules' => 'required',
		                'errors'=> array(
		                		'required' => 'You must provide a %s.',
		                ),
		        ),
		       
		    )
		);

$config['error_prefix'] = '';
$config['error_suffix'] = '';