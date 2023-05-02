<?php

namespace App\Http\Controllers;

use App\Models\Translation;
use Illuminate\Http\Request;
use Facades\App\Services\TranslationService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class TranslationController extends Controller
{

    private $key;
    private $lang;

    public function __construct()
    {
        $this->key = request()->key ?? null;
        $this->lang = request()->lang ?? null;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $currentLang = TranslationService::findOrCreateLanguage($this->lang);
            $translation = TranslationService::createTranslation($this->key, $currentLang->id);
            DB::commit();

            return Response::success(Translation::SUCCESS, $translation);
        } catch (\Exception $e) {
            return Response::error($e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Translation $translation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Translation $translation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Translation $translation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Translation $translation)
    {
        //
    }
}
