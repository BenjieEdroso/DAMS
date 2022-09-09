<?php
session_start();
class Admin extends Controller{
    public $adminModel, $arhiveModel, $userModel;
    public function __construct(){
        $this->adminModel = $this->model("adminModel");
        $this->archiveModel = $this->model("archiveModel");
        $this->userModel = $this->model("usersModel");
        $this->requestModel = $this->model("requestModel");
        define("LOGIN_URL", "users/login");
        define("USER", "user");
        define("USER_TYPE", "user_type");
    }

    public function login_redirect(){
        if(!isset($_SESSION[USER]) && $_SESSION[USER_TYPE] !== "admin"){
            redirect(LOGIN_URL);
        }
    }

    public function index(){
        $this->login_redirect();
        $this->view("admin/dashboard");
    }

    public function requests(){
        $this->login_redirect();
        $data = $this->adminModel->get_all_request();
        $this->view("admin/requests", $data);
    }

    public function archive(){
        $this->login_redirect();
        $data = $this->archiveModel->get_archived();
        $this->view("admin/archive",$data);
    }

    public function get_all_archived(){
        $data = $this->archiveModel->get_archived();
        echo json_encode($data);
    }

    public function search_user(){
        $keyword = htmlentities($_GET["keyword"]);
        $results = $this->userModel->find_user($keyword);
        $request_count =$this->requestModel->get_request_count();
        foreach($results as $result){
            foreach($request_count as $count){
                if($result->user_id === $count->user_id){
                    $result->request_count = $count->request_count;
                }
            }
        }

        foreach ($results as $result){
            $html = "
            <tr>
                <td scope='row'> $result->user_id</td>
                <td>$result->request_count</td>
                <td> $result->firstname</td>
                <td> $result->lastname</td>
                <td> $result->email</td>
                <td>
                    <a href='". URLROOT ."/admin/edit_user?user_id= $result->user_id' class='btn btn-primary btn-sm'>Edit</a>
                    <a href='". URLROOT ."/admin/confirm_delete?user_id= $result->user_id' id='deleteBtn' class='btn btn-sm btn-danger'>Delete</a>
                    <a href='". URLROOT ."/admin/change_pass?user_id= $result->user_id' class='btn btn-secondary btn-sm'>Change Password</a>
                </td>
            </tr>";
            
            print_r($html);
        }
    }

    public function manage_users(){
        $this->login_redirect();
        $data = $this->userModel->get_all_users_id();
        $users = $this->userModel->get_all_users_id();
        $requests = $this->requestModel->get_request_count();
        foreach($users as $user){
            $temp[$user->firstname] = null;
        }
        foreach($users as $user){
            foreach($requests as $request){
                if($user->user_id === $request->user_id){
                    $temp[$user->firstname] += $request->request_count;
                }
            }
        }
        foreach($data as $single_data){
            $single_data->request_count = $temp[$single_data->firstname];
        }
        $this->view("admin/users",$data);
    }



    public function create_user(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $data = [
                "firstname" => $_POST["firstname"],
                "lastname" => $_POST["lastname"],
                "email" => $_POST["email"],
                "password" => password_hash($_POST["password"], PASSWORD_DEFAULT),
                "birthdate" => $_POST["birthdate"],
                "type" => $_POST["type"]
            ];
            $has_user = $this->userModel->has_user($data);
            if(!$has_user){
                $user_created = $this->userModel->create($data);
                $inital_request = $this->userModel->set_request($data);
                if($user_created && $inital_request){
                    redirect("admin/manage_users");
                }
            }else{
                redirect("admin/manage_users");
            }

        }
        $this->view("admin/users", $data);
    }

    public function edit_user(){
        $this->login_redirect();
        $user_id = htmlentities($_GET["user_id"]);
        $data = $this->userModel->get_single_user($user_id);
        $this->view("admin/edit_user", $data);
    }

    public function confirm_delete(){
        $this->login_redirect();
        $user_id = htmlentities($_GET["user_id"]);
        $data = ["user_id" => $user_id];
        $this->view("admin/confirm_delete", $data);
    }

    public function delete_user(){
        $user_id = htmlentities($_GET['user_id']);
        $user_deleted = $this->userModel->delete_user($user_id);
        if($user_deleted){
            redirect("admin/manage_users");
        }
    }

    public function update_user(){
        $user_id = htmlentities($_POST["user_id"]);
        $firstname = htmlentities($_POST["firstname"]);
        $lastname = htmlentities($_POST["lastname"]);
        $email = htmlentities($_POST["email"]);
        $data = [
            "user_id" => $user_id,
            "firstname" => $firstname,
            "lastname" => $lastname,
            "email" => $email
        ];
        $updated = $this->userModel->update_user($data);
        if($updated){
            redirect("admin/manage_users");
        }
    }

    public function edit_file(){
        $file_id = htmlentities($_GET["file_id"]);
        $data = $this->archiveModel->get_file($file_id);
        $this->view("admin/edit_file", $data);
    }
    
    public function rename_file($oldfilename, $newfilename){
        try{
            return rename($oldfilename, $newfilename);
        }catch(Exception $error){
            echo $error;
        }
    }

    public function update_file(){
        $data = [
            "file_id" => htmlentities($_POST["file_id"]),
            "file_name" => htmlentities($_POST["file_name"])
        ];
        $old_filename = $this->archiveModel->get_file($data["file_id"])[0]->file_name;
        $renamed_filesystem = $this->rename_file(APPROOT . "\drive_main\\".$old_filename, APPROOT. "\drive_main\\".$data["file_name"]);
        $file_updated = $this->archiveModel->file_update($data);
        if($file_updated && $renamed_filesystem){
            redirect("admin/archive");
        };
    }

    public function confirm_delete_file(){
        $this->login_redirect();
        $file_name = htmlentities($_GET["file_name"]);
        $file_to_delete = htmlentities($_GET["file_id"]);
        $data = [
        "file_id" => $file_to_delete,
        "file_name" => $file_name,
        ];
        $this->view("admin/confirm_delete_file", $data);
    }

    public function delete_file(){
        $this->login_redirect();
        $file_name = htmlentities($_GET["file_name"]);
        $file_to_delete = htmlentities($_GET["file_id"]);
        $data = [
            "file_id" => $file_to_delete,
            "file_name" => $file_name,
        ];
        $db_record_deleted = $this->archiveModel->file_delete($data);
        $file_deleted = unlink(APPROOT . "\drive_main\\" . $file_name);
        if($db_record_deleted && $file_deleted){
            redirect("admin/archive");
        }else{
            echo "Error in folder deletion. Please contact administrator.";
        }
    }

    public function change_pass(){
        $this->login_redirect();
        $user_id = htmlentities($_GET["user_id"]);
        $data = [
        "user_id" =>$user_id
        ];
        $this->view("admin/change_pass", $data);
    }

    public function update_pass(){
        $user_id = htmlentities($_POST["user_id"]);
        $old_pass = htmlentities($_POST["old_pass"]);
        $new_pass = htmlentities($_POST["new_pass"]);
        $confirm_pass = htmlentities($_POST["confirm_pass"]);
        $password_hash = $this->userModel->get_password($user_id)->password;
        $data = [
            "user_id" => $user_id,
            "password" => password_hash($new_pass, PASSWORD_DEFAULT)
        ];

        if(password_verify($old_pass, $password_hash) && $new_pass === $confirm_pass){
            $password_updated = $this->userModel->update_pass($data);
            if($password_updated){
                redirect("admin/manage_users");
            }
        }
        redirect("admin/manage_users");
    }



    public function logout(){
        unset($_SESSION[USER]);
        unset($_SESSION["user_id"]);
        unset($_SESSION[USER_TYPE]);
        session_unset();
        redirect(LOGIN_URL);
    }

    public function search(){
        $data = ["keyword" => htmlentities($_GET["keyword"])];
        $result = $this->archiveModel->search_doc($data);
        foreach($result as $archive){
            $jsx = "
            <tr class='result-row'>
                <th scope='row'>$archive->file_id</th>
                <td class='overflow-hidden custom-text' style='width: 275.13px;'>$archive->file_name</td>
                <td class='overflow-hidden'>$archive->file_type</td>
                <td class='overflow-hidden'>$archive->file_tmp_name</td>
                <td class='overflow-hidden'>$archive->file_error</td>
                <td class='overflow-hidden'>$archive->file_size</td>
                <td class='overflow-hidden'>$archive->file_date_uploaded</td>
                <td class='overflow-hidden'>$archive->file_date_modified</td>
                <td style='width: 120px;'>
                <a href='".URLROOT."/admin/edit_file?file_id=$archive->file_id' class='btn btn-primary btn-sm'>Edit</a>
                <a href='".URLROOT."/admin/confirm_delete_file?file_id=$archive->file_id&file_name=$archive->file_name' class='btn btn-sm btn-danger'>Delete</a>
                </td>
            </tr>";
            print_r($jsx);
        }
    }
}