<?php

declare(strict_types=1);

namespace App\Command;

use Intervention\Image\Drivers\Vips\Driver;
use Intervention\Image\ImageManager;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

#[AsCommand('avif')]
final readonly class AvifCommand
{
    public function __construct(
        #[Autowire(param: 'kernel.project_dir')] private string $projectDir,
    ) {
    }

    public function __invoke(): int
    {
        $imageManager = new ImageManager(new Driver());
        $imageManager->read(fopen($this->projectDir.'/example.jpg', 'r'))->toAvif();

        return 0;
    }
}
