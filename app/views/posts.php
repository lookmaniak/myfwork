<?php
require_once locate('/framework/template/Tag.php');
require_once locate('/framework/helpers/string_literals.php');
require_once locate('/app/views/template.php');

class Posts extends Layout {
    
    public function view($data) {
        return isset($data['articles']) ? $this->post_list($data) : $this->single_post_view($data);
    }

    private function post_list($data) {
        return $this->inject($data['title'], tag('div', [
            tag('h1.mb-3', safe_text($data['title'])),
            tag('div.mb-3', tag('a.btn.btn-primary[href="'.path('posts/new').'"]', 'New Post')),
            tag('div', array_map(function($item){
                return tag('div.mb-3', [
                    tag('h4', tag('a[href="posts?id='.$item["id"].'"]', safe_text($item['title']))),
                    tag('div', safe_text( create_excerpt_by_words($item['content'], 10) )),
                ]);
            }, $data['articles']))
        ]));
    }

    private function single_post_view($data) {
        return $this->inject($data['title'], tag('div', [
            tag('div.d-flex.justify-content-between', [
                tag('h4', tag('a[href="posts?id='.$data['id'].'"]', safe_text($data['title']))),
                tag('a.btn.btn-primary[href="'.path('posts/modify?id='. $data['id']).'"]', 'Edit this Post'),
            ]),
            tag('small', 'Topic: ' . safe_text($data['topic'])),
            tag('div', safe_text($data['content'])),
        ]));
    }
}