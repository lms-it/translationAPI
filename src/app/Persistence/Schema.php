<?php

namespace App\Persistence;

class Schema{
    //Reseller
    const RESELLER_TABLE = "reseller";
    const RESELLER_ID = "id";
    const RESELLER_TEXT = "default_text";
    //Translation
    const TRANSLATION_TABLE = "translation";
    const TRANSLATION_TEXT = "text";
    const TRANSLATION_RESELLER_ID = "id_reseller";
    const TRANSLATION_LANGUAGE_ID = "id_language";
    //Language
    const LANGUAGE_TABLE = "language";
    const LANGUAGE_CODE = "lang_code";
}