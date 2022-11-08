<?php
/**
 * Menu Items
 * All Project Menu
 * @category  Menu List
 */

class Menu{
	
	
			public static $navbartopleft = array(
		array(
			'path' => 'home', 
			'label' => 'Home', 
			'icon' => ''
		),
		
		array(
			'path' => 'employee', 
			'label' => 'Employee', 
			'icon' => ''
		),
		
		array(
			'path' => 'finance', 
			'label' => 'Finance', 
			'icon' => ''
		),
		
		array(
			'path' => 'requests', 
			'label' => 'Requests', 
			'icon' => ''
		),
		
		array(
			'path' => 'works_on', 
			'label' => 'Works On', 
			'icon' => ''
		)
	);
		
	
	
			public static $gender = array(
		array(
			"value" => "Male", 
			"label" => "Male", 
		),
		array(
			"value" => "Female", 
			"label" => "Female", 
		),);
		
			public static $department_name = array(
		array(
			"value" => "Administrator", 
			"label" => "Administrator", 
		),
		array(
			"value" => "Finance", 
			"label" => "Finance", 
		),
		array(
			"value" => "Technical", 
			"label" => "Technical", 
		),
		array(
			"value" => "Lands", 
			"label" => "Lands", 
		),);
		
			public static $account_status = array(
		array(
			"value" => "Active", 
			"label" => "Active", 
		),
		array(
			"value" => "Pending", 
			"label" => "Pending", 
		),
		array(
			"value" => "Blocked", 
			"label" => "Blocked", 
		),);
		
			public static $status = array(
		array(
			"value" => "paid", 
			"label" => "Paid", 
		),
		array(
			"value" => "awaiting_payment", 
			"label" => "Awaiting_Payment", 
		),
		array(
			"value" => "cancelled", 
			"label" => "Cancelled", 
		),);
		
}