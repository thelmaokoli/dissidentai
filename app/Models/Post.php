<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

/* table name
// if you create a model called post, by default the table will 
// be called posts
protected $table = 'Postings';
// if you wanted to change it
public $primaryKey = 'id'; // default
public $primaryKey = 'itemid'; // can change default
// do you want timestamps?
*/
public $timestamps = true;

// setting up model relationships - assign post ownership
// see user.php for pair line
public function user(){
    return $this->belongsTo('App\Models\User');
}
}
