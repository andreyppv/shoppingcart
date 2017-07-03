<?php 
            
define('UPLOADS_BASE', 'upload');
                               
// User status                               
define('STATUS_ACTIVE', '1');
define('STATUS_INACTIVE', '0');

define('USER_ADMIN', '0');
define('USER_STAFF', '1');

define('YES', '1');
define('NO', '0');

// Option Type
define('DROPDOWN', 'dropdown');
define('CHECKBOX', 'checkbox');
define('TEXT', 'text');

define('BOTHSIDE', 0);
define('FRONTSIDE', 1);
define('BACKSIDE', 2);

define('PRICE_FIXED', '0');
define('PRICE_PERCENT', '1');

// Service Types       
define('SVC_BUSINESS_CARD', '1');
define('SVC_INVITATION_CARD', '2');
define('SVC_BUSINESS_TEMPLATE', '3');
define('SVC_INVITATION_TEMPLATE', '4');
define('SVC_DESIGN_SERVICE', '5');
define('DESIGN_SHOWCASE_BUSINESS', '6');
define('DESIGN_SHOWCASE_INVITATION', '7');

define('DESIGN_BUSINESS_CARD', '1');
define('DESIGN_LOGO_BUSINESS_CARD', '2');

define('PRODUCT_CARD', 1);
define('PRODUCT_TEMPLATE', 2);
define('PRODUCT_DESIGN', 3);

// Order Status
define('ORDER_PENDING', '-1');
define('ORDER_NEW', '0');
define('ORDER_PROCESSING', '1');
define('ORDER_COMPLETED', '2');
define('ORDER_REFUNDED', '3');

// Job Status
define('JOB_UNASSIGNED', '0');
define('JOB_WORKING', '1');
define('JOB_FILE_ISSUE', '2');
define('JOB_WAITING_FILE', '3');
define('JOB_DESIGN_PROOFING', '4');
define('JOB_IN_PRODUCTION', '5');
define('JOB_REPRINT', '6');
define('JOB_SHIPPED', '7');
define('JOB_COMPLETED', '8');
define('JOB_REFUNDED', '9');

define('SHIP_BY_FEDEX', '1');
define('SHIP_BY_CA_POST', '2');
define('SHIP_BY_UPS', '3');


// Payment Types
define('PAYMENT_PAYPAL', 'paypal');
define('PAYMENT_CREDIT', 'credit');

//card
define('CARD_VISA', 'visa');
define('CARD_MASTER', 'mastercard');
define('CARD_AMERICA_EXPRESS', 'amex');
define('CARD_DISCOVER', 'discover');

//sorting option
define('SORTBY_NAME_AZ', 'stnaz');
define('SORTBY_NAME_ZA', 'stnza');
define('SORTBY_NEWEST', 'stnw');
define('SORTBY_OLDEST', 'stod');
define('SORTBY_POPULARITY', 'stpop');


////////////////////////////////////////////////////////////////////
// Lanuage & Status
////////////////////////////////////////////////////////////////////
{
    if(!function_exists('lang_service_name')) 
    {
        function lang_service_name($service_type)
        {
            if($service_type == SVC_BUSINESS_CARD)
            {
                return 'Business Card';
            }
            else if($service_type == SVC_BUSINESS_CARD_TEMPLATE)
            {
                return 'Business Card Template';
            }
            else if($service_type == SVC_INVITATION)
            {
                return 'Invitation';
            }
            else if($service_type == SVC_INVITATION_TEMPLATE)
            {
                return 'Invitation Template';
            }
            else if($service_type == SVC_DESIGN_SERVICES)
            {
                return 'Design Services';
            }
            
            return 'Business Card';
        }
    }

    if(!function_exists('order_status_list')) 
    {
        function order_status_list()
        {
            return array(
                ORDER_PENDING => 'Pending',
                ORDER_NEW => 'New',
                ORDER_PROCESSING => 'Processing',
                ORDER_COMPLETED => 'Completed',
                ORDER_REFUNDED => 'Refunded'
            );
        }
    }
}

// get sorting options for template
if ( !function_exists('get_sorting_options') )
{
    function get_sorting_options() 
    {
        return array(
            SORTBY_NAME_AZ  => 'Name (A-Z)',
            SORTBY_NAME_ZA  => 'Name (Z-A)',
            SORTBY_NEWEST   => 'Newest',
            SORTBY_OLDEST   => 'Oldest',
            SORTBY_POPULARITY => 'Popularity'
        );
    }
}

// get credit card types
if ( !function_exists('get_creditcard_types') )
{
    function get_creditcard_types() 
    {
        return [
            //CARD_AMERICA_EXPRESS => 'America Express',
            CARD_VISA       => 'Visa',
            CARD_MASTER     => 'Master',
            //CARD_DISCOVER   => 'Discover'
        ];
    }
}

// get fedex transition time array
if ( !function_exists('get_transit_time') )
{
    function get_transit_time($code)
    {
        $codes = [
            'ONE_DAYS' => '1 days',
            'TWO_DAYS' => '2 days',
            'THREE_DAYS' => '3 days',
            'FOUR_DAYS' => '4 days',
            'FIVE_DAYS' => '5 days',
            'SIX_DAYS' => '6 days',
            'SEVEN_DAYS' => '7 days',
            'EIGHT_DAYS' => '8 days',
            'NINE_DAYS' => '9 days',
            'TEN_DAYS' => '10 days',
        ];
        
        return $codes[$code];
    }
}