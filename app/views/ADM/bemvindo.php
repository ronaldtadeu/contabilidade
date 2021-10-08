<center><h1>Aqui você edita o bem vindo de seu site !</h1></center>
<br>
<br>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <?php echo $this->session->flashdata('sucesso');?>
                <form id="FormBV" role="form" method="POST" action="<?php echo base_url(); ?>admin_controle/CadBemVindo">
                    <div class="col-md-6">
                        <div class="form-group" >
                            <label style="font-size:20px;" for="Nome"  >Escreva um Texto: </label>
                            <br/>
                            <textarea name="Texto" id="Texto" class="form-control" style="border-color:black;border:solid 0.4px; border-radius:3px;" name="descricao" rows="4" cols="50"></textarea>
                        </div>
                        <br/>
                        <button class="btn" type="submit">Salvar</button>
                        
                        <button class="btn disabled" id="NovoRegistro" type="button" onclick="
                            tinymce.get('Texto').setContent('');
                            location.reload();" >Novo Registro</button>
                        <br/>
                        <br/>
                        <br/>
                    </div>
                    <div class="col-md-6" >
                        <table class="table table-bordered" style=" width: 100%; margin: 15px 0 0 0; " >
                            <thead>
                                <tr>
                                    <th align="center" >ID</th>
                                    <th>Texto</th>
                                    <th>Destaque</th>
                                    <th align="center" style="width: 15%;">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($Lista as $registro){ $id = $registro->id; ?>
                                <tr>
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $registro->texto; ?></td>
                                    <td align="center" ><input type="radio" onclick="atualizaDestaque(<?php echo $id; ?>)" id="destaque" name="destaque" <?php if($registro->destaque == 1){ ?> checked="true" <?php } ?> /></td>
                                    <td align="center" >
                                        <a style="cursor: pointer;" onclick="carregaDados(<?php echo $id; ?>)" ><i class="glyphicon glyphicon-pencil"></i></a>
                                        &nbsp;
                                        <a style="cursor: pointer;" onclick="window.location = '<?php echo base_url(); ?>admin_controle/DeletarBemVindo/<?php echo $id; ?>'" ><i class="glyphicon glyphicon-trash" ></i></a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" >
    function carregaDados(id){
        $.ajax({
            url: '<?php echo base_url(); ?>admin_controle/CarregaRegistro',
            type: 'POST',
            dataType: 'json',
            data:{id: id, tabela: "bemvindo"},
            success: function (result) {
                tinymce.get('Texto').setContent(result.texto);
                $("#NovoRegistro").removeClass("disabled")
                $("#FormBV").attr('action', "<?php echo base_url(); ?>admin_controle/AtualizarBemVindo/"+id);
            }
            
        });
    }
    
    function atualizaDestaque(id){
        $.ajax({
            url: '<?php echo base_url(); ?>admin_controle/atualizaDestaque',
            type: 'POST',
            dataType: 'json',
            data:{id: id, tabela: "bemvindo"},
            success: function (result) {
                
            }
            
        });
    }
    
</script>

<script src="http://cloud.tinymce.com/stable/tinymce.min.js?apiKey=1s0wsgyn080bx5gc94i0wxbcnlp1f5l0m2j1rbwvqlot09o6"></script>
<script>tinymce.init({selector: 'textarea'});</script>