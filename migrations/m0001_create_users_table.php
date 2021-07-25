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

class m0001_create_users_table
{
    public function up()
    {
        $db = \app\core\Application::$app->db;
        $SQL = "CREATE TABLE users(
                id INT AUTO_INCREMENT PRIMARY KEY,
                email VARCHAR (255) NOT NULL,
                firstname VARCHAR (255) NOT NULL,
                lastname VARCHAR (255) NOT NULL,
                status TINYINT NOT NULL,
                create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = \app\core\Application::$app->db;
        $SQL = "DROP TABLE users;";
        $db->pdo->exec($SQL);
    }
}
