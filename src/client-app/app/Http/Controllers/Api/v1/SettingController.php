<?php

namespace Rubel\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Rubel\Http\Controllers\Controller;
use Rubel\Repositories\Eloquent\Api\SettingRepository;

class SettingController extends Controller
{
    /**
     * SettingRepository
     *
     * @var $settingRepository
     */
    private $settingRepository;

    /**
     * SettingController constructor
     *
     * @param SettingRepository $settingRepository
     */
    public function __construct(SettingRepository $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json($this->settingRepository->index(), Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request): JsonResponse
    {
        return response()->json($this->settingRepository->update($request), Response::HTTP_OK);
    }
}
