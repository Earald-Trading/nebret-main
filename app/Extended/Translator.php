<?php

namespace App\Extended;

use Illuminate\Translation\Translator as BaseTranslator;

class Translator extends BaseTranslator
{
    /**
     * Get the translation for the given key.
     *
     * @param  string  $key
     * @param  array  $replace
     * @param  string|null  $locale
     * @param  bool  $fallback
     * @return string|array
     */
    public function get($key, array $replace = [], $locale = null, $fallback_locale = true)
    {
        if (app('app')->currentLocale() != "en") {
            $key = mb_strtolower($key);
        }
        return parent::get($key, $replace, $locale, $fallback_locale);
    }
}
