<?php
    class Sla extends Database {
        private $Slatable = 'hd_sla';
        private $dbConnect = false;
	    public function __construct(){		
            $this->dbConnect = $this->dbConnect();
        }   

        public function listSla(){
			//table for SLA database connection			 
            $sqlQuery = "SELECT id, severity, respond_within, resolve_within, operational_hours, escalation_severity
            status FROM ".$this-> Slatable;

            if(!empty($_POST["search"]["value"])){
                $sqlQuery .= ' (id LIKE "%'.$_POST["search"]["value"].'%" ';					
                $sqlQuery .= ' OR severity LIKE "%'.$_POST["search"]["value"].'%" ';
                $sqlQuery .= ' OR respond_within LIKE "%'.$_POST["search"]["value"].'%" ';		
                $sqlQuery .= ' OR resolved_within LIKE "%'.$_POST["search"]["value"].'%" ';
                $sqlQuery .= ' OR operational_hours LIKE "%'.$_POST["search"]["value"].'%" ';
                $sqlQuery .= ' (escalation_severity LIKE "%'.$_POST["search"]["value"].'%" ';	
            }
            $result = mysqli_query($this->dbConnect, $sqlQuery);
            $numRows = mysqli_num_rows($result);
            $slaData = array();	

            while( $department = mysqli_fetch_assoc($result) ) {		
                $slaRows = array();			
                // $status = '';
                // if($department['status'] == 1)	{
                //     $status = '<span class="label label-success">Enabled</span>';
                // } else if($department['status'] == 0) {
                //     $status = '<span class="label label-danger">Disabled</span>';
                // }	
                
                $slaRows[] = $department['id'];
                $slaRows[] = $department['severity'];			
                $slaRows[] = $department['respond_within'];		
                $slaRows[] = $department['resolve_within'];
                $slaRows[] = $department['operational_hours'];		
                $slaRows[] = $department['escalation_severity'];	
                $slaData[] = $slaRows;
                    
            }
            $output = array(
                "draw"				=>	intval($_POST["draw"]),
                "recordsTotal"  	=>  $numRows,
                "recordsFiltered" 	=> 	$numRows,
                "data"    			=> 	$slaData
            );
            echo json_encode($output);
        }    
    }

?>