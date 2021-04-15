<?php

namespace  App\Models;
use CodeIgniter\Model;


//Crear clases

class RolesModel extends Model
{
  
    protected $table      = 'roles';
    protected $primaryKey = 'id_roles';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre','activo'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}

?>