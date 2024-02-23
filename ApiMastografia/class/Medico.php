<?php
class Medico {
    
    private $medicoTabla = "medico";      
    public $id_med;
    public $rfc_med;
    public $nombre_med;
    public $tel_med;
    public $correo_med; 
    public $consultorio_med; 
    private $conn;
    
    public function __construct($db) {
        $this->conn = $db;
    }    
    
    function read() {    
        if ($this->id_med) {
            $stmt = $this->conn->prepare("SELECT * FROM ".$this->medicoTabla." WHERE id_med = ?");
            $stmt->bind_param("i", $this->id_med);                    
        } else {
            $stmt = $this->conn->prepare("SELECT * FROM ".$this->medicoTabla);        
        }        
        $stmt->execute();            
        $result = $stmt->get_result();        
        return $result;    
    }
    
    function create() {
        $stmt = $this->conn->prepare("
            INSERT INTO ".$this->medicoTabla."(`rfc_med`, `nombre_med`, `tel_med`, `correo_med`, `consultorio_med`)
            VALUES(?,?,?,?,?)");
        
        // Validate and sanitize input
        $this->rfc_med = htmlspecialchars(strip_tags($this->rfc_med));
        $this->nombre_med = htmlspecialchars(strip_tags($this->nombre_med));
        $this->tel_med = htmlspecialchars(strip_tags($this->tel_med));
        $this->correo_med = htmlspecialchars(strip_tags($this->correo_med));
        $this->consultorio_med = htmlspecialchars(strip_tags($this->consultorio_med));
        
        // Bind parameters
        $stmt->bind_param("ssiss", $this->rfc_med, $this->nombre_med, $this->tel_med, $this->correo_med, $this->consultorio_med);
        
        if ($stmt->execute()) {
            return true;
        }
     
        return false;         
    }
    
    function update() {
        $stmt = $this->conn->prepare("
            UPDATE ".$this->medicoTabla." 
            SET rfc_med = ? ,
                nombre_med = ? ,
                tel_med = ? ,
                correo_med = ? ,
                consultorio_med = ?  
            WHERE id_med = ?");
     
        // Validate and sanitize input
        $this->id_med = htmlspecialchars(strip_tags($this->id_med));
        $this->rfc_med = htmlspecialchars(strip_tags($this->rfc_med));
        $this->nombre_med = htmlspecialchars(strip_tags($this->nombre_med));
        $this->tel_med = htmlspecialchars(strip_tags($this->tel_med));
        $this->correo_med = htmlspecialchars(strip_tags($this->correo_med));
        $this->consultorio_med = htmlspecialchars(strip_tags($this->consultorio_med));
     
        // Bind parameters
        $stmt->bind_param("ssissi", $this->rfc_med, $this->nombre_med, $this->tel_med, $this->correo_med, $this->consultorio_med, $this->id_med);
        
        if ($stmt->execute()) {
            return true;
        }
     
        return false;
    }
    
    function delete() {
        $stmt = $this->conn->prepare("
            DELETE FROM ".$this->medicoTabla." 
            WHERE id_med = ?");
            
        // Validate and sanitize input
        $this->id_med = htmlspecialchars(strip_tags($this->id_med));
     
        // Bind parameters
        $stmt->bind_param("i", $this->id_med);
     
        if ($stmt->execute()) {
            return true;
        }
     
        return false;         
    }
    
}
?>
