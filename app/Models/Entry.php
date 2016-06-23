<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Entry extends Model
{
    use SoftDeletes;

    protected $table = 'entries';

    protected $fillable = ['user_id', 'title', 'body'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function getCreatedAtAttribute($value) {
        $rule = config('common.entry.rule');
        return date("{$rule['time']}", strtotime($value));
    }

    public function getUpdatedAtAttribute($value) {
        $rule = config('common.entry.rule');
        return date("{$rule['time']}", strtotime($value));
    }
}
