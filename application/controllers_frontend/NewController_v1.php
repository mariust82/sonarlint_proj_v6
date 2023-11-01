<?php
class CommentsController extends MVC\STDOUT\Controller {
    public function run() {

        $this->response->attributes("comment", array (
            'id' => '1858',
            'parent_id' => '0',
            'name' => 'sadddd',
            'email' => 'sdasd@sdsd.com',
            'message' => 'asdasdasdsa das dasd asd asd a',
            'entity_value' => '105743',
            'time_added' => '01:00:15 PM &nbsp; | &nbsp; Oct 13, 2022',
            'rating' => 0,
            'ip' => '127.0.0.1',
            'country' => 'United States',
            'branches' => NULL,
            '' . "\0" . '*' . "\0" . 'comment' => NULL,
            '' . "\0" . '*' . "\0" . 'date' => NULL,
        ));

    }

    public function run_v2() {

        $this->response->attributes("country", 'United States');

        $this->response->attributes("category", 'info');

        $this->response->attributes("pageNum", 1);

        $this->response->attributes("URI", 'contact-us');

        $this->response->attributes("page_info", array (
            'title' => 'Contact US: Share Your Thoughts With The Lab Team ...',
            'h1' => 'Contact Us',
            'h2' => '',
            'desc' => 'Have Something To Share With Us? Comments, Suggest...',
        ));

        $this->response->attributes("section", '');

        $this->response->attributes("val", '');


        $this->response->attributes("version", '2.7.1.89');

        $this->response->attributes("aside", array (
        ));

        $this->response->attributes("widgets", array (
        ));

        $this->response->attributes("isLocal", true);


        $this->response->attributes("js", array (
            0 => 'public/build/js/parts/jquery-3.6.0.min.js',
        ));

        $this->response->attributes("css", array (
            0 => 'public/build/css/parts/main.css',
        ));

    }
}
