<?php

namespace App\Traits\logging;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

trait loggable
{
    public function getDefaultContext() {
        return [
            'user_id' => Auth::id() ?? null,
            'user_name' => Auth::user()->user_name ?? 'guest',
            'ip' => request()->ip(),
            'url' => request()->fullUrl(),
            'method' => request()->method(),
        ];
    }

    public function logInfo(string $message, ?array $context = null)
    {
        Log::channel('info_daily')->info(
            $message,
            array_merge($this->getDefaultContext(), $context ?? [])
        );
    }
    public function logError(string $message, ?array $context = null)
    {
        Log::channel('error_daily')->error(
            $message,
            array_merge($this->getDefaultContext(), $context ?? [])
        );
    }
}
