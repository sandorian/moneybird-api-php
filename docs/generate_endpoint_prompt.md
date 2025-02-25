# Moneybird API Endpoint Implementation

## Endpoint Details
- **HTTP Method**: [GET/POST/PATCH/DELETE]
- **Endpoint Path**: /[endpoint_path]/{id}/[sub_path]
- **Description**: [Brief description of what the endpoint does]
- **Documentation**: [Link to Moneybird API docs if available]

## Implementation Requirements

### Request Class
Create a new request class:
- Name: [RequestClassName]
- Extends: BaseJsonGetRequest or BaseJsonPostRequest or appropriate base class
- Constructor parameters: [List required parameters]
- Endpoint resolution: [How the endpoint should be constructed]
- Request body format (if applicable)

### DTO Class (if needed)
Create a new DTO class:
- Name: [DTOClassName]
- Properties: [List all properties from API response]
- Factory method for response conversion

### Endpoint Method
Add to [EndpointClassName]:
- Method name: [methodName]
- Parameters: [List parameters]
- Return type: [ReturnType]
- Implementation logic

### Tests
Create test for the new functionality:
- Mock response data
- Test method call
- Assertions for expected behavior

## Example Usage
```php
// Example of how to use the new endpoint
$result = $moneybird->[endpointName]()->[methodName]([parameters]);