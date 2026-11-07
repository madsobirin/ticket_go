<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Operator\RouteRequest;
use App\Models\City;
use App\Models\Route;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RouteController extends Controller
{
    public function index(): View
    {
        $routes = Route::with(['origin', 'destination'])
            ->withCount('schedules')
            ->latest()
            ->paginate(15);

        return view('operator.routes.index', compact('routes'));
    }

    public function create(): View
    {
        $cities = City::orderBy('name')->get();

        return view('operator.routes.create', compact('cities'));
    }

    public function store(RouteRequest $request): RedirectResponse
    {
        Route::create($request->validated());

        return redirect()
            ->route('operator.routes.index')
            ->with('status', 'Rute perjalanan baru berhasil ditambahkan.');
    }

    public function edit(Route $route): View
    {
        $cities = City::orderBy('name')->get();

        return view('operator.routes.edit', compact('route', 'cities'));
    }

    public function update(RouteRequest $request, Route $route): RedirectResponse
    {
        $route->update($request->validated());

        return redirect()
            ->route('operator.routes.index')
            ->with('status', 'Data rute perjalanan berhasil diperbarui.');
    }

    public function destroy(Route $route): RedirectResponse
    {
        if ($route->schedules()->exists()) {
            return back()->with('error', 'Rute tidak dapat dihapus karena sudah memiliki jadwal keberangkatan.');
        }

        $route->delete();

        return redirect()
            ->route('operator.routes.index')
            ->with('status', 'Rute perjalanan berhasil dihapus.');
    }
}
