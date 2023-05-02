<?php

namespace App\Http\Controllers;

use Symfony\Component\DomCrawler\Crawler;

class GetNewsController extends Controller
{
    public function get_destaque(): array {
        $resultado = $this->connection_curl();

        $arr_carrousel_destaque = [];

        $crawler = new Crawler($resultado);

        $contentContainer = $crawler->filter('div[class="slide-destaque"]');

        foreach ($contentContainer as $key => $value) {
            array_push($arr_carrousel_destaque, trim($value->textContent));
        }

        return $arr_carrousel_destaque;
    }

    public function get_news_fixed(): array{
        $resultado = $this->connection_curl();

        $arr_news_fixed = [];

        $crawler = new Crawler($resultado);

        $contentContainer = $crawler->filter('div[id="box-destaque"]');

        foreach ($contentContainer as $key => $value) {
            array_push($arr_news_fixed ,trim($value->textContent));
        }

        return $arr_news_fixed;

    }

    public function get_recent_news(){
        $resultado = $this->connection_curl();

        $arr_recent_news = [];

        $crawler = new Crawler($resultado);

        $contentContainer = $crawler->filter('div[class="card-theme card-model-5"]');

        foreach ($contentContainer as $key => $value) {
            var_dump(trim($value->textContent));
        }
    }

    public function get_most_viewed(): array {
        $resultado = $this->connection_curl();

        $arr_most_viewed = [];

        $crawler = new Crawler($resultado);

        $contentContainer = $crawler->filter('li[class="wtpsw-post-li"]');

        foreach ($contentContainer as $key => $value) {
            array_push($arr_most_viewed, trim($value->textContent));
        }

        return $arr_most_viewed;

    }

    private function connection_curl(){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://ilheus24h.com.br/');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        return $result;
    }
}
