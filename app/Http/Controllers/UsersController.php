<?php

namespace App\Http\Controllers;

use App\Contracts\UserRepositoryInterface;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    protected $user;

    /**
     * UserController constructor.
     * @param UserRepositoryInterface $user
     */
    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return response('Not Yet Implemented');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return UserResource
     */
    public function store(Request $request)
    {
        return response('Not Yet Implemented');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return UserResource
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
     * @return UserResource
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