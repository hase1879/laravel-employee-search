<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Employee;

class CommonFooter extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $employees = Employee::with('user')->get();



        $tree = $employees->groupBy("所属支社")->map(function($collection){
            return $collection->groupBy("所属部署");
        });

        return view('components.common-footer',[
            "date" => date("Y-m-d H:i:s"),
            "tree" => $tree
        ]);
    }
}
