```php
function processData(array $data): array
{
    $result = [];
    foreach ($data as $item) {
        try {
            if (is_array($item)) {
                $result[] = processData($item); // Recursive call for nested arrays
            } elseif (is_numeric($item)) {
                $result[] = (int)$item; // Convert string or numeric to integer
            } elseif (is_string($item) && strlen($item) > 0) {
                $result[] = $item;
            } else {
                error_log('Unexpected data type encountered: ' . gettype($item));
            }
        } catch (Exception $e) {
            error_log('Error processing data: ' . $e->getMessage());
        }
    }
    return $result;
}

$data = [
    '123',
    'abc',
    ['456', 'def', 789],
    null,
    true,
    10
];

$processedData = processData($data);
print_r($processedData);
```