<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    public function get_all_skill(){
        $skills = Skill::with('service')->orderBy('id', 'DESC')->get();
        return response()->json([
                'skills' => $skills
        ],200);
    }
}

