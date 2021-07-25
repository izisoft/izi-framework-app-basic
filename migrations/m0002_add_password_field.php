<?php
/**
 * @link https://framework.iziweb.net
 * @copyright Copyright (c) 2021 Izi Software LLC
 * @license https://framework.iziweb.net/license
 */
/**
 * @author Giang A Tin <vantruong1898@gmail.com>
 * @since 1.0
 */

class m0002_add_password_field
{
    public function up()
    {
        $db = \app\core\Application::$app->db;
        $SQL = "ALTER TABLE users ADD COLUMN password VARCHAR (255) NOT NULL;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = \app\core\Application::$app->db;
        $SQL = "ALTER TABLE users DROP COLUMN password;";
        $db->pdo->exec($SQL);
    }
}
