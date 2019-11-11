<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertisement;
use App\Page;
use Carbon\Carbon;
use App\Http\Requests\Admin\Page\StoreRequest;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PageController extends Controller
{
    public function siteIndex()
    {
        $advertisements = Advertisement::with(['state', 'galleries', 'location'])
        ->where('created_at', '>', Carbon::now()->subDays(30))->orderBy('id', 'desc')->take(5)->get();
        $expirateDate = Carbon::now()->subDays(30);

        return view('welcome', compact(['advertisements', 'expirateDate']));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.index',[
            'pages' => Page::paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        DB::beginTransaction();

        try {
            $page = Page::create($request->all());

            DB::commit();

            session()->flash('success', trans('sentence.page-create-success'));

            return back();
        } catch(\Exception $e) {
            Log::info($e);
            DB::rollback();

            session()->flash('danger',  trans('sentence.error-message'));

            return back()->withInput($request->all());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function siteShow($slug)
    {
        $page = Page::whereSlug($slug)
        ->firstOrFail();

        return view('page.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('admin.pages.edit',[
            'page' => $page
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Page $page, StoreRequest $request)
    {
        DB::beginTransaction();

        try {
            $page->update($request->all());

            DB::commit();

            session()->flash('success', trans('sentence.page-update-success'));

            return back();
        } catch(\Exception $e) {
            Log::info($e);
            DB::rollback();

            session()->flash('danger',  trans('sentence.error-message'));

            return back()->withInput($request->all());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Page $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
       
        if ($page->delete()) {
            $message = ['message.success' => trans('sentence.delete-page')];
        }

        return redirect()->route('pages.index')->with($message);
    }
}
