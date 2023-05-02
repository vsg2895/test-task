<?php

namespace App\Services;

use App\Models\Language;
use App\Models\Translation;

class TranslationService
{
    public function createTranslation($key, $lang)
    {
       return Translation::create(['key' => $key, 'language_id' => $lang]);
    }

    public function findOrCreateLanguage($lang)
    {
      $language = Language::where('name',$lang)->first();

      return is_null($language) ? Language::create(['name' => $lang]) : $language;
    }
}
