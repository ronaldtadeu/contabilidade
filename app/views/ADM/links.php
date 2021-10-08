<center><h1>Aqui você coloca fotos em seu banner</h1></center>
<br/>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <?php echo $this->session->flashdata('sucesso'); ?>
                <form enctype="multipart/form-data" role="form" method="POST" action="<?php echo base_url(); ?>admin_controle/CadaBanners">
                    <div class="col-md-6">
                        <div class="form-group" >
                            <label style="font-size:20px;" for="Nome"  >Coloque a frase do banner</label>
                            <br/>
                            <input id="titulo" name="titulo" class="form-control" style="border-color:black;border:solid 0.4px; border-radius:3px;">
                        </div>
                    </div>
                    <div class="col-md-6" >
                        <h1>Coloque a foto do site</h1>
                        <img id="uploadPreview" style="border-color:black;border:solid 3px; width: 500px; height: 300px;" />
                        <br/>
                        <br/>
                        <input id="uploadImage" class="btn-default" type="file" name="userfile" onchange="PreviewImage();" />
                        <br/>
                        <button class="btn" type="submit">Salvar</button>
                        <button class="btn disabled" id="NovoRegistro" type="button" onclick="
                                $('#uploadPreview').val('');
                                $('#link').val('');
                                tinymce.get('Texto').setContent('');
                                location.reload();" >Novo Registro</button>
                        <br/>
                        <script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
                        <script>tinymce.init({selector: 'textarea'});</script>
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
<h1 style="text-align: center;" >Imagens Cadastradas</h1>
<table class="table table-bordered" style=" width: 100%; margin: 15px 0 0 0; " >
    <thead>
        <tr>
            <th align="center" >ID</th>
            <th>Imagens</th>
            <th>Frase</th>
            <th align="center" style="width: 15%;">Editar ou Excluir</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($Lista as $registro) {
            $id = $registro->id; ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td align="center"><img class="img-responsive" style=" width: 150px; " src="<?php echo base_url(); ?>uploads/<?php echo $registro->image; ?>" /></td>
                <td><?php echo $registro->titulo; ?></td>
                <td align="center" >
                    <a style="cursor: pointer;" onclick="carregaDados(<?php echo $id; ?>)" ><i class="glyphicon glyphicon-pencil"></i></a>
                    &nbsp;
                    <a style="cursor: pointer;" onclick="window.location = '<?php echo base_url(); ?>admin_controle/DeletarBanner/<?php echo $id; ?>'" ><i class="glyphicon glyphicon-trash" ></i></a>
                </td>
            </tr>
<?php } ?>
    </tbody>
</table>
<script type="text/javascript" >
    function carregaDados(id) {
        $.ajax({
            url: '<?php echo base_url(); ?>admin_controle/CarregaRegistro',
            type: 'POST',
            dataType: 'json',
            data: {id: id, tabela: "banner"},
            success: function (result) {
                $("#tituloprinc").val(result.tituloprinc);
                $("#titulo").val(result.titulo);
                $("#NovoRegistro").removeClass("disabled");
                $("#FormBV").attr('action', "<?php echo base_url(); ?>admin_controle/AtualizarBanner/" + id);
            }

        });
    }
</script>
<br/><br/>