<?php

/**
 * Homepage URL
 */
const HOMEPAGE = "http://localhost/MutexXO/index.php";

/**
 * The directory where Mutex XO is located in respect with '/'
 */

const ROOT_PATH = "/MutexXO";

/**
 * Mode can be 0 : means Cookie based authentication
 *             1 : means HTTP authentication
 *             2 : means session-based authentication
 */

const AUTHENTICATION_MODE = 2;

const ADMIN = 'ADMIN';
const ADMIN_PASS = '999';

/**
 * MySQL setting
 */
$hn = 'localhost';
$db = 'mutexxo';
$un = 'mutexxo_admin1';
$pw = 'VMGc82LA3I5331ovdQrq';

abstract class Role
{
    const Normal = 0;
    const Administration = 1;

}

abstract class DeleteStatus
{
    const Normal = 0;
    const Administration = 1;
}
