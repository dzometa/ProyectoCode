<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h4 class="mt-4"><?php echo $titulo; ?></h4>
            
            <?php if(isset($validation)){?>

            <div class="alert alert-danger">
                <?php echo $validation->listErrors();?>
            </div>
            <?php } ?>  
            <form method="POST" action="<?php echo base_url();?>/clientes/actualizar" autocomplete="off">

                <? csrf_field();?>
                <input type="hidden" id="id_cliente" name ="id_cliente" value="<?php echo  $cliente['id_cliente'];?>"/>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">

                            <label>Nombre Completo</label>
                            <input class="form-control" id="nombre" name="nombre" type="text" value="<?php echo  $cliente['nombre'];?>"autofocus required />

                        </div>
                        <div class="col-12 col-sm-6">

                            <label>DUI</label>
                            <input class="form-control" id="dui" name="dui" type="number" value="<?php echo  $cliente['dui'];?>" required />

                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">

                            <label>NIT</label>
                            <input class="form-control" id="nit" name="nit" type="number" value="<?php echo   $cliente['nit'];?>" autofocus required />

                        </div>
                        <div class="col-12 col-sm-6">

                            <label>NRC</label>
                            <input class="form-control" id="nrc" name="nrc" type="number" value="<?php echo  $cliente['nrc'];?>" required />

                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">

                            <label>Dirección</label>
                            <input class="form-control" id="direccion" name="direccion" type="numer" value="<?php echo   $cliente['direccion'];?>" autofocus required />

                        </div>
                        <div class="col-12 col-sm-6">

                            <label>Telefono</label>
                            <input class="form-control" id="telefono" name="telefono" type="text" value="<?php echo   $cliente['telefono'];?>"required />

                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">

                            <label>Correo</label>
                            <input class="form-control" id="correo" name="correo" type="numer" value="<?php echo   $cliente['correo'];?>"autofocus required />

                        </div>
                  
                    </div>
                </div>






            
                      
                    

                       
                                
                                
                                <a href="<?php echo base_url(); ?>/clientes" class="btn btn-primary">Regresar</a>
                                <button type="submit" class="btn btn-success">Guardar</button>
                    
    </div>

            </form>

        </div>

    </main>
</div>