<?php
class Cita {
    private $citaTabla = "cita";
    public $id_cita;
    public $id_deha;
    public $id_med;
    public $fecha_cita;
    public $consultorio_cita;
    public $hi_cita;
    public $hf_cita;
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    function read() {
        if ($this->id_cita) {
            $stmt = $this->conn->prepare("SELECT * FROM " . $this->citaTabla . " WHERE id_cita = ?");
            $stmt->bind_param("i", $this->id_cita);
        } else {
            $stmt = $this->conn->prepare("SELECT * FROM " . $this->citaTabla);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    function create() {
        $stmt = $this->conn->prepare("
            INSERT INTO " . $this->citaTabla . "(`id_deha`, `id_med`, `fecha_cita`, `consultorio_cita`, `hi_cita`, `hf_cita`)
            VALUES(?,?,?,?,?,?)");

        $this->id_deha = htmlspecialchars(strip_tags($this->id_deha));
        $this->id_med = htmlspecialchars(strip_tags($this->id_med));
        $this->fecha_cita = htmlspecialchars(strip_tags($this->fecha_cita));
        $this->consultorio_cita = htmlspecialchars(strip_tags($this->consultorio_cita));
        $this->hi_cita = htmlspecialchars(strip_tags($this->hi_cita));
        $this->hf_cita = htmlspecialchars(strip_tags($this->hf_cita));

        $stmt->bind_param("iissss", $this->id_deha, $this->id_med, $this->fecha_cita, $this->consultorio_cita, $this->hi_cita, $this->hf_cita);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    function update() {
        $stmt = $this->conn->prepare("
            UPDATE " . $this->citaTabla . " 
            SET id_deha = ?,
                id_med = ?,
                fecha_cita = ?,
                consultorio_cita = ?,
                hi_cita = ?,
                hf_cita = ?
            WHERE id_cita = ?");

        $this->id_deha = htmlspecialchars(strip_tags($this->id_deha));
        $this->id_med = htmlspecialchars(strip_tags($this->id_med));
        $this->fecha_cita = htmlspecialchars(strip_tags($this->fecha_cita));
        $this->consultorio_cita = htmlspecialchars(strip_tags($this->consultorio_cita));
        $this->hi_cita = htmlspecialchars(strip_tags($this->hi_cita));
        $this->hf_cita = htmlspecialchars(strip_tags($this->hf_cita));
        $this->id_cita = htmlspecialchars(strip_tags($this->id_cita));

        $stmt->bind_param("iissssi", $this->id_deha, $this->id_med, $this->fecha_cita, $this->consultorio_cita, $this->hi_cita, $this->hf_cita, $this->id_cita);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    function delete() {
        $stmt = $this->conn->prepare("
            DELETE FROM " . $this->citaTabla . "
            WHERE id_cita = ?");

        $this->id_cita = htmlspecialchars(strip_tags($this->id_cita));

        $stmt->bind_param("i", $this->id_cita);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
?>
