<?php

namespace App\Http\Controllers;

use App\Crud;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Faker\Generator;

class CrudsController extends Controller
{
  // Randomize the name and color of a new Crud using the Faker package
  public function create(Generator $faker) {
    $crud = new Crud();
    $crud->name = $faker->lexify("??????");
    $crud->color = $faker->boolean ? 'red' : 'green';
    $crud->save();
  }

  // Return a full set of Cruds
  public function index() {
    return response(Crud::all()->jsonSerialize(), Response::HTTP_OK);
  }

  // Allow the client to change the color of a Crud
  public function update(Request $request, $id) {
    $crud = Crud::findOrFail($id);
    $crud->color = $request->color;
    $crud->save();
  }

  // Destory our Crud
  public function destroy($id) {
      Crud::destroy($id);
      return response(null, RESPOSE::HTTP_OK);
  }
}