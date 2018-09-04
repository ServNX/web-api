<?php

namespace App\Services;

class Repository
{
    public $name;

    public $open_issues_count;

    public $forks_count;

    public $stars_count;

    public $watchers_count;

    public $additional_data;

    public function __construct(
        $name,
        $open_issues_count = null,
        $forks_count = null,
        $stars_count = null,
        $watchers_count = null,
        $additional_data = null
    ) {
        $this->name = $name;
        $this->open_issues_count = $open_issues_count;
        $this->forks_count = $forks_count;
        $this->stars_count = $stars_count;
        $this->watchers_count = $watchers_count;
        $this->additional_data = $additional_data;
    }
}