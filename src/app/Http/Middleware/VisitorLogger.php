<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\VisitorLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class VisitorLogger
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        try {
            if (! $this->shouldSkip($request)) {
                VisitorLog::create([
                    'user_id' => auth()->id(),

                    'ip_address' => $this->getRealIp($request),

                    'method' => $request->method(),
                    'path' => '/' . ltrim($request->path(), '/'),
                    'full_url' => $request->fullUrl(),
                    'status_code' => $response->getStatusCode(),
                    'user_agent' => $request->userAgent(),
                    'referer' => $request->headers->get('referer'),
                ]);
            }
        } catch (\Throwable $e) {
            Log::error('VisitorLogger gagal menyimpan data visitor.', [
                'message' => $e->getMessage(),
                'path' => $request->path(),
                'url' => $request->fullUrl(),
            ]);
        }

        return $response;
    }

    private function getRealIp(Request $request): string
    {
        // IP asli dari Cloudflare
        if ($request->header('CF-Connecting-IP')) {
            return $request->header('CF-Connecting-IP');
        }

        // IP dari proxy/load balancer
        if ($request->header('X-Forwarded-For')) {
            return trim(explode(',', $request->header('X-Forwarded-For'))[0]);
        }

        return $request->ip() ?? 'unknown';
    }

    private function shouldSkip(Request $request): bool
    {
        return $request->is(
            // Jangan log halaman admin Filament supaya tidak spam database
            'admin',
            'admin/*',

            // Asset frontend
            'build/*',
            'css/*',
            'js/*',
            'images/*',
            'img/*',
            'assets/*',
            'storage/*',

            // File umum
            'favicon.ico',
            'robots.txt',
            'sitemap.xml',

            // Laravel/Filament/Livewire internal
            '_debugbar/*',
            'livewire/*',
            'filament/*'
        );
    }
}