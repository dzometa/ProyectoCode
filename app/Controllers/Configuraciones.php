<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ConfiguracionModel;

class Configuraciones extends BaseController
{
    protected $configuracion;
    protected $reglas;
    public function __construct()
  
    {
        $this ->configuracion = new ConfiguracionModel();
        helper(['form']);

        $this ->reglas = [
            'tienda_nombre'=>   [
            'rules' => 'required',
            'errors' => [
                'required' => 'El campo {field} es obligatorio.'
                
        ]
            ],
            'tienda_rfc'=>   [
                'rules' => 'required',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'

                ]
            ]

            ];   

    }

    public function index($activo = 1)
    {
       $nombre =  $this->configuracion->where('nombre','tienda_nombre')->first();
       $rfc =  $this->configuracion->where('nombre','tienda_rfc')->first();
       $telefono =  $this->configuracion->where('nombre','tienda_telefono')->first();
       $email =  $this->configuracion->where('nombre','tienda_email')->first();
       $direccion =  $this->configuracion->where('nombre','tienda_direccion')->first();
       $leyenda =  $this->configuracion->where('nombre','ticket')->first();
        //arreglo de la tabla

        $data =['titulo' => 'Configuraciones', 'nombre'=> $nombre, 'rfc'=> $rfc,
                                                'telefono'=> $telefono, 'email'=> $email, 'direccion'=> $direccion, 
                                                'leyenda'=> $leyenda 
               ];
        //visualizar la vista
        echo view('header');
        echo view('configuraciones/configuraciones', $data);
        echo view('footer');

      
    }

     
   //Funcion para actualizar datos a la tabla 
    public function actualizar()
    {
        if($this->request->getMethod() == "post" && $this->validate($this->reglas)){

          


               $this->configuracion->whereIn('nombre', ['tienda_nombre'])->set(['valor'=> 
               $this->request->getPost('tienda_nombre')])->update(); 

               $this->configuracion->whereIn('nombre', ['tienda_rfc'])->set(['valor'=> 
               $this->request->getPost('tienda_rfc')])->update(); 

               $this->configuracion->whereIn('nombre', ['tienda_telefono'])->set(['valor'=> 
               $this->request->getPost('tienda_telefono')])->update(); 

               $this->configuracion->whereIn('nombre', ['tienda_email'])->set(['valor'=> 
               $this->request->getPost('tienda_email')])->update(); 

               $this->configuracion->whereIn('nombre', ['tienda_direccion'])->set(['valor'=> 
               $this->request->getPost('tienda_direccion')])->update(); 

               $this->configuracion->whereIn('nombre', ['ticket'])->set(['valor'=> 
               $this->request->getPost('ticket')])->update(); 




               
                return  redirect()->to(base_url().'/configuraciones');
            }else{  
             // return  $this->editar   ($this->request->getPost('id'), $this->validator);  
            }
        
    }
    
}


