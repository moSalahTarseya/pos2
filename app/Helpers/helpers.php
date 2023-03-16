<?php

/**
 * upload file from request
 * @param $file File -> file from request
 * @param $path String -> the path of folder of the file
 */

use App\Models\Admin;
use App\Models\ModelNotification;

if (!function_exists('uploadFile')) {

    function uploadFile($file, $path)
    {
        $realName = $file->getClientOriginalName();
        $filename = $file->hashName();
        $file->move($path, $filename);
        $fullpath =  $path . $filename;
        return $fullpath;
    }

}

if (!function_exists('isRtl')) {
    function isRtl()
    {
        return app()->getLocale() == 'ar'? true : false;
}

if (!function_exists('sendNotification')) {

    function sendNotification($model, $data, $trans)
    {
        $modelType = get_class($model);
        $dataType = get_class($data);

        $notification_data = [
            'model_id'   => $model->id,
            'model_type' => $modelType,
            'data'       => json_encode($data),
            'type'       => $dataType,
            'ar'         => $trans['ar'] ?? '',
            'en'         => $trans['en'] ?? '',
        ];

        return ModelNotification::create($notification_data);
    }
}
}
