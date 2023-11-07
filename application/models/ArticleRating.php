<?php
require_once "UserPost.php";

class ArticleRatingPost extends UserPost
{
    protected $db_table = 'articles__ratings';
    protected $post_error_msg = 'Rating was not saved! Please try again!';
    protected $parameters = [
        'id' => ['default' => 0, 'check' => ['articleExists' => 'Article not found!']],
        'ip' => [
            'default' => 0,
            'check' => [
//                'ipCanBeUsedForArticle' => [
//                    'max' => 1,
//                    'time_limit' => false,
//                    'error_msg' => 'You already voted with this IP on this article!'
//                ],
                'ipCanBeUsed' => [
                    'max' => 10,
                    'time_limit' => 60 * 10,
                    'error_msg' => 'You can vote a maximum of 10 articles per hour from the same IP!'
                ]
            ]
        ],
        'is_like' => 1
    ];

    public function checkIfPost()
    {
        if (!$this->post()) {
            throw new UserPostException(json_encode($this->getErrors()));
        }
    }
}