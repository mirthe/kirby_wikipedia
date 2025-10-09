<?php

Kirby::plugin('mirthe/wikipedia', [
    'options' => [
        'cache' => true
    ],
    'tags' => [
        'wikipedia' => [
            'attr' =>[
                'article',
                'lang'
            ],
            'html' => function($tag) {

                $article_name = str_replace(' ','_',$tag->article);

                // language is optional on call
                if (isset($tag->lang)) {
                    $vartaal = $tag->lang;
                } else {
                    $vartaal = "en";
                }

                // https://www.mediawiki.org/wiki/API:REST_API
                $url = "https://".$vartaal.".wikipedia.org/api/rest_v1/page/summary/".$article_name."?limit=1";

                $ch = curl_init( $url );
                curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
                curl_setopt($ch, CURLOPT_USERAGENT, $site->title());
                $output = curl_exec( $ch );
                curl_close( $ch );

                $article_json = json_decode($output,true);
                // print_r($article_json); exit();

                if ($article_json['title'] == 'Not found.'){
                    return "<p>Wikipedia article not found..</p>";
                }{
                    $mijnoutput = '<div class="well"';
                    if (array_key_exists('description', $article_json)) {
                        $mijnoutput .= ' lang="'.$article_json['lang'].'"'; }
                    $mijnoutput .= '><div class="well-img"><a href="';
                    $mijnoutput .= $article_json['content_urls']['desktop']['page'];
                    $mijnoutput .= '" title="Bekijken op Wikipedia"><img src="';
                    $mijnoutput .= $article_json['thumbnail']['source']; // Or 'originalimage'?
                    $mijnoutput .= '" alt=""></a></div>';
                    $mijnoutput .= '<div class="well-body">';
                    // $mijnoutput .= '<i class="fa-brands fa-wikipedia-w" title="Wikipedia" style="float: right"></i>';
                    $mijnoutput .= '<p><a href="'.$article_json['content_urls']['desktop']['page'];
                    $mijnoutput .= '" title="Bekijken op Wikipedia">';
                    $mijnoutput .= $article_json['title']."</a>";
                    if (array_key_exists('description', $article_json)) {
                    $mijnoutput .= "<br>".$article_json['description'];}
                    $mijnoutput .= '</p><p>'.mb_strimwidth($article_json['extract'], 0, 300, '&#8230;').'</p>';
                    $mijnoutput .= "</div></div>\n";
                    return $mijnoutput;
                }

            }
        ]
    ]
]);
