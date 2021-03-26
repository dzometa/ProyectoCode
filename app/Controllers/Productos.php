<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ProductosModel;
use App\Models\unidadesModel;
use App\Models\CategoriasModel;

class Productos extends BaseController
{
    protected $productos;

    public function __construct()
  
    {
        $this ->productos = new ProductosModel();
        $this ->unidades = new unidadesModel();
        $this ->categorias = new CategoriasModel();


    }

    public function index($activo = 1)
    {
        $productos = $this->productos->where('activo',$activo)->findAll();
        //arreglo de la tabla
        $data =['titulo' => 'productos', 'datos'=> $productos];
        //visualizar la vista
        echo view('header');
        echo view('productos/productos', $data);
        echo view('footer');

      
    }
//Mostrar los eliminados
    public function eliminados($activo = 0)

    {
        $productos = $this->productos->where('activo',$activo)->findAll();
        //arreglo de la tabla
        $data =['titulo' => 'Productos Eliminadas', 'datos'=> $productos];
        //visualizar la vista
        echo view('header');
        echo view('productos/eliminados', $data);
        echo view('footer');

      
    }    
// Funcion para cargar la vista de Nueva Unidad
    public function  nuevo()
    {
        $unidades = $this->unidades->where('activo',1)->findAll();
        $categorias = $this->categorias->where('activo',1)->findAll();
        $data =['titulo' => 'Agregar Productos', 'unidades'=>$unidades,'categorias'=>$categorias];
        echo view('header');
        echo view('productos/nuevo', $data);
        echo view('footer');

    }
//Funcion para insertar datos a la tabla 
    public function insertar()
    {
        if($this->request->getMethod()=="post" )
        {
            $this->productos->save([
            'codigo'=> $this-> request ->getPost('codigo'),
            'nombre'=>$this->request->getPost('nombre'),
            'precio_venta'=>$this->request->getPost('precio_venta'),
            'prec_compra'=>$this->request->getPost('prec_compra'),
            'stock_minimo'=>$this->request->getPost('stock_minimo'),
            'inventariable'=>$this->request->getPost('inventariable'),
            'existencia'=>$this->request->getPost('existencia'),
            'id_unidad'=>$this->request->getPost('id_unidad'),
            'id_categoria'=>$this->request->getPost('id_categoria')]);

            return  redirect()->to(base_url().'/productos');
        }else
        {
            $data =['titulo' => 'Agregar Productos','validation'=>$this->validator];
            echo view('header');
            echo view('productos/nuevo', $data);
            echo view('footer');
        }   
       
    }


    // Funcion para mostrar vista editar
    public function  editar($id)
    {
        $unidades = $this->unidades->where('activo',1)->findAll();
        $categorias = $this->categorias->where('activo',1)->findAll();
        $producto = $this -> productos -> where('id', $id)-> first();
        $data =['titulo' => 'Editar Producto', 'unidades'=>$unidades,'categorias'=>$categorias,
        'producto'=> $producto];
        echo view('header');
        echo view('productos/editar', $data);
        echo view('footer');

    }
//Funcion para actualizar datos a la tabla 
    public function actualizar()
    {

        $this->productos->update($this->request->getPost('id'),[
            'codigo'=> $this-> request ->getPost('codigo'),
            'nombre'=>$this->request->getPost('nombre'),
            'precio_venta'=>$this->request->getPost('precio_venta'),
            'prec_compra'=>$this->request->getPost('prec_compra'),
            'stock_minimo'=>$this->request->getPost('stock_minimo'),
            'inventariable'=>$this->request->getPost('inventariable'),
            'existencia'=>$this->request->getPost('existencia'),
            'id_unidad'=>$this->request->getPost('id_unidad'),
            'id_categoria'=>$this->request->getPost('id_categoria')]);
        return  redirect()->to(base_url().'/productos');
    }

//Cambiar de estado a 0
    public function eliminar($id)
    {

        $this->productos->update($id,['activo'=>0]);
        return  redirect()->to(base_url().'/productos');
    }


//cambiar de estado a  1 o regresar

public function reingresar($id)
{

    $this->productos->update($id,['activo'=>1]);
    return  redirect()->to(base_url().'/productos');
}



}

