<?php
require_once locate('/framework/template/View.php');
require_once locate('/framework/template/Tag.php');

class Layout extends View {

    public function inject($title = 'My App', $content) {
        return $this->html([
            tag('head', [
                tag('title', $title),
                tag('meta[name="viewport"][content="width=device-width, initial-scale=1"]'),
                tag('link[rel="stylesheet"][href="'.assets('css/bootstrap.min.css').'"]'),
                tag('link[rel="stylesheet"][href="'.assets('css/style.css').'"]'),
                tag('script[src="'.assets('js/bootstrap.bundle.min.js').'"]')
            ]),
            tag('body',[
                tag('nav.navbar.navbar-expand.navbar-light.bg-light', [
                    tag('div.container-fluid', [
                        tag('a.navbar-brand[href="#"]', 'MyFWork'),
                        tag('ul.nav.d-flex.d-md-none.d-block', [
                            tag('li.nav-item', tag('a.nav-link[href="'.path('posts').'"]', 'Articles')),
                            tag('li.nav-item', tag('a.nav-link[href="'.path('about').'"]', 'About')),
                        ]),
                        tag('button.navbar-toggler[type="button"][data-bs-toggle="collapse"][data-bs-target="#navbarNav"][aria-controls="navbarNav"][aria-expanded="false"][aria-label="Toggle navigation"]', tag('span.navbar-toggler-icon')),
                    ])
                ]),
                tag('div.container-fluid', [
                    tag('div.row', [
                        tag('div#sidebar.col-md-3.col-lg-2.d-md-block.bg-light.sidebar.d-none.d-md-block', [
                            tag('ul.nav.flex-column', [
                                tag('li.nav-item', tag('a.nav-link[href="'.path('posts').'"]', 'Articles')),
                                tag('li.nav-item', tag('a.nav-link[href="'.path('about').'"]', 'About')),
                            ]),
                        ]),
                        tag('div#main.col-md-9.col-lg-10', $content)
                    ])
                ]),
            ])
        ]);
    }
}
