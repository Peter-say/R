<?php

namespace App\Constants;

use App\Constants\Finance\TransactionConstants;

class AppConstants
{
    const SUDO_EMAIL = "sudo@property.com";
    

    const MAX_PROFILE_PIC_SIZE = 2048;

    const MALE = 'Male';
    const FEMALE = 'Female';
    const OTHERS = 'Others';

    const PARENT = "Parent";
    const GUARDIAN = "Guardian";

    const AA = "AA";
    const AS = "AS";
    const AC = "AC";
    const SS = "SS";
    const SC = "SC";
    const NONE = "I don't know";

   


    const DEFAULT_PASSWORD = "123456";

    const WEB_GUARD = "web";
    const ADMIN_GUARD = "admin";

    const PERMISSION_GUARDS = [
        // self::ADMIN_GUARD => "Admin Guard",
        self::WEB_GUARD => "Web Guard"
    ];

    const GENDER_OPTIONS = [
        self::MALE,
        self::FEMALE,
        self::OTHERS
    ];

    const SPONSOR = [
        self::PARENT => "Parent",
        self::GUARDIAN => "Guardian",
    ];

   

    const GENOTYPE_OPTIONS = [
        self::AA => "AA",
        self::AS => "AS",
        self::AC => "AC",
        self::SS => "SS",
        self::SC => "SC",
        self::NONE => "I don't know",
    ];

    const BLOOD_GROUP_OPTIONS = [
        "A" => "A",
        "B" => "B",
        "AB" => "AB",
        "O" => "O",
    ];


    const ADMIN_PAGINATION_SIZE = 50;

    const BOOL_OPTIONS = [
        "1" => "Yes",
        "0" => "No"
    ];

    const TRANSACTION_ADMIN_EMAIL = "finance@trakker.techies.africa";

    const SORT_OPTIONS = [
        "most_popular" => [
            "label" => "Most Popular",
            "column" => "views_count",
            "order" => "desc"
        ],
        "created_at_desc" => [
            "label" => "Most Recent",
            "column" => "created_at",
            "order" => "desc"
        ],
        "created_at_asc" => [
            "label" => "Oldest",
            "column" => "created_at",
            "order" => "asc"
        ],
        "title_asc" => [
            "label" => "Title - Asc",
            "column" => "title",
            "order" => "asc"
        ],
        "title_desc" => [
            "label" => "Title - Desc",
            "column" => "title",
            "order" => "desc"
        ],
    ];

    const FILTER_OPTIONS = [
        "user_name" => [
            "label" => "User Name",
            "column" => "name",
            "order" => "asc"
        ],
        "user_email" => [
            "label" => "User Email",
            "column" => "email",
            "order" => "asc"
        ],
        "user_phone" => [
            "label" => "User Phone",
            "column" => "email",
            "order" => "asc"
        ],
        "user_username" => [
            "label" => "User Username",
            "column" => "username",
            "order" => "asc"
        ],
        "user_app_uid" => [
            "label" => "User App Uid",
            "column" => "app_uid",
            "order" => "asc"
        ],
    ];

  
}