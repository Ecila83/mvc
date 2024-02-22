<?php
declare(strict_types = 1);
require("Model/database.php");
 //  database connection
$pdo = database();
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
 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $statement = $pdo->query(
            'SELECT title, description, publish_date FROM articles'
        );

        $articles= [];
        while ($rawArticles = $statement->fetch()) {
            $articles = [
                'title' => $row['title'],
                'description' => $row['description'],
                'publish_date' => $row['publish_date'],
            ];

            $articles[] = $article;
        }

        return $articles;
    } catch (PDOException $e) {
        echo 'Erreur de connexion : ' . $e->getMessage();
        exit();
    }
    }
    public function show()
    {
        // TODO: this can be used for a detail page

    }
}