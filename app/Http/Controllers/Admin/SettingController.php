<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use App\Models\SendMessage;
use App\Models\Setting;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SettingController extends Controller
{
    public function logo_create()
    {
        Gate::authorize('settings.index');

        $logo = Logo::latest()->first();


        return view('backend.settings.logo',compact('logo'));
    }

    public function logo_store(Request $request)
    {
        Gate::authorize('settings.create');

        $logo = Logo::latest()->first();
        $file_name = $logo->logo ?? '';
        $file_name1 = $logo->page_banner ?? '';
        $file_name2 = $logo->footer_logo ?? '';

        // Check and upload new logo if provided
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $file_name = time() . rand(0000, 9999) . '.' . $file->getClientOriginalExtension();
            if (isset($logo->logo) && file_exists($logo->logo)) {
                unlink($logo->logo);
            }
            $file->move('uploads/logo/', $file_name);
            $file_name = 'uploads/logo/' . $file_name;
        }

        // Check and upload new page banner if provided
        if ($request->hasFile('page_banner')) {
            $file1 = $request->file('page_banner');
            $file_name1 = time() . rand(0000, 9999) . '.' . $file1->getClientOriginalExtension();
            if (isset($logo->page_banner) && file_exists($logo->page_banner)) {
                unlink($logo->page_banner);
            }
            $file1->move('uploads/page_banner/', $file_name1);
            $file_name1 = 'uploads/page_banner/' . $file_name1;
        }

        // Check and upload new footer logo if provided
        if ($request->hasFile('footer_logo')) {
            $file2 = $request->file('footer_logo');
            $file_name2 = time() . rand(0000, 9999) . '.' . $file2->getClientOriginalExtension();
            if (isset($logo->footer_logo) && file_exists($logo->footer_logo)) {
                unlink($logo->footer_logo);
            }
            $file2->move('uploads/logo/', $file_name2);
            $file_name2 = 'uploads/logo/' . $file_name2;
        }

        // Update or create the logo entry
        Logo::updateOrCreate(
            ['title' => 'logo_image'],
            [
                'title' => 'logo_image',
                'site_title' => $request->site_title,
                'logo' => $file_name,
                'footer_logo' => $file_name2,
                'page_banner' => $file_name1,
            ]
        );

        flash()->addSuccess('Logo updated successfully');
        return back();
    }


    public function act_rule_create()
    {
        Gate::authorize('settings.index');

        $rule = Setting::where('name', 'rule_attachment')->latest()->first();



        $attachment=$rule->value??null;



        return view('backend.settings.act_rules',compact('attachment'));
    }

    public function act_rule_store(Request $request)
    {
        Gate::authorize('settings.create');

        $rule_attachment = Setting::where('name', 'rule_attachment')->latest()->first();
        $request->validate([
            'attachment' => 'required|mimes:jpg,jpeg,png,webp,pdf|max:150000',
        ]);
        if ($request->hasFile('attachment')){

            $file = $request->file('attachment');
            $file_name = time().rand(0000,9999).'.'.$file->getClientoriginalExtension();
            if(isset($rule_attachment->value)){
                unlink($rule_attachment->value);
            }
            $file->move('uploads/act_rules/',$file_name);

            Setting::updateOrCreate(
                ['name' => 'rule_attachment'],
                [
                    'name' => 'rule_attachment',
                    'value'=>'uploads/act_rules/' . $file_name
                ]
            );
        }
        flash()->addSuccess('Act & Rules Updated Successfully');
        return back();

    }

    public function map_details_create()
    {
        Gate::authorize('settings.index');

        $details = Setting::where('name', 'map_details')->latest()->first();



        $map_details=$details->value??null;



        return view('backend.settings.map_details',compact('map_details'));
    }

    public function map_details_store(Request $request)
    {
        Gate::authorize('settings.create');


            Setting::updateOrCreate(
                ['name' => 'map_details'],
                [
                    'name' => 'map_details',
                    'value'=>$request->map_details,
                ]
            );

        flash()->addSuccess('Map Details Updated Successfully');
        return back();

    }


    public function website_contact_create()
    {
        Gate::authorize('settings.index');

        $address = Setting::where('name', 'website_address')->latest()->first();
        $phone = Setting::where('name', 'website_phone')->latest()->first();
        $email = Setting::where('name', 'website_email')->latest()->first();
        $footer_details = Setting::where('name', 'footer_details')->latest()->first();
        $website_maps = Setting::where('name', 'website_maps')->latest()->first();



        $values['address']=$address->value??null;
        $values['phone']=$phone->value??null;
        $values['email']=$email->value??null;
        $values['footer_details']=$footer_details->value??null;
        $values['website_maps']=$website_maps->value??null;



        return view('backend.settings.contact_info',compact('values'));
    }

    public function website_contact_store(Request $request)
    {
        Gate::authorize('settings.create');
//
//        dd($request);

        Setting::updateOrCreate(
            ['name' => 'website_address'],
            [
                'name' => 'website_address',
                'value'=>$request->website_address,
            ]
        );
        Setting::updateOrCreate(
            ['name' => 'website_phone'],
            [
                'name' => 'website_phone',
                'value'=>$request->phone,
            ]
        );
        Setting::updateOrCreate(
            ['name' => 'website_email'],
            [
                'name' => 'website_email',
                'value'=>$request->email,
            ]
        );
        Setting::updateOrCreate(
            ['name' => 'footer_details'],
            [
                'name' => 'footer_details',
                'value'=>$request->footer_details,
            ]
        );
        Setting::updateOrCreate(
            ['name' => 'website_maps'],
            [
                'name' => 'website_maps',
                'value'=>$request->website_maps,
            ]
        );


        flash()->addSuccess('Contact Info Updated Successfully');
        return back();

    }

    public function website_links_create()
    {
        Gate::authorize('settings.index');

        $twitter = Setting::where('name', 'website_twitter')->latest()->first();
        $facebook = Setting::where('name', 'website_facebook')->latest()->first();
        $instagram = Setting::where('name', 'website_instagram')->latest()->first();
        $linkedin = Setting::where('name', 'website_linkedin')->latest()->first();



        $values['twitter']=$twitter->value??null;
        $values['facebook']=$facebook->value??null;
        $values['instagram']=$instagram->value??null;
        $values['linkedin']=$linkedin->value??null;



        return view('backend.settings.social_links',compact('values'));
    }

    public function website_links_store(Request $request)
    {
        Gate::authorize('settings.create');


        Setting::updateOrCreate(
            ['name' => 'website_twitter'],
            [
                'name' => 'website_twitter',
                'value'=>$request->twitter,
            ]
        );
        Setting::updateOrCreate(
            ['name' => 'website_facebook'],
            [
                'name' => 'website_facebook',
                'value'=>$request->facebook,
            ]
        );
        Setting::updateOrCreate(
            ['name' => 'website_instagram'],
            [
                'name' => 'website_instagram',
                'value'=>$request->instagram,
            ]
        );
        Setting::updateOrCreate(
            ['name' => 'website_linkedin'],
            [
                'name' => 'website_linkedin',
                'value'=>$request->linkedin,
            ]
        );


        flash()->addSuccess('Social Links Updated Successfully');
        return back();

    }

    public function subscribe()
    {
        $subscribes = Subscribe::get();
        return view('backend.settings.subscribe',compact('subscribes'));
    }

    public function subscribeDestroy($id)
    {
        Gate::authorize('subscribe.destroy');
        $brand = Subscribe::where('id', $id)->first();
        $brand->delete();
        flash()->addSuccess('Deleted successfully');

        return redirect()->back();
    }

    public function message()
    {
        $messages = SendMessage::get();
        return view('backend.settings.message',compact('messages'));
    }

    public function messageDestroy($id)
    {
        Gate::authorize('message.destroy');
        $brand = SendMessage::where('id', $id)->first();
        $brand->delete();
        flash()->addSuccess('Deleted successfully');

        return redirect()->back();
    }

    public function messageShow(SendMessage $message)
    {
        return view('backend.settings.message-show', compact('message'));
    }
}
