<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ClientesModel;

class Clientes extends BaseController
{
    protected $clientes;
    protected $reglas;
    public function __construct()
  
    {
        $this ->clientes = new ClientesModel();
        helper(['form']);

        $this ->reglas = [
            'nombre'=>   [
            'rules' => 'required',
            'errors' => [
                'required' => 'El campo {field} es obligatorio.'
                
        ]
            ],
            'dui'=>   [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'

                ]
            ]

            ];   

    }

    public function index($activo = 1)
    {
        $clientes = $this->clientes->where('activo',$activo)->findAll();
        //arreglo de la tabla
        $data =['titulo' => 'Clientes', 'datos'=> $clientes];
        //visualizar la vista
        echo view('header');
        echo view('clientes/clientes', $data);
        echo view('footer');

      
    }
//Mostrar los eliminados
    public function eliminados($activo = 0)
    {
        $clientes = $this->clientes->where('activo',$activo)->findAll();
        //arreglo de la tabla
        $data =['titulo' => 'Clientes Eliminadas', 'datos'=> $clientes];
        //visualizar la vista
        echo view('header');
        echo view('clientes/eliminados', $data);
        echo view('footer');

      
    }    
// Funcion para cargar la vista de Nueva Unidad
    public function  nuevo()
    {
        $data =['titulo' => 'Agregar Cliente'];
        echo view('header');
        echo view('clientes/nuevo', $data);
        echo view('footer');

    }
//Funcion para insertar datos a la tabla 
    public function insertar()
    {
        if($this->request->getMethod()=="post" && $this->validate($this->reglas))
        {
            $this->clientes->save([
                'nombre'=> $this-> request ->getPost('nombre'),
                'dui'=>$this->request->getPost('dui'),
                'nit'=>$this->request->getPost('nit'),
                'nrc'=>$this->request->getPost('nrc'),
                'direccion'=>$this->request->getPost('direccion'),
                'telefono'=>$this->request->getPost('telefono'),
                'correo'=>$this->request->getPost('correo'),

                                  ]);
            return  redirect()->to(base_url().'/clientes');
        }else
        {
            $data =['titulo' => 'Agregar Clientes','validation'=>$this->validator];
            echo view('header');
            echo view('clientes/nuevo', $data);
            echo view('footer');
        }   
       
    }


    // Funcion para mostrar vista editar
    public function  editar($id, $valid=null)
    {

    $clientes = $this->clientes->where('id_cliente',$id)->first();

     if($valid !=null){
        $data =['titulo' => 'Editar Clientes', 'cliente'=>$clientes, 'validation'=> $valid];
     }else{
        $data =['titulo' => 'Editar Cliente', 'cliente'=>$clientes];
     }

       
        echo view('header');
        echo view('clientes/editar', $data);
        echo view('footer');

    }
//Funcion para actualizar datos a la tabla 
    public function actualizar()
    {
        if($this->request->getMethod()=="post" && $this->validate($this->reglas))
            {
                $this->clientes->update($this->request->getPost('id_cliente'),
                ['nombre'=> $this-> request ->getPost('nombre'),
                'dui'=>$this->request->getPost('dui'),
                'nrc'=>$this->request->getPost('nrc'),
                'direccion'=>$this->request->getPost('direccion'),
                'telefono'=>$this->request->getPost('telefono'),
                'correo'=>$this->request->getPost('correo'),

                ]);
                return  redirect()->to(base_url().'/clientes');
            }else{
              return  $this->editar($this->request->getPost('id_cliente'), $this->validator);  
            }
        
    }

//Cambiar de estado a 0
    public function eliminar($id)
    {

        $this->clientes->update($id,['activo'=>0]);
        return  redirect()->to(base_url().'/clientes');
    }


//cambiar de estado a  1 o regresar

public function reingresar($id)
{

    $this->clientes->update($id,['activo'=>1]);
    return  redirect()->to(base_url().'/clientes');
}



}

