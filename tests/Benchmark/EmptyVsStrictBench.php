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
    public function benchEmptyOnArray(): void
    {
        empty($this->array);
    }

    #[ Iterations(5), Revs(1000000)]
    public function benchEmptyOnEmptyArray(): void
    {
        empty($this->arrayEmpty);
    }

    #[ Iterations(5), Revs(1000000)]
    public function benchEmptyOnEmptyString(): void
    {
        empty($this->stringEmpty);
    }

    #[ Iterations(5), Revs(1000000)]
    public function benchEmptyOnNull(): void
    {
        empty($this->nullValue);
    }

    #[ Iterations(5), Revs(1000000)]
    public function benchEmptyOnString(): void
    {
        empty($this->string);
    }

    #[ Iterations(5), Revs(1000000)]
    public function benchStrictArray(): void
    {
        [] === $this->array;
    }

    #[ Iterations(5), Revs(1000000)]
    public function benchStrictEmptyArray(): void
    {
        [] === $this->arrayEmpty;
    }

    #[ Iterations(5), Revs(1000000)]
    public function benchStrictEmptyString(): void
    {
        '' === $this->stringEmpty;
    }

    #[ Iterations(5), Revs(1000000)]
    public function benchStrictOnNull(): void
    {
        null === $this->nullValue;
    }

    #[ Iterations(5), Revs(1000000)]
    public function benchStrictString(): void
    {
        '' === $this->string;
    }
}
