<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use App\Models\Situs;
use App\Models\Kontak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class LogoSite
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $situs      = Situs::find(1);
        $nm_desa    = $situs->nm_desa;
        $kecamatan  = $situs->kecamatan;
        $kabupaten  = $situs->kabupaten;
        $provinsi   = $situs->provinsi;
        $kode_pos   = $situs->kode_pos;

        $kontak     = Kontak::find(1);
        $no_hp      = $kontak->no_hp;
        $email      = $kontak->email;
        
        $user       = User::find(1);

        View::share('logo', $situs);
        View::share('nm_desa', $nm_desa);
        View::share('kecamatan', $kecamatan);
        View::share('kabupaten', $kabupaten);
        View::share('provinsi', $provinsi);
        View::share('kode_pos', $kode_pos);

        View::share('no_hp', $no_hp);
        View::share('email', $email);

        View::share('foto', $user);

        return $next($request);
    }
}
