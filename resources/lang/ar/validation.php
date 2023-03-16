<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */



    'accepted'        => 'يجب قبول :attribute.',
    'active_url'      => ':attribute لا يُمثّل رابطًا صحيحًا.',
    'after'           => 'يجب على :attribute أن يكون تاريخًا لاحقًا للتاريخ :date.',
    'after_or_equal'  => ':attribute يجب أن يكون تاريخاً لاحقاً أو مطابقاً للتاريخ :date.',
    'alpha'           => 'يجب أن لا يحتوي :attribute سوى على حروف.',
    'alpha_dash'      => 'يجب أن لا يحتوي :attribute سوى على حروف، أرقام ومطّات.',
    'alpha_num'       => 'يجب أن يحتوي :attribute على حروفٍ وأرقامٍ فقط.',
    'array'           => 'يجب أن يكون :attribute ًمصفوفة.',
    'before'          => 'يجب على :attribute أن يكون تاريخًا سابقًا للتاريخ :date.',
    'before_or_equal' => ':attribute يجب أن يكون تاريخا سابقا أو مطابقا للتاريخ :date.',
    'between'         => [
        'numeric' => 'يجب أن تكون قيمة :attribute بين :min و :max.',
        'file'    => 'يجب أن يكون حجم الملف :attribute بين :min و :max كيلوبايت.',
        'string'  => 'يجب أن يكون عدد حروف النّص :attribute بين :min و :max.',
        'array'   => 'يجب أن يحتوي :attribute على عدد من العناصر بين :min و :max.',
    ],
    'boolean'        => 'يجب أن تكون قيمة :attribute إما true أو false .',
    'confirmed'      => 'حقل التأكيد غير مُطابق للحقل :attribute.',
    'date'           => ':attribute ليس تاريخًا صحيحًا.',
    'date_equals'    => 'يجب أن يكون :attribute مطابقاً للتاريخ :date.',
    'date_format'    => 'لا يتوافق :attribute مع الشكل :format.',
    'different'      => 'يجب أن يكون الحقلان :attribute و :other مُختلفين.',
    'digits'         => 'يجب أن يحتوي :attribute على :digits رقمًا/أرقام.',
    'digits_between' => 'يجب أن يحتوي :attribute بين :min و :max رقمًا/أرقام .',
    'dimensions'     => 'الـ :attribute يحتوي على أبعاد صورة غير صالحة.',
    'distinct'       => 'قيمة :attribute مُكرّرة.',
    'email'          => 'يجب أن يكون :attribute عنوان بريد إلكتروني صحيح البُنية.',
    'ends_with'      => 'يجب أن ينتهي :attribute بأحد القيم التالية: :values',
    'exists'         => 'قيمة :attribute غير صحيحة.',
    'file'           => 'الـ :attribute يجب أن يكون ملفا.',
    'filled'         => ':attribute إجباري.',
    'gt'             => [
        'numeric' => 'يجب أن تكون قيمة :attribute أكبر من :value.',
        'file'    => 'يجب أن يكون حجم الملف :attribute أكبر من :value كيلوبايت.',
        'string'  => 'يجب أن يكون طول النّص :attribute أكثر من :value حروفٍ/حرفًا.',
        'array'   => 'يجب أن يحتوي :attribute على أكثر من :value عناصر/عنصر.',
    ],
    'gte' => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية أو أكبر من :value.',
        'file'    => 'يجب أن يكون حجم الملف :attribute على الأقل :value كيلوبايت.',
        'string'  => 'يجب أن يكون طول النص :attribute على الأقل :value حروفٍ/حرفًا.',
        'array'   => 'يجب أن يحتوي :attribute على الأقل على :value عُنصرًا/عناصر.',
    ],
    'image'    => 'يجب أن يكون :attribute صورةً.',
    'in'       => ':attribute غير موجود.',
    'in_array' => ':attribute غير موجود في :other.',
    'integer'  => 'يجب أن يكون :attribute عددًا صحيحًا.',
    'ip'       => 'يجب أن يكون :attribute عنوان IP صحيحًا.',
    'ipv4'     => 'يجب أن يكون :attribute عنوان IPv4 صحيحًا.',
    'ipv6'     => 'يجب أن يكون :attribute عنوان IPv6 صحيحًا.',
    'json'     => 'يجب أن يكون :attribute نصآ من نوع JSON.',
    'lt'       => [
        'numeric' => 'يجب أن تكون قيمة :attribute أصغر من :value.',
        'file'    => 'يجب أن يكون حجم الملف :attribute أصغر من :value كيلوبايت.',
        'string'  => 'يجب أن يكون طول النّص :attribute أقل من :value حروفٍ/حرفًا.',
        'array'   => 'يجب أن يحتوي :attribute على أقل من :value عناصر/عنصر.',
    ],
    'lte' => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية أو أصغر من :value.',
        'file'    => 'يجب أن لا يتجاوز حجم الملف :attribute :value كيلوبايت.',
        'string'  => 'يجب أن لا يتجاوز طول النّص :attribute :value حروفٍ/حرفًا.',
        'array'   => 'يجب أن لا يحتوي :attribute على أكثر من :value عناصر/عنصر.',
    ],
    'max' => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية أو أصغر من :max.',
        'file'    => 'يجب أن لا يتجاوز حجم الملف :attribute :max كيلوبايت.',
        'string'  => 'يجب أن لا يتجاوز طول النّص :attribute :max حروفٍ/حرفًا.',
        'array'   => 'يجب أن لا يحتوي :attribute على أكثر من :max عناصر/عنصر.',
    ],
    'mimes'     => 'يجب أن يكون ملفًا من نوع : :values.',
    'mimetypes' => 'يجب أن يكون ملفًا من نوع : :values.',
    'min'       => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية أو أكبر من :min.',
        'file'    => 'يجب أن يكون حجم الملف :attribute على الأقل :min كيلوبايت.',
        'string'  => 'يجب أن يكون طول النص :attribute على الأقل :min حروفٍ/حرفًا.',
        'array'   => 'يجب أن يحتوي :attribute على الأقل على :min عُنصرًا/عناصر.',
    ],
    'not_in'               => 'العنصر :attribute غير صحيح.',
    'not_regex'            => 'صيغة :attribute غير صحيحة.',
    'numeric'              => 'يجب على :attribute أن يكون رقمًا.',
    'password'             => 'كلمة المرور غير صحيحة.',
    'present'              => 'يجب تقديم :attribute.',
    'regex'                => 'صيغة :attribute .غير صحيحة يجب ان يكون ارقام فقط.',
    'required'             => ':attribute مطلوب.',
    'required_if'          => ':attribute مطلوب في حال ما إذا كان :other يساوي :value.',
    'required_unless'      => ':attribute مطلوب في حال ما لم يكن :other يساوي :values.',
    'required_with'        => ':attribute مطلوب إذا توفّر :values.',
    'required_with_all'    => ':attribute مطلوب إذا توفّر :values.',
    'required_without'     => ':attribute مطلوب إذا لم يتوفّر :values.',
    'required_without_all' => ':attribute مطلوب إذا لم يتوفّر :values.',
    'same'                 => 'يجب أن يتطابق :attribute مع :other.',
    'size'                 => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية لـ :size.',
        'file'    => 'يجب أن يكون حجم الملف :attribute :size كيلوبايت.',
        'string'  => 'يجب أن يحتوي النص :attribute على :size حروفٍ/حرفًا بالضبط.',
        'array'   => 'يجب أن يحتوي :attribute على :size عنصرٍ/عناصر بالضبط.',
    ],
    'starts_with' => 'يجب أن يبدأ :attribute بأحد القيم التالية: :values',
    'string'      => 'يجب أن يكون :attribute نصًا.',
    'timezone'    => 'يجب أن يكون :attribute نطاقًا زمنيًا صحيحًا.',
    'unique'      => 'قيمة :attribute مُستخدمة من قبل.',
    'uploaded'    => 'فشل في تحميل الـ :attribute.',
    'url'         => 'صيغة الرابط :attribute غير صحيحة.',
    'uuid'        => ':attribute يجب أن يكون بصيغة UUID سليمة.',
    'alpha_spaces' => 'يجب أن لا يحتوي :attribute سوى على حروف ومسافات.',
    'email_address' => 'صيغة :attribute غير صحيحة.',
    'phone_numbers' => 'صيغة :attribute غير صحيحة.',


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
            'rule-name' => 'custom-message',
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
        'name'                  => 'الاسم',
        'username'              => 'اسم المُستخدم',
        'email'                 => 'البريد الالكتروني',
        'first_name'            => 'الاسم الأول',
        'last_name'             => 'اسم العائلة',
        'password'              => 'كلمة المرور',
        'password_confirmation' => 'تأكيد كلمة المرور',
        'city'                  => 'المدينة',
        'country'               => 'الدولة',
        'address'               => 'العنوان',
        'phone'                 => 'الهاتف',
        'mobile'                => 'الجوال',
        'age'                   => 'العمر',
        'sex'                   => 'الجنس',
        'gender'                => 'النوع',
        'day'                   => 'اليوم',
        'month'                 => 'الشهر',
        'year'                  => 'السنة',
        'hour'                  => 'ساعة',
        'minute'                => 'دقيقة',
        'second'                => 'ثانية',
        'title'                 => 'العنوان',
        'title_ar'              => 'العنوان بالعربى',
        'content'               => 'المُحتوى',
        'description'           => 'الوصف',
        'description_ar'        => 'الوصف بالعربى',
        'desc'                  => 'وصف قصير ',
        'desc_ar'               => 'وصف قصير بالعربى',
        'excerpt'               => 'المُلخص',
        'date'                  => 'التاريخ',
        'time'                  => 'الوقت',
        'available'             => 'متاح',
        'size'                  => 'الحجم',
        'icon'                  => 'الأيقون',
        'image'                 => 'الصورة',
        'images'                 => 'الصور',
        'price'                 => 'السعر',
        'location'              => 'الموقع',
        'people'                => 'الأشخاص',
        'other'                 => 'أخرى',
        'delivery_on_from'      => 'التوصيل من عدد أيام',
        'delivery_on_to'        => 'التوصيل إلى عدد أيام',
        'quantity'              => 'الكمية',
        'brand_id'              => 'العلامة التجارية',
        'quantity_type_id'      => 'نوع الكمية',
        'department_id'         => 'القسم',
        'city_id'               => 'المدينة',
        'district_id'               => 'الحي',
        'district'               => 'الحي',
        'area_id'               => 'المنطقة',
        'company_name'          => 'أسم الشركة',
        'company_register'      => 'السجل التجارى',
        'company_phone'         => 'جوال الشركة',
        'company_street'        => 'عنوان الشركة',
        'company_image'         => 'صورة الشركة',
        'company_cover'         => 'غلاف الشركة',
        'from'                  => 'التوصيل من عدد ايام',
        'to'                    => 'التوصيل الي عدد ايام',
        'ar.desc'               => 'وصف قصير',
        'discount'              => 'التخفيض',
        'discount_type'         => 'نوع التخفيض',
        'reduced_value'         => 'القيمة المخفضة',
        'discount_rate'         => 'معدل الخصم',
        'parent'                => 'القسم الرئيسي',
        'cart'                  => 'العربة',
        'product_id'            => 'المنتج',
        'old_password'          => 'كلمة المرور السابقة',
        'new_password'          => 'كلمة المرور الجديدة',
        'confirm_new_password'  => 'تآكيد كلمة المرور الجديدة',
        'alert_product'         => 'انذار كميات المنتج',
        'tax'                   => 'الضريبة',
        'link'                  => 'الرابط',
        'phone_1'                  => 'الجوال',
        'subject' => 'الموضوع',
        'message' => 'الرسالة',
        'category_id' => 'القسم',
        'category' => 'القسم',
        'area' => 'المساحة',
        'status' => 'الحالة',
        'title_property' => 'عنوان العقار',
        'description_property' => 'وصف العقار',
        'title_detail' => 'عنوان الخصائص',
        'value_detail' => 'قيمة الخصائص',
        'title_plan' => 'عنوان المخططات',
        'description_plan' => 'وصف المخططات',
        'default_locale' => 'اللغة الأفتراضية',
        'default_timezone' => 'المنطقة الزمنية الافتراضية',
        'translatable.site_name.en.value' => 'أسم الموقع بالأنجليزي',
        'translatable.site_name.ar.value' => 'أسم الموقع بالعربي',
        'translatable.sm_description.en.value' => 'وصف قصير بالأنجليزي',
        'translatable.sm_description.ar.value' => 'وصف قصير بالعربي',
        'en.title' => 'العنوان بالأنجليزي',
        'ar.title' => 'العنوان بالعربي',
        'en.description' => 'الوصف بالأنجليزي',
        'ar.description' => 'الوصف بالعربي',
        'en.keywords' => 'الكلمات الدلالية بالأنجليزي',
        'ar.keywords' => 'الكلمات الدلالية بالعربي',
        'en.sm_title' => 'عنوان قصير بالأنجليزي',
        'ar.sm_title' => 'عنوان قصير بالعربي',

        'en.company_name' => 'أسم الشركة بالأنجليزي',
        'en.company_address' => 'عنوان الشركة بالأنجليزي',
        'en.company_about' => 'عن الشركة بالأنجليزي',
        'en.meta_keywords' => 'ميتا الكلمات الدلالية بالأنجليزي',
        'en.meta_description' => 'ميتا الوصف بالأنجليزي',

        'ar.company_name' => 'أسم الشركة بالعربي',
        'ar.company_address' => 'عنوان الشركة بالعربي',
        'ar.company_about' => 'عن الشركة بالعربي',
        'ar.meta_keywords' => 'ميتا الكلمات الدلالية بالعربي',
        'ar.meta_description' => 'ميتا الوصف بالعربي',

        'discount_ratio' => 'نسبة الخصم',
        'company_email' => 'البريد الألكتروني للشركة',
        'permissions' => 'الصلاحيات',

        'text' => 'النص',
        'color' => 'اللون',
        'font_size' => 'حجم الخط',
        'text_here' => 'عرض الأسم هنا',
        'name_setting' => 'إعدادات الأسم',
        'date_setting' => 'إعدادات التاريخ',
        'number_setting' => 'إعدادات رقم العضوية',
        'image_membership_setting' => 'إعدادات صورة العضوية',
        'per_month' => 'بالشهر',
        'duration' => 'مدة العضوية',
        'membership_cost' => 'تكلفة العضوية',
        'numbers_members' => 'عدد المشتركين',
        'limited' => 'محدود',
        'unlimited' => 'غير محدود',
        'name_setting.text' => 'نص إعدادات الأسم',
        'name_setting.size' => 'حجم خط إعدادات الأسم',
        'name_setting.color' => 'لون إعدادات الأسم',

        'number_setting.size' => 'حجم خط إعدادات رقم العضوية',
        'number_setting.color' => 'لون إعدادات رقم العضوية',

        'date_setting.size' => 'حجم خط إعدادات تاريخ العضوية',
        'date_setting.color' => 'لون إعدادات تاريخ العضوية',
        'confirmation_code' => 'رمز التأكيد',
        'verification_code' => 'رمز التحقق',
        'role' => 'الدور',
        'copyright' => 'حقوق النشر',
        'copyright_link_text' => 'عنوان رابط حقوق النشر',
        'copyright_link' => 'رابط حقوق النشر',
        'site_name' => 'أسم الموقع',
        'sm_description' => 'وصف قصير',
        'phone_2' => 'الهاتف 2',
        'email_1' => 'البريد الألكترونى 1',
        'email_2' => 'البريد الألكترونى 2',
        'facebook' => 'فيسبوك',
        'twitter' => 'تويتر',
        'instagram' => 'انستجرام',
        'snapchat' => 'سناب تشات',
        'pinterest' => 'بنترست',
        'youtube' => 'يوتيوب',
        'logo' => 'لوجو',
        'logo_white' => 'لوجو أبيض',
        'favicon' => 'صورة مصغره',
        'specialty' => 'التخصص',
        'both' => 'كلاهما',
        'id_number' => 'رقم الهوية',
        'personal_image' => 'الصورة الشخصية',
        'id_image' => 'صورة الهوية',
        'specializations' => 'التخصصات',
        'street' => 'الشارع',
        'building_number' => 'رقم المبني',
        'verify_code' => 'كود التفعيل',
        'commercial_registration' => 'صورة السجل التجاري',
        'floor_number' => 'رقم الطابق',
        'apartment_number' => 'رقم الشقة',
        'address_type' => 'نوع العنوان',
        'main_address' => 'عنوان رئيسي',
        'note' => 'الملاحظات',
        'main' => 'عنوان رئيسي',
        'meta_keywords' => 'ميتا الكلمات الدلالية',
        'meta_description' => 'ميتا الوصف',
        'type' => 'النوع',
        'option_name' => 'أسم الخيار',
        'comment' => 'التعليق',
        'support' => 'الدعم الفني',
        'message_type' => 'نوع الرسالة',
        'content_message' => 'محتوي الرسالة',
        'email_support' => 'بريد الدعم الفني',
        'terms_conditions' => 'الشروط والأحكام',
        'access_key' => 'كود الوصول إلي تطبيقات الواجهه',
        'email_or_phone' => 'البريد الإلكتروني او رقم الهاتف',
        'code' => 'الرمز',
        'region_id' => 'المنطقة',
        'address_id' => 'معرف عنوان الشحن',
        'shipping_rate' => 'سعر الشحن',
        'cash_on_delivery' => 'تكلفة الدفع عن الأستلام',
        'products' => 'المنتجات',
        'input_type' => 'نوع الحقل',
        'values' => 'الخيارات',
        'collecting_by' => 'التجميع بواسطة',
        'shipping_by' => 'الشحن بواسطة',
        'store_address' => 'مقر المتجر',
        'cover' => 'الغلاف',
        'value_added_tax' => 'التسجيل في ضريبة القيمة المضافة',
        'store_name' => 'أسم المتجر',
        'ar.store_name' => 'أسم المتجر بالعربي',
        'en.store_name' => 'أسم المتجر بالأنجليزي',
        'ar.store_address' => 'مقر المتجر بالعربي',
        'en.store_address' => 'مقر المتجر بالأنجليزي',
        'ar.about' => 'عن المتجر بالعربي',
        'en.about' => 'عن المتجر بالأنجليزي',
        'ar.terms' => 'الشروط والسياسات بالعربي',
        'en.terms' => 'الشروط والسياسات بالأنجليزي',
        'min_order_value' => 'الحد الأدنى لقيمة الطلب',
        'free_shipping' => 'الشحن المجاني',
        'commission' => 'العمولة',
        'en.short_description'  => 'وصف قصير بالأنجليزي',
        'ar.short_description'  => 'وصف قصير بالعربي',
        'specifications.*.en.key' => 'اسم المواصفة بالانجليزي',
        'specifications.*.en.value' => 'قيمة المواصفة بالانجليزي',
        'specifications.*.ar.key' => 'اسم المواصفة بالعربي',
        'specifications.*.ar.value' => 'قيمة المواصفة بالعربي',
        'packaging' => 'أنواع التغليف',
        'chopping' => 'أنواع التقطيع',
        'marketer_name' => 'اسم المسوق',
        'short_description' => 'وصف قصير',
        'expired' => 'منتهي',
        'discount_percentage' => 'نسبة الخصم',
        'start_date' => 'تاريخ البدء',
        'end_date' => 'تاريخ الأنتهاء',
        'yesterday' => 'الأمس',
        'today' => 'اليوم',
        'reason' => 'السبب',
        'country_code' => 'رمز الدولة',
        'validation.captcha' => 'كلمة التحقق',
        'iban_no' => 'رقم IBAN ',
        'owner' => 'المالك',
        'account_name' => 'اسم صاحب الحساب',
        'is_accept' => 'الطلب التغير',
        'rejected' => 'مُرفض',
        'tax_number' => 'الرقم الضريبي',
        'postal_code' => 'الرمز البريدي',
        'tax_type' => 'نوع الضريبة',
        'commission_type' => 'نوع العمولة',
        'phone_numbers.1' => 'الهاتف 1',
        'phone_numbers.2' => 'الهاتف 2',
        'delivery_code' => 'رمز التسليم',
        'country_name' => 'اسم الدولة',
        'zip_code' => 'رمز الدولة',
        'en.short_title' => 'العنوان القصير بالأنجليزي',
        'ar.short_title' => 'العنوان القصير بالعربي',

    ],
];