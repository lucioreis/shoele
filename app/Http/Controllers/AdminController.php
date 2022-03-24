<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

class AdminController extends Controller
{
  //
  public function index(Request $request)
  {
    return Inertia::render('/dashboard', [
      'products' => User::query()
        ->when($request->input('search'), function ($query, $search) {
          $query->where('name', 'like', "%{$search}%");
        })->paginate(10, ['model', 'id']),
      'filters' => $request->only(['search'])
    ]);
  }
}
