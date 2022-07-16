<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedbacks';

    public static function getFeedbacks() {
        $feedback = DB::table('feedbacks as fb')
            ->join('users as u', 'fb.user_id', '=', 'u.id')
            ->select('fb.*', 'u.fullname', 'u.profile_picture'
            )
            ->orderByDesc('created_at')
            ->get();
            return $feedback;
    }

}
