<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

/**
 * HTTP Success code
 */
defined('HTTP_SUCCESS') OR define('HTTP_SUCCESS', 200);


/**
 * HTTP Error code
 */
defined('HTTP_BAD_REQUEST') OR define('HTTP_BAD_REQUEST', 400);
defined('HTTP_NOT_FOUND') OR define('HTTP_NOT_FOUND', 404);

/*
|--------------------------------------------------------------------------
| FIXED DATA
|--------------------------------------------------------------------------
*/

/**
 * FIXED TOUR CATEGORIES ID
 */
defined('FIXED_DOMESTIC_CATEGORY_ID') OR define('FIXED_DOMESTIC_CATEGORY_ID', 1);
defined('FIXED_INTERNATIONAL_CATEGORY_ID') OR define('FIXED_INTERNATIONAL_CATEGORY_ID', 2);
defined('FIXED_SPECIAL_CATEGORY_ID') OR define('FIXED_SPECIAL_CATEGORY_ID', 3);
defined('FIXED_INTERNATIONAL_PILGRIMAGE_CATEGORY_ID') OR define('FIXED_INTERNATIONAL_PILGRIMAGE_CATEGORY_ID', 8);
/**
 * Tour categories
 */
defined('DOMESTIC_TOUR')       OR define('DOMESTIC_TOUR', 'trong-nuoc');
defined('INTERNATIONAL_TOUR')  OR define('INTERNATIONAL_TOUR', 'nuoc-ngoai');
defined('SPECIAL_TOUR')        OR define('SPECIAL_TOUR', 'tour-dac-biet');

/**
 * Rating default
 */
defined('NO_RATING')        OR define('NO_RATING', '4/5');
/**
 * FIXED POST CATEGORIES ID
 */
defined('FIXED_ABOUT_US')        OR define('FIXED_ABOUT_US', 15);

/**
 * FIXED POST CATEGORIES ID
 */
defined('FIXED_HANDBOOK')        OR define('FIXED_HANDBOOK', 4);
defined('FIXED_DESTINATION')        OR define('FIXED_DESTINATION', 8);
defined('FIXED_MICE')        OR define('FIXED_MICE', 12);
defined('FIXED_SERVICE')        OR define('FIXED_SERVICE', 11);
defined('FIXED_BLOG')        OR define('FIXED_BLOG', 3);
defined('FIXED_VISA')        OR define('FIXED_VISA', 6);

/*
|--------------------------------------------------------------------------
| END FIXED DATA
|--------------------------------------------------------------------------
*/

/*==============================
=            Message for Create            =
==============================*/

/**
 * Message Success code
 */
defined('MESSAGE_CREATE_SUCCESS') OR define('MESSAGE_CREATE_SUCCESS', 'Thêm mới thành công!');

/**
 * Message Success code
 */
defined('MESSAGE_CREATE_ERROR') OR define('MESSAGE_CREATE_ERROR', 'Thêm mới thất bại!');

/**
 * Message Photos are too large code
 */
defined('MESSAGE_PHOTOS_ERROR') OR define('MESSAGE_PHOTOS_ERROR', 'Hình ảnh vượt quá %u Kb. Vui lòng kiểm tra lại và thực hiện lại thao tác!');

/**
 * Message Pfile extension
 */
defined('MESSAGE_FILE_EXTENSION_ERROR') OR define('MESSAGE_FILE_EXTENSION_ERROR', 'Đuôi file image phải là jpg | jpeg | png | gif!');

/*=====  End of Message for Create  ======*/
/*==============================
=            Message for remove            =
==============================*/

/**
 * Message Success code
 */
defined('MESSAGE_REMOVE_SUCCESS') OR define('MESSAGE_REMOVE_SUCCESS', 'Xóa thành công!');

/**
 * Message error code
 */
defined('MESSAGE_REMOVE_ERROR') OR define('MESSAGE_REMOVE_ERROR', 'Xóa thất bại!');

/**
 * Message foreign key link check product category and check product
 */
defined('MESSAGE_FOREIGN_KEY_LINK_ERROR') OR define('MESSAGE_FOREIGN_KEY_LINK_ERROR', 'Category vẫn còn %s bài viết và có %s category là con nên không thẻ xóa!');
defined('MESSAGE_FOREIGN_KEY_LINK_ERROR_TOUR') OR define('MESSAGE_FOREIGN_KEY_LINK_ERROR_TOUR', 'Category vẫn còn %s tour và có %s category là con nên không thẻ xóa!');

/**
 * Message foreign key check product category and check product
 */
defined('MESSAGE_FOREIGN_KEY_ERROR') OR define('MESSAGE_FOREIGN_KEY_ERROR', 'Floor vẫn còn %s Bàn nên không thẻ xóa!');


/**
 * Message check id product category 
 */
defined('MESSAGE_ID_ERROR') OR define('MESSAGE_ID_ERROR', 'ID phải là số và lớn hơn 0');

/**
 * Message file extension
 */
defined('MESSAGE_FILE_EXTENSION_ERROR') OR define('MESSAGE_FILE_EXTENSION_ERROR', 'Đuôi file image phải là jpg | jpeg | png | gif!');


/**
 * Message deactive banner
 */
defined('MESSAGE_DEACTIVE_BANNER_ERROR') OR define('MESSAGE_DEACTIVE_BANNER_ERROR', 'Bạn phải tắt banner!');
defined('MESSAGE_ERROR_BANNER_ERROR') OR define('MESSAGE_ERROR_BANNER_ERROR', 'Không thể tắt!');

/**
 * Message file extension
 */
defined('MESSAGE_EMPTY_IMAGE_ERROR') OR define('MESSAGE_EMPTY_IMAGE_ERROR', 'Bạn phải chọn hình ảnh');

/*=====  End of Message for remove  ======*/

/*==============================
=            Message for Edit            =
==============================*/

/**
 * Message Success code
 */
defined('MESSAGE_EDIT_SUCCESS') OR define('MESSAGE_EDIT_SUCCESS', 'Sửa thành công!');


/**
 * Message Success code
 */
defined('MESSAGE_ISSET_ERROR') OR define('MESSAGE_ISSET_ERROR', 'ID không tồn tại!');

/**
 * Message Success code
 */
defined('MESSAGE_EDIT_ERROR') OR define('MESSAGE_EDIT_ERROR', 'Sửa thất bại!');
/**
 * Message Success code
 */
defined('MESSAGE_ERROR_UPDATE_TURN_ON') OR define('MESSAGE_ERROR_UPDATE_TURN_ON', 'Bạn phải bật Menu cha của Menu hiện tại');
defined('MESSAGE_ERROR_ACTIVE_PRODUCT') OR define('MESSAGE_ERROR_ACTIVE_PRODUCT', 'Bạn phải bật Danh mục tour của tour hiện tại');
defined('MESSAGE_ERROR_ACTIVE_POST') OR define('MESSAGE_ERROR_ACTIVE_POST', 'Bạn phải bật Danh mục bài viết của bài viết hiện tại');
defined('MESSAGE_ERROR_ACTIVE_CATEGORY') OR define('MESSAGE_ERROR_ACTIVE_CATEGORY', 'Bạn phải bật danh mục cha của danh mục hiện tại');

/**
 * Message check total number desk online
 */
defined('THE_DESK_IS_OVER') OR define('THE_DESK_IS_OVER', 'Số bàn đặt online đã hết');
defined('ERROR_TOTAL_NUMBER_DESK_ONLINE') OR define('ERROR_TOTAL_NUMBER_DESK_ONLINE', 'Số bàn đặt online còn lại là 0 bạn không thể xác nhận nữa. Vui lòng kiểm tra lại!');
defined('ERROR_EDIT_STATUS') OR define('ERROR_EDIT_STATUS', 'Không thể thao tác!');
defined('ERROR_UPDATE_TOTAL_NUMBER_DESK_ONLINE') OR define('ERROR_UPDATE_TOTAL_NUMBER_DESK_ONLINE', 'Lỗi update số bàn đặt online');
defined('ERROR_TOTAL_CONFIRM_TABLE_RESERVATIONS') OR define('ERROR_TOTAL_CONFIRM_TABLE_RESERVATIONS', 'Số bàn đặt online phải lớn hơn hoặc bằng tổng số đơn đặt bàn đã xác nhận');
defined('ERROR_GREATER_ZERO') OR define('ERROR_GREATER_ZERO', 'Số bàn đặt online phải lớn hơn 0');


/**
 * Message remove check post category-post for menu
 */

defined('MESSAGE_ERROR_REMOVE_POST') OR define('MESSAGE_ERROR_REMOVE_POST', 'Bạn có %u menu là dạng menu trỏ trực tiếp đến bài viết hiện tại nên bạn không thể xóa.');
defined('MESSAGE_ERROR_REMOVE_POST_CATEGORY') OR define('MESSAGE_ERROR_REMOVE_POST_CATEGORY', 'Bạn có %u menu chọn danh mục hiện tại là menu chính nên bạn không thể xóa.');

/**
 * Message menu
 */

defined('MESSAGE_ERROR_TURN_ON_MENU_PRESENT') OR define('MESSAGE_ERROR_TURN_ON_MENU_PRESENT', 'Bạn phải bật Menu cha của Menu hiện tại');
defined('MESSAGE_ERROR_TURN_ON_POST_PERSENT') OR define('MESSAGE_ERROR_TURN_ON_POST_PERSENT', '---(Bài viết hiện đang tắt để sử dụng vui lòng bật bài viết lên)');
defined('MESSAGE_SUCCESS_TURN_ON') OR define('MESSAGE_SUCCESS_TURN_ON', 'Bật Menu thành công');
defined('MESSAGE_SUCCESS_TURN_OFF') OR define('MESSAGE_SUCCESS_TURN_OFF', 'Tắt Menu thành công');
defined('MESSAGE_ERROR_SELECT_ORIGINAL_CATEGORY') OR define('MESSAGE_ERROR_SELECT_ORIGINAL_CATEGORY', 'Bạn phải chọn danh mục cho menu chính');
defined('MESSAGE_ERROR_TURN_ON_POST_CATEGORY_FOR_SELECTED') OR define('MESSAGE_ERROR_TURN_ON_POST_CATEGORY_FOR_SELECTED', 'Bạn phải bật danh mục bài viết mà menu đã chọn (tên danh mục là: %s)');
defined('MESSAGE_ERROR_TURN_ON_POST_FOR_SELECTED') OR define('MESSAGE_ERROR_TURN_ON_POST_FOR_SELECTED', 'Bạn phải bật bài viết mà bạn đã chọn làm đường dẫn cho menu (tên bài viết là: %s)');
/*=====  End of Message for Create  ======*/

defined('MESSAGE_ERROR_REMOVE_LOCALTION') OR define('MESSAGE_ERROR_REMOVE_LOCALTION', 'Bạn có %u tour đang chọn địa điểm đến này nên bạn không thể xóa.');
defined('MESSAGE_CREATE_BOOKING_SUCCESS') OR define('MESSAGE_CREATE_BOOKING_SUCCESS', 'Đặt Tour thành công bạn vui lòng chờ xác nhận.');
defined('MESSAGE_CREATE_ERROR_EMAIL') OR define('MESSAGE_CREATE_ERROR_EMAIL', 'Vui lòng nhập trường Email và email confirm giống nhau.');
defined('MESSAGE_CREATE_BOOKING_ERROR') OR define('MESSAGE_CREATE_BOOKING_ERROR', 'Không thể tạo tour mới vui lòng chờ trong giây lát.');
defined('MESSAGE_CREATE_ERROR_REQUIRE') OR define('MESSAGE_CREATE_ERROR_REQUIRE', 'Vui lòng nhập đầy đủ thông tin.');
defined('MESSAGE_EDIT_ERROR_VALIDATE') OR define('MESSAGE_EDIT_ERROR_VALIDATE', 'Lỗi sửa tour vui lòng thao tác lại.');
defined('MESSAGE_CREATE_ERROR_VALIDATE') OR define('MESSAGE_CREATE_ERROR_VALIDATE', 'Lỗi tạo mới tour vui lòng thao tác lại.');
defined('MESSAGE_DEACTIVE_ERROR') OR define('MESSAGE_DEACTIVE_ERROR', 'Bạn phải tắt tất cả danh mục con và tour thuộc danh mục!');
defined('MESSAGE_DEACTIVE_POST_ERROR') OR define('MESSAGE_DEACTIVE_POST_ERROR', 'Bạn phải tắt tất cả danh mục con và bài viết thuộc danh mục!');
defined('MESSAGE_DEACTIVE_SUCCESS') OR define('MESSAGE_DEACTIVE_SUCCESS', 'Tắt danh mục thành công!');
defined('MESSAGE_ERROR_DEACTIVE_CATEGORY') OR define('MESSAGE_ERROR_DEACTIVE_CATEGORY', 'Danh mục này không thể tắt!');
defined('MESSAGE_ERROR_REMOVE_CATEGORY') OR define('MESSAGE_ERROR_REMOVE_CATEGORY', 'Danh mục này không thể xóa!');

/**
 * Change Language
 */
defined('MESSAGE_CHANGE_LANGUAGE_SUCCESS') OR define('MESSAGE_CHANGE_LANGUAGE_SUCCESS', 'changed');
defined('MESSAGE_CHANGE_LANGUAGE_FAIL') OR define('MESSAGE_CHANGE_LANGUAGE_FAIL', 'keep');
defined('NO_DATA') OR define('NO_DATA', 'Không có dữ liệu');
