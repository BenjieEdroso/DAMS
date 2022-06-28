<?php
session_start();


class Admin extends Controller
{
    /**
     * @var mixed
     */
    private $admin_model;

    public function __construct()
    {
  
        $this->admin_model = $this->model("DashboardModel");
        $this->archive_model = $this->model("ArchiveModel");


    }

    public function index()
    {
    }

    public function dashboard()
    {   function unused_space(){
            $bytes= disk_free_space("D:");
            $si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
            $base = 1024;
            $class = min((int)log($bytes , $base) , count($si_prefix) - 1);
            return round($bytes / pow($base,$class), 2) . $si_prefix[$class];
        }

        function used_space(){
            $bytes= disk_free_space("D:");
            $bytes_total= disk_total_space("D:");
            $si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
            $base = 1024;
            $class = min((int)log(($bytes_total - $bytes) , $base) , count($si_prefix) - 1);
            return round(($bytes_total - $bytes) / pow($base,$class), 2) . $si_prefix[$class];
        }

        function files()
        {
            $dir = APPROOT . "\\drive_main";
            $dirs =  scandir($dir);
            $total = null;
            $docx_total =  null;
            $pdf_total =  null;
            for($i = 0; $i < count($dirs); $i++){
                if($dirs[$i] != "." && $dirs[$i] != ".."){
                    if(is_dir($dir . "\\" . $dirs[$i])){
                        $d = new FilesystemIterator($dir . "\\" . $dirs[$i]);
                        $docx = new CallbackFilterIterator($d, function($cur){
                            return $cur->getExtension() == "docx";
                        });

                        $pdf = new CallbackFilterIterator($d, function($cur){
                            return $cur->getExtension() == "pdf";
                        });
                        $docx_total  += iterator_count($docx);
                        $pdf_total  += iterator_count($pdf);

                        $total += iterator_count($d);
                    }

                    if(is_file($dir . "\\" . $dirs[$i])){
                        $total++;
                        $pi = pathinfo($dir . "\\" . $dirs[$i]);
                        if($pi["extension"] == "pdf"){
                            $pdf_total++;
                        }

                        if($pi["extension"] == "docx"){
                            $docx_total++;
                        }
                    }
                }
            }

            
            return [
              "total" => $total,
              "total_docx" => $docx_total,
              "total_pdf" => $pdf_total
            ];
        }
        $data = [
            "used" => used_space(),
            "un_used" => unused_space(),
            "total" => files()["total"],
            "total_docx" => files()["total_docx"],
            "total_pdf" => files()["total_pdf"],
            "master_list" => $this->admin_model->get_master_list()
        ];

        $this->view("admin/dashboard", $data);
    }

    public function monitoring(){
        $this->view("admin/monitoring");
    }

    public function request(){
        $this->view("admin/request");
    }

    public function processForm(){
        $this->view("admin/archiving");
    }
    public function archiving()
    {   $data= [
            "category" => $this->admin_model->get_categories(),
            "expiration" => $this->admin_model->get_expiration(),
            "files" => $this->admin_model->get_files(),
            "settings" => $this->admin_model->get_settings()
        ];
     
        $this->view("admin/archiving", $data);
    }
    
    public function documents()
    {
        $this->view("admin/documents");
    }
  
    public function monitor()
    {
        $this->view("admin/monitor");
    }
    public function control()
    {
        $this->view("admin/control");
    }

    public function user()
    {
        $this->view("admin/user");
    }

    public function delete_file($to_delete_file){
        if(file_exists($to_delete_file)){
            unlink($to_delete_file);
        }
    }

    public function write_log($log_msg){
        $log_file = fopen(ARCHIVE_PATH . 'system_logs.txt', 'w') or die ("Log file file not found please create a log file in archive main directory.");
        fwrite($log_file, $log_msg);
        fclose($log_file);
    }

    public function disposal(){
        $results = $this->archive_model->get_last_modification();
        $date_now = new DateTime();
        var_dump(gettype($date_now));
        foreach($results as $result){
            $old_date = new DateTime($result->file_date_modified);
            $interval = date_diff($old_date, $date_now)->days;
            if($interval >= 30){
                $to_delete_file = ARCHIVE_PATH . $result->file_category . "\\" . $result->file_name;
                $this->delete_file($to_delete_file);
                $this->write_log("deleted ----- " . $result->file_name . " from archive on " . date_format($date_now, 'Y-m-d h:i:s:A'));
            }
        }
    }

    public function search(){
        $query_param = $_GET["q"];
        $filter = $_GET['filter'];
        $data = ["q" => $query_param, "filter" => $filter];
        print_r($this->archive_model->query_search($data));
    }
}