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
    'accepted'             => ':attribute повинні бути прийняті.',
    'active_url'           => ':attribute є недійсною URL-адресою.',
    'after'                => ':attribute має бути пізніше, ніж :date.',
    'after_or_equal'       => ':attribute повинні бути не раніше ніж :date.',
    'alpha'                => ':attribute він може містити лише букви.',
    'alpha_dash'           => ':attribute він може містити лише літери, цифри та тире.',
    'alpha_num'            => ':attribute він може містити лише букви та цифри.',
    'array'                => ':attribute повинен бути масивом.',
    'before'               => ':attribute повинні бути раніше, ніж :date.',
    'before_or_equal'      => ':attribute має бути дата не пізніше :date.',
    'between'              => [
        'numeric' => ':attribute повинні бути в межах :min - :max.',
        'file'    => ':attribute повинні бути в межах :min - :max кілобайт.',
        'string'  => ':attribute повинні бути в межах :min - :max символи.',
        'array'   => ':attribute повинні складатися з :min - :max пункти.',
    ],
    'boolean'              => ':attribute повинні бути правдивими чи хибними',
    'confirmed'            => 'підтвердження :attribute не погоджується.',
    'date'                 => ':attribute не є дійсною датою.',
    'date_equals'          => ':attribute повинна бути дата, що дорівнює :date.',
    'date_format'          => ':attribute не у форматі :format.',
    'different'            => ':attribute і :other повинні бути різними.',
    'digits'               => ':attribute повинні складатися з :digits цифри.',
    'digits_between'       => ':attribute повинен мати від :min в :max цифри.',
    'dimensions'           => ':attribute має неправильні розміри.',
    'distinct'             => ':attribute має повторювані значення.',
    'email'                => 'формат :attribute недійсний.',
    'ends_with'            => ':attribute має закінчуватися одним із наступних значень: :values',
    'exists'               => 'обраний :attribute недійсний.',
    'file'                 => ':attribute повинен бути файл.',
    'filled'               => 'поле :attribute потрібно.',
    'gt'                   => [
        'numeric' => ':attribute має бути більше, ніж :value.',
        'file'    => ':attribute має бути більше, ніж :value кілобайт.',
        'string'  => ':attribute має бути довше, ніж :value символи.',
        'array'   => ':attribute повинно мати більше :value пункти.',
    ],
    'gte'                  => [
        'numeric' => ':attribute має бути більшим або рівним :value.',
        'file'    => ':attribute має бути більшим або рівним :value кілобайт.',
        'string'  => ':attribute повинні бути довші або рівні :value символи.',
        'array'   => ':attribute повинно мати :value або більше пункти.',
    ],
    'image'                => ':attribute повинна бути картина.',
    'in'                   => 'обраний :attribute недійсний.',
    'in_array'             => ':attribute не в :other.',
    'integer'              => ':attribute має бути цілим числом.',
    'ip'                   => ':attribute має бути дійсною IP-адресою.',
    'ipv4'                 => ':attribute повинна бути дійсною IPv4 адресою.',
    'ipv6'                 => ':attribute повинна бути дійсною IPv6 адресою.',
    'json'                 => ':attribute має бути дійсним рядком JSON.',
    'lt'                   => [
        'numeric' => ':attribute має бути менше, ніж :value.',
        'file'    => ':attribute має бути менше, ніж :value кілобайт.',
        'string'  => ':attribute повинна бути коротшою, ніж :value символи.',
        'array'   => ':attribute повинно мати менше, ніж :value пункти.',
    ],
    'lte'                  => [
        'numeric' => ':attribute має бути меншим або рівним :value.',
        'file'    => ':attribute має бути меншим або рівним :value кілобайт.',
        'string'  => ':attribute має бути коротшим або рівним :value символи.',
        'array'   => ':attribute повинно мати :value або менше пункти.',
    ],
    'max'                  => [
        'numeric' => ':attribute не може бути більше, ніж :max.',
        'file'    => ':attribute не може бути більше, ніж :max кілобайт.',
        'string'  => ':attribute не може бути довше, ніж :max символи.',
        'array'   => ':attribute не може мати більше :max пункти.',
    ],
    'mimes'                => ':attribute має бути файлом типу :values.',
    'mimetypes'            => ':attribute має бути файлом типу :values.',
    'min'                  => [
        'numeric' => ':attribute має бути не менше ніж :min.',
        'file'    => ':attribute повинні мати хоча б :min кілобайт.',
        'string'  => ':attribute повинні мати хоча б :min символи.',
        'array'   => ':attribute повинні мати хоча б :min пункти.',
    ],
    'not_in'               => 'обраний :attribute недійсний.',
    'not_regex'            => 'формат :attribute недійсний.',
    'numeric'              => ':attribute повинно бути число.',
    'password'             => 'Неправильний пароль.',
    'present'              => 'поле :attribute повинні бути присутніми.',
    'regex'                => 'формат :attribute недійсний.',
    'required'             => 'поле :attribute потрібно.',
    'required_if'          => 'поле :attribute потрібно, коли :other є :value.',
    'required_unless'      => ':attribute потрібно, якщо :other не в :values.',
    'required_with'        => 'поле :attribute потрібно, коли :values присутній.',
    'required_with_all'    => 'поле :attribute потрібно, коли :values присутній.',
    'required_without'     => 'поле :attribute потрібно, коли :values немає.',
    'required_without_all' => 'поле :attribute потрібно, коли жоден з :values немає.',
    'same'                 => 'поле :attribute i :other вони повинні погодитися.',
    'size'                 => [
        'numeric' => ':attribute повинно мати :size.',
        'file'    => ':attribute повинно мати :size кілобайт.',
        'string'  => ':attribute повинно мати :size символи.',
        'array'   => ':attribute повинні містити :size пункти.',
    ],
    'starts_with'          => ':attribute потрібно починати з одного з наступних: :values',
    'string'               => ':attribute повинна бути рядок символи.',
    'timezone'             => ':attribute повинен бути дійсним часовим поясом.',
    'unique'               => 'такі :attribute вже існує.',
    'uploaded'             => 'Не вдалося завантажити файл :attribute.',
    'url'                  => 'формат :attribute недійсний.',
    'uuid'                 => ':attribute має бути дійсним UUID.',
    'greater_than_field' => ':attribute повинно бути більше мінімального значення',
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
        'name' => 'ім\'я',
        'shot_description' => 'короткий опис',
        'body' => 'зміст',
        'is_active' => 'активація',
        'first_name' => 'ім\'я',
        'last_name' => 'ім\'я',
        'password' => 'пароль',
        'password_confirmation' => 'повторити пароль',
        'sex' => 'секс',
        'title' => 'назва',
        'postCode' => 'поштовий індекс',
        'description' => 'опис',
        'currency_id' => 'валюта',
        'category_id' => 'категорія',
        'work_id' => 'вид роботи',
        'min_salary' => 'мінімальна сума',
        'max_salary' => 'максимальна сума',
        'company_name' => 'назва компанії',
        'company_street' => 'адреса компанії',
        'company_post_code' => 'компанія поштовий індекс',
        'company_city' => 'місто компанії',
        'company_nip' => 'NIP',
        'company_phone1' => 'діловий телефон',
        'company_phone2' => 'додатковий телефон компанії',
        'workplace' => 'місце роботи',
        'exp_company_name' => 'назва компанії',
        'exp_city' => 'місто',
        'start_date' => 'дата початку',
        'end_date' => 'дата закінчення',
        'responsibility' => 'обсяг обов\'язків',
        'organizer' => 'організатор',
        'lang_key' => 'мова',
        'level' => 'рівень',
        'settlement_id' => 'вид контракту',
        'location_id' => 'місце',
        'radius' => 'промінь',
        'message' => 'повідомлення',
        'specializations' => 'спеціалізацій',
        'cover' => 'рекламне фото',
        'age' => 'вік',
        'criteria' => 'критерії',
        'worktime' => 'робочий час',
        'galleries.*' => 'рекламне фото',
        'mailinglist_id' => 'список пошти'
    ],
];