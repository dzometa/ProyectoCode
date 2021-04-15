<?php

namespace  App\Models;
use CodeIgniter\Model;


//Crear clases

class UsuariosModel extends Model
{
  
    protected $table      = 'roles';
    protected $primaryKey = 'id_usuario';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['usuario','password', 'nombre', 'id_caja', 'id_rol', 'activo'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}

?>