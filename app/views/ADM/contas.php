<center><h1>Aqui você edita e cria os usuarios de seu site !</h1></center>
<br/>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <?php echo $this->session->flashdata('sucesso'); ?>
                <form id="FormBV" enctype="multipart/form-data" role="form" method="POST" action="<?php echo base_url(); ?>admin_controle/CriaUsuario">
                    <div class="col-md-6">
                        <div class="form-group" >
                            <label style="font-size:20px;" for="Nome"  >Usuario: </label>
                            <br/>
                            <input id="usuario" name="usuario" class="form-control" style="border-color:black;border:solid 0.4px; border-radius:3px;">
                        </div>
                        <div class="form-group" >
                            <label style="font-size:20px;" for="Nome"  >Apelido: </label>
                            <br/>
                            <input id="Apelido" name="Apelido" class="form-control" style="border-color:black;border:solid 0.4px; border-radius:3px;">
                        </div>
                        <div class="form-group" >
                            <label style="font-size:20px;" for="Nome"  >Senha: </label>
                            <br/>
                            <input type="password" id="senha" name="senha" class="form-control" style="border-color:black;border:solid 0.4px; border-radius:3px;">
                        </div>
                        <button class="btn" type="submit">Cadastro</button>
                        <button class="btn disabled" id="NovoRegistro" type="button" onclick="
                                $('#usuario').val('');
                                $('#Apelido').val('');
                                $('#senha').val('');
                                location.reload();" >Novo Cadastro</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<h1 style="text-align: center;" >Contas Criadas</h1>
<table class="table table-bordered" style=" width: 100%; margin: 15px 0 0 0; " >
    <thead>
        <tr>
            <th align="center" >ID</th>
            <th>Usuario</th>
            <th>Apelido</th>
            <th align="center" style="width: 15%;">Ação</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($Lista as $registro) {
            $id = $registro->id;
            ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $registro->nome; ?></td>
                <td><?php echo $registro->Apelido; ?></td>
                <td align="center" >
                    <?php if($Login->id == $id){ ?>
                    <a style="cursor: pointer;" onclick="carregaDados(<?php echo $id; ?>)" ><i class="glyphicon glyphicon-pencil"></i></a>
                    &nbsp;
                    <a style="cursor: pointer;" onclick="window.location = '<?php echo base_url(); ?>admin_controle/DeletarUsuario/<?php echo $id; ?>'" ><i class="glyphicon glyphicon-trash" ></i></a>
                    <?php } ?>
                    
                </td>
            </tr>
<?php } ?>
    </tbody>
</table>
<script src="http://cloud.tinymce.com/stable/tinymce.min.js?apiKey=1s0wsgyn080bx5gc94i0wxbcnlp1f5l0m2j1rbwvqlot09o6"></script>
<script>tinymce.init({selector: 'textarea'});</script>
<script type="text/javascript" >
    function carregaDados(id) {
        $.ajax({
            url: '<?php echo base_url(); ?>admin_controle/CarregaRegistro',
            type: 'POST',
            dataType: 'json',
            data: {id: id, tabela: "logins"},
            success: function (result) {
                $("#usuario").val(result.nome);
                $("#Apelido").val(result.Apelido);
                $("#senha").val(result.senha);
                $("#NovoRegistro").removeClass("disabled");
                $("#FormBV").attr('action', "<?php echo base_url(); ?>admin_controle/AtualizaUsuario/" + id);
            }

        });
    }
</script>
<br/><br/>