<?php

namespace App\Resolvers;

use Illuminate\Support\Facades\Auth;
use OwenIt\Auditing\Contracts\UserResolver;

class AuditUserResolver implements UserResolver
{
    public static function resolve()
    {
        return Auth::guard('web')->check()
            ? Auth::guard('web')->user()
            : Auth::guard('api')->user();
    }
}
