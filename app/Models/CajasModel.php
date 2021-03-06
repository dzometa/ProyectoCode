<?php

namespace  App\Models;
use CodeIgniter\Model;


//Crear clases

class CajasModel extends Model
{
  
    protected $table      = 'cajas';
    protected $primaryKey = 'id_caja';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['numero_caja', 'nombre', 'folio', 'activo'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}

?>