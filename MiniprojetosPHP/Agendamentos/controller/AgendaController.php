<? php 
//controller/AgendaController.php
require_once '../models/agendamento.php';
// Puxamos o model que terá as regras de negocio
class AgendaController {
    private $model;

    public function __construct() {
        $this->model = new Agendamento();
    }

    /** 
     * CREATE : receba os dados do formulário e mandar salvar.
     */
    public function criarAgendamento() {
        // Verifica se a requisição veio de um formulário (POST)
        if ($_SERVER ['REQUEST_METHOD'] === 'POST') {
            // Pega os dados que vieram do formulário HTML
            // Nota: Em um sistema real, o id_cliente geralmente vem da $_SESSION
            $id_cliente = $_POST['id_cliente'] ?? '';
            $id_profissional = $_POST['id_profissional'] ?? '';
            $data = $_POST['data'] ?? '';
            $inicio = $_POST['inicio'] ?? '';
            $fim = $_POST['fim'] ?? '';

            // Manda o Model validar e salvar no banco
            $resultado = $this->model->criarAgendamento($id_cliente, $id_profissional, $data, $inicio, $fim);
            
            // Redireciona o usuário dependendo se deu certo ou errado
            if ($resultado === "sucesso") {
                header("Location: ../views/dashboard.php?sucesso=1");
                exit;
            } else {
                header("Location: ../views/dashboard.php?erro=" . urlencode($resultado['mensagem']));
                exit;
            }

           
        }
    }
    /** 
     * READ : Pede para o Model buscar a lista de agendamentos.
     */
    public function listarAgendamentos($idUsuario, $tipoUsuario) {
        return $this->model->listarAgendamentos($idUsuario, $tipoUsuario);
    }
}

?>