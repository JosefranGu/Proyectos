<?php
class Diagnostico{   
    
    private $diagnosticoTabla = "diagnostico";      
    public $id_diagnostico;
    public $id_deha;
    public $diagnostico; 
    private $conn;
	
    public function __construct($db){
        $this->conn = $db;
    }	
	
    function read(){	
        if($this->id_diagnostico) {
            $stmt = $this->conn->prepare("SELECT * FROM ".$this->diagnosticoTabla." WHERE id_diagnostico = ?");
            $stmt->bind_param("i", $this->id_diagnostico);					
        } else {
            $stmt = $this->conn->prepare("SELECT * FROM ".$this->diagnosticoTabla);		
        }		
        $stmt->execute();			
        $result = $stmt->get_result();		
        return $result;	
    }
	
    function create(){
        $stmt = $this->conn->prepare("
            INSERT INTO ".$this->diagnosticoTabla."(`id_diagnostico`, `id_deha`, `diagnostico`)
            VALUES(?,?,?)");
        
        $this->id_deha = htmlspecialchars(strip_tags($this->id_deha));
        $this->diagnostico = htmlspecialchars(strip_tags($this->diagnostico));
        
        $stmt->bind_param("iss", $this->id_diagnostico, $this->id_deha, $this->diagnostico);
        
        if($stmt->execute()){
            return true;
        }
     
        return false;		 
    }
		
    function update(){
        $stmt = $this->conn->prepare("
            UPDATE ".$this->diagnosticoTabla." 
            SET id_deha = ?,
            diagnostico = ?  
            WHERE id_diagnostico = ?");
     
        $this->id_diagnostico = htmlspecialchars(strip_tags($this->id_diagnostico));
        $this->id_deha = htmlspecialchars(strip_tags($this->id_deha));
        $this->diagnostico = htmlspecialchars(strip_tags($this->diagnostico));
     
        $stmt->bind_param("ssi", $this->id_deha, $this->diagnostico, $this->id_diagnostico);
        
        if($stmt->execute()){
            return true;
        }
     
        return false;
    }
    
    function delete(){
        $stmt = $this->conn->prepare("
            DELETE FROM ".$this->diagnosticoTabla." 
            WHERE id_diagnostico = ?");
            
        $this->id_diagnostico = htmlspecialchars(strip_tags($this->id_diagnostico));
     
        $stmt->bind_param("i", $this->id_diagnostico);
     
        if($stmt->execute()){
            return true;
        }
     
        return false;		 
    }
}
?>
