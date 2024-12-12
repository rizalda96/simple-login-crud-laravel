<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
  protected $model;
  protected $columsSorted = [
    'user_email',
    'user_fullname',
  ];

  public function __construct(
    User $model
  ) {
    $this->model = $model;
  }

  public function index()
  {
    // $data = $this->model->all();
    return view('pengguna.list');
  }

  public function search(Request $request)
  {
    $query = $this->model;

    if ($request->search['value']) {
      $query = $query->whereLike('user_email', '%' . $request->search['value'] . '%');
    }

    $query = $query
      // ->orderBy($this->columsSorted[$request->order[0]['column']], $request->order[0]['dir'])
      ->limit($request->length)->get();

    $response = [
      'draw' => $request->draw,
      'recordsTotal' => $query->count(),
      'recordsFiltered' => $query->count(),
      'data' => $query
    ];

    return $response;
  }

  public function store()
  {
    return view('pengguna.tambah');
  }

  public function save(Request $request)
  {
    try {
      $this->model->create([
        'user_email' => $request->email,
        'user_fullname' => $request->fullname,
        'user_phone' => $request->no_hp,
        'password' => Hash::make($request->password)
      ]);

      $result = true;
      $error = null;
    } catch (\Throwable $th) {
      $result = null;
      $error = $th->getMessage();
    }

    return response()->json([
      'result' => $result,
      'error' => $error
    ]);
  }

  public function delete($id, Request $request)
  {
    try {
      $user = $this->model->where('user_id', $id)->first();
      $result = $user->delete();

      $error = null;
    } catch (\Throwable $th) {
      $result = false;
      $error = $th->getMessage();
    }

    return response()->json([
      'result' => $result,
      'error' => $error
    ]);
  }

  public function edit($id, Request $request)
  {
    $user  = $this->model->where('user_id', $id)->first();

    return view("pengguna.edit", ['data' => $user]);
  }

  public function update(Request $request)
  {
    try {
      $user = $this->model->where('user_id', $request->id)->first();
      $user->update([
        'user_email' => $request->email,
        'user_fullname' => $request->fullname,
        'user_phone' => $request->no_hp,
      ]);

      $result = true;
      $error = null;
    } catch (\Throwable $th) {
      $result = null;
      $error = $th->getMessage();
    }

    return response()->json([
      'result' => $result,
      'error' => $error
    ]);
  }
}
