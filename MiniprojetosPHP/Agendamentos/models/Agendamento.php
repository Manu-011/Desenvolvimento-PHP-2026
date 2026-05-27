<? php 

// Puxa a classe de conexão com o banco
require_once '../models/Database.php';

class Agendamento {
    private $db;

    public function __construct() {
        $this->db = Database::conectar();
    }

    /**
     * REGRA DE NEGÓCIO: Verifica se o horário já está ocupado
     * Retorna TRUE se tiver conflito, e FALSE se estiver livre.
     */

    private function temConflito($id_profissional, $data, $inicio, $fim) {
        $sql = "SELECT COUNT(*) FROM agendamentos 
                WHERE id_profissional = :id_profissional 
                AND data_agendamento = :data 
                AND : inicio < horario_fim 
                AND :fim > horario_inicio";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':id_profissional' => $id_profissional,
            ':data' => $data,
            ':inicio' => $inicio,
            ':fim' => $fim
        ]);

        return $stmt->fetchColumn() > 0; // Retorna true se houver conflito
    }

    /**
     * CREATE: Insere o agendamento no banco após validar
     */
    public function criar($id_cliente, $id_profissional, $data, $inicio, $fim) {
        // Valida se o horário está livre
        if ($this->temConflito($id_profissional, $data, $inicio, $fim)) {
            return[
                "sucesso" => false,
                "mensagem" => 'Este horário já está ocupado. Por favor, escolha outro.'
            ];

        // 2. Se passou da validação, prepara o INSERT
        $sql = "INSERT INTO agendamentos (id_cliente, id_profissional, data_agendamento, horario_inicio, horario_fim)
                VALUES (:id_cliente, :id_profissional, :data_agendamento, :horario_inicio, :horario_fim)";
        }

        $stmt = $this->db->prepare($sql);
        $executou = $stmt->execute([
            ':id_cliente' => $id_cliente,
            ':id_profissional' => $id_profissional,
            ':data' => $data,
            ':inicio' => $inicio,
            ':fim' => $fim
        ]);

        // 3. Retorna o resultado para o Controller
        if ($executou) {
            return ["sucesso" => true, "mensagem" => "Agendamento criado com sucesso!."];
        } else {
            return ["sucesso" => false, "mensagem" => "Ocorreu um erro ao criar o agendamento."];
    }
    // READ: Lista os agendamentos do usuário (cliente ou profissional)
    
    public function listarPorUsuario($idUsuario, $tipoUsuario) {
    $coluna = ($tipoUsuario === 'cliente') ? 'id_cliente' : 'id_profissional';
    
    $sql = "SELECT * FROM agendamentos a
            WHERE a.$coluna = :idUsuario
            ORDER BY a.data_agendamento ASC, a.horario_inicio ASC";
            
  }
    $stmt = $this->db->prepare($sql);
    $stmt->execute([':idUsuario' => $idUsuario]);

  return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
}
?>