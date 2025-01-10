<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OverviewInfo;
use App\Models\Setting;
use App\Models\ViceChancellorInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SettingController extends Controller
{
    public function organogram_create()
    {
        Gate::authorize('settings.index');

        $organogram_image = Setting::where('name', 'organogram_image')->latest()->first();


        $image=$organogram_image->value??null;



        return view('backend.settings.organogram',compact('image'));
    }

    public function organogram_store(Request $request)
    {
        Gate::authorize('settings.create');

        $organogram_image = Setting::where('name', 'organogram_image')->latest()->first();

        if ($request->hasFile('image')){

            $file = $request->file('image');
            $file_name = time().rand(0000,9999).'.'.$file->getClientoriginalExtension();
            if(isset($organogram_image->value)){
                unlink($organogram_image->value);
            }
            $file->move('uploads/organogram/',$file_name);

            Setting::updateOrCreate(
                ['name' => 'organogram_image'],
                [
                    'name' => 'organogram_image',
                    'value'=>'uploads/organogram/' . $file_name
                ]
            );
        }
        flash()->addSuccess('Organogram Added Successfully');
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
        $fax = Setting::where('name', 'website_fax')->latest()->first();



        $values['address']=$address->value??null;
        $values['phone']=$phone->value??null;
        $values['email']=$email->value??null;
        $values['fax']=$fax->value??null;



        return view('backend.settings.contact_info',compact('values'));
    }

    public function website_contact_store(Request $request)
    {
        Gate::authorize('settings.create');


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
            ['name' => 'website_fax'],
            [
                'name' => 'website_fax',
                'value'=>$request->fax,
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
}
