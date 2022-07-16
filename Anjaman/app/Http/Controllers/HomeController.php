<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function main() {
        return view('user/Landing_Page', [
            'feedbacks' => Feedback::getFeedbacks(),
            'title' => 'Home | Main'
        ]);
    }
    
    public function create_feedback(Request $request) { 

        $fb = new Feedback;

        $fb->user_id = $request->user()->id;
        $fb->feedback = $request['feedback'];
        $fb->rating = $request['web_rating'];

        $fb->save();

        return redirect('/');
    }

}