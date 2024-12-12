```php
function processData(array $data): array
{
    $result = [];
    foreach ($data as $item) {
        if (is_array($item)) {
            $result[] = processData($item); // Recursive call for nested arrays
        } elseif (is_string($item) && preg_match('/^\d+$/', $item)) {
            $result[] = (int)$item; // Convert string to integer
        } elseif (is_string($item) && strlen($item) > 0) {
            $result[] = $item;
        } else {
            // Handle unexpected data types (optional, log an error, or throw an exception)
        }
    }
    return $result;
}

$data = [
    '123',
    'abc',
    ['456', 'def', 789],
    null,
    true, // Unexpected data type 
    10
];

$processedData = processData($data);
print_r($processedData);
```