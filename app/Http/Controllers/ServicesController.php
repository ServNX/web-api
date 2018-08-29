<?php

namespace App\Http\Controllers;

use App\Contracts\ServiceRepositoryInterface;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * @var ServiceRepositoryInterface
     */
    private $service;

    public function __construct(ServiceRepositoryInterface $service)
    {
        $this->service = $service;
    }

    /**
     * Links a service to a user account
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function link(Request $request)
    {
        $service = $this->service->create([
            'driver' => $request->service,
            'username' => strtolower($request->username),
            'password' => $request->has('password') ? $request->password : null,
            'token' => $request->token,
            'user_id' => $request->user_id
        ]);

        return response($service, 201);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response($this->service->all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response('Not Yet Implemented');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response('Not Yet Implemented');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return response('Not Yet Implemented');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response('Not Yet Implemented');
    }

}