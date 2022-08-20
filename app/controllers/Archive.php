<?php 
class Archive extends Controller{
    private $archiveModel;
    public function __construct()
    {
        $this->archiveModel = $this->model("archiveModel");
    }

    public function search(){
        $data = ["keyword" => $_POST["query"]];
        if(!empty($data["keyword"])){
            $json = json_encode($this->archiveModel->search_doc($data));
            echo $json;
        }else{
            echo json_encode(array("message" => "No results"));
        }
       
       
    }
}