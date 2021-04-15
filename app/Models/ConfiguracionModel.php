<?php

namespace  App\Models;
use CodeIgniter\Model;


//Crear clases

class configuracionModel extends Model
{
  
    protected $table      = 'configuracion';
    protected $primaryKey = 'id_conf';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $useSoftUpdates = false;
    protected $useSoftCreates = false;

    protected $allowedFields = ['nombre', 'valor'];

    protected $useTimestamps = true;
    protected $createdField  = null;
    protected $updatedField  = null;
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}

?>