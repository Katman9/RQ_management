<?php 

/**
 * SharedController Controller
 * @category  Controller / Model
 */
class SharedController extends BaseController{
	
	/**
     * employee_user_id_value_exist Model Action
     * @return array
     */
	function employee_user_id_value_exist($val){
		$db = $this->GetModel();
		$db->where("user_id", $val);
		$exist = $db->has("employee");
		return $exist;
	}

	/**
     * employee_email_address_value_exist Model Action
     * @return array
     */
	function employee_email_address_value_exist($val){
		$db = $this->GetModel();
		$db->where("email_address", $val);
		$exist = $db->has("employee");
		return $exist;
	}

	/**
     * finance_farm_number_option_list Model Action
     * @return array
     */
	function finance_farm_number_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT DISTINCT farm_number AS value , first_name AS label FROM requests ORDER BY label ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * requests_farm_number_value_exist Model Action
     * @return array
     */
	function requests_farm_number_value_exist($val){
		$db = $this->GetModel();
		$db->where("farm_number", $val);
		$exist = $db->has("requests");
		return $exist;
	}

	/**
     * works_on_farm_number_option_list Model Action
     * @return array
     */
	function works_on_farm_number_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT DISTINCT farm_number AS value , first_name AS label FROM requests ORDER BY label ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * getcount_yearlyrequests Model Action
     * @return Value
     */
	function getcount_yearlyrequests(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM requests Where year(date_of_request)=year(now())"
;
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_monthlyrequest Model Action
     * @return Value
     */
	function getcount_monthlyrequest(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM requests Where month (date_of_request)= month(now()) AND year(date_of_request)=year(now())";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_weaklyrequest Model Action
     * @return Value
     */
	function getcount_weaklyrequest(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM requests  Where week (date_of_request)= week (now()) AND year(date_of_request)=year(now())"
;
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_dailyrequest Model Action
     * @return Value
     */
	function getcount_dailyrequest(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM requests  Where date(date_of_request)= date(now())";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
	* barchart_revenue Model Action
	* @return array
	*/
	function barchart_revenue(){
		
		$db = $this->GetModel();
		$chart_data = array(
			"labels"=> array(),
			"datasets"=> array(),
		);
		
		//set query result for dataset 1
		$sqltext = "SELECT  SUM(amount_paid) AS sum_of_amount_paid, MONTHNAME(date_paid) AS monthname_of_date_paid FROM finance GROUP BY monthname_of_date_paid ORDER BY date_paid ASC";
		$queryparams = null;
		$dataset1 = $db->rawQuery($sqltext, $queryparams);
		$dataset_data =  array_column($dataset1, 'sum_of_amount_paid');
		$dataset_labels =  array_column($dataset1, 'monthname_of_date_paid');
		$chart_data["labels"] = array_unique(array_merge($chart_data["labels"], $dataset_labels));
		$chart_data["datasets"][] = $dataset_data;

		return $chart_data;
	}

	/**
	* piechart_requestsbydistrict Model Action
	* @return array
	*/
	function piechart_requestsbydistrict(){
		
		$db = $this->GetModel();
		$chart_data = array(
			"labels"=> array(),
			"datasets"=> array(),
		);
		
		//set query result for dataset 1
		$sqltext = "SELECT  COUNT(r.farm_number) AS count_of_farm_number, r.district FROM requests AS r GROUP BY r.district ORDER BY r.district ASC";
		$queryparams = null;
		$dataset1 = $db->rawQuery($sqltext, $queryparams);
		$dataset_data =  array_column($dataset1, 'count_of_farm_number');
		$dataset_labels =  array_column($dataset1, 'district');
		$chart_data["labels"] = array_unique(array_merge($chart_data["labels"], $dataset_labels));
		$chart_data["datasets"][] = $dataset_data;

		return $chart_data;
	}

}
