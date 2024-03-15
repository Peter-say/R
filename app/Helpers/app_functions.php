<?php

use App\Jobs\AppMailerJob;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Constants\AppConstants;
use App\Constants\StatusConstants;
use App\Helpers\MethodsHelper;
use App\Models\News;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\directoryExists;

/** Returns a random alphanumeric token or number
 * @param int length
 * @param bool  type
 * @return String token
 */
function getRandomToken($length, $typeInt = false)
{
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet .= strtolower($codeAlphabet);
    $codeAlphabet .= "0123456789";
    $max = strlen($codeAlphabet);

    if ($typeInt == true) {
        for ($i = 0; $i < $length; $i++) {
            $token .= rand(0, 9);
        }
        $token = intval($token);
    } else {
        for ($i = 0; $i < $length; $i++) {
            $token .= $codeAlphabet[random_int(0, $max - 1)];
        }
    }

    return $token;
}

// function news()
// {
//     $news = News::status(StatusConstants::ACTIVE)->get();
//     $array = [];
//     foreach ($news as $new) {
//         $array[] = '<b style="color: #fa3737">' . $new->title . '</b>:  ' . $new->content;
//     }
//     $marquee = implode("  ", $array);
//     return $marquee;
// }
function generateRandomDigits(int $length, $string = false)
{
    $digits = '';
    $digits = random_int(pow(10, $length - 1), pow(10, $length) - 1);

    if ($string == true) {
        return (string)$digits;
    } else {
        return (int)$digits;
    }
}

function signUpTab($key, $output = "active")
{
    $query = request()->query();
    if (empty($query)) {
        $query = array_merge(["first"]);
    }
    if (in_array($key, $query))
        return $output;
}

function prevRoute($key = null)
{
    $app = app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();
    //    dd($app);
    return route($app, !empty($key) ?? null);
}

function isActiveTab($route, $output = "active")
{
    if (Route::currentRouteName() == $route)
        return $output;
}


/**Puts file in a public storage */
function putFileInStorage($file, $path)
{
    $filename = uniqid() . '.' . $file->getClientOriginalExtension();
    $file->storeAs($path, $filename);
    return "$path/$filename";
}


/**Puts file in a private storage */
function putFileInPrivateStorage($file, $path)
{
    // dd($file);
    $filename = uniqid() . '.' . $file->getClientOriginalExtension();
    Storage::putFileAs($path, $file, $filename, 'private');
    return "$path/$filename";
}



// Returns full public path
function my_asset($path = null)
{
    return url("/") . env('RESOURCE_PATH') . '/' . $path;
}


/**Gets file from public storage */
function getFileFromStorage($fullpath, $storage = 'storage')
{
    if ($storage == 'storage') {
        return route('read_file', encrypt($fullpath));
    }
    return my_asset($fullpath);
}

/**Deletes file from public storage */
function deleteFileFromStorage($path)
{
    if (file_exists($path)) {
        unlink(public_path($path));
    }
}



/**Deletes file from private storage */
function deleteFileFromPrivateStorage($path, $disk = "local")
{
    if ((explode("/", $path)[0] ?? "") === "app") {
        $path = str_replace("app/", "", $path);
    }

    $exists = Storage::disk($disk)->exists($path);
    if ($exists) {
        Storage::delete($path);
    }
    return $exists;
}

/**Deletes file from private storage */
function deleteFolderFromPrivateStorage($path, $disk = "local")
{
    if ((explode("/", $path)[0] ?? "") === "app") {
        $path = str_replace("app/", "", $path);
    }

    $exists = Storage::disk($disk)->exists($path);
    if ($exists) {
        Storage::deleteDirectory($path);
    }
    return $exists;
}


/**Downloads file from private storage */
function downloadFileFromPrivateStorage($path, $name)
{
    $name = $name ?? env('APP_NAME');
    $exists = Storage::disk('local')->exists($path);
    if ($exists) {
        $type = Storage::mimeType($path);
        $ext = explode('.', $path)[1];
        $display_name = $name . '.' . $ext;
        $headers = [
            'Content-Type' => $type,
        ];

        return Storage::download($path, $display_name, $headers);
    }
    return null;
}

function readPrivateFile($path)
{
}


/**Reads file from private storage */
function getFileFromPrivateStorage($fullpath, $disk = 'local')
{
    if ((explode("/", $fullpath)[0] ?? "") === "app") {
        $fullpath = str_replace("app/", "", $fullpath);
    }
    if ($disk == 'public') {
        $disk = null;
    }
    $exists = Storage::disk($disk)->exists($fullpath);
    if ($exists) {
        $fileContents = Storage::disk($disk)->get($fullpath);
        $content = Storage::mimeType($fullpath);
        $response = Response::make($fileContents, 200);
        $response->header('Content-Type', $content);
        return $response;
    }
    return null;
}



function str_limit($string, $limit = 20, $end  = '...')
{
    return Str::limit(strip_tags($string), $limit, $end);
}



/**Returns file size */
function bytesToHuman($bytes)
{
    $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];

    for ($i = 0; $bytes > 1024; $i++) {
        $bytes /= 1024;
    }

    return round($bytes, 2) . ' ' . $units[$i];
}


/** Returns File type
 * @return Image || Video || Document
 */
function getFileType(String $type)
{
    $imageTypes = imageMimes();
    if (strpos($imageTypes, $type) !== false) {
        return 'Image';
    }

    $videoTypes = videoMimes();
    if (strpos($videoTypes, $type) !== false) {
        return 'Video';
    }

    $docTypes = docMimes();
    if (strpos($docTypes, $type) !== false) {
        return 'Document';
    }
}

function imageMimes()
{
    return "image/jpeg,image/png,image/jpg,image/svg";
}

function videoMimes()
{
    return "video/x-flv,video/mp4,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi";
}

function docMimes()
{
    return "application/pdf,application/docx,application/doc";
}

function formatTimeToHuman($time)
{
    $seconds =  Carbon::parse(now())->diffInSeconds(Carbon::parse($time), false);
    if ($seconds < 1) {
        return false;
    }
    return formatSecondsToHuman($seconds);
}

function formatDateTimeToHuman($time, $pattern = 'M d , Y h:i:A')
{
    return date($pattern, strtotime($time));
}



function formatSecondsToHuman($seconds)
{
    $dtF = new DateTime("@0");
    $dtT = new DateTime("@$seconds");
    $a = $dtF->diff($dtT)->format('%a');
    $h = $dtF->diff($dtT)->format('%h');
    $i = $dtF->diff($dtT)->format('%i');
    $s = $dtF->diff($dtT)->format('%s');
    if ($a > 0) {
        return $dtF->diff($dtT)->format('%a days, %h hrs, %i mins and %s secs');
    } else if ($h > 0) {
        return $dtF->diff($dtT)->format('%h hrs, %i mins ');
    } else if ($i > 0) {
        return $dtF->diff($dtT)->format(' %i mins');
    } else {
        return $dtF->diff($dtT)->format('%s seconds');
    }
}


function slugify($value)
{
    return Str::slug($value);
}


function slugifyReplace($value, $symbol = '-')
{
    return str_replace(' ', $symbol, $value);
}


/**
 * @param $mode = ["encrypt" , "decrypt"]
 * @param $path =
 */
function readFileUrl($mode, $path)
{
    if (strtolower($mode) == "encrypt") {
        $path = base64_encode($path);
        return route("web.read_file", $path);
    }
    return base64_decode($path);
}

function carbon()
{
    return new Carbon();
}


function withDir($dir)
{
    if (!is_dir($dir)) {
        mkdir(trim($dir), 0777, true);
    }
}

function downloadFileFromUrl($url, $path = null, $return_full_path = false)
{
    $fileInfo = pathinfo($url);
    $path = $path ?? storage_path("app/downloads");
    withDir($path);
    $filename = uniqid() . "." . $fileInfo["extension"];
    $full_path = $path . "/" . $filename;

    $url_file = fopen($url, 'rb');
    if ($url_file) {
        $newfile = fopen($full_path, 'a+');
        if ($newfile) {
            while (!feof($url_file)) {
                fwrite($newfile, fread($url_file, 1024 * 8), 1024 * 8);
            }
        }
    }
    if ($url_file) {
        fclose($url_file);
    }
    if ($newfile) {
        fclose($newfile);
        return $return_full_path ? $full_path : $filename;
    }
    return null;
}


function isActiveRoute($route, $output = "is-expanded")
{
    $exp = explode('.', Route::currentRouteName());
    if (in_array($route, $exp))
        return $output;
}

function developer()
{
    return User::where("email", AppConstants::SUDO_EMAIL)->first();
}

function isDev()
{
    return optional(auth()->user())->email == AppConstants::SUDO_EMAIL;
}



function getNthValue(int $number)
{
    $ends = array('th', 'st', 'nd', 'rd', 'th', 'th', 'th', 'th', 'th', 'th');
    if ((($number % 100) >= 11) && (($number % 100) <= 13))
        return $number . 'th';
    else
        return $number . $ends[$number % 10];
}



/**Returns formatted money value
 * @param float amount
 * @param int places
 * @param string symbol
 */

function toggleArray($array)
{
    $toggledArray = [];

    foreach ($array as $element) {
        $toggledArray[] = !$element;
    }

    return $toggledArray;
}




function encrypt_decrypt($action, $string)
{
    try {
        $output = false;

        $encrypt_method = "AES-256-CBC";
        $secret_key = 'Hg99JHShjdfhjhes5se@14447DP';
        $secret_iv = 'T0EHVn0dUIK888JSBGDD';

        // hash
        $key = hash('sha256', $secret_key);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        if ($action == 'encrypt') {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } elseif ($action == 'decrypt') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }

        return $output;
    } catch (\Throwable $e) {
        return false;
    }
}


function sudo()
{
    return User::where("email", AppConstants::SUDO_EMAIL)->first();
}

function parseActivity($string)
{
    return ucwords(strtolower(str_replace("_", " ", $string)));
}

/**
 *  Division of numbers
 */
if (!function_exists('divnum')) {

    function divnum($numerator, $denominator)
    {
        return $denominator == 0 ? 0 : ($numerator / $denominator);
    }
}
/**
 * convert seconds to readaable time
 */

function secondsToTime($seconds)
{
    $days = floor($seconds / 86400);
    $seconds -= ($days * 86400);

    $hours = floor($seconds / 3600);
    $seconds -= ($hours * 3600);

    $minutes = floor($seconds / 60);
    $seconds -= ($minutes * 60);

    $values = array(
        'day'    => $days,
        'hour'   => $hours,
        'minute' => $minutes,
        'second' => $seconds
    );

    $parts = array();

    foreach ($values as $text => $value) {
        if ($value > 0) {
            $parts[] = $value . ' ' . $text . ($value > 1 ? 's' : '');
        }
    }

    return implode(' ', $parts);
}

function convertDateTime($unixTime)
{
    $dt = new DateTime("@$unixTime");
    return $dt->format('M d, Y H:i:s');
}

/**
 * Match two arrays
 */

if (!function_exists('matchArrays')) {
    function matchArrays($array1, $array2)
    {
        $emergent_result_array = array_intersect($array1, $array2);
        if (!empty($emergent_result_array)) {
            if (!empty($emergent_result_array[0])) {
                $emergent_result_array[0] = "A";
            }
            if (!empty($emergent_result_array[1])) {
                $emergent_result_array[1] = "B";
            }
            if (!empty($emergent_result_array[2])) {
                $emergent_result_array[2] = "C";
            }
            if (!empty($emergent_result_array[3])) {
                $emergent_result_array[3] = "D";
            }
        }

        return $emergent_result_array;
    }
}
/**
 * Change array keys
 */

function change_key($array, $old_key, $new_key)
{

    if (!array_key_exists($old_key, $array))
        return $array;

    $keys = array_keys($array);
    $keys[array_search($old_key, $keys)] = $new_key;

    return array_combine($keys, $array);
}

/**
 * Find object in array by ID
 */

function findObjectById($array, $id)
{
    if (isset($array[$id])) {
        return trim($array[$id]);
    }

    return false;
}

/**
 * Check if two array are equal
 */

function array_equals(array $either, array $other): bool
{
    foreach ($other as $element) {
        $key = array_search($element, $either, true);
        if ($key === false) {
            return false;
        }
        unset($either[$key]);
    }
    return empty($either);
}

/**
 * Trim two arrays
 * @return array
 */

function trim_two_arrays(array $array1, array $array2)
{
    foreach ($array1 as $key => $value) {
        $array1[$key] = trim($value);
    }

    foreach ($array2 as $key => $value) {
        $array2[$key] = trim($value);
    }

    return [$array1, $array2];
}

/**
 * Check if number is a decimal number
 */
function is_decimal($val)
{
    return is_numeric($val) && floor($val) != $val;
}

/**
 * Get all decimal number between two numbers
 * @return array
 * @param string
 */
function range_gen($num1, $num2)
{


    $exp = explode('.', $num1);

    $accuracy = strlen($exp[1]);

    $dp = array(
        0 => 1,
        1 => 0.1,
        2 => 0.01,
        3 => 0.001,
        4 => 0.0001
    );


    foreach ($dp as $key => $acc) {
        if ($accuracy == $key) {
            $step = $acc;
        }
    }


    $ans = [];
    foreach (range($num1, $num2, $step) as $number) {
        $ans[] .= number_format($number, 3);
    }

    return array_values(array_unique($ans));
}

/**
 * Get all duplicate values from array
 * @param array
 * @return array
 */

function getArrayDuplicateVals(array $array)
{
    $output = [];
    $array_count = array_count_values($array);
    foreach ($array_count as $id => $arr) {
        if ($arr > 1) {
            $output[$id] = $arr;
        }
    }

    return $output;
}

/**
 * Fix pagination by page count
 * @param collection
 * @param int
 *
 * @return int
 */
function correct_pagination_numbers($variable, $key)
{
    $cp = $variable->currentPage();
    $pp = $variable->perPage();
    $counter = $key + 1;

    $c = (($pp * $cp) + $counter) - $pp;
    return $c;
}

function get_keys_for_duplicate_values($array)
{
    // Unique values
    $unique = array_unique($array);
    // Duplicates
    $duplicates = array_diff_assoc($array, $unique);

    // Get duplicate keys
    $duplicate_keys = array_keys(array_intersect($array, $duplicates));

    return $duplicate_keys;
}

function roundup($float, $dec = 2)
{
    if ($dec == 0) {
        if ($float < 0) {
            return floor($float);
        } else {
            return ceil($float);
        }
    } else {
        $d = pow(10, $dec);
        if ($float < 0) {
            return floor($float * $d) / $d;
        } else {
            return ceil($float * $d) / $d;
        }
    }
}

/**
 * Get YouTube video ID from URL
 *
 * @param string $url
 * @return string YouTube video id or FALSE if none found.
 */
function youtube_id_from_url($url)
{
    if (preg_match('/youtube\.com\/watch\?v=([^\&\?\/]+)/', $url, $id)) {
        return $values = $id[1];
    } else if (preg_match('/youtube\.com\/embed\/([^\&\?\/]+)/', $url, $id)) {
        return $values = $id[1];
    } else if (preg_match('/youtube\.com\/v\/([^\&\?\/]+)/', $url, $id)) {
        return $values = $id[1];
    } else if (preg_match('/youtu\.be\/([^\&\?\/]+)/', $url, $id)) {
        return $values = $id[1];
    } else if (preg_match('/youtube\.com\/verify_age\?next_url=\/watch%3Fv%3D([^\&\?\/]+)/', $url, $id)) {
        return $values = $id[1];
    } else {
        return false;
    }
}

/**
 * Checks if an array contains at most 1 distinct value.
 * Optionally, restrict what the 1 distinct value is permitted to be via
 * a user supplied testValue.
 *
 * @param array $arr - Array to check
 * @param null $testValue - Optional value to restrict which distinct value the array is permitted to contain.
 * @return bool - false if the array contains more than 1 distinct value, or contains a value other than your supplied testValue.
 */
function isHomogenous(array $arr, $testValue = null)
{
    $testValue = func_num_args() > 1 ? $testValue : reset($arr);
    foreach ($arr as $val) {
        if ($testValue !== $val) {
            return false;
        }
    }
    return true;
}
