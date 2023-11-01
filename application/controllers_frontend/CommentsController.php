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
}
