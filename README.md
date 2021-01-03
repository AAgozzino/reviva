# Reviva dev test

Reviva dev test is a PHP application that prints the receipt details for the given shopping basket. It takes product's price adding sales tax (except for books, food and medical products) and import duty.

## Installation

The following instructions will get you a copy of the project up and running on your local machine for developlemt and testing purpose:
* clone the repo
* navigate to the parent directory and run 
```bash
php -S localhost:8000 -t reviva
```
If your port 8000 is already taken make sure to change also Ajax endpoint in main.js (line 8).

## Usage
Reviva application comes with 3 given baskets. You can test its operation using the given select.

## Contributing
Pull request are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)
