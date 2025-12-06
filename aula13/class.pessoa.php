<?php
class Pessoa{
    private $nome;
    private $sobrenome;
    private $dataNascimento;
    private $cpfcnpj;
    private $tipo;
    private $telefone; 
    private $endereco; 

    public function getNome(){
        return $this->nome;
    }

    public function getSobrenome(){
        return $this->sobrenome;
    }

    public function getDataNascimento(){
        return $this->dataNascimento;
    }

    public function getCpfcnpj(){
        return $this->cpfcnpj;
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function getTelefone(){
        return $this->telefone;
    }

    public function getEndereco(){
        return $this->endereco;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function setSobrenome($sobrenome){
        $this->sobrenome = $sobrenome;
    }

    public function setDataNascimento($data) {
        $this->dataNascimento = $data;
    }

    public function setCpfcnpj($cpfcnpj){
        $this->cpfcnpj = $cpfcnpj;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }

    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }

    public function getNomeCompleto(){
        return $this->nome . " " . $this->sobrenome;
    }

    public function getIdade(){
        $nasc = new DateTime($this->dataNascimento);
        $hoje = new DateTime();
        return $nasc->diff($hoje)->y;
    }

    public function inicializaClasse(){
        $this->nome = "";
        $this->sobrenome = "";
    }

    public function toJson() {
        $dados = [
            "nome"           => $this->nome,
            "sobrenome"      => $this->sobrenome,
            "dataNascimento" => $this->dataNascimento,
            "cpfcnpj"        => $this->cpfcnpj,
            "tipo"           => $this->tipo,
            "telefone"       => $this->telefone ? [
                "tipo"  => $this->telefone->getTipo(),
                "nome"  => $this->telefone->getNome(),
                "valor" => $this->telefone->getValor()
            ] : null,
            "endereco" => $this->endereco ? [
                "logradouro" => $this->endereco->getLogradouro(),
                "bairro"     => $this->endereco->getBairro(),
                "cidade"     => $this->endereco->getCidade(),
                "estado"     => $this->endereco->getEstado(),
                "cep"        => $this->endereco->getCep()
            ] : null
        ];
        return json_encode($dados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
}
?>