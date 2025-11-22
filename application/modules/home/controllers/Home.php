<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php
class Home extends MX_Controller
{
    function error()
    {
        $this->oldurl_to_newurl();
        $data['title'] = "Error";
        $data['description'] = "Error Page";
        $data['module'] = "home";
        $data['view_file'] = "error";
        echo Modules::run('template/layout2', $data);
    }
    function index()
    {
        $data['title'] = "";
        $data['description'] = "";
        $data['keywords'] = "NextGen";
        $data['module'] = "home";
        $data['view_file'] = "home";
        echo Modules::run('template/layout1', $data);
    }
    public function oldurl_to_newurl()
    {
        // if (@$this->uri->segment(1) == "packers-movers-bihar-india") {
        //     redirect("bihar", 'location', 301);
        // }
    }
    public function nifty()
    {
        $data['title'] = "Nifty Top 10 Stocks";
        $data['module'] = "home";
        $data['view_file'] = "nifty";

        echo Modules::run('template/layout1', $data);
    }

    public function nifty_json()
    {
        $cacheFile = APPPATH . 'cache/nifty_cache.json';
        $cacheTime = 1; // 1 second cache

        if (file_exists($cacheFile) && (time() - filemtime($cacheFile) < $cacheTime)) {
            header('Content-Type: application/json');
            echo file_get_contents($cacheFile);
            return;
        }

        $symbols = [
            "RELIANCE.NS",
            "TCS.NS",
            "HDFCBANK.NS",
            "INFY.NS",
            "HINDUNILVR.NS",
            "ICICIBANK.NS",
            "KOTAKBANK.NS",
            "SBIN.NS",
            "LT.NS",
            "AXISBANK.NS",
            "ADANIPORTS.NS",
            "ADANIGREEN.NS",
            "HCLTECH.NS",
            "BAJFINANCE.NS",
            "BAJAJFINSV.NS",
            "BHARTIARTL.NS"
        ];

        $logos = [
            "RELIANCE.NS" => "https://logo.clearbit.com/relianceretail.com",
            "TCS.NS" => "https://logo.clearbit.com/tcs.com",
            "HDFCBANK.NS" => "https://logo.clearbit.com/hdfcbank.com",
            "INFY.NS" => "https://logo.clearbit.com/infosys.com",
            "HINDUNILVR.NS" => "https://logo.clearbit.com/hul.co.in",
            "ICICIBANK.NS" => "https://logo.clearbit.com/icicibank.com",
            "KOTAKBANK.NS" => "https://logo.clearbit.com/kotak.com",
            "SBIN.NS" => "https://logo.clearbit.com/sbi.co.in",
            "LT.NS" => "https://logo.clearbit.com/larsentoubro.com",
            "AXISBANK.NS" => "https://logo.clearbit.com/axisdirect.in",
            "ADANIPORTS.NS" => "https://logo.clearbit.com/adaniports.com",
            "ADANIGREEN.NS" => "https://logo.clearbit.com/adaniports.com",
            "HCLTECH.NS" => "https://logo.clearbit.com/hcltech.com",
            "BAJFINANCE.NS" => "https://logo.clearbit.com/bajajfinserv.in",
            "BAJAJFINSV.NS" => "https://logo.clearbit.com/bajajfinserv.in",
            "BHARTIARTL.NS" => "https://logo.clearbit.com/bharti.com"
        ];

        $baseUrl = 'https://nse-api-khaki.vercel.app/stock';

        // ---- CURL MULTI (PARALLEL REQUESTS) ---- //
        $mh = curl_multi_init();
        $curlHandles = [];

        foreach ($symbols as $symbol) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $baseUrl . '?symbol=' . urlencode($symbol));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_multi_add_handle($mh, $ch);
            $curlHandles[$symbol] = $ch;
        }

        // Execute all at once
        $running = null;
        do {
            curl_multi_exec($mh, $running);
        } while ($running > 0);

        $market_data = [];

        foreach ($curlHandles as $symbol => $ch) {
            $resp = curl_multi_getcontent($ch);
            $data = json_decode($resp, true);

            if ($data && isset($data['status']) && $data['status'] === 'success') {
                $data['logo'] = $logos[$symbol] ?? 'https://via.placeholder.com/40?text=NA';
                $market_data[] = $data;
            }

            curl_multi_remove_handle($mh, $ch);
            curl_close($ch);
        }

        curl_multi_close($mh);

        file_put_contents($cacheFile, json_encode($market_data));

        header('Content-Type: application/json');
        echo json_encode($market_data);
    }

}
