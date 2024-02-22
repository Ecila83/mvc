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
   
        $statement = $pdo->query('SELECT title, description, publish_date FROM articles');
        $rawArticles = $statement->fetchAll(PDO::FETCH_ASSOC);

        $articles = [];
        foreach ($rawArticles as $rawArticle) {
          
            $articles[] = new Article($rawArticle['title'], $rawArticle['description'], $rawArticle['publish_date']);
        }

        return $articles;
    }

    public function show()
    {
        // TODO: this can be used for a detail page
        $aricles = $this->getArticles();
    }
}