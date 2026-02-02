<?php

namespace App\Dto;

use Spatie\LaravelData\Data;
use App\Enums\TaskStatus;
use Symfony\Contracts\Service\Attribute\Required;

class TaskData extends Data
{
    public function __construct(
        #[Required]
        public int $id,

        #[Required, Max(255)]
        public string $title,

        #[Required]
        public string $description,

        #[Required]
        public TaskStatus $status,
    ) {}

}
