<?php

#[AllowDynamicProperties]
class Request {

    private $inputs = [];

    public function __construct(array $server) {
        $data = json_decode(file_get_contents('php://input'), true);
        if($data) {
            foreach ($data as $key => $value) {
                $this->inputs[$key] = $value;
                $this->{$key} = $value;
             }
        }

        foreach($_GET as $key => $value) {
            $this->inputs[$key] = $value;
            $this->{$key} = $value;
        }

        foreach($_POST as $key => $value) {
            $this->inputs[$key] = $value;
            $this->{$key} = $value;
        }
    }
    
    public function input($key) {
        return $this->inputs[$key];
    }
}
