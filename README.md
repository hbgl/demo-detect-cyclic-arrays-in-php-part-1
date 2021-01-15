This repository contains the code snippets from the accompanying blog post: https://hbgl.dev/checking-if-a-php-array-contains-cycles-part-1/

The PHP scripts are intended to be run from the CLI.

_Example_
```bash
php 01-a-pure-php-solution.php
```

I also included the diagram of PHP's abstract memory model for executing the broken `is_cyclic` function:
- [SVG drawing](https://github.com/hbgl/demo-why-it-is-impossible-to-detect-cyclic-arrays-in-pure-php/blob/main/php-cyclic-array-model.svg)
- [draw.io file](https://github.com/hbgl/demo-why-it-is-impossible-to-detect-cyclic-arrays-in-pure-php/blob/main/php-cyclic-array-model.drawio)
