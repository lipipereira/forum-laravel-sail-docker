<?php

namespace App\Adapters;

use App\Repositories\PaginationInterface;

class ApiAdapter
{
    public static function toJson(
        PaginationInterface $data,
    ) {
        // return DefaultResource::collection($supports->items())
        //                         ->additional([
        //                             'meta' => [
        //                                 'total' => $supports->total(),
        //                                 'is_first_page' => $supports->isFirstPage(),
        //                                 'is_last_page' => $supports->isLastPage(),
        //                                 'current_page' => $supports->currentPage(),
        //                                 'next_page' => $supports->getNumberNextPage(),
        //                                 'previous_page' =>$supports->getNumberPreviousPage()
        //                             ]
        //                         ]);
    }

}
