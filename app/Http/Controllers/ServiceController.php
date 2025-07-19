<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.services', compact('services'));
    }

    public function showService($id)
    {
        $services = Service::all();
        $service = Service::where('id', $id)->first();
        return view('service', compact('service', 'services'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|unique:services,title|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        try {
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->file('image')->extension();
                $request->file('image')->move(public_path('img/services'), $imageName);
                $validatedData['image'] = $imageName;
            }

            $service = new Service();
            $service->fill($validatedData);
            $service->save();

            return redirect()->route('admin.services')->with('success', 'Услуга успешно добавлена.');
        } catch (\Exception $e) {
            \Log::error('Ошибка при добавлении услуги: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Произошла ошибка при добавлении услуги: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $service = Service::findOrFail($id);

            if ($service->image && file_exists(storage_path('app/public/img/services/' . $service->image))) {
                unlink(storage_path('app/public/img/services/' . $service->image));
            }

            $service->delete();

            return redirect()->route('admin.services')->with('success', 'Услуга успешно удалена.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Произошла ошибка при удалении услуги: ' . $e->getMessage());
        }
    }
}
