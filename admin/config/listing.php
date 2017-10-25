<?php
/*
 * view - the path to the listing view that you want to display the data in
 * 
 * base_url - the url on which that pagination occurs. This may have to be modified in the 
 * 			controller if the url is like /product/edit/12
 * 
 * per_page - results per page
 * 
 * order_fields - These are the fields by which you want to allow sorting on. They must match
 * 				the field names in the table exactly. Can prefix with table name if needed
 * 				(EX: products.id)
 * 
 * OPTIONAL
 * 
 * default_order - One of the order fields above
 * 
 * uri_segment - this will have to be increased if you are paginating on a page like 
 * 				/product/edit/12
 * 				otherwise the pagingation will start on page 12 in this case 
 * 
 * 
 */
 

$config['contractors_index'] = array(
	"view"		=> 	'listing/listing',
	"init_scripts" => 'listing/init_scripts',
	"advance_search_view" => 'frontend/contractors/filter',
	"base_url"	=> 	'/contractors/index/',
	"per_page"	=>	"20",
	"fields"	=> array(   
						'company_name'=>array('name'=>'Company Name', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),					
						'first_name'=>array('name'=>'Contractor Name', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),
						'email1'=>array('name'=>'Email', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1),
						'office_phone'=>array('name'=>'Phone', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1),
						'status'=>array('name'=>'Status', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1)),

	"default_order"	=> "id",
	"default_direction" => "DESC"
);

$config['project_index'] = array(
	"view"		=> 	'listing/listing',
	"init_scripts" => 'listing/init_scripts',
	"advance_search_view" => 'frontend/project/filter',
	"base_url"	=> 	'/project/index/',
	"per_page"	=>	"20",
	"fields"	=> array(   
						'id'=>array('name'=>'Porject ID#', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),					
						'project_name'=>array('name'=>'Project Name', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),					
						'start_date'=>array('name'=>'Start Date', 'data_type' => 'date', 'sortable' => FALSE, 'default_view'=>1),
						'complete_date'=>array('name'=>'Completion Date', 'data_type' => 'date', 'sortable' => FALSE, 'default_view'=>1),
						'status'=>array('name'=>'Status', 'data_type' => 'status', 'sortable' => FALSE, 'default_view'=>1),
						'created_date'=>array('name'=>'Submited Date', 'data_type' => 'datetime', 'sortable' => FALSE, 'default_view'=>1)),

	"default_order"	=> "id",
	"default_direction" => "DESC"
);



$config['works_index'] = array(
	"view"		=> 	'listing/listing',
	"init_scripts" => 'listing/init_scripts',
	"advance_search_view" => 'frontend/works/filter',
	"base_url"	=> 	'/works/index/',
	"per_page"	=>	"20",
	"fields"	=> array(   
						'work_name'=>array('name'=>'Work Name', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),
						'status'=>array('name'=>'Status', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1)),

	"default_order"	=> "id",
	"default_direction" => "DESC"
);

$config['milestone_index'] = array(
	"view"		=> 	'listing/listing',
	"init_scripts" => 'listing/init_scripts',
	"advance_search_view" => 'frontend/milestone/filter',
	"base_url"	=> 	'/milestone/index/',
	"per_page"	=>	"20",
	"fields"	=> array(   
						'p_name'=>array('name'=>'Project Name', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1),
						'name'=>array('name'=>'Milestone Name', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),					
						// 'description'=>array('name'=>'Description', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),
						'start_date'=>array('name'=>'Start Date', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1),
						'end_date'=>array('name'=>'End Date', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1),
						'c_name'=>array('name'=>'Contractor Name', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1),
						'status'=>array('name'=>'Status', 'data_type' => 'status_change', 'sortable' => FALSE, 'default_view'=>1)),

	"default_order"	=> "id",
	"default_direction" => "DESC"
);


?>