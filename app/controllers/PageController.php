<?php

require_once locate('/app/views/about.php');

class PageController {
    public function about(Request $request) {
        return view(new AboutPage());
    }
}