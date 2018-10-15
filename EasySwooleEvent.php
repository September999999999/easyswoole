<?php
/**
 * Created by PhpStorm.
 * User: yf
 * Date: 2018/1/9
 * Time: 下午1:04
 */

namespace EasySwoole;

use \EasySwoole\Core\AbstractInterface\EventInterface;
use EasySwoole\Core\Component\Di;
use \EasySwoole\Core\Swoole\ServerManager;
use \EasySwoole\Core\Swoole\EventRegister;
use \EasySwoole\Core\Http\Request;
use \EasySwoole\Core\Http\Response;

Class EasySwooleEvent implements EventInterface
{

    public static function frameInitialize(): void
    {
        // TODO: Implement frameInitialize() method.
        date_default_timezone_set('Asia/Shanghai');
    }

    public static function mainServerCreate(ServerManager $server, EventRegister $register): void
    {
        //读取当前系统设置
        $env = parse_ini_file('.env', true);

        Di::getInstance()->set('MYSQL', \MysqliDb::class, Array(
                'host' => $env["database_host"],
                'username' => $env["database_user"],
                'password' => $env["database_password"],
                'db' => $env["database_name"],
                'port' => 3306,
                'charset' => 'utf8')
        );
        $db = Di::getInstance()->get('MYSQL');
        // TODO: Implement mainServerCreate() method.
    }

    public static function onRequest(Request $request, Response $response): void
    {
        // TODO: Implement onRequest() method.
    }

    public static function afterAction(Request $request, Response $response): void
    {
        // TODO: Implement afterAction() method.
    }
}