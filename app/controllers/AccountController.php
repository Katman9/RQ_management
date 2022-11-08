<?php 
/**
 * Account Page Controller
 * @category  Controller
 */
class AccountController extends SecureController{
	function __construct(){
		parent::__construct(); 
		$this->tablename = "employee";
	}
	/**
		* Index Action
		* @return null
		*/
	function index(){
		$db = $this->GetModel();
		$rec_id = $this->rec_id = USER_ID; //get current user id from session
		$db->where ("employee_id", $rec_id);
		$tablename = $this->tablename;
		$fields = array("employee_id", 
			"first_name", 
			"surname", 
			"gender", 
			"user_id", 
			"email_address", 
			"phone_no", 
			"department_name", 
			"account_status");
		$user = $db->getOne($tablename , $fields);
		if(!empty($user)){
			$page_title = $this->view->page_title = "My Account";
			$this->render_view("account/view.php", $user);
		}
		else{
			$this->set_page_error();
			$this->render_view("account/view.php");
		}
	}
	/**
     * Update user account record with formdata
	 * @param $formdata array() from $_POST
     * @return array
     */
	function edit($formdata = null){
		$request = $this->request;
		$db = $this->GetModel();
		$rec_id = $this->rec_id = USER_ID;
		$tablename = $this->tablename;
		 //editable fields
		$fields = $this->fields = array("employee_id","first_name","surname","gender","user_id","phone_no","department_name","account_status");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'employee_id' => 'required|numeric',
				'first_name' => 'required',
				'surname' => 'required',
				'gender' => 'required',
				'user_id' => 'required',
				'phone_no' => 'required|numeric',
				'department_name' => 'required',
			);
			$this->sanitize_array = array(
				'employee_id' => 'sanitize_string',
				'first_name' => 'sanitize_string',
				'surname' => 'sanitize_string',
				'gender' => 'sanitize_string',
				'user_id' => 'sanitize_string',
				'phone_no' => 'sanitize_string',
				'department_name' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['account_status'] = "Active";
			//Check if Duplicate Record Already Exit In The Database
			if(isset($modeldata['user_id'])){
				$db->where("user_id", $modeldata['user_id'])->where("employee_id", $rec_id, "!=");
				if($db->has($tablename)){
					$this->view->page_error[] = $modeldata['user_id']." Already exist!";
				}
			} 
			if($this->validated()){
				$db->where("employee.employee_id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					$db->where ("employee_id", $rec_id);
					$user = $db->getOne($tablename , "*");
					set_session("user_data", $user);// update session with new user data
					return $this->redirect("account");
				}
				else{
					if($db->getLastError()){
						$this->set_page_error();
					}
					elseif(!$numRows){
						//not an error, but no record was updated
						$this->set_flash_msg("No record updated", "warning");
						return	$this->redirect("account");
					}
				}
			}
		}
		$db->where("employee.employee_id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "My Account";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("account/edit.php", $data);
	}
	/**
     * Change account email
     * @return BaseView
     */
	function change_email($formdata = null){
		if($formdata){
			$email = trim($formdata['email_address']);
			$db = $this->GetModel();
			$rec_id = $this->rec_id = USER_ID; //get current user id from session
			$tablename = $this->tablename;
			$db->where ("employee_id", $rec_id);
			$result = $db->update($tablename, array('email_address' => $email ));
			if($result){
				$this->set_flash_msg("Email address changed successfully", "success");
				$this->redirect("account");
			}
			else{
				$this->set_page_error("Email not changed");
			}
		}
		return $this->render_view("account/change_email.php");
	}
}
