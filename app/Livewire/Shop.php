<?php

namespace App\Livewire;

// use Livewire\WithPagination;

use App\Models\Brand;
use App\Models\DisplaySize;
use App\Models\DisplayType;
use App\Models\Graphic;
use App\Models\hdd;
use App\Models\ProcessorGeneration;
use App\Models\ProcessorModel;
use App\Models\Product;
use App\Models\Ram;
use App\Models\SpecialFeature;
use App\Models\ssd;
use Livewire\Component;

use Livewire\Attributes\Title;
#[Title('Shop')]
class Shop extends Component
{
    public $prds;
    public $cat;
    public $subcat;
    public function mount(){
        $this->prds = Product::where('status', 'active')
                        ->where('is_showable_to_user',1)
                        ->get();
    }
    public function render()
    {
        $per_page = request()->per_page ?? 8;
        $sort_by = request()->sort_by ?? 'newest';

        $query = Product::with(['ProcessorModel','ram','ssd','hdd','DisplaySize','DisplayType'])
                        ->where('status', 'active')
                        ->where('is_showable_to_user', 1);

        switch ($sort_by) {
            case 'price_asc':
                $query->orderBy('final_price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('final_price', 'desc');
                break;
            case 'popularity':
                $query->orderBy('views', 'desc');
                break;
            case 'average_rating':
                $query->orderBy('average_rating', 'desc');
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
        }

        $n['products'] = $query->paginate(1);
        $n['brands'] = Brand::get();
        $n['p_models'] = ProcessorModel::get();
        $n['p_generations'] = ProcessorGeneration::get();
        $n['d_sizes'] = DisplaySize::get();
        $n['d_types'] = DisplayType::get();
        $n['rams'] = Ram::get();
        $n['ssds'] = ssd::get();
        $n['hdds'] = hdd::get();
        $n['graphics'] = Graphic::get();
        $n['s_features'] = SpecialFeature::get();
        return view('livewire.shop',$n);
    }
}
