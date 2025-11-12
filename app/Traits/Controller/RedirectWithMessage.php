<?php

namespace App\Traits\Controller;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;

trait RedirectWithMessage
{

    /**
     * @param string $route
     * @param string $alertType
     * @param string|null $message
     * @param int|null $params
     * @return RedirectResponse
     */
    public function redirectSuccess(
        string $route,
        string $alertType,
        string $message = null,
        ?int $params = null
    ): RedirectResponse
    {
        $message = $message ?? __('messages.success');

//        dd($params);
        return redirect()->route($route , $params )->with($alertType, $message);
    }

    /**
     * @param string $route
     * @param string $alertType
     * @param string|null $message
     * @param int|null $params
     * @return RedirectResponse
     */
    public function redirectError(
        string $route,
        string $alertType,
        string $message = null,
        ?int $params = null
    ): RedirectResponse
    {
        $message = $message ?? __('messages.error');

        return redirect()->route($route ,$params)->with($alertType, $message);
    }

    public function redirectTo(
        string $route,
        string $alertType,
        string $message = null,
    ): RedirectResponse
    {
        return redirect()->route($route )->with($alertType, $message);
    }
}
