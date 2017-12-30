<?php

namespace Rubel\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Rubel\Http\Controllers\Controller;
use Rubel\Repositories\Eloquent\Api\ConfigRepository;

class ConfigController extends Controller
{
    /**
     * STATUS_CODE_OK
     *
     * @var int
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
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json($this->configRepository->index(), self::STATUS_CODE_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request): JsonResponse
    {
        return response()->json($this->configRepository->update($request), self::STATUS_CODE_OK);
    }
}
