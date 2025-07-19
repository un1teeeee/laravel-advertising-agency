<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\Service;

class ApplicationController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $applications = Application::all();
        return view('admin.applications', compact('applications', 'services'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20|regex:/^\+?[1-9]\d{1,14}$/',
        ]);

        try {
            $application = Application::create($validatedData);
            \Log::info('Заявка создана, ID: ' . $application->id);
            return redirect()->back()->with('success', 'Заявка успешно отправлена.');
        } catch (\Exception $e) {
            \Log::error('Ошибка при создании заявки: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Произошла ошибка при отправке заявки: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy($id)
    {
        $application = Application::findOrFail($id);

        $application->delete();
    }
}
