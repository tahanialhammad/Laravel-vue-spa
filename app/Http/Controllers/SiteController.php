<?php

namespace App\Http\Controllers;


class SiteController extends Controller
{
    public function index()
    {
    return inertia('Home/Welcome');
    }

    // public function helpcenter()
    // {
    //     $sections =  FaqSection::all();
    //     $allFaqs = Faq::all();
    //     return view('site.helpcenter.index', compact('sections', 'allFaqs'));
    // }

    // public function helpcenterShow(FaqSection $section)
    // {
    //     $sections =  FaqSection::all();
    //     $allFaqs = Faq::all();
    //     return view('site.helpcenter.show', compact('section','sections', 'allFaqs'));
    // }

    // public function services()
    // {
    //     $services=[];
    //     return view('site.services.index', compact('services'));

    // }
}