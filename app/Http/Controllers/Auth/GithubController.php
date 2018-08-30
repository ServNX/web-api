<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\ServiceRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller
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
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        $uid = request()->user_id;
        $exists = $this->service->model()
            ->whereDriver('github')
            ->whereUserId($uid)
            ->first();

        if ($exists) {
            $exists->delete();
        }

        return Socialite::driver('github')
            ->stateless()
            ->redirectUrl(config('services.github.redirect') . "?user_id={$uid}")
            ->scopes([
                'user',
                'repo',
                'admin:org',
                'write:discussion'
            ])
            ->redirect()
            ->getTargetUrl();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')
            ->stateless()
            ->user();

        $this->service->create([
            'driver' => 'github',
            'username' => strtolower($user->getNickname()),
            'password' => null,
            'token' => $user->token,
            'user_id' => request()->user_id
        ]);

        return redirect()->away(config('app.url') . '/admin/services');
    }
}