<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\Api\ConfigRepository;

class ConfigController extends Controller
{
    /**
     * STATUS_CODE_OK
     *
     * @var integer
     */
    const STATUS_CODE_OK = 200;

    /**
     * ConfigRepository
     *
     * @var $configRepository
     */
    private $configRepository;

    /**
     * ConfigController constructor
     *
     * @param ConfigRepository $configRepository
     */
    public function __construct(ConfigRepository $configRepository)
    {
        $this->configRepository = $configRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json($this->configRepository->index(), (int) self::STATUS_CODE_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request): JsonResponse
    {
        return response()->json($this->configRepository->update($request), (int) self::STATUS_CODE_OK);
    }
}
