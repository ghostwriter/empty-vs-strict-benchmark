# empty-vs-strict-benchmark

This benchmark compares the performance of using `empty()` versus strict comparisons (like `[] === $x`) in PHP.

## Benchmark Results

```
+--------------------+------------------------+-----+---------+-----+-----------+---------+--------+
| benchmark          | subject                | set | revs    | its | mem_peak  | mode    | rstdev |
+--------------------+------------------------+-----+---------+-----+-----------+---------+--------+
| EmptyVsStrictBench | benchArrayEmpty        |     | 1000000 | 10  | 784.896kb | 0.053μs | ±2.27% |
| EmptyVsStrictBench | benchArrayStrict       |     | 1000000 | 10  | 784.912kb | 0.060μs | ±0.32% |
| EmptyVsStrictBench | benchEmptyArrayEmpty   |     | 1000000 | 10  | 784.912kb | 0.053μs | ±0.36% |
| EmptyVsStrictBench | benchEmptyArrayStrict  |     | 1000000 | 10  | 784.912kb | 0.057μs | ±0.28% |
| EmptyVsStrictBench | benchEmptyStringEmpty  |     | 1000000 | 10  | 784.912kb | 0.054μs | ±1.61% |
| EmptyVsStrictBench | benchEmptyStringStrict |     | 1000000 | 10  | 784.912kb | 0.057μs | ±0.51% |
| EmptyVsStrictBench | benchNullEmpty         |     | 1000000 | 10  | 784.896kb | 0.054μs | ±0.91% |
| EmptyVsStrictBench | benchNullStrict        |     | 1000000 | 10  | 784.896kb | 0.055μs | ±3.65% |
| EmptyVsStrictBench | benchStringEmpty       |     | 1000000 | 10  | 784.912kb | 0.054μs | ±0.65% |
| EmptyVsStrictBench | benchStringStrict      |     | 1000000 | 10  | 784.912kb | 0.058μs | ±3.42% |
+--------------------+------------------------+-----+---------+-----+-----------+---------+--------+
```

## Command

This benchmark was run using the following command:

```bash
vendor/bin/phpbench run --report aggregate --iterations 10 --revs 1000000
```

## Takeaway

- `empty()` is marginally faster than strict checks.
- Performance difference is completely negligible in real-world apps.

## Notes

The results are aggregated to provide an overall performance comparison.

For more details, please refer to the [PHPBench documentation](https://github.com/phpbench/phpbench).
