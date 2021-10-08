<center><h1>Aqui você cria ou edita as galerias de seu site !</h1></center>
<br/>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <?php echo $this->session->flashdata('sucesso'); ?>
                <form id="FormBV" enctype="multipart/form-data" role="form" method="POST" action="<?php echo base_url(); ?>admin_controle/CadaGalerias">
                    <div class="col-md-6">
                        <div class="form-group" >

                            <label style="font-size:20px;" for="Nome"  >Escreva um Titulo para a Galeria</label>
                            <br/>
                            <input value="<?php if($img_galeria){ echo $img_galeria[0]->titulo; } ?>" id="titulo" name="titulo" class="form-control" style="border-color:black;border:solid 0.4px; border-radius:3px;">
                            <input value="<?php if($img_galeria){ echo $img_galeria[0]->id; } ?>" id="id_g" name="id_g" type="hidden" />
                        </div>
                        <button <?php if($img_galeria){ ?> class="btn disabled"  <?php } else { echo "class='btn'"; } ?> type="button" onclick="$('.some').slideDown(400);" >Pr�xima etapa</button>
                        <button <?php if(!$img_galeria){ ?> class="btn disabled"  <?php } else { echo "class='btn'"; } ?> id="NovoRegistro" type="button" onclick="
                                $('#tituloprinc').val('');
                                $('#titulo').val('');
                                window.location = '<?php echo base_url(); ?>admin_controle/Galerias';" >Novo Registro</button>
                        <br/>
                        <br/>
                        <br/>
                        <div <?php if(!$img_galeria){ ?> style="display: none;" <?php } ?> class="some" id="preview">
                         <h1 style="font-size:30px; text-align: center;" >Fotos j� cadastradas</h1>
                         <?php if($img_galeria){ foreach ($img_galeria as $registro) { ?>
                             <div class="col-md-6" >
                                 <a onclick="window.location = '<?php echo base_url(); ?>admin_controle/DeletarFotoGaleria/<?php echo $registro->id_galeria; ?>/<?php echo $registro->id_img; ?>'" style="cursor: pointer; color: red; float: right; " ><i class="glyphicon glyphicon-remove-circle"></i></a>
                                 <br />
                                 <img class="center" style="height:200px; list-style: none;  padding: 10px;" src="<?php echo base_url(); ?>uploads/<?php echo $registro->image; ?>"/>
                             </div>
                         <?php } } ?>
                        </div>
                    </div>
                    <div <?php if(!$img_galeria){ ?> style="display: none;" <?php } ?> class="col-md-6 some" >
                        <label style="font-size:20px;" for="Nome"  >Adicione uma foto a galeria <b style="font-size: 12px; color: red;">(Uma por vez)</b> </label>
						<p style="font-size: 20px; color: red;">Não adicione fotos com nomes iguais independente se forem de galerias diferentes.</p>
                        <input id="uploadImage" class="btn-default" type="file" name="userfile" onchange="PreviewImage();" />
                        <br/>
                        <br/>
                        <img id="uploadPreview" style="border-color:black;border:solid 3px; width: 500px; height: 300px;" />
                        <br/>
                        <br/>
                        <button class="btn" id="maisimagen" type="submit" >Adicionar imagem ou Finalizar</button>
                        <br/>
                        <br/>
                        <script src="http://cloud.tinymce.com/stable/tinymce.min.js?apiKey=1s0wsgyn080bx5gc94i0wxbcnlp1f5l0m2j1rbwvqlot09o6"></script>
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
<h1 style="text-align: center;" >Galerias Criadas</h1>
<table class="table table-bordered" style=" width: 100%; margin: 15px 0 0 0; " >
    <thead>
        <tr>
            <th align="center" >ID</th>
            <th>Titulo</th>
            <th>Imagem Principal</th>
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
                <td align="center">
                    <img class="img-responsive" style=" width: 150px; " src="<?php echo base_url(); ?>uploads/<?php echo $registro->image; ?>" />
                </td>
                <td align="center" >
                    <a style="cursor: pointer;" onclick="window.location = '<?php echo base_url(); ?>admin_controle/Galerias/<?php echo $id; ?>'" ><i class="glyphicon glyphicon-pencil"></i></a>
                    &nbsp;
                    <a style="cursor: pointer;" onclick="window.location = '<?php echo base_url(); ?>admin_controle/DeletarGalerias/<?php echo $id; ?>'" ><i class="glyphicon glyphicon-trash" ></i></a>
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
            data: {id: id, tabela: "galeria"},
            success: function (result) {
                $("#titulo").val(result.titulo);
                $("#NovoRegistro").removeClass("disabled");
                $("#uploadPreview").attr("src", "<?php echo base_url(); ?>uploads/" + result.image);
                $("#FormBV").attr('action', "<?php echo base_url(); ?>admin_controle/AtualizarCadSobreNos/" + id);
            }

        });
    }

    function atualizaDestaque(id) {
        $.ajax({
            url: '<?php echo base_url(); ?>admin_controle/atualizaDestaque',
            type: 'POST',
            dataType: 'json',
            data: {id: id, tabela: "sobrenos"},
            success: function (result) {

            }

        });
    }

</script>
<br />
<br />