<?php
namespace App\Translators;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class DeepLTranslator
{
    public function translate($text, $target_lang = 'de')
    {
             // dd($text);
             if (is_array($text)) {
              $text = $text[$target_lang] ?? '';
          }
          
        // Check if the translation is already in the cache
            $cachedTranslation = Cache::get("translation_{$text}_{$target_lang}");
            if ($cachedTranslation) {
            return $cachedTranslation;
            }
   
        $client = new Client();
 try{
        $response = $client->post('https://api.deepl.com/v2/translate', [
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'User-Agent' => 'BIKETEC'
            ],
            'form_params' => [
                'auth_key' => env('DEEPL_API_KEY'),
                'text' => $text,
                'target_lang' => $target_lang
            ]
        ]);
    }
 catch (RequestException  $e) {
    return $e->getMessage();
    }

        $result = json_decode($response->getBody()->getContents());
        // Store the translation in the cache
        Cache::put("translation_{$text}_{$target_lang}", $result->translations[0]->text, 1440);
        return $result->translations[0]->text;
    }
}
