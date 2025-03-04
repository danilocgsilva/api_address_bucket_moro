<?php

namespace App\View\Components\Api\Edit;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Database\Eloquent\Collection;

class EditEntriesTable extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        private array $headers,
        private Collection $entries,
        private string $destroyRoute,
        private array $destroyRouteParent
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view(
            'components.api.edit.edit-entries-table', 
            [
                "headers" => $this->headers,
                "entries" => $this->entries,
                "destroy_route" => $this->destroyRoute,
                "destroy_route_parent" => $this->destroyRouteParent,
            ]
        );
    }
}
