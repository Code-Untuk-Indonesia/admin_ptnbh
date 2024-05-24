<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $footers = Footer::all();
        return view('admin.crud-footer.footer-index', compact('footers'));
    }

    public function create()
    {
        return view('footers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url',
        ]);

        Footer::create($request->all());

        return redirect()->route('footers.index')->with('success', 'Footer link created successfully.');
    }

    public function edit(Footer $footer)
    {
        return view('admin.crud-footer.edit', compact('footer'));
    }

    public function update(Request $request, Footer $footer)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url',
        ]);

        $footer->update($request->all());

        return redirect()->route('footers.index')->with('success', 'Footer link updated successfully.');
    }

    public function destroy(Footer $footer)
    {
        $footer->delete();

        return redirect()->route('footers.index')->with('success', 'Footer link deleted successfully.');
    }
    public function fefooter() {
        $footer = Footer::all();
        return view('halaman-user.template.header-footer', compact('footer'));
    }
}
