<?php

namespace Modules\Ibuilder\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Ibuilder\Entities\Buildable;

class ClearBuildableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Model::unguard();
    Buildable::whereNull('layout_id')->forceDelete();
  }
}
