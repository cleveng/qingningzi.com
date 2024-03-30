<?php

namespace App\Http\Livewire;

use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

/**
 *
 */
class ItemPromotion extends Component
{

    public array $items = [];
    public bool $showTitle = false;

    /**
     * @param int $type
     * @param int $limit
     * @param bool $showTitle
     * @return void
     */
    public function mount(int $type = 1, int $limit = 1, bool $showTitle = false): void
    {
        $url = sprintf('https://www.cakioe.com/api/v1/promotions?type=%d&limit=%d', $type, $limit);
        try {
            $resp = Http::get($url);
            if ($resp->status() !== 200) {
                Log::error('Failed to fetch promotions');
                return;
            }

            $result = json_decode($resp->body(), true);
            $this->items = $result['data'] ?? [];
            $this->showTitle = $showTitle;
        } catch (Exception $e) {
            Log::error('An error occurred: ' . $e->getMessage());
        }
    }


    /**
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('livewire.item-promotion');
    }
}
