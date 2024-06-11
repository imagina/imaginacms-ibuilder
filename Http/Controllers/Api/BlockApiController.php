<?php

namespace Modules\Ibuilder\Http\Controllers\Api;

use Illuminate\Http\Request;
use Modules\Core\Icrud\Controllers\BaseCrudController;
//Model
use Modules\Ibuilder\Entities\Block;
use Modules\Ibuilder\Repositories\BlockRepository;

class BlockApiController extends BaseCrudController
{
    public $model;

    public $modelRepository;

    public function __construct(Block $model, BlockRepository $modelRepository)
    {
        $this->model = $model;
        $this->modelRepository = $modelRepository;
    }

    /**
     * Organization Index
     */
    public function blockPreview(Request $request)
    {
      $blockData = $request->all();

      //Instance the blockConfig
      $blockConfig = mapBlockToRender($blockData);

      //Render view
      return view('ibuilder::frontend.blocks', compact('blockConfig'));
    }

    public function bulkUpdate(Request $request)
    {
      \DB::beginTransaction();
      try {
        $blocks = $request->input('attributes');//Get blocks data
        $this->modelRepository->bulkUpdate($blocks);//Bulk update
        \DB::commit(); //Commit to Data Base
      } catch (\Exception $e) {
        \DB::rollback();//Rollback to Data Base
        $status = $this->getStatusError($e->getCode());
        $response = ["messages" => [["message" => $e->getMessage(), "type" => "error"]]];
      }
      //Return response
      return response()->json($response ?? ["data" => "Request successful"], $status ?? 200);
    }

    public function bulkCreate(Request $request)
    {
      \DB::beginTransaction();
      try {
        $blocks = $request->input('attributes');//Get blocks data
        $this->modelRepository->bulkCreate($blocks);//Bulk update
        \DB::commit(); //Commit to Data Base
      } catch (\Exception $e) {
        \DB::rollback();//Rollback to Data Base
        $status = $this->getStatusError($e->getCode());
        $response = ["messages" => [["message" => $e->getMessage(), "type" => "error"]]];
      }
      //Return response
      return response()->json($response ?? ["data" => "Request successful"], $status ?? 200);
    }
}
