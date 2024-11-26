<?php

namespace app\core;

class PaginationHelper {
    private $totalItems;
    private $itemsPerPage;
    private $currentPage;
    private $totalPages;

    public function __construct($totalItems, $itemsPerPage = 9, $currentPage = 1) {
        $this->totalItems = $totalItems;
        $this->itemsPerPage = $itemsPerPage;
        $this->currentPage = $currentPage;
        $this->totalPages = ceil($totalItems / $itemsPerPage);
    }

    public function getOffset() {
        return ($this->currentPage - 1) * $this->itemsPerPage;
    }

    public function getLimit() {
        return $this->itemsPerPage;
    }

    public function getTotalPages() {
        return $this->totalPages;
    }

    public function getCurrentPage() {
        return $this->currentPage;
    }

    public function hasNextPage() {
        return $this->currentPage < $this->totalPages;
    }

    public function hasPreviousPage() {
        return $this->currentPage > 1;
    }

    public function getPageNumbers() {
        $pages = [];
        for ($i = 1; $i <= $this->totalPages; $i++) {
            $pages[] = $i;
        }
        return $pages;
    }
}