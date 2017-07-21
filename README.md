# ConsoleTest
A small application written in Procedural PHP (or Pure PHP) that was inspired by Symfony's Console and Laravel's Artisan features.

### Usage
`php console [function] <params>`

`php console [namespace]::[function] <params>`

[function] = The name of the function to call without the round brackets.
[namespace] = The name of the file the function is located in without the .php extension. Separated by a double colon between the namespace and the filename.
<params> = Optional. The parameters you wish to pass to the function.

### Example
One of the functions that this console application runs can generate namespaces and functions.

`php console Make::Func [function]`

`php console Make::Func [namespace]::[function]`
