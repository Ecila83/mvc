<?php
declare(strict_types = 1);
require("Model/database.php");

class ArticleController
{
    public function index()
    {
        // Load all required data
        $articles = $this->getArticles();

        // Load the view
        require 'View/articles/index.php';
    }

    // Note: this function can also be used in a repository - the choice is yours
    private function getArticles()
    {
       
        // Note: you might want to use a re-usable databaseManager class - the choice is yours
        //  fetch all articles as 
   

        try {
            //  database connection
            $pdo = database();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $statement = $pdo->query(
                'SELECT title, description, publish_date, author FROM articles ORDER BY publish_date'
            );

            $rawArticles = $statement->fetchAll();

            $articles = [];
            foreach ($rawArticles as $rawArticle) {
                // We are converting an article from a "dumb" array to a much more flexible class
                $articles[] = new Article($rawArticle['title'], $rawArticle['description'], $rawArticle['publish_date'], $rawArticle['author']);
            }
    
            return $articles;
        } catch (PDOException $e) {
            echo 'Error connection : ' . $e->getMessage();
            exit();
        }
    }
    public function show(int $id)
    {
        $pdo = database();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // TODO: this can be used for a detail page

        // Get nombre d'article.
        $countStatement = $pdo->query("SELECT count(id) FROM articles");
        $count = $countStatement->fetchColumn();

        
        // TODO : A change et utiliser "prepare statement".
        $statement = $pdo->prepare(
            "SELECT title, description, publish_date, author FROM articles ORDER BY publish_date LIMIT 1 OFFSET ?"
        );
        $statement->bindParam(1, $id, PDO::PARAM_INT);
        $statement->execute();
        $rawArticle = $statement->fetch();

        $article = new Article($rawArticle['title'], $rawArticle['description'], $rawArticle['publish_date'],$rawArticle['author']);
        $prev = ($id > 0) ? ($id - 1) : null;
        $next = ($id < ($count - 1)) ? ($id + 1) : null;

        // Load the view
        require 'View/articles/show.php';
    }
}