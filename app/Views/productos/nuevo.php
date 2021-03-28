<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h4 class="mt-4"><?php echo $titulo; ?></h4>
            
            <?php if(isset($validation)){?>

            <div class="alert alert-danger">
                <?php echo $validation->listErrors();?>
            </div>
            <?php } ?>  
            <form method="POST" action="<?php echo base_url(); ?>/productos/insertar" autocomplete="off">

                <? csrf_field();?>
         
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">

                            <label>Codigo</label>
                            <input class="form-control" id="codigo" name="codigo" type="numer" autofocus required />

                        </div>
                        <div class="col-12 col-sm-6">

                            <label>Nombre</label>
                            <input class="form-control" id="nombre" name="nombre" type="text" required />

                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">

                            <label>Unidad</label>
                            <select class="form-control" id="id_unidad" name="id_unidad" required>
                                <option value="">Selecionar Unidad</option>
                                <?php foreach ($unidades as $unidad) { ?>
                                    <option value="<?php echo $unidad['id'];?>"><?php echo $unidad['nombre']; ?></option>

                                <?php  } ?>
                            </select>

                        </div>
                        <div class="col-12 col-sm-6">

                            <label>Categorias</label>
                            <select class="form-control" id="id_categoria" name="id_categoria" required>
                                <option value="">Selecionar Categoria</option>
                                <?php foreach ($categorias as $categoria) { ?>
                                    <option value="<?php echo $categoria['id']; ?>">
                                    <?php echo $categoria['nombre']; ?></option>

                                <?php  } ?>
                            </select>

                        </div>
                    </div>
                </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 col-sm-6">

                                    <label>Precio Venta</label>
                                    <input class="form-control" id="precio_venta" name="precio_venta" type="numer" autofocus required />

                                </div>
                                <div class="col-12 col-sm-6">

                                    <label>Precio Compra</label>
                                    <input class="form-control" id="prec_compra" name="prec_compra" type="text" required />

                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 col-sm-6">

                                    <label>Stock Minimo</label>
                                    <input class="form-control" id="stock_minimo" name="stock_minimo" type="numer"  required />

                                </div>
                                <div class="col-12 col-sm-6">

                                    <label>Es inventariable</label>
                                    <select id="inventariable" name="inventariable" class="form-control">
                                    <option value="1">SI</option>
                                    <option value="0">NO</option>
                                    </select>
                                </div>

                            </div>
                            
                        </div>

                        <div class="form-group">
                                    <div class="col-6 col-sm-6">
                                  <label>Existencia</label>
                                        <input class="form-control" id="existencia" name="existencia" type="numer"  required />
                                    </div>
                        
                        </div>
                                
                                
                                <a href="<?php echo base_url(); ?>/productos" class="btn btn-primary">Regresar</a>
                                <button type="submit" class="btn btn-success">Guardar</button>
                    
    </div>

            </form>

        </div>

    </main>
</div>