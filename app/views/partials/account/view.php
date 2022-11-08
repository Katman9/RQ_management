<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("employee/add");
$can_edit = ACL::is_allowed("employee/edit");
$can_view = ACL::is_allowed("employee/view");
$can_delete = ACL::is_allowed("employee/delete");
?>
<?php
$comp_model = new SharedController;
$page_element_id = "view-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data Information from Controller
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id; //Page id from url
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_edit_btn = $this->show_edit_btn;
$show_delete_btn = $this->show_delete_btn;
$show_export_btn = $this->show_export_btn;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="view"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">My Account</h4>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="card animated fadeIn page-content">
                        <?php
                        $counter = 0;
                        if(!empty($data)){
                        $rec_id = (!empty($data['employee_id']) ? urlencode($data['employee_id']) : null);
                        $counter++;
                        ?>
                        <div class="bg-primary m-2 mb-4">
                            <div class="profile">
                                <div class="avatar"><img src="<?php print_link("assets/images/avatar.png") ?>" /> 
                                </div>
                                <h1 class="title mt-4"><?php echo $data['user_id']; ?></h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mx-3 mb-3">
                                    <ul class="nav nav-pills flex-column text-left">
                                        <li class="nav-item">
                                            <a data-toggle="tab" href="#AccountPageView" class="nav-link active">
                                                <i class="fa fa-user"></i> Account Detail
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a data-toggle="tab" href="#AccountPageEdit" class="nav-link">
                                                <i class="fa fa-edit"></i> Edit Account
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a data-toggle="tab" href="#AccountPageChangeEmail" class="nav-link">
                                                <i class="fa fa-envelope"></i> Change Email
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a data-toggle="tab" href="#AccountPageChangePassword" class="nav-link">
                                                <i class="fa fa-key"></i> Reset Password
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="mb-3">
                                    <div class="tab-content">
                                        <div class="tab-pane show active fade" id="AccountPageView" role="tabpanel">
                                            <table class="table table-hover table-borderless table-striped">
                                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                                    <tr  class="td-employee_id">
                                                        <th class="title"> Employee Id: </th>
                                                        <td class="value">
                                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['employee_id']; ?>" 
                                                                data-pk="<?php echo $data['employee_id'] ?>" 
                                                                data-url="<?php print_link("employee/editfield/" . urlencode($data['employee_id'])); ?>" 
                                                                data-name="employee_id" 
                                                                data-title="Enter Employee Id" 
                                                                data-placement="left" 
                                                                data-toggle="click" 
                                                                data-type="number" 
                                                                data-mode="popover" 
                                                                data-showbuttons="left" 
                                                                class="is-editable" <?php } ?>>
                                                                <?php echo $data['employee_id']; ?> 
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr  class="td-first_name">
                                                        <th class="title"> First Name: </th>
                                                        <td class="value">
                                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['first_name']; ?>" 
                                                                data-pk="<?php echo $data['employee_id'] ?>" 
                                                                data-url="<?php print_link("employee/editfield/" . urlencode($data['employee_id'])); ?>" 
                                                                data-name="first_name" 
                                                                data-title="Enter First Name" 
                                                                data-placement="left" 
                                                                data-toggle="click" 
                                                                data-type="text" 
                                                                data-mode="popover" 
                                                                data-showbuttons="left" 
                                                                class="is-editable" <?php } ?>>
                                                                <?php echo $data['first_name']; ?> 
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr  class="td-surname">
                                                        <th class="title"> Surname: </th>
                                                        <td class="value">
                                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['surname']; ?>" 
                                                                data-pk="<?php echo $data['employee_id'] ?>" 
                                                                data-url="<?php print_link("employee/editfield/" . urlencode($data['employee_id'])); ?>" 
                                                                data-name="surname" 
                                                                data-title="Enter Surname" 
                                                                data-placement="left" 
                                                                data-toggle="click" 
                                                                data-type="text" 
                                                                data-mode="popover" 
                                                                data-showbuttons="left" 
                                                                class="is-editable" <?php } ?>>
                                                                <?php echo $data['surname']; ?> 
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr  class="td-gender">
                                                        <th class="title"> Gender: </th>
                                                        <td class="value">
                                                            <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $gender); ?>' 
                                                                data-value="<?php echo $data['gender']; ?>" 
                                                                data-pk="<?php echo $data['employee_id'] ?>" 
                                                                data-url="<?php print_link("employee/editfield/" . urlencode($data['employee_id'])); ?>" 
                                                                data-name="gender" 
                                                                data-title="Enter Gender" 
                                                                data-placement="left" 
                                                                data-toggle="click" 
                                                                data-type="radiolist" 
                                                                data-mode="popover" 
                                                                data-showbuttons="left" 
                                                                class="is-editable" <?php } ?>>
                                                                <?php echo $data['gender']; ?> 
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr  class="td-user_id">
                                                        <th class="title"> User Id: </th>
                                                        <td class="value">
                                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['user_id']; ?>" 
                                                                data-pk="<?php echo $data['employee_id'] ?>" 
                                                                data-url="<?php print_link("employee/editfield/" . urlencode($data['employee_id'])); ?>" 
                                                                data-name="user_id" 
                                                                data-title="Enter User Id" 
                                                                data-placement="left" 
                                                                data-toggle="click" 
                                                                data-type="text" 
                                                                data-mode="popover" 
                                                                data-showbuttons="left" 
                                                                class="is-editable" <?php } ?>>
                                                                <?php echo $data['user_id']; ?> 
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr  class="td-email_address">
                                                        <th class="title"> Email Address: </th>
                                                        <td class="value"> <?php echo $data['email_address']; ?></td>
                                                    </tr>
                                                    <tr  class="td-phone_no">
                                                        <th class="title"> Phone No: </th>
                                                        <td class="value">
                                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['phone_no']; ?>" 
                                                                data-pk="<?php echo $data['employee_id'] ?>" 
                                                                data-url="<?php print_link("employee/editfield/" . urlencode($data['employee_id'])); ?>" 
                                                                data-name="phone_no" 
                                                                data-title="Enter Phone No" 
                                                                data-placement="left" 
                                                                data-toggle="click" 
                                                                data-type="number" 
                                                                data-mode="popover" 
                                                                data-showbuttons="left" 
                                                                class="is-editable" <?php } ?>>
                                                                <?php echo $data['phone_no']; ?> 
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr  class="td-department_name">
                                                        <th class="title"> Department Name: </th>
                                                        <td class="value">
                                                            <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $department_name); ?>' 
                                                                data-value="<?php echo $data['department_name']; ?>" 
                                                                data-pk="<?php echo $data['employee_id'] ?>" 
                                                                data-url="<?php print_link("employee/editfield/" . urlencode($data['employee_id'])); ?>" 
                                                                data-name="department_name" 
                                                                data-title="Select a value ..." 
                                                                data-placement="left" 
                                                                data-toggle="click" 
                                                                data-type="select" 
                                                                data-mode="popover" 
                                                                data-showbuttons="left" 
                                                                class="is-editable" <?php } ?>>
                                                                <?php echo $data['department_name']; ?> 
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr  class="td-account_status">
                                                        <th class="title"> Account Status: </th>
                                                        <td class="value">
                                                            <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $account_status); ?>' 
                                                                data-value="<?php echo $data['account_status']; ?>" 
                                                                data-pk="<?php echo $data['employee_id'] ?>" 
                                                                data-url="<?php print_link("employee/editfield/" . urlencode($data['employee_id'])); ?>" 
                                                                data-name="account_status" 
                                                                data-title="Enter Account Status" 
                                                                data-placement="left" 
                                                                data-toggle="click" 
                                                                data-type="text" 
                                                                data-mode="popover" 
                                                                data-showbuttons="left" 
                                                                class="is-editable" <?php } ?>>
                                                                <?php echo $data['account_status']; ?> 
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </tbody>    
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="AccountPageEdit" role="tabpanel">
                                            <div class=" reset-grids">
                                                <?php  $this->render_page("account/edit"); ?>
                                            </div>
                                        </div>
                                        <div class="tab-pane  fade" id="AccountPageChangeEmail" role="tabpanel">
                                            <div class=" reset-grids">
                                                <?php  $this->render_page("account/change_email"); ?>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="AccountPageChangePassword" role="tabpanel">
                                            <div class=" reset-grids">
                                                <?php  $this->render_page("passwordmanager"); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        else{
                        ?>
                        <!-- Empty Record Message -->
                        <div class="text-muted p-3">
                            <i class="fa fa-ban"></i> No Record Found
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
