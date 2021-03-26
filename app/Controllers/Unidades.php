<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\unidadesModel;

class Unidades extends BaseController
{
    protected $unidades;
    protected $reglas;
    public function __construct()
  
    {
        $this ->unidades = new unidadesModel();
        helper(['form']);

        $this ->reglas = [
            'nombre'=>   [
            'rules' => 'required',
            'errors' => [
                'required' => 'El campo {field} es obligatorio.'
                
        ]
            ],
            'nombre corto'=>   [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'

                ]
            ]

            ];   

    }

    public function index($activo = 1)
    {
        $unidades = $this->unidades->where('activo',$activo)->findAll();
        //arreglo de la tabla
        $data =['titulo' => 'Unidades', 'datos'=> $unidades];
        //visualizar la vista
        echo view('header');
        echo view('unidades/unidades', $data);
        echo view('footer');

      
    }
//Mostrar los eliminados
    public function eliminados($activo = 0)
    {
        $unidades = $this->unidades->where('activo',$activo)->findAll();
        //arreglo de la tabla
        $data =['titulo' => 'Unidades Eliminadas', 'datos'=> $unidades];
        //visualizar la vista
        echo view('header');
        echo view('unidades/eliminados', $data);
        echo view('footer');

      
    }    
// Funcion para cargar la vista de Nueva Unidad
    public function  nuevo()
    {
        $data =['titulo' => 'Agregar Unidades'];
        echo view('header');
        echo view('unidades/nuevo', $data);
        echo view('footer');

    }
//Funcion para insertar datos a la tabla 
    public function insertar()
    {
        if($this->request->getMethod()=="post" && $this->validate($this->reglas))
        {
            $this->unidades->save(['nombre'=> $this-> request ->getPost('nombre'),'nombre_corto'=>$this->request->getPost('nombre_corto')]);
            return  redirect()->to(base_url().'/unidades');
        }else
        {
            $data =['titulo' => 'Agregar Unidades','validation'=>$this->validator];
            echo view('header');
            echo view('unidades/', $data);
            echo view('footer');
        }   
       
    }


    // Funcion para mostrar vista editar
    public function  editar($id)
    {
        $unidad = $this->unidades->where('id',$id)->first();
        $data =['titulo' => 'Editar Unidades', 'datos'=>$unidad];
        echo view('header');
        echo view('unidades/editar', $data);
        echo view('footer');

    }
//Funcion para actualizar datos a la tabla 
    public function actualizar()
    {

        $this->unidades->update($this->request->getPost('id'),['nombre'=> 
        $this-> request ->getPost('nombre'),'nombre_corto'=>
        $this->request->getPost('nombre_corto')]);
        return  redirect()->to(base_url().'/unidades');
    }

//Cambiar de estado a 0
    public function eliminar($id)
    {

        $this->unidades->update($id,['activo'=>0]);
        return  redirect()->to(base_url().'/unidades');
    }


//cambiar de estado a  1 o regresar

public function reingresar($id)
{

    $this->unidades->update($id,['activo'=>1]);
    return  redirect()->to(base_url().'/unidades');
}



}

