<?php

namespace Modules\Ibuilder\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Modules\Ibuilder\Entities\Block;

class MigrateLayoutIdFromBlockToPivot extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Model::unguard();

    //Names that will be ignored in the field
    if (Schema::hasColumn('ibuilder__blocks', 'layout_id')) {
      // Get all blocks with a layout_id
      $blocks = Block::get();

      // Create entries in ibuilder_layout_blocks
      foreach ($blocks as $block) {
        \DB::table('ibuilder__layout_blocks')->insert([
          'layout_id' => $block->layout_id,
          'block_id' => $block->id,
          'sort_order' => $block->sort_order,
          'parent_system_name' => $block->parent_system_name,
          'grid_position' => $block->grid_position,
          'created_at' => new \DateTime(),
          'updated_at' => new \DateTime()
        ]);
      }

      // Remove uneeded columns from blocks
      Schema::table('ibuilder__blocks', function ($table) {
        $table->dropForeign(['layout_id']);
        $table->dropColumn('layout_id');
        $table->dropColumn('parent_system_name');
        $table->dropColumn('sort_order');
        $table->dropColumn('grid_position');
        $table->dropColumn('mobile_attributes');
      });
    }
  }
}
