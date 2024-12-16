<?php
require_once locate('/framework/template/Tag.php');
require_once locate('/framework/helpers/string_literals.php');
require_once locate('/app/views/template.php');

class PostForm extends Layout {
    private $data;

    public function __construct($data = []) {
        $this->data = $data;
    }

    public function view() {

        $action = isset($this->data['id']) ?  path('posts/modify?id='.$this->data['id']) : path('posts/new');

        return $this->inject(isset($this->data['id']) ? 'Update Post' : 'New Post', tag('div.p-3', [
            tag('h4', isset($this->data['id']) ? 'Update Post' : 'New Post'),
            tag('div.mb-3', [
                tag('form[method="post"][action="'.$action.'"]', [
                    tag('div.mb-3', [
                        tag('label.form-label', 'Title'),
                        tag('input.form-control[name="title"][value="'.$this->data['title'].'"]'),
                    ]),
                    tag('div.mb-3', [
                        tag('label.form-label', 'Topic'),
                        tag('input.form-control[name="topic"][value="'.$this->data['topic'].'"]'),
                    ]),
                    tag('div.mb-3', [
                        tag('label.form-label', 'Content'),
                        tag('textarea.form-control[name="content"]', $this->data['content']),
                    ]),
                    tag('div.mb-3', [
                        tag('button.btn.btn-primary[type="submit"]', isset($this->data['id']) ? 'Update' : 'Save'),
                    ]),
                ])
            ]),
        ]));
    }
}