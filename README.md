# empty-vs-strict-benchmark

This benchmark compares the performance of using `empty()` versus strict comparisons (like `[] === $x`) in PHP.

## Benchmark Results

```
+--------------------+-------------------------+-----+---------+-----+-----------+---------+---------+
| benchmark          | subject                 | set | revs    | its | mem_peak  | mode    | rstdev  |
+--------------------+-------------------------+-----+---------+-----+-----------+---------+---------+
| EmptyVsStrictBench | benchEmptyOnArray       |     | 1000000 | 2   | 819.368kb | 0.408μs | ±0.95%  |
| EmptyVsStrictBench | benchEmptyOnEmptyArray  |     | 1000000 | 2   | 819.368kb | 0.484μs | ±3.27%  |
| EmptyVsStrictBench | benchEmptyOnEmptyString |     | 1000000 | 2   | 819.368kb | 0.544μs | ±6.70%  |
| EmptyVsStrictBench | benchEmptyOnNull        |     | 1000000 | 2   | 819.368kb | 1.086μs | ±10.79% |
| EmptyVsStrictBench | benchEmptyOnString      |     | 1000000 | 2   | 819.368kb | 0.532μs | ±11.90% |
| EmptyVsStrictBench | benchStrictArray        |     | 1000000 | 2   | 819.368kb | 0.501μs | ±1.64%  |
| EmptyVsStrictBench | benchStrictEmptyArray   |     | 1000000 | 2   | 819.368kb | 0.505μs | ±6.06%  |
| EmptyVsStrictBench | benchStrictEmptyString  |     | 1000000 | 2   | 819.368kb | 0.512μs | ±1.16%  |
| EmptyVsStrictBench | benchStrictOnNull       |     | 1000000 | 2   | 819.368kb | 0.724μs | ±8.70%  |
| EmptyVsStrictBench | benchStrictString       |     | 1000000 | 2   | 819.368kb | 1.011μs | ±43.00% |
+--------------------+-------------------------+-----+---------+-----+-----------+---------+---------+
```

## Command

This benchmark was run using the following command:

```bash
vendor/bin/phpbench run --report aggregate --iterations 2 --revs 1000000
```

## Notes

The results are aggregated to provide an overall performance comparison.

For more details, please refer to the [PHPBench documentation](https://github.com/phpbench/phpbench).
