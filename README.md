GlobalXtreme Parser
======

[![Version](http://poser.pugx.org/globalxtreme/parser/version)](https://packagist.org/packages/globalxtreme/parser)
[![Total Downloads](http://poser.pugx.org/globalxtreme/parser/downloads)](https://packagist.org/packages/globalxtreme/parser)
[![License](http://poser.pugx.org/globalxtreme/parser/license)](https://packagist.org/packages/globalxtreme/parser)

### Install with composer

To install with [Composer](https://getcomposer.org/), simply require the
latest version of this package.

```bash
composer require globalxtreme/parser
```
You can install parser class with command.
```bash
php artisan make:gx-parser {{ class }}
```

## Using
- Install parser class.
    ```bash
    php artisan make:gx-parser Custom\CustomParser 
    ```
- You can add custom function in your parser
    ```php
    use GlobalXtreme\Parser\BaseParser;
    
    class CustomParser extends BaseParser
    {
        use HasParser;
        
        public function tests($collections)
        {
            if (!$collections || count($collections) == 0) {
                return null;
            }
  
            $data = [];
            foreach ($collections as $collection) {
                $data[] = $collection->toArray();
            }
  
            return $data;
        } 
    }
    ```
- Register your parser to model.
    ```php
    use App\Packages\Parser\Custom\CustomParser;
    use GlobalXtreme\Parser\Trait\HasParser;
    
    class Custom extends Model
    {
        use HasParser;
        
        public $parserClass = CustomParser::class;
    }
    ```
- Using parser with controller.
    ```php
    use App\Http\Controllers\Controller;
    use App\Models\Custom;
    use App\Packages\Parser\Custom\CustomParser;
    use GlobalXtreme\Parser\Parser;
    
    class CustomController extends Controller
    {
        public function testing() 
        {
            // Get more than one data
            $customs = Custom::get();
            
            // Display data using CustomParser and your custom function 
            $results = CustomParser::get($customs);
            $results = CustomParser::tests($customs);
  
            // Display data using parser class from package 
            // with default function or custom function from CustomParser
            $results = Parser::get($customs);
            $results = Parser::tests($customs);
   
  
            // Get one data
            $custom = Custom::first();
            
            // Display data using custom parser
            $result = CustomParser::first($custom);
  
            // Display data using parser class from package
            $result = Parser::first($custom);
        }
    }
    ```