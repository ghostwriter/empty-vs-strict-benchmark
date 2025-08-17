<?php

declare(strict_types=1);

namespace Tests\Benchmark;

use PhpBench\Attributes\Iterations;
use PhpBench\Attributes\Revs;

final class EmptyVsStrictBench
{
    private array $array = ['a'];

    private array $arrayEmpty = [];

    private mixed $nullValue = null;

    private string $string = 'a';

    private string $stringEmpty = '';

    #[ Iterations(5), Revs(1000000)]
    public function benchArrayEmpty(): void
    {
        empty($this->array);
    }

    #[ Iterations(5), Revs(1000000)]
    public function benchArrayStrict(): void
    {
        [] === $this->array;
    }

    #[ Iterations(5), Revs(1000000)]
    public function benchEmptyArrayEmpty(): void
    {
        empty($this->arrayEmpty);
    }

    #[ Iterations(5), Revs(1000000)]
    public function benchEmptyArrayStrict(): void
    {
        [] === $this->arrayEmpty;
    }

    #[ Iterations(5), Revs(1000000)]
    public function benchEmptyStringEmpty(): void
    {
        empty($this->stringEmpty);
    }

    #[ Iterations(5), Revs(1000000)]
    public function benchEmptyStringStrict(): void
    {
        '' === $this->stringEmpty;
    }

    #[ Iterations(5), Revs(1000000)]
    public function benchNullEmpty(): void
    {
        empty($this->nullValue);
    }

    #[ Iterations(5), Revs(1000000)]
    public function benchNullStrict(): void
    {
        null === $this->nullValue;
    }

    #[ Iterations(5), Revs(1000000)]
    public function benchStringEmpty(): void
    {
        empty($this->string);
    }

    #[ Iterations(5), Revs(1000000)]
    public function benchStringStrict(): void
    {
        '' === $this->string;
    }
}
