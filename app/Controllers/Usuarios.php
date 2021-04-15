<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UsuariosModel;

class Usuarios extends BaseController
{
    protected $usuarios;
    protected $reglas;
    public function __construct()
  
    {
        $this ->usuarios = new UsuariosModel();
        helper(['form']);

        $this ->reglas = [
            'usuario'=>   [
            'rules' => 'required |is_unique[usuarios.usuarios]',
            'errors' => [
                'required' => 'El campo {field} es obligatorio.',
                'is_unique' => 'El campo {field} es obligatorio.'
                
                ]
            ],
            'password'=>   [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'

                ]
            ],
            're_password'=>   [
                'rules' => 'required|matches[password]',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                    'required' => 'Las contraseñas no coinciden.'

                ]
            ],
            'nombre'=>   [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                    ]
                ],
                'id_caja'=>   [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio.'
                        ]
                    ],
                    'id_rol'=>   [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'El campo {field} es obligatorio.'
                            ]
                        ]

            ];   

    }

    public function index($activo = 1)
    {
        $usuarios = $this->usuarios->where('activo',$activo)->findAll();
        //arreglo de la tabla
        $data =['titulo' => 'Usuarios', 'datos'=> $usuarios];
        //visualizar la vista
        echo view('header');
        echo view('usuarios/usuarios', $data);
        echo view('footer');

      
    }
//Mostrar los eliminados
    public function eliminados($activo = 0)
    {
        $usuarios = $this->usuarios->where('activo',$activo)->findAll();
        //arreglo de la tabla
        $data =['titulo' => 'Unidades Eliminadas', 'datos'=> $usuarios];
        //visualizar la vista
        echo view('header');
        echo view('usuarios/eliminados', $data);
        echo view('footer');

      
    }    
// Funcion para cargar la vista de Nueva Unidad
    public function  nuevo()
    {
        $data =['titulo' => 'Agregar Unidades'];
        echo view('header');
        echo view('usuarios/nuevo', $data);
        echo view('footer');

    }
//Funcion para insertar datos a la tabla 
    public function insertar()
    {
        if($this->request->getMethod()=="post" && $this->validate($this->reglas))
        {
            $this->usuarios->save(['nombre'=> $this-> request ->getPost('nombre'),'nombre_corto'=>$this->request->getPost('nombre_corto')]);
            return  redirect()->to(base_url().'/usuarios');
        }else
        {
            $data =['titulo' => 'Agregar Unidades','validation'=>$this->validator];
            echo view('header');
            echo view('usuarios/nuevo', $data);
            echo view('footer');
        }   
       
    }


    // Funcion para mostrar vista editar
    public function  editar($id, $valid=null)
    {

        $unidad = $this->usuarios->where('id',$id)->first();
     if($valid !=null){
        $data =['titulo' => 'Editar Unidades', 'datos'=>$unidad, 'validation'=> $valid];
     }else{
        $data =['titulo' => 'Editar Unidades', 'datos'=>$unidad];
     }

       
        echo view('header');
        echo view('usuarios/editar', $data);
        echo view('footer');

    }
//Funcion para actualizar datos a la tabla 
    public function actualizar()
    {
        if($this->request->getMethod()=="post" && $this->validate($this->reglas))
            {
                $this->usuarios->update($this->request->getPost('id'),['nombre'=> 
                $this-> request ->getPost('nombre'),'nombre_corto'=>
                $this->request->getPost('nombre_corto')]);
                return  redirect()->to(base_url().'/usuarios');
            }else{
              return  $this->editar($this->request->getPost('id'), $this->validator);  
            }
        
    }

//Cambiar de estado a 0
    public function eliminar($id)
    {

        $this->usuarios->update($id,['activo'=>0]);
        return  redirect()->to(base_url().'/usuarios');
    }


//cambiar de estado a  1 o regresar

public function reingresar($id)
{

    $this->usuarios->update($id,['activo'=>1]);
    return  redirect()->to(base_url().'/usuarios');
}



}

