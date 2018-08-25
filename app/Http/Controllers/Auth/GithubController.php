<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\ServiceRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\SocialiteManager;

class GithubController extends Controller
{
    /**
     * @var SocialiteManager $manager
     */
    private $manager;

    /**
     * @var ServiceRepositoryInterface
     */
    private $service;

    public function __construct(SocialiteManager $manager, ServiceRepositoryInterface $service)
    {
        $this->manager = $manager;
        $this->service = $service;
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return $this->manager->driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = $this->manager->driver('github')->user();

        $this->service->create([
            'driver' => 'github',
            'username' => strtolower($user->getNickname()),
            'password' => null,
            'token' => $user->token,
            'user_id' => Auth::id()
        ]);
    }
}