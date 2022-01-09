<?php
class Api {
    const BOOK_API_URL = 'https://api.nytimes.com/svc/books/v3/lists/';
    const API_KEY = "YOUR_API_KEY";

    public function makeRequest($url) 
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);
        return json_decode($result);
    }

    public function generateUrl($data) 
    {
        $data = $data ?? 'current';
        $url = self::BOOK_API_URL . $data . '/hardcover-fiction.json?api-key=' . self::API_KEY;
        return $url;
    }

    public function getBookLists($data = false, $hasError = false)
    {
        $input = $data;

        if ($hasError) {
            $data = false;
        }

        $url = $this->generateUrl($data);
        $response = $this->makeRequest($url);
        $results = [];

        if ($response && isset($response->results)) {
            $results = $response->results;
        }
        
        $results = $this->generateBookData($results, $input, $hasError);
        return $results;
    }

    public function calculateRankDifference($current, $last)
    {
        $difference = $current - $last;
        $html = $difference > 0 ? '<i class="fas fa-caret-down"> ' . $difference . '</i>' : '<i class="fas fa-caret-up"> ' . abs($difference) . '</i>';
        return $html;
    }

    public function generateBookData($lists, $input = '', $hasError = false)
    {
        $hasLists = is_object($lists);

        return [
            'books' => $hasLists ? $lists->books : [],
            'error' => $hasError ? 'is-invalid' : '',
            'date'  => $hasLists && isset($lists->published_date) ? $lists->published_date : $input,
            'input' => $input ? $input : ''
        ];
    }
}