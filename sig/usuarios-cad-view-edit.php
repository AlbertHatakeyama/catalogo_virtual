<?php 
    
    include_once("config.class.php");
    include_once("class.php");
    require_once("session.php");
 
    
    if(receberGET('id')){
        $id = receberGET('id');
    }else if(receberPOST('id')){
        $id = receberPOST('id');
    }

    
    if($id){
        $bt_nome = "ATUALIZAR";
    }else{
        $bt_nome = "OK";
    }
       
    
    if(receberPOST('submit')){
        
        //SALVANDO USU�RIO
        $UsuarioCadEdit = new Usuarios();
        $UsuarioCadEdit->setIDUsuario($id);
        $UsuarioCadEdit->setNome(receberPOST('nome'));
        $UsuarioCadEdit->setSenha(receberPOST('senha'));
        $UsuarioCadEdit->setValidar(1);        
        $UsuarioCadEdit->setEmail(receberPOST('email'));
        $UsuarioCadEdit->setStatus(receberPOST('status'));
        
        $oUsuarioCadEdit = $UsuarioCadEdit->salvarUsuarios();
        
        //CADASTRANDO
        if(receberGET('add')){
            if($oUsuarioCadEdit->getCadEditOK() != "0"){
                echo "<meta http-equiv='refresh' content='0; url=usuarios?id=".$oUsuarioCadEdit->getCadEditOK()."'>";
                exit;
            }
        }
        
        //EDITANDO
        else if($id){
            if($oUsuarioCadEdit->getCadEditOK() != "0"){
                unset($_POST);
            }
        }
    }


    //CLASSES
    $Usuarios = new Usuarios();
    
    if($id){
        $oUsuario = $Usuarios->carregarUsuarios(" AND SHA1(usuarios.id_usuario) = '$id'", "", "1");
        if(!$oUsuario){
            echo "<meta http-equiv='refresh' content='0; url=usuarios'>";
            exit;
        }
        $titulo_pg = "Usuário: ".$oUsuario[0]->getNome();

    }
    else if(receberGET('add')){
        $oUsuario = $Usuarios->carregarUsuarios(" AND 1=2", "", "1");
        $titulo_pg = "Cadastro de Usuário ";
    }
    
    
    $bt_topo[0]['link'] = "usuarios";
    $bt_topo[0]['link_target'] = "";
    $bt_topo[0]['link_title'] = "Voltar para a listagem dos Usuários";
    $bt_topo[0]['texto'] = "&lt; Voltar";
    $bt_topo[0]['tamanho'] = "70px;";
    
    $bt_topo[1]['link'] = "usuarios?add=1";
    $bt_topo[1]['link_target'] = "";
    $bt_topo[1]['link_title'] = "Adicionar novo Usuario";
    $bt_topo[1]['texto'] = "<span><i class='flaticon2-plus'></i></span>";
    $bt_topo[1]['tamanho'] = "";
    
    
    include_once("header.php");
    include_once("menu.php");
    include_once("topo.php");    
?>
                
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <form name="form1" id="form1" method="post" action="" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-5">
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    Dados cadastrais
                                </h3>
                            </div>
                        </div>
                        <div class="kt-portlet__body kt-portlet_principal">
                            <div class="form-group form-group-last">
                                <?php
                                if($oUsuarioCadEdit){
                                    //ERRO
                                    if($oUsuarioCadEdit->getCadEditOK() == "0"){
                                ?>
                                <div class="alert alert-terceiro" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
                                    <div class="alert-text">
                                            Alguns erros foram encontratos. 
                                    </div>
                                </div>
                                <?php
                                    }

                                    //CADASTRO/EDI��O OK
                                    if($oUsuarioCadEdit->getCadEditOK() != "0"){
                                ?>
                                <div class="alert alert-success">
                                    <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
                                    <div class="alert-text">
                                        Edição realizada com sucesso<br>
                                    </div>
                                </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                            
                            <div class="form-group form-row">
                                <label class="col-4 col-form-label">Nome</label>
                                <?php 
                                if($oUsuarioCadEdit){
                                    if($oUsuarioCadEdit->getNome() == "erro"){$nome_erro = 'is-invalid';}
                                }
                                if($_POST){$nome_value = receberPOST('nome');}else if($oUsuario){$nome_value = $oUsuario[0]->getNome();}else{$nome_value = "";}
                                ?>
                                <div class="col-8">
                                    <input type="text" name="nome" id="nome" value="<?=$nome_value?>" class="form-control <?=$nome_erro?>" required="">
                                </div>
                            </div>

                            <div class="form-group form-row">
                                <label class="col-4 col-form-label">E-mail</label>
                                <?php 
                                if($oUsuarioCadEdit){
                                    if($oUsuarioCadEdit->getEmail() == "erro"){$email_erro = 'is-invalid';}
                                }
                                if($_POST){$email_value = receberPOST('email');}else if($oUsuario){$email_value = $oUsuario[0]->getEmail();}else{$email_value = "";}
                                ?>
                                <div class="col-8">
                                    <input type="text" name="email" id="email" value="<?=$email_value?>" class="form-control <?=$email_erro?>" required="" <?=$disabled_email?>>
                                </div>
                            </div>

                            <div class="form-group form-row">
                                <label class="col-4 col-form-label">Senha</label>
                                <?php 
                                if($oUsuarioCadEdit){
                                    if($oUsuarioCadEdit->getSenha() == "erro"){$senha_erro = 'is-invalid';}
                                }
                                if($_POST){$senha_value = receberPOST('senha');}else if($oUsuario){$senha_value = "";}else{$senha_value = "";}
                                ?>
                                <div class="col-8">
                                    <input type="password" name="senha" id="senha" value="<?=$senha_value?>" class="form-control <?=$senha_erro?>" <?php if(!$id){echo "required=''";}?>>
                                </div>
                            </div>
                      
                            <div class="form-group form-row">
                                <label class="col-4 col-form-label">Status</label>
                                <div class="col-8">
                                    <select class="form-control" id="status" name="status" <?=$status_disabled?>>
                                        <?php
                                            if($_POST){
                                                if(receberPOST('status') == 0){$sel_status_0 = "selected='selected'";}
                                                if(receberPOST('status') == 1){$sel_status_1 = "selected='selected'";}
                                            }
                                            else if($oUsuario){
                                                if($oUsuario[0]->getStatus() == 0){$sel_status_0 = "selected='selected'";}
                                                if($oUsuario[0]->getStatus() == 1){$sel_status_1 = "selected='selected'";}
                                            }
                                            else{
                                                $sel_status_1 = "selected='selected'";
                                            }
                                        ?>
                                        <option value="1" <?=$sel_status_1?>>Ativo</option>
                                        <option value="0" <?=$sel_status_0?>>Inativo</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <button type="submit" name="submit" value="1" onclick="document.getElementById('form1').submit(); this.innerHTML='Salvando...'; this.disabled=true;" class="btn btn-primary"><?=$bt_nome?></button>
                                <input type="hidden" name="id" value="<?=$id?>">
                            </div>
                        </div>	
                    </div>
                </div>
            </div>
    
            <div class="botao_flutuando" style="width:100px; padding:10px; z-index:100">
                <button type="submit" name="submit" value="1" onclick="document.getElementById('form1').submit(); this.disabled=true;" class="btn btn-primary"><?=$bt_nome?></button>
                <?php
                    if($nome_pg != "meus-dados"){
                ?>
                <input type="hidden" name="id" value="<?=$id?>">
                <?php
                    }
                ?>
            </div>
        </form>
    </div>
</div>				

            
                    
<?php
    include("rodape.php");
?>