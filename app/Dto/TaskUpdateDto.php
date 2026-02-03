<?php

namespace App\Dto;

use App\Enums\TaskStatus;
use Spatie\LaravelData\Attributes\Validation\Sometimes;
use Spatie\LaravelData\Data;
use Symfony\Contracts\Service\Attribute\Required;

class TaskUpdateDto extends Data
{
    public function __construct(
        #[Required]
        public int $id,

        #[Sometimes, Max(255)]
        public ?string $title = null,

        #[Sometimes]
        public ?string $description = null,

        #[Sometimes]
        public ?TaskStatus $status = null,
    ) {}

}
