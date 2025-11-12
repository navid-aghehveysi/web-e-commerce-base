<?php
return [

    'Status' => [
        'InActive' => 'غیر فعال',
        'Active' => 'فعال',
    ],
    'CategoryType' => [
        'MAIN' => 'دسته اصلی',
        'SUB' => 'زیر دسته'
    ],

    'Gender' => [
        'FEMALE' => 'زن',
        'MALE' => 'مرد'
    ],
    'MaritalStatus' => [
        'SINGLE' => 'مجرد',
        'MARRIED' => 'متاهل',
    ],
    'EducationLevel' => [
        'OTHER' => 'سایر',
        'PRIMARY' => 'ابتدایی',
        'MIDDLE' => 'راهنمایی',
        'HIGH_SCHOOL' => 'دبیرستان',
        'DIPLOMA' => 'کاردانی',
        'BACHELOR' => 'کارشنانسی',
        'MASTER' => 'کارشناسی ارشد',
        'DOCTORATE' => 'دکترا',
    ],
    'SkillLevel' => [
        'BEGINNER' => 'تازه کار',
        'JUNIOR' => 'سطح پایین',
        'MID_LEVEL' => 'متوسط',
        'SENIOR' => 'حرفه ای',
        'TECH_LEAD' => 'رهبر فنی',
        'EXPERT' => 'خبره'
    ],
    'RoleLevel' => [
        'SUPER_ADMIN' => 'مدیر کل',
        'ADMINISTRATOR' => 'مدیر',
        'MANAGER' => 'سرپرست',
        'MODERATOR' => 'ناظر',
        'EDITOR' => 'ویراستار',
        'SENIOR_AUTHOR' => 'نویسنده ارشد',
        'AUTHOR' => 'نویسنده',
        'CONTRIBUTOR' => 'همکار',
        'MEMBER' => 'کاربر',
        'GUEST' => 'مهمان'
    ],
    'CommentableStatus' => [
        'UnCommentable' => 'عدم امکان درج نظر',
        'Commentable' => 'امکان درج نظر',
    ],
    'CommentApprovalStatus' => [
        'Reject' => 'عدم تائید',
        'Approved' => 'تأئید',
    ],
    'CommentSeenStatus' => [
        'Unseen' => 'دیده نشده',
        'Seen' => 'دیده شده',
    ],
    'UserActivationStatus' => [
        'Rejected' => 'رد شده',
        'Approved' => 'تایید شده',
        'Blocked' => 'مسدود شده',
        'Pending' => 'در انتظار تأیید',
        'Suspended' => 'تعلیق شده'
    ],
    'CategoryMenuVisibility' => [
        'Hide' => 'مخفی',
        'Show' => 'نمایش'
    ],
    'MarketableStatus' => [
        'UnMarketable' => 'غیر قابل فروش',
        'Marketable' => 'قابل فروش',
    ],
    'PaymentTypes' => [
        'OnLine' => 'آنلاین',
        'OffLine' => 'آفلاین',
        'Cash' => 'نقدی'
    ],
    'PaymentStatus' => [
        'UnPaid' => 'پرداخت نشده',
        'Paid' => 'پرداخت شده',
        'Canceled' => 'باطل شده',
        'Returned' => 'برگشت داده شده',
    ],
    "CouponTypes" => [
        "Public" => 'عمومی',
        'Restricted' => 'اختصاصی'
    ],
    "AmountTypes" => [
        'Fixed' => 'ریالی | تومان',
        'Percentage' => 'درصدی'
    ],
    "DeliveryMethod" => [
        "Courier" => 'ارسال با پیک',
        "Post" => 'پست پیشتاز',
        "Pickup" => 'تحویل حضوری',
        "Freight" => 'ارسال با باربری',
        "Express" => 'تحویل فوری',
        "Free_Shipping" => 'ارسال رایگان',
        "Scheduled" => 'تحویل زمان بندی شده'
    ],
    "DeliveryStatus" => [
        "Pending" => 'در انتظار پردازش',
        "Processing" => 'در حال آماده‌سازی',
        "Shipped" => 'ارسال شده',
        "InTransit" => 'در حال انتقال',
        "Delivered" => 'تحویل داده شده',
        "Failed"=> 'عدم موفقیت در تحویل',
        "Returned" => 'مرجوع شده',
        "Cancelled" => 'لغو شده',
    ],
    'OrderStatus' => [
        'Pending'    => 'در انتظار پرداخت',
        'Paid'       => 'پرداخت شده',
        'Processing' => 'در حال پردازش',
        'Cancelled'  => 'لغو شده',
        'Refunded'   => 'بازپرداخت شده',
    ],
];
