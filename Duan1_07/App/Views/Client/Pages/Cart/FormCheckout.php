<?php

namespace App\Views\Client\Pages\Cart;

use App\Helpers\AuthHelper;
use App\Views\BaseView;

class FormCheckout extends BaseView
{
    public static function render($data = null)
    {
        $is_login = AuthHelper::checkLogin();

?>

       

<?php

    }
}
