<?php 
    
    function nomesite(){
        return "catalogo_virtual";
    }
    function urlcomplemento(){
        return ".com.br";
    }
    function nomeempresa(){
        return "catalogo_virtual";
    }

    //-----------------------------------------------------------------------------------

    function urlsig(){
        if($_SERVER['REMOTE_ADDR'] == "127.0.0.1" or $_SERVER['REMOTE_ADDR'] == "::1"){
            return "http://localhost/".nomesite()."/sig";
        }
        else{
            return "https://".nomesite().urlcomplemento()."/sig";
        }
    }

    
    function urlsite($idioma = "", $pagina = ''){
        if(!$idioma or $idioma == "pt"){
            $idioma_url = "";
        }
        else{
            $idioma_url = "/".$idioma;
        }
        
        if(!$pagina){
            $pagina_url = "";
        }
        else if($pagina == "|pagina_atual|"){
            /*
            $pagina_nome = $_SERVER['SCRIPT_NAME'];
            $pagina_nome_pt = explode("/", $pagina_nome);
            $pagina_nome = end($pagina_nome_pt);
            $pagina_nome = str_replace(".php", "", $pagina_nome);
            $pagina_url = "/".$pagina_nome;
            */

            $pagina_nome = $_SERVER['REQUEST_URI'];
            if(substr($pagina_nome, -1, 1) == "/"){
                $pagina_nome = substr($pagina_nome, 0, -1);
            }
            $pagina_nome = str_replace("/en/", "", $pagina_nome);
            $pagina_nome = str_replace("/es/", "", $pagina_nome);
            $pagina_url = "/".$pagina_nome;
            $pagina_url = str_replace("//", "/", $pagina_url);
            
            //EVITA MANTER O IDIOMA QUANDO TROCAR
            if($idioma == "pt" or $idioma == "en" or $idioma == "es"){
                $pagina_url = str_replace("/pt", "/", $idioma);
                $pagina_url = str_replace("/es", "/", $idioma);
                $pagina_url = str_replace("/en", "/", $idioma);
            }
        }
        else{
            $pagina_url = "/".$pagina;
        }
        
        //LOCAL - TESTES
        if($_SERVER['REMOTE_ADDR'] == "127.0.0.1" or $_SERVER['REMOTE_ADDR'] == "::1"){
            $retorno = "http://localhost/".nomesite()."".$idioma_url.$pagina_url;
        }
        
        //HOMOLOGA��O
        else if(substr_count($_SERVER['REQUEST_URI'], "/clientes/".nomesite()."/") == 1){
            $retorno = "https://bmasolucoesdigitais.com.br/clientes/".nomesite()."".$idioma_url.$pagina_url;
        }
        
        //PRODU��O
        else{
            $retorno = "https://".nomesite().urlcomplemento()."".$idioma_url.$pagina_url;
        }
        
        return $retorno;
    }
    
    
    function detectaIdioma(){
        if(substr_count($_SERVER['REQUEST_URI'], "/en") == 1){
            $idioma = "en";
        }
        else if(substr_count($_SERVER['REQUEST_URI'], "/es") == 1){
            $idioma = "es";
        }
        else{
            $idioma = "";
        }
        return $idioma;
    }
    
    
    function receberPOST($variavel){
        $variavel = trim($variavel);
        $variavel = addslashes($variavel);
        $variavel = htmlspecialchars($variavel);
        //$variavel = preg_replace("/(from|select|insert|like|delete|where|drop table|show tables|#|--|\\\\)/","",$variavel);
        $variavel = strip_tags($variavel);
        return filter_input(INPUT_POST, $variavel);
    }
    
    
    function receberGET($variavel){
        $variavel = trim($variavel);
        $variavel = addslashes($variavel);
        $variavel = htmlspecialchars($variavel);
        //$variavel = preg_replace("/(from|select|insert|like|delete|where|drop table|show tables|#|--|\\\\)/","",$variavel);
        $variavel = strip_tags($variavel);
        return filter_input(INPUT_GET, $variavel);
    }
    
    
    function retornaPorcentagemComissicao(){
        return 10;
    }
    
    
    function getStatusCor($status){
        if($status == 1){
            $resultado = "background-color:#ffc107; color:#000;";
        }
        else if($status == 2){
            $resultado = "background-color:#28a745; color:#fff;";
        }
        else if($status == 3){
            $resultado = "background-color:#dc3545; color:#fff;";
        }
        else{
            $resultado = "";
        }
        return $resultado;
    }
    
    
    function mostraMeses($numero_mes = ''){
        $resultado = 
            array(
                "01" => "Janeiro",
                "02" => "Fevereiro",
                "03" => "Mar&ccedil;o",
                "04" => "Abril",
                "05" => "Maio",
                "06" => "Junho",
                "07" => "Julho",
                "08" => "Agosto",
                "09" => "Setembro",
                "10" => "Outubro",
                "11" => "Novembro",
                "12" => "Dezembro"
            );
        
        if($numero_mes != ''){
            $resultado = $resultado[$numero_mes];
        }
        
        return $resultado;
    }
    
    
    function whatsapp_link($celular){
        $celular = preg_replace("/[^0-9]/", "", $celular);
        return "https://api.whatsapp.com/send?phone=55".$celular;
    }
    
    
    function debugar($debug){
        $resultado  = "";
        $resultado .= "<hr><b>DEBUG</b><br>";
        $resultado .= $debug;
        $resultado .= "<hr>";
        return $resultado;
    }
    
    
    //RESGATA OS VIDEOS DO CANAL DO CLIENTE
    function obtem_videos_youtube(){
        /**
         * Project: Nome do seu projeto
         * Nome: Playlista
         * ID do cliente: 
         * Chave secreta do cliente: 
         * channelId: 
         */
        $chaveSecreta = 'AIzaSyA1FrYesW3B4eOgnJfnJh2tbhSbxTOGFNc';
        $channelId = 'UC3aF3ngDw5UxxcoK4PoTzVw';
        $ch = curl_init();
        $options = array(
            CURLOPT_URL => 'https://www.googleapis.com/youtube/v3/search?maxResults=100&order=date&part=snippet&channelId='.$channelId.'&key='.$chaveSecreta.'&t='.time(),
            CURLOPT_HEADER => false, 
            CURLOPT_SSL_VERIFYPEER => false, 
            CURLOPT_RETURNTRANSFER => true, 
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array('Accept-Encoding: gzip,deflate')
        );
        curl_setopt_array($ch, $options);
        $arquivo = curl_exec($ch);
        curl_close($ch);
        $playListas = json_decode(gzdecode($arquivo));
        
        return $playListas;
    }
    
    
    
    
    //FUN��ES DIVERSAS PARA UTILIZAR ------------------------------------------
    class Funcoes{
        
        public function mask($valor, $mask){    	//ex: $mostra_cnpj = mask($cnpj,'##.###.###/####-##');
            $mascarado = '';
            $k = 0;
            for($i=0; $i<=strlen($mask)-1; $i++){
                if($mask[$i] == '#'){
                    if(isset($valor[$k])){
                        $mascarado .= $valor[$k++];
                    }
                }else{
                    if(isset($mask[$i])){
                        $mascarado .= $mask[$i];
                    }
                }
            }
            return $mascarado;
	    }
        
        
        public function data_br_to_us($data){
            if(empty($data) or $data == "00/00/0000" or $data == "__/__/____"){
                $retorno = "";
            }
            else if(substr_count($data, "-") == 2){
                $retorno = $data;
            }
            else{
                $data_pt = explode("/", $data);
                $data_bum = $data_pt[2]."-".$data_pt[1]."-".$data_pt[0];
                $retorno = $data_bum;		//IR� RETORNAR ALGO ASSIM: 2014-11-26
            }
            return $retorno;
        }
        
        
        public function data_us_to_br($data){
            if(empty($data) or $data == "0000-00-00"){
                $retorno = "";
            }
            else if(substr_count($data, "/") == 2){
                $retorno = $data;
            }
            else{
                $data_pt = explode("-", $data);
                $data_bum = $data_pt[2]."/".$data_pt[1]."/".$data_pt[0];
                $retorno = $data_bum;		//IR� RETORNAR ALGO ASSIM: 2014-11-26
            }
            return $retorno;
        }
        
        
        public function datahora_us_to_br($datahora, $formatacao = 0){
            if(empty($datahora) or $datahora == "0000-00-00" or $datahora == "0000-00-00 00:00:00"){
                $retorno = "";
            }
            else{
                $datahora_pt = explode(" ", $datahora);
                $data = $datahora_pt[0];
                $hora = $datahora_pt[1];
                $data_pt = explode("-", $data);
                $hora_pt = substr($hora, 0, 5);
                
                if($formatacao == 0){
                    $retorno = $data_pt[2]."/".$data_pt[1]."/".$data_pt[0] . " - " . $hora_pt;		//IR� RETORNAR ALGO ASSIM: 2014-11-26 - 10:30:59
                }
                elseif($formatacao == 1){
                    $retorno = $data_pt[2]."/".$data_pt[1]."/".$data_pt[0] . " &agrave;s " . $hora_pt;		//IR� RETORNAR ALGO ASSIM: 2014-11-26 &agrave;s 10:30:59
                }
                elseif($formatacao == 2){
                    $retorno = $data_pt[2]."/".$data_pt[1]."/".$data_pt[0] . " - " . $hora_pt." hs";	//IR� RETORNAR ALGO ASSIM: 2014-11-26 - 10:30:59 hs
                }
                elseif($formatacao == 3){
                    $retorno = $data_pt[2]."/".$data_pt[1]."/".$data_pt[0] . " &agrave;s " . $hora_pt." hs";	//IR� RETORNAR ALGO ASSIM: 2014-11-26 &agrave;s 10:30:59 hs
                }
                elseif($formatacao == 4){
                    $retorno = $data_pt[2]."/".$data_pt[1]."/".$data_pt[0];                             //IR� RETORNAR ALGO ASSIM: 2014-11-26
                }
                elseif($formatacao == 5){
                    $retorno = $hora_pt;                                                                //IR� RETORNAR ALGO ASSIM: 10:30:59
                }
            }
            return $retorno;
        }
        
        
        public function data_us_to_uscombarra($data){
            if(empty($data) or $data == "0000-00-00"){
                $retorno = "";
            }
            else{
                $data_pt = explode("-", $data);
                $data_bum = $data_pt[0]."/".$data_pt[1]."/".$data_pt[2];
                $retorno = $data_bum;		//IR� RETORNAR ALGO ASSIM: 2014-11-26
            }
            return $retorno;
        }

        public static function criptografarDataHora() {
            $dataHora = date('Y-m-d H:i:s');
            $resultado = sha1($dataHora);
            return $resultado;
        }     

        //CONSULTA GENERICA
        function consultar($sql){
            $conexao = new Connection();
            $db = $conexao->openConnection();
            $consulta = $db->query($sql);
            return $consulta;
        }
        
        
        //CONVERTE UMA STRING TROCANDO ESPA�OS POR TRA�O
        function conversaoParaUrl($string){
            $string = str_replace(
                array("á", "é", "í", "ó", "ú", "à", "ã", "â", "ê", "ô", "õ", "ç"),
                array("a", "e", "i", "o", "u", "a", "a", "a", "e", "o", "o", "c"),
                $string
            );
            $string = str_replace(
                array("Á", "É", "Í", "Ó", "Ú", "À", "Ã", "Â", "Ê", "Ô", "Õ", "Ç"),
                array("a", "e", "i", "o", "u", "a", "a", "a", "e", "o", "o", "c"),
                $string
            );
            $string = str_replace(
                array("?", "/", "|", "+"),
                array("", "", "", ""),
                $string
            );
            $string = str_replace(" - ", "-", $string);
            $string = str_replace(" ", "-", $string);
            $string = str_replace(",", "", $string);
            $string = str_replace(".", "", $string);
            $string = strtolower($string);
            return $string;
        }
        
        
        /*
         * ADICIONA DIAS � UMA DATA
         * Como usar:
         * $Funcoes = new Funcoes();
         * echo $Funcoes->addsub_dias('2020-10-15', 10, "Y-m-d", "sub", "anos");      
         */
        function addsub_dias($data, $qtd, $formatacao = "Y-m-d", $addsub = "add", $diamesouano = "dias"){
            //echo $data."<br>".$qtd."<br>".$formatacao."<br>".$addsub."<br>".$diamesouano;
            
            //GAMBIARRA PARA ADICIONAR 31 DIAS QUANDO FOR ADICIONAR 1 MES - FEITO ISSO POIS ALGUNS MESES POSSUEM MENOS TEMPO
            /*if($diamesouano == "meses" and $qtd == 1){
                $diamesouano    = "dias";
                $qtd            = 31;
            }*/
            
            if(substr_count($data, "/") == 2){
                $Funcoes = new Funcoes();
                $data = $Funcoes->data_br_to_us($data);
            }
            
            if($diamesouano == "dias"){
                $DMY = "D";
            }else if($diamesouano == "meses"){
                $DMY = "M";
            }
            else if($diamesouano == "anos"){
                $DMY = "Y";
            }
            
            $date = new DateTime($data);
            $date->$addsub(new DateInterval("P".$qtd.$DMY));
            $resultado = $date->format($formatacao);
            
            return $resultado;
        }
        

        function addsub_dias2($data, $qtd, $formato = "Y-m-d"){
            $DMY = "D";
            $date = new DateTime($data);
            $date->add(new DateInterval("P".$qtd.$DMY));
            $resultado = $date->format($formato);
            
            return $resultado;
        }
        
        
        //COMPARANDO DATA (yyyy-mm-dd)
        public function comparaData($data_inicial, $data_final){
            
            // Calcula a diferen�a em segundos entre as datas
            $diferenca = strtotime($data_final) - strtotime($data_inicial);

            //Calcula a diferen�a em dias
            $dias = floor($diferenca / (60 * 60 * 24));
            
            return $dias;
        }
        
        
        //CONVERTANDO TELEFONE PARA MOSTRAR NO WHATSAPP
        public function converteNumeroParaWhatsapp($numero){
            $numero = str_replace("(", "", $numero);
            $numero = str_replace(")", "", $numero);
            $numero = str_replace("-", "", $numero);
            $numero = str_replace(" ", "", $numero);
            return $numero;
        }
       
    }




    //USUARIOS -----------------------------------------------------------------
    class Usuarios{
        private $IDUsuario;
        private $nome;
        private $email;
        private $senha;
        private $status;
        private $data;
        private $loginErro;
        private $validar;
        private $CadEditOK;
        
        
        public function getIDUsuario(){
            return $this->IDUsuario;
        }
        function getNome($formato = ''){
            if($formato == 'apelido'){
                $nome_pt = explode(" ", $this->nome);
                return $nome_pt[0];
            }else{
                return $this->nome;
            }
        }
        function getEmail(){
            return strtolower($this->email);
        }
        function getSenha($formato = ''){
            if($formato){
                $senha = str_repeat("*", strlen($this->senha)); 
                return $senha;
            }else{
                return $this->senha;
            }
        }
        function getStatus($modo_view = ''){
            if($modo_view){
                if($this->status == 0){
                    $resultado = "Inativo";
                }
                else if($this->status == 1){
                    $resultado = "Ativo";
                }
                else{
                    $resultado = "";
                }
                return $resultado;
            }else{
                return $this->status;
            }
        }
        function getData($formato = ''){
            if($formato){
                $date = new DateTime($this->data);
                return $date->format("d/m/Y");
            }else{
                return $this->data;
            }
        }
        function getLoginErro(){
            return $this->loginErro;
        }
        function getValidar(){
            return $this->validar;
        }
        function getCadEditOK(){
            return $this->CadEditOK;
        }

        
        function setIDUsuario($valor){
            $this->IDUsuario = $valor;
        }
        function setNome($valor){
            $this->nome = $valor;
        }
        function setEmail($valor){
            $this->email = $valor;
        }
        function setSenha($valor){
            $this->senha = $valor;
        }
        function setStatus($valor){
            $this->status = $valor;
        }
        function setData($valor){
            $this->data = $valor;
        }        
        function setLoginErro($valor){
            $this->loginErro = $valor;
        }        
        function setValidar($valor){
            $this->validar = $valor;
        }        
        function setCadEditOK($valor){
            $this->CadEditOK = $valor;
        }        
               
        
        public function carregarUsuarios($where = "", $order = "", $limit = "", $debug = 0){
            $conexao = new Connection();
            $db = $conexao->OpenConnection();
            
            $sql = "
                SELECT 
                  usuarios.*
                FROM usuarios 
                WHERE 1=1 ";
            
            if($where){
                $sql .= $where;
            }
            if($order){
                $sql .= " ORDER BY ".$order;
            }
            if($limit){
                $sql .= " LIMIT ".$limit;
            }
            if($debug == 1){
                echo debugar($sql);
                exit;
            }


            $consulta = $db->query($sql);
            if($consulta){
                $i=0;
                while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
                    $dados = new Usuarios();
                    
                    $dados->setIDUsuario($linha['id_usuario']);
                    $dados->setNome($linha['nome']);
                    $dados->setEmail($linha['email']);
                    //$dados->setSenha($linha['senha']);
                    $dados->setStatus($linha['status']);
                    $dados->setData($linha['data']);
                    
                    $array[$i] = $dados;
                    $i++;
                }
                return $array;
            }
            else{
                return false;
            }
        }
        
        
        //CONTAGEM DE REGISTROS PARA PAGINA��O
        public function contarUsuarios($where = "", $debug = 0){
            $conexao = new Connection();
            $db = $conexao->openConnection();
            
            $sql = "SELECT COUNT(id_usuario) as total FROM usuarios WHERE 1=1 ".$where;
            
            if($debug == 1){
                echo debugar($sql);
                exit;
            }
            
            $consulta  = $db->query($sql);
            $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
            return $resultado['total'];
        }
        
        
        //CADASTRANDO/EDITANDO
        public function salvarUsuarios(){
            $conexao = new Connection();
            $db = $conexao->openConnection();
            
            $Funcoes = new Funcoes();
            $erro = 0;
            
            //EDITAR OU CADASTRAR
            if($this->getIDUsuario()){
                $salvarTipo = "edit";
                if(is_numeric($this->getIDUsuario())){
                    $this->IDUsuario = sha1($this->IDUsuario);
                }
                $where_validacao = " AND SHA1(usuarios.id_usuario) != '".$this->getIDUsuario()."'";
            }else{
                $salvarTipo = "cad";
                $where_validacao = "";
            }
            
            //RECEBENDO OS CAMPOS E VALORES
            $grava = "";
            if($this->getNome()){
                $nome = trim(addslashes($this->getNome()));
                $grava .= "nome='$nome',";
            }
            if($this->getEmail()){
                $email = trim(addslashes($this->getEmail()));
                $email = strtolower($email);
                $grava .= "email='$email',";
            }
            if($this->getSenha()){
                $senha = trim(addslashes($this->getSenha()));
                $grava .= "senha='".sha1($senha)."',";
            }
            if($this->getStatus()){
                $status = trim(addslashes($this->getStatus()));
                $grava .= "status='$status',";
            }
            
            //VALIDANDO
            /*if(($this->getUltimoAcesso() or $this->getModalNovidadeVisualizado() or $this->getPreferenciaRefreshClientes() or $this->getAnotacoes() or $this->status or $this->contatoPrincipal) and $this->validar == 0){
                //N�O VALIDA POIS EST� APENAS ATUALIZANDO DATA/HORA DE ACESSO
            }else{
                if(empty($nome)){
                    $this->setNome('erro');
                    $erro = 1;
                }
                if(empty($email)){
                    $this->setEmail('erro');
                    $erro = 1;
                }else{
                    $oUsuario = $this->carregarUsuarios(" AND usuarios.email='".$email."' $where_validacao", "", "1");
                    if($oUsuario){
                        $this->setErroEmail("<span style='color:#ff0000;'>Este e-mail j� existe</span>");
                        $erro = 1;
                    }
                }
            }*/
            
            if($erro == 0){
                if($salvarTipo == "cad"){
                    $insert = "
                    INSERT INTO usuarios SET 
                    $grava
                    data = NOW()";
                    //echo $insert;exit;
                    $consulta = $db->query($insert);

                    if($consulta){
                        $result = new Usuarios();
                        $oResult = $result->carregarUsuarios(" AND usuarios.email = '$email'", "usuarios.id_usuario DESC", "1");
                        $this->setCadEditOK(sha1($oResult[0]->getIDUsuario()));
                    }                    
                }
                
                else if($salvarTipo == "edit"){
                    $update = "
                    UPDATE usuarios SET 
                      $grava
                      id_usuario = id_usuario
                    WHERE
                      SHA1(id_usuario) = '".$this->getIDUsuario()."'";
                    //echo $update;exit;
                    $consulta = $db->query($update);

                    $this->setCadEditOK($this->getIDUsuario());
                }
            }
            else{
                $this->setCadEditOK(0);
            }
            
            return $this;
        }
        
        
        //DELETANDO
        public function deletarUsuarios(){
            $erro = 0;
            if($erro == 0){
                $conexao = new Connection();
                $db = $conexao->openConnection();
                $delete = "UPDATE usuarios SET status='0' WHERE SHA1(id_usuario)='".$this->getIDUsuario()."' AND id_cliente='".$this->getIDCliente()."' AND id_cliente='".$this->getIDCliente()."'";
                //echo $delete;exit;
                $db->query($delete);
                $this->setDeleteOK("1");
            }else{
                $this->setDeleteOK("0");
            }
            return $this;
        }
        
        
        //LOGANDO
        public function loginUsuario($usuario, $senha){
            $conexao = new Connection();
            $db = $conexao->OpenConnection();
            
            //@$usuario = preg_replace(sql_regcase("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/"), "" ,$usuario);
            $usuario = trim($usuario);
            $usuario = strip_tags($usuario);
            $usuario = addslashes($usuario);
            $usuario = strtolower($usuario);
            $sql = "SELECT * FROM usuarios WHERE email = '$usuario'";
            $consulta = $db->query($sql);
            
            if($consulta){

                $linha = $consulta->fetch(PDO::FETCH_ASSOC);
                $total = $consulta->rowCount();
                $dados = new Usuarios();
                
                //VALIDANDO
                $erro = 0;
                if($total != 1){
                    $dados->setLoginErro(1);
                    $erro = 1;
                }
                
                //VALIDA
                if(empty($senha)){
                    $dados->setLoginErro(2);
                    $erro = 1;
                    $debug .= "|1|";
                }
                else if($linha['senha'] != sha1($senha)){
                    $dados->setLoginErro(3);
                    $erro = 1;
                    $debug .= "|2|";
                }
                /*else if($linha['status'] != 1 and $linha['status'] != 2){
                    $dados->setLoginErro(4);
                    $erro = 1;
                    $debug .= "|3|";
                }*/
                else if(substr_count($usuario, " ") != 0 or substr_count($senha, " ") != 0){
                    $dados->setLoginErro(5);
                    $erro = 1;
                    $debug .= "|4|";
                }

                if($erro == 0){                    
                    $dados->setIDUsuario($linha['id_usuario']);
                    $dados->setEmail($linha['email']);
                }

                return $dados;
            }
            else{
                return false;
            }
        }
    }

    
    

    //CATEGORIAS -----------------------------------------------------------------
    class Categorias{
        private $ID;
        private $Imagem;
        private $Titulo;
        private $Subtitulo;
        private $Url;
        private $Data;
        
        
        public function getID(){
            return $this->ID;
        }
        public function getImagem(){
           return $this->Imagem;
        }
        public function getTitulo(){
            return $this->Titulo;
        }
        public function getSubtitulo(){
            return $this->Subtitulo;
        }
        public function getUrl(){
            return $this->Url;
        }
        public function getData(){
            return $this->Data;
        }
           
                
        public function setID($valor){
            $this->ID = $valor;
        }
        public function setImagem($valor){
            $this->Imagem = $valor;
        }
        public function setTitulo($valor){
            $this->Titulo = $valor;
        }
        public function setSubtitulo($valor){
            $this->Subtitulo = $valor;
        }
        public function setUrl($valor){
            $this->Url = $valor;
        }
        public function setData($valor){
            $this->Data = $valor;
        }
        
                
        
        //CARREGANDO
        public function carregarCategorias($where = "", $order = "", $limit = "", $debug = 0){
            $conexao = new Connection();
            $db = $conexao->openConnection();
            
            $sql = "
            SELECT 
              categorias.*
            FROM
              categorias 
            WHERE 1 = 1 ";
            
            if($where){
                $sql .= $where;
            }
            $sql .= " AND categorias.titulo != ''";

            if($order){
                $sql .= " ORDER BY ".$order;
            }
            if($limit){
                $sql .= " LIMIT ".$limit;
            }
            if($debug == 1){
                echo debugar($sql);
                exit;
            }
            
            $consulta = $db->query($sql);
            if($consulta){
                $i=0;
                while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
                    $dados = new Categorias();
                    
                    $dados->setID($linha['id']);
                    $dados->setImagem($linha['imagem']);
                    $dados->setTitulo($linha['titulo']);
                    $dados->setSubtitulo($linha['subtitulo']);
                    $dados->setUrl($linha['url']);
                    $dados->setData($linha['data']);
                    
                    $array[$i] = $dados;
                    $i++;
                }
                return $array;
            }
            else{
                return false;
            }   
        }
        
        
        //CADASTRANDO/EDITANDO
        public function salvarCategorias(){
            $conexao = new Connection();
            $db = $conexao->openConnection();
            
            $Funcoes = new Funcoes();
            $erro = 0;
                    
            //EDITAR OU CADASTRAR
            if($this->ID){
                $salvarTipo = "edit";
                $id = trim(addslashes($this->ID));
                if(is_numeric($id)){
                    $id = sha1($id);
                }
            }
            else{
                $salvarTipo = "cad";
            }            
            
            //RECEBENDO OS CAMPOS E VALORES
            if(isset($this->Titulo)){
                $titulo = trim(addslashes($this->Titulo));
                $grava .= "titulo='$titulo',";
                $url = $Funcoes->conversaoParaUrl($titulo);
                $grava .= "url='$url',";
            }
            if(isset($this->Subtitulo)){
                $subtitulo = trim(addslashes($this->Subtitulo));
                $grava .= "subtitulo='$subtitulo',";
            }
            
            if($erro == 0){
                if($salvarTipo == "cad"){
                    
                    $insert = "
                    INSERT INTO categorias SET 
                    $grava
                    data = NOW()";
                    //echo $insert;exit;
                    if($db->query($insert)){
                        $Categorias = new Categorias();
                        $oCategorias = $Categorias->carregarCategorias("", "categorias.id DESC", 1);
                        if($oCategorias){
                            $this->ID = sha1($oCategorias[0]->ID);
                            $id_categorias = $oCategorias[0]->ID;
                            
                            mkdir ("../categorias/".$url, 0777, true);
                            $arquivo_cria = fopen("../categorias/".$url."/index.php", "w+");
                            fwrite($arquivo_cria, "<?php include(\"../index.php\"); ?>");
                            fclose($arquivo_cria);
                        }
                    }
                }
                
                else if($salvarTipo == "edit"){
                    $RegistroAtual = new Categorias();
                    $oRegistroAtual = $RegistroAtual->carregarCategorias(" AND SHA1(id) = '$id'");
                    $registro_url_atual = $oRegistroAtual[0]->getUrl();
                    
                    $update = "UPDATE categorias SET $grava id = id WHERE SHA1(id) = '$id'";
                    //echo $update;exit;
                    $consulta = $db->query($update);
                    
                    $Categorias = new Categorias();
                    $oCategorias = $Categorias->carregarCategorias(" AND SHA1(categorias.id) = '$id'", "", 1);
                    if($oCategorias){
                        $this->ID = sha1($oCategorias[0]->ID);
                        $id_categorias = $oCategorias[0]->ID;
                        
                        //RENOMEANDO A PASTA
                        if($registro_url_atual != $url){
                            @rename("../categorias/".$registro_url_atual, "../categorias/".$url);
                        }
                    }
                }

                //ADICIONANDO UMA IMAGEM DE CAPA
                if($this->Imagem['name']){
                    $img_name = $this->Imagem['name'];
                    $img_tmp  = $this->Imagem['tmp_name'];
                    
                    //$imagem_part = explode(".", $img_name);
                    //$imagem_extencao = end($imagem_part);
                    
                    $imagem_nome = strtolower($img_name);
                    $caminho = "../categorias_imagens/";
                    $caminho_e_arquivo = $caminho.$imagem_nome;
                   
                    @unlink($caminho_e_arquivo);
                    move_uploaded_file($img_tmp, $caminho_e_arquivo);

                    $update = "
                    UPDATE categorias SET   
                      imagem='$imagem_nome'
                    WHERE
                      SHA1(id) = '".$this->ID."'";
                    //echo $update;exit;
                    $consulta = $db->query($update);
                }
            }
            else{
                $this->setCadEditOK("0");
            }
            
            return $this;
        }
        
        
        //DELETANDO
        public function deletarCategorias(){
            $conexao = new Connection();
            $db = $conexao->openConnection();
                
            $erro = 0;
            
            if($erro == 0){
                $sql = "SELECT imagem FROM categorias WHERE SHA1(id) = '".$this->ID."'";
                $res = $db->query($sql);
                $lin = $res->fetch(PDO::FETCH_ASSOC);
                $imagem = $lin['imagem'];
                
                $delete = "DELETE FROM categorias WHERE SHA1(id) = '".$this->ID."'";
                //echo $delete;exit;
                if($db->query($delete)){
                    @unlink("../categorias_imagens/".$capa);
                }
            }else{
                
            }
            
            return $this;
        }
        
        
        //CONTAGEM DE REGISTROS PARA PAGINA��O
        public function contarCategorias($where = "", $debug = 0){
            $conexao = new Connection();
            $db = $conexao->openConnection();
            
            $sql = "SELECT COUNT(id) as total FROM categorias WHERE 1=1 ".$where;
            
            if($debug == 1){
                echo debugar($sql);
                exit;
            }
            
            $consulta  = $db->query($sql);
            $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
            return $resultado['total'];
        }
    }




    //CATEGORIAS -----------------------------------------------------------------
    class Galeria{
        private $ID;
        private $IDCategoria;
        private $Imagem;
        private $Data;
        
        
        function getID(){
            return $this->ID;
        }
        function getIDCategoria(){
           return $this->IDCategoria;
        }
        function getImagem(){
           return $this->Imagem;
        }
        function getData(){
            return $this->Data;
        }
           
                
        function setID($valor){
            $this->ID = $valor;
        }
        function setIDCategoria($valor){
            $this->IDCategoria = $valor;
        }
        function setImagem($valor){
            $this->Imagem = $valor;
        }
        function setData($valor){
            $this->Data = $valor;
        }
        
                
        
        //CARREGANDO
        public function carregarGaleria($where = "", $order = "", $limit = "", $debug = 0){
            $conexao = new Connection();
            $db = $conexao->openConnection();
            
            $sql = "
            SELECT 
              galeria.*
            FROM
              galeria 
            WHERE 1 = 1 ";
            
            if($where){
                $sql .= $where;
            }
            if($order){
                $sql .= " ORDER BY ".$order;
            }
            if($limit){
                $sql .= " LIMIT ".$limit;
            }
            if($debug == 1){
                echo debugar($sql);
                exit;
            }
            
            $consulta = $db->query($sql);
            if($consulta){
                $i=0;
                while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
                    $dados = new Galeria();
                    
                    $dados->setID($linha['id']);
                    $dados->setIDCategoria($linha['id_categoria']);
                    $dados->setImagem($linha['imagem']);
                    $dados->setData($linha['data']);
                    
                    $array[$i] = $dados;
                    $i++;
                }
                return $array;
            }
            else{
                return false;
            }   
        }
        
        
        //CADASTRANDO/EDITANDO
        public function salvarGaleria(){
            $conexao = new Connection();
            $db = $conexao->openConnection();
            
            $Funcoes = new Funcoes();
            $erro = 0;
                    
            //EDITAR OU CADASTRAR
            if($this->ID){
                $salvarTipo = "edit";
                $id = trim(addslashes($this->ID));
                if(is_numeric($id)){
                    $id = sha1($id);
                }
            }
            else{
                $salvarTipo = "cad";
            }         
            
            if($this->IDCategoria){
                $id_categoria = $this->IDCategoria;
                $grava = "id_categoria = ".$id_categoria.",";
            }
            
            if($erro == 0){
                if($salvarTipo == "cad"){
                    
                    $insert = "
                    INSERT INTO galeria SET 
                    $grava
                    data = NOW()";
                    //echo $insert;exit;
                    if($db->query($insert)){
                        $Galeria = new Galeria();
                        $oGaleria = $Galeria->carregarGaleria("", "galeria.id DESC", 1);
                        if($oGaleria){
                            $this->ID = sha1($oGaleria[0]->ID);
                            $id_galeria = $oGaleria[0]->ID;
                        }
                    }
                }
                
                /*else if($salvarTipo == "edit"){
                    $update = "UPDATE galeria SET $grava id = id WHERE SHA1(id) = '$id'";
                    //echo $update;exit;
                    $consulta = $db->query($update);
                    
                    $Categorias = new Categorias();
                    $oCategorias = $Categorias->carregarCategorias(" AND SHA1(categorias.id) = '$id'", "", 1);
                    if($oCategorias){
                        $this->ID = sha1($oCategorias[0]->ID);
                        $id_categorias = $oCategorias[0]->ID;
                    }
                }*/

                //ADICIONANDO UMA IMAGEM DE CAPA
                if($this->Imagem['name']){
                    $img_name = $this->Imagem['name'];
                    $img_tmp  = $this->Imagem['tmp_name'];
                    
                    //$imagem_part = explode(".", $img_name);
                    //$imagem_extencao = end($imagem_part);
                    
                    $imagem_nome = strtolower($img_name);
                    $caminho = "../galeria/";
                    $caminho_e_arquivo = $caminho.$imagem_nome;
                    //echo $caminho_e_arquivo;exit;
                    //if(file_exists($caminho_e_arquivo)){
                    @unlink($caminho_e_arquivo);
                    //}
                    move_uploaded_file($img_tmp, $caminho_e_arquivo);
                    
                    /*if($imagem_extencao != "webp"){
                        //DIMINUINDO O TAMANHO DO ARQUIVO
                        require_once("assets/resize/lib/WideImage.inc.php");
                        $image = wiImage::load($caminho_e_arquivo);
                        $image = $image->resize(700); 
                        $image->saveToFile($caminho_e_arquivo);
                    }*/
                    $update = "
                    UPDATE galeria SET   
                      imagem='$imagem_nome'
                    WHERE
                      SHA1(id) = '".$this->ID."'";
                    //echo $update;exit;
                    $consulta = $db->query($update);
                }
            }
            else{
                $this->setCadEditOK("0");
            }
            
            return $this;
        }
        
        
        //DELETANDO
        public function deletarGaleria(){
            $conexao = new Connection();
            $db = $conexao->openConnection();
                
            $erro = 0;
            
            if($erro == 0){
                $sql = "SELECT imagem FROM galeria WHERE SHA1(id) = '".$this->ID."'";
                $res = $db->query($sql);
                $lin = $res->fetch(PDO::FETCH_ASSOC);
                $imagem = $lin['imagem'];
                
                $delete = "DELETE FROM galeria WHERE SHA1(id) = '".$this->ID."'";
                //echo $delete;exit;
                if($db->query($delete)){
                    @unlink("../galeria/".$imagem);
                }
            }else{
                
            }
            
            return $this;
        }
        
        
        //CONTAGEM DE REGISTROS PARA PAGINA��O
        public function contarGaleria($where = "", $debug = 0){
            $conexao = new Connection();
            $db = $conexao->openConnection();
            
            $sql = "SELECT COUNT(id) as total FROM galeria WHERE 1=1 ".$where;
            
            if($debug == 1){
                echo debugar($sql);
                exit;
            }
            
            $consulta  = $db->query($sql);
            $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
            return $resultado['total'];
        }
    }

    
    

    //PAGINACAO --------------------------------------------------------------
    class Paginacao{
        private $keywords;
        private $paginaAtual;
        private $numeroDePaginas;
        
        
        public function __construct($keywords, $pg, $num_paginas){
            $this->setKeywords($keywords);
            $this->setPaginaAtual($pg);
            $this->setNumeroDePaginas($num_paginas);
        }
        
        
        private function getKeywords(){
            return $this->keywords;
        }
        private function getPaginaAtual(){
            return $this->paginaAtual;
        }
        private function getNumeroDePaginas(){
            return $this->numeroDePaginas;
        }
                        
        
        private function setKeywords($valor){
            $this->keywords = $valor;
        }
        private function setPaginaAtual($valor){
            $this->paginaAtual = $valor;
        }
        private function setNumeroDePaginas($numeroDePaginas){
            $this->numeroDePaginas = $numeroDePaginas;
        }
                
        
        public function carregarPaginacao(){
            $dados = "
            <nav aria-label='Page navigation example'>
                <ul class='pagination justify-content-center'>";

                if($this->getPaginaAtual() > 1){
                    $ante_pagina = $this->getPaginaAtual() - 1;
                    $dados .= "
                    <li class='page-item'>
                        <a class='page-link' href='?pg=".$ante_pagina.$this->getKeywords()."' tabindex='-1'>Anterior</a>
                    </li>";
                }
                else{
                    $dados .= "
                    <li class='page-item disabled'>
                        <a class='page-link' href='#'>Anterior</a>
                    </li>";
                }

                if($this->getPaginaAtual() <= 5){
                    $pag_num = 1;
                }else{
                    $pag_num = $this->getPaginaAtual() - 5;
                }
                $fim_num = $pag_num+11;

                for($num=$pag_num; $num<$fim_num; $num++){
                    $valida_num = $num;
                    if($valida_num <= $this->getNumeroDePaginas() or $valida_num == 1){
                        if($num == $this->getPaginaAtual()){
                            $dados .= "<li class='page-item active'><a class='page-link'>".$num."</a></li>";
                        }else{
                            $dados .= "<li class='page-item'><a class='page-link' href='?pg=".$num.$this->getKeywords()."'>$num</a></li>";
                        }
                    }
                }

                $prox_pagina = $this->getPaginaAtual() + 1;
                if($prox_pagina <= $this->getNumeroDePaginas()){
                    $dados .= "
                    <li class='page-item'>
                      <a class='page-link' href='?pg=".$prox_pagina.$this->getKeywords()."'>Pr&oacute;ximo</a>
                    </li>";
                }else{
                    $dados .= "
                    <li class='page-item disabled'>
                      <span class='page-link'>Pr&oacute;ximo</span>
                    </li>";
                }

                $dados .= "
                </ul>
            </nav>";

            //ELIMINANDO DESTAQUE CASO S� TENHA 1 P�GINA PARA EXIBIR
            if($this->getNumeroDePaginas() == 1){
                $dados = str_replace(" active", "", $dados);
            }

            return $dados;
        }
    }
    
    
    
    
    //ESTADOS ---------------------------------------------------------------------------
    class Estados{
        private $IDEstado;
        private $uf;
        private $estado;
        
        
        function getIDEstado(){
            return $this->IDEstado;
        }
        function getUf(){
            return $this->uf;
        }
        function getEstado(){
            return $this->estado;
        }
        
        
        public function setIDEstado($valor){
            $this->IDEstado = $valor;
        }
        public function setUf($valor){
            $this->uf = $valor;
        }
        public function setEstado($valor){
            $this->estado = $valor;
        }
        
        
        function carregarEstados($where = "", $order = "", $limit = "", $debug = 0){
            $conexao = new Connection();
            $db = $conexao->openConnection();
            
            $sql = "SELECT estados.* FROM estados WHERE 1=1 ";
            
            if($where){
                $sql .= $where;
            }
            if($order){
                $sql .= " ORDER BY ".$order;
            }else{
                $sql .= " ORDER BY estados.uf";
            }
            if($limit){
                $sql .= " LIMIT ".$limit;
            }
            
            if($debug == 1){
                echo debugar($sql);
                exit;
            }
            
            $consulta = $db->query($sql);
            
            if($consulta){
                $i=0;
                while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
                    $dados = new Estados();
                    
                    $dados->setIDEstado($linha['id_estado']);
                    $dados->setUf($linha['uf']);
                    $dados->setEstado($linha['estado']);
                    
                    $array[$i] = $dados;
                    $i++;
                }
                return $array;
            }
            else{
                return false;
            }
        }
    }
    
    
    
    
    //ENVIO DE E-MAILS ---------------------------------------------------------
    class Mail{
        public $remetenteNome;
        public $remetenteEmail;
        public $destinatarioEmail;
        public $destinatarioEmail2;
        public $destinatarioEmail3;
        public $assunto;
        public $corpo;
        public $corpoTitulo;
        public $corpoSubtitulo;
        public $logo;

        public function enviaEmail(){
            
            if(
            !$this->destinatarioEmail or
            !$this->assunto or
            !$this->corpo
            ){
                exit;
            }
            
            if(!$this->remetenteNome){
                $this->remetenteNome = nomeempresa();
            }
            if(!$this->remetenteEmail){
                $this->remetenteEmail = "contato@".nomesite().urlcomplemento();
            }
            
            require_once 'PHPMailer/PHPMailerAutoload.php';
            $mail = new PHPMailer;
            //$mail->SMTPDebug = 3;                                 // Enable verbose debug output

            $mail->isSMTP();                                        // Set mailer to use SMTP
            $mail->Host = 'rv1.u1.com.br';                          // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                                 // Enable SMTP authentication
            $mail->Username = "contato@".nomesite().urlcomplemento();      // SMTP username
            $mail->Password = 'Bma*342165641';                      // SMTP password
            $mail->SMTPSecure = '';                                 // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                      // TCP port to connect to

            $mail->setFrom($this->remetenteEmail, $this->remetenteNome);
            $mail->addAddress($this->destinatarioEmail);            // Add a recipient
            if($this->destinatarioEmail2){
                $mail->addCC($this->destinatarioEmail2);            // Add a copy
            }
            if($this->destinatarioEmail3){
                $mail->addCC($this->destinatarioEmail3);            // Add a copy
            }
            //$mail->addAddress('ellen@example.com');               // Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            $mail->isHTML(true);                                    // Set email format to HTML

            $mail->Subject = $this->assunto;
            $mail->Body    = $this->corpo;
            $mail->AltBody = '';
            
            /*if($_SERVER['REMOTE_ADDR'] == "201.13.34.178"){
                print_r($mail);
            }*/
            
            if(!$mail->send()){
                return false;
                /*echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;*/
            }else{
                return true;
                //echo 'Message has been sent';
            }
        }
        
        
        //ENVIO DE E-MAIL GEN�RICO
        public function corpoEmailGenerico($dados = ''){            
            if($this->corpoTitulo){
                $mostrarCorpoTitulo = "<h1>".$this->corpoTitulo."</h1>";
            }
            if($this->corpoSubtitulo){
                $mostrarCorpoSubtitulo = "<h2>".$this->corpoSubtitulo."</h2>";
            }
            if($this->link){
                $mostrarLink = $this->link;
            }
            if($this->logo == 1){
                $logo_caminho = urlsite()."/media/logo/logo_mod2_branco.png";
            }
            else{
                $logo_caminho = urlsite()."/sig/assets/logo/sig_logo.png";
            }
            
            $corpo = "
            <style>
                body, html  {padding:0; margin:0; border:0; font-family:arial; line-height: 24px; color:#333333; font-size: 13px;}
                .header     {width:100%; padding:20px 0 20px 0; margin:0 0 0 0; background-color:#284b2a; text-align:center;}
                .clienteiner  {width:100%; background-color:#dddddd; padding:20px 0 40px 0}
                .body       {width:80%; padding:20px; margin:auto; background-color:#ffffff; border-bottom:2px solid #284b2a}
                .body_esq   {position:relative; float:left; width:75%; height: 80px;}
                .body_dir   {position:relative; float:right; width:25%; height:80px; text-align:right;}
                .footer     {width:80%; padding:20px; margin:auto; background-color:#888888; border-top:1px solid #ffffff; color:#ffffff; text-align:right; font-size:10px;}
                h1          {font-family:arial; font-size:20px; font-weight:bold;}
                h2          {font-family:arial; font-size:14px;}
                .bt         {background-color:#ff6800; color:#ffffff; border:0; padding: 10px; border-radius: 5px; font-size:18px; cursor:pointer; text-align:center;}
                .bt_a       {color:#ffffff; text-align:center; cursor:pointer;}
                .link       {background-color:#338833; border-radius:5px; padding:10px 20px; color:#fff; text-decoration:none;}
            </style>
            <body>
                <div class='header'>
                    <img src='$logo_caminho' height='70'>
                </div>
                <div class='clienteiner'>
                    <div class='body'>
                        <div class='body_esq'>
                            $mostrarCorpoTitulo
                            $mostrarCorpoSubtitulo
                        </div>
                        <div class='body_dir'>
                            $mostrarLink
                        </div>
                        <div class='body_full'>
                            <hr>
                            $dados
                        </div>
                    </div>
                    <div class='footer'>
                        <strong><a href='".urlsite()."' class='bt_a'>".nomeempresa()."</a></strong>
                    </div>
                </div>
            </body>
            ";
            return $corpo;
        }
    }
    
    
    
    
    //IDIOMAS ------------------------------------------------------------------
    class Idiomas{
        private $Url;
        
        
        public function getUrl(){
            return $this->getUrl;
        }
        public function setUrl($valor){
            $this->Url = $valor;
        }
        
        
        public function defineUrl($formato = ''){
            $url = $_SERVER['DOCUMENT_ROOT'];
            
            if(!$formato){
                $url = str_replace(urlcomplemento()."/en", urlcomplemento(), $url);
                $url = str_replace(urlcomplemento()."/es", urlcomplemento(), $url);
                return $url;
            }
            else if($formato == 1){
                return $url;
            }
        }
    }
