<?php

namespace App\Dto;

use App\Enums\TaskStatus;
use Spatie\LaravelData\Attributes\Validation\Sometimes;
use Spatie\LaravelData\Data;
use Symfony\Contracts\Service\Attribute\Required;

class TaskCreateDto extends Data
{
    public function __construct(
        #[Required, Max(255)]
        public string $title,

        #[Sometimes]
        public string $description = '',

        #[Required]
        public TaskStatus $status = TaskStatus::NotStarted,
    ) {}
}
