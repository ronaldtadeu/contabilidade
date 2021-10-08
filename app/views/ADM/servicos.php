<center><h1>Aqui você edita os serviços de seu site !</h1></center>
<br/>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <?php echo $this->session->flashdata('sucesso'); ?>
                <form id="FormBV" enctype="multipart/form-data" role="form" method="POST" action="<?php echo base_url(); ?>admin_controle/Cadaservicos">
                    <div class="col-md-6">
                        <div class="form-group" >
                            <label style="font-size:20px;" for="Nome"  >Escreva  Titulo do Texto </label>
                            <br/>
                            <input id="titulo" name="titulo" class="form-control" style="border-color:black;border:solid 0.4px; border-radius:3px;">
                        </div>
                        <div class="form-group" >
                            <label style="font-size:20px;" for="Nome"  >Escreva seus Serviços: </label>
                            <br/>
                            <textarea id="Texto" name="texto" class="form-control" style="border-color:black;border:solid 0.4px; border-radius:3px;" name="descricao" rows="4" cols="50"></textarea>
                        </div>
                        <button class="btn" type="submit">Salvar</button>
                        <button class="btn disabled" id="NovoRegistro" type="button" onclick="
                                $('#tituloprinc').val('');
                                $('#titulo').val('');
                                tinymce.get('Texto').setContent('');
                                location.reload();" >Novo Registro</button>
                    </div>
                    <div class="col-md-6" >
                        <h1>Coloque a foto desejada</h1>
                        <img id="uploadPreview" style="border-color:black;border:solid 3px; width: 500px; height: 300px;" />
                        <br/>
                        <br/>
                        <input id="uploadImage" class="btn-default" type="file" name="userfile" onchange="PreviewImage();" />
                        <script type="text/javascript">

                            function PreviewImage() {
                                var oFReader = new FileReader();
                                oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

                                oFReader.onload = function (oFREvent) {
                                    document.getElementById("uploadPreview").src = oFREvent.target.result;
                                };
                            }
                            ;

                        </script> 
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<h1 style="text-align: center;" >Textos Criados</h1>
<table class="table table-bordered" style=" width: 100%; margin: 15px 0 0 0; " >
    <thead>
        <tr>
            <th align="center" >ID</th>
            <th>Título</th>
            <th>Texto</th>
            <th>Destaque</th>
            <th>Imagem</th>
            <th align="center" style="width: 15%;">Ação</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($Lista as $registro) {
            $id = $registro->id;
            ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $registro->titulo; ?></td>
                <td><?php echo $registro->texto; ?></td>
                <td align="center" ><input type="radio" onclick="atualizaDestaque(<?php echo $id; ?>)" id="destaque" name="destaque" <?php if($registro->destaque == 1){ ?> checked="true" <?php } ?> /></td>
                <td align="center"><img class="img-responsive" style=" width: 150px; " src="<?php echo base_url(); ?>uploads/<?php echo $registro->image; ?>" /></td>
                <td align="center" >
                    <a style="cursor: pointer;" onclick="carregaDados(<?php echo $id; ?>)" ><i class="glyphicon glyphicon-pencil"></i></a>
                    &nbsp;
                    <a style="cursor: pointer;" onclick="window.location = '<?php echo base_url(); ?>admin_controle/DeletarCadservocos/<?php echo $id; ?>'" ><i class="glyphicon glyphicon-trash" ></i></a>
                    
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
            data: {id: id, tabela: "servicos"},
            success: function (result) {
                $("#titulo").val(result.titulo);
                tinymce.get('Texto').setContent(result.texto);
                $("#NovoRegistro").removeClass("disabled");
                $("#uploadPreview").attr("src", "<?php echo base_url(); ?>uploads/"+result.image);
                $("#FormBV").attr('action', "<?php echo base_url(); ?>admin_controle/Atualizarservicos/" + id);
            }

        });
    }
    
    function atualizaDestaque(id){
        $.ajax({
            url: '<?php echo base_url(); ?>admin_controle/atualizaDestaque',
            type: 'POST',
            dataType: 'json',
            data:{id: id, tabela: "servicos"},
            success: function (result) {
                
            }
            
        });
    }
    
</script>
<br/><br/>