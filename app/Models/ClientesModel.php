<?php

namespace  App\Models;
use CodeIgniter\Model;


//Crear clases

class ClientesModel extends Model
{
  
    protected $table      = 'clientes';
    protected $primaryKey = 'id_cliente';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre', 'dui', 'nit', 'nrc',
    'direccion', 'telefono', 'correo', 'activo'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}

?>