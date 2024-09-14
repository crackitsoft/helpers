<?php

namespace crackitsoft\helpers\traits;

trait Status
{
    public  function loadStatus($code)
    {
        $codes = array_merge($this->appCodes(), $this->coreCodes());
        $result = $codes[$code] ? $codes[$code] : [$code, 'unknown', 'secondary'];
        $export = [
            'code' => $result[0],
            'label' => $result[1],
            'theme' => $result[2],
            'operation' => isset($result[3]) ? $result[3] : 'N/A',
        ];
        if ($export['operation'] == 'N/A') {
            unset($export['operation']);
        }
        return $export;
    }
    protected function appCodes()
    {
        $codes = [
            0   => ['0', 'Deleted', 'danger'],
            1   => ['1', 'Active', 'success'],
            1   => ['2', 'Inactive', 'danger'],
            2   => ['3', 'Partial', 'info'],
            3   => ['4', 'Cancelled', 'warning'],
            4   => ['5', 'Declined', 'danger'],
            5   => ['6', 'Approved', 'success'],
            6   => ['7', 'Pending', 'info'],
            7   => ['8', 'Archived', 'primary'],
            8   => ['9', 'Banned', 'secondary'],
            9   => ['10', 'Suspended', 'warning'],
        ];
        return $codes;
    }
    protected function coreCodes()
    {
        $codes = [
            100 => ['100', 'Continue', 'info'],
            101 => ['101', 'Switching Protocols', 'info'],
            103 => ['103', 'Early Hints', 'info'],
            200 => ['200', 'OK', 'success'],
            201 => ['201', 'Created', 'success'],
            202 => ['202', 'Accepted', 'success'],
            203 => ['203', 'Non-Authoritative Information', 'success'],
            204 => ['204', 'No Content', 'info'],
            205 => ['205', 'Reset Content', 'success'],
            206 => ['206', 'Partial Content', 'info'],
            207 => ['207', 'Multi-Status', 'success'],
            226 => ['226', 'IM Used', 'success'],
            300 => ['300', 'Multiple Choices', 'danger'],
            301 => ['301', 'Moved Permanently', 'danger'],
            302 => ['302', 'Found', 'danger'],
            303 => ['303', 'See Other', 'danger'],
            304 => ['304', 'Not Modified', 'danger'],
            305 => ['305', 'Use Proxy', 'danger'],
            306 => ['306', 'Reserved', 'danger'],
            307 => ['307', 'Temporary Redirect', 'danger'],
            400 => ['400', 'Bad Request', 'danger'],
            401 => ['401', 'Unauthorized', 'danger'],
            402 => ['402', 'Payment Required', 'danger'],
            403 => ['403', 'Forbidden', 'danger'],
            404 => ['404', 'Not Found', 'danger'],
            405 => ['405', 'Method Not Allowed', 'danger'],
            406 => ['406', 'Not Acceptable', 'danger'],
            407 => ['407', 'Proxy Authentication Required', 'danger'],
            408 => ['408', 'Request Timeout', 'danger'],
            409 => ['409', 'Conflict', 'danger'],
            410 => ['410', 'Gone', 'danger'],
            411 => ['411', 'Length Required', 'danger'],
            412 => ['412', 'Precondition Failed', 'danger'],
            413 => ['413', 'Request Entity Too Large', 'danger'],
            414 => ['414', 'Request-URI Too Long', 'danger'],
            415 => ['415', 'Unsupported Media Type', 'danger'],
            416 => ['416', 'Requested Range Not Satisfiable', 'danger'],
            417 => ['417', 'Expectation Failed', 'danger'],
            422 => ['422', 'Unprocessable Entity', 'danger'],
            423 => ['423', 'Locked', 'danger'],
            424 => ['424', 'Failed Dependency', 'danger'],
            426 => ['426', 'Upgrade Required', 'danger'],
            500 => ['500', 'Internal Server Error', 'danger'],
            501 => ['501', 'Not Implemented', 'danger'],
            502 => ['502', 'Bad Gateway', 'danger'],
            503 => ['503', 'Service Unavailable', 'danger'],
            504 => ['504', 'Gateway Timeout', 'danger'],
            505 => ['505', 'HTTP Version Not Supported', 'danger'],
            506 => ['506', 'Variant Also Negotiates', 'danger'],
            507 => ['507', 'Insufficient Storage', 'danger'],
            510 => ['510', 'Not Extended', 'danger']
        ];
        return $codes;
    }
}
