<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\CategoriasModel;

class Categorias extends BaseController
{
    protected $categorias;

    public function __construct()
  
    {
        $this ->categorias = new CategoriasModel();


    }

    public function index($activo = 1)
    {
        $categorias = $this->categorias->where('activo',$activo)->findAll();
        //arreglo de la tabla
        $data =['titulo' => 'Categorias', 'datos'=> $categorias];
        //visualizar la vista
        echo view('header');
        echo view('categorias/categorias', $data);
        echo view('footer');

      
    }
//Mostrar los eliminados
    public function eliminados($activo = 0)
    {
        $categorias = $this->categorias->where('activo',$activo)->findAll();
        //arreglo de la tabla
        $data =['titulo' => 'Categorias Eliminadas', 'datos'=> $categorias];
        //visualizar la vista
        echo view('header');
        echo view('categorias/eliminados', $data);
        echo view('footer');

      
    }    
// Funcion para cargar la vista de Nueva Unidad
    public function  nuevo()
    {
        $data =['titulo' => 'Agregar Categorias'];
        echo view('header');
        echo view('categorias/nuevo', $data);
        echo view('footer');

    }
//Funcion para insertar datos a la tabla 
    public function insertar()
    {

        $this->categorias->save(['nombre'=> $this-> request ->getPost('nombre')]);
        return  redirect()->to(base_url().'/categorias');
    }


    // Funcion para mostrar vista editar
    public function  editar($id)
    {
        $unidad = $this->categorias->where('id',$id)->first();
        $data =['titulo' => 'Editar Categorias', 'datos'=>$unidad];
        echo view('header');
        echo view('categorias/editar', $data);
        echo view('footer');

    }
//Funcion para actualizar datos a la tabla 
    public function actualizar()
    {

        $this->categorias->update($this->request->getPost('id'),['nombre'=> 
        $this-> request ->getPost('nombre'),]);
        return  redirect()->to(base_url().'/categorias');
    }

//Cambiar de estado a 0
    public function eliminar($id)
    {

        $this->categorias->update($id,['activo'=>0]);
        return  redirect()->to(base_url().'/categorias');
    }


//cambiar de estado a  1 o regresar

public function reingresar($id)
{

    $this->categorias->update($id,['activo'=>1]);
    return  redirect()->to(base_url().'/categorias');
}



}

