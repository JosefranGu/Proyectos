<?php
class Derechohabiente
{

    private $derechohabienteTabla = "derechohabiente";
    public $id_deha;
    public $curp_deha;
    public $nombre_deha;
    public $tel_deha;
    public $correo_deha;
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function read()
    {
        if ($this->id_deha) {
            $stmt = $this->conn->prepare("SELECT * FROM " . $this->derechohabienteTabla . " WHERE id_deha = ?");
            $stmt->bind_param("i", $this->id_deha);
        } else {
            $stmt = $this->conn->prepare("SELECT * FROM " . $this->derechohabienteTabla);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    function create()
    {
        $stmt = $this->conn->prepare("
            INSERT INTO " . $this->derechohabienteTabla . "(`id_deha`, `curp_deha`, `nombre_deha`, `tel_deha`, `correo_deha`)
            VALUES(?, ?, ?, ?, ?)");

        $stmt->bind_param("sssss", $this->id_deha, $this->curp_deha, $this->nombre_deha, $this->tel_deha, $this->correo_deha);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }



    function update()
    {
        $stmt = $this->conn->prepare("
            UPDATE " . $this->derechohabienteTabla . " 
            SET curp_deha = ? ,
            nombre_deha = ? ,
            tel_deha = ? ,
            correo_deha = ?  
            WHERE id_deha = ?");

        $stmt->bind_param("ssssi", $this->curp_deha, $this->nombre_deha, $this->tel_deha, $this->correo_deha, $this->id_deha);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }



    function delete()
    {
        $stmt = $this->conn->prepare("
        DELETE FROM " . $this->derechohabienteTabla . " 
        WHERE id_deha = ?");

        $this->id_deha = htmlspecialchars(strip_tags($this->id_deha));

        // Fix the bind_param line to match the number of placeholders
        $stmt->bind_param("i", $this->id_deha);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
