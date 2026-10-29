<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use App\Traits\HandlesImageUpload;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use HandlesImageUpload;

    public function index()
    {
        $settings = SiteSetting::pluck('value', 'key')->toArray();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $inputs = $request->except(['_token', 'logo', 'favicon']);

        // Handle Logo upload
        if ($request->hasFile('logo')) {
            $request->validate(['logo' => 'image|mimes:jpeg,png,jpg,webp,svg|max:2048']);
            $oldLogo = SiteSetting::get('logo');
            $logoPath = $this->uploadImage($request->file('logo'), $oldLogo);
            SiteSetting::set('logo', $logoPath, 'general');
        }

        // Handle Favicon upload
        if ($request->hasFile('favicon')) {
            $request->validate(['favicon' => 'image|mimes:jpeg,png,jpg,ico,png|max:1024']);
            $oldFavicon = SiteSetting::get('favicon');
            $favPath = $this->uploadImage($request->file('favicon'), $oldFavicon);
            SiteSetting::set('favicon', $favPath, 'general');
        }

        // Handle Bangla features array
        if (isset($inputs['bn_features_text'])) {
            $bnLines = array_filter(array_map('trim', explode("\n", $inputs['bn_features_text'])));
            SiteSetting::set('bn_features', json_encode(array_values($bnLines)), 'bangla');
            unset($inputs['bn_features_text']);
        }

        // Handle SEO who list array
        if (isset($inputs['seo_who_list_text'])) {
            $whoLines = array_filter(array_map('trim', explode("\n", $inputs['seo_who_list_text'])));
            SiteSetting::set('seo_who_list', json_encode(array_values($whoLines)), 'seo');
            unset($inputs['seo_who_list_text']);
        }

        foreach ($inputs as $key => $val) {
            SiteSetting::set($key, $val);
        }

        return redirect()->route('admin.settings.index')->with('success', 'Settings updated successfully.');
    }
}

