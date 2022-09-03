<?php
session_start();
class Admin extends Controller{
    public $adminModel, $arhiveModel, $userModel;
    public function __construct(){
        $this->adminModel = $this->model("adminModel");
        $this->archiveModel = $this->model("archiveModel");
        $this->userModel = $this->model("usersModel");

    }

    public function index(){
        if(!isset($_SESSION["user"]) && $_SESSION["user_type"] !== "admin"){
            redirect("users/login");
        }
        $this->view("admin/dashboard");
    }

    //select request.users_id, users.firstname, users.lastname, users.email, users.date_created from request inner join users on request.user.id = users.user_id;

    public function requests(){
        $data = $this->adminModel->get_all_request();
        $this->view("admin/requests", $data);
    }

    public function archive(){
        $data = $this->archiveModel->get_archived();
        $this->view("admin/archive",$data);
    }

    public function get_all_archived(){
        $data = $this->archiveModel->get_archived();
        echo json_encode($data);
    }

    public function manage_users(){

        
   
   
        
        $data = $this->userModel->get_all_users_id();
        $requests = $this->userModel->get_users_request();
        $users = $this->userModel->get_all_users_id();
        
       
        foreach($users as $user){
           $temp[$user->firstname] = null;
        }
        
        foreach($users as $user){
            foreach($requests as $request){  
                if($user->user_id === $request->user_id){
                    $temp[$user->firstname] += 1;
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
               if($user_created){
                redirect("admin/manage_users");
               }
            } else{
                redirect("admin/manage_users");
            }
          
        }
      

        $this->view("admin/users", $data);
        
    }

    public function edit_user(){
        $user_id = htmlentities($_GET["user_id"]);
        $data = $this->userModel->get_single_user($user_id);
      
        $this->view("admin/edit_user", $data);
    }

    public function delete_user(){
        $user_id = htmlentities($_GET["user_id"]);
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
        $file_id = $_GET["file_id"];
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
        $renamed_filesystem = $this->rename_file(APPROOT . "\drive_main\\".$old_filename, APPROOT. "\drive_main\\" .$data["file_name"]);
        $file_updated = $this->archiveModel->file_update($data);
        if($file_updated && $renamed_filesystem){
            redirect("admin/archive");
        };
    }

    public function delete_file(){
        //get id of file to be deleted
        $file_name = htmlentities($_GET["file_name"]);
        $file_to_delete = htmlentities($_GET["file_id"]);

        $data = [
            "file_id" => $file_to_delete,
            "file_name" => $file_name,
        ];
        //delete the database record
        $db_record_deleted = $this->archiveModel->file_delete($data);
        //delete the file in the file system
        $file_deleted = unlink(APPROOT . "\drive_main\\" . $file_name);

        if($db_record_deleted && $file_deleted){
            redirect("admin/archive");
        }else{
            echo "Error in folder deletion. Please contact administrator.";
        }
        //return true if deleted
        
    }

    public function change_pass(){
        $user_id = htmlentities($_GET["id"]);
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
    }



    public function logout(){
        unset($_SESSION["user"]);
        unset($_SESSION["user_id"]);
        unset($_SESSION["user_type"]);
        session_unset();
        redirect("users/login");
    }

    public function search(){
      
        $data = ["keyword" => htmlentities($_GET["keyword"])];
        $result = $this->archiveModel->search_doc($data);
        echo json_encode($result);
    }

}