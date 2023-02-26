
# Nawatech-Test-Json
## Installation

Clone the project

```bash
  git clone https://github.com/hafizhpratama/nawatech-test-json.git
```

Go to the project directory

```bash
  cd nawatech-test
```

Install dependencies

```bash
  composer install
```

Copy the example env file and make the required configuration changes in the .env file


```bash
  cp .env.example .env
```

Generate a new application key


```bash
   php artisan key:generate
```

Start the local development server

```bash
    php artisan serve
```

You can now access the server at http://localhost:8000


## API Endpoints Project 2

The following endpoints are available in the API:

| Method | Endpoint     | Description                |
| :-------- | :------- | :------------------------- |
| GET | `/bookings` | manipulated json to your API |

        
## Documentation

[Postman Collection](https://api.postman.com/collections/14076346-988e3926-658c-440b-bea9-f2621e260419?access_key=PMAT-01GT629HA7SETEH2N96TRXD5HC)
