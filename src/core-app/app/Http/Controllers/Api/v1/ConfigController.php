<?php

namespace Rubel\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Rubel\Http\Controllers\Controller;
use Rubel\Repositories\Eloquent\ConfigRepository;

class ConfigController extends Controller
{
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
        return response()->json($this->configRepository->findAll(), Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request): JsonResponse
    {
        $this->configRepository->update($request->all());

        return response()->json([], Response::HTTP_OK);
    }
}
