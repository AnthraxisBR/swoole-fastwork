<?php


namespace AnthraxisBR\SwooleFW\database;


class MigrationsQueryBuilder
{

    public function createTable($name, $attributes)
    {
        $type = '';
        $primary_key_query = '';

        $query = 'CREATE TABLE ' . strtolower($name) . ' (';
        $i = 0;
        $max = count($attributes) - 1;
        foreach ($attributes as $attr){
            $comment = $attr['comment'];
            $name = $attr['name'];
            if (strpos($comment, '@ORM\Column')) {
                if (preg_match('/type="([^"]+)"/', $comment, $m)) {
                    $type = strtoupper($m[1]);
                    if (preg_match('/length="([^"]+)"/', $comment, $m)) {
                        $limit = $m[1];
                    } else {
                        $limit = '50';
                    }
                    $type = $type . '(' . $limit . ')';
                }
            }

            if (strpos($comment, '@ORM\GeneratedValue') and strpos($comment, '@ORM\Id')) {
                $primary_key_query .= ',';
                $primary_key_query .= ' PRIMARY KEY (' . $name . ')';
            }

            $query .= ' ' . $name . ' ' . $type;
            if($i < $max){
                $query .= ',';
            }
            $i += 1;
        }

        if($primary_key_query != ''){
            $query .= $primary_key_query;
        }

        $query .= ');';

        var_dump($query);
        /*
            CREATE TABLE oauth_authorization_codes (
              authorization_code  VARCHAR(40)     NOT NULL,
              client_id           VARCHAR(80)     NOT NULL,
              user_id             VARCHAR(80),
              redirect_uri        VARCHAR(2000),
              expires             TIMESTAMP       NOT NULL,
              scope               VARCHAR(4000),
              id_token            VARCHAR(1000),
              PRIMARY KEY (authorization_code)
            );
         */
    }
}