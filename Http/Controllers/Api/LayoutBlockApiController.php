<?php

namespace Modules\Ibuilder\Http\Controllers\Api;

use Modules\Core\Icrud\Controllers\BaseCrudController;
//Model
use Modules\Ibuilder\Entities\LayoutBlock;
use Modules\Ibuilder\Repositories\LayoutBlockRepository;
use Illuminate\Http\Request;

class LayoutBlockApiController extends BaseCrudController
{
  public $model;
  public $modelRepository;

  public function __construct(LayoutBlock $model, LayoutBlockRepository $modelRepository)
  {
    $this->model = $model;
    $this->modelRepository = $modelRepository;
  }

  public function bulkUpdate(Request $request)
  {
    \DB::beginTransaction();
    try {
      $layoutBlocks = $request->input('attributes');//Get layout Blocks data
      $this->modelRepository->bulkUpdate($layoutBlocks);//Bulk update
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