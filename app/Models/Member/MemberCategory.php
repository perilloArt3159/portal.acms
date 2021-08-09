<?php

namespace App\Models\Member;

use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MemberCategory extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    //** Variables */

    protected $table = "member_categories";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'created_by_user_id',
        'updated_by_user_id', 
        'name',
        'description'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at'        => 'datetime:Y-m-d H:i:s',
        'updated_at'        => 'datetime:Y-m-d H:i:s',
        'deleted_at'        => 'datetime:Y-m-d H:i:s',
    ];

    /** 
     * The relationships that should always be loaded. 
     * 
     * @var array 
     * 
     */
    protected $with = []; 

    //** Package Related Functions */

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    //** Accessors & Mutators */

    //...

    //** belongsTo, belongsToMany, hasOne, hasMany relationships */
    
    public function createdByUser()
    {
        return $this->belongsTo("App\Models\Auth\User", 'created_by_user_id', 'id');
    }

    public function updatedByUser()
    {
        return $this->belongsTo("App\Models\Auth\User", 'updated_by_user_id', 'id');
    }

    public function members() 
    {
        return $this->hasMany('App\Models\Member\Member', 'member_category_id', 'id'); 
    }
}
