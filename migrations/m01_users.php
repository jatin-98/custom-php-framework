<?php


class m01_users
{
    public function up()
    {
        $db = App\Core\Application::$app->db;

        $sql = "CREATE TABLE users (
                    user_id INT AUTO_INCREMENT PRIMARY KEY,
                    email VARCHAR(255) NOT NULL,
                    name VARCHAR(255) NOT NULL,
                    status TINYINT NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
                ) ENGINE=INNODB;";

        $db->pdo->exec($sql);
    }

    public function down()
    {
        $db = App\Core\Application::$app->db;

        $sql = "DROP TABLE users;";

        $db->pdo->exec($sql);
    }
}
