<?php
namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Settings::first(); // Fetch the first row of the settings table
        $data = compact('settings');
        return view('adminpanel.settings')->with($data);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'blog_name' => 'required',
            'blog_icon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Blog icon is no longer required for updates
        ]);

        // Check if there's an existing settings entry
        $setting = Settings::first() ?? new Settings(); // If no record, create a new instance

        // Handle the file upload if there's a new file
        if ($request->hasFile('blog_icon')) {
            $fileName = time() . "-NewsPulse." . $request->file('blog_icon')->getClientOriginalExtension();
            $request->file('blog_icon')->storeAs('public/image', $fileName);
            $setting->blog_icon = 'storage/image/' . $fileName;
        }

        $setting->blog_name = $request->input('blog_name');
        $setting->save();

        return redirect()->route('settings')->with('success', 'Settings updated successfully!');
    }
}
