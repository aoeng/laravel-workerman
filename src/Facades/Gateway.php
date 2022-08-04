<?php

namespace Aoeng\Laravel\Workerman\Facades;

use Illuminate\Support\Facades\Facade as LaravelFacade;

/**
 * @property string $registerAddress
 * @property string $secretKey
 * @property integer $connectTimeout
 * @property boolean $persistentConnection
 * @method static void sendToAll($message, $client_id_array = null, $exclude_client_id = null, $raw = false)
 * @method static bool sendToClient($client_id, $message, $raw = false)
 * @method static bool sendToCurrentClient($message, $raw = false)
 * @method static int isUidOnline($uid)
 * @method static int isOnline($client_id)
 * @method static array getAllClientSessions($group = '')
 * @method static array getClientInfoByGroup($group)
 * @method static array getClientSessionsByGroup($group)
 * @method static int getAllClientCount()
 * @method static int getClientCountByGroup($group = '')
 * @method static array getClientIdListByGroup($group)
 * @method static array getAllClientIdList()
 * @method static array getClientIdByUid($uid)
 * @method static array getUidListByGroup($group)
 * @method static int getUidCountByGroup($group)
 * @method static array  getAllUidList()
 * @method static int getAllUidCount()
 * @method static string  getUidByClientId($client_id)
 * @method static array  getAllGroupIdList()
 * @method static array getAllGroupUidCount()
 * @method static array getAllGroupUidList()
 * @method static array  getAllGroupClientIdList()
 * @method static array getAllGroupClientIdCount()
 * @method static void closeClient($client_id, $message = null)
 * @method static bool closeCurrentClient($message = null)
 * @method static bool destroyClient($client_id)
 * @method static bool destroyCurrentClient()
 * @method static void bindUid($client_id, $uid)
 * @method static void unbindUid($client_id, $uid)
 * @method static void joinGroup($client_id, $group)
 * @method static void leaveGroup($client_id, $group)
 * @method static void ungroup($group)
 * @method static void sendToUid(int|string|array $uid, $message, $raw = false)
 * @method static void sendToGroup(int|string|array $group, $message, $exclude_client_id = null, $raw = false)
 * @method static void setSession($client_id, array $session)
 * @method static mixed getSession($client_id)
 */
class Gateway extends LaravelFacade
{
    protected static function getFacadeAccessor()
    {
        return 'workerman-gateway';
    }

}
