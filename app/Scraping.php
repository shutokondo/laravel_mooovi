<?php

namespace App;
use App\Product;
use Log;

class Scraping
{
    public static function movie_urls()
    {
        require_once 'simple_html_dom.php';

        $links = array();
        $next_url = "";

        while (true)
        {
            $current_page = file_get_html('http://review-movie.herokuapp.com/' . $next_url);
            $elements = $current_page->find('.entry-title a');
            foreach ($elements as $element) {
                $links[] = $element->href;
            }

            $next_link = $current_page->find('.pagination .next a');

            if (!$next_link)
            {
                break;
            }

            $next_url = $next_link[0]->href;
        }

        foreach ($links as $link) {
          Scraping::get_product('http://review-movie.herokuapp.com' . $link);
        }
    }

    public static function get_product($link)
    {
        echo "hogeeeeeeeeeeeeeeeeeeeeeee", PHP_EOL;
        $page = file_get_html($link);
        $title = $page->find('.entry-title')[0]->plaintext;
        $image_url = $page->find('.entry-content img')[0]->src;
        $director = $page->find('.director span')->plaintext;
        $detail = $page->find('.entry-content p')->plaintext;
        $open_date = $page->find('.date span')->plaintext;

        $product = Product::firstOrNew(array('title' => $title, 'image_url' => $image_url));
        $product->director = $director;
        $product->detail = $detail;
        $product->open_date = $open_date;
        $product->save();
    }
}

Log::debug(Scraping::movie_urls());

?>