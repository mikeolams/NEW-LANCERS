<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Client;
use App\Invoice;
class Project extends Model
{
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id')->with('estimate');
    }
    
<<<<<<< HEAD
   
=======
    public function profile(){
        return $this->belongsTo(Profile::class, 'user_id');
    }
    
>>>>>>> e9373dbc6847e1ef2b6bcc1556faa5d54ac7b42b
     public function client(){
        return $this->belongsTo(Client::class, 'client_id');
    }

<<<<<<< HEAD
   

=======
>>>>>>> e9373dbc6847e1ef2b6bcc1556faa5d54ac7b42b
    public function estimate()
    {
        return $this->belongsTo('App\Estimate');
    }
<<<<<<< HEAD

=======
    
>>>>>>> e9373dbc6847e1ef2b6bcc1556faa5d54ac7b42b
    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

<<<<<<< HEAD
=======
    public function invoice()
    {
        return $this->hasOne('App\Invoice', 'id', 'invoice_id');
    }

>>>>>>> e9373dbc6847e1ef2b6bcc1556faa5d54ac7b42b
    public static function generateTrackingCode()
    {
        return "LNCR_PTRCK_".time(); 
    }

    protected $casts = [
        'collaborators' => 'array'
    ];
}
