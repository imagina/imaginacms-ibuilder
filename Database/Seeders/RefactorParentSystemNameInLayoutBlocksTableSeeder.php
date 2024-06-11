<?php

namespace Modules\Ibuilder\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Ibuilder\Entities\Block;
use Modules\Ibuilder\Entities\LayoutBlock;
use Illuminate\Support\Str;
use Modules\Ibuilder\Repositories\Eloquent\EloquentBlockRepository;

class RefactorParentSystemNameInLayoutBlocksTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Model::unguard();

    //Get all data of pivot
    $pivotLayoutBlocks = LayoutBlock::where('system_name', '')->get();

    //Check if the first data does not have systemName
    if (!$pivotLayoutBlocks->isEmpty()) {
      //Loop each pivot
      foreach ($pivotLayoutBlocks as $layoutBlock) {
        //Generate unique systemName
        $newSystemName = Str::random(20);
        $layoutBlock->update(['system_name' => $newSystemName]);
      }

      //Get parentSystemName of pivots
      $pivotParentSystemName = $pivotLayoutBlocks->whereNotNull('parent_system_name');
      // Get all blocks
      $blocks = Block::whereIn('system_name', $pivotParentSystemName->pluck('parent_system_name'))->get();

      //Loop each pivot that have parent systemName
      foreach ($pivotParentSystemName as $pivot) {
        //Define updated data
        $updatedData = ['parent_system_name' => null];

        //Get the first block that matches the parent systemName
        $block = $blocks->where('system_name', $pivot->parent_system_name)->first();

        if ($block) {
          //Get the first layoutBlock that matches the blockId and layout_id
          $firstPivot = $pivotLayoutBlocks->where('block_id', $block->id)
            ->where('layout_id', $pivot->layout_id)->first();

          //Get systemName of pivot
          $updatedData['parent_system_name'] = $firstPivot->system_name;
        }

        $pivot->update($updatedData);
      }
    }
  }
}
