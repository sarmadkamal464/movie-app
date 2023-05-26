<?php

namespace App\Helpers;

class PaginationHelper
{
    static function paginateData($data, $request, $paginatorName)
    {
        $perPage = $request->query($paginatorName . '_perPage', 8);
        $currentPage = $request->query($paginatorName . '_page', 1);
        $offset = ($currentPage - 1) * $perPage;
        $paginatedData = array_slice($data, $offset, $perPage);
        $totalItems = count($data);
        $paginator = new \Illuminate\Pagination\LengthAwarePaginator(
            $paginatedData,
            $totalItems,
            $perPage,
            $currentPage,
            [
                'path' => $request->url(),
                'query' => $request->query(),
                'pageName' => $paginatorName . '_page',
            ]
        );

        return $paginator;
    }
}
