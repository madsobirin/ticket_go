<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Operator\CityRequest;
use App\Models\City;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CityController extends Controller
{
    public function index(): View
    {
        $cities = City::withCount(['originRoutes', 'destinationRoutes'])
            ->orderBy('name')
            ->paginate(15);

        return view('operator.cities.index', compact('cities'));
    }

    public function create(): View
    {
        return view('operator.cities.create');
    }

    public function store(CityRequest $request): RedirectResponse
    {
        City::create($request->validated());

        return redirect()
            ->route('operator.cities.index')
            ->with('status', 'Kota baru berhasil ditambahkan.');
    }

    public function edit(City $city): View
    {
        return view('operator.cities.edit', compact('city'));
    }

    public function update(CityRequest $request, City $city): RedirectResponse
    {
        $city->update($request->validated());

        return redirect()
            ->route('operator.cities.index')
            ->with('status', 'Data kota berhasil diperbarui.');
    }

    public function destroy(City $city): RedirectResponse
    {
        if ($city->originRoutes()->exists() || $city->destinationRoutes()->exists()) {
            return back()->with('error', 'Kota tidak dapat dihapus karena masih terhubung dengan rute perjalanan.');
        }

        $city->delete();

        return redirect()
            ->route('operator.cities.index')
            ->with('status', 'Kota berhasil dihapus.');
    }
}
