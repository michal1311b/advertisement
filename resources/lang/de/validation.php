<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages.
    |
    */
    'accepted'             => ':attribute muss akzeptiert werden.',
    'active_url'           => ':attribute ist eine ungültige URL.',
    'after'                => ':attribute muss später sein als :date.',
    'after_or_equal'       => ':attribute darf nicht früher sein als :date.',
    'alpha'                => ':attribute Es kann nur Buchstaben enthalten.',
    'alpha_dash'           => ':attribute Es kann nur Buchstaben, Zahlen und Bindestriche enthalten.',
    'alpha_num'            => ':attribute Es kann nur Buchstaben und Zahlen enthalten.',
    'array'                => ':attribute muss ein Array sein.',
    'before'               => ':attribute muss früher sein als :date.',
    'before_or_equal'      => ':attribute muss ein Datum bis spätestens sein :date.',
    'between'              => [
        'numeric' => ':attribute muss innerhalb der Grenzen liegen :min - :max.',
        'file'    => ':attribute muss innerhalb der Grenzen liegen :min - :max kilobajtów.',
        'string'  => ':attribute muss innerhalb der Grenzen liegen :min - :max znaków.',
        'array'   => ':attribute muss bestehen aus :min - :max artikel.',
    ],
    'boolean'              => ':attribute muss wahr oder falsch sein',
    'confirmed'            => 'Bestätigung :attribute stimmt nicht zu.',
    'date'                 => ':attribute ist kein gültiges Datum.',
    'date_equals'          => ':attribute muss ein Datum gleich sein :date.',
    'date_format'          => ':attribute ist nicht im Format :format.',
    'different'            => ':attribute und :other muss anders sein.',
    'digits'               => ':attribute muss bestehen aus :digits ziffern.',
    'digits_between'       => ':attribute muss von haben :min zu :max ziffern.',
    'dimensions'           => ':attribute hat falsche Abmessungen.',
    'distinct'             => ':attribute hat doppelte Werte.',
    'email'                => 'Das Format :attribute ist ungültig.',
    'ends_with'            => ':attribute muss mit einem der folgenden Werte enden: :values',
    'exists'               => 'Ausgewählt :attribute ist ungültig.',
    'file'                 => ':attribute muss eine Datei sein.',
    'filled'               => 'Feld :attribute ist erforderlich.',
    'gt'                   => [
        'numeric' => ':attribute muss größer sein als :value.',
        'file'    => ':attribute muss größer sein als :value kilobajtów.',
        'string'  => ':attribute muss größer sein als :value znaków.',
        'array'   => ':attribute muss größer sein als :value elementów.',
    ],
    'gte'                  => [
        'numeric' => ':attribute muss größer oder gleich sein :value.',
        'file'    => ':attribute muss größer oder gleich sein :value Kilobyte.',
        'string'  => ':attribute muss länger oder gleich sein :value Zeichen.',
        'array'   => ':attribute muss haben :value oder mehr Gegenstände.',
    ],
    'image'                => ':attribute muss ein Bild sein.',
    'in'                   => 'Ausgewählt :attribute ist ungültig.',
    'in_array'             => ':attribute ist nicht in :other.',
    'integer'              => ':attribute muss eine ganze Zahl sein.',
    'ip'                   => ':attribute muss eine gültige IP-Adresse sein.',
    'ipv4'                 => ':attribute muss eine gültige IPv4-Adresse sein.',
    'ipv6'                 => ':attribute muss eine gültige IPv6-Adresse sein.',
    'json'                 => ':attribute muss eine gültige JSON-Zeichenfolge sein.',
    'lt'                   => [
        'numeric' => ':attribute muss kleiner sein als :value.',
        'file'    => ':attribute muss kleiner sein als :value Kilobyte.',
        'string'  => ':attribute muss kürzer sein als :value Zeichen.',
        'array'   => ':attribute muss weniger haben als :value Artikel.',
    ],
    'lte'                  => [
        'numeric' => ':attribute muss kleiner oder gleich sein :value.',
        'file'    => ':attribute muss kleiner oder gleich sein :value Kilobyte.',
        'string'  => ':attribute muss kürzer oder gleich sein :value Zeichen.',
        'array'   => ':attribute muss haben :value oder weniger Artikel.',
    ],
    'max'                  => [
        'numeric' => ':attribute kann nicht größer sein als :max.',
        'file'    => ':attribute kann nicht größer sein als :max Kilobyte.',
        'string'  => ':attribute kann nicht länger sein niż :max Zeichen.',
        'array'   => ':attribute kann nicht mehr haben als :max Artikel.',
    ],
    'mimes'                => ':attribute muss eine Datei vom Typ sein :values.',
    'mimetypes'            => ':attribute muss eine Datei vom Typ sein :values.',
    'min'                  => [
        'numeric' => ':attribute muss nicht kleiner sein als :min.',
        'file'    => ':attribute muss mindestens haben :min Kilobyte.',
        'string'  => ':attribute muss mindestens haben :min Zeichen.',
        'array'   => ':attribute muss mindestens haben :min Artikel.',
    ],
    'not_in'               => 'Ausgewählt :attribute ist ungültig.',
    'not_regex'            => 'Das Format :attribute ist ungültig.',
    'numeric'              => ':attribute muss eine Zahl sein.',
    'password'             => 'Das Passwort ist falsch.',
    'present'              => 'Feld :attribute muss vorhanden sein.',
    'regex'                => 'Das Format :attribute ist ungültig.',
    'required'             => 'Feld :attribute ist erforderlich.',
    'required_if'          => 'Feld :attribute ist erforderlich, wenn :other ist :value.',
    'required_unless'      => ':attribute ist erforderlich, wenn :other ist nicht in :values.',
    'required_with'        => 'Feld :attribute ist erforderlich, wenn :values ist vorhanden.',
    'required_with_all'    => 'Feld :attribute ist erforderlich, wenn :values ist vorhanden.',
    'required_without'     => 'Feld :attribute ist erforderlich, wenn :values ist nicht vorhanden.',
    'required_without_all' => 'Feld :attribute ist erforderlich, wenn keine von :values sind nicht vorhanden.',
    'same'                 => 'Feld :attribute und :other sie müssen zustimmen.',
    'size'                 => [
        'numeric' => ':attribute muss haben :size.',
        'file'    => ':attribute muss haben :size Kilobyte.',
        'string'  => ':attribute muss haben :size Zeichen.',
        'array'   => ':attribute muss enthalten :size Artikel.',
    ],
    'starts_with'          => ':attribute muss mit einem der folgenden Punkte beginnen: :values',
    'string'               => ':attribute muss eine Zeichenfolge sein.',
    'timezone'             => ':attribute muss eine gültige Zeitzone sein.',
    'unique'               => 'So :attribute existiert bereits.',
    'uploaded'             => 'Fehler beim Hochladen der Datei :attribute.',
    'url'                  => 'Das Format :attribute ist ungültig.',
    'uuid'                 => ':attribute muss eine gültige UUID sein.',
    'greater_than_field' => ':attribute muss größer als der Mindestwert sein',
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message'
        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */
    'attributes' => [
        'name' => 'Name',
        'shot_description' => 'kurze Beschreibung',
        'body' => 'Inhalt',
        'is_active' => 'Aktivierung',
        'first_name' => 'Name',
        'last_name' => 'Name',
        'password' => 'Kennwort',
        'password_confirmation' => 'Passwort wiederholen',
        'sex' => 'Sex',
        'title' => 'Titel',
        'postCode' => 'Postleitzahl',
        'description' => 'Beschreibung',
        'currency_id' => 'Währung',
        'category_id' => 'Kategorie',
        'work_id' => 'Art der Arbeit',
        'min_salary' => 'Mindestbetrag',
        'max_salary' => 'maximale Menge',
        'company_name' => 'Firmenname',
        'company_street' => 'Firmenadresse',
        'company_post_code' => 'Postleitzahl des Unternehmens',
        'company_city' => 'Firmenstadt',
        'company_nip' => 'NIP',
        'company_phone1' => 'Geschäftstelefon',
        'company_phone2' => 'zusätzliches Firmentelefon',
        'workplace' => 'Arbeitsort',
        'exp_company_name' => 'Firmenname',
        'exp_city' => 'Stadt',
        'start_date' => 'Startdatum',
        'end_date' => 'Enddatum',
        'responsibility' => 'Aufgabenbereich',
        'organizer' => 'Veranstalter',
        'lang_key' => 'Sprache',
        'level' => 'Ebene',
        'settlement_id' => 'Art des Vertrags',
        'location_id' => 'Lage',
        'radius' => 'Strahl',
        'message' => 'Nachricht',
        'specializations' => 'Spezialisierungen',
        'cover' => 'Werbefoto',
        'age' => 'Alter',
        'criteria' => 'Kriterien',
        'worktime' => 'Arbeitszeit',
        'galleries.*' => 'Werbefoto',
        'mailinglist_id' => 'Mailingliste',
        'user_location_id' => 'Lage'
    ],
];