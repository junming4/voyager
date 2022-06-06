<?php

namespace TCG\Voyager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Traits\Resizable;
use TCG\Voyager\Traits\Translatable;

class Task extends Model
{

    use Translatable;
    use Resizable;

    protected $table = 'tasks';

    protected $translatable = ['title', 'day_num', 'file_name'];

    protected $fillable = ['title', 'day_num', 'file_name'];


    public function save(array $options = [])
    {
        // If no author has been assigned, assign the current user's id as the author of the post
        if (!$this->author_id && Auth::user()) {
            $this->author_id = Auth::user()->getKey();
        }

        return parent::save();
    }
}
