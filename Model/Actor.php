<?php
require_once "DB.php";
class Actor{
    //not modified
    private $_pdo;

        public function __construct(){
            $this->_pdo = DB::connect();
        }

        public function get($id = null){
            if ($id == null){
                $sql = "select * from actor";
                return $this->_pdo->query($sql)->fetchAll();
            }else {
                $sql = "select * from actor where actor_id = $id";
                return $this->_pdo->query($sql)->fetch();
            }

        }

        public function add($table){
            // $sql = "insert into actor(actor_id,first_name,last_name) values(:id, :fname, :lname)";
            $sql = "insert into actor(first_name,last_name) values(:fname, :lname)";
            $stmt = $this->_pdo->prepare($sql);
            
            $stmt->execute($table);
            return $this->_pdo->lastInsertId();
        }
        
        public function edit($id, $table){
            $sql = "update actor set first_name= :fname,last_name =:lname where actor_id = $id";
            $stmt = $this->_pdo->prepare($sql);
            return $stmt->execute($table);
        }
        
        public function delete($id){
            $sql1="DELETE FROM sakila.film_actor
            WHERE actor_id = $id;";
            $sql = "delete from actor where actor_id = '$id'";
            $this->_pdo->exec($sql1);
            return $this->_pdo->exec($sql);
        }

        public function details($id){
                $sql1="SELECT film.title FROM film INNER JOIN film_actor ON film.film_id = film_actor.film_id WHERE film_actor.actor_id = '$id'";
                // $sql = "select title from film where film_id=(select film_id from film_actor where actor_id = '$id')";
                return $this->_pdo->query($sql1)->fetchAll();
    }
    }
